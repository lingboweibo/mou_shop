<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends PubController {
    public function index(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT); //这里的id指分类id
        if($id == '')$this->error('id不能为空');
        $this->assign('id',$id);
        $this->display();
    }
    public function detail(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$this->error('id不能为空');//页面上的错误提示应该用错误页面显示错误提示，接口的返回错误提示就应该按接口要求的格式返回

        $model = M('Goods');
        $data = $model->where(array('id'=>$id))->find();
        if($data == false)$this->error('找不到这个商品');

        $model = M('Goodsimage');
        $list = $model->where(array('good_id'=>$id))->getField('filename',true);

        $this->assign('list',$list);
        $this->assign('data',$data);
        $this->display();
    }
    public function lists(){
        $rules = array(
            array('cat_id','number','cat_id必须是数字',2),
            array('p','number','p必须是数字',2),
            array('page_size','number','page_size必须是数字',2),

            array('cat_id','1,4294967295','cat_id的大小必须在1到4294967295范围内',2,'between'),
            array('p','1,4294967295','p的大小必须在1到4294967295范围内',2,'between'),
            array('page_size','1,255','page_size的大小必须在1到4294967295范围内',2,'between'),
            array('order_by',array('is_new','prom_2','prom_3','sales_sum','price_0','price_1'),'order_by非法',2,'in'),
        );

        $data['cat_id'   ] = I('get.cat_id');
        $data['p'        ] = I('get.p');
        $data['page_size'] = I('get.page_size');
        $data['order_by' ] = I('get.order_by');

        $model = M();//实例化空模型类 用来验证传来的get参数是否合法，这些参数不某一个表里的字段，所以用空模型
        if ($model->validate($rules)->create($data) === false){//因为此模型没有定义表，所以也没表关联的字段，所以通过验证的时侯 create 会返回一个空数组
            //create 它返回的数据会自动过滤掉表里没有的字段
            //所以这里改用 === false来判断是否没通过验证
             $this->_err($model->getError());
        }
        //模型要关联某一个表的话，他的常用作用是：验证、查询、设置条件、设置排序
        //空模型是没有表的，不能实现 查询、设置条件、设置排序 …… 需要表才可以用的功能
        //空模型没有关联表功能少，比较节省资源

        $model = M('Goods');
        //1 如果传来的商品分类ID不为空就给商品表模型增加相关条件
        if($data['cat_id'] != ''){
            $temp = getCategoryAllSun($data['cat_id']);
            $temp[] = $data['cat_id'];
            $map['cat_id']  = array('in',$temp);
        }else{
            $map = array();
        }

        //2 如果页数为空就设置默认为第一页 （这一条代码可能不用写,TP分页类自动实现）
        if($data['page_size'] == '')$data['page_size'] = 12;//3 如果每页记录数为空就设置默认为12
        $count = $model->where($map)->count();//4 获取 总记录数
        $page = new \Think\Page($count,$data['page_size']);//5 实例化分页类

        $page->show();
        $pages = $page->totalPages;//6 获取 总页数

        //7 判断排序方式相应设置商品表模型的排序方式
        $orderField = 'goods.sort';//默认用序号字段排序
        if($data['order_by'] == 'is_new'){
            $orderField = 'goods.is_new desc , ' . $orderField;
        }elseif($data['order_by'] == 'prom_2'){
            $map['prom_type'] = 1;
        }elseif($data['order_by'] == 'prom_3'){
            $orderField = 'goods.prom_type desc ,' . $orderField;
        }elseif($data['order_by'] == 'sales_sum'){
            $orderField = 'goods.sales_sum desc ,' . $orderField;
        }elseif($data['order_by'] == 'price_0'){
            $orderField = 'goods.price ,' . $orderField;
        }elseif($data['order_by'] == 'price_1'){
            $orderField = 'goods.price desc ,' . $orderField;
        }
        //8 然后查询当前页需要的数据  就是商品列表数组
        // $goods_list = $model->field('id,name,price,format,is_new,prom_type')->where($map)->limit($page->firstRow.','. $page->listRows)->order($orderField)->select();
        // $imgModel = M('Goodsimage');
        // //获取每个商品的图片路径
        // foreach ($goods_list as $key => $value) {//循环当前页的所有商品
        //     //根据商品ID 查找商品图片表只要查找图片路径字段
        //     $goods_list[$key]['filename'] = $imgModel->where(array('good_id' => $value['id']))->order('sort')->getField('filename');
        //     if($goods_list[$key]['filename'])$goods_list[$key]['filename'] .= '.thumb.jpg';
        // }

        //方法一:联合查询
        $map['goodsimage.sort'] = 1; //使用该条件限定图片的个数只能为一个
        $goods_list = $model->join('__GOODSIMAGE__ ON __GOODSIMAGE__.good_id = __GOODS__.id')
                            ->field('goods.id,goods.name,goods.price,goods.format,goods.is_new,goods.prom_type,goodsimage.filename')
                            ->order($orderField)
                            ->limit($page->firstRow.','. $page->listRows)
                            ->where($map)
                            ->select();

        //方法二：视图查询（如此，上面的$orderField、$map要大改正）
        //create algorithm = merge view image_goods_view as select goods.id,goods.name,goods.price,goods.format,goods.is_new,goods.prom_type,goodsimage.filename,goodsimage.sort from goods inner join goodsimage on goodsimage.good_id = goods.id
        //$goods_list = M('image_goods_view')->order()->where()->limit($page->firstRow.','. $page->listRows)->select()


        foreach ($goods_list as $key => $value) {//循环当前页的所有商品
            if($goods_list[$key]['filename'])$goods_list[$key]['filename'] .= '.thumb.jpg';
        }
        
        $reArr['img_url_fix'] = 'http://' . $_SERVER['HTTP_HOST'] . __ROOT__  . '/Uploads/';
        $reArr['count'      ] = $count;
        $reArr['page_count' ] = $pages;
        $reArr['goods_list' ] = $goods_list;
        $this->_ok($reArr);
    }
}