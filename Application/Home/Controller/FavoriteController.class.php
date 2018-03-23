<?php 
namespace Home\Controller;
use Think\Controller;
class FavoriteController extends PubController {
    public function index(){
        $userId = $this->_ifLogin('page');
        $model = M('Favorite');//实例化模型时，传第一个左表的表名，也就是第一个左表实例化
        $model->join('__GOODS__ ON __FAVORITE__.goods_id = __GOODS__.id');//首先因为收藏表没有商品名称，价格，规格，所以这里连接商品表用来来获得商品的商品名称，价格，规格字段
        //如果结果不想要收藏的不存在的商品那就应该用内连接
        $model->join('LEFT JOIN __GOODSIMAGE__ ON __GOODS__.id = __GOODSIMAGE__.good_id');//然后因为商品表没有商品图片字段，所以再连接商品图片表，用来获得商品图片路径
        //有可能的商品没有上传图片，所以连接图片表这里就用了左连接
        $model->field('goods.id as goods_id,goods.name,goods.format,goods.price,goodsimage.filename,favorite.id');//选择列，选择结果需要哪些字段，因为是多个表字段名前面还需要加上表名
        $model->where(array('favorite.user_id' => $userId,'goodsimage.sort' => 1));//查询条件，跟以前写法一样，只是字段名前面要加表名
        $data = $model->order('favorite.id desc')->select();//设置排序方式 按收藏表的ID从大到小排序
        $this->assign('data',$data); //5 把商品记录集二维数组传给模板
        $this->display();
    }
    public function indexOld(){
        $userId = $this->_ifLogin('page');
        //1 查询当前用户的收藏的商品的id和收藏夹ID，得到类似这样一个数组array(收藏夹id = > 商品id,收藏夹id = > 商品id,收藏夹id = > 商品id)
        $arr = M('Favorite')->where(array('user_id' => $userId))->getField('id,goods_id');

        //1.1 增加一步 从$arr数组取出商品的id作来一个一维数组，给下一步当作条件的参数之一
        $goodsId = array();
        foreach ($arr as $value) {
            $goodsId[] = $value;
        }

        $map['id']  = array('in',$goodsId);
        //2 用上面得到的数组作为商品id的in条件查询商品表 得到商品记录集二维数组（条件他已经收藏的商品）商品ID in(范围)
        $data = M('Goods')->where($map)->field('id as goods_id,name,format,price')->select();

        foreach ($data as $key => $value) {//3 循环商品记录集二维数组
            // 4 给当前循环到商品记录集二维数组的第二维增加图标路径键 = 查询商品图片表的图片路径字段 条件是 商品id = 循环到的商品ID
            $data[$key]['filename'] = M('goodsimage')->where(array('good_id' => $value['goods_id']))->order('sort')->getField('filename');
            foreach ($arr as $k => $one) {
                if($one == $value['goods_id'])$data[$key]['id'] = $k;
            }
        }
        $this->assign('data',$data); //5 把商品记录集二维数组传给模板
        $this->display('index');
    }
    public function add(){
        $data['user_id'] = $this->_ifLogin();

        $data['goods_id'] = I('get.id');
        $rules = array(
            array('goods_id','number','goods_id必须是数字',2),
            array('goods_id','1,4294967295','goods_id的大小必须在1到4294967295范围内',2,'between'),
        );
        $model = M('Favorite');

        //判断提交来的商品ID是否存在
        if(M('Goods')->where(array('id' => $data['goods_id']))->getField('id') === null )$this->_err('此商品不存在');

        //判断提交来的商品是否已经加入收藏
        $model = M('Favorite');
        if($model->where(array('goods_id' => $data['goods_id'],'user_id' => $data['user_id']))->getField('id') !== null )$this->_err('此商品已经收藏，请不要重复收藏');

        if(!$model->validate($rules)->create($data))$this->_err($model->getError());

        $data['add_time'] = date('Y-m-d H:i:s');

        $ok = $model->add($data);
        if($ok === false)$this->_err('添加失败');
        $this->_ok();
    }
    public function del(){
        $userId = $this->_ifLogin();
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->_err('id不能为空');
        $ok =  M('Favorite')->where(array('user_id' => $userId,'id' => $id))->delete();
        if($ok === false)$this->_err('删除失败');
        $this->_ok();
    }
}
// http://localhost:8015/index.php?m=Home&c=Favorite&a=add&id=1
// http://localhost:8015/index.php?m=Home&c=Favorite&a=del&id=1