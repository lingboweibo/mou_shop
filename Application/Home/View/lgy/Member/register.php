<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>注册</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.middle{width: 100%}
.middle p{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.bottom{width: 100%;margin-top:40px}
.bottom ul{width: 100%;background-color: #fff}
.bottom ul li{zoom:1;overflow: hidden;width: 100%;border-bottom: 1px solid #ccc;padding: 15px 0}
.bottom ul li .left{width:26.38888888888889%;float: left;text-align: right; }
.bottom ul li .right{width:70.61111111111111%;float: left;margin-left:8px }
.bottom ul li .right input{border:none;height:18px}
.bottom ul li:nth-child(3) input,.bottom ul li:nth-child(4) input{width:120px}
.bottom ul li .right img{width:60px;float: right;margin-right: 10px}
.bottom ul li .right button{float: right;margin-right: 10px;padding: 5px 4px;background-color: #fa9414;color: #fff;border:none;border-radius: 4px}
.bottom #button1{width: 100%;text-align: center;}
.bottom #button1 button{width:84.72222222222222%;padding: 10px 0;background-color: #e1e1e1;border:none;border-radius:2px;color: #fff;font-size: 14px;margin-top: 80px }
.bottom .words{width:100%;text-align: center;margin-top: 10px;color: #919191}
.bottom .words span{color:#710d29 }
</style>
</head>
<body>
<div class="wrap">
	<div class="middle">
		<p class="topic">
		    <span class="icon-angle-left"></span>
		    <span id="textInfo">注册</span>
	    </p>
	</div>
	<form action="" name="regForm" id="form1">
		<div class="bottom">
					<ul>
						<li>
							<div class="left">用户昵称</div>
							<div class="right"><input type="text" name="nickname" placeholder="请输入用户昵称" value="" ></div>
						</li>
						<li>
							<div class="left">手机号码</div>
							<div class="right"><input type="text" name="mobile" placeholder="请输入手机号码" value="" pattern="[0-9]{11}"></div>
						</li>
						<li>
							<div class="left">验证码</div>
			    			<div class="right">
			    				<input type="text" name="validate_code" pattern="[0-9]{4}" class="yanzhengma" placeholder="请输入验证码" value=""><img src="images/4E9A5E.jpg" class="yanzhengma_img">
			    			</div>
						</li>
						<li>
							<div class="left">短信验证</div>
			    			<div class="right">
			    				<input type="text" name="code" pattern="[0-9]{4}" class="yanzhengma" placeholder="请输入短信验证码" value=""><button>发送验证码</button>
			    			</div>
						</li>
						<li>
							<div class="left">设置密码</div>
							<div class="right"><input type="password" name="password" placeholder="请设置6-18位数字字母组合" value="13217502457" max="18" min="6"></div>
						</li>
						<li>
							<div class="left">确认密码</div>
							<div class="right"><input type="password" name="password1" placeholder="请再次输入密码" value="13217502457"></div>
						</li>
					</ul>
				<div id="button1"><button>注册</button></div>
				<div class="words">点击注册即表示您已同意<span>《城市超市服务协议》</span></div>
			</div>
		</form>

	<footer>
		<div class="footerTop">
			<ul>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 737px;"></div><div>首页</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:8px;display: inline-block;background-size:95px;background-position:-22px 715px;"></div><div>分类</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:35px;height:10px;display: inline-block;background-size:95px;background-position:-110px 673px;"></div><div>购物车</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:35px;height:8px;display: inline-block;background-size:95px;background-position:-49px 694px;"></div><div>我的账户</div></a>
				</li>
			</ul>
		</div>
	</footer>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/pub.js"></script>
<!-- <script src="js/InputCheck.js"></script> -->
<!-- <script src="js/MyHttp.js"></script> -->
<script type="text/javascript">
// function checkFormErr(){
// 	var err = new InputCheck(document.regForm.nickname).ifErrFocus(true);if(err)return true;//验证用户名是否合法
// 	err     = new InputCheck(document.regForm.password).ifErrFocus(true);if(err)return true;//验证密码是否合法
// 	err     = new InputCheck(document.regForm.validate_code ).ifErrFocus(true);if(err)return true;//验证姓名是否合法
// 	// err     = new InputCheck(document.regForm.validate_code     ).ifErrFocus(true);if(err)return true;//验证姓名是否合法
// }
$('#button1 button').click(
	function(){
		console.log(1);
		$.ajax(
			{
				type:'POST',
				url:'http://pc2016:8015/index.php?m=Home&c=User&a=regTo',
				data:{
					'nickname':document.regForm.nickname.value,
					'mobile':document.regForm.mobile.value,
					'validate_code':'9999',
					'password':document.regForm.password.value,
				},
				success:function(data){
					console.log(data);
					if(data.code =='ok'){
						alert('注册成功');
						// window.location.assign('login.html?mobile='+mobile+'&password' + password);
					}
					
				},
				error:function(){alert(data.msg);},
				dataType:'json',
			}	
		)
	}
)
</script>