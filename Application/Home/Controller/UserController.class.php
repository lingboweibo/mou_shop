<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends PubController {
    public function login(){
        $this->display();
    }
    public function reg(){
        $this->display();
    }
    public function editPassword(){
        $userId = $this->_ifLogin('page');
        $this->display();
    }
    public function account(){
        $userId = $this->_ifLogin('page');// 判断是否登录，同时获取用户ID
        //需要向数据库获取用户的昵称和积分传给模板,再让模板文件显示他的积分和昵称
        $this->assign('data',M('User')->where(array('id' => $userId))->field('nickname,integral')->find());
        $this->display();
    }
    public function userInfo(){//完善会员信息页面
        $userId = $this->_ifLogin('page');
        //完善会员信息
        //需要向数据库获取用户的姓名，出生日期，性别……传给模板,再让模板文件显示他的积分和昵称
        //姓名拼音和国籍因为数据库没有，就去掉这两项
        //然后增加一个城市地区下拉选择联动
        $this->assign('data',M('User')->where(array('id' => $userId))->field('name,sex,mobile,nickname,job_id,qq,birth,city_id,address')->find());
        $this->display();
    }
    public function userInfoSubmit(){
        $userId = $this->_ifLogin('page');
        $data   = I('post.');
        $data['city_id'] = getLastPid('city_id');
        //my_dump($data['city_id']);
        $model = M('User');
        $rules = array(
        array('mobile'   ,'require'     ,'手机号码不能为空'                  ,$model::MUST_VALIDATE,'regex'),
        array('mobile'   ,'11,16'       ,'手机号码的必须是11位数到16位数之间',$model::MUST_VALIDATE,'length'),
        array('name'     ,'2,32'        ,'姓名的字数必须在0到32之间'         ,$model::MUST_VALIDATE,'length'),
        array('sex'      ,'number'      ,'性别必须是数字'                    ,$model::EXISTS_VALIDATE,'regex' ),//存在字段就验证长度
        array('sex'      ,'0,255'       ,'性别的范围必须在0到255之间'        ,$model::EXISTS_VALIDATE,'between'),//存在字段就验证长度
        array('nickname' ,'2,32'        ,'昵称的字数必须在2到32之间'         ,$model::VALUE_VALIDATE,'length'),//不为空就验证
        array('job_id'   ,'number'      ,'职业必须是数字'                    ,$model::MUST_VALIDATE,'regex' ),
        array('job_id'   ,'0,4294967295','职业的范围必须在0到4294967295之间' ,$model::MUST_VALIDATE,'between'),
        array('qq'       ,'5,50'        ,'qq的字数必须在5到50之间'           ,$model::VALUE_VALIDATE,'length'),//不为空就验证
        array('city_id'  ,'number'      ,'地区必须是数字'                    ,$model::VALUE_VALIDATE,'regex' ),//不为空就验证
        array('city_id'  ,'0,4294967295','地区的范围必须在0到4294967295之间' ,$model::MUST_VALIDATE,'between'),
        array('address'  ,'0,96'        ,'详细地址的字数必须在0到96之间'     ,$model::VALUE_VALIDATE,'length'),//不为空就验证
        array('wechat'   ,'0,32'        ,'微信号的字数必须在0到32之间'       ,$model::VALUE_VALIDATE,'length'),//不为空就验证
        );
        //单选按钮如果同一个name的单选按钮组没有一项被选中，那就不会提交这个name的表单字段
        //输入框的如果是没空的，字段会提交，提交的是空值
        if($data['birth'] != ''){
            if(strtotime($data['birth']) === false)$this->error('生日格式错误，正确格式示例：1988-04-23');
        }else{
            $data['birth'] = null;
        }

        //如果没有传数据进去验证，默认就会用post数据，因为在post里city_id是数组，所以验证它会有问题
        if ($model->validate($rules)->create($data) === false){
            $this->error($model->getError());
        }

        //查询用户名等提交来的手机号并且用户id不等于当前这个用户的id的记录，只查id这个字段
        //如果能查到就说明这些手机号已被别人使用
        $model = M('User');
        $map['username'] = $data['mobile'];
        $map['id'] = array('NEQ',$userId);
        if($model->where($map)->getField('id') !== NULL)$this->error($data['mobile'] . '手机号已被别人使用');

        $data['username'] = $data['mobile'];
        $result = $model->where(array('id'=>$userId))->field('name,username,nickname,sex,mobile,job_id,qq,birth,city_id,address')->save($data);
        if($result === false){
            $this->error('修改失败！');
        }elseif($result == 0){
            $this->error('会员信息没有被修改');
        }else{
            $this->success('会员信息修改成功',U('User/account'));
        }
    }
    public function regTo(){
        // a)  接收客户端发送来的参数，验证这些参数是否合法，如果有不合法的就返回错误提示；
        $data['nickname'     ] = I('post.nickname');
        $data['mobile'       ] = I('post.mobile');
        $data['username'     ] = I('post.mobile');
        $data['password'     ] = I('post.password');

        $validateCode          = I('post.validate_code');
        if($validateCode != '9999')$this->_err('验证码错误');

        $model = D('User');
        if (!$model->create($data))$this->_err($model->getError());

        // b)  如果合法就添加进数据库，然后返回成功。
        $data['password'] = myPassword($data['password']);
        $ok = $model->add($data);
        if($ok === false)$this->_err('','sys_err');
        $this->_ok();
    }
    public function loginTo(){
        $username = I('post.username');
        $password = I('post.password');
        $model = M('User');

        //定义一个动态验证规则(它是一个数组)
        $rules = array(
            array('username','require','手机号码不能为空',1),
            array('username','3,32','手机号码字数必须在3到32之间',1,'length'),
            array('password','require','密码不能为空',1),
            array('password','3,32','密码字数必须在3到32之间',1,'length'),
        );
        if (!$model->validate($rules)->create()){
            $this->_err($model->getError());
        }
        $model->where(array('username' => $username,'is_del' => 0));//加了条件
        $data = $model->field('id,username,password')->find();

        if($data === null)$this->_err('手机号码或密码不对','user_not_find');
        if($data['password'] != myPassword($password))$this->_err('手机号码或密码不对','user_not_find');

        $data['ip'] = get_client_ip();
        unset($data['password']);
        session('loginData',$data);

        $data['last_time'] = date('Y-m-d H:i:s');
        $model->where(array('id' => $data['id']))->save($data);

        //该用户的购物车数量
        $cart_num = M('Car')->where(array('user_id'=>$data['id']))->count();
        session('cart_num',$cart_num);

        $this->_ok();//给客户端返回成功
    }

    public function quit(){ //退出登录,清除缓存
        session('loginData',null);
        session('cart_num',null);
        session('order_address_id',null);
        session('order_goodsid_num',null);
        session('order_delivery_time',null);
        session('order_invoice_type',null);
        session('order_pay_name',null);
        $this->success('退出成功',U('Index/index')); //跳转回首页
    }

    public function editPasswordApi(){
        $userId = $this->_ifLogin();
        $password = I('post.password');
        $password_old = I('post.password_old');
        $password_old = myPassword($password_old);

        $rules = array(
            array('password','require','密码不能为空',1),
            array('password','3,32','密码字数必须在3到32之间',1,'length'),
            array('password_old','require','旧密码不能为空',1),
            array('password_old','3,32','旧密码字数必须在3到32之间',1,'length'),
        );
        $model = M();
        if ($model->validate($rules)->create() === false)$this->_err($model->getError());

        $model = M('User');
        $ok = $model->where(array('user_id'=> $userId,'password'=> $password_old))->setField('password',myPassword($password));
        if($ok === false)$this->_err('','sys_err');
        if($ok === 0)$this->_err('数据没变化，可能原因是旧密码错误或新密码跟旧密码一样','sys_err');
        $this->_ok();
    }
}