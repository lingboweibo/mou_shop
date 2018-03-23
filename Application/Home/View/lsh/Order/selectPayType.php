<!DOCTYPE HTML>
<html>
<head>
	<title>货到付款方式</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/payment_method.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>货到付款方式
			<div onclick="window.history.back()"><i class="icon-angle-left"></i></div>
			<div class="nav" id="nav">
				<ul>
					<li><a href="###"><i class="icon-home"></i>首页</a></li>
					<li><a href="###"><i class="icon-reorder"></i>分类</a></li>
					<li><a href="###"><i class="icon-shopping-cart"></i>购物车</a></li>
					<li><a href="###"><i class="icon-user"></i>我的账户</a></li>
				<div class="triangle"></div>
				</ul>
			</div>
			<div id="trigger_nav"><i class="icon-th"></i></div>
		</h2>
	</div>
	<div id="mongolia_layer"></div>
	<div class="main">
		<form action="<?php echo U(ACTION_NAME);?>" method="POST">
			<ul>
			<?php
				$payType = C('PAY_NAME');  //读取公共配置文件
				foreach ($payType as $key => $value) {
					echo '<li>';
					echo '	<label>&nbsp;<input type="radio" name="select_pay" ';  //一定要有name和value才能提交数据到别的地方
					if($value == session('order_pay_name')){
						echo ' checked ';
					}
					echo 'value="',$value,'" id="pay_',$key,'"></label>';
					echo '	<label for="pay_',$key,'">',$value,'</label>';
					echo '</li>';
				}
			?>
			</ul>
			<input type="submit" value="确认">
		</form>
		<div class="explain">
			<h3>说明</h3>
			<ol>
				<li>暂不接受使用“时尚蔬食”绿色蔬菜礼券抵用券货款;</li>
				<li>由于可能存在称重商品、商品缺货等原因，实际订单金额将以装箱单为准，货到付款时多退少补。如需帮助请拨打客服热线400-811-1797;</li>
				<li>网上商城不享受合作卡优惠。</li>
			</ol>
		</div>
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