<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {//注意控制器名首字母大写
    function __construct(){
        parent::__construct();//调用父类的构造函数。这里的父类是TP的核心控制器
        C('DEFAULT_THEME','');
    }
    public function t1(){
        session('test','测试读写session成功');
        $this->display();
    }
    public function t2(){
        $this->display();
    }

    public function verify(){  //验证码练习
        ob_end_clean(); //清除输出缓存
        $config = array(
            'fontSize' => '30px',
            'length'   => 5,
            'useNoise' => true,
            'useZh'    => true,
            'fontttf' => '5.ttf'
        );
        $verify = new \Think\Verify($config);  //实例化验证码类
        $verify->entry(1);//输出验证码
        //array('verify_code'=>'当前验证码的值','verify_time'=>'验证码生成的时间戳')


    }
}


// http://localhost:8015/index.php?m=Home&c=Test&a=t1