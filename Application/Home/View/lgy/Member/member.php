<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>会员信息</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.member ul{margin-top:40px}
.member ul li{border-bottom: 1px solid #dfdfdf;padding:20px 20px;background-color: #fff;padding-bottom: 30px}
.member ul li .left {float:left; width:60px; text-align:right;font-size: 12px }
.member ul li .right{border: none;float:left;width: 70%;padding-left:8px }
.member ul li .right .select{width:36%;overflow: hidden;}
.member ul li .right select{border:none;outline: none;}
.member ul li .right input{width:160px;height:20px;border: none;color: #ccc}
.member ul li:nth-child(4) input{width:18px;height: 18px;}
.member ul li:nth-child(8){height: 90px}
.member ul li .buttonChange{float:right;width: 25.77777777777778%;border:none;background-color:#f7941c;color: #fff; font-weight: bold; font-size: 12px;height: 20px;border-radius:4px; }
.saveBut{width: 100%;margin-bottom: 50px}
.saveBut button{width:84.72222222222222%;background-color:#f7941c;color: #fff; font-weight: bold; height:30px; border:none; border-radius:4px; margin-left:6.39344262295082%; }
footer .footerTop ul li:last-child div{color:#8b0d01 }
</style>
</head>
<body>
<div class="wrap">
	<form action="" name="" id="form1">
		<div class="middle">
			<p class="topic">
			    <span class="icon-angle-left"></span>
			    <span id="textInfo">会员信息</span>
		    </p>
		</div>
		<div class="member">
			<ul>
				<li id="name">
					<div class="left">*姓名</div>
				 	<div class="right"><input value="刘宁" name="cnname"></div>
				</li>
				<li>
					<div class="left">姓名拼音</div>
				 	<div class="right"><input value="liunin"></div>
				</li>
				<li>
					<div class="left">*出生日期</div>
				 	<div class="right"><input value="1970/01/01"></div>
				</li>
				<li>
					<div class="left">*性别</div>
					<div class="right">
						<input type="radio" name="sex" id="sex">
						<label for="sex" style="background-image:url(images/sprite.png);width:18px;height:18px;display: inline-block;background-size:80px;background-position:1px 497px;"></label> 男
						<input type="radio" name="sex" id="sex1">
						<label for="sex1" style="background-image:url(images/sprite.png);width:18px;height:18px;display: inline-block;background-size:80px;background-position:-20px 497px;"></label> 女
					</div>
				</li>
				<li>
					<div class="left">*证件类型</div>
					<div class="right">
						<div class="select">
							<select name="请选择" id="">
								<option value="外国护照" >外国护照</option>
								<option value="居民身份证" selected="selected">居民身份证</option>
								<option value="旅行证和通行证">旅行和通行证</option>
								<option value="普通护照">普通护照</option>
							</select>
						</div>
					</div>
				</li>
				<li>
					<div class="left">*证件号码</div>
					<div class="right"> <input value ="1234567" name="cnname"></div>
				</li>
				<li>
					<div class="left">*国籍</div>
					<div class="right">
						<div class="select">
							<select name="" id="">
								<option value="" selected="selected">中国</option>
								<option value="" >澳大利亚sa</option>
								<option value="">英国</option>
								<option value="">美国</option>
								<option value="">日本</option>
								<option value="">德国</option>
							</select>
						</div>
					</div>
				</li>
				<li>
					<div class="left">*地址</div>
					<div class="right">
						<textarea cols="20" rows="5" style="border:none;resize:none" placeholder="月球"></textarea>
					</div>
				</li>
				<li>
					<div class="left">*邮编</div>
					<div class="right"><input placeholder="444488"></div>
				</li>
				<li>
					<div class="left">固定电话</div>
					<div class="right"> <input placeholder="请输入固定电话"></div>
				</li>
				<li>
					<div class="left">*手机号码</div>
					<div class="right">
						<input placeholder="15869329904"><button class="buttonChange">更改</button>
					</div>
				</li>
			</ul>
		<div class="saveBut"><button>保存</button></div>
		</div>
	</form>
	
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
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-49px 695px;"></div><div>我的账户</div></a>
				</li>
			</ul>
		</div>
	</footer>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/jquery.reg_log.js"></script>
<script type="text/javascript">
$('.icon-angle-left').click(
	function(){
		window.location.assign('host.html');
	}
)
$('#form1 input:radio').hide();
$('#form1 label:eq(1)').click(
	function(){
		$(this).css('background-position','1px 497px')
		$('#form1 label:eq(0)').css('background-position','-20px 497px');
	}
)
$('#form1 label:eq(0)').click(
	function(){
		$(this).css('background-position','1px 497px')
		$('#form1 label:eq(1)').css('background-position','-20px 497px');
	}
)


//验证姓名 必须是2-5位的中文或者英文(其它数字，符号都不可以)
//在输入框失去焦点时验证
$('#form1 [name="cnname"]').blur(
	function (){
		if(/^(?:[\u4e00-\u9FA5]|[a-z]){5,16}$/i.test(this.value) == false){//没有匹配结果就表示不合法
			alert('您输入的姓名不对');
		}else{
			alert('恭喜您，此姓名填写正确')
		}
	}
);

</script>