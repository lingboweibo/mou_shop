<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>常购清单</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css"> 
<style type="text/css">
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.middle p:nth-child(2){width:38.05555555555556%;background:#f6f6f6;margin: 0 auto;text-align: center;padding-top:60px;}
.middle p:nth-child(3){width:100%;text-align:center;padding-top:20px;padding-bottom:30px}
.middle p:nth-child(4){width:100%;text-align:center;margin-top: 20px}
.middle p:nth-child(4) button{width:84.72222222222222%;background-color:#f7941c;color: #fff; font-weight: bold; height:30px; line-height:30px;border:none; border-radius:4px;}
footer .footerTop ul li:last-child div{color:#8b0d01 }
</style>
</head>
<body>
<div class="wrap">
	<div class="middle">		
			<p class="topic">
				<span class="icon-angle-left"></span>
				<span id="textInfo">常购清单</span>
			</p>
            <p><img src="images/order_empty.png"></p>
            <p>常购清单还是空空的~<br>逛逛商品吧</p>
            <p><button>返回首页</button><p>
	</div>
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
					<a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-110px 673px;"></div><div>购物车</div></a>
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
//点击左边的<返回或后退
$('.icon-angle-left').click(
	function(){
		window.location.assign('host.html');
	}
)
$('button').click(
	function(){
		console.log(1);
		window.location.assign('index.html');
	}
)
</script>