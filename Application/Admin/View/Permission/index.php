<!DOCTYPE HTML>
<html>
<head>
<title>商品权限列表</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title"><a href="<?php echo U('index'); ?>">权限列表</a>共<?php echo $count;?>条记录</small></h3>
        <form action="<?php echo __APP__;?>" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <?php
                        $arr             = array();
                        $arr['url']      = U('add');
                        $arr['title']    = '添加权限';
                        $arr['ico']      = 'icon-plus';
                        $arr['allClass'] = 'bg_gray';
                        echo but_link($arr);
                        ?>
                    </td>
                    <td align="right">
                        <input type="hidden" name="m" value="<?php echo MODULE_NAME;?>">
                        <input type="hidden" name="c" value="<?php echo CONTROLLER_NAME;?>">
                        <input type="hidden" name="a" value="<?php echo ACTION_NAME;?>">
                        <input type="text" class="input_text_int" name="searchId" placeholder="ID" value="<?php echo $searchId;?>">
                        <input type="text" class="input_text_txt" name="key_word" placeholder="关键字" value="<?php echo $key_word;?>">
                        <input type="submit" value="搜索">
                    </td>
                </tr>
            </table>
        </form>
        <form action="friend_del.php" method="get" name="form1">
            <table class="list_tab" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>权限名称</th>
                    <th>控制器名称</th>
                    <th>操作名称</th>
                    <th>序号</th>
                    <th>拥有此权限的管理员</th>
                    <th>操作</th>
                </tr> 
                 <?php
                if($count > 0 ){
                    foreach ($data as $value) {
                        echo '<tr>';
                        echo '    <td>' , $value['id'] , '</td>';
                        echo '    <td>' , $value['permission_name'] , '</td>';
                        echo '    <td>' , $value['controller_name'] , '</td>';
                        echo '    <td>' , $value['action_name'] , '</td>';
                        echo '    <td>';
                        $arr             = array();
                        $arr['url']      = U('OrderUp',array('id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-up';
                        $arr['attribute']= ' title="排序上移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '<span class="btn">' , $value['order_no'] , '</span>';
                        $arr             = array();
                        $arr['url']      = U('OrderDown',array('id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-down';
                        $arr['attribute']= ' title="排序下移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '</td>';
                        echo '    <td>';
                        foreach ($value['permission_user'] as $k => $v) {
                            if($k < 4){
                                echo $v['name'] , ' ';
                            }else{
                                echo '<a href="' , U('more',array('id' => $value['id'])) , '">更多</a>';
                            }
                        }
                        echo '    </td>';

                        echo '    <td>';
                        $arr             = array();
                        $arr['url']      = U('edit',array('id' => $value['id']));
                        $arr['attribute']= ' title="编辑"';
                        $arr['ico']      = 'icon-edit';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr              = array();
                        $arr['url']       = U('del',array('id' => $value['id']));
                        $arr['ico']       = 'icon-trash';
                        $arr['allClass']  = 'red';
                        $arr['attribute'] = ' onclick="return confirm(\'确认要删除这个权限吗？\');" title="删除"';
                        echo but_link($arr);

                        echo '    </td>';
                        echo '</tr>';
                    }
                }else{
                    echo '<tr><td colspan="5">找不到符合条件的记录</td></tr>';
                }
                ?>
            </table>
            <?php echo $pageHtml;?>
        </form>
    </div>
</div>
</body>
</html>