<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends PubController {
    public function index(){
        //控制器接收get传来的一级分类id  I(‘get.id’) 如果为空就让id等于排第一的一级分类的ID，
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $category = getCategoryData();
        if($id == ''){
            $id = $category[0]['id'];//如果为空就让id等于排第一的一级分类的ID，
        }

        //获取一级分类数据传给模板文件
        $this->assign('category',$category);
        $this->assign('id',$id);

        //get里传哪一个ID过来就要获取哪一个ID下的所有二级分类数据传给模板文件
        $second = getCategoryData($id);
        $this->assign('second',$second);

        //上面获取到每一个二级分类都要获取他们三级分类数据传给模板文件
        $data = array();
        foreach ($second as $key => $value) {
            //在循环里就能给每一个二级获取他的下级分类数据
            //把循环到二级分类ID传过去获取下级分类数据，
            //获取到之后给$data数组增加一个元素，把获取到的数据再赋值给这个新增加的元素
            $data[] = getCategoryData($value['id']);
        }

        //因为是循环二级分类，在循环里给每个二级分类获取它的三级分类数据
        //所以二级分类数据的下标就会三级分类数据一维下标对应

        $this->assign('data',$data);
        $this->display();
    }
    public function getCategory(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);//FILTER_SANITIZE_NUMBER_INT 表示过滤非数字
        if($id == ''){
            $arr = array(
                'code' => 'err',
                'msg' => 'id必须是数字，并且不能为空',
            );
            echo $this->ajaxReturn($arr);
        }
        $data = getCategoryData($id);//获取这个ID的分类的下级分类数组(直接调用 getCategoryData)
        $arr = array(
           'code' => 'ok',
           'msg' => '获取下级分类成功',
           'data' => $data,
        );
        echo $this->ajaxReturn($arr);
    }
}
// http://localhost:8015/index.php?m=Home&c=Category&a=getCategory&id=22
// http://pc2016:8015/index.php?m=Home&c=Category&a=getCategory&id=440000000