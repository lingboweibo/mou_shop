<?php
namespace Home\Controller;//注意模块名首字母大写
use Think\Controller;
class PubController extends Controller {//注意控制器名首字母大写
    function __construct(){
        parent::__construct();//调用父类的构造函数。这里的父类是TP的核心控制器
        $theme = session('default_theme');
        if($theme)C('DEFAULT_THEME',$theme);
        //C('DB_HOST',$_SERVER['SERVER_NAME']);
        $this->assign('staticPath', __ROOT__ . '/Application/' . MODULE_NAME . '/View/' . C('DEFAULT_THEME'));
        $this->assign('includePath' , APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/' . C('DEFAULT_THEME') . '/include/');
        $this->assign('cart_num',session('cart_num'));
        
    }
    protected function _ok($reArr = array()){//返回ajax格式的成功的公共方法
        $reArr['code'] = 'ok';
        //if(get_client_ip() == '0.0.0.0')my_dump($reArr);
        $this->ajaxReturn($reArr);
    }
    protected function _err($msg,$code = 'parameter'){//返回ajax格式的错误的公共方法
    	if($msg == '' && $code == 'sys_err')$msg = '系统错误，请稍侯再试，或联系技术负责人修复';
        $reArr['code'] = $code;
        $reArr['msg' ] = $msg;
        //if(get_client_ip() == '0.0.0.0')my_dump($reArr);
        $this->ajaxReturn($reArr);
    }

    //接口的判断到如果是没登录的处理方式是：返回 json格式表示该功能需要登录后才能使用的状态码：not_login和补充说明
    //但是页面的判断如果没登录的处理式就不能是跟接口的一样，因为你在页面上显示json格式的错误用户一般是看不懂的，是不好的。
    //就要改成显示一个错误提示页面。
    protected function _ifLogin($page = ''){
        if(session('loginData.id') == ''){
            if($page == ''){
                $this->_err('该功能需要登录后才能使用','not_login');
            }else{
                $this->error('请登录',U('User/login'));
            }
        }else{
            $user_id = session('loginData.id');
            return $user_id;
        }
    }
}