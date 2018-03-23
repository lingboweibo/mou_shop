<!DOCTYPE HTML>
<html>
<head>
<title>上传商品图片</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
<style>
.category_ico_preview{width:496px;height:496px;}
</style>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">商品管理<small>/上传商品图片</small></h3>
        <form class="form" action="<?php echo U('uploadImageSubmit')?>" method="post" enctype="multipart/form-data">
        <input name='id' type='hidden' value="1">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>所属商品:</th>
                    <td><?php echo $name;?></td>
                </tr>
                <tr>
                    <th>新图标</th>
                    <td>
                        <input name="ico" type="file" accept=""><br>
                        <canvas width="496" height="496" id="myCanvas1" class="category_ico_preview"></canvas>
                        <br>(建议上传496*496像素的图片，大小不要超过400K，图标只允许：jpg gif png jpeg这几种格式)
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input name="" type="submit" value="提交上传">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不上传了|返回上一页" >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/category.js?v=<?php echo C('STATIC_VERSION');?>"></script>