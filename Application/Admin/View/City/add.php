<!DOCTYPE HTML>
<html>
<head>
<title>添加城市</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">城市设置<small>/城市会员</small></h3>
        <form class="form" action="<?php echo U('addSubmit')?>" method="post">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID:</th>
                    <td><input value="" name="id" type="text" maxlength="9" size="22"></td>
                </tr>
                <tr>
                    <th>上级城市:</th>
                    <td id="select_city">
                        <?php
                        $arr = array();
                        $arr['addValue']  = '';
                        $arr['addText']  = '请选择';
                        $arr['name']  = 'pid[]';

                        $parArr = getParentCityId($id);
                        $parArr[] = $id;
                        foreach ($parArr as $key => $value) {
                            if($key == 0){
                                $arr['data']  = getCityData(0);
                            }else{
                                $arr['data']  = getCityData($parArr[$key - 1]);
                            }
                            $arr['value'] = $value;
                            echo selectHtml($arr);
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>城市名称:</th>
                    <td><input value="广东省" name="name" type="text" maxlength="128" size="22"></td>
                </tr>
                <tr>
                    <th>排序号码</th>
                    <td><input value="1" name="order_no" type="text" maxlength="10" size="22" ></td>
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
var AJAX_URL_CITY = '<?php echo U('Home/City/getCity',array('id' => 'CITY_ID_CITY_ID_CITY_ID'));?>';
</script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/city.js?v=<?php echo C('STATIC_VERSION');?>"></script>