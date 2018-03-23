<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends PubController{
    //控制器里可以用 m=应用名&c=模块名&a=操作名 访问的函数在TP就叫操作
    //类里面的函数就叫方法
    public function index(){
        $model          = M('Goods');
        $map            = array();
        $key_word       = I('get.key_word');//获取get提交来的搜索关键字
        $id             = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $cat_id         = I('get.cat_id','',FILTER_SANITIZE_NUMBER_INT);
        $price_by       = I('get.price_by','',FILTER_SANITIZE_NUMBER_INT);
        $is_new         = I('get.is_new','',FILTER_SANITIZE_NUMBER_INT);
        $is_recommend   = I('get.is_recommend','',FILTER_SANITIZE_NUMBER_INT);
        $prom_type      = I('get.prom_type','',FILTER_SANITIZE_NUMBER_INT);
        $price_start    = I('get.price_start','',FILTER_SANITIZE_NUMBER_INT);
        $price_end      = I('get.price_end','',FILTER_SANITIZE_NUMBER_INT);
        $integral_start = I('get.integral_start','',FILTER_SANITIZE_NUMBER_INT);
        $integral_end   = I('get.integral_end','',FILTER_SANITIZE_NUMBER_INT);

        if($cat_id != ''){
            $temp = getCategoryAllSun($cat_id);
            $temp[] = $cat_id;
            $map['cat_id']  = array('in',$temp);
            $name = categoryIdToName($cat_id);//根据分类ID返回分类名称
            //如果get有传来分类id，再获取它的所有下级作为in条件,也就是不只是这个ID相等的可以查询，还要能查询出儿子，孙子级的产品……
        }else{
            $name = '所有';
        }
        if($price_start !== '' || $price_end !== ''){//判断开始价格范围 或 结束价格范围 不为空
            if($price_start !== '' && $price_end !== ''){//如果要用两个数字之间的范围搜索就要 判断开始价格范围 和 结束价格范围 都不为空，才可以用之间范围搜索
                $map['price']  = array('between', $price_start . ',' . $price_end);//如果两个价格都有提交就用 之间范围条件
            }else{
                if($price_start)$map['price'] = array('EGT',$price_start);//如果只提交开始价格就用 大于或等于条件
                if($price_end)$map['price'] = array('ELT',$price_end);//如果只提交结束价格就用 小于或等条件
            }
        }

        if($integral_start !== '' || $integral_end !== ''){
            if($integral_start !== '' && $integral_end !== ''){
                $map['give_integral']  = array('between', $integral_start . ',' . $integral_end);//如果两个价格都有提交就用 之间范围条件
            }else{
                if($integral_start)$map['give_integral'] = array('EGT',$integral_start);
                if($integral_end)$map['give_integral'] = array('ELT',$integral_end);
            }
        }

        if($key_word != ''){//判断如果提交来的搜索关键字不为空，那就增加下面一个模糊搜索条件
            $key_word = trim($key_word);
            $name = '搜索结果';
            $map['name|keywords'] = array('LIKE','%' . $key_word . '%');//这样表示查询商品名称字段有$key_word变量值的记录，前面%表示匹配前面有其它字符串的，后面%表示匹配后面有其它内容
        }
        if($is_new == 1)$map['is_new'] = 1;
        if($is_recommend == 1)$map['is_recommend'] = 1;

        if($prom_type === '0'){
            $map['prom_type'] = 0;
        }elseif($prom_type == '1'){
            $map['prom_type'] = 1;
        }elseif($prom_type == '2'){
            $map['prom_type'] = 2;
        }

        if($id != ''){
            $map = array('id' => $id);//如果用ID搜索，就忽略其它条件
            $name = '根据ID搜索';
        }
        $orderField = 'sort,id';
        if($price_by == 2)$orderField = 'price desc,sort';
        if($price_by == 1)$orderField = 'price,sort';

        $count = $model->field('count(id) as count')->where($map)->find();
        $page  = new \Think\Page($count['count'],12);
        $pageHtml = $page->show();
        $data = $model->field('id,cat_id,name,price,is_on_sale,sort,is_recommend,is_new,last_update,sales_sum,prom_type,give_integral')->where($map)->limit($page->firstRow.','. $page->listRows)->order($orderField)->select();

        $this->assign('name',$name);
        $this->assign('data',$data);
        $this->assign('pageHtml',$pageHtml);
        $this->assign('count',$count['count']);
        $this->assign('key_word',$key_word);
        $this->assign('price_by',$price_by);
        $this->assign('is_new',$is_new);
        $this->assign('is_recommend',$is_recommend);
        $this->assign('prom_type',$prom_type);
        $this->assign('price_start',$price_start);
        $this->assign('price_end',$price_end);
        $this->assign('integral_start',$integral_start);
        $this->assign('integral_end',$integral_end);
        $this->assign('get',I('get.'));//获取所有get参数，传给模板
        $this->assign('id',$id);
        $this->display();
    }
    public function add(){
        $id         = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        // $order_id   = I('get.order_id','',FILTER_SANITIZE_NUMBER_INT);//表示排在哪个id的字段前面或后面
        // $type       = I('get.type');//type= qm在当前分类的前面插入分类 type=hm 在前当分类的后面插入分类
        // if($id == '')$id = 0;
        $this->assign('id'      ,$id);
        // $this->assign('order_id',$order_id);
        // $this->assign('type'    ,$type);
        $this->display();
    }
    public function err($s){
        $this->error($s);
    }
    public function addSubmit(){
        $model = D('Goods');
        //1、获取提交来的内容
        $data = $model->getInsertData();//获取提交来的内容（自动过滤为空的字段）
        if (!$model->create($data)){//2、验证提交来的内容（用模型验证）
            $this->error($model->getError());
        }
        $ok = $model->add($data);//3、保存进数据库（add）
        if($ok === false)$this->error('添加失败');
        $this->success('添加成功',U('index'));
    }
    public function edit(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        $model = M('Goods');
        $data =$model->where(array('id'=>$id))->find();
        if($data === false)$this->error('出错了，原因' . $model->getDbError());//提示出错之后，后面的代码不会执行
        if($data === NULL )$this->error('找不到这个商品');//提示出错之后，后面的代码不会执行
        $this->assign('data',$data);
        $this->display();
    }

    public function editSubmit(){
        $model = D('Goods');
        $data = $model->getUpData();//获取提交来的内容 （获取要更新字段和值 有些不是提交来的，也要这个方法里被赋值了，比如更新时间）
        if (!$model->create($data)){//2、验证提交来的内容（用模型验证）
            $this->error($model->getError());
        }
        $data['id'] = I('post.id','',FILTER_SANITIZE_NUMBER_INT);
        if($data['id'] =='')$this->error('id不能为空');

        $result = $model->save($data);//更新保存用的是$data变量的数据

        if($result === false)$this->error($model->getError());
        if($result === 0){
            $this->success('数据没有被修改',U('index'));
        }else{
            $this->success('修改成功',U('index',array('id' => $data['pid'])));
        }
    }
    public function del(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        $model = M('Goods');
        $ok = $model->where(array('id' => $id))->delete();
        //delete方法的返回值是删除的记录数，如果返回值是false则表示SQL出错，返回值如果为0表示没有删除任何数据。
        if($ok == false){
            $this->error($model->getError());
        }else if($ok == 0){
            $this->error('该商品已被删除或不存在');
        }else{
            $this->success('删除成功');
        }
    }
    public function delImages(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        $model = M('Goodsimage');
        $ok = $model->where(array('id' => $id))->delete();
        //delete方法的返回值是删除的记录数，如果返回值是false则表示SQL出错，返回值如果为0表示没有删除任何数据。
        if($ok == false){
            $this->error($model->getError());
        }else if($ok == 0){
            $this->error('该商品图片已被删除或不存在');
        }else{
            $this->success('删除成功');
        }
    }
    public function clearCache(){//刷新商品分类缓存数据，一般在手动改了分类表数据之后要刷新，在后台改的后台程序会自动刷新
        S('GoodsData',null);//删除分类数据的缓存
        getParentGoodsId();//调用一次 根据分类ID返回所有父级分类ID数组 实现刷新
        $this->success('刷新分类数据的缓存成功！');
    }    
    public function OrderUp(){
        $this->_setOrder('上移');
    }
    public function OrderDown(){
        $this->_setOrder('下移');
    }
    private function _setOrder($type){
        $Field = 'sort';
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');

        $tableName = I('get.tableName');
        if($tableName == ''){
            $tableName = 'Goods';
            $map = array();//商品是在所有商品里排序，所以查询不用条件
        }elseif($tableName == 'Goodsimage'){
            $map['good_id'] = I('get.good_id','',FILTER_SANITIZE_NUMBER_INT);//商品图片是一个商品里排，所增加条件是商品ID= 传来的ID的商品
            if($map['good_id'] == '')$this->error('good_id不能为空');
        }else{
            $this->error('Goodsimage参数错误！');
        }

        //2.再找出所有商品的ID和序号 放到一个数组里
        $model = M($tableName);
        $arr = $model->where($map)->field('id,' . $Field)->order($Field)->select();
        $pid = null;
    
        foreach ($arr as $key => $value) {// 4、获取 传来的 分类的ID 在 所有商品的ID和序号的数组里的下标；
            if($value['id'] == $id){
                $thisIndex = $key;
                break;
            }
        }
        if($thisIndex === null)$this->error('找不到这个商品');

        if($type == '下移'){
            if($thisIndex == count($arr) -1)$this->error('此商品已经是排在最后不能下移');
            $nextIndex = $thisIndex + 1;//获取下一个商品的下标
        }else{
            if($thisIndex == 0)$this->error('此商品已经是排在最前面不能上移');
            $nextIndex = $thisIndex - 1;//获取上一个商品的下标
        }
        $model->startTrans();//开启事务处理
        $ok = $model->where(array('id' => $arr[$thisIndex]['id']))->setField($Field,$arr[$nextIndex][$Field]);
        if($ok){
            $ok = $model->where(array('id' => $arr[$nextIndex]['id']))->setField($Field,$arr[$thisIndex][$Field]);
            if($ok){
                $model->commit();//成功了就提交事务，提交了就不能回滚了
                redirect($_SERVER['HTTP_REFERER'], 0, '页面跳转中...');
            }else{
                $model->rollback();//事务回滚 撤消操作 恢复 开启事务处理 之前的数据
                $this->error($model->getDbError());
            }
        }else{
            $model->rollback();//事务回滚 撤消操作 恢复 开启事务处理 之前的数据
            $this->error($model->getDbError());
        }
    }
    public function soldout(){
        $this->_setIsOnSale(0,'下架','Goods');
    }
    public function putaway(){
        $this->_setIsOnSale(1,'上架','Goods');
    }
    public function uploadImage(){//上传文件页面的操作（也就是方法也就是函数）
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        $name = I('get.name');
        $this->assign('name',$name);
        $this->assign('id',$id);
        $this->display();
    }
    public function uploadImageSubmit(){//接收上传商品图片的操作（也就是方法函数）
        //初步检查提交来的参数是否合法
        $id = I('post.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        if(array_key_exists('ico',$_FILES) === false)$this->error('商品图片不能为空');
        if($_FILES['ico']['size'] == 0)$this->error('商品图片大小不能为空0');

        //保存上传图片
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 特别要注意不要允许上传PHP、APS文件，否则网站会被上传木马入侵
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $info   =   $upload->upload();
        if(!$info)$this->error($upload->getError());
        if(! array_key_exists('ico',$info))$this->error('上传图片数据错误');
        //保存上传图片代码结束

        $data['filename'] = $info['ico']['savepath'].$info['ico']['savename'];

        //生成小图
        //小图大小是496*496，但是大图也要保留，所以小图文件名就不能和大图文件名相同，小图文件名就在大图文件后面加上thumb.jpg
        $image = new \Think\Image();
        $image->open('./Uploads/' . $data['filename']);
        $image->thumb(496,496,\Think\Image::IMAGE_THUMB_CENTER)->save('./Uploads/' . $data['filename'] . '.thumb.jpg');
        //比如小图是 http://localhost:8015/Uploads/2017-03-20/58cf830191cd9.pngthumb.jpg
        //大图就是 http://localhost:8015/Uploads/2017-03-20/58cf830191cd9.png
        //TP在保存小图时会自动识别和转换格式

        $model = M('Goodsimage');

        $data['good_id' ] = $id;
        $data['add_time'] = date('Y-m-d H:i:s');
        $data['sort'    ] = $model->where(array('good_id' => $id))->order('sort desc')->getField('sort') + 1;//查询该商品的商品图片的最大序号 + 1

        $ok = $model->add($data);
        if($ok === false){
            $this->error('上传失败');
        }
        $this->success('上传成功！正在返回商品列表。',U('index'));
    }
    public function lookImage(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        $this->assign('name',I('get.name'));
        $this->assign('data',M('Goodsimage')->order('sort')->where(array('good_id'=>$id))->select());//一次把该商品的所有图片查询出来
        $this->display();
    }
}