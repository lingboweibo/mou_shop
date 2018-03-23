<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>地址收货管理</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>

<style>
#footer{background: #f7941c;font-size:15px;color:#fff;text-align: center;line-height:42px; }
#main{width: 100%;background: #fff;float: left;}
.wrap>div{height: 57px;width: 100%;padding-top:10px;border-bottom:2px solid #e0e0e0;font-size: 14px;}
.wrap>div:nth-of-type(2){height: 40px;border-bottom: 10px solid #f6f6f6;}
#main>div .infor{width: 63.2%;margin-left:5.8%;  line-height:25px;float: left;}
#main>div .phone{height: 57px;margin-right: 16px; float: right;}
.defaultAdd{width: 20px;height: 20px;padding-top: 3px;padding-left: 3px;margin-left:5.8%;  border: 2px solid #898989;border-radius: 100%;display: block;float: left;}
.icon-ok{font-size:15px;color:#f5921a; }
.dizhi{margin-left:10px;line-height:30px;display: block;float: left;}
.edit{float: right;margin-left: 5.6%;font-size: 15px;margin-top: 13px;}
.delete{float: right;margin-left: 5.6%;font-size: 15px;margin-top: 13px;}
.icon-trash{color: #868686;margin-right: 10px;font-size: 25px;}
.icon-pencil{color: #868686;margin-right: 10px;font-size: 25px;}
a{color:#fff;text-decoration: none;}
#setMsg{width:20%; position:fixed;top:300px;left: 40%; background: #313131;color:#fff;padding:5px;border-radius: 4px;font-size: 15px;display: none;text-align:center;}
</style>
<body>
<div id="container">
<p style="height:45px;width:100%;float:left;"></p>
	<div id="header">管理收货地址
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
		<img src="<?php echo $staticPath;?>/images/cart1.jpg" id="showpage">
	</div>
	<div id="main">
		<div class="wrap" data_id="liu">
			<div>
				<div class="infor">
					<div class="name">刘宁</div>
					<div class="address">浙江杭州滨江区火星</div>
				</div>
				<div class="phone">1556667777</div>
			</div>
			<div>
				<span class="defaultAdd" style="border-color:#f5921a">
					<i class="icon-ok"></i>
				</span>
				<span class="dizhi">默认地址</span><!-- 内容转换 -->
				<span class="delete"><i class="icon-trash"></i>删除</span>
				<span class="edit"><i class="icon-pencil"></i>编辑</span>
			</div>
		</div>
		<div class="wrap" data_id="li">
			<div>
				<div class="infor">
					<div class="name">李星</div>
					<div class="address">浙江杭州滨江区</div>
				</div>
				<div class="phone">1556667777</div>
			</div>
			<div>
				<span class="defaultAdd">
				</span>
				<span class="dizhi">设为默认</span><!-- 内容转换 -->
				<span class="delete"><i class="icon-trash"></i>删除</span>
				<span class="edit"><i class="icon-pencil"></i>编辑</span>
			</div>
		</div>
	</div>
	<div id="footer">
		<a href="./createAdd.html">
			添加新地址
		</a>
	</div>
	<div class="pageJump">
		<span></span>
		<ul>
			<li><a href="<?php U('Index/index')?>"><img src="<?php echo $staticPath;?>/images/pageJump1.png" alt="">首页</a></li>
			<li><a href="<?php echo U('Category/index')?>"><img src="<?php echo $staticPath;?>/images/pageJump2.png" alt="">分类</a></li>
			<li><a href="<?php echo U('Car/index')?>"><img src="<?php echo $staticPath;?>/images/pageJump3.png" alt="">购物车</a></li>
			<li><a href="<?php echo U('User/account')?>"><img src="<?php echo $staticPath;?>/images/pageJump4.png" alt="">我的账户</a></li>
		</ul>
	</div>
</div>
<div id="setMsg">设置成功</div>	
</body>
</html>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$(".defaultAdd").click(function(){
	$(".defaultAdd").css({"border-color":"#898989"});
	$(".defaultAdd").html("");
	$(".defaultAdd").next().html("设为默认")
	$(this).css({"border-color":"#f5921a"})
	$(this).html('<i class="icon-ok"></i>');
	$(this).next().html("默认地址");
	$("#setMsg").fadeIn();
	$("#setMsg").delay(1500).fadeOut();
});


</script>
