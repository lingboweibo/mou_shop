<!DOCTYPE HTML>
<html>
<head>
<title>商品分类列表</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
    <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title"><a href="<?php echo U('index'); ?>">分类列表</a><small><?php
        foreach ($nameArr as $key => $value) {
            echo  '/<a href="' , U('index',array('id' => $parArr[$key])) , '">' , $value , '</a>';
        }
        ?> 共<?php echo $count;?>条记录</small></h3>
        <form action="<?php echo __APP__;?>" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <?php
                        $arr             = array();
                        $arr['url']      = U('add');
                        $arr['title']    = '添加商品分类';
                        $arr['ico']      = 'icon-plus';
                        $arr['allClass'] = 'bg_gray';
                        echo but_link($arr);
                        $arr             = array();
                        $arr['url']      = U('clearCache');
                        $arr['title']    = '刷新商品分类缓存';
                        $arr['ico']      = 'icon-refresh';
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
                    <th>分类名称</th>
                    <th><a href="<?php echo U('index',array('order' => 'index','id' => $id));?>">首页排序号码</a></th>
                    <th><a href="<?php echo U('index',array('id' => $id));?>">普通排序号码</a></th>
                    <th>状态</th>
                    <th>操作</th>
                </tr> 
                 <?php
                if($count > 0 ){
                    foreach ($data as $value) {
                        if($value['is_del'] == 0){
                            $state    = '<span class="icon-eye-open green" title="正常"></span>';
                            $stateBut = '停用';
                            $url      = 'stop';
                            $ico      = 'icon-stop';
                        }
                        if($value['is_del'] == 2){
                            $state    = '<span class="icon-eye-close gray" title="已停用"></span>';
                            $stateBut = '恢复';
                            $url      = 'recovery';
                            $ico      = 'icon-reply';
                        }
                        echo '<tr>';
                        echo '    <td>' , $value['id'] , '</td>';
                        echo '    <td><a href="' , U('index',array('id' => $value['id'])) , '">' , $value['name'] , '</a></td>';

                        echo '    <td>';
                        $arr             = array();
                        $arr['url']      = U('OrderIndexUp',array('id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-up';
                        $arr['attribute']= ' title="排序上移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '<span class="btn">' , $value['order_index'] , '</span>';
                        $arr             = array();
                        $arr['url']      = U('OrderIndexDown',array('id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-down';
                        $arr['attribute']= ' title="排序下移"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);
                        echo '</td>';
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
                        echo '    <td>' ,$state , '</td>';

                        echo '    <td>';
                        $arr             = array();
                        $arr['url']      = U('Goods/index',array('cat_id' => $value['id']));
                        $arr['attribute']= ' title="查看商品"';
                        $arr['ico']      = 'icon-eye-open';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U('edit',array('id' => $value['id']));
                        $arr['attribute']= ' title="编辑"';
                        $arr['ico']      = 'icon-edit';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U('add',array('id' => $value['pid'],'type' => 'qm','order_id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-up';
                        $arr['attribute']= ' title="在前面增加同级分类"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U('add',array('id' => $value['id']));
                        $arr['attribute']= ' title="添加下级分类"';
                        $arr['ico']      = 'icon-plus';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U('add',array('id' => $value['pid'],'type' => 'hm','order_id' => $value['id']));
                        $arr['ico']      = 'icon-arrow-down';
                        $arr['attribute']= ' title="在后面增加同级分类"';
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr             = array();
                        $arr['url']      = U($url,array('id' => $value['id']));
                        $arr['title']    = $stateBut;
                        $arr['ico']      = $ico;
                        $arr['allClass'] = 'blue';
                        echo but_link($arr);

                        $arr              = array();
                        $arr['url']       = U('del',array('id' => $value['id']));
                        $arr['ico']       = 'icon-trash';
                        $arr['allClass']  = 'red';
                        $arr['attribute'] = ' onclick="return confirm(\'确认要删除这个分类吗？\');" title="删除"';
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