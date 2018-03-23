<?php
namespace Admin\Controller;//注意模块名首字母大写
use Think\Controller;
class PubController extends Controller {//注意控制器名首字母大写
    function __construct(){
        parent::__construct();//调用父类的构造函数。这里的父类是TP的核心控制器
        //现在后台除登录控制器之外，其它的控制器都要先经过登录才能进入
        //所以这里要判断当前不是  登录控制器 才调用【断是否登录，如果没登录就跳转到登录页面】这个方法
        //判断当前控制器名就能识别出来是不是登录控制器
        if(CONTROLLER_NAME != 'Login'){
            $this->_ifLoginGo();
        //判断是否有权限查看该所在的页面
            // $model = M('permission');
            // $map['permission_user.admin_id'  ] = session('adminLoginData.id');
            // $map['permission.controller_name'] = CONTROLLER_NAME;
            // $map['permission.action_name'] = ACTION_NAME;
            // $ok = $model->join('__PERMISSION_USER__ ON __PERMISSION_USER__.permission_id = __PERMISSION__.id')
            //             ->where($map)
            //             ->getField('permission_user.id');
            // if($ok == NULL){
            //     $this->error('您没有权限访问这个页面或使用这个功能');
            // }
        }
       
    }

    //父类与子类的构造函数关系的说明：
    //如果子类在实例化时，子类没有构造函数的话，那子类就会继承父类的构造函数
    //那这样，在员工管理控制器 会员管理控制器，所有这些后台的控制器的父类都是PubController 这个后台公共控制器
    //所以所有后台控制器被实例化时，都会调用父类的构造器，他们的父类也就是 PubController 这个控制器

    protected function _ifLogin(){//判断是否登录 有的情况下没登录也不跳转。此方法实现判断是否登录，如果是已登录就返回true，没登录就返回false
        $adminId = session('adminLoginData.id');//把登录时保存登录用户信息的id读取出来
        $adminIp = session('adminLoginData.ip');//把登录时保存登录用户信息的ip读取出来
        if(empty($adminId))return false;
        if(empty($adminIp))return false;
        if($adminIp != get_client_ip())return false;//如果登录时的IP跟现在的IP不一样，也把他当作没有登录，这样是为安全考虑
        //优点是安全，缺点是如果真正管理员登录之后又换了IP他就会当作没有登录，就需要再登录新登录，如果客户不喜欢这样，他也不是需要这么安全，那就可以不判断IP是否相同
        return true;
    }
    protected function _ifLoginGo(){//判断是否登录，如果没登录就跳转到登录页面
        $ifLogin = $this->_ifLogin();//判断是否登录 如果是已登录就返回true，没登录就返回false
        if($ifLogin === false)$this->error('请登录',U('Login/login'));
    }
    protected function _setIsDel($num,$str,$tabName){//方法名前面加了_ 或加修饰符 修饰为私有的或受保护的，这样的方法 就不能通过网址访问
        //这样不能通过网址直接访问的控制器里的方法就不属于操作
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);//FILTER_SANITIZE_NUMBER_INT 表示过滤非数字
        if($id == '')$this->error('id不能为空');
        $model= M($tabName);
        $ok = $model-> where(array('id' => $id))->setField('is_del',$num);
        if($ok === false)$this->error($model->getError());//如果调用了$this->error 之后不会执行后面的代码
        if($ok === 0){
            $this->success('数据没有被改变，可能之前已经' . $str . '过', U('index'));//注意：如果调用了$this->success 之后还会执行后面的代码
        }else{
            if($tabName == 'City'){
                //如果是城市表的城市停用或删除或恢复，需要把它的上级城市的下级城市缓存清除
                //先获取上级城市ID
                $pidArr = getParentCityId($id);
                if($pidArr == false){
                    $pid = 0;
                }else{
                    $pid = $pidArr[count($pidArr) - 1];
                }
                F('city_' . $pid,NULL);
            }elseif($tabName == 'Category'){
                S('categoryData',null);//删除分类数据的缓存
            }
            $this->success($str .'成功', U('index'));
        }
    }

    protected function _setIsOnSale($isOnSale,$str,$tabName){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');

        $model = M($tabName);
        $data['is_on_sale'] = $isOnSale;
        if($isOnSale == 1){//判断如果是上架 就让$data里增加一个上架时间元素 赋值 为当前时间
            $data['on_time'] = date('Y-m-d H:i:s');
        }
        $result = $model->where(array('id'=>$id))->save($data);

        if($result === false)$this->error($str.'失败！');
        if($result === 0)$this->success('状态没有改变。',U('index'));
        else{
            $this->success($str.'成功!',U('index'));
        }
    }
    protected function _test(){
        echo '继承成功';
    }
}