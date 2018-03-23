<?php 
namespace Admin\Controller;
use Think\Controller;

class HelpController extends PubController { 

    public function index(){
        $model = M('Help');
        $data = $model->field('id,title')->select();
        $this->assign('data',$data);
        $this->display();
    }

    public function edit(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        $model = M('Help');
        $data = $model->where(array('id'=>$id))->find();
        if($data === false)$this->error('找不到记录');
        $this->assign('data',$data);
        $this->display();
    }

    public function editSubmit(){
        $id = I('post.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        $content = I('post.content','','');
        if($content == '')$this->error('帮助中心详细内容不能为空');
        if(mb_strlen($content) > 64000)$this->error('帮助中心详细内容字数不能超过64000');

        $model = M('Help');
        $ok = $model->where(array('id'=>$id))->setField('content',$content);
        if($ok === false)$this->error($model->getError());
        elseif($ok === 0)$this->error('数据没有变化');
        $this->success('修改成功',U('index'));
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