<?php 
	namespace Home\Controller;
	use Think\Controller;
	
	class GoodsController extends Controller {
	
		public function lists(){
	    	$rules = array(
	    		array('cat_id','number','cat_id必须是数字',2),
	    		array('page','number','page必须是数字',2),
	    		array('page_size','number','page_size必须是数字',2),

	    		array('cat_id','1,4294967295','cat_id的大小必须在1到4294967295范围内',2,'between'),
	    		array('page','1,4294967295','page的大小必须在1到4294967295范围内',2,'between'),
	    		array('page_size','1,255','page_size的大小必须在1到255范围内',2,'between'),
	    		array('order_by',array('is_new','prom_2','prom_3','sales_sum','price_0','price_1'),'order_by非法',2,'in'),
	    	);
			
			$data['cat_id'] = I('get.cat_id');
			$data['page'] = I('get.page');
			$data['page_size'] = I('get.page_size');
			$data['order_by'] = I('get.order_by');

			$model = M();
			if($model->validate($rules)->create($data) === false){
				$this->_reError($model->getError());
			}

			$model = M('Goods');
			if($data['cat_id'] != ''){
				$temp = getCategoryAllSun($data['cat_id']);
				$temp[] = $data['cat_id'];
				$map['cat_id'] = array('in',$temp);
			}else{
				$map = array();
			}
        	$count = $model->field('count(id) as count')->where($map)->find();
			$page  = new \Think\Page($count['count'],12);
        	$pageHtml = $page->show();

        	$countPage = $count % 12;

        	$data = $model->field('id,cat_id,name,price,is_on_sale,sort,is_recommend,is_new,last_update,sales_sum,prom_type,give_integral')->where($map)->limit($page->firstRow.','. $page->listRows)->order($orderField)->order('sort')->select();

        	dump($count);exit;
	    }
	}
 ?>