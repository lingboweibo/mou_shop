<!DOCTYPE HTML>
<html>
<head>
<title>修改地区</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">地区管理<small>/修改地区</small></h3>
        <form class="form" action="<?php echo U('editSubmit')?>" method="post">
        <input name='id' type='hidden' value="1">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID:</th>
                    <td><?php echo $data['id'];?></td>
                </tr>
                <tr>
                    <th>地区级别:</th>
                    <td><?php echo $data['level']; ?></td>
                </tr>
                <tr>
                    <th>上级地区:</th>
                    <td><?php
                        $arr = getParentCityId($data['id']);//先获取它的父级ID数组
                        $str = '';
                        foreach ($arr as $value) {
                            $str .= cityIdToName($value) . ' / ';
                        }
                        $str =  rtrim($str,' / ');
                        echo $str;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>城市名称:</th>
                    <td><input name="name" type="text" maxlength="128" size="22" value="<?php echo $data['name'];?>"></td>
                </tr>
                <tr>
                    <th>排序号码</th>
                    <td><input name="order_no" type="text" maxlength="10" size="22" value="<?php echo $data['order_no'];?>" ></td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input name="id" type="hidden" value="<?php echo $data['id']; ?>">
                        <input name="pid" type="hidden" value="<?php echo $data['pid']; ?>">
                        <input name="" type="submit" value="提交修改">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不修改了|返回上一页" >
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