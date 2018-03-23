<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends PubController{
    //控制器里可以用 m=应用名&c=模块名&a=操作名 访问的函数在TP就叫操作
    //类里面的函数就叫方法
    public function index(){
        $nameArr = array();
        $parArr = array();
        $model = M('Category');
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);//分类ID

        $key_word = I('get.key_word');//获取get提交来的搜索关键字
        $searchId = I('get.searchId','',FILTER_SANITIZE_NUMBER_INT);//搜索ID
        if($id == ''){
            $id = $id;
        }else{
            $parArr = getParentCategoryId($id);
            $parArr[] = $id;
            foreach ($parArr as $value) {
                $nameArr[] = categoryIdToName($value);
            }
        }
        $this->assign('parArr',$parArr);
        $this->assign('nameArr',$nameArr);

        $map['pid'] = $id;
        $map['is_del']  = array('in','0,2');

        if($key_word != ''){//判断如果提交来的搜索关键字不为空，那就增加下面一个模糊搜索条件
            $key_word = trim($key_word);
            $name = '搜索结果';
            $map['name'] = array('LIKE','%' . $key_word . '%');
            unset($map['pid']);
        }
        if($searchId != ''){
            $map = array('id' => $searchId);//如果用ID搜索，就忽略其它条件
            $name = '根据ID搜索';
        }
        if(I('get.order') == 'index'){
            $orderField = 'order_index';
        }else{
            $orderField = 'order_no';
        }

        $count = $model->field('count(id) as count')->where($map)->find();
        $page  = new \Think\Page($count['count'],12);
        $pageHtml = $page->show();
        $data = $model->where($map)->limit($page->firstRow.','. $page->listRows)->order($orderField)->select();

        $this->assign('searchId',$searchId);
        $this->assign('key_word',$key_word);
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->assign('pageHtml',$pageHtml);
        $this->assign('count',$count['count']);
        $this->display();
    }
    public function add(){
        $id         = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        $order_id   = I('get.order_id','',FILTER_SANITIZE_NUMBER_INT);//表示排在哪个id的字段前面或后面
        $type       = I('get.type');//type= qm在当前分类的前面插入分类 type=hm 在前当分类的后面插入分类
        if($id == '')$id = 0;
        $this->assign('id'      ,$id);
        $this->assign('order_id',$order_id);
        $this->assign('type'    ,$type);
        $this->display();
    }
    public function err($s){
        $this->error($s);
    }
    public function addSubmit(){
        $model = D('Category');//实例化分类表模型 也就是 Application\Admin\Model\CategoryModel.class.php 这个类的一个实例
        //把获取数据和验证数据都放到自定义的模型文件里，这个函数还会更新受影响的分类的序号
        $data = $model->getInsertData($this);//注意这里把$this传了过去

        $id = $model->add($data);//添加数据时用$data
        if($id === false){
            $model->rollback();//回滚事务
            $this->error('添加失败');
        }

        if(array_key_exists('ico',$_FILES) && $_FILES['ico']['size'] > 0){//如果没有文件上传，或上传的文件大小为0，就不执行里面的代码
            //接收保存上传的文件
            //下面这些代码是设置上传参数
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 204800 * 2 ;// 设置附件上传大小400K
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 千万要注意不能让不信任的用户上传PHP文件
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->autoSub  = true;//=true表示让 $upload->subName 起作用
            $upload->subName  = 'ico';//如果这里的参数不是函数名，那就会使用这个字符串作为上传文件的目录，如果是函数名就会用这个函数的返回结果
            $upload->saveName = $id;//文件名

            //执行上传获取返回结果
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $model->rollback();//回滚事务  如果添加分类写入数据库成功，但是上传图片文件失败，这样要把前面添加进数据库的分类撤消掉
                $this->error($upload->getError());
            }else{
                $image = new \Think\Image();
                $image->open('./Uploads/' . $upload->subName . '/' . $info['ico']['savename']);
                $image->thumb(120,120,\Think\Image::IMAGE_THUMB_CENTER)->save('./Uploads/' . $upload->subName . '/' . $info['ico']['savename']);//thumb(宽,高,裁剪方式)
                $model->where(array('id' => $id))->setField('ico',$info['ico']['savename']);//实现把图片的文件名更新到数据库里
            }
        }
        $model->commit();//提交事务
        S('categoryData',null);//删除分类数据的缓存
        $this->success('添加成功！正在返回上级分类列表。',U('index',array('id' => $data['pid'])));
    }

    public function edit(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');
        $model = M('Category');
        $data =$model->where(array('id'=>$id))->find();
        if($data === false)$this->error('出错了，原因' . $model->getDbError());//提示出错之后，后面的代码不会执行
        if($data === NULL )$this->error('找不到这个分类');//提示出错之后，后面的代码不会执行
        $this->assign('data',$data);
        $this->display();
    }

    public function editSubmit(){
        $data['id'       ] = I('post.id','',FILTER_SANITIZE_NUMBER_INT);
        if($data['id'] =='')$this->error('id不能为空');

        $data['name'    ] = I('post.name');

        $data['pid'] = getLastPid();//获取上级分类选择项最后一个不为空的分类ID

        $model = D('Category');
        if ($model->create($data) === false){
             $this->error($model->getError());
        }

        $info = array();//防止后面它是未定义变量 
        if(array_key_exists('ico',$_FILES) && $_FILES['ico']['size'] > 0){//如果前面的条件表达式不成立就不会执行后面的条件表达式
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 204800 * 2 ;// 设置附件上传大小400K
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 千万要注意不能让不信任的用户上传PHP文件
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->autoSub  = true;//=true表示让 $upload->subName 起作用
            $upload->subName  = 'ico';//如果这里的参数不是函数名，那就会使用这个字符串作为上传文件的目录，如果是函数名就会用这个函数的返回结果
            $upload->saveName = $data['id'];//文件名
            $upload->replace  = true;//存在同名文件是否是覆盖，默认为false

            //执行上传获取返回结果
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{
                if(array_key_exists('ico',$info)){
                    $image = new \Think\Image();
                    $image->open('./Uploads/' . $upload->subName . '/' . $info['ico']['savename']);
                    $image->thumb(120,120,\Think\Image::IMAGE_THUMB_CENTER)->save('./Uploads/' . $upload->subName . '/' . $info['ico']['savename']);//thumb(宽,高,裁剪方式)
                    $data['ico'] = $info['ico']['savename'];
                }
            }
        }

        $result = $model->save($data);
        if($result === false)$this->error($model->getError());
        if($result === 0){
            if(array_key_exists('ico',$info)){
                $this->success('修改成功',U('index',array('id' => $data['pid'])));
            }else{
                $this->success('数据没有被修改',U('index',array('id' => $data['pid'])));
            }
        }else{
            S('categoryData',null);//删除分类数据的缓存
            $this->success('修改成功',U('index',array('id' => $data['pid'])));
        }
    }
    public function del(){
        $this->_setIsDel(1,'删除','Category');
    }
    public function stop(){
        $this->_setIsDel(2,'停用','Category');
    }
    public function recovery(){
        $this->_setIsDel(0,'恢复','Category');
    }
    public function clearCache(){//刷新商品分类缓存数据，一般在手动改了分类表数据之后要刷新，在后台改的后台程序会自动刷新
        S('categoryData',null);//删除分类数据的缓存
        getParentCategoryId();//调用一次 根据分类ID返回所有父级分类ID数组 实现刷新
        $this->success('刷新分类数据的缓存成功！');
    }    
    public function OrderUp(){
        $this->_setOrder('上移','普通排序');
    }
    public function OrderDown(){
        $this->_setOrder('下移','普通排序');
    }
    public function OrderIndexUp(){
        $this->_setOrder('上移','首页排序');
    }
    public function OrderIndexDown(){
        $this->_setOrder('下移','首页排序');
    }
    private function _setOrder($type,$Field){//$type表示是上移还下移,$Field表示是按首页排序号码排序还是按普通的排序号码排序
        // 排序下移其实就是将当前这个分类和它的下一个分类交换序号
        // 程序实现过程：
        // 1、首先要获取要下移的分类的ID；
        // 2、获取 传来的 分类的ID 的 父级ID；
        // 3、获取 【跟传来的分类同级的兄弟分类数据|按首页排序号排序的】
        // 4、获取 传来的 分类的ID 在同级数据中的下标；
        // 5、用传来的 分类的ID 在同级数据中的下标 + 1 就能获取到 下一个分类的下标
        // 6、交换首页排序号更新 _index
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');

        $model = M('Category');
        $arr = $model->cache('categoryData')->order('order_no')->select();//查询分类表整表数据，但如果有缓存就会用缓存的，不会去查数据库
        $pid = null;
        foreach ($arr as $value) {// 2、获取 传来的 分类的ID 的 父级ID；
            if($value['id'] == $id){
                $pid = $value['pid'];
                break;
            }
        }
        if($pid === null)$this->error('找不到这个分类的上级分类');
        $arr = getCategoryData($pid,$Field);// 3、获取 【跟传来的分类同级的兄弟分类数据|按$Field排序的】
        $thisIndex = null;        
        foreach ($arr as $key => $value) {// 4、获取 传来的 分类的ID 在同级数据中的下标；
            if($value['id'] == $id){
                $thisIndex = $key;
                break;
            }
        }
        if($Field == '首页排序'){
            $Field = 'order_index';
        }else{
            $Field = 'order_no';
        }
        // 显示当前分类的ID和序号 再另一行显示下一个分类的ID和序号
        // 看显示的对不对，如果是对了，就写下一步的代码：交换两个序号更新数据库
        //echo $arr[$thisIndex]['id'] , ' ' , $arr[$thisIndex][$Field] , '<br>';
        //echo $arr[$thisIndex + 1]['id'] , ' ' , $arr[$thisIndex + 1][$Field] , '<br>';
        //exit;

        if($thisIndex === null)$this->error('找不到这个分类');

        if($type == '下移'){
            if($thisIndex == count($arr) -1)$this->error('此分类已经是排在最后不能下移');
            $nextIndex = $thisIndex + 1;//获取下一个分类的下标
        }else{
            if($thisIndex == 0)$this->error('此分类已经是排在最前面不能上移');
            $nextIndex = $thisIndex - 1;//获取上一个分类的下标
        }
        
        $model->startTrans();//开启事务处理
        $ok = $model->where(array('id' => $arr[$thisIndex]['id']))->setField($Field,$arr[$nextIndex][$Field]);
        if($ok){
            //echo $model->_sql() , '<br>';
            $ok = $model->where(array('id' => $arr[$nextIndex]['id']))->setField($Field,$arr[$thisIndex][$Field]);
            if($ok){
                //echo $model->_sql() , '<br>';
                $model->commit();//成功了就提交事务，提交了就不能回滚了
                S('categoryData',null);
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
}