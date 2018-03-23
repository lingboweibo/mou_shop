<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $data['name'];?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="keywords" content="<?php echo $data['keywords'];?>">
	<meta http-equiv="description" content="<?php echo $data['remark'];?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/goods_details.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2><?php echo $data['name'];?><div onclick="window.history.back()"><i class="icon-angle-left"></i></div><div><i class="icon-user"></i></div></h2>
	</div>
	<div class="main">
		<div class="top">
			<div class="left"><?php
			foreach ($list as $value) {
				echo '<a href="' , __ROOT__ , '/Uploads/' . $value . '"><img src="' , __ROOT__ , '/Uploads/' . $value . '.thumb.jpg" alt="' , $data['name'] , '"></a>';
			}
			?>
			</div>
			<div class="right">
				<h3><?php echo $data['name'];?></h3>
				<span>￥<?php echo $data['price'];?></span>
				产地：<?php echo cityIdToName($data['home']);?><br>
				规格：<?php echo $data['format'];?><br>
				<div class="commodity_quantity">
					<div class="reduce">-</div>
					<div class="number">1</div>
					<div class="plus">+</div>
				</div>
			</div>
		</div>
		<div class="bottom" data-id=<?php echo $data['id'];?>><span class="icon-heart-empty">&nbsp;&nbsp;加入收藏夹</span><button>加入购物车</button></div>
		<div class="goods_details">
			<?php echo $data['content'];?>
		</div>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</body>
</html>