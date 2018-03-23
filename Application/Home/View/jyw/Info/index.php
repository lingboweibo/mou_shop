<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>我的消息</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#main{text-align: center;font-size:13px;line-height:20px;width: 100%;}
#main img{width:35.6%;margin-top:50px;}
#main>div{margin-top:30px;font-size: 15px;}

</style>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">我的消息
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="main">
		<img src="<?php echo $staticPath;?>/images/msg1.jpg" alt="">
		<div>亲，你暂时没有收到消息哦！</div>
	</div>
	<br clear="all">
	<?php include $includePath . '/footer.php';?>
</div>	
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</html>
