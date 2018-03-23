<?php
namespace Admin\Controller;
use Think\Controller;
class FavoriteController extends PubController{
    public function index(){
        $userId = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $name = I('get.name');
        //方法一：联合查询
        $data = M('Favorite')->join('LEFT JOIN __GOODS__ ON __FAVORITE__.goods_id = __GOODS__.id')
                        ->where(array('user_id'=>$userId))
                        ->field('favorite.id,favorite.add_time,goods.name as goods_name,goods.price as goods_price')
                        ->order('id')
                        ->select();
        
        //方法二：视图查询
        // $data = D('Favorite_goods_view')->where(array('user_id'=>$userId))->order('id')->select();

        $this->assign('data',$data);
        $this->assign('count',count($data));
        $this->assign('name',$name);
        $this->display();
    }
}
//视图创建语句
//create algorithm = merge view favorite_goods_view as select favorite.id,favorite.add_time,favorite.user_id,goods.name as goods_name,goods.price as goods_price from favorite inner join goods on favorite.goods_id = goods.id 
