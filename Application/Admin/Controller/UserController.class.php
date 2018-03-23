<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends PubController{
    public function index(){
        $model = M('User');
        $key_word = I('get.key_word');//获取get提交来的搜索关键字
        $id       = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $map['is_del'] = array('in','0,2');
        if($key_word != ''){//判断如果提交来的搜索关键字不为空，那就增加下面一个模糊搜索条件
            $key_word = trim($key_word);
            $name = '搜索结果';
            $map['username|name|mobile|nickname|email|qq|address|wechat'] = array('LIKE','%' . $key_word . '%');//这样表示查询商品名称字段有$key_word变量值的记录，前面%表示匹配前面有其它字符串的，后面%表示匹配后面有其它内容
        }
        if($id != ''){
            $map = array('id' => $id);//如果用ID搜索，就忽略其它条件
            $name = '根据ID搜索';
        }

        $count = $model->field('count(id) as count')->where($map)->find();//先获取记录数 页面显示用和分页类要用
        $this->assign('count',$count['count']);

        $page     = new \Think\Page($count['count'],8);
        $pageHtml = $page->show();
        $this->assign('pageHtml',$pageHtml);//把分页链接传给模板文件
        $data = $model->where($map)->limit($page->firstRow.','. $page->listRows)->select();
        $this->assign('data',$data);
        $this->assign('key_word',$key_word);
        $this->assign('id',$id);
        $this->display();
    }
    public function add(){
        $this->display();//需要模板的页面就先写一行渲染模板的代码
    }
    public function addSubmit(){
        $data['username']       = I('post.username');
        $data['password']       = I('post.password');
        $data['repassword']     = I('post.repassword');
        $data['name']           = I('post.name');
        $data['nickname']       = I('post.nickname');
        $data['sex']            = I('post.sex');
        $data['job_id']         = I('post.job_id');
        $data['birth']          = I('post.birth');
        $data['mobile']         = I('post.mobile');
        $data['email']          = I('post.email');
        $data['qq']             = I('post.qq');
        $data['wechat']         = I('post.wechat');
        $data['city_id']        = I('post.city_id');//这里获取到的是数组，因为表单里可能会有多同名的地区选择框，地区选择框的name后面也加了[]
        $data['address']        = I('post.address');
        $data['is_del']         = I('post.is_del');
        $data['add_time']       = date('Y-m-d H:i:s');

        //索引数组的 最后一个元素的下标 = 数组元素个数 - 1
        //还要处理 如果最后一个为空，就要获取倒数第二个
        $city_id = $data['city_id'][count($data['city_id']) - 1];
        if($city_id == ''){
            $city_id = $data['city_id'][count($data['city_id']) - 2];
        }
        $data['city_id'] = $city_id;//$data['city_id']在前面它是一个数组，但模型的create、add这些方法需要的$data['city_id'] 不是数组，而且是一个城市ID
         //所以这里把 $data['city_id'] 重新赋值最后一个不为空的城市选择框的value

        $model = D('user');
        if (!$model->create($data)){
            $this->error($model->getError());
        }
        $data['password'] = myPassword($data['password']);
        $ok = $model->add($data);
        if($ok === false)$this->error('添加失败');
        $this->success('添加成功',U('index'));
    }
    public function forAdd(){//批量添加多个会员进数据库，方便测试分页
        $model = M('user');
        for($i=1;$i<800;$i++){
            //下面这几行代码是给要添加进数据会员表的数据赋值，这些大部分值会随着循环体内$i的变化而变化，所以能够实现批量添加的用户名不重复
            $data['username']       = 'testf_' . $i;
            $data['password']       = 'testf_' . $i;
            $data['name']           = '测试号_' . $i;
            $data['city_id']        = '110000000';
            $data['address']        = '测试地址_' . $i;
            //给要添加进数据会员表的数据赋值结束

            $ok = $model->add($data);//执行模型的添加数据的方法，将数据添加到会员表里
            if($ok === false){
                echo $i , '失败<br>';
            }else{
                echo $i , '成功<br>';
            }
        }
    }
    public function edit(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);//FILTER_SANITIZE_NUMBER_INT 表示过滤非数字
        if($id == '')$this->error('id不能为空');

        $model = M('user');
        $data = $model->where(array('id'=>$id))->find();
        if($data === false)$this->error('出错了，原因' . $model->getDbError());//提示出错之后，后面的代码不会执行
        if($data === null)$this->error('找不到这个会员');
        $this->assign('data',$data);
        $this->display();
    }
    public function editSubmit(){
        $id = I('post.id','',FILTER_SANITIZE_NUMBER_INT);
        $data = I('post.');//用这个方法获取提交来的字段之后一般要用field 来更新，避免用户提交他没有权限更新字段
        //这样要保存的数据的字段名，不是由我们写的，而由用户提交的，所以这些字段名就不能信任它，所以一般要用field来实现选择要更新的字段

        // $city_id = $data['city_id'][count($data['city_id']) - 1];
        // if($city_id == ''){
        //     $city_id = $data['city_id'][count($data['city_id']) - 2];
        // }
        $city_id = getLastPid('city_id');
        $data['city_id'] = $city_id;//$data['city_id']在前面它是一个数组，但模型的create、add这些方法需要的$data['city_id'] 不是数组，而且是一个城市ID
         //所以这里把 $data['city_id'] 重新赋值最后一个不为空的城市选择框的value

        if($data['password'] == '')unset($data['password']);
        if($data['birth'] == '')unset($data['birth']);
        $model = D('user');

        //要增加判断用户名不能跟别人的重复
        //从数据库里查询这个用户有没有被别人使用
        $map['username'] = $data['username'];
        $map['id'] = array('NEQ',$id);
        //select 会获取符合条件的所有记录，包括所有字段
        //find 会获取符合条件的一条记录，包括所有字段
        //getField 会获取符合条件的一条记录的一个字段值
        //读取的东西越少，性能速度就越快，占用的内存也越小，能承受的并发量也越大
        if($model->where($map)->getField('id') !== NULL)$this->error('此用户名已被别人使用!');
        //模型用唯一规则验证，“只要数据库里有这个用户名就不能通过验证”
        //插入的验证就是只要数据库里有这个用户名就不能通过验证
        //更新的验证就要只要数据库里有这个用户名 并且这个用户名不是自己在使用 就不能通过验证
        
        if($model->create($data) === false){//create时是判断数据里有没有主键，如果数据有主键就说明更新，没主键就添加
            $this->error($model->getError());
        }
        if(isset($data['password']))$data['password'] = myPassword($data['password']);
        $ok = $model->where(array('id' => $id))->field('username,password,name,sex,mobile,nickname,job_id,email,qq,birth,city_id,address,wechat')->save($data);
        if($ok === false)$this->error($model->getError());//如果调用了$this->error 之后不会执行后面的代码
        if($ok === 0){
            $this->success('数据没有被改变，您可能什么也没有改', U('index'));//注意：如果调用了$this->success 之后还会执行后面的代码
        }else{
            $this->success('修改成功', U('index'));
        }
    }
    public function del(){
        $this->_setIsDel(1,'删除','User');
    }
    public function stop(){
        $this->_setIsDel(2,'停用','User');
    }
    public function recovery(){
        $this->_setIsDel(0,'恢复','User');
    }
}
// http://localhost:8015/index.php?m=Admin&c=User&a=index
// http://localhost:8065/mou_shop/index.php?m=Admin&c=User&a=index