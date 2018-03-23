<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>登陆</title>
</head>
<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
<style>

#main{width: 100%; float: left;}
#logo img{width: 45%;margin:45px auto;display:block;}
#form1 div{height:40px; width:70%; margin:12px auto;border-bottom:2px solid #c08189;line-height: 40px;}
#form1 input{height:20px;border: 0;background: #8a011d;color: #fff; font-size: 15px;font-weight: 500;outline: none;}
#form1 div:last-of-type{border: 0;margin-top: 40px;}
#form1 input[type="submit"]{width:66.7%;height:40px;background: #f7941c;line-height: 40px;font-size:16px; margin:0px auto;display: block;border-radius:4px;}
#main a{text-decoration: none;font-size: 15px;color: #fff;}
#left{float: left;margin:53px 0 53px 10%;}
#right{float: right;margin:53px 10% 53px 0;color:#fff;t}
#right span{height: 20px; border-bottom: 2px solid #fff;display: inline-block;}
a{color:#fff;text-decoration: none;}
.pageJump span{border-top: 5px solid #1b0005;border-left: 5px solid #1b0005;border-right: 5px solid #1b0005;}

</style>
<body style="background: #8a011d;">
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header" style="background:#1b0005;color:#fff">登陆
		<img src="<?php echo $staticPath;?>/images/login1.png" alt="" id="back">
		<img src="<?php echo $staticPath;?>/images/login2.png" alt="" id="showpage">
	</div>
	<div id="main">
		<div id="logo"><img src="<?php echo $staticPath;?>/images/login3.png" alt=""></div>
		<form action="" id="form1">
			<div><input type="text" name="username" placeholder="邮箱/手机号" value="18825122025"></div>
			<div><input type="password" name="password" placeholder="密码" value="123456"></div>
			<div><input type="submit" value="登陆" ></div>
		</form>
		<hr style="width:80%;border:1px solid #fff;margin:77px auto 0px;">
		<div id="left"><a href="">忘记密码？</a></div><div id="right">还没有账号？<a href="<?php echo U('User/reg');?>"><span>注册</span></a></div>
	</div>
	<div class="pageJump">
		<span></span>
		<ul>
			<li><a href="<?php echo U('Index/index');?>"><img src="<?php echo $staticPath;?>/images/pageJump1.png" alt="">首页</a></li>
			<li><a href="<?php echo U('Category/index')?>"><img src="<?php echo $staticPath;?>/images/pageJump2.png" alt="">分类</a></li>
			<li><a href="<?php echo U('Category/index')?>"><img src="<?php echo $staticPath;?>/images/pageJump3.png" alt="">购物车</a></li>
			<li><a href="<?php echo U('User/account')?>"><img src="<?php echo $staticPath;?>/images/pageJump4.png" alt="">我的账户</a></li>
		</ul>
	</div>
</div>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$(":submit").click(function(event){
	$.ajax({
		type:"POST",
		data:{"username":$("[name=username]").val(),"password":$("[name=password]").val()},
		url:'<?php echo U('loginTo');?>',
		success:function(data){
			if(data.code=="ok"){
				window.location.assign("<?php echo U('Index/index')?>");
			}else{
				alert(data.msg);
			}
		},
		dataType:"json"
	});
	event.preventDefault()
});
</script>
