<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>常购清单</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#main{text-align: center;font-size:13px;line-height:20px;width: 100%;}
#main img{width:35.6%;margin-top:50px;}
#main>div:nth-of-type(1){margin-top:28px;}
#main>div:nth-of-type(2){width:70%; margin:55px auto;font-size: 15px;color:#fff; text-align: center;line-height:40px; background: #f7941c;border-radius:5px;}

</style>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">常购清单
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="main">
		<img src="<?php echo $staticPath;?>/images/list1.jpg" alt="">
		<div>常购清单还是空空的~<br>逛逛商品吧！</div>
		<div id="returnBtn">返回首页</div>
	</div>
	<br clear="both">
	<?php include $includePath . '/footer.php';?>
</div>	
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</html>
