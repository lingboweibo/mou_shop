<!DOCTYPE HTML>
<html>
<head>
<title>修改帮助中心</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo __ROOT__;?>/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">帮助中心管理/修改帮助中心<small>/<?php echo $data['title'];?></small></h3>
        <form class="form" action="<?php echo U('editSubmit')?>" method="post">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>详细内容:</th>
                    <td>
                        <div id="editor_td">
                            <script id="container" name="content" type="text/plain"><?php echo $data['content'];?></script>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input type="hidden" name="id" value="<?php echo $data['id'];?>">
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
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/goods.js?v=<?php echo C('STATIC_VERSION');?>"></script>