<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<title>帮助中心</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#main{width:100%;float: left;background: #fff;border-top: 2px solid #e0e0e0;}
#main>div{padding:15px 0 15px 7%;font-size:13px;border-bottom:1px solid #dfdfdf;}
#main>div>img{float: right;height: 16px;margin-right:5.5%;}
p{width: 100%;height:11px;background:#f6f6f6;border-bottom:1px solid #dfdfdf;}
</style>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">帮助中心
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="main">
		<div>新手上路<img src="<?php echo $staticPath;?>/images/help4.jpg" alt=""></div>
		<div>付款方式<img src="<?php echo $staticPath;?>/images/help4.jpg" alt=""></div>
		<div>配送说明<img src="<?php echo $staticPath;?>/images/help4.jpg" alt=""></div>
		<div>售后服务<img src="./images/help4.jpg" alt=""></div>
		<p></p>
		<div>发票制度问题<img src="<?php echo $staticPath;?>/images/help4.jpg" alt=""></div>
		<div>常见问题<img src="<?php echo $staticPath;?>/images/help4.jpg" alt=""></div>
		<div>客服联系<img src="<?php echo $staticPath;?>/images/help4.jpg" alt=""></div>
	</div>
	<?php include $includePath . '/footer.php';?>
</div>	
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>

</script>
</html>
