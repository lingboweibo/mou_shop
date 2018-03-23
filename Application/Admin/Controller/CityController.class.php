<?php
namespace Admin\Controller;
use Think\Controller;
class CityController extends PubController{
    //http://localhost:8015/index.php?m=Admin&c=City&a=index
    //http://localhost:8015/index.php?m=Admin&c=City&a=index&id=440000000
    public function index(){
        $nameArr = array();
        $parArr = array();
        $model = M('city');
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == ''){
            $id = $id;
        }else{
            $parArr = getParentCityId($id);
            $parArr[] = $id;
            foreach ($parArr as $value) {
                $nameArr[] = cityIdToName($value);//$model->where(array('id' => $value))->getField('name');
                //$nameArr[] = $model->where(array('id' => $value))->getField('name');
                //这样查询能实现 功能，但是通过城市ID获得城市名称的这样一个功能以后还会经常用，
                //如果这样每次都查询会比较浪费资源，大流量时访问量大的时侯会 造成速度慢。
                //所以考虑做一个公共函数 实现 通过城市ID获得城市名称 的功能，同时加入缓存功能，不用 每次查询数据库
            }
            //再调用公共函数 获取这个ID的所有父级城市ID的数组，再把传来的ID加入到这个数组
            //再循环这个数组，在循环内获取城市ID对应的名称
        }

        $key_word = I('get.key_word');//获取get提交来的搜索关键字
        $searchId = I('get.searchId','',FILTER_SANITIZE_NUMBER_INT);//搜索ID

        $this->assign('parArr',$parArr);
        $this->assign('nameArr',$nameArr);

        $map['pid'] = $id;
        $map['is_del']  = array('in','0,2');

        if($key_word != ''){//判断如果提交来的搜索关键字不为空，那就增加下面一个模糊搜索条件
            $key_word = trim($key_word);
            $name = '搜索结果';
            $map['name'] = array('LIKE','%' . $key_word . '%');
            unset($map['pid']);//如果用关键字搜索就忽略pid条件
        }
        if($searchId != ''){
            $map = array('id' => $searchId);//如果用ID搜索，就忽略其它条件
            $name = '根据ID搜索';
        }
        $count = $model->field('count(id) as count')->where($map)->find();//先获取记录数 页面显示用和分页类要用
        $page  = new \Think\Page($count['count'],12);// 实例化分页类 传入总记录数和每页显示的记录数
        //$page->setConfig('header','共 %TOTAL_ROW% 个城市');
        //$page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pageHtml = $page->show();//获取得到分页链接的HTML代码，赋值给$pageHtml这个变量接收保存
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data = $model->where($map)->limit($page->firstRow.','. $page->listRows)->order('order_no')->select();
        $this->assign('searchId',$searchId);
        $this->assign('key_word',$key_word);
        $this->assign('data',$data);
        $this->assign('pageHtml',$pageHtml);//把分页链接传给模板文件
        $this->assign('count',$count['count']);
        $this->display();
    }
    public function add(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id == '')$id = 0;
        $this->assign('id',$id);
        $this->display();
    }

    public function addSubmit(){
        $model = D('City');
        $data['id'      ] = I('post.id','',FILTER_SANITIZE_NUMBER_INT);//ID,因为城市ID不是自动编号的
        $data['name'    ] = I('post.name');//地区名 
        $data['order_no'] = I('post.order_no','',FILTER_SANITIZE_NUMBER_INT);//排序号码

        $data['pid'] = getLastPid();//获取上级地区选择项最后一个不为空的城市ID

        //判断城市ID是不是父级ID下的城市
        $parArr = getParentCityId($data['id']);//根据提交的城市ID，获取它的所有父级城市ID (可能会包括父亲和爷爷……)
        //my_dump($data['id']);
        $data['level'] = count($parArr) + 1;//如果传来的城市ID能获取多少个父级，那它就是多少再加1的级的城市

        if($parArr == false){
            if($data['pid'] == 0){
                if(substr($data['id'],2,7) != '00000000')$this->error('城市ID不符合格式要求,顶级城市的ID后面7位数必须是0。');
            }else{
                $this->error('城市ID不符合格式要求');//如果pid为0找不到父级就是正常，所以增加判断pid !=0  并且找不到父级 才是不是符合格式
            }
        }

        //把传来的父ID和通过传来的ID计算出来的父ID对比
        //所有父级城市ID数组里的最后一个元素就是父亲级的ID
        if($data['pid'] != $parArr[count($parArr) - 1]){
            $this->error('城市ID跟父级不对应');
        }
        //因为这里添加数据时，$data里面有id，所以TP就自动识别以为这个修改数据。这里解决这个问题可以在create　方法的第二个参数设为１指定是新增数据
        if ($model->create($data,1)===false){
             $this->error($model->getError());
        }
        //array('id',     ''      ,'城市ID不能跟别城市ID相同',1        ,'unique',1),
        $haId = $model->where(array('id' => $data['id']))->getField('id');
        if($haId)$this->error('城市ID不能跟别城市ID相同');
        $result = $model->add($data);
        if($result === false)$this->error('添加失败');
        F('city_' . $data['pid'],NULL);
        $this->success('添加成功！正在返回上级地区列表。',U('index',array('id' => $data['pid'])));
    }

    public function edit(){
        $id = I('get.id','',FILTER_SANITIZE_NUMBER_INT);
        if($id=='')$this->error('id不能为空');

        $data = M('city')->where(array('id'=>$id))->find();
        if($data === false)$this->error('出错了，原因' . $model->getDbError());//提示出错之后，后面的代码不会执行
        if($data === NULL )$this->error('找不到这个地区');//提示出错之后，后面的代码不会执行
        $this->assign('data',$data);
        $this->display();
    }

    public function editSubmit(){
        $data['id'       ] = I('post.id','',FILTER_SANITIZE_NUMBER_INT);
        if($data['id']=='')$this->error('id不能为空');

        $data['name'    ] = I('post.name');
        $data['order_no'] = I('post.order_no');

        $pid = getLastPid();
        $model = M('City');
        if ($model->create($data) === false){
             $this->error($model->getError());
        }
        $result = $model->save($data);
        if($result === false)$this->error($model->getError());
        if($result === 0){
            $this->success('数据没有被修改',U('index',array('id' => $pid)));
        }else{
            //修改成功 要把它他父级城市的下级城市选项的缓存清除
            F('city_' . $pid,NULL);
            $this->success('修改成功',U('index',array('id' => $pid)));
        }
    }
    public function del(){
        $this->_setIsDel(1,'删除','City');
    }
    public function stop(){
        $this->_setIsDel(2,'停用','City');
    }
    public function recovery(){
        $this->_setIsDel(0,'恢复','City');
    }
}