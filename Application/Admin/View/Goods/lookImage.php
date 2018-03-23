<!DOCTYPE HTML>
<html>
<head>
<title>商品图片列表</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title"><?php echo $name;?>的图片列表<small>共<?php $count = count($data);echo $count;?>条记录</small></h3>
        <form action="" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <?php
                        $arr             = array();
                        $arr['url']      = U('add');
                        $arr['title']    = '添加商品图片';
                        $arr['ico']      = 'icon-plus';
                        $arr['allClass'] = 'bg_gray';
                        echo but_link($arr);
                        ?>
                    </td>
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
                    <th>商品图片</th>
                    <th>排序</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr> 
                 <?php
                if($count > 0 ){
                    foreach ($data as $value){
                        echo '<td>',$value['id'],'</td>';
                        echo '<td><img class="goods_img" src="', __ROOT__ , '/Uploads/' , $value['filename'] . '.thumb.jpg' ,'"></td>';

                        echo '<td>';
                        $arr             = array();
                        $arr['url']      = U('OrderUp',array('id' => $value['id'],'tableName' => 'Goodsimage','good_id' => $value['good_id']));
                        $arr['ico']      = 'icon-arrow-up';
                        $arr['attribute']= ' title="排序上移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '<span class="btn">',$value['sort'],'</span>';
                        $arr             = array();
                        $arr['url']      = U('OrderDown',array('id' => $value['id'],'tableName' => 'Goodsimage','good_id' => $value['good_id']));
                        $arr['ico']      = 'icon-arrow-down';
                        $arr['attribute']= ' title="排序下移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '</td>';

                        echo '<td>',$value['add_time'],'</td>';

                        echo '<td>';
                        $arr             = array();
                        $arr['url']      = U('edit',array('id' => $value['id']));
                        $arr['attribute']= ' title="编辑"';
                        $arr['ico']      = 'icon-edit';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr              = array();
                        $arr['url']       = U('delImages',array('id' => $value['id']));
                        $arr['ico']       = 'icon-trash';
                        $arr['allClass']  = 'red';
                        $arr['attribute'] = ' onclick="return confirm(\'确认要删除这个图片吗？\');" title="删除"';
                        echo but_link($arr);

                        echo '    </td>';
                        echo '</tr>';
                    }
                }else{
                    echo '<tr><td colspan="11">找不到符合条件的记录</td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
</div>
</body>
</html>