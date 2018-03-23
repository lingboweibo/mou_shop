<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends PubController {
    public function index(){
        //my_dump(__ROOT__ . '/' . MODULE_NAME . '/' . C('DEFAULT_THEME'));
        $this->display();
        // http://localhost:8065/mou_shop/Home/View/lsh/css/pub.css
    }
    public function switchTheme(){
        $theme = I('get.t');
        if($theme != '' && $theme != 'lsh' && $theme != 'lgy' && $theme != 'jyw'){
            $this->error($theme . '这个主题不存在');
        }
        if($theme == ''){//如果传来的主题名称是空 就显示页面
            $this->display();
        }else{//如果传来的主题名称不是空的，就切换主题，然后跳转回首页
            C('DEFAULT_THEME',$theme);
            session('default_theme',$theme);
            redirect(U('index'), 0, '');
        }
    }
    // http://localhost:8015/index.php?m=Home&c=Index&a=switchTheme
    // 
    // http://localhost:8065/index.php?m=Home&c=Goods&a=index
}