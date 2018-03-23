<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $name;?>的收藏夹</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
     <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title"><?php echo $name;?>的收藏夹列表<small>/共<?php echo $count;?>条记录</h3>
        <form action="" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="right">
                        <input type="text" class="input_text_int" name="id" placeholder="ID" value="">
                        <input type="text" class="input_text_txt" name="key_word" placeholder="关键字"  value="">
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
                    <th>商品价格</th>
                    <th>收藏时间</th>
                    <th></th>
                    <th></th>
                </tr>
                 <?php
                foreach ($data as $value) {
                    echo '<tr>';
                    echo '    <td>' , $value['id'] , '</td>';
                    echo '    <td>' , $value['goods_name'] , '</td>';
                    echo '    <td>' , $value['goods_price'] , '</td>';
                    echo '    <td>' , $value['add_time'] , '</td>';
                    echo '    <td>';
                }
                ?>
            </table>
        </form>
    </div>
</div>
</body>
</html>