<!DOCTYPE HTML>
<html>
<head>
<title>添加商品</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">商品管理<small>/添加商品</small></h3>
        <form class="form" action="<?php echo U('addSubmit')?>" method="post" enctype="multipart/form-data">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="180">上级分类:</th>
                    <td id="select_category">
                        <?php
                        $arr = array();
                        $arr['addValue']  = '';
                        $arr['addText']  = '请选择';
                        $arr['name']  = 'cat_id[]';
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
                    <th>商品名称:</th>
                    <td><input value="商品1" name="name" type="text" maxlength="120" size="22"></td>
                </tr>
                <tr>
                    <th>价格:</th>
                    <td><input value="99" name="price" type="text" maxlength="10" size="22"></td>
                </tr>
                <tr>
                    <th>产地:</th>
                    <td id="select_city">
                        <?php
                        $arr = array();
                        $arr['addValue']  = '';
                        $arr['addText']  = '请选择';
                        $arr['name']  = 'home[]';

                        $parArr = getParentCityId(0);
                        $parArr[] = $id;
                        foreach ($parArr as $key => $value) {
                            if($key == 0){
                                $arr['data']  = getCityData(0);
                            }else{
                                $arr['data']  = getCityData($parArr[$key - 1]);
                            }
                            echo selectHtml($arr);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>规格:</th>
                    <td><input value="99g" name="format" type="text" maxlength="32" size="80"></td>
                </tr>
                <tr>
                    <th>商品关键词:</th>
                    <td><input name="keywords" type="text" maxlength="255" size="90"></td>
                </tr>
                <tr>
                    <th>商品简单描述:</th>
                    <td><input name="remark" type="text" maxlength="255" size="100"></td>
                </tr>
                <tr>
                    <th>商品详细描述:</th>
                    <td id="editor_td">
                        <textarea id="container" name="content"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>请选择:</th>
                    <td>
                        <label><input name="is_on_sale" type="checkbox" value="1">上架</label>
                        <label><input name="is_recommend" type="checkbox" value="1">推荐</label>
                        <label><input name="is_new" type="checkbox" value="1">新品</label>
                        <label><input name="is_hot" type="checkbox" value="1">热卖</label>
                    </td>
                </tr>
                <tr>
                    <th>状态:</th>
                    <td>
                        <label><input value="0" name="prom_type" type="radio">普通商品</label>
                        <label><input value="1" name="prom_type" type="radio">限时抢购</label>
                        <label><input value="2" name="prom_type" type="radio">促销优惠</label>
                    </td>
                </tr>
                <tr>
                    <th>购买商品赠送积分:</th>
                    <td><input value="99" name="give_integral" type="number" maxlength="8" size="5"></td>
                </tr>
                <tr>
                    <th>应季范围:</th>
                    <td>
                        <label><input type="radio" name="has_season" value="1" id="has_season_1">有</label>
                        <label><input type="radio" name="has_season" value="0" id="has_season_2" checked>没有</label>
                        <span id="season_input" style="display:none;">
                            每年
                            <input name="month_star" type="number" maxlength="2" size="3">月
                            <input name="day_star" type="number" maxlength="2" size="3">日
                            至到
                            <input name="month_end" type="number" maxlength="2" size="3">月
                            <input name="day_end" type="number" maxlength="2" size="3">日
                        </span>
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
var AJAX_URL_CITY = '<?php echo U('Home/City/getCity',array('id' => 'CITY_ID_CITY_ID_CITY_ID'));?>';
</script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/goods.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/category.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/city.js?v=<?php echo C('STATIC_VERSION');?>"></script>