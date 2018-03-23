<?php
namespace Admin\Controller;//注意模块名首字母大写
use Think\Controller;
class TestController extends Controller {//注意控制器名首字母大写
    public function upfile(){//显示上传文件的表单页面
        $this->display();
    }
    public function upfileSubmit(){//接收保存上传文件
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小 3M
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        //$upload->subName = 'get_user_id';
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        //$upload->saveName  = 'time';//文件名
        //$upload->saveName  = time() .'_'. mt_rand();
        //$upload->saveExt       = 'txt';//上传文件的后缀类型

        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            echo '上传文件的原始名称=' , $info['photo']['name'];
            echo '<br>上传文件的保存名称=' , $info['photo']['savename'];
            echo '<br>上传文件的保存路径=' , $info['photo']['savepath'];

            //my_dump($info);
            //$this->success('上传成功！');
        }
    }

    public function form(){//显示上传文件的表单页面
        $this->display();
    }
    public function formSubmitxdd(){//显示上传文件的表单页面
        //1 实例化上传类
        //2 设置上传参数
        //3 执行上传获取返回结果
        //4 把需要的返回结果保存到数据库
        //4.1 创建一个模型类实例
        //4.2 验证数据合法性(不是必须的，一般是需要，如果你自己能保证数据是合法的，那就不用验证)
        //4.3.1 获取需要的需要的返回结果 放到 数据数组
        //4.3.2 模型类实例->add(数据数组)
    }
    public function formSubmit(){
        $upload = new \Think\Upload();
        $upload->maxSize  = 3145728;//字节
        $upload->exts     = array('jpg','gif','png','jprg');
        $upload->rootPath = './uploads/';
        //上传文件
        $info   = $upload->upload();

        //访问二维数组里的第二维数据的语法： $二维数组[一维一下标][二维下标]
        if(! $info){
            $this->error($upload->getError());
        }else{
            $data['url'] = 'http://' . $_SERVER['HTTP_HOST'] . __ROOT__ . '/uploads/' . $info['photo']['savepath'] . $info['photo']['savename'];

            $data['add_time'] = date('Y-m-d H:i:s');
            $data['name'] = $info['photo']['name'];
            $data['size'] = $info['photo']['size'];
            $data['file_name'] = $info['photo']['savename'];

            if(M('up_file')->add($data)){
                $this->success('上传成功,保存进数据库也成功');
            }else{
                $this->error('上传成功,但保存进数据库失败');
            }
        }
    }
    public function imageTest(){
        $image = new \Think\Image(); 
        $image->open('./Uploads/2017-03-15/58c901e787c40.jpg');
        //$image->crop(100, 100)->save('./crop.jpg');
        $image->crop(143, 110,210,89)->save('./crop.jpg');//crop(宽度, 高度,开始裁剪的X坐标,开始裁剪的Y坐标)
        echo '<div>原图</div>';
        echo '<img src="./Uploads/2017-03-15/58c901e787c40.jpg">';
        echo '<div>裁切之后的</div>';
        echo '<img src="./crop.jpg">';

        $image->open('./Uploads/2017-03-15/58c901e787c40.jpg');
        $image->thumb(150,150)->save('./thumb.jpg');//thumb(宽,高)

        echo '<div>缩略图</div>';
        echo '<img src="./thumb.jpg">';

        $image->open('./Uploads/2017-03-15/58c901e787c40.jpg');
        $image->thumb(150,150,\Think\Image::IMAGE_THUMB_SOUTHEAST)->save('./thumb2.jpg');//thumb(宽,高,裁剪方式)

        echo '<div>右下角裁剪的缩略图</div>';
        echo '<img src="./thumb2.jpg">';

        $image->open('./Uploads/2017-03-15/58c901e787c40.jpg');
        $image->thumb(150,150,\Think\Image::IMAGE_THUMB_NORTHWEST)->save('./thumb3.jpg');//thumb(宽,高,裁剪方式)

        echo '<div>右上角裁剪的缩略图</div>';
        echo '<img src="./thumb3.jpg">';

        $image->open('./Uploads/2017-03-15/58c901e787c40.jpg');
        $image->thumb(150,150,\Think\Image::IMAGE_THUMB_CENTER)->save('./thumb4.jpg');//thumb(宽,高,裁剪方式)

        echo '<div>居中裁剪的缩略图</div>';
        echo '<img src="./thumb4.jpg">';
    }
    public function goodimgfolder(){
        //文件夹名  = ID % 100;
        $model = M('goodsimage');
        $data = $model->field('id,filename')->select();//先查询出整个表的记录（3758条记录），只查询id,filename这两个字段
        foreach ($data as $value) {//循环data 会循环3758次
            //赋值要新的新数据
            $updata['id'] = $value['id'];//ID是主键放在这里作为更新的条件
            $updata['filename'] = $updata['id'] % 100 . '/' . $value['filename'];//图片路径就是要更新，在前面加文件夹名
            echo '更新id=' , $value['id'];
            $ok = $model->save($updata); //调用模型的保存数据的方法也就是更新
            echo '影响行数=' , $ok , '<br>';
        }
    }
    public function fndGoods(){//检查商品表是否有找不到分类的记录
        $model = M('Goods');
        $catModel = M('category');
        $data = $model->field('id,cat_id')->where('cat_id=0')->select();
        foreach ($data as $value) {
            $ok = $catModel->where('id=' . $value['cat_id'])->getField('id');
            if(! $ok)_sql($catModel);
        }
    }
    public function batAddOrder(){
        $model = M('Order');
        $startTime = strtotime('-50 day');//先获取50天前的时间戮
        $cityData = getCityData();//先获取所有一级城市ID
        $userData = M('User')->getField('id',true);//先读取所有用户ID

        for($i=0;$i<500;$i++){
            //随机从 先读取所有用户ID 当中取出一个用户ID
            // 用户id数组[随机数] 这样就能随机取出一个用户ID 随机数 的范围是 0 到 用户id数组元素个数-1, 这样随机数的范围就不会超过 用户id数组 下标的范围
            $data['user_id'        ] = $userData[mt_rand(0,count($userData) - 1)];//用户id 

            //随机获取一个城市也跟上面随机获取一个用户ID的方法差不多，差别是城市数组是二维数组，所以后面多加了['id']
            $data['city'           ] = $cityData[mt_rand(0,count($cityData) - 1)]['id'];//城市

            $startTime += mt_rand(2,8640);//在循环里让时间戮 随机增加
            $data['add_time'       ] = date('Y-m-d h:i:s',$startTime);//给下单时间赋值为时间戮转成的时间字符串

            $data['order_sn'       ] = date('Ymdhis',$startTime) . rand_str(6);//订单编号 yyyymmddhhssii 14位时间+6位随机字符串

            $data['consignee'      ] = '收货人' . $i;
            $data['address'        ] = '地址' . $i;//地址
            $data['mobile'         ] = '158158' . $i;//手机
            $data['goods_price'    ] = $i * 2;//商品总价
            $data['order_amount'   ] = $data['goods_price'    ];//应付款金额
            $data['total_amount'   ] = $data['goods_price'    ];//订单总价

            echo $model->add($data) , ' ';
        }
    }
}
// IMAGE_THUMB_SCALE     =   1 ; //等比例缩放类型
// IMAGE_THUMB_FILLED    =   2 ; //缩放后填充类型
// IMAGE_THUMB_CENTER    =   3 ; //居中裁剪类型
// IMAGE_THUMB_NORTHWEST =   4 ; //左上角裁剪类型
// IMAGE_THUMB_SOUTHEAST =   5 ; //右下角裁剪类型
// IMAGE_THUMB_FIXED     =   6 ; //固定尺寸缩放类型


// http://localhost:8013/mou_shop/index.php?m=Admin&c=Test&a=imageTest
// http://localhost:8015/index.php?m=Admin&c=Test&a=imageTest
// http://localhost:8015/index.php?m=Admin&c=Test&a=getCity&id=130000000
// http://localhost:8015/index.php?m=Admin&c=Test&a=fndGoods