<?php 
namespace Home\Controller;
use Think\Controller;
class AddressController extends PubController{
    public function index(){
        $userId = $this->_ifLogin('page');
        //读取条件是 用户id=当前用户的id 的多条记录数据 传给模板
        $data = M('Address')->where(array('user_id'=>$userId))->field('user_id',true)->order('is_default desc,id desc')->select();
        $this->assign('data',$data);
        $this->display();
    }
    public function add(){
        $userId = $this->_ifLogin('page');
        $this->display();
    }
    public function addSubmit(){
        //1 获取提交来的数据，验证
        //2 添加记录
        //3 判断如果本次添加的是默认地址就要将该会员的其它收货地址更新为不是默认地址
        $userId = $this->_ifLogin('page');

        $model = D('Address');
        $data  = $model->getInsertData($userId);
        if ($model->validate($rules)->create($data) === false){
            $this->error($model->getError());
        }
        $ok = $model->add($data);

        if($data['is_default'] == 1)$this->_canceldefault($ok);
        if($ok === false)$this->error('添加失败');
        $this->success('添加成功',U('index'));
       
    }
    public function edit(){
        //1 获取提交来的id，验证
        //2 读取条件是 id=传来的id 用户id=当前用户的id 的一条记录数据 传给模板
        $userId = $this->_ifLogin('page');
        $id     = I('get.id','',FILTER_SANITIZE_NUMBER_INT); //收货地址id
        if($id == '')$this->error('id不能为空');
        $data = M('Address')->where(array('user_id'=>$userId,'id'=>$id))->field('consignee,mobile,city,address,is_default')->find();
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display();
    }
    public function editSubmit(){
        $userId = $this->_ifLogin('page');
        //1 获取提交来的数据，验证
        //2 更新记录
        //3 判断如果本次更新的是默认地址就要将该会员的其它收货地址更新为不是默认地址

        $id     = I('get.id','',FILTER_SANITIZE_NUMBER_INT); //收货地址id
        if($id == '')$this->error('id不能为空');

        $data = I('post.');
        $data['is_default'] = I('post.is_default');
        $data['city'] = getLastPid('city');

        $model = D('Address');
        $data  = $model->getUpData();
        if ($model->validate($rules)->create($data,2) === false){
            $this->error($model->getError());
        }

        $result = $model->where(array('id'=>$id,'user_id'=>$userId))->save($data);
        if($result === false){
            $this->error('修改收货地址失败！');
        }elseif($result == 0){
            $this->error('收货地址没有没修改，您可能没有修改任何数据！');
        }else{
            $this->_canceldefault($id);
            $this->success('收货地址修改成功',U('Address/index',array('id'=>$userId)));
        }
    }
    protected function _canceldefault($id){//把当前用户的不是传的ID的收货地址取消默认
        $userId = $this->_ifLogin('page');
        $map['id'] = array('NEQ',$id);//id不等于当前添加收货地址的ID
        $map['user_id'] = $this->_ifLogin('page');//会员ID要等于当前会员的ID
        $map['is_default'] = 1;//本来是默认才更新为0
        $arr = M('Address')->where($map)->setField('is_default',0);
    }
     public function delAddress(){
        $userId = $this->_ifLogin();
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->_err('id不能为空');

        $result = M('Address')->where(array('user_id' => $userId, 'id'=>$id))->delete();
        if($result === false){
            $this->_err('','sys_err');
        }elseif($result === 0){
            $this->_err('数据没有变化');
        }else{
            $this->_ok();
        }
   }
    public function setDefault(){
        $userId = $this->_ifLogin();
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->_err('id不能为空');
        $result = M('Address')->where(array('user_id' => $userId))->setField('is_default',0);
        $result = M('Address')->where(array('user_id' => $userId ,'id'=>$id))->setField('is_default',1);
        if($result === false){
            $this->_err('','sys_err');
        }elseif($result === 0){
            $this->_err('数据没有变化');
        }else{
            $this->_ok();
        }
    }
}
// http://localhost:8015/index.php?m=Home&c=Address&a=delAddress&id=1
// http://localhost:8015/index.php?m=Home&c=Address&a=setDefault