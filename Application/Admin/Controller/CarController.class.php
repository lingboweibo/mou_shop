<?php 
namespace Admin\Controller;
use Think\Controller;

class CarController extends PubController {    
    public function index(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $name = I('get.name');
        if($id == '')$this->error('id不能为空');

        //方法一：联合查询
        $model = M('Car');
        $data = $model->join('__GOODS__ ON __CAR__.goods_id = __GOODS__.id')
                      ->field('goods.name,goods.price,car.id,car.add_time,car.num,car.selected')
                      ->where(array('user_id'=>$id))
                      ->select();

        // //方法二：视图查询，速度更快
        // $data = D('Car_goods_view')->where(array('user_id'=>$id))->select();
        
        $this->assign('count',count($data));
        $this->assign('data',$data);
        $this->assign('name',$name);
        $this->display();
    }
}
