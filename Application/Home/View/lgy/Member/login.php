<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登录</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.middle{width: 100%;}
.middle #textInfo{color: #fff}
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0;background-color:#000;color: #fff;border:none;}
#content .slice{border-right:10px solid #000;border-left:10px solid #000;}
.detailsInfo{width: 100%;margin-top:38px;background-color: #8a011d}
.detailsInfo .top{width: 100%;text-align: center;padding:20px 0}
.detailsInfo .top img{width:35.83333333333333%;height:60px;text-align: center;margin:0 auto}
.detailsInfo .bot{width: 100%}
.detailsInfo .bot ul li{width:74.72222222222222%;zoom: 1;overflow: hidden;border-bottom: 1px solid #c08388;padding: 10px 0;text-align: center;margin: 0 auto}
.detailsInfo .bot ul li .left{float: left;width: 30%;color: #fff;text-align: left;}
.detailsInfo .bot ul li .right{float: left;width: 61.11111111111111%}
.detailsInfo .bot ul li .right input{width: 100%;height: 20px;border: none;outline: none;background-color: #8a011d;color: #fff}
.detailsInfo .bot .but{width: 100%;text-align: center;padding:25px 0}
.detailsInfo .bot .but button{width:62.91666666666667%;color: #fff;padding:10px 0;background-color: #f7941c;border: none;border-radius:3px;}
.detailsInfo .footer{zoom:1;overflow:hidden;width:90%;border-top:1px solid #fff;text-align: center;padding: 10px 0;text-align: center;margin: 0 auto}
.detailsInfo .footer .left{float: left;width:45.41666666666667%;padding: 10px 0;color: #fff}
.detailsInfo .footer .right{float: left;width:44%;padding: 10px 0;color: #fff}
.detailsInfo .footer .right a{text-decoration:underline;color: #fff;font-size: 14px}
</style>
</head>
<body>
<div class="wrap">
	<div class="middle">
		<p class="topic">
		    <span class="icon-angle-left"></span>
		    <span id="textInfo">登录</span>
		    <span class="icon-th"></span>
	    </p>
	</div>
	<div id="content">
        <div class="slice"></div>
        <div class="div1">
            <ul>
                <li>
                    <a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:22px;display: inline-block;background-size:95px;color:#fff;background-position:1px 737px;"></div><div>首页</div></a>
                </li>
                <li id="sortPage">
                    <a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:18px;display: inline-block;background-size:95px;color:#fff;background-position:3px 716px;"></div><div>分类</div></a>
                </li>
                <li>
                    <a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:30px;height:20px;display: inline-block;background-size:95px;color:#fff;background-position:-90px 675px;"></div><div>购物车</div></a>
                </li>
                <li>
                    <a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:30px;height:16px;display: inline-block;background-size:95px;color:#fff;background-position:2px 694px;"></div><div>我的账户</div></a>
                </li>
            </ul>
        </div>
    </div>	
	<div class="detailsInfo">
		<form action="" name="" id="form1">
			<div class="top"><img src="images/login.jpg"></div>		
			<div class="bot">
				<ul>
					<li>
						<div class="left">邮箱/手机号</div>
						<div class="right"><input type="text" name="mobile" value=""></div>
					</li>
					<li>
						<div class="left">密码</div>
						<div class="right"><input type="password" name="password" value=""></div>
					</li>
				</ul>
				<div class="but"><button>登录</button></div>
			</div>
		</form>
		<div class="footer">
			<div class="left">忘记密码？</div>
			<div class="right">还没有账号？<a href="#">注册</a></div>
		</div>
	</div>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script type="text/javascript">
//点击右上角，显示content的内容
$('#content').hide();
$('.icon-th').click(
    function(){
        console.log(1);
        $('#content').show();
    }
);
//点其它地方就隐藏content的内容
$('.detailsInfo').click(
	function(){
		$('#content').hide();
	}
)
//点击content里的每一个li分别跳转到相应的页面
$('.div1 li:eq(0)').click(
	function(){
		window.location.assign('index.html');
	}
)
$('.div1 li:eq(1)').click(
	function(){
		window.location.assign('goods_sort.html');
	}
)
$('.div1 li:eq(2)').click(
	function(){
		window.location.assign('buy.html');
	}
)
$('.div1 li:eq(3)').click(
	function(){
		window.location.assign('host.html');
	}
)
$('.footer a').click(
	function(){
		window.location.assign('register.html');
	}
)
//点登录
$('.but button').click(
	function(){
		console.log(1);
		$.ajax(
			{
				type:'POST',
				url:'http://pc2016:8015/index.php?m=Home&c=User&a=loginTo',
				data:{
					// 'nickname':document.regForm.nickname.value,
					'mobile':document.regForm.mobile.value,
					'password':document.regForm.password.value,
				},
				success:function(data){
					console.log(data);
					if(data.code =='ok'){
						alert('注册成功');
					}else{
						alert('注册失败' + data.msg);
					}	
				},
				// error:function(){alert(data.msg);},
				dataType:'json',
			}	
		)
	}
)
</script>