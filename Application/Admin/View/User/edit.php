<!DOCTYPE HTML>
<html>
<head>
<title>修改会员资料</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
    <?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">会员管理<small>/修改会员信息</small></h3>
        <form class="form" action="<?php echo U('editSubmit')?>" method="post">
        <input name='id' type='hidden' value="1">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>注册时间:</th>
                    <td><?php echo $data['add_time'] ?></td>
                </tr>
                <tr>
                    <th>消费额:</th>
                    <td><?php echo $data['use_money'] ?></td>
                </tr>
                <tr>
                    <th>积分:</th>
                    <td><?php echo $data['integral'] ?></td>
                </tr>
                <tr>
                    <th>用户名:</th>
                    <td>
                        <input name="username" type="text" maxlength="25" size="22" value="<?php echo $data['username'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>旧密码:</th>
                    <td><input name="password" type="password" maxlength="25" size="22">* 为空表示不修改</td>
                </tr>
                <tr>
                    <th>姓名:</th>
                    <td><input name="name" type="text" maxlength="25" size="22" value="<?php echo $data['name'] ?>"></td>
                </tr>
                <tr>
                    <th>昵称</th>
                    <td><input name="nickname" type="text" maxlength="25" size="22" value="<?php echo $data['nickname'] ?>"></td>
                </tr>
                <tr>
                    <th>性别:</th>
                    <td>
                        <input name="sex" type="radio" value="1"<?php if($data['sex'] == 1){echo ' checked';}?>>男
                        <input name="sex" type="radio" value="2"<?php if($data['sex'] == 2){echo ' checked';}?>>女
                        <input name="sex" type="radio" value="3"<?php if($data['sex'] == 3){echo ' checked';}?>>未知
                    </td>
                </tr>
                <tr>
                    <th>职业</th>
                    <td>
                        <?php
                        $job = getJobData();
                        $arr['data']  = $job;//选项数据 表示下拉选择要显示哪些选项，这是职业的下拉选择框，要显示的选项就是职业数据
                        $arr['name']  = 'job_id';//select的name
                        $arr['value'] = $data['job_id'];//预选值  value=这个值的选项就会被选中
                        echo selectHtml($arr);//此函数会返回下拉选择框的HTML
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>生日：</th>
                    <td><input name="birth" type="date" maxlength="25" size="22" value="<?php echo $data['birth'] ?>"></td>
                </tr>
                <tr>
                    <th>手机号码:</th>
                    <td><input name="mobile" type="text" maxlength="25" size="22" value="<?php echo $data['mobile'] ?>"></td>
                </tr>
                <tr>
                    <th>电子邮件：</th>
                    <td><input name="email" type="text" maxlength="25" size="22" value="<?php echo $data['email'] ?>"></td>
                </tr>
                <tr>
                    <th>QQ：</th>
                    <td><input name="qq" type="text" maxlength="25" size="22" value="<?php echo $data['qq'] ?>"></td>
                </tr>
                <tr>
                    <th>微信：</th>
                    <td><input readonly='true'  name='wechat' type="text" maxlength="25" size="22" value="<?php echo $data['wechat'] ?>"></td>
                </tr>
                <tr>
                    <th>所在地区：</th>
                    <td id="select_city">
                        <?php
                        $arr = array();
                        $arr['addValue']  = '';//附加选项值
                        $arr['addText']  = '请选择';//附加选项文字
                        $arr['name']  = 'city_id[]';//select的name

                        $parArr = getParentCityId($data['city_id']);//获取当前这个会员所在的城市ID的所有上级ID数组、级别高的在前面
                        $parArr[] = $data['city_id'];//把当前这个会员所在的城市ID 也加到 上级ID数组 里，然后这个数组就会包含  当前这个会员所在的城市ID的所有上级ID和他所在城市ID

                        foreach ($parArr as $key => $value) {
                            //echo "$key => $value <br>";
                            if($key == 0){
                                $arr['data']  = getCityData(0);//选项数据 表示下拉选择要显示哪些选项
                            }else{
                                $arr['data']  = getCityData($parArr[$key - 1]);//选项数据 表示下拉选择要显示哪些选项 传当前数组的前一个元素过去获取下级城市数据
                            }
                            $arr['value'] = $value;//预选值  value=这个值的选项就会被选中 循环到的地区ID
                            echo selectHtml($arr);//显示下拉框
                        }
                        //要显示所在地区的那一级的选择框
                        //（如果他是天河区的，那这个选择框还要显示跟天河区同级同上级地区选项，那么要完成这一点就需要获取天河区的上级地区）
                        //可以使用 根据城市ID返回它的所有上级城市ID数组 传 天河区 ID过去，就会获取到 广州市、广东省 

                        //还显示所在地区的所有上级的选择框（这些选择框也是要显示跟这一级地区同级的其它兄弟地区）
                        //因为上级地区可能会有多个，所以要用循环。上面用天河区ID获取到的所有上级只有 广州市、广东省 如果就这样循环，那只会显示 两个选择框
                        //这样还不够，还要加上显示天河区的这个三级选择框，所以这样的话可以把天河区这个ID也加入到 所有上级城市ID数组 里
                        //那这样这个数组就会有 广东省 、广州市、天河区
                        //如果现在循环这个数组，在循环体内显示下拉选择框 就能够显示三个下拉选择框
                        //
                        //接下来面临的问题就是怎么这三个下拉选择框分别显示不同级别的选择
                        //这个问题看似复杂其实也不难，因为在数组里有了三个城市ID，最高级别的城区，是数组下标为0的元素，第二级的是下标为1的元素，第三级是下标为2的元素……
                        //所以在显示这数组是下标为0的城市选择框时，那选项就是一级城市，获取某个ID的城市的下级城市也是有写好的函数的 getCityData()
                        //循环到下标为1时， 要获取二级城市选项，也就是获取这二级城市的父级城市的所有下级城市 其实就用 数组[$key-1] 这样就能获取到它的上级城市ID
                        //获取到它的上级城市ID 之后再想要获取它的所有下级城市 getCityData(它的上级城市ID)
                        //
                        //还要让所有每一级的城市被选中
                        //$arr['value'] = $value;//预选值  value=这个值的选项就会被选中 循环到的地区ID
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>详细地址</th>
                    <td><input name="address" type="text" maxlength="25" size="90" value="<?php echo $data['address'] ?>"></td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input name="id" type="hidden" value="<?php echo $data['id'] ?>">
                        <input name="" type="submit" value="提交修改">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不修改了|返回上一页" >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<script>
var AJAX_URL_CITY = '<?php echo U('Home/City/getCity',array('id' => 'CITY_ID_CITY_ID_CITY_ID'));//CITY_ID_CITY_ID_CITY_ID是一个自定义的标识符，到时在JS里会被替换为选中项的value ?>';
</script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/city.js?v=<?php echo C('STATIC_VERSION');?>"></script>