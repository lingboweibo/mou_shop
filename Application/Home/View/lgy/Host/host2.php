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
.detailsInfo{margin-top:54px;}
.detailsInfo ul li{zoom:1;overflow:hidden;border-bottom:1px solid #ccc;padding:15px 0; background-color:#fff}
.detailsInfo ul li .left{float: left;width: 90.97222222222222%}
.detailsInfo ul li .left span{width:15.27777777777778%;font-size: 16px;margin:20px 10px;}
.detailsInfo ul li .left .info{text-align:left;font-size: 12px;color: #2e2e2e}
.detailsInfo ul li .right{float: right;font-size: 14px}
.detailsInfo ul li .right span{margin-right: 16px;font-size: 16px}
.safeButton{width:100%;text-align:center;margin-top: 20px}
.safeButton button{width:64.72222222222222%;background-color:#f7941c;color: #fff; font-weight: bold; height:30px; line-height:30px;border:none; border-radius:4px;}
.tel{width:100%;text-align:center;color:#666;margin-top:10px}
/*footer .footerTop ul li:last-child div{color:#8b0d01 }*/
</style>
</head>
<body>
<div class="wrap">
	<form action="" name="">
		<div class="middle">
			<p class="topic">
			    <span class="icon-angle-left"></span>
			    <span id="textInfo">我的账户</span>
		    </p>
		</div>
		<div class="detailsInfo">
			<ul>
				<li>
					<div class="left"><span class="icon-cog"></span><span class="info">完善会员信息</span></div>
					<div class="right"><span class="icon-angle-right"></span></div>
				</li>
				<li>
					<div class="left"><span class="icon-key"></span><span class="info">修改密码</span></div>
					<div class="right"><span class="icon-angle-right"></span></div>
				</li>
				<li>
					<div class="left"><span class="icon-map-marker"></span><span class="info">我的收货地址</span></div>
					<div class="right"><span class="icon-angle-right"></span></div>
				</li>
				<li>
					<div class="left"><span class="icon-star-empty"></span><span class="info">我收藏的商品</span></div>
					<div class="right"><span class="icon-angle-right"></span></div>
				</li>
				<li>
					<div class="left"><span class="icon-edit"></span><span class="info">常购清单</span></div>
					<div class="right"><span class="icon-angle-right"></span></div>
				</li>
		        <li>
					<div class="left"><span class="icon-question-sign"></span><span class="info">帮助中心</span></div>
					<div class="right"><span class="icon-angle-right"></span></div>
				</li>
			</ul>
		</div>
		<div class="safeButton"><button>安全退出</button></div>
		<div class="tel">客服热线：400-811-1797</div>
	</form>
	<footer>
		<div class="footerTop">
			<ul>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 737px;"></div><div>首页</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 716px;"></div><div>分类</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-110px 675px;"></div><div>购物车</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-49px 695px;"></div><div>我的账户</div></a>
				</li>
			</ul>
		</div>
	</footer>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script type="text/javascript">
$('.icon-angle-left').click(
	function(){
		window.location.assign('index.html');
	}
)
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
$('.detailsInfo li:eq(5)').click(
	function(){
		window.location.assign('help.html');
	}
)	
</script>