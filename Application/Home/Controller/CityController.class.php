<?php
namespace Home\Controller;
use Think\Controller;
class CityController extends PubController {
    public function getCity(){
        // 1、先获取get传来的城市ID
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);//FILTER_SANITIZE_NUMBER_INT 表示过滤非数字

        // 2、判断这ID是否合法，如果不合法就按json格式返回错误；
        if($id == ''){
            $arr = array(
                'code' => 'err',
                'msg' => 'id必须是数字，并且不能为空',
            );
            echo $this->ajaxReturn($arr);
        }

        // 3、获取这个ID的城市的下级城市数组(直接调用 getCityData)
        $data = getCityData($id);

        // 4、用前面获取到的下级城市数组，拼成一个符合接口要求的数据的数组；
        $arr = array(
               'code' => 'ok',
               'msg' => '获取下级城市成功',
               'data' => $data,
            );
        // 5、最后把这个数组转成json格式，echo 返回
        echo $this->ajaxReturn($arr);
    }
}
// http://localhost:8015/index.php?m=Home&c=City&a=getCity&id=440000000
// http://pc2016:8015/index.php?m=Home&c=City&a=getCity&id=440000000html:5













































































































































































