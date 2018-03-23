<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends PubController {
    public function index(){
        $total_amount_star = I('get.total_amount_star','',FILTER_SANITIZE_NUMBER_INT);
        $total_amount_end  = I('get.total_amount_end','',FILTER_SANITIZE_NUMBER_INT);
        $order_status      = I('get.order_status','',FILTER_SANITIZE_NUMBER_INT);
        $shipping_status   = I('get.shipping_status','',FILTER_SANITIZE_NUMBER_INT);
        $pay_status        = I('get.pay_status','',FILTER_SANITIZE_NUMBER_INT);
        $id                = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $key_word          = I('get.key_word');

        $map = array();

        if($key_word != ''){//判断如果提交来的搜索关键字不为空，那就增加下面一个模糊搜索条件
            $key_word = trim($key_word);
            $name = '搜索结果';
            $map['consignee|mobile|shipping_code|order_sn'] = array('LIKE','%' . $key_word . '%');
        }

        if($total_amount_star !== '' || $total_amount_end !== ''){
            if($total_amount_star !== '' && $total_amount_end !== ''){
                $map['total_amount']  = array('between', $total_amount_star . ',' . $total_amount_end);
            }else{
                if($total_amount_star)$map['total_amount'] = array('EGT',$total_amount_star);
                if($total_amount_end) $map['total_amount'] = array('ELT',$total_amount_end);
            }
        }
        if($order_status === '0'   )$map['order_status'   ] = 0;
        elseif($order_status == 1  )$map['order_status'   ] = 1;
        elseif($order_status == 2  )$map['order_status'   ] = 2;

        if($shipping_status === '0')$map['shipping_status'] = 0;
        elseif($shipping_status== 1)$map['shipping_status'] = 1;
        elseif($shipping_status== 2)$map['shipping_status'] = 2;

        if($pay_status === '0'     )$map['pay_status'     ] = 0;
        elseif($pay_status == 1    )$map['pay_status'     ] = 1;
        elseif($pay_status == 2    )$map['pay_status'     ] = 2;

        if($id != ''){
            $map = array('id' => $id);//如果用ID搜索，就忽略其它条件
            $name = '根据ID搜索';
        }
        $orderField = 'id desc';
        $model = M('order');
        $count = $model->where($map)->count('id');
        $page  = new \Think\Page($count,12);
        $pageHtml = $page->show();
        $data = $model->where($map)->limit($page->firstRow.','. $page->listRows)->order($orderField)->select();

        $this->assign('data',$data);
        $this->assign('pageHtml',$pageHtml);
        $this->assign('count',$count);
        $this->assign('total_amount_star',$total_amount_star);
        $this->assign('total_amount_end',$total_amount_end);
        $this->assign('order_status',$order_status);
        $this->assign('key_word',$key_word);
        $this->assign('pay_status',$pay_status);
        $this->assign('shipping_status',$shipping_status);
        $this->assign('id',$id);
        $this->display();
    }
    public function view(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        $model = M('Order');
        $data = $model->where(array('id'=>$id))->find();
        if($data === false)$this->error($model->getError());
        if($data == false)$this->error('找不到订单');
        $this->assign('data',$data);

        //读取该订单购买的商品列表数据给模板文件
        $orderData = M('Order_goods')->where(array('order_id'=>$id))->field('id,name,price,num')->select();
        $this->assign('orderData',$orderData);
        $this->display();
    }
    public function confirm(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        $model = M('Order');
        if($model->where(array('id'=>$id))->getField('order_status') == 1)$this->error('此订单已经处于确认状态，请不要重复确认。');

        $ok = $model->where(array('id'=>$id))->setField('order_status',1);
        if($ok === false)$this->error($model->getError());
        elseif($ok === 0)$this->error('确认订单失败');
        else $this->success('确认订单成功。',U('index'));
    }
    public function cancel(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        $model = M('Order');
        $data = $model->where(array('id'=>$id))->find();
        if($data === false)$this->error($model->getError());
        if($data == false)$this->error('找不到订单');
        $this->assign('data',$data);
        $this->display();
    }
    public function cancelSubmit(){
        $id = I('post.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');
        $admin_note = I('post.admin_note');
        if($admin_note == '')$this->error('取消原因不能为空');
        if(mb_strlen($admin_note) > 255)$this->error('取消原因的字数不能超过255');

        $model = M('Order');
        $ok = $model->where(array('id'=>$id))->setField(array('admin_note'=>$admin_note,'order_status'=>2));
        if($ok === false)$this->error($model->getError());
        elseif($ok === 0)$this->error('数据没有变化');
        else $this->success('取消订单成功。',U('index'));
    }
    public function shipping(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        $data = M('order')->where(array('id' => $id))->field('mobile,consignee,city,address')->find();
        if($data == null)$this->error('找不到订单');
        $this->assign('data',$data);
        $this->assign('id',$id);
        $this->display();
    }
    public function shippingSubmit(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');
        
        $data['zipcode']        = I('post.zipcode','',FILTER_SANITIZE_NUMBER_INT);
        $data['shipping_code']  = I('post.shipping_code');
        $data['shipping_name']  = I('post.shipping_name');
        $data['mobile']         = I('post.mobile','',FILTER_SANITIZE_NUMBER_INT);
        $data['consignee']      = I('post.consignee');
        $data['city']           = getLastPid('city');
        $data['address']        = I('post.address');
        $data['shipping_status']= 1;

        $model = M('order');
        $rules = array(
            array('zipcode','6','邮编不能为空且长度为6',2,'length'), //第四个参数2表示值不为空的时候验证
            array('shipping_code','1,32','物流编号的长度必须在1到32范围内',2,'length'),
            array('shipping_name','1,255','物流名称的长度必须在1到120范围内',2,'length'),
            array('mobile','require','手机号码不能为空',1),
            array('mobile','11,60','手机号码的长度必须在11到60范围内',2,'length'),
            array('consignee','require','收货人不能为空',1),
            array('consignee','2,60','收货人的长度必须在1到60范围内',2,'length'),
            array('city','require','城市ID不能为空',1),
            array('city','number','城市ID必须是数字'),
            array('city','9','城市ID字数必须是9位数',1,'length'),
            array('address','require','地址不能为空',1),
            array('address','4,255','地址的字数必须在2到255之间',1,'length'),
        );
        if (!$model->validate($rules)->create($data)){//注意因为城市是从$_POST['city']数组获取最后一个不为空的赋值给$data['city']的
                                                      //所以这里要传$data过去验证，否则会用$_POST进行验证，因为$_POST['city']是数组验证就会通不过
            $this->error($model->getError());//$model->getError()是获取模型的错误信息的方法
        }

        $result = $model->where(array('id' => $id))->save($data);
        if($result === false)$this->error($model->getError());
        if($result === 0){
            $this->success('数据没有被修改，可能之前已经发货过',U('index'));
        }else{
            $this->success('发货成功',U('index'));
        }
    }
    public function confirmPay(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        $result = M('order')->where(array('id' => $id))->setField(array('pay_status' => 1,'pay_time' => date('Y-m-d H:i:s')));
        if($result === false)$this->error($model->getError());
        if($result === 0){
            $this->success('数据没有被修改，可能之前已经确认过支付',U('index'));
        }else{
            $this->success('确认支付成功',U('index'));
        }
    }
}