 <!DOCTYPE HTML>
<html>
<head>
	<title>我的账户</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/user.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>我的账户<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<div class="my-message">
			<div><img src="<?php echo $staticPath;?>/imgs/avatar.png" alt=""><br><h3>网林</h3></div>
			<ul>
				<li><a><span>0</span>我的积分</a></li>
				<li><a><span class="icon-file-alt"></span>我的订单</a></li>
				<li><a><span class="icon-envelope-alt"></span>我的消息</a></li>
			</ul>
		</div>
		<ul class="user_list">
			<li><a><div class="icon"><i class="icon-cog"></i></div>完善会员信息<div><i class="icon-angle-right"></i></div></a></li>
			<li><a><div class="icon"><i class="icon-lock"></i></div>修改密码<div><i class="icon-angle-right"></i></div></a></li>
			<li><a><div class="icon"><i class="icon-map-marker"></i></div>我的收货地址<div><i class="icon-angle-right"></i></div></a></li>
			<li><a><div class="icon"><i class="icon-star-empty"></i></div>我收藏的商品<div><i class="icon-angle-right"></i></div></a></li>
			<li><a><div class="icon"><i class="icon-edit"></i></div>常购清单<div><i class="icon-angle-right"></i></div></a></li>
			<li><a><div class="icon"><i class="icon-question-sign"></i></div>帮助中心<div><i class="icon-angle-right"></i></div></a></li>
		</ul>
		<button><a href="login.html">安全退出</a></button><br>
		客服热线：400-811-1797
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/user.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</body>
</html>