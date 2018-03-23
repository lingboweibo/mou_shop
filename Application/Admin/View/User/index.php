<!DOCTYPE HTML>
<html>
<head>
<title>会员列表</title>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/meta.php'; ?>
</head>
<body>
<?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/header.php'; ?>
<div class="main">
     <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/left.php'; ?>
    <div class="content">
        <h3 class="content_title">会员列表<small>/共<?php echo $count;?>条记录</h3>
        <form action="<?php echo __APP__;?>" method="get" name="form1">
            <table class="action" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button onclick="document.location.href='/index.php/Admin/User/add.html'" class="btn bg_gray" type="button"><span class="icon-plus"></span>添加会员</button></td>
                    <td align="right">
                        <?php include APP_PATH . MODULE_NAME . '/' . C('DEFAULT_V_LAYER') . '/include/key_word.php'; ?>
                    </td>
                </tr>
            </table>
        </form>
        <form action="friend_del.php" method="get" name="form1">
            <table class="list_tab" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>昵称</th>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>电话</th>
                    <th>QQ</th>
                    <th>地区</th>
                    <th>上次登录时间</th>
                    <th>上次登录地点</th>
                    <th>注册时间</th>
                    <th class="text_right">消费额</th>
                    <th class="text_right">积分</th>
                    <th>状态</th>
                    <th>职业</th>
                    <th>操作</th>
                </tr> 
                 <?php
                foreach ($data as $value) {
                    if($value['is_del'] == 0){
                        $state    = '正常';
                        $stateBut = '停用';
                        $url      = 'stop';
                        $ico      = 'icon-stop';
                    }
                    if($value['is_del'] == 2){
                        $state    = '已停用';
                        $stateBut = '恢复';
                        $url      = 'recovery';
                        $ico      = 'icon-reply';
                    }

                    $parArr = getParentCityId($value['city_id']);//获取当前这个会员所在的城市ID的所有上级ID数组、级别高的在前面
                    $parArr[] = $value['city_id'];//把当前这个会员所在的城市ID 也加到 上级ID数组 里，然后这个数组就会包含  当前这个会员所在的城市ID的所有上级ID和他所在城市ID
                    $city = '';
                    //$parArr;这个数组是当前循环到的会员的城市ID的所有上级城市ID数组，再把当前城市ID也加进去，它是一维数组
                    foreach ($parArr as $one) {
                        $city .= cityIdToName($one);
                    }

                    echo '<tr>';
                    echo '    <td>' , $value['id'] , '</td>';
                    echo '    <td>' , $value['nickname'] , '</td>';
                    echo '    <td>' , $value['username'] , '</td>';
                    echo '    <td>' , $value['name'] , '</td>';
                    echo '    <td>' , $value['mobile'] , '</td>';
                    echo '    <td>' , $value['qq'] , '</td>';
                    echo '    <td><div class="div_address">' , $city . $value['address'] , '</div></td>';
                    echo '    <td>' , $value['last_time'] , '</td>';
                    echo '    <td>' , ipToCity($value['ip']) , '</td>';
                    echo '    <td>' , $value['add_time'] , '</td>';
                    echo '    <td class="text_right">' , $value['use_money'] , '</td>';
                    echo '    <td class="text_right">' , $value['integral'] , '</td>';
                    echo '    <td>' , $state , '</td>';
                    echo '    <td>' , jobIdToName($value['job_id']) , '</td>';
                    echo '    <td>';

                    $arr             = array();//让arr重新是一个空数组，避免有上次循环时得到的旧数据
                    $arr['url']      = U('Car/index',array('id' => $value['id'],'name' => $value['name']));
                    $arr['title']    = '看购物车';
                    $arr['ico']      = 'icon-shopping-cart';
                    $arr['allClass'] = 'blue';
                    echo but_link($arr);

                    $arr             = array();//让arr重新是一个空数组，避免有上次循环时得到的旧数据
                    $arr['url']      = U('Favorite/index',array('id' => $value['id'],'name' => $value['name']));
                    $arr['title']    = '看收藏';
                    $arr['ico']      = 'icon-star';
                    $arr['allClass'] = 'blue';
                    echo but_link($arr);

                    $arr             = array();//让arr重新是一个空数组，避免有上次循环时得到的旧数据
                    $arr['url']      = U('edit',array('id' => $value['id']));
                    $arr['title']    = '编辑';
                    $arr['ico']      = 'icon-edit';
                    $arr['allClass'] = 'blue';
                    echo but_link($arr);

                    $arr             = array();
                    $arr['url']      = U($url,array('id' => $value['id']));
                    $arr['title']    = $stateBut;
                    $arr['ico']      = $ico;
                    $arr['allClass'] = 'blue';
                    echo but_link($arr);

                    $arr              = array();//让arr重新是一个空数组，避免有上次循环时得到的旧数据
                    $arr['url']       = U('del',array('id' => $value['id']));   //url 链接的url
                    $arr['title']     = '删除';   //title 链接文字
                    $arr['ico']       = 'icon-trash';  //ico 图标的class 
                    $arr['allClass']  = 'red';   //allClass 附加样式 
                    $arr['attribute'] = ' onclick="return confirm(\'确认要删除这个管理员吗？\');"'; //attribute 附加属性 
                    echo but_link($arr);
                    echo '    </td>';
                    echo '</tr>';
                }
                ?>
            </table>
            <?php echo $pageHtml;?>
        </form>
    </div>
</div>
</body>
</html>