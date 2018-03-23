<!DOCTYPE HTML>
<html>
<head>
	<title>地址</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/manage_address.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>管理收货地址
			<div onclick="window.history.back()"><i class="icon-angle-left"></i></div>
			<div class="nav" id="nav">
				<ul>
					<li><a href="<?php echo U('Index/index');?>"><i class="icon-home"></i>首页</a></li>
					<li><a href="<?php echo U('Category/index');?>"><i class="icon-reorder"></i>分类</a></li>
					<li><a href="<?php echo U('Car/index');?>"><i class="icon-shopping-cart"></i>购物车</a></li>
					<li><a href="<?php echo U('User/account');?>"><i class="icon-user"></i>我的账户</a></li>
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
				$parArr = getParentCityId($value['city']);//获取当前城市ID的，所有父ID
				$parArr[] = $value['city'];//把当前城市ID也加入到父ID数组
				$ctiyName = '';
				foreach ($parArr as $one) {
					$ctiyName .= cityIdToName($one);
				}
				echo '<ul><label>';
				echo '<li>' . $value['consignee'] . '<span>'. $value['mobile'] .'</span><br>'. $ctiyName . $value['address'] .'</li>';
				echo '<li><input type="radio" ';
				if($value['is_default'] == 1)echo ' checked';
				echo ' name="address">默认地址<div data-url="' , U('del',array('id' => $value['id'])) , '"><i class="icon-trash"></i>删除</div><div><a href="'. U('edit',array('id' => $value['id'])) .'"><i class="icon-edit"></i>编辑</a></div></li></label>';
				echo '</ul>';
			}
			?>
<!-- 			<ul><label>
				<li>刘宁<span>15556668884</span><br>浙江杭州滨江区</li>
				<li><label><input type="radio" checked name="address">默认地址</label><div><i class="icon-trash"></i>删除</div><div><i class="icon-edit"></i>编辑</div></li></label>
			</ul>
			<ul><label>
				<li>李星<span>15556668884</span><br>浙江杭州滨江区xx</li>
				<li><input type="radio" name="address">默认地址<div><i class="icon-trash"></i>删除</div><div><i class="icon-edit"></i>编辑</div></li></label>
			</ul> -->
		</form>
	</div>
	<div class="foot">
		<button><a href="<?php echo U('add');?>">管理新地址</a></button>
	</div>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
(
	function(){
		var leng=document.querySelectorAll('form ul');
		for (var i = 0; i < leng.length; i++) {//绑定删除
			setEvent(document.querySelectorAll('form .icon-trash')[i],'click',function () {
				var child = this.parentNode.parentNode.parentNode.parentNode;
				child.parentNode.removeChild(child);
			})	
		}
	}
)();

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
