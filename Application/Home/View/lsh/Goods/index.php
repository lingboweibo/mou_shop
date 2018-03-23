<!DOCTYPE HTML>
<html>
<head>
	<title>商品列表</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/goods.css?v=<?php echo C('STATIC_VERSION');?>">
	<style>
	.selected{color:#f7941c}
	</style>
</head>
<body>
	<div class="header">
		<h2><input type="text" placeholder="请输入关键字"><div onclick="window.history.back()"><i class="icon-angle-left"></i></div><div>搜索</div></h2>
	</div>
	<div class="main">
		<ul class="menu_list">
			<li><a order_by="is_new" data-index="0">新品&nbsp;</i></a></li>
			<li><a order_by="" data-index="1">特惠&nbsp;</i></a></li>
			<li><a order_by="" data-index="2">销量&nbsp;</i></a></li>
			<li><a order_by="" data-index="3">价格&nbsp;<i class="icon-angle-up"></i></a></li>
		</ul>
		<ul class="goods_list goodsListAjax" data-id="<?php echo $id;?>" data-url="<?php echo U('Goods/detail',array('id' => 'GOODS_ID_GOODS_ID'));?>" id="goodsList">

<!-- 这里面的内容由ajax获取 接口：4.1.4	获取商品列表接口 -->
<!-- 		<li>
				<a>
				<img src="<?php echo $staticPath;?>/imgs/goods_pic_04.jpg" alt="">
				<h4>越南火龙果</h4>
				<span>￥ 19.90</span>
				<span>2个</span>
				<span class="icon-shopping-cart"></span>
				</a>
			</li> 
-->
		</ul>
		<h5 id="tips"></h5>
		<div class="quick"><i class="icon-arrow-up"></i></div>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
var data_url=$('.goods_list').attr('data-url');
</script>
<script src="<?php echo $staticPath;?>/js/goods.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
// //文档加载完毕绑定a点击事件
// setEvent(window,'load',function () {
// 	var leng=document.querySelectorAll('.main .menu_list li a');
// 	for (var i = 0; i < leng.length; i++) {
// 		setEvent(leng[i],'click',
// 			function () {
// 				sessionStorage.setItem('order_by',this.parentNode.getAttribute('order_by'));
// 			}
// 		)
// 	}
// })
// sessionStorage.getItem('order_by')

// 排序方式,为空是普通方式
// is_new 表示新品排在前面（首页新品到货）
// prom_2 表示只获取限时促销的商品（首页促销品专区）
// prom_3 表示特惠的排在前面（列表页的特惠）
// sales_sum 表示销量高的排在前面（首页热销单品）
// price_0 表示价格便宜的排在前面（列表页的价格链接）
// price_1 表示价格高的排在前面（列表页的价格链接）
</script>
</body>
</html>