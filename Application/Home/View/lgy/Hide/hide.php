<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>收藏夹</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.hide1 ul{margin-top:38px;background-color: #fff}
.hide1 ul li{width:100%;zoom: 1;overflow: hidden;border-bottom: 1px solid #ccc }
.hide1 ul li .left{width:27.33333333333333%;padding-top:10px;padding:5px 5px;float: left;}
.hide1 ul li .center{width:45%;padding-top:10px;float: left;}
.hide1 ul li .right{width:16.333333333333333%;font-size:16px;padding-top:80px;padding-bottom: 5px;float: left;border: none;}
.hide1 .cent{color:#868686;padding-top:40px;}
.hide1 .centBottom{color: #731108;font-size: 14px;font-weight: bold;padding-top: 5px}
.hide1 .bottom{margin-top:10px}
.manyGoods{width: 65.27777777777778%; margin-left:35.27777777777778%;color:#666;padding: 10px }
footer .footerTop ul li:last-child div{color:#8b0d01 }
</style>
</head>
<body>
<div class="wrap">
		<form action="" name="">
			<div class="middle">
				<p class="topic">
				    <span class="icon-angle-left"></span>
				    <span id="textInfo">收藏夹</span>
			    </p>
			</div>
			<div class="hide1">
        		<ul>
        			<li>
	                    <div class="left"><img src="images/buy_3.png"></div>
	                    <div class="center">
	                    	<p class="top">佳世坦纳牌含气饮用水</p>
	                        <p class="cent">规格：1.5升</p>
	                        <p class="centBottom">￥ 10.50</p>
	                    </div>
                    	<div class="right">
                    		<span class="buy_cart" style="background-image:url(images/sprite.png);width:19px;height:17px;display: inline-block;background-size:95px;background-position:-21px 629px;"></span><span class="icon-trash"></span>
                    	</div>
                    </li>
                    <li>
                    	<div class="left"><img src="images/buy_2.png"></div>
                  		<div class="center">
	                  		<p class="top">咖喱牛肉</p>
	                        <p class="cent">规格：约240g/份</p>
	                        <p class="centBottom">￥ 18.00</p>
	                    </div>
                    	<div class="right">
                    		<span class="buy_cart" style="background-image:url(images/sprite.png);width:19px;height:17px;display: inline-block;background-size:95px;background-position:-21px 629px;"></span><span class="icon-trash"></span>
                    	</div>
                    </li>
                </ul>
        	</div>
		</form>
	<div class="goodsM"><p class="manyGoods">--没有更多商品--</p></div>
	<footer>
		<div class="footerTop">
			<ul>
				<li>
					<a href="#"><div class="index_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 737px;"></div><div>首页</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 716px;"></div><div>分类</div></a>
				</li>
				<li>
					<a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-110px 675px;"></div><div>购物车</div></a>
				</li>
				<li>
					<a href="#"><div class="my_host" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-49px 695px;"></div><div>我的账户</div></a>
				</li>
			</ul>
		</div>
	</footer>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/pub.js"></script>
<script type="text/javascript">
$('.icon-angle-left').click(
	function(){
		window.location.assign('host.html');
	}
)
var li = document.getElementsByTagName('li')[0];
// $('.buy_cart').click(
// 	function(){
// 		$(this).css('background-position','2px 629px');
// 	}
// )
$('.icon-trash').click(
	function(){
 		li.remove();
	}
)
</script>