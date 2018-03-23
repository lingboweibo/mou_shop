<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>首页</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#header{height:30px;width:97% ; padding:8px 1.5%;}
#header>img:first-of-type{width:22%;margin:0;float: left;}
#header>img:last-of-type{margin:7px 10px;float: right;}
#header>span{width: 60%; border: 1px solid #c4c4c4;border-radius:15px;margin-left: 3%; display: inline-block;float: left;}
#header>span>img{width: 20px;margin-left: 13px;margin-top: 5px;float: left;}
#header input[type="text"]{width: 70%;height: 30px;border: 0;outline: none;padding-left:5px;float: left;}

#main{clear: both;width: 100%;}
#main>p{width: 100%;height: 45px;text-align: center;line-height: 45px;font-size: 12px; float: left;}
#season{width: 100%; overflow: scroll;background: #fff;float: left;padding-bottom:10px;padding-top:10px;}
#season>div{width: 33.3%;float: left;padding-bottom:10px;}
#season>div>img{width: 100%;}

#season #seasonWrap{width: 100%;overflow: auto;position: relative;}
#season #seasonWrap>div{width: 200%;position: absolute;left: 0px;}
#season #seasonWrap>div>div>div>img{width: 20px;margin-right:15px;float: right;} 
#season #seasonWrap>div>div{width: 16.6%;float: left;}
#season #seasonWrap>div>div>img{width: 100%;}
.name{margin-left: 6px; font-size: 14px;}
.money{margin-left: 15px; font-size: 14px;color: #850500;font-weight: bold;}

#season>span>img{width: 100%;margin-bottom: 8px;}
#classify{width: 100%; clear: both;float: left;border-top: 1px solid #e0e0e0;border-bottom:1px solid #e0e0e0;}
#two{width: 100%;float: left; }
#two>div{width: 49.8%;float: left;border-top: 1px solid #e0e0e0;border-right:1px solid #e0e0e0;border-collapse: collapse; }
#two>div>img{width: 100%;float: left;}
#four{width: 100%;}
#four>div{width: 24.7%;float: left;border-top: 1px solid #e0e0e0;border-right: 1px solid #e0e0e0;}
#two>div:nth-of-type(2),#two>div:nth-of-type(4),#four>div:nth-of-type(4),#four>div:nth-of-type(8){border-right: 0;}
#four>div>img{width: 100%;float: left;}
#doubleG{width: 100%;float: left;background: #fff;}
#doubleG>ul{width: 100%;height: 32px;padding-top: 6px;}
#doubleG>ul>li{width: 33%;height: 24px;font-size: 13px;line-height: 24px;text-align: center;float: left;list-style: none;}
#doubleG>ul>li:nth-of-type(2){border-left: 1px solid #e0e0e0;border-right:1px solid #e0e0e0;}
#doubleG>ul>li:nth-of-type(1){color:#ec9432;}
#doubleG>div:nth-of-type(1){width: 100%;padding: 0;}
#doubleG>div{width: 48.6%;padding:6px .7%;float: left;}
#doubleG>div>img{width: 100%;}
#doubleG>div>div>img{width: 20px;margin-right:15px;float: right;}
.norms{font-size: 12px;color: #a8a8a8;}
#moveWrap{width: 100%; overflow: hidden;clear:both;position: relative;}
#slide{width:600%;position: absolute;left: 0px;top:0px; }
#slide li{width: 16.66666666666667%; float: left; list-style: none;}
#slide img{width: 100%;}
</style>
<body>
<p style="height:47px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">
		<img src="<?php echo $staticPath;?>/images/logo.jpg" alt="" id="back">
		<span>
			<img src="<?php echo $staticPath;?>/images/find.jpg" alt="">
			<input type="text" placeholder="请输入关键字" name="find">
		</span>
		<img src="<?php echo $staticPath;?>/images/help7.jpg" alt="">
	</div>
	<div id="moveWrap">
		<ul id="slide">
			<li><div><img src="<?php echo $staticPath;?>/images/wrap.jpg" alt=""></div></li>
			<li><div><img src="<?php echo $staticPath;?>/images/1.jpg" alt=""></div></li>
			<li><div><img src="<?php echo $staticPath;?>/images/2.jpg" alt=""></div></li>
			<li><div><img src="<?php echo $staticPath;?>/images/wrap.jpg" alt=""></div></li>
			<li><div><img src="<?php echo $staticPath;?>/images/1.jpg" alt=""></div></li>
			<li><div><img src="<?php echo $staticPath;?>/images/2.jpg" alt=""></div></li>
		</ul>
	</div>
	<div id="main">
		<p>------最当季------</p>
		<div id="season">
			<div id="seasonWrap">
				<div>
				<div>
					<img src="<?php echo $staticPath;?>/images/season1.jpg" alt="">
					<div class="name">火山</div>
					<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
				</div>
				<div>
					<img src="<?php echo $staticPath;?>/images/season1.jpg" alt="">
					<div class="name">火山</div>
					<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
				</div>
				<div>
					<img src="<?php echo $staticPath;?>/images/season1.jpg" alt="">
					<div class="name">火山</div>
					<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
				</div><div>
					<img src="<?php echo $staticPath;?>/images/season1.jpg" alt="">
					<div class="name">火山</div>
					<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
				</div>
				<div>
					<img src="<?php echo $staticPath;?>/images/season1.jpg" alt="">
					<div class="name">火山</div>
					<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
				</div>
				<div>
					<img src="<?php echo $staticPath;?>/images/season1.jpg" alt="">
					<div class="name">火山</div>
					<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
				</div>
				</div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season2.jpg" alt="">
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season3.jpg" alt="">
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season4.jpg" alt="">
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season5.jpg" alt="">
				<div class="name">火山</div>
				<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season6.jpg" alt="">
				<div class="name">火山</div>
				<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season7.jpg" alt="">
				<div class="name">火山</div>
				<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
			</div>
			<span><img src="<?php echo $staticPath;?>/images/season8.jpg" alt=""></span>
			<div>
				<img src="<?php echo $staticPath;?>/images/season9.jpg" alt="">
				<div class="name">火山</div>
				<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season10.jpg" alt="">
				<div class="name">火山</div>
				<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/season11.jpg" alt="">
				<div class="name">火山</div>
				<div><span class="money">￥20.00</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt=""></div>
			</div>
		</div>
		<p>-------分类选-------</p>
		<div id="classify">
			<div id="two">
				<div><img src="<?php echo $staticPath;?>/images/classify1.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify2.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify3.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify4.jpg" alt=""></div>
			</div>
			<div id="four">
				<div><img src="<?php echo $staticPath;?>/images/classify5.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify6.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify7.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify8.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify9.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify10.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify11.jpg" alt=""></div>
				<div><img src="<?php echo $staticPath;?>/images/classify12.jpg" alt=""></div>
			</div>
		</div>
		<p>------觅好货------</p>
		<div id="doubleG">
			<ul>
				<li>热销单品</li>
				<li>新品到货</li>
				<li>促销品专区</li>
			</ul>
			<div>
				<img src="<?php echo $staticPath;?>/images/double.jpg" alt="">
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/double1.jpg" alt="">
				<div class="name">菲律宾香蕉1根(CS)</div>
				<div>
					<span class="money">￥20.00</span>
					<span class="norms">1根</span>
					<img src="<?php echo $staticPath;?>/images/add2.jpg" alt="">
				</div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/double2.jpg" alt="">
				<div class="name">泰国龙眼500g(CS)</div>
				<div>
					<span class="money">￥20.00</span>
					<span class="norms">500g</span>
					<img src="<?php echo $staticPath;?>/images/add2.jpg" alt="">
				</div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/double3.jpg" alt="">
				<div class="name">泰国芒果</div>
				<div>
					<span class="money">￥20.00</span>
					<span class="norms">1个</span>
					<img src="<?php echo $staticPath;?>/images/add2.jpg" alt="">
				</div>
			</div>
			<div>
				<img src="<?php echo $staticPath;?>/images/double4.jpg" alt="">
				<div class="name">越南火龙果</div>
				<div>
					<span class="money">￥20.00</span>
					<span class="norms">2个</span>
					<img src="<?php echo $staticPath;?>/images/add2.jpg" alt="">
				</div>
			</div>
		</div>
		<p>-----没有跟多商品----</p>
	</div>

	<?php include $includePath . '/footer.php';?>
</div>	
<p style="height:100px;width:100%;float:left;"></p>
</body>
</html>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$("#moveWrap").css("height",$("#slide").height()+"px");
var ulWidth = $("#slide").width();
var moveTo = 0;
function marquee(){
	if(moveTo<ulWidth/2){
		moveTo += ulWidth/6;
		$("#slide").animate({"left":-moveTo+'px'},500)
	}else{
		moveTo=0;
		$("#slide").css("left","0px");
	}
}
var interval = setInterval(marquee,2000); 
$("#moveWrap").mouseenter(function(){
	clearInterval(interval);
});
$("#moveWrap").mouseleave(function(){
	interval = setInterval(marquee,2000);
});
$("#seasonWrap").css("height",$("#seasonWrap>div").height());
</script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
