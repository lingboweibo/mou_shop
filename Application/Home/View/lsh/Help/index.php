<!DOCTYPE HTML>
<html>
<head>
	<title>帮助中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>帮助中心<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<?php
			echo '<ul class="user_list">';
			foreach ($data as $key => $value) {
				if($key == 0){
					echo '<li><a>',$value['title'],'<div class="angle-right"><i class="icon-angle-right"></i></div></a></li>';
				}
				
				elseif($key == 3){
					echo '<li><a>',$value['title'],'<div><i class="icon-angle-right"></i></div></a></li> </ul><ul class="user_list">';
				}
				elseif($key == 5){
					echo '<li><a>',$value['title'],'<div><i class="icon-angle-right"></i></div></a></li> </ul><ul class="user_list">';
				}
				else{
					echo '<li><a>',$value['title'],'<div><i class="icon-angle-right"></i></div></a></li>';
				}
			}
			echo '</ul>';
		?>
		<!-- <ul class="user_list">
			<li><a>新手上路<div class="angle-right"><i class="icon-angle-right"></i></div></a></li>
			<li><a>付款方式<div><i class="icon-angle-right"></i></div></a></li>
			<li><a>配送说明<div><i class="icon-angle-right"></i></div></a></li>
			<li><a>售后服务<div><i class="icon-angle-right"></i></div></a></li>
		</ul>
		<ul class="user_list">
			<li><a>发票制度说明<div><i class="icon-angle-right"></i></div></a></li>
			<li><a>常见问题<div><i class="icon-angle-right"></i></div></a></li>
		</ul>
		<ul class="user_list">
			<li><a>联系客服<div><i class="icon-angle-right"></i></div></a></li>
		</ul> -->
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</body>
</html>