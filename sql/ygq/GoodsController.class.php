<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends PubController {
	public function lists(){
		$rules = array(
			array('cat_id','number','cat_id必须是数字',2),
			array('page','number','page必须是数字',2),
			array('page_size','number','page_size必须是数字',2),
			array('cat_id','1,4294967295','cat_id的范围必须在1到4294967295之间',2,'in'),
			array('page','1,4294967295','page的范围必须在1到4294967295之间',2,'in'),
			array('page_size','1,4294967295','page_size的范围必须在1到4294967295之间',2,'in'),
			array('order_by',array('is_new','prom_2','prom_3','sales_sum','price_0','price_1'),'order_by不合法',2,'in'),
		);
		$data['cat_id'] = I('get.cat_id');
		$data['page'] = I('get.page');
		$data['page_size'] = I('get.page_size');
		$data['order_by'] = I('get.order_by');

		$model = M();
		if($model->validate($rules)->create($data) === false){
			$this->_err($model->getError());
		}

		$model = M('Goods');
		if($data['cat_id'] != ''){
			$temp = getCategoryAllSun($data['cat_id']);
			$temp[] = $data['cat_id'];
            $map['cat_id'] = array('in',$temp);
        }else{
            $map = array();
        }

        $model->where($map);
        if($data['page'     ] == '')$data['page'] = 1;
        if($data['page_size'] == '')$data['page_size'] = 12;
        $count = $model->count();
        $page = new \Think\Page($count,$data['page_size']);
        $pageHtml = $page->show();
        $pages = $page->totalPages;
        if($data['order_by'] != ''){
        	$order = $data['order_by'];
        }
        else $order = '';
        $data = $model->limit($page->firstRow.','. $page->listRows)->order($order)->select();
        my_dump($data);
	}
}
//http://localhost:8014/ygq/mou_shop/index.php/Home/Goods/lists/cat_id/1