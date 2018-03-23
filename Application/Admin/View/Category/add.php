<!DOCTYPE HTML>
<html>
<head>
<title>添加商品分类</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">商品分类管理<small>/添加商品分类</small></h3>
        <form class="form" action="<?php echo U('addSubmit')?>" method="post" enctype="multipart/form-data">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="180">上级分类:</th>
                    <td id="select_category">
                        <?php
                        $arr = array();
                        $arr['addValue']  = '';
                        $arr['addText']  = '请选择';
                        $arr['name']  = 'pid[]';
                        $parArr = getParentCategoryId($id);//获取传来的分类 id的所有父级ID数组
                        $parArr[] = $id;//把传来的id也加入到父级数组
                        foreach ($parArr as $key => $value) {
                            if($key == 0){
                                $arr['data']  = getCategoryData(0);//获取下拉选择框需要显示的数据
                            }else{
                                $arr['data']  = getCategoryData($parArr[$key - 1]);//获取下拉选择框需要显示的数据 是调用 getCategoryData 这个函数来获取的
                                //getCategoryData的作用是传什么ID过去，他就会返回什么ID的分类的下级分类数据
                                //在父ID数组，当前循环到元素的父ID，是上一个循环到的元素
                            }
                            $arr['value'] = $value;
                            echo selectHtml($arr);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>分类名称:</th>
                    <td><input value="分类1" name="name" type="text" maxlength="90" size="22"></td>
                </tr>
                <tr>
                    <th>图标</th>
                    <td>
                        <input name="ico" type="file" accept="image/*"><br>
                        <canvas width="120px" height="120px" id="myCanvas1" class="category_ico_preview"></canvas>
                        <br>(建议上传120*120像素的图标，大小不要超过400K，图标只允许：jpg gif png jpeg这几种格式)
                    </td>
                </tr>
                <tr>
                    <th>普通排序在</th>
                    <td class="order_no_td">
                        <?php
                        //如果添加的是一级分类，那排序就是一级当中来排
                        //如果添加的是二级分类，那排序就是二级当中来排，可供选择的就是当前这个二级分类的下级
                        //
                        //getCategoryData 传什么id过去就获取什么id的下级数据
                        $arr              = array();
                        $arr['name']      = 'order_no_field';
                        $arr['data']      = getCategoryData($id);//获取下拉选择框需要显示的数据,如果$id有下级数据就会获取到，如果传来id没有下级分类就==false
                        if($order_id){
                            $arr['value'] = $order_id;
                        }else{
                            $arr['value'] = $arr['data'][count($arr['data'])-1]['id'];//让最后一个选择项被选中
                        }
                        //$arr['value'] = 哪个ID，就会让哪个ID的 选择被预选中，
                        //count($arr['data'])-1 获取到选项数把最后一个一维下标后面写['id']就是二维的ID
                        //my_dump($parArr[count($parArr) - 1]);
                        //my_dump($arr['data'][10]['id']);
                        $arr['attribute'] = ' size="' . min(count($arr['data']),8) . '"';//count($arr['data']获取一维元素数量，和8取最小值，作为下拉选择框能同时显示的选项数量
                        if($arr['data'] == false){//如果传来id没有下级分类就==false
                            $arr['data'][0]['id']   = '';
                            $arr['data'][0]['name'] = categoryIdToName($id) . '没有下级分类 添加它的下级分类就会排第一';
                        }
                        echo selectHtml($arr);
                        //my_dump($type);
                        if($type == 'qm'){
                            echo '<label><input value="之前" name="order_no_sotr" type="radio" checked>之前</label>';
                            echo '<label><input value="之后" name="order_no_sotr" type="radio">之后</label>';
                        }else{
                            echo '<label><input value="之前" name="order_no_sotr" type="radio">之前</label>';
                            echo '<label><input value="之后" name="order_no_sotr" type="radio" checked>之后</label>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>首页排序在</th>
                    <td class="order_no_td">
                        <?php
                        $arr['data']      = getCategoryData($id,'首页排序');//获取下拉选择框需要显示的数据,因为首页的排序字段不同所以要按首页排序获取下拉选项数据
                        if($arr['data'] == false){//如果传来id没有下级分类就==false
                            $arr['data'][0]['id']   = '';
                            $arr['data'][0]['name'] = categoryIdToName($id) . '没有下级分类 添加它的下级分类就会排第一';
                        }
                        $arr['name']  = 'order_index_field';
                        echo selectHtml($arr);
                        if($type == 'qm'){
                            echo '<label><input value="之前" name="order_index_sotr" type="radio" checked>之前</label>';
                            echo '<label><input value="之后" name="order_index_sotr" type="radio">之后</label>';
                        }else{
                            echo '<label><input value="之前" name="order_index_sotr" type="radio">之前</label>';
                            echo '<label><input value="之后" name="order_index_sotr" type="radio" checked>之后</label>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input name="" type="submit" value="提交添加">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不添加了|返回上一页">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<script>
var AJAX_URL_CATEGORY = '<?php echo U('Home/Category/getCategory',array('id' => 'CITY_ID_CITY_ID_CITY_ID'));?>';
</script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/category.js?v=<?php echo C('STATIC_VERSION');?>"></script>