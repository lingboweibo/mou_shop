<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<title>收藏夹</title>
</head>
<style>
#main{width: 100%;float: left;background: #fff;}
#main>div{width:100%;height: 80px;padding:10px 0;border-bottom: 2px solid #dfdfdf;}
.left{width: 22.8%;height: 80px; margin-left: 10px;;float: left;}
.left>img{width:100%;height: 100%; float: left;}
.center{width: 53%;height: 80px;margin-left:10px;float: left;}
.name{height: 35px;font-weight: bold;}
.standard{font-size:11px;color:#898989;line-height:20px;  }
.money{font-size: 16px;color:#940e0b;font-weight: bold;line-height: 20px;}
.right{width:16.6%;height: 25px;margin-top:55px;  float: right;}
.right>img{height:24px; }
#nomore{line-height:38px;font-size:15px;text-align: center; color:#434343;}
</style>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">收藏夹
		<img src="<?php echo $staticPath?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="main">
		<div>
			<div class="left">
				<img src="<?php echo $staticPath?>/images/cart4.jpg" alt="">
			</div>
			<div class="center">
				<div class="name">佳世坦纳牌含气饮用水</div>
				<div class="standard">规格：1.5升</div>
				<div class="money">￥10.50</div>
			</div>
			<div class="right">
				<img src="<?php echo $staticPath?>/images/add.jpg" alt="">
				<img src="<?php echo $staticPath?>/images/cart5.jpg" alt="">
			</div>
		</div>		<div>
			<div class="left">
				<img src="<?php echo $staticPath?>/images/cart3.jpg" alt="">
			</div>
			<div class="center">
				<div class="name">咖喱牛肉</div>
				<div class="standard">规格：约240g/份</div>
				<div class="money">￥18.50</div>
			</div>
			<div class="right">
				<img src="<?php echo $staticPath?>/images/add.jpg" alt="">
				<img src="<?php echo $staticPath?>/images/cart5.jpg" alt="">
			</div>
		</div>
	</div>
	<div id="nomore">---没有更多商品---</div>
	<?php include $includePath . '/footer.php';?>
</div>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</html>
