<!DOCTYPE HTML>
<html>
<head>
	<title>收藏夹</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/favorites.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>收藏夹<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2>
	</div>
	<div class="main">
	<form action="">
		<ul>
			<?php
			foreach ($data as $value) {
				//前端可以通过data-id属性获取收藏id，用在接口程序里
				//前端可以通过data-goods_id属性获取商品id，用在接口程序里
				echo '	<li data-goods_id="' , $value['goods_id'] , '" data-id="' , $value['id'] , '">';
				echo '		<div class="left"><img src="' , __ROOT__  . '/Uploads/' , $value['filename'] , '" alt="' , $value['name'] , '"></div>';
				echo '		<div class="right"><h3>' , $value['name'] , '</h3>规格：' , $value['format'] , '<br><span>￥' , $value['price'] , '</span><i class="icon-trash"></i><i class="icon-shopping-cart"></i></div>';
				echo '	</li>';
			}
			?>
		</ul>
	</form>
		<h4>—没有更多商品—</h4>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
(//绑定删除
	function(){
		var leng=document.querySelectorAll('form ul li');
		for (var i = 0; i < leng.length; i++) {
			setEvent(document.querySelectorAll('form .icon-trash')[i],'click',function () {
				var child = this.parentNode.parentNode;
				child.parentNode.removeChild(child);
			})	
		}
	}
)();
</script>
</body>
</html>