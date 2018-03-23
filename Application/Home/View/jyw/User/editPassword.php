<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>修改密码</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#main{width: 100%;float: left;background: #fff;}
#main form>div{width: 100%;height:50px;border-bottom: 2px solid #dfdfdf;line-height: 50px;}
#main form>div>span{width: 23.2%;text-align: right;font-size:15px;display:inline-block;}
input[type="password"]{width:60% ;height:30px;margin-left: 5px;padding-left:5px;outline:none; font-size: 15px;border: 0;}
input[name="certify"]{width: 45%;;height:30px;margin-left: 5px;padding-left:5px;outline:none; font-size: 15px;border: 0;}
.cerify{width:20%;height:26px;margin-right: 5.5%;margin-top:8px;float: right; }
.cerify>img{width: 100%;height: 26px;}
#main form>div:last-of-type{height: 140px;width: 100%;background: #f6f6f6;border: 0;float: left;}
#save{width: 69.5%;height: 40px;text-align: center;line-height: 40px;color: #fff;font-size: 15px;border: 0; border-radius: 3px;margin:50px auto;display: block;}
</style>
<body>
<p style="height:47px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">修改密码
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt=""id="back">
	</div>
	<div id="main">
		<form action="" name="alerPwd">
			<div>
				<span>当前密码</span><input type="password" placeholder="当前密码" name="oldPwd">
			</div>
			<div>
				<span>新密码</span><input type="password" placeholder="请设置6-18位数字字母组合" name="newPwd">
			</div>
			<div>
				<span>确认密码</span><input type="password" placeholder="请再次输入新密码" name="confirmPwd">
			</div>
			<div>
				<span>验证码</span><input type="text" placeholder="请输入验证码" name="certify">
				<div class="cerify"><img src="<?php echo $staticPath;?>/images/testify.jpg" alt=""></div>
			</div>
			<div>
				<input type="button" value="保存" id="save">
			</div>
		</form>
	</div>
	<?php include $includePath . '/footer.php';?>
</div>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>



$('input[type="button"]').click(function(){
	$.ajax({
		type:"POST",
		data:{"password_old":$('input[name="oldPwd"]').val(),"password":$('input[name="newPwd"]').val()},
		url:"http://pc2016:8015/index.php?m=Home&c=User&a=editPasswordApi",
		success:function(data){
			console.log(data);
			alert("修改成功");
			window.location.assign("index.html");
			
		},
		dataType:"json"
	});
});
</script>
</html>
