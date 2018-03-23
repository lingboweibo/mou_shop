<!DOCTYPE HTML>
<html>
<head>
<title>帮助中心详情</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title">帮助中心详情<small>/<?php echo $data['title'];?></small></h3>
        <form class="form" action="friend_del.php" method="get" name="form1">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID：</th>
                    <td><?php echo $data['id'];?></td>
                </tr>
                <tr>
                    <th>详细内容:</th>
                    <td><?php echo $data['content'];?></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>