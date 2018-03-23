<!DOCTYPE HTML>
<html>
<head>
<title>编辑权限</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">权限管理<small>/编辑权限</small></h3>
        <form class="form" action="<?php echo U('editSubmit')?>" method="post">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>权限名称:</th>
                    <td><input name="permission_name" type="text" maxlength="32" size="22" value="<?php echo $data['permission_name'];?>"></td>
                </tr>
                <tr>
                    <th>控制器名称:</th>
                    <td><input name="controller_name" type="text" maxlength="50" size="22" value="<?php echo $data['controller_name'];?>"></td>
                </tr>
                <tr>
                    <th>操作名称:</th>
                    <td><input name="action_name" type="text" maxlength="50" size="22" value="<?php echo $data['action_name'];?>"></td>
                </tr>
                <tr>
                    <th>拥有此权限的管理员:</th>
                    <td>
                        <?php
                        foreach ($user as $key => $value) {//然后要循环所有管理员
                            echo '<label><input type="checkbox" value="' , $key , '" name="admin_id[]"';
                            //判断当前循环到的管理员是不是有当前id的权限，有权限的就让复选框被选中
                            //控制器传来的所有管理员数据是：array('id' => 姓名,'id' => 姓名,'id' => 姓名); id作为键,姓名作为值格式的一维数组
                            //那用 foreach ($user as $key => $value) 来循环这个数组时 $key就会是循环到的id，$value就会是循环到的姓名
                            //当前循环到的管理员会不会被选中，就要他的id是不是在【有当前传来的权限id的权限的管理员的id 数组】里面，如果在里面就说明这个管理员有此权限
                            //是否存在某个值 in_array(值 用于当前循环到的管理员id ,【有当前传来的权限id的权限的管理员的id 数组】 )
                            if(in_array($key,$hasUser)) echo ' checked';
                            echo '>' , $value , '</label>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input name="id" type="hidden" value="<?php echo $data['id'];?>">
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