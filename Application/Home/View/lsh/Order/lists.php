<!DOCTYPE HTML>
<html>
<head>
	<title>全部订单</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/order_list.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>全部订单<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2>
	</div>
	<div class="main">
		<div class="order">
			<?php
				foreach ($data as $key => $value) {
					echo '<div>';
					echo '	<h3>',$value['add_time'],'</h3>';
					echo '	<p>订单号：',$value['order_sn'],'</p>';
					echo '	<div class="right" style="">等待配货</div>';
					echo '</div>';
					echo '<div>';
					echo '	<a href="#" style="">';
					echo '		<div style="">';
					echo '			<ul>';
					foreach ($value['goods'] as $k => $v) {
						echo '<li><img src="',__ROOT__,'/Uploads/',$v['filename'],'"></li>';
					}
					echo '			</ul>';
					echo '		</div>';
					echo '		<div class="right" style="font-size: .4rem;"><i class="icon-angle-right"></i></div>';
					echo '	</a>';
					echo '</div>';
				}
			?>
			
			<h4>共<?php echo $count;?>件商品，总额<span style="color:#000;">￥ <?php echo $totalPrice;?></span></h4>
		</div>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
</script>
</body>
</html>