<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>注册</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
<style>
#main{width: 100%; background:#fff;float: left;}
#main>form>div{height: 50px;width: 100%;line-height:50px;font-size: 15px;border-bottom:1px solid #dfdfdf;}
#main>form>div>span:nth-of-type(1){width:23%;text-align: right;display: block;float: left;}
#main>form input{height: 30px;width:70%; margin-left: 10px;color: #858585;display:block;float: left;margin-top:10px;padding-left: 5px; border: 0;outline: none;}
.register{width: 70%;background: #f6f6f6;padding:30px 15% 0 15%;display:block;float: left;}
#register{height: 40px;width:100%;margin:0px;padding:0; background: #e1e1e1;color: #fff;border:0; border-radius:3px;}
#main>form>div:nth-of-type(3)>span:last-of-type{width:22.2%;height:40px;display: block; float: right;margin:10px 5.5% 0 0;}
#main>form>div:nth-of-type(4)>span:last-of-type{width:22.2%;display: block; float: right;margin-right:5.5%;margin-top:10px;font-size:12px;text-align: center;line-height: 28px;background: #f59618;color: #fff;border-radius: 3px;}
#test{width: initial;height:28px;border: 1px solid #bebec0;}
#msg{height:30px;width: 100%; color:#680e28;text-align: center;display: block;float: left;line-height: 30px;font-size: 12px;}
</style> 
</head>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">注册
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="main">
		<form action="" name="form1">
			<div>
				<span>用户昵称</span>
				<input type="text" name="name" placeholder="请输入用户昵称">
			</div>
			<div><span>手机号码</span><input type="text" name="phoneNum" placeholder="请输入手机号码"></div>
			<div><span>验证码</span><input type="text" name="test" placeholder="请输入验证码" style="width:40%;"><span><img src="<?php echo $staticPath;?>/images/testify.jpg" alt="" id="test"></span></div>
			<div><span>短信验证</span><input type="text" name="noteTest" placeholder="请输入短信验证码"style="width:40%;"><span >发送短信</span></div>
			<div><span>设置密码</span><input type="password" name="pwd" placeholder="请设置6-18位数字字母密码组合"></div>
			<div><span>确认密码</span><input type="password" name="pwdTwo" placeholder="请再输入密码"></div>
			<span id="msg"></span>
			<span class="register"><input type="button" id="register" value="注册"></span>
			</form>

		</div>
	<div style="width:100%; text-align: center;color:#8e8e8e;line-height: 42px;font-size:14px;float:left;">点击注册即表示您已同意<span style="color:#680e28;">《城市超市服务协议》</span></div>
	<?php include $includePath . '/footer.php';?>
</div>	
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$('input[name="name"]').blur(function(){
	if($(this).val().length<2 || $(this).val().length>32){
		$("#msg").html("昵称的字数必须在2到32之间");
	}else{
		$("#msg").html("");
	}
});

$('input[name="phoneNum"]').blur(function(){
	if(this.value.length<11 || this.value.length>16){
		$("#msg").html("手机号码的字数必须在11到16之间");
	}else{
		$("#msg").html("");
	}
});
$('input[name="phoneNum"]').keyup(function(){
	this.value = this.value.replace(/[^\d]/g,'');
});

$('input[name="pwd"]').blur(function(){
	if(this.value.length<6 || this.value.length>18){
		$("#msg").html("密码的字数必须在6到18之间");
	}else{
		$("#msg").html("");
	}
});
$('input[name="pwdTwo"]').blur(function(){
	if(this.value != $('input[name="pwd"]').val()){
		$("#msg").html("密码不一致");
	}else{
		$("#msg").html("");
	}
});
var a=0;
$('form[name="form1"]').click(function(){
	var input = document.getElementsByTagName("input");
	$(this).children("input").each(function(){
		console.log($(this));
	})
	
});

$("#register").click(function(){
	$.ajax({
		type:"POST",
		data:{"nickname":$("[name=name]").val(),"mobile":$("[name=phoneNum]").val(),"validate_code":"9999","password":$("[name=pwd]").val()},
		url:"http://pc2016:8015/index.php?m=Home&c=User&a=regTo",
		success:function(data){
			if(data.code == "ok"){
				alert("注册成功！");
				window.location.assign("login.html");
			}else{
				$("#msg").html(data.msg);
			}
		},
		datatype:"json"
	});
});
</script>
</html>
