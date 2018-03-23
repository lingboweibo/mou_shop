<?php
namespace Home\Controller;
use Think\Controller;
class HelpController extends PubController {
	 public function index(){
		  $model = M('Help');
		  $data = $model->field('id,title')->select();
		  $this->assign('data',$data);
		  $this->display();
	 }

	 public function detail(){
		  $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
		  if($id == '')$this->error('id不能为空');

		  $model = M('Help');
		  $data = $model->where(array('id'=>$id))->find();
		  if($data === false)$this->error('找不到记录');
		  $this->assign('data',$data);
		  $this->display();
	 }
}