<!DOCTYPE HTML>
<html>
<head>
<title>添加会员</title>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/meta.php" ?>
</head>
<body>
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/header.php" ?>
<div class="main">
<?php include APP_PATH.MODULE_NAME."/".C('DEFAULT_V_LAYER')."/include/left.php" ?>
    <div class="content">
        <h3 class="content_title">会员设置<small>/添加会员</small></h3>
        <form class="form" action="<?php echo U('addSubmit')?>" method="post">
            <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>用户名:</th>
                    <td><input value="user1" name="username" type="text" maxlength="16" size="22"></td>
                </tr>
                <tr>
                    <th>密码:</th>
                    <td><input value="user1" name="password" type="password" maxlength="32" size="22"></td>
                </tr>
                <tr>
                    <th>确认密码:</th>
                    <td><input value="user1" name="repassword" type="password" maxlength="32" size="22"></td>
                </tr>
                <tr>
                    <th>姓名:</th>
                    <td><input value="user1" name="name" type="text" maxlength="32" size="22"></td>
                </tr>
                <tr>
                    <th>昵称</th>
                    <td><input value="user1" name="nickname" type="text" maxlength="32" size="22"></td>
                </tr>
                <tr>
                    <th>性别:</th>
                    <td>
                        <input name="sex" type="radio" value="1" checked="checked">男
                        <input name="sex" type="radio" value="2">女
                        <input name="sex" type="radio" value="3">未知
                    </td>
                </tr>
                <tr>
                    <th>职业</th>
                    <td>
                        <?php
                        $job = getJobData();
                        $city = getCityData();
                        $arr['data']  = $job;//选项数据 表示下拉选择要显示哪些选项，这里职业的下拉选择框，要显示的选择就是职业数据
                        $arr['name']  = 'job_id';//select的name
                        $arr['addValue']  = '';//附加选项值
                        $arr['addText']  = '请选择';//附加选项文字
                        echo selectHtml($arr);//此函数会返回下拉选择框的HTML
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>生日</th>
                    <td><input name="birth" type="date" maxlength="25" size="22" value="2017-03-02"></td>
                </tr>
                <tr>
                    <th>联系电话</th>
                    <td><input value="15567899899" name="mobile" type="text" maxlength="48" size="22"></td>
                </tr>
                <tr>
                    <th>电子邮件</th>
                    <td><input value="test1@qq.com" name="email" type="text" maxlength="96" size="22"></td>
                </tr>
                <tr>
                    <th>QQ号码</th>
                    <td><input value="test1" name="qq" type="text" maxlength="50" size="22"></td>
                </tr>
                <tr>
                    <th>微信</th>
                    <td><input value="test1" name="wechat" type="text" maxlength="32" size="22"></td>
                </tr>
                <tr>
                    <th>所在地区：</th>
                    <td id="select_city">
                        <?php
                        $arr = array();//重新赋值，以清除前面的赋值
                        $arr['data']  = $city;//选项数据 表示下拉选择要显示哪些选项，这里职业的下拉选择框，要显示的选择就是职业数据
                        $arr['name']  = 'city_id[]';//select的name
                        $arr['addValue']  = '';//附加选项值
                        $arr['addText']  = '请选择';//附加选项文字
                        echo selectHtml($arr);//此函数会返回下拉选择框的HTML
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>详细地址</th>
                    <td><input value="详细地址" name="address" type="text" maxlength="96" size="90"></td>
                </tr>
                <tr>
                    <th>状态:</th>
                    <td>
                        <input name="is_del" type="radio" checked="checked" value="0">启用
                        <input name="is_del" type="radio" value="2">禁用
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="submit">
                        <input name="" type="submit" value="提交添加">
                        <input name="" type="reset" value="重置">
                        <input name="button" type="button" onclick="history.back();" value="不添加了|返回上一页">
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