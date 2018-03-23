<!DOCTYPE HTML>
<html>
<head>
	<title>查看购物车</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/shopping_cart.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<body>
	<div class="header">
		<h2>购物车<span id="title_sum"></span>
			<div onclick="window.history.back()"><i class="icon-angle-left"></i></div>
			<div class="nav" id="nav">
				<ul>
					<li><a href="<?php echo U('Index/index');?>"><i class="icon-home"></i>首页</a></li>
					<li><a href="<?php echo U('Category/index');?>"><i class="icon-reorder"></i>分类</a></li>
					<li><a href="<?php echo U('Car/index');?>"><i class="icon-shopping-cart"></i>购物车</a></li>
					<li><a href="<?php echo U('User/account');?>"><i class="icon-user"></i>我的账户</a></li>
				<div class="triangle"></div>
				</ul>
			</div>
			<div id="trigger_nav"><i class="icon-th"></i></div>
		</h2>
	</div>
	<div id="mongolia_layer"></div>
	<div class="main">
		<form action="<?php echo U('Order/add'); ?>" id="order_form" name="order_form" method="post">
		<ul data-url="<?php echo U('Goods/detail',array('id' => 'GOODS_ID_GOODS_ID'));?>">
		<?php
		foreach ($data as $key => $value) {
			if($value['selected'] == 1){
				$temp = ' checked';
			}else{
				$temp = '';
			}
			//前端可以通过data-id属性获取收藏id，用在接口程序里
			//前端可以通过data-goods_id属性获取商品id，用在接口程序里
			echo '	<li data-goods_id="' , $value['goods_id'] , '" data-id="' , $value['id'] , '">';
			echo '	<label>';
			echo '		<div class="left"><label><input name="id[]" value="' , $key .'.' . $value['goods_id'] , '" type="checkbox"' , $temp , ' id="list_' , $value['id'] , '"></label></div>';
			echo '		<div class="middle"><img src="' , __ROOT__  . '/Uploads/' , $value['filename'] , '" alt="' , $value['name'] , '"><div class="word">买2送1</div></div>';
			echo '	</label>';
			echo '	<div class="right">';
			echo '		<label for="list_' , $value['id'] , '">';
			echo '			<h3><a href="', U('Goods/detail',array('id' => $value['id'])) ,'">' , $value['name'] , '</a></h3>';
			echo '			规格：' , $value['format'] , '<br>';
			echo '			<span>￥<sapn class="price">' , $value['price'] , '</sapn></span>';
			echo '		</label>';
			echo '		<div class="commodity_quantity">';
			echo '			<div class="reduce">-</div>';
			echo '			<input name="num[]" class="number" value="' ,$value['num'] , '" placeholder="0" readonly="value">';
			echo '			<div class="plus">+</div>';
			echo '		</div>';
			echo '			<i class="icon-trash"></i>';
			echo '	</div>';
			echo '	<div class="bottom"><span>赠品</span>夏迪邮票莫斯卡多白气泡酒x2</div>';
			echo '</li>';
		}
		?>
		</ul>
		<?php
		if($data == false)echo '您的购物车没有商品';
		?>
		<h4>—没有更多商品—</h4>
		</form>
	</div>
	<div class="foot">
		<div class="discount"><div><i class="icon-ambulance"></i></div>上海地区(除崇明)满200圆免运费。<br>上海崇明、北京、江苏及浙江地区满300圆免运费。</div>
		<div class="checkout">
			<div class="left"><label><input type="checkbox">全选</label></div>
			<input type="submit" class="right" value="结算" form="order_form">
			<div class="middle">合计：<span>￥ <span id="pay">0.00</span></span><br>优惠：￥ 0.00</div>
		</div>
	</div>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
var carDel_url        ="<?php echo U('Car/del');?>";
var carQuantity_url   ="<?php echo U('Car/quantity');?>";
var carChecked_url    ="<?php echo U('Car/checked');?>";
var carCheckedAll_url ="<?php echo U('Car/checkedAll');?>";
var carCancel_url     ="<?php echo U('Car/cancel');?>";
</script>
<script>
;(
	function(){
		var leng=document.querySelectorAll('form ul li');                                 //列表个数
		var pay=document.getElementById('pay');                                           //获取要付的钱数
		var sum=document.querySelectorAll('.number');
		var price=document.querySelectorAll('.price');
		var checkbox=document.querySelectorAll('form input[type="checkbox"]');
		var footCheckbox=document.querySelector('.foot input[type="checkbox"]');
		checkboxState();
		pay.innerHTML=total().toFixed(2);
		//计算总价函数
		function total() {
			var total=0.00;
			for (var i = 0; i < checkbox.length; i++) {
				if(checkbox[i].checked){
					total+=Number(price[i].innerHTML)*100*sum[i].value/100;
				}
			}
			return total;
		}
		//改变复选框状态函数 
		function checkboxState() {
			for (var i = 0; i < checkbox.length; i++) {
				if(checkbox[i].checked == true){
					checkbox[i].parentNode.style.backgroundPosition='-.4rem';
				}else{
					checkbox[i].parentNode.style.backgroundPosition='0';
				}
			}
			if(footCheckbox.checked == true){
				footCheckbox.parentNode.style.backgroundPosition='-.4rem';
			}else{
				footCheckbox.parentNode.style.backgroundPosition='0';
			}
		}
		for (var i = 0; i < leng.length; i++) {
			//绑定删除按钮
			setEvent(document.querySelectorAll('form .icon-trash')[i],'click',
				function () {
					var li = this.parentNode.parentNode;                             					       //获取子元素
					var checkbox = li.parentNode.querySelector('input[type="checkbox"]');
					checkbox.checked = false;

					$.ajax({
						url: carDel_url,
						type: 'GET',
						dataType: 'json',
						data: {
							id:$(li).attr('data-goods_id')
						},
						error: function(){
							alert('发生错误');
						},
						success: function(data){
							console.log(data);
						}
					});

					li.parentNode.removeChild(li);                                					       //删除子元素
					pay.innerHTML=((Math.ceil(total()*100))/100).toFixed(2);  
					$('#title_sum').html('('+$('.main li').length+')'); 
				}
			);
			//绑定减少按钮
			setEvent(document.querySelectorAll('form .reduce')[i],'click',
				function(){
					var li=this.parentNode.parentNode.parentNode;
					var self_sum=li.querySelector('.number');                                         //获取数量
					var self_checkbox=li.querySelector('[type="checkbox"]');                         // 获取复选框
					if(self_sum.value<=0){return;}                                                                 //排除数量不为正整数的情况
					self_sum.value=parseInt(self_sum.value)-1;                                                     //增加数量
					$.ajax({
						url: carQuantity_url,
						type: 'GET',
						dataType: 'json',
						data: {
							id:$(li).attr('data-id'),
							quantity:self_sum.value
						},
						error: function(){
							alert('发生错误');
						},
						success: function(data){
							console.log(data);
						}
					});
					if (self_checkbox.checked) {
						pay.innerHTML=total().toFixed(2);                 
					}
				}
			);
			//绑定增加按钮
			setEvent(document.querySelectorAll('form .plus')[i],'click',
				function(){
					var li=this.parentNode.parentNode.parentNode;
					var self_sum=li.querySelector('.number');                                         //获取数量
					var self_checkbox=li.querySelector('[type="checkbox"]');                          //获取复选框
					self_sum.value=parseInt(self_sum.value)+1;    //增加数量

					$.ajax({
						url: carQuantity_url,
						type: 'GET',
						dataType: 'json',
						data: {
							id:$(li).attr('data-id'),
							quantity:self_sum.value
						},
						error: function(){
							alert('发生错误');
						},
						success: function(data){
							console.log(data);
						}
					});
					if(self_checkbox.checked == false){
						self_checkbox.checked = true;
						$.ajax({
							url: carChecked_url,
							type: 'GET',
							dataType: 'json',
							data: {
								id:$(li).attr('data-id')
							},
							error: function(){
								alert('发生错误');
							},
							success: function(data){
								console.log(data);
								checkboxState();
							}
						});
					};
					
					pay.innerHTML=total().toFixed(2);     
				}
			);
			//绑定选中按钮
			setEvent(document.querySelectorAll('form input[type="checkbox"]')[i],'change',
				function(){
					var li=this.parentNode.parentNode.parentNode.parentNode;
					var self_sum=li.querySelector('.number');
					var self_checkbox=li.querySelector('[type="checkbox"]');
					var checkbox=document.querySelectorAll('form input[type="checkbox"]');
					if(self_checkbox.checked==true){
						$.ajax({
							url: carChecked_url,
							type: 'GET',
							dataType: 'json',
							data: {
								id:$(li).attr('data-id')
							},
							error: function(){
								alert('发生错误');
							},
							success: function(data){
								console.log(data);
							}
						});
					}else{
						$.ajax({
							url: carCancel_url,
							type: 'GET',
							dataType: 'json',
							data: {
								id:$(li).attr('data-id')
							},
							error: function(){
								alert('发生错误');
							},
							success: function(data){
								console.log(data);
							}
						});
					}
					
					for (var i = 0,j=0; i < checkbox.length; i++) {
						if(checkbox[i].checked){
							j++;
						}
					}
					if(j == checkbox.length){//判断是否全选中
						footCheckbox.checked = true;
						$.ajax({
							url: carCheckedAll_url,
							type: 'GET',
							dataType: 'json',
							data: {
							},
							error: function(){
								alert('发生错误');
							},
							success: function(data){
								console.log(data);
							}
						});
					}else{
						footCheckbox.checked = false;
					}
					checkboxState();
					if(self_sum.value<=0){
						return;
					}
					pay.innerHTML=total().toFixed(2);     

				}
			);
			//绑定数量输入框
			setEvent(document.querySelectorAll('form .number')[i],'change',
				function(){
					if(this.value<=0){
						return;
					}
					pay.innerHTML=total().toFixed(2);
				}
			);
		}
		//绑定全选
		setEvent(footCheckbox,'change',
			function(){
				var leng=document.querySelectorAll('.main input[type="checkbox"]');                     //获取复选框
				if (footCheckbox.checked == true) {
					$.ajax({
						url: carCheckedAll_url,
						type: 'GET',
						dataType: 'json',
						data: {
						},
						error: function(){
							alert('发生错误');
						},
						success: function(data){
							console.log(data);
						}
					});
					for (var i = 0; i < leng.length; i++) {
						leng[i].checked=true;
						var li=leng[i].parentNode.parentNode.parentNode;
					}
				}else{
					for (var i = 0; i < leng.length; i++) {
						leng[i].checked=false;
					}
				}
				checkboxState();
				pay.innerHTML=total().toFixed(2);           
			}
		)
	}
)();

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
$('#title_sum').html('('+$('.main li').length+')');

</script>
</body>
</html>