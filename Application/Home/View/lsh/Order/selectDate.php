<!DOCTYPE HTML>
<html>
<head>
	<title>选择配送时间</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/delivery_time.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>选择配送时间
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
				<?php //添加默认选中的功能
					$weekarray=array("日","一","二","三","四","五","六");
					for ($i=2; $i <6 ; $i++) { 
						echo '<li><div class="left">',date('m-d',strtotime('+' . $i . 'days')),'&nbsp;';
						echo "星期".$weekarray[date("w",strtotime('+' . $i . 'days'))];
						echo '</div><div class="right"><label><input type="radio" name="select_date"';
						if(date('m-d',strtotime('+' . $i . 'days')) == session('order_deliver_time')){
							echo ' checked'; //注意checked单词的两边留空格
						}
						echo ' value="',date('m-d',strtotime('+' . $i . 'days'));
						echo '"></label></div></li>';
					}
				?>
			</ul>
			<input type="submit" value="确定">
		</form>
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