<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends PubController{
    public function lists(){
        $model = M();
        $rules = array(    
            array('cat_id','1,4294967295','cat_id在1到4294967295之间数字',2,'between'),     
            array('page','1,4294967295','page在1到4294967295之间数字',2,'between'),
            array('page','1,255','page在1到255之间数字',2,'between'),
            array('order_by','',array('is_new','prom_2','prom_3','sales_sum','price_0','price_1'),'prder_by非法','unique',1),
        );

        $data['cat_id']     = I('get.cat_id');
        $data['page']       = I('get.page');
        $data['page_size']  = I('get.page_size');
        $data['order_by']   = I('get.order_by');

        if($model->validate($rules)->create($data) === false){
            $this->_err($model->getError());
        }

        $model2 = M('Goods');
        if($data['cat_id'] != ''){
            $temp = getCategoryAllSon($data['cat_id']);
            $temp[] = $data['cat_id'];
            $map['cat_id'] = array('in',$temp);
        }else{
            $map = array();
        }

        if($data['page'     ] == '') $data['page'] = 1;
        if($data['page_size'] == '') $data['page'] = 12;

        $count      = $model2->where($map)->count();  //总记录数
        $Page       = new \Think\Page($count,12);//总页数
        $show       = $Page->show();
        $goods_list = $User->where($map)->order('order_by')->limit($Page->firstRow.','.$Page->listRows)->select();
        
        $this->assign('goods_list',$goods_list);
        $this->assign('page',$show);
        $this->display();
    }
    
}