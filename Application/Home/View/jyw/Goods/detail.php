<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>商品详情</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#main{width: 100%;background: #fff;border-top:4px solid #f6f6f6;border-bottom:7px solid #f6f6f6;float: left;}
#main>div{float: left;}
.left{width: 45%;float: left;}
.left>img{width: 100%;}
.right{width: 53.7%;margin-left:1.3%;float: right; }
.name{font-size: 13px;line-height: 38px;font-weight: bold;}
.money{font-size: 13px;line-height: 40px;color:#fea638;font-weight: bold;}
.proArea,.norms{font-size: 10px;color:#8c8c8c;line-height: 20px;}
.num>span{width: 22px;height: 22px;border: 1px solid #c4c4c4;margin: 5px 3px 0 0;text-align: center; color: #c4c4c4;display: block;float: left;font-weight: bold;border-radius: 3px;}
.num>span:nth-of-type(2){width: 29%;}
.bottom{width: 100%;height: 55px; clear: both;float: left;}
.bottom>span:first-of-type{width: 45%;height:40px;margin-top:10px;display: inline-block;font-size: 12px;color:#a4a4a4;line-height: 40px;font-weight: bold;}
.bottom img{width: 24px;margin-right:5px;padding-top: 7px;margin-left: 23%; float: left;}
.bottom>span:last-of-type{width:48%;height: 30px;background: #aec200;color: #fff;text-align: center;display: inline-block;margin:5px;border-radius: 3px;line-height: 30px;font-size: 12px;}
#detail{padding-left: 4%;padding-right: 4%; background: #fff;padding-bottom:30px; }
h1{font-size:14px; color:#dd8c31;line-height: 30px;}
h2{font-size: 16px;color:#fa9101;line-height: 32px;}
p{font-size: 13px;line-height:20px; }
</style>
<body>
<p style="height:45px;width:100%;float:left;"></p> 
<div id="container">
	<div id="header">商品详情
		<img src="<?php echo $staticPath;?>/images/help12.jpg" id="back">
		<img src="<?php echo $staticPath;?>/images/help7.jpg">
	</div>

	<div id="main">
		<div>
			<div class="left"><img src="<?php echo $staticPath;?>/images/chicken.jpg" alt=""></div>
			<div class="right">
				<div class="name">美式烤鸡(半生熟)</div>
				<div class="money">￥38.00</div>
				<div class="proArea">产地:上海</div>
				<div class="norms">规格:只</div>
				<div class="num">
		 			<span class="minus">-</span>
		 			<span class="count">5</span>
		 			<span class="add">+</span>
		 		</div>
			</div>
		</div>
		<div class="bottom">
			<span><img src="<?php echo $staticPath;?>/images/like.jpg" alt="">加入收藏夹</span>
			<span>加入购物车</span>
		</div>
	</div>
	<div id="detail">
		<h1>商品描述</h1>
		<h2>选料优质肉鸡</h2>
		<p>城市超市的风味电烤鸡选料于饲养天数为60日的优质肉鸡，洗净后每只重约1斤半至2斤，适中的体型更易于腌制入味，肉质柔嫩，烘烤之后依然能保持鲜嫩口感。
</p>
		<h2>独家秘制腌料</h2>
		<p>肉鸡必须提前用我们秘制的酱料腌制一晚，除传统的辛香料外，更添加了从美国进口的保尔厨师系列调味料，为鸡肉增加独特而地道的风味。</p>
		<h2>慢火烘烤</h2>
		<p>肉鸡在腌制一夜后，送入85摄氏度左右的烤箱内烤制1小时左右。长时间的慢火烘烤能更多得逼出皮下油脂，皮酥脆带有焦香，入口不腻。</p>
		<h2>亲民价格十年不变</h2>
		<p>我们的风味电烤鸡依然保持着十年前38元每只的价格不变，如此十年不涨价的商品在上海滩已是凤毛麟角。尽管成本飞涨，电烤鸡只剩微利，但为了回馈消费者的信赖与喜爱，我们愿意不计利润，让城市超市的电烤鸡成为每个上海人心中最好吃又价格亲民的“明星”烤鸡。</p>
	</div>
	<?php include $includePath . '/footer.php';?>
</div>
<p style="height:80px;width:100%;float:left;"></p>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</html>
