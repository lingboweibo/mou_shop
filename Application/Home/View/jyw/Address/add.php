<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>新增收货地址</title>
<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#main{width: 100%;float: left;background:#fff;}
#main form>div{height: 48px;width: 100%;border-bottom: 2px solid #dfdfdf;float: left; }
#main div>span{width:23.19444444444444%;line-height: 48px;font-size:12px;text-align: right;display: block;float: left;}
form input{width:68%;height: 30px;padding-left: 5px;margin-top:9px;margin-right: 15px;  border: 0;float: right; }
#main form>div:nth-of-type(3){height: 117px;}
#main form>div:nth-of-type(4){height:110px;}
form select{width: 69.5%;height: 30px;padding-left: 5px; margin-right:20px;margin-top:7px;display: block;float: right;border:1px solid #e0e0e0;}
form textarea{width:68%;border:0;margin-top:15px;margin-left: 5px;padding-left: 5px;resize:none;font-size:15px;line-height:21px;}
hr{height: 300px;width: 100%;float: left;}
#main form>div:nth-of-type(5){height: 50px; margin-top:8px; line-height: 20px;}
#main form input[type="checkbox"]{display: none;}
.icon-ok{color: #fff;}
#save{width:69.5%;height:40px;background: #e1e1e1; color: #fff;text-align: center;line-height: 40px;border:0;margin:20px auto;display: block;}
form>span{display: block;float: left;width: 100%;background:#f6f6f6;font-size: 15px;}
</style>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">新增收货地址
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="main">
		<form action="" name="createAdd">
			<div><span>收货人</span><input type="text" placeholder="刘宁"></div>
			<div><span>手机号码</span><input type="text" placeholder="129892"></div>
			<div>
				<span>所在地区</span>
				<select name="provice" id="">
					<option value="" >ddd</option>
				</select>
				<select name="city" id="">
					<option value=""></option>
				</select>
				<select name="area" id="">
					<option value=""></option>
				</select>
			</div>
			<div><span>街道地址</span><textarea name="" id="" cols="30" rows="4" plaxeholder="火星"></textarea></div>
			<p style="height: 22px;width: 100%;float: left;background:#f6f6f6;"></p>
			<div>
				<label for="ckb"><span class="yes"><i class="icon-ok"></span></i></label>
				<input type="checkbox" name="ckb">
				设为默认地址
			</div>
			<p style="height: 30px;width: 100%;float: left;background:#f6f6f6;"></p>
			<span><button id="save">保存</button></span>
		</form>

	</div>
	<?php include $includePath . '/footer.php';?>
</div>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</html>
