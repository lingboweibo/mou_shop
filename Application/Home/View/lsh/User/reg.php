<!DOCTYPE HTML>
<html>
<head>
	<title>注册</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/register.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>注册<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<form name="regForm">
			<ul>
				<li>
					<div class="left">用户昵称</div>
					<div class="right">
						<input type="text" name="nickname" require="require"  cn_name="用户昵称" min="3" max="15" value="用户昵称" placeholder="请输入用户昵称">
					</div>
				</li>
				<li>
					<div class="left">手机号码</div>
					<div class="right">
						<input type="password" name="mobile" require="require"  cn_name="手机号码" min="11" max="11" value="13553522744" placeholder="请输入手机号码">
					</div>
				</li>
				<li>
					<div class="left">验证码</div>
					<div class="right">
						<input type="text" name="validate_code" require="require"  cn_name="验证码" min="4" max="6" value="9999" placeholder="请输入验证码"><img src="<?php echo $staticPath;?>/imgs/4E9A5E.jpg" alt="">
					</div>
				</li>
				<li>
					<div class="left">短信验证</div>
					<div class="right">
						<input type="text" name="msg" require="require"  cn_name="短信验证" min="4" max="6" value="123456" placeholder="请输入短信验证码"><button>发送验证码</button>
					</div>
				</li>
				<li>
					<div class="left">设置密码</div>
					<div class="right">
						<input type="password" name="set" require="require"  cn_name="密码" min="6" max="32" value="456123" placeholder="请设置6-18位数字字母组合">
					</div>
				</li>
				<li>
					<div class="left">确认密码</div>
					<div class="right">
						<input type="password" name="password" require="require"  cn_name="密码"  min="6" max="32" value="456123" placeholder="请再次输入密码">
					</div>
				</li>
			</ul>
			<div class="error_msg" id="error_msg"></div>
			<input type="button" value="注册">
		</form>
		<h3>点击注册即表示您已同意<a href="javascript:void(0)">《城市超市服务协议》</a></h3>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/InputCheck.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
function checkFormErr(){
	var err = new InputCheck(document.regForm.nickname).ifErrFocus(true);if(err)return true;          //验证用户名是否合法
	err     = new InputCheck(document.regForm.mobile).ifErrFocus(true);if(err)return true;            //验证密码是否合法
	err     = new InputCheck(document.regForm.validate_code).ifErrFocus(true);if(err)return true;
	err     = new InputCheck(document.regForm.password).ifErrFocus(true);if(err)return true;
}
$('form input:button').click(  //调用注册接口
	function () {
		if(checkFormErr()){
			return;
		}else{
			$('#error_msg').html('');
		}
		$.ajax({
			url: "<?php echo U('User/regTo');?>",
			type: 'POST',
			dataType: 'json',
			data: {
				'nickname':document.regForm.nickname.value,
				'mobile':document.regForm.mobile.value,
				'validate_code':document.regForm.validate_code.value,
				'password':document.regForm.password.value
			},
			error: function(){
				alert('ajax失败');
			},
			success: function(data){
				if(data.code == 'ok'){
					alert('注册成功');
					console.log(data);
				}else{
					$('#error_msg').html(data.msg);
				}
			},
		});
	}
)
</script>
</body>
</html>