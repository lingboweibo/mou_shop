<!DOCTYPE HTML>
<html>
<head>
	<title>地址</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
    <link rel="stylesheet" href="<?php echo $staticPath;?>/css/manage_address.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>选择收货地址
			<div onclick="window.history.back()"><i class="icon-angle-left"></i></div>
			<div class="nav" id="nav">
				<ul>
					<li><a href="javascript:void(0)"><i class="icon-home"></i>首页</a></li>
					<li><a href="javascript:void(0)"><i class="icon-reorder"></i>分类</a></li>
					<li><a href="javascript:void(0)"><i class="icon-shopping-cart"></i>购物车</a></li>
					<li><a href="javascript:void(0)"><i class="icon-user"></i>我的账户</a></li>
				<div class="triangle"></div>
				</ul>
			</div>
			<div id="trigger_nav"><i class="icon-th"></i></div>
		</h2>
	</div>
	<div id="mongolia_layer"></div>
	<div class="main">
		<form name="">
			<?php
			foreach ($data as $value) {
				echo '<ul>';
				echo '	<a href="' , U(ACTION_NAME,array('id' => $value['id'])) , '"><li>';
				echo $value['consignee'] , '<span><i class="icon-edit"></i></span><span>' , $value['mobile'] , '</span><br>';
				if($value['is_default'] == 1){
					echo '<label style="color:#f90;">[默认地址]&nbsp;</label>';
				}
				echo get_all_city_name($value['city']) , $value['address'];
				echo '</li></a>';
				echo '</ul>';
			}
			?>
			<!-- <ul>
				<li>刘宁<span><i class="icon-edit"></i></span><span>15556668884</span><br>浙江杭州滨江区</li>
			</ul>
			<ul>
				<li>李星<span><i class="icon-edit"></i></span><span>15556668884</span><br><label style="color:#f90;">[默认地址]&nbsp;</label>浙江杭州滨江区xx</li>
			</ul> -->
		</form>
	</div>
	<div class="foot">
		<button><a href="">添加新地址</a></button>
	</div>
	<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js"></script>
	<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$('#trigger_nav').toggle(
	function () {
		$('#mongolia_layer').css({'width':screen.width,'height':screen.height});
		$('#mongolia_layer').show();
		$('#nav').show();		
	},
	function () {
		$('#mongolia_layer').hide();
		$('#nav').hide();
	}
)
$('#mongolia_layer').click(
	function () {
		$('#mongolia_layer').hide();
		$('#nav').hide();
	}
)
</script>
</body>
</html>
