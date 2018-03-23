<!DOCTYPE HTML>
<html>
<head>
<title>添加权限</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">权限管理<small>/添加权限</small></h3>
        <form class="form" action="<?php echo U('addSubmit')?>" method="post" enctype="multipart/form-data">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>权限名称:</th>
                    <td><input name="permission_name" type="text" maxlength="32" size="22"></td>
                </tr>
                <tr>
                    <th>控制器名称:</th>
                    <td><input name="controller_name" type="text" maxlength="50" size="22"></td>
                </tr>
                <tr>
                    <th>操作名称:</th>
                    <td><input name="action_name" type="text" maxlength="50" size="22"></td>
                </tr>
                <tr>
                    <th>排序在</th>
                    <td class="order_no_td">
                        <?php

                        $arr              = array();
                        $arr['textField'] = 'permission_name';
                        $arr['name']      = 'order_no_field';
                        $arr['data']      = $data;//获取下拉选择框需要显示的数据,如果$id有下级数据就会获取到，如果传来id没有下级分类就==false
                        //arr['data'] 已经有哪些权限，就要显示哪些权限在下拉框里面
                        //从哪里获取已经有的的权限，从数据库的权限表里面可以获取，需要从控制器调用模型的select方法获取，获取到之后再传给模板文件
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