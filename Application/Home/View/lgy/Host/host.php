<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>我的账户</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.banner{width:100%;background-color:#e2542c;background-image: url(images/avatar.png);background-repeat:no-repeat;background-position:50% 40%;background-size: auto 57.89473684210526%;margin-top:40px}
.banner .words{margin-left:47%;margin-top:50px;padding-bottom:5px;font-size: 14px;font-weight:bold;color: #fff}
.banner .imgSave{width: 63.88888888888889%;}
.banner .imgSave img{ margin-left:84.10869565217391%;width:14%;padding-top:20px }
.about{width: 100%;zoom:1;overflow: hidden;background-color: #fff;}
.about div{float: left;width:24%;padding-left: 9.027777777777778%}
.about div:nth-child(1),.about div:nth-child(2){border-right: 1px solid #bf3034;padding-bottom:8px}
.about div p{padding-top: 5px;}
.about div p span{margin-left:12px;font-size: 16px}
.about .myHost{background-image: url(images/myHost.png);background-repeat: no-repeat; background-position:67% 10%; background-size: auto 25.89473684210526%; }
.detailsInfo{margin-top:14px;border-top:1px solid #dfdfdf;}
.detailsInfo ul li{zoom:1;overflow:hidden;border-bottom: 1px solid #ccc;padding:12px 0; background-color:#fff}
.detailsInfo ul li .left{float: left;}
.detailsInfo ul li .left span{margin-right: 20px;margin-left:10px;font-size: 16px}
.detailsInfo ul li .right{float: right;font-size: 14px}
.detailsInfo ul li .right span{margin-right: 16px;font-size: 16px}
footer .footerTop ul li:last-child div{color:#8b0d01 }
</style>
</head>
<body>
<div class="wrap">
	<div>
		<form action="">
			<div class="middle">
				<p class="topic">
				    <span class="icon-angle-left"></span>
				    <span id="textInfo">我的账户</span>
			    </p>
			</div>
			<div class="banner"><div class="imgSave"><img src="images/host1.png"></div><div class="words">网林</div></div>
			<div class="about">
				<div><p><span>0</span></p><p>我的积分</p></div>
				<div><p><span class="icon-file-alt"></span></p><p>我的订单</p></div>
				<div class="myHost"><p><span class="icon-envelope-alt"></span></p><p>我的消息</p></div>
			</div>
			<div class="detailsInfo">
				<ul>
					<li>
						<a><div class="left"><span class="icon-cog"></span>完善会员信息</div>
						<div class="right"><span class="icon-angle-right"></span></div></a>
					</li>
					<li>
						<a><div class="left"><span class="icon-key"></span>修改密码</div>
						<div class="right"><span class="icon-angle-right"></span></div></a>
					</li>
					<li>
						<a><div class="left"><span class="icon-map-marker"></span>我的收货地址</div>
						<div class="right"><span class="icon-angle-right"></span></div></a>
					</li>
					<li>
						<a><div class="left"><span class="icon-star-empty"></span>我收藏的商品</div>
						<div class="right"><span class="icon-angle-right"></span></div></a>
					</li>
					<li>
						<a><div class="left"><span class="icon-edit"></span>常购清单</div>
						<div class="right"><span class="icon-angle-right"></span></div></a>
					</li>
				</ul>
			</div>
		</form>
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
					<a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-110px 675px;"></div><div>购物车</div></a>
				</li>
				<li>
					<a href="#"><div class="my_host" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-44px 695px;"></div><div>我的账户</div></a>
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
// (
// 	function(){
// 		var link;
// 		var src = [
// 					'member.html',
// 					'password.html',
// 					'newGetGoods.html',
// 					'hide.html',
// 					'buyList.html',
// 			      ];
// 		for(var i=0;i<src.length;i++){
// 			var link = document.getElementsByTagName('.detailsInfo li:eq('+ (i+1)+') a');
// 			link.href = src[i];
// 		}
// 	}
// )();
$('.detailsInfo li:eq(0)').click(
	function(){
		window.location.assign('member.html');
	}
)
$('.detailsInfo li:eq(1)').click(
	function(){
		window.location.assign('password.html');
	}
)
$('.detailsInfo li:eq(2)').click(
	function(){
		window.location.assign('newGetGoods.html');
	}
)
$('.detailsInfo li:eq(3)').click(
	function(){
		window.location.assign('hide.html');
	}
)
$('.detailsInfo li:eq(4)').click(
	function(){
		window.location.assign('buyList.html');
	}
)

</script>