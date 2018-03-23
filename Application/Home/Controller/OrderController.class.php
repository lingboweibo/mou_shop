<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends PubController{
    public function lists(){  //我的订单(暂时不做滚屏获取第二页和以后的内容)
       $userId = $this->_ifLogin('page');
        $data = M('order')->field('id,add_time,order_sn,order_status,total_amount')->where(array('user_id' => $userId))->select();//从 订单表 读取 ID，下单时间，订单号，订单状态，总额

        //从 订单商品表读取 对应的 订单商品图片(订单商品表写入之后是不会改的，如果从商品表或商品图片表读取的话，因为商品表或商品图片表在后台可以修改，所以可能会读取到新的数据，所以这里不能从商品表或商品图片表读取)
        $totalPrice = 0; //全部订单总价
        foreach ($data as $key => $value) {
            $data[$key]['goods'] = M('order_goods')->field('filename')->where(array('order_id' => $value['id']))->select();
            $totalPrice += $value['total_amount'];
        }
        // my_dump($data);
        //传给模板文件
        $this->assign('count',count($data));
        $this->assign('data',$data);
        $this->assign('totalPrice',$totalPrice);
        $this->display();
    }

    public function detail(){ //订单详情(点击我的订单中的订单进入该页面)
        $userId = $this->_ifLogin('page');
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);//获取订单id
        if($id == '') $this->error('订单id不能为空！');
        $map['id'] = $id;
        $map['user_id'] = $userId;

        $data = M('Order')->where($map)->field('order_sn,order_status,consignee,city,address,mobile,pay_name,add_time')->find();
        $map['order_id'] = $data['id'];
        $map['user_id'] = $userId;
        $goodsData = M('Order_goods')->where($map)->field('name,price,format,num')->select();
        foreach ($goodsData as $key => $value) {
            $totalPrice += $value['price'] * $value['num']; 
        }

        $this->assign('data',$data); //订单信息
        $this->assign('goodsData',$goodsData); //订单商品信息
        $this->assign('totalPrice',$totalPrice);
        $this->display();
    }

    public function add(){ //提交订单
        //接收传来的商品id 和数量，并验证
        //查询出这些商品的相关数据，传到模板页面上显示
        //模板页面上显示的商品和数量要和购物车页面上提交前选择或输入的数量一致
        $userId = $this->_ifLogin('page'); //判断登录，默认809
        if(IS_POST){  //一般的，从购物车提交数据并跳转到add页面
            $goods_id = I('post.id');  //这里是一个一维数组
            $num      = I('post.num');//也是一个数组
            if($goods_id == NULL){$this->error('请至少选择一个商品进行结算！');}
            //剔除没选择的num数组的值
            $temp = array();
            $newNum = array();  
            foreach ($goods_id as $key => $value) {
                $temp           = explode('.',$value,2);//获取到的goods_id包括了购物车商品列表的$key . '.' . $goods_id，所以要分割之，并用分割到的$key获取提交来的商品的num数组的下标
                $key_num        = $temp[0];
                $newNum[$key]   = $num[$key_num];
                $goods_id[$key] = $temp[1];
                unset($temp);
            }
            foreach ($newNum as $k => $v) {
                if($v<1) $this->error('第'. ($k+1) . '个选中的商品个数不能小于1！');
                if(is_numeric($v) === false){
                    $this->error('第' . $k . '个num不是数值类型');
                }
            }
            //用session记住所选的商品ID和数量，这样进入结算页面之后，还可以再反复进入选择地址或选择支付方式，选择日期……的页面
            session('order_goodsid',$goods_id);
            session('order_newnum',$newNum);
        }else{  //为get请求，即：不是从购物车跳转到这个页面的
            $goods_id = array();
            $newNum = array();
            $goods_id = session('order_goodsid');
            $newNum = session('order_newnum');
            if($goods_id == NULL){$this->error('请至少选择一个商品进行结算！');}
        }

        $model = M('goods');
        $data = array();
        foreach ($goods_id as $key => $value) {
            if(is_numeric($value) === false){
                $this->error('第' . $key . '个goods_id不是数值类型');
            }
            // $data[] = $model->where(array('id'=>$value))->field('id,name,format,price')->find();
            // $data[$key]['filename'] = M('Goodsimage')->where(array('good_id'=>$value['id']))->getField('filename');

            //方法二：联合查询
            $map['goods.id']        = $value;
            // $map['goodsimage.sort'] = 1; //防止有多个图片出现(如果是select查询就要用这个条件进行显示图片的个数，否则会有多个图片出现)
            $data[] = $model->join('__GOODSIMAGE__ ON __GOODS__.id = __GOODSIMAGE__.good_id')
                            ->field('goods.id,goods.name,goods.format,goods.price,goodsimage.filename')
                            ->where($map)
                            ->find();
        }

        //商品总价
        foreach ($data as $j => $one) {
            $totalPrice += $one['price'] * $newNum[$j];
        }

        //处理收货地址数据
        $map = array('user_id' => $userId);
        $address_id = session('order_address_id');//先从session读取最近上次选择的地址id

        if($address_id !== null){//如果session里有记住他的收货地址，那就要用这个收货地址显示在结算页面上
            $map['id'] =$address_id;//加这样一个条件就能查询他记住的地址ID的详细地址
            // my_dump($address_id);
        }
        //如果读取不到就说明还没选择收货地址，那这样就用默认地址  
        //(排序里让 is_default 从大到小，这里如果没有id条件，但是如果这个用户有设置默认地址，用find读取一条记录的时侯，肯定排在前面被读取 到，如果他没有设置默认地址，那就是普通的地址被读取到一条)
        $addressData = M('Address')->where($map)->order('is_default desc')->field('consignee,mobile,city,address')->find();
    
        $this->assign('count',count($data));
        $this->assign('data',$data);
        $this->assign('newNum',$newNum);
        $this->assign('totalPrice',$totalPrice);
        $this->assign('addressData',$addressData);
        $this->display(); 
    }

    public function addSubmit(){ //提交订单接收,生成订单，把订单信息写进数据库
        $userId = $this->_ifLogin('page');
        $model = D('Order');
        $data  =$model->getInsertData(); //先获取提交来的数据
        $data['user_id'] = $userId;

        
        //验证
        if(!$model->create($data)) $this->error('字段验证出现错误' . $model->getError());

        //后面处理 计算总价，总价应该用商品ID查询商品表查出该商品的单价 查出单价之后再按数量计算总价
        //还要接收post提交来的商品ID和数量
        $goods_id = I('post.goods_id');
        $num      = I('post.num');
        foreach ($goods_id as $key => $value) {
            if(is_numeric($value) === false) $this->error('第'. ($key+1) . '个商品ID必须是数字');
        }
        foreach ($num as $key => $value) {
            if(is_numeric($value) == false)$this->error('第' . ($key + 1) . '个商品数量必须是数字');
        }
        if(count($goods_id) != count($num)) $this->error('商品ID和商品数量数据不对应');

        //得到一个 以商品ID为键，以商品数量为值的一维数组$idNum
        $idNUm = array();
        foreach ($goods_id as $key => $value) {
            $idNUm[$value] = $num[$key];
        }

        $map['id'] = array('in',$goods_id);  //范围条件,可能有多个goods_id，有多个商品
        $goodsData = M('Goods')->where($map)->select();

        $data['goods_price'] = 0; //订单商品总价
        foreach ($goodsData as $key => $value) {
            //echo '商品id=' , $value['id'] , ' 单价=' , $value['price'] , ' 数量=' , $idNum[$value['id']] , "<br>";
            $data['goods_price'] += $value['price'] * $idNUm[$value['id']];  
            //计算总价，不采取表单传过来的总价，不可信任
            $goodsData[$key]['filename'] = M('goodsimage')->where(array('good_id'=>$value['id']))->order('sort')->getField('filename',true);//以数组形式获取商品的filename，防止有多个图片情况
            if($goodsData[$key]['filename']){
                //拼接filename字段为一个长字符串
                $goodsData[$key]['filename'] = join(',',$goodsData[$key]['filename']);
            }
        }
        $data['order_amount'] = $data['goods_price'];//应付款金额 = 商品总价
        $data['total_amount'   ] = $data['goods_price'];//订单总价 = 商品总价

        //写入订单表（订单表没办法保存这个订单要购买哪些商品，每个商品购买多少数量）
        $model->startTrans();//开启事务。为了数据完整，用了事务处理
        $goods_id = $model->add($data);//订单表模型的add方法成功后会返回主键，也就是订单ID 赋值给 $goods_id 订单商品表需要它
        if($goods_id === false){
            $model->rollback(); //事务回滚
            $this->error('下单失败');
        }

        $orderGoods = M('order_goods');
        $orderGoods->startTrans();//订单商品表也开启事务
        //写入订单商品表(要购买哪些商品，每个商品购买多少数量)
        //一个订单可能会包含多个商品。
        //因为商品表的数据在后台是可以改的，但订单商品表的就不能改，所以要把下单时选择的商品相关数据保存到订单商品表里（相当于一个快照，不会变），防止后台改了商品数据，看订单商品也会受影响

        foreach ($goodsData as $key => $value) {
            //在循环里获取订单商品表需要的数据
            $data2['order_id'       ] = $goods_id; //订单id
            $data2['user_id'        ] = $userId; //用户ID
            $data2['num'            ] = $idNUm[$value['id']];//购买数
            $data2['name'           ] = $value['name'];//商品名称
            $data2['price'          ] = $value['price'];
            $data2['home'           ] = $value['home'];//产地
            $data2['format'         ] = $value['format'];//规格
            $data2['content'        ] = $value['content'];
            $data2['give_integral'  ] = $value['give_integral'];//购买商品赠送积分
            $data2['required_points'] = $value['required_points'];//所需积分
            $data2['filename'       ] = $value['filename'];

            //写入订单表
            if($orderGoods->add($data2) === false){
                $model->rollback();
            }
        }
        $orderGoods->commit();
        $this->success('下单成功，请注意电话畅通，我们的订单确认人员可能会与您电话联系确认订单。',U('lists'));
    }

    public function selectDate(){ //选择配送时间页面
        $userId = $this->_ifLogin('page');
        if(IS_POST){ //有post提交就记住，然后跳转到下单页面
            $select_date = I('post.select_date');
            if($select_date == ''){$this->error('请选择一个配送日期');}
            session('order_delivery_time',$select_date); //将配送时间保存到session
            redirect(U('add'),0);
        }else{   //此时的情况就是从订单页面跳转到选择日期页面而已，不用做其他操作，只需渲染模板
            $this->display();
        }
    }

    public function selectAddress(){ //选择收货地址（用这一个操作实现两个功能：显示选择收货地址 和 接收选择收货地址）接收选择的收货地址之后记住
        $userId = $this->_ifLogin('page');
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == ''){
            //查询当前用户的收货地址传给模板文件
            $data = M('Address')->where(array('user_id'=>$userId))->field('user_id',true)->order('is_default desc,id desc')->select();
            $this->assign('data',$data);
            $this->display();
        }else{
            session('order_address_id',$id);//保存地址id。在add页面的地址，会先从这个session获取地址，若没有这个session才从数据库取别的地址.
            //'order_address_id'两边的引号与单词之间不能有空格，否则识别不了这个单词作为键名
            redirect(U('add'),0);
        }
    }

    //简单写一些，模板页面没有做好
    public function selectInvoice(){ //选择发票类型的发票信息
        $userId = $this->_ifLogin('page');
        if(IS_POST){//如果有POST提交发票类型就用session记住，然后转回下单页面
            $invoice = I('post.invoice');  //获取发票抬头信息
            if($invoice == '')$this->error('请选择一个发票类型');
            session('order_invoice',$invoice);
            redirect(U('add'),0);//再跳转回下单页面
        }else{///如果没POST提交就显示选择支付方式的页面
            $this->display();
        }
    }

    public function selectPayType(){ //选择支付方式页面
        $userId = $this->_ifLogin('page');
        if(IS_POST){ //有post提交就记住，然后跳转到下单页面
            $select_pay = I('post.select_pay');
            if($select_pay == ''){$this->error('请选择一种支付方式');}//不允许选择支付页面不选择任何支付方式就提交表单
            session('order_pay_name',$select_pay); //将配送时间保存到session
            redirect(U('add'),0);
        }else{
            $this->display();
        }
    }
}