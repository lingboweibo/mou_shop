<!DOCTYPE HTML>
<html>
<head>
<title>帮助中心</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title">帮助中心<small>共<?php echo count($data);?>条记录</small></h3>
        <form action="friend_del.php" method="get" name="form1">
            <table class="list_tab" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>操作</th>
                </tr> 
                 <?php
                if(count($data) > 0 ){
                    foreach ($data as $value){
                        echo '<td>',$value['id'],'</td>';
                        echo '<td>',$value['title'],'</td>';

                        echo '    <td>';
                        $arr             = array();
                        $arr['url']      = U('detail',array('id' => $value['id']));
                        $arr['title']= '查看详情';
                        $arr['ico']      = 'icon-eye-open';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr              = array();
                        $arr['url']       = U('edit',array('id' => $value['id']));
                        $arr['title']     = '编辑';
                        $arr['ico']       = 'icon-edit';
                        $arr['allClass']  = 'blue';
                        echo but_link($arr);

                        echo '    </td>';
                        echo '</tr>';
                    }
                }else{
                    echo '<tr><td colspan="3">找不到符合条件的记录</td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
</div>
</body>
</html>