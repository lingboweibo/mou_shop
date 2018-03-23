<!DOCTYPE HTML>
<html>
<head>
<title>城市列表</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title"><a href="<?php echo U('index'); ?>">城市列表</a><small><?php
        foreach ($nameArr as $key => $value) {
            echo  '/<a href="' , U('index',array('id' => $parArr[$key])) , '">' , $value , '</a>';
        }
        ?> 共<?php echo $count;?>条记录</small></h3>
        <form action="<?php echo __APP__;?>" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
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
                    <th>上级城市</th>
                    <th>城市名称</th>
                    <th>地区级别</th>
                    <th>排列号码</th>
                    <th></th>
                </tr> 
                 <?php
                if($count > 0 ){
                    foreach ($data as $value) {
                        echo '<tr>';
                        echo '    <td>' , $value['id'] , '</td>';
                        echo '    <td>' , $value['pid'] , '</td>';
                        echo '    <td><a href="' , U('index',array('id' => $value['id'])) , '">' , $value['name'] , '</a></td>';
                        echo '    <td>' , $value['level'] , '</td>';
                        echo '    <td>' , $value['order_no'] , '</td>';
                        echo '    <td>';
                        $arr             = array();
                        $arr['url']      = U('edit',array('id' => $value['id']));
                        $arr['title']    = '编辑';
                        $arr['ico']      = 'icon-edit';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U('add',array('id' => $value['id']));
                        $arr['title']    = '添加城市';
                        $arr['ico']      = 'icon-plus';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr              = array();
                        $arr['url']       = U('del',array('id' => $value['id']));   //url 链接的url
                        $arr['title']     = '删除';   //title 链接文字                                                       
                        $arr['ico']       = 'icon-trash';  //ico 图标的class 
                        $arr['allClass']  = 'red';   //allClass 附加样式 
                        $arr['attribute'] = ' onclick="return confirm(\'确认要删除这个城市吗？\');"'; //attribute 附加属性 
                        echo but_link($arr);
                        echo '    </td>';
                        echo '</tr>';
                    }
                }else{
                    echo '<tr><td colspan="6">找不到符合条件的记录</td></tr>';
                }
                ?>
            </table>
            <?php echo $pageHtml;?>
        </form>
    </div>
</div>
</body>
</html>