<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>我的账户</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#basic{width:100%;height:102px;background: url("<?php echo $staticPath;?>/images/bg.jpg");background-size: cover; float: left;background-repeat: no-repeat;text-align: center;padding-top:18px;}
#basic>div{color: #fff;line-height: 20px;font-weight: bold;}
#basic>div>img{width:62px;}
#state{width: 100%;height: 65px;float: left;background: #fff;}
#state>ul>li{width:33%;height: 50px; list-style: none;float: left;text-align: center;padding-top: 15px;line-height: 20px;}
#state>ul>li:nth-of-type(2){border-left: 1px solid #be3235;border-right: 1px solid #be3235;}
#state>ul>li>img{width:25px; }
#main{width: 100%;float: left;}
#main div{height: 57px;width: 100%;border-bottom: 1px solid #dfdfdf; float: left;background: #fff;font-size: 14px;}
#main div>span{line-height: 57px; display:block;float: left;}
#main div>img:nth-of-type(1){width:21px;margin-left: 5.5%;margin-right:5.5%;padding-top:17px;float: left;}
#main div>img:nth-of-type(2){width: 12px;float: right;margin-right:5.5%;padding-top: 17px; }
#out{width:70%;height: 40px;float: left;padding:25px 15% 0px 15%;}
input[type="button"]{width: 100%;height: 40px;background:#f7941c; border: 0;font-size: 15px;color: #fff;border-radius: 4px;}
.line{width: 100%; line-height: 50px;text-align: center;color: #939393;font-size: 14px;float: left;}
</style>
<body>
<div id="container">
<p style="height:45px;width:100%;float:left;"></p>
	<div id="header">我的账户
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="basic">
		<div><img src="<?php echo $staticPath;?>/images/photo.png" alt=""></div>
		<div id="name">网林</div>
	</div>
	<div id="state">
		<ul>
			<li><div>0</div><div>我的积分</div></li>
			<li><img src="<?php echo $staticPath;?>/images/ele.jpg" alt=""><div>我的订单</div></li>
			<li><img src="<?php echo $staticPath;?>/images/msg2.jpg" alt=""><div>我的消息</div></li>
		</ul>
	</div>
	<p style="height:10px;width:100%;float:left;border-bottom:1px solid #dfdfdf"></p>

	<div id="main">
		<a href="<?php echo U('userInfo');?>"><div><img src=".<?php echo $staticPath;?>/images/counter1.jpg" alt=""><span>完善会员信息</span><img src=".<?php echo $staticPath;?>/images/help4.jpg" alt=""></div></a>
		<a href="<?php echo U('editPassword');?>"><div><img src=".<?php echo $staticPath;?>/images/counter2.jpg" alt=""><span>修改密码</span><img src=".<?php echo $staticPath;?>/images/help4.jpg" alt=""></div></a>
		<a href="<?php echo U('Address/index');?>"><div><img src=".<?php echo $staticPath;?>/images/counter3.jpg" alt=""><span>我的收货地址</span><img src=".<?php echo $staticPath;?>/images/help4.jpg" alt=""></div></a>
		<a href="<?php echo U('Favorite/index');?>"><div><img src=".<?php echo $staticPath;?>/images/counter4.jpg" alt=""><span>我收藏的商品</span><img src=".<?php echo $staticPath;?>/images/help4.jpg" alt=""></div></a>
		<a href="<?php echo U('UsuallyBuy/index');?>"><div><img src=".<?php echo $staticPath;?>/images/counter5.jpg" alt=""><span>常购清单</span><img src=".<?php echo $staticPath;?>/images/help4.jpg" alt=""></div></a>
		<a href="<?php echo U('Help/index');?>"><div><img src=".<?php echo $staticPath;?>/images/counter6.jpg" alt=""><span>帮助中心</span><img src=".<?php echo $staticPath;?>/images/help4.jpg" alt=""></div></a>
	</div>
	<div id="out"><input type="button" value="安全退出"></div>
	<div class="line">客服热线：400-811-1797</div>
	<?php include $includePath . '/footer.php';?>
</div>
<p style="height:60px;width:100%;float:left;"></p>
</body>
</html>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$("#header img").click(function(){
	window.history.back();
});
</script>
