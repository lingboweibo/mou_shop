<!DOCTYPE HTML>
<html>
<head>
	<title>修改密码</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/password.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>修改密码<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<form action="<?php echo U();?>" name="editPasswordForm">
			<ul>
				<li><div class="left">当前密码</div><div class="right"><input name="password_old" type="password" placeholder="当前密码" value="123456"></div></li>
				<li><div class="left">新密码</div><div class="right"><input name="password" type="password" placeholder="请设置6-18位数字字母组合" value="123456"></div></li>
				<li><div class="left">确认密码</div><div class="right"><input name="password_new" type="password" placeholder="请再次输入新密码" value="123456"></div></li>
				<li><div class="left">验证码</div><div class="right"><input name="validate_code" type="text" placeholder="请输入验证码" value="123456"><img src="<?php echo $staticPath;?>/imgs/4E9A5E.jpg" alt=""></div></li>
			</ul>
			<input type="button" value="保存">
		</form>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/InputCheck.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
function checkFormErr(){//验证表单
	var err = new InputCheck(document.editPasswordForm.password_old).ifErrFocus(true);if(err)return true;//验证用户名是否合法
	err     = new InputCheck(document.editPasswordForm.password    ).ifErrFocus(true);if(err)return true;//验证密码是否合法
}
$('form input:button').click(
	function () {
		if(checkFormErr()){//显示错误提示
			//$('#error_msg').css('background-position','10%');
			return;
		}else{
			//$('#error_msg').html('');
			//$('#error_msg').css('background-position','-10%');
		}
		//修改密码
		$.ajax({
			url: '<?php echo U('editPasswordApi');?>',  //调用修改密码接口
			type: 'POST',
			dataType: 'json',
			data: {
				'password_old':document.editPasswordForm.password_old.value,
				'password':document.editPasswordForm.password.value,
			},
			error: function(){
				alert('发生错误');
			},
			success: function(data){
				if(data.code == 'ok'){
					console.log(data);
					//window.location.assign('<?php echo U('');?>');
				}else{
					//$('#error_msg').html(data.msg);
					//$('#error_msg').css('background-position','10%');
					console.log(data);
				}
			},
		});
	}
)
</script>
</body>
</html>