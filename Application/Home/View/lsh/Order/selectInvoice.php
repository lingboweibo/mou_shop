<!DOCTYPE HTML>
<html>
<head>
	<title>发票信息</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/invoice_info.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/payment_method.css?v=<?php echo C('STATIC_VERSION');?>">
<style>

</style>
</head>
<body>
	<div class="header">
		<h2>发票信息
			<div onclick="window.history.back()"><i class="icon-angle-left"></i></div>
			<div class="nav" id="nav">
				<ul>
					<li><a href="###"><i class="icon-home"></i>首页</a></li>
					<li><a href="###"><i class="icon-reorder"></i>分类</a></li>
					<li><a href="###"><i class="icon-shopping-cart"></i>购物车</a></li>
					<li><a href="###"><i class="icon-user"></i>我的账户</a></li>
				<div class="triangle"></div>
				</ul>
			</div>
			<div id="trigger_nav"><i class="icon-th"></i></div>
		</h2>
	</div>
	<div id="mongolia_layer"></div>
	<div class="main">
		<form action="<?php echo U(ACTION_NAME);?>" method="post">
			<h3>发票类型</h3>
			<ul class="invoice">
				<label class="on"><input type="radio" name="invoice" value="普通发票" checked>普通发票</label>
				<label><input type="radio" name="invoice" value="增值税发票">增值税发票</label>
			</ul>
			<div id="invoice_type">
				
				<h3>发票抬头</h3>
				<ul class="ordinary">
					<li>
						<label>&nbsp;<input type="radio" value="" name="pay_name" id="pay_1" checked></label>
						<label for="pay_1">个人</label>
					</li>
					<li>
						<label>&nbsp;<input type="radio" value="" name="pay_name" id="pay_2"></label>
						<label for="pay_2">公司 <input class="input" type="text" placeholder="请输入公司名字"></label>
					</li>
				</ul>
				<h3>发票内容</h3>
				<ul class="ordinary">
					<li class="width_half">
						<label>&nbsp;<input type="radio" value="" name="pay_name2" id="pay_3" checked></label>
						<label for="pay_3">食品</label>
					</li>
					<li class="width_half">
						<label>&nbsp;<input type="radio" value="" name="pay_name2" id="pay_4"></label>
						<label for="pay_4">日用品</label>
					</li>
				</ul>
				<!-- <ul class="increment">
					<li>
						<div class="left">发票内容</div>
						<div class="right"><input class="input" type="text" placeholder="仅可填写食品/日用品"></div>
					</li>
					<li>
						<div class="left">公司名称</div>
						<div class="right"><input class="input" type="text" placeholder="必填"></div>
					</li>
					<li>
						<div class="left">纳税人识别号</div>
						<div class="right"><input class="input" type="text" placeholder="必填"></div>
					</li>
					<li>
						<div class="left">公司地址</div>
						<div class="right"><input class="input" type="text" placeholder="必填"></div>
					</li>
					<li>
						<div class="left">公司电话</div>
						<div class="right"><input class="input" type="text" placeholder="必填"></div>
					</li>
					<li>
						<div class="left">开户行及账号</div>
						<div class="right"><input class="input" type="text" placeholder="必填"></div>
					</li>
					<li>
						<div class="left">发票寄送地址</div>
						<div class="right"><input class="input" type="text" placeholder="必填"></div>
					</li>
				</ul> -->
			</div>
			<input type="submit" value="确认">
		</form>
		<div class="explain" id="explain">
			<h3>说明:</h3>
			<ol>
				<li>发票金额为现金支付金额（扣除礼品卡余额、抵用券、返利金额等）;</li>
				<li>如有其它需求请拨打客服热线400-811-1797。</li>
			</ol>
		</div>
	</div>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$('#trigger_nav').toggle(
	function () {
		$('#mongolia_layer').css({'width':screen.width,'height':screen.height});
		$('#mongolia_layer').show();
		$('#nav').show();		
	},
	function () {
		$('#mongolia_layer').hide();
		$('#nav').hide();
	}
)
$('#mongolia_layer').click(
	function () {
		$('#mongolia_layer').hide();
		$('#nav').hide();
	}
)

$('.main .invoice input').click(function() {
	var html='';
	console.log(this.value);
	$('.main .invoice label').attr('class','');
	$(this).parent().attr('class','on');
	if (this.value=='增值税发票') {
		html+='<ul class="increment">';
		html+='	<li>';
		html+='		<div class="left">发票内容</div>';
		html+='		<div class="right"><input class="input" type="text" placeholder="仅可填写食品/日用品"></div>';
		html+='	</li>';
		html+='	<li>';
		html+='		<div class="left">公司名称</div>';
		html+='		<div class="right"><input class="input" type="text" placeholder="必填"></div>';
		html+='	</li>';
		html+='	<li>';
		html+='		<div class="left">纳税人识别号</div>';
		html+='		<div class="right"><input class="input" type="text" placeholder="必填"></div>';
		html+='	</li>';
		html+='	<li>';
		html+='		<div class="left">公司地址</div>';
		html+='		<div class="right"><input class="input" type="text" placeholder="必填"></div>';
		html+='	</li>';
		html+='	<li>';
		html+='		<div class="left">公司电话</div>';
		html+='		<div class="right"><input class="input" type="text" placeholder="必填"></div>';
		html+='	</li>';
		html+='	<li>';
		html+='		<div class="left">开户行及账号</div>';
		html+='		<div class="right"><input class="input" type="text" placeholder="必填"></div>';
		html+='	</li>';
		html+='	<li>';
		html+='		<div class="left">发票寄送地址</div>';
		html+='		<div class="right"><input class="input" type="text" placeholder="必填"></div>';
		html+='	</li>';
		html+='</ul>';
	}
	if(this.value=='普通发票'){
		html+='<h3>发票抬头</h3>';
		html+='<ul class="ordinary">';
		html+='	<li>';
		html+='		<label>&nbsp;<input type="radio" value="" name="pay_name" id="pay_1" checked></label>';
		html+='		<label for="pay_1">个人</label>';
		html+='	</li>';
		html+='	<li>';
		html+='		<label>&nbsp;<input type="radio" value="" name="pay_name" id="pay_2"></label>';
		html+='		<label for="pay_2">公司 <input class="input" type="text" placeholder="请输入公司名字"></label>';
		html+='	</li>';
		html+='</ul>';
		html+='<h3>发票内容</h3>';
		html+='<ul class="ordinary">';
		html+='	<li class="width_half">';
		html+='		<label>&nbsp;<input type="radio" value="" name="pay_name2" id="pay_3" checked></label>';
		html+='		<label for="pay_3">食品</label>';
		html+='	</li>';
		html+='	<li class="width_half">';
		html+='		<label>&nbsp;<input type="radio" value="" name="pay_name2" id="pay_4"></label>';
		html+='		<label for="pay_4">日用品</label>';
		html+='	</li>';
		html+='</ul>';
	}
	$('#invoice_type').html(html);
});



function checkboxState() {
	var leng=document.querySelectorAll('input');
	for (var i = 0; i < leng.length; i++) {
		if(leng[i].checked == true){
			leng[i].parentNode.style.backgroundPosition='-.4rem';
		}else{
			leng[i].parentNode.style.backgroundPosition='0';
		}
	}
};
checkboxState();
$('.main label input').live("click",function(){
  checkboxState();
});
</script>
</body>
</html>