<?php
namespace Home\Controller;
use Think\Controller;
class CarController extends PubController {
    public function index(){
        $userId = $this->_ifLogin('page');
        // //1 查询当前用户的购物车的商品的id和购物车夹ID，得到类似这样一个数组array(购物车夹id = > 商品id,购物车夹id = > 商品id,购物车夹id = > 商品id)
        // $arr = M('Car')->where(array('user_id' => $userId))->getField('id,goods_id,num,selected');

        // //1.1 增加一步 从$arr数组取出商品的id作来一个一维数组，给下一步当作条件的参数之一
        // $goodsId = array();
        // foreach ($arr as $key => $value) {
        //     $goodsId[] = $value['goods_id'];
        // }

        // $data = array();
        // if($goodsId != false){//如果goodsId数组是空就说明当前用户的购物车没有商品，如果没有商品，那下面的查询商品表和商品图片表都是没有必要执行的
        //     $map['id']  = array('in',$goodsId);
        //     //2 用上面得到的数组作为商品id的in条件查询商品表 得到商品记录集二维数组（条件是他已经加入购物车的商品）商品ID in(范围)
        //     $data = M('Goods')->where($map)->field('id as goods_id,name,format,price')->select();

        //     foreach ($data as $key => $value) {//3 循环商品记录集二维数组
        //         // 4 给当前循环到商品记录集二维数组的第二维增加图标路径键 = 查询商品图片表的图片路径字段 条件是 商品id = 循环到的商品ID
        //         $data[$key]['filename'] = M('goodsimage')->where(array('good_id' => $value['goods_id']))->order('sort')->getField('filename');
        //         foreach ($arr as $k => $one) {
        //             if($one['goods_id'] == $value['goods_id']){
        //                 $data[$key]['id'] = $k;
        //                 $data[$key]['num'] = $one['num'];
        //                 $data[$key]['selected'] = $one['selected'];
        //             }
        //         }
        //     }
        // }

        //方法一:联表查询
        $model = M('Car');
        $data = $model->join('__GOODS__ ON __CAR__.goods_id = __GOODS__.id')
                      ->join('LEFT JOIN __GOODSIMAGE__ ON __GOODS__.id = __GOODSIMAGE__.good_id')
                      ->field('goods.id as goods_id,goods.name,goods.format,goods.price,goodsimage.filename,car.id,car.num,car.selected')
                      ->where(array('car.user_id'=>$userId,'goodsimage.sort'=>1))
                      ->order('car.id desc')
                      ->select();

        //第二种方法：视图查询
        //create algorithm = merge view car_goods_view as select car.id,car.user_id,car.num,car.selected,car.add_time,goods.id as goods_id,goods.name,goods.format,goods.price,goodsimage.filename,goodsimage.sort from car inner join goods on car.goods_id = goods.id inner join goodsimage on goodsimage.good_id = goods.id

       //$data = M('Car_goods_view')->where(array('user_id'=>$userId,'sort'=>1))->order('id desc')->select();

        $this->assign('data',$data); //5 把商品记录集二维数组传给模板
        $this->display();
    }
    public function add(){
        //1.先判断是否登录，如果没有登录就返回相应的错误提示 not_login 该功能需要登录后才能使用
        //2.获取用户ID
        $data['user_id'] = $this->_ifLogin();

        //3.获取传来的ID，验证它
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->_err('id不能为空');

        //判断提交来的商品ID是否存在
        if(M('Goods')->where(array('id' => $id))->getField('id') === null )$this->_err('此商品不存在');

        //判断提交来的商品是否已经加入购物车
        $model = M('Car');
        if($model->where(array('goods_id' => $id,'user_id' => $data['user_id']))->getField('id') !== null )$this->_err('此商品已经加入购物车，请不要重复加入');

        //4.写入数据库购物车表
        $data['goods_id'] = $id;
        $data['add_time'] = date('Y-m-d H:i:s');
        $ok = $model->add($data);
        if($ok === false)$this->_err('','sys_err');

        //5.获取该用户购物车商品总记录数
        //6 按接口要求返回成功数据
        $cart_num = $model->where(array('user_id'=>$data['user_id']))->count();
        session('cart_num',$cart_num);  //更新缓存
        $this->_ok(array('count'=>$cart_num));
    }
    public function del(){
        //1.先判断是否登录，如果没有登录就返回相应的错误提示 not_login 该功能需要登录后才能使用
        //2.获取用户ID
        $data['user_id'] = $this->_ifLogin();

        $data['goods_id'] = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($$data['goods_id'])$this->_err('id不能为空');

        $model = M('Car');
        //4.在数据库的购物车表里把这条记录删除
        $map = array('user_id'=>$data['user_id'],'goods_id'=>$data['goods_id']);
        $result = $model->where($map)->delete();
        if($result === false){
            $this->_err('','sys_err');
        }elseif($result === 0){
            $this->_err('该商品没有在您的购物车里' . $model->getError());
        }else{
            //5.获取该用户购物车商品总记录数
            //6.返回成功和 总记录数
            $cart_num = $model->where(array('user_id'=>$data['user_id']))->count();
            session('cart_num',$cart_num);//更新缓存
            $this->_ok(array('count'=>$cart_num));
        } 
    }
    public function quantity(){
        $user_id = $this->_ifLogin();
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $num  = I('get.quantity','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->_err('id不能为空');
        if($num == '')$this->_err('quantity不能为空');

        $model = M('Car');
        $ok = $model->where(array('user_id'=>$user_id,'id' => $id))->setField('num',$num);
        if($ok === false)$this->_err($model->getError());
        if($ok === 0)$this->_err('数据没有变化');
        $this->_ok();
    }
    public function checked(){
        $this->_select(1);
    }
    public function cancel(){
        $this->_select('0');
    }
    public function checkedAll(){
        $user_id = $this->_ifLogin();
        $model = M('Car');
        $ok = $model->where(array('user_id'=>$user_id))->setField('selected',1);
        if($ok === false)$this->_err('','sys_err');
        $this->_ok();
    }
    protected function _select($selected){
        $user_id = $this->_ifLogin();
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->_err('id不能为空');

        $ok = M('car')->where(array('user_id'=>$user_id,'id' => $id))->setField('selected',$selected);
        if($ok === false)$this->_err('','sys_err');
        $this->_ok();
    }
    // http://localhost:8015/index.php?m=Home&c=Car&a=cancel&id=1
    // http://localhost:8015/index.php?m=Home&c=Car&a=quantity&id=1&num=666
}