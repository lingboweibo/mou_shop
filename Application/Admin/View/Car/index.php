<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $name;?>的购物车</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title"><a href="<?php echo U('index'); ?>"><?php echo $name;?>的购物车</a> <small> 共<?php echo $count;?>条记录</small></h3>
        <form action="" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="right">
                        <input type="text" class="input_text_int" name="id" placeholder="ID">
                        <input type="text" class="input_text_txt" name="key_word" placeholder="关键字">
                        <input type="submit" value="搜索">
                    </td>
                </tr>
            </table>
        </form>
        <form action="friend_del.php" method="get" name="form1">
            <table class="list_tab" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>商品名称</th>
                    <th>添加时间</th>
                    <th>价格</th>
                    <th>是否选中</th>
                    <th>数量</th>
                </tr> 
                <?php
                if($count > 0 ){
                    foreach ($data as $value) {
                    echo '<tr>';
                    echo '    <td>' , $value['id'] , '</td>';
                    echo '    <td>' , $value['name'] , '</td>';
                    echo '    <td>' , $value['add_time'] , '</td>';
                    echo '    <td>' , $value['price'] , '</td>';
                    echo '    <td>' , $value['selected'] , '</td>';
                    echo '    <td>' , $value['num'] , '</td>';
                    echo '</tr>';
                    }
                }else{
                    echo '<tr><td colspan="6">找不到符合条件的记录</td></tr>';
                }
                ?>
        </form>
    </div>
</div>
</body>
</html>