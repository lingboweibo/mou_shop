<?php 
namespace Admin\Controller;
use Think\Controller;

class PermissionController extends PubController { 
    public function index(){//权限列表
        //查询权限表当前页的记录，得到一个data数组
        //循环data数组{
        //  联合 查询permission_user表  和管理员表
        //  条件是:权限ID = 当前循环到的data数组里的id的记录
        //  只查询管理员ID字段和管理员姓名字段
        //  用getField(ID,姓名)查询，得到ID为键姓名为值的一维数组 赋值给$data[$key]['permission_user']
        //}
        $key_word = I('get.key_word');
        $searchId = I('get.searchId','',FILTER_SANITIZE_NUMBER_INT);
        $map = array();
        if($key_word != ''){//判断如果提交来的搜索关键字不为空，那就增加下面一个模糊搜索条件
            $key_word = trim($key_word);
            $name = '搜索结果';
            $map['permission_name|controller_name|action_name|permission_user'] = array('LIKE','%' . $key_word . '%');//这样表示查询商品名称字段有$key_word变量值的记录，前面%表示匹配前面有其它字符串的，后面%表示匹配后面有其它内容
        }
        if($id != ''){
            $map = array('id' => $id);//如果用ID搜索，就忽略其它条件
            $name = '根据ID搜索';
        }
        $model = M('Permission');
        $count = $model->where($map)->count();
        $page     = new \Think\Page(count($data),12);
        $pageHtml = $page->show();
        $data = $model->where($map)->limit($page->firstRow. ','. $page->listRow)->order('order_no')->select();
        //查询多条，结果为二维数组
        foreach ($data as $key => $value) {
            $data[$key]['permission_user'] = M('permission_user')
                                             ->join('__ADMIN__ ON __PERMISSION_USER__.admin_id = __ADMIN__.id')
                                             ->where(array('permission_user.permission_id' => $value['id']))
                                             ->field('admin.name')
                                             ->limit(5)
                                             ->select();
        }
        // $data = M('Permission')
        //         ->join('LEFT JOIN __PERMISSION_USER__ ON __PERMISSION_USER__.permission_id = __PERMISSION__.id')
        //         ->join('LEFT JOIN __ADMIN__ ON __PERMISSION_USER__.admin_id = __ADMIN__.id')
        //         ->field('permission.id,permission.permission_name,permission.controller_name,permission.action_name,admin.name as permission_user')
        //         ->where($map)
        //         ->limit($page->firstRow.','. $page->listRows)->order($orderField)
        //         ->select();
                
        //适用于按id排序
        // for ($key=0;$key<count($data);$key++) {
        //    if( $data[$key]['id'] == $data[$key+1]['id']){
        //      $data[$key]['permission_user'] = $data[$key]['permission_user'] . ' ' .  $data[$key+1]['permission_user'];
        //      unset($data[$key+1]);
        //    }
        // }
        $this->assign('searchId',$searchId);
        $this->assign('key_word',$key_word);
        $this->assign('pageHtml',$pageHtml);
        $this->assign('count',count($data));
        $this->assign('data',$data);
        $this->display();
    }

    public function more(){//更多管理员
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');
        $model = M('Permission');
        $data = $model->where(array('id'=>$id))->find();
        if($data === false){
            $this->error('查询出错');
        }elseif($data ==  NULL){
            $this->error('没有找到相关记录');
        }
        $map['permission_user.permission_id'] = $id;//查询条件 管理员权限表的权限id = 提交来的$id
        $hasUser = M('permission_user')
                ->join('__ADMIN__ ON __PERMISSION_USER__.admin_id = __ADMIN__.id')
                ->where($map)
                ->field('admin.name')
                ->select();
        $this->assign('data',$data);
        $this->display();
    }
    public function add(){//添加权限页面
        $type = I('get.type');
        $data = M('Permission')->field('id,permission_name')->order('order_no')->select();
        $this->assign('data',$data);
        $this->assign('type',$type);
        $this->display();
    }
    public function err($s){
        $this->error($s);
    }
    public function addSubmit(){
        $model = D('Permission');
        $data = $model->getInsertData($this);
        $id = $model->add($data);//添加数据时用$data
        if($id === false){
            $model->rollback();//回滚事务
            $this->error('添加失败');
        }
        $model->commit();//提交事务
        $this->success('添加成功！',U('index'));
    }
    public function edit(){//修改权限页面
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');

        //读取权限表的一条数据（条件是id=传的ID）传给模板文件
        $data = M('Permission')->where(array('id'=>$id))->find();
        if($data === false)$this->error('找不到记录');
        $this->assign('data',$data);

        //读取所有管理员的ID和姓名传给模板文件（id 是要写入 permission_user 表的，姓名是在要页面上显示的）
        $map['is_del']  = array('in','0,2');
        $user = M('admin')->where($map)->getField('id,name');
        $this->assign('user',$user);

        //联合查询有当前传的权限id的权限的管理员的id 传给模板文件
        $hasUser = M('permission_user')
            ->join('__ADMIN__ ON __PERMISSION_USER__.admin_id = __ADMIN__.id') //连接条件是 管理员权限表的管理员id =  管理员表的id
            ->where(array('permission_user.permission_id' => $id))//查询条件是 管理员权限表的权限id = 提交来的$id
            ->getField('permission_user.admin_id',true);//这次只查询一个管理员id字段就行，用第二个参数为true，结果是所有符合条件的管理员的id 是一维数组
        $this->assign('hasUser',$hasUser);
        $this->assign('user',$user);
        $this->display();
    }
    public function editSubmit(){//修改权限接收
        //更新权限表permission
        //把 permission_user 表里所有权限ID=当前提交来的权限ID的记录删除
        //把勾选的管理员的ID和 当前提交来的权限ID 循环写入  permission_user 表
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');
        $admin_id = I('post.admin_id');
        foreach ($admin_id as $key => $value) {
            if(is_numeric($value) === false){
                $this->error('第'. ($key + 1) . '个管理员的id不是数字类型');
            }
        }

        $data['permission_name'] = I('post.permission_name');
        $data['controller_name'] = I('post.controller_name');
        $data['action_name'    ] = I('post.action_name');
        $data['id'    ] = I('post.id');

        $model = D('Permission'); //为了调用模型的验证方法
        if($model->create($data) === false) $this->error($model->getError());
        //更新权限表permission
        $model->save($data);

        //把 permission_user 表里所有权限ID=当前提交来的权限ID的记录删除
        $model = D('Permission_user');
        $model->startTrans();//开启事务处理
        $model->where(array('permission_id'=>$id))->delete();
        //把勾选的管理员的ID和 当前提交来的权限ID 循环写入  permission_user 表
        foreach ($admin_id as $key => $value) {
            $newData['admin_id'] = $value;
            $newData['permission_id'] = $id;
            if($model->add($newData) === false){
                $model->rollback(); ////事务回滚 撤消操作 恢复 开启事务处理 之前的数据
                $this->error($model->getDbError());
            }
        }
        $model->commit(); //成功了就提交事务，提交了就不能回滚了
        $this->success('修改权限成功',U('index'));
    }

    public function del(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');
        $model = M('Permission');
        $model->where(array('id'=>$id))->delete();
        $result = D('Permission_user')->where(array('permission_id'=>$id))->delete();
        if($result === false){
            $this->error('删除失败');
        }
        $this->success('权限删除成功',U('index'));
    }

    public function OrderUp(){
        $this->_setOrder('上移');
    }
    public function OrderDown(){
        $this->_setOrder('下移');
    }
    private function _setOrder($type){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        $Field = 'order_no';

        $model = M('permission');
        $arr = $model->field('id,' . $Field)->order($Field)->select();

        foreach ($arr as $key => $value) {//获取 传来的 权限ID 在 所有权限ID和序号的数组里的下标
            if($value['id'] == $id){
                $thisIndex = $key;
                break;
            }
        }

        if($type == '下移'){
            if($thisIndex == count($arr) -1)$this->error('此权限已经是排在最后不能下移');
            $nextIndex = $thisIndex + 1;//获取下一个权限的下标
        }else{
            if($thisIndex == 0)$this->error('此权限已经是排在最前面不能上移');
            $nextIndex = $thisIndex - 1;//获取上一个权限的下标
        }
        $model->startTrans();//开启事务处理
        $ok = $model->where(array('id' => $arr[$thisIndex]['id']))->setField($Field,$arr[$nextIndex][$Field]);
        if($ok){
            $ok = $model->where(array('id' => $arr[$nextIndex]['id']))->setField($Field,$arr[$thisIndex][$Field]);
            if($ok){
                $model->commit();//成功了就提交事务，提交了就不能回滚了
                redirect($_SERVER['HTTP_REFERER'], 0, '页面跳转中...');
            }else{
                $model->rollback();//事务回滚 撤消操作 恢复 开启事务处理 之前的数据
                $this->error($model->getDbError());
            }
        }else{
            $model->rollback();//事务回滚 撤消操作 恢复 开启事务处理 之前的数据
            $this->error($model->getDbError());
        }
    }

}

