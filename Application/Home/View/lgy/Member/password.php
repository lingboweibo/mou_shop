<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改密码</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.detailsInfo{border: none;margin-top:40px}
.detailsInfo ul li{zoom:1;overflow:hidden;width:100%;border-bottom: 1px solid #ccc;padding:15px 10px; background-color:#fff}
.detailsInfo ul li .left{float: left;font-size: 12px;width: 20%;text-align: right;}
.detailsInfo ul li .right{float: left;width: 70%;margin-left:10px;}
.detailsInfo ul li .right input{border: none;}
.detailsInfo ul li:last-child .right input{width: 40%}
.detailsInfo ul li .right img{float:right;width:24.77777777777778%;height:25px;line-height:25px}
#button1{width:100%;text-align:center;margin-top: 20px}
#button1 button{width:84.72222222222222%;background-color:#e1e1e1;color: #fff; font-weight: bold; height:30px;line-height:30px;border:none; border-radius:4px;}
</style>
</head>
<body>
<div class="wrap">
	<div>
		<form action="" name="form1" id="form1">
			<div class="middle">
				<p class="topic">
				    <span class="icon-angle-left"></span>
				    <span id="textInfo">修改密码</span>
			    </p>
			</div>
			<div class="detailsInfo">
				<ul>
					<li>
						<div class="left">当前密码</div>
						<div class="right"><input type="password" name="srcPassword" placeholder="当前密码" pattern=""></div>
					</li>
					<li>
						<div class="left">新密码</div>
						<div class="right"><input type="password" name="password1" placeholder="请设置6-18位数字字母组合"></div>
					</li>
					<li>
						<div class="left">确认密码</div>
						<div class="right"><input type="password" name="password2" placeholder="请再次输入新密码"></div>
					</li>
					<li>
						<div class="left">验证码</div>
		    			<div class="right">
		    				<input type="text" name="check_code" pattern="[A-z]{4}" class="yanzhengma" placeholder="请输入验证码"><img src="images/4E9A5E.jpg" class="yanzhengma_img">
		    			</div>
					</li>
				</ul>
			</div>
			<div id="button1"><button>保存</button></div>
		</form>
	</div>
	<footer>
		<div class="footerTop">
			<ul>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 737px;"></div><div>首页</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 715px;"></div><div>分类</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-110px 673px;"></div><div>购物车</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:40px;height:13px;display: inline-block;background-size:95px;background-position:-13px 695px;"></div><div>我的账户</div></a>
				</li>
			</ul>
		</div>
	</footer>	
</div>
</body>
</html>
<!-- <script src="js/pub.js"></script> -->
<!-- <script src="js/InputCheck1.js"></script> -->
<script src="js/jquery-1.4.4.js"></script>
<script type="text/javascript">
$('.icon-angle-left').click(
	function(){
		window.location.assign('host.html');
	}
)
$('#form1 button').click(
	function (){
		console.log(1);
		// var password =$('#form1 input[name="password1"]');
		// //  \w等价于[a-zA-Z0-9]
		// var pwd = new RegExp(/\w{6,18}/g);
		// if(password != pwd){
		// 	var e = event||window.event;
		// 	event.preventDefault();
		// 	event.returnValue = false;
		// 	alert('请设置6-18位数字字母组合');
		// }else{
		// 	alert('恭喜你,密码填写正确');
		// }
	}	
)

</script>