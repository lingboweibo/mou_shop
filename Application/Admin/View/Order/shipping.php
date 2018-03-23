<!DOCTYPE HTML>
<html>
<head>
<title>发货页面</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__ ; ?>/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__ ; ?>/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__ ; ?>/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">订单管理<small>/发货页面</small></h3>
        <form class="form" action="<?php echo U('shippingSubmit',array('id' => $id))?>" method="post">
        <input name='id' type='hidden' value="1">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>邮政编码:</th>
                    <td><input type="text" name="zipcode" value=""></td>
                </tr>
                <tr>
                    <th>物流编号:</th>
                    <td><input type="text" name="shipping_code" value=""></td>
                </tr>
                <tr>
                    <th>物流名称:</th>
                    <td><input type="text" name="shipping_name" value=""></td>
                </tr>
                <tr>
                    <th>手机:</th>
                    <td><input type="text" name="mobile" value="<?php echo $data['mobile'] ?>"></td>
                </tr>
                <tr>
                    <th>收货人:</th>
                    <td><input type="text" name="consignee" value="<?php echo $data['consignee'] ?>"></td>
                </tr>
                 <tr>
                    <th>城市:</th>
                    <td id="select_city">
                       <?php 
                        $arr = array();
                        $arr['name'] = 'city[]';
                        $arr['addValue'] = '';
                        $arr['addText'] = '请选择';
                        $parArr = getParentCityId($data['city']);
                        $parArr[] = $data['city'];
                        foreach ($parArr as $key => $value) {
                            if($key == 0){
                                $arr['data'] = getCityData(0);
                            }else{
                                 $arr['data'] = getCityData($parArr[$key - 1]);
                            }
                            $arr['value'] = $value; 
                            echo selectHtml($arr);
                        }
                    ?> 
                    </td>
                </tr>
                <tr>
                    <th>地址:</th>
                    <td><input type="text" name="address" value="<?php echo $data['address'] ?>"></td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input name="" type="submit" value="提交修改">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不修改了|返回上一页">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<script>
var AJAX_URL_CITY = '<?php echo U('Home/City/getCity',array('id' => 'CITY_ID_CITY_ID_CITY_ID')); ?>';
</script>
<script type="text/javascript" src="<?php echo __ROOT__ , C('STATIC_PATH'); ?>/js/city.js?v=<?php echo C('STATIC_VERSION');?>"></script>