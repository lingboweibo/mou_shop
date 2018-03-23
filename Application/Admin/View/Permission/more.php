<!DOCTYPE HTML>
<html>
<head>
<title>拥有<?php echo $data['permission_name'];?>权限的所有管理员</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">权限管理<small>/拥有<?php echo $data['permission_name'];?>权限的所有管理员</small></h3>
        <table class="form_table" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th>权限名称:</th>
                <td><?php echo $data['permission_name'];?></td>
            </tr>
            <tr>
                <th>控制器名称:</th>
                <td><?php echo $data['controller_name'];?></td>
            </tr>
            <tr>
                <th>操作名称:</th>
                <td><?php echo $data['action_name'];?></td>
            </tr>
            <tr>
                <th>拥有此权限的管理员:</th>
                <td>
                    <?php
                    foreach ($hasUser as $value){
                        echo $value['name'] , '|';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th></th>
                <td class="submit">
                    <input name="button" type="button" onclick="history.back();" value="返回上一页">
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>