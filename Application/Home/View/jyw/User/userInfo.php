<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>会员信息</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#main{width: 100%; background:#fff;float: left;}
#main>form>div{height: 50px;width: 100%;line-height:50px;font-size: 15px;border-bottom:1px solid #dfdfdf;}
#main>form>div>span:nth-of-type(1){width:23%;text-align: right;display: block;float: left;}
#main form>div:nth-of-type(8){height:110px;}
#main>form input{height: 30px;width:70%; margin-left: 10px;color: #858585;display:block;float: left;margin-top:10px;padding-left: 5px; border: 0;outline: none;}
form textarea{width:68%;border:0;margin-top:15px;margin-left: 5px;padding-left: 5px;resize:none;font-size:15px;line-height:21px;outline: none;}
#main input:last-of-type{width:35%;}
#sex{width:200px;float: left;}
#sex>label{margin-left:12px;margin-right: 10px;display: inline-block; float: left;}
#sex>label>span{width: 18px;height: 18px;margin-top: 12px;  border: 2px solid #8e8e8e;border-radius: 100%;display: block;float: left;}
#sex>label:nth-of-type(1)>span{border: 2px solid #f5921a;}
#sex>span{margin-right: 15px;font-weight:500; float: left;}
#sex>div{width: 20px;float: left;margin-left: 10px;font-size: 15px;}
#sex input[type="radio"]{display: none;}
.icon-ok{margin-top:3px;margin-left: 2px; float: left;color: #f5921a;}
.alter{width: 22.22222222222222%;height:25px;color:#fff;background: #f7941c; text-align: center;display: block;float: right;line-height: 25px;margin-top: 12px;margin-right: 5.5%;border-radius: 3px;}
.save{width: 70%;background: #f6f6f6;padding:32px 15%;display:block;float: left;}
#main input[type="button"]{height: 40px;width:100%;margin:0px;padding:0; background: #f7941c;color: #fff;border-radius:3px;}
</style>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">会员信息
		<img src="<?php echo $staticPath;?>/images/help12.jpg" alt="" id="back">
	</div>
	<div id="main">
	<form action="" name="form1">
		<div>
			<span>*姓名</span>
			<input type="text" name="name" placeholder="刘宁">
		</div>
		<div><span>姓名拼音</span><input type="text" name="nameSpell" placeholder="liuning"></div>
		<div><span>*出生日期</span><input type="text" name="birth" placeholder="1970/01/01"></div>
		<div>
			<span>性别</span>
			<div id="sex">
				<label for="male">
					<span class="choose">
						<i class="icon-ok"></i>
					</span>
				</label>
				<input type="radio" name="sex" id="male">
				<span>男</span>
				<label for="female">
					<span class="choose">
					</span>
				</label>
				<input type="radio" name="sex" id="female">
				<span>女</span>
				
			</div>
		</div>
		<div><span>*证件类型</span><input type="text" name="idType" placeholder="外国护照"></div>
		<div><span>*证件号码</span><input type="text" name="idNum" placeholder="3432"></div>
		<div><span>*国籍</span><input type="text" name="country" placeholder="中国"></div>
		<div><span>*地址</span><textarea name="" id="" cols="30" rows="4" plaxeholder="火星"></textarea></div>
		<div><span>*邮编</span><input type="text" name="postcode" placeholder="455555"></div>
		<div><span>固定电话</span><input type="text" name="fixPhone" placeholder="3533555"></div>
		<div><span>*手机号码</span><input type="text" name="phone" placeholder="535353">
		<span class="alter">更改</span>
		</div>
		<span class="save"><input type="button" value="保存" ></span>
	</form>

	</div>
	<?php include $includePath . '/footer.php';?>
</div>
<p style="height:52px;width:100%;float:left;"></p>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$(".choose:eq(0)").click(function(){
	$(".choose:eq(1)").css("border","2px solid #8e8e8e");
	$(".choose:eq(1)").html('');
	$(this).css("border","2px solid #f5921a");
	$(this).html('<i class="icon-ok"></i>')
});
$(".choose:eq(1)").click(function(){
	$(".choose:eq(0)").css("border","2px solid #8e8e8e");
	$(".choose:eq(0)").html('');
	$(this).css("border","2px solid #f5921a");
	$(this).html('<i class="icon-ok"></i>')
});
</script>
</html>
