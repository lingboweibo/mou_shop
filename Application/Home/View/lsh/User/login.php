<!DOCTYPE HTML>
<html>
<head>
	<title>登录</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/login.css?v=<?php echo C('STATIC_VERSION');?>">
	<style>

</style>
</head>
<body>
	<div class="header">
		<h2>登录
			<div onclick="window.history.back()"><i class="icon-angle-left"></i></div>
			<div class="nav" id="nav">
				<ul>
					<li><a href="<?php echo U('Index/index');?>"><i class="icon-home"></i>首页</a></li>
					<li><a href="<?php echo U('Category/index');?>"><i class="icon-reorder"></i>分类</a></li>
					<li><a href="<?php echo U('Car/index');?>"><i class="icon-shopping-cart"></i>购物车</a></li>
					<li><a href="<?php echo U('User/account');?>"><i class="icon-user"></i>我的账户</a></li>
				<div class="triangle"></div>
				</ul>
			</div>
			<div id="trigger_nav"><i class="icon-th"></i></div>
		</h2>
	</div>
	<div id="mongolia_layer"></div>
	<div class="main">
	<img src="<?php echo $staticPath;?>/imgs/cs-logo-large.png" alt="">
		<div class="error_msg" id="error_msg"></div>
		<form name="loginForm">
			<input type="text" value="13553522744" name="username" require="require"  cn_name="用户名" min="5" max="15" placeholder="邮箱/手机号"><br>
			<input type="password" value="789456" name="password" require="require" cn_name="密码" min="5" max="32" placeholder="密码"><br>
			<input type="button" value="登录">
		</form>
	<div class="footer"><div class="left"><a href="javascript:void(0)">忘记密码？</a></div>
	<div class="right">还没有账号？<a href="<?php echo U('User/reg');?>">注册</a></div></div>
	</div>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/InputCheck.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
function checkFormErr(){//验证表单
	var err = new InputCheck(document.loginForm.username).ifErrFocus(true);if(err)return true;//验证用户名是否合法
	err     = new InputCheck(document.loginForm.password).ifErrFocus(true);if(err)return true;//验证密码是否合法
}
$('form input:button').click(
	function () {
		if(checkFormErr()){//显示错误提示
			$('#error_msg').css('background-position','10%');
			return;
		}else{
			$('#error_msg').html('');
			$('#error_msg').css('background-position','-10%');
		}
		//登录
		$.ajax({
			url: '<?php echo U('loginTo');?>',
			type: 'POST',
			dataType: 'json',
			data: {
				'username':document.loginForm.username.value,
				'password':document.loginForm.password.value,
			},
			error: function(){
				alert('发生错误');
			},
			success: function(data){
				if(data.code == 'ok'){
					console.log(data);
					window.location.assign('<?php echo U('account');?>');
				}else{
					$('#error_msg').html(data.msg);
					$('#error_msg').css('background-position','10%');
					console.log(data.msg);
				}
			},
		});
		
	}
)
$('#trigger_nav').toggle(
	function () {
		$('#mongolia_layer').css({'width':screen.width,'height':screen.height});
		$('#mongolia_layer').show();
		$('#nav').show();
	},
	function () {
		$('#mongolia_layer').hide();
		$('#nav').hide();
	}
)
$('#mongolia_layer').click(
	function () {
		$('#mongolia_layer').hide();
		$('#nav').hide();
	}
)
</script>
</body>
</html>