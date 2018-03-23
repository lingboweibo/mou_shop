<!DOCTYPE HTML>
<html>
<head>
	<title>我的消息</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>我的消息<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<i class="icon-comments-alt"></i>
		<h4>亲，你暂时没有收到消息哦！</h4>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</body>
</html>