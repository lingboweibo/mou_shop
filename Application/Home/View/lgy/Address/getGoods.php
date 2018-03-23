<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理收货地址</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.icon-list{float: right;margin-right:20px;padding-top: 3px;font-size: 14px}
label{margin-left:10px;margin-right:7px;}
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
#content{width:90px;height:105px;background-color: #aaa;position:fixed;float: right;right:5px;margin-top:35px;}
#content .slice{border-right:10px solid #fff;border-left:10px solid #fff;border-bottom:10px solid #aaa;width:0;height:0;position: absolute;top:-10px;left:55px;}
#content .div1{width:90px;height:105px;margin: 0 auto;text-align: center;}
#content .div1 ul{width: 100%;height:100%;padding: 3px 0}
#content .div1 ul li{zoom:1;overflow:hidden;width: 100%;padding: 3px 3px}
#content .div1 ul li div{float: left;color: #fff}
.detailsInfo{border-top: none;margin-top:40px;}
.detailsInfo ul li{border-bottom: 1px solid #dfdfdf;padding:10px 12px; background-color:#fff;zoom:1;overflow: hidden;}
.detailsInfo ul li:nth-child(2),.detailsInfo ul li:nth-child(4){padding-left:0px}
.detailsInfo ul li .left{float: left;}
.detailsInfo ul li .left p{padding-top:2px}
.detailsInfo ul li .right{float: right;padding-right:5px;padding-top: 5px}
.detailsInfo ul li .right span{margin-right:5px;color:#000}
.detailsInfo ul li:nth-child(2){border-bottom: none;}
.detailsInfo ul li:nth-child(3){margin-top:10px;}
button{width:100%;height:40px;line-height: 40px; background-color:#f7941c; border:none;color:#fff;position: fixed;bottom:0;left:0;}
#div1 div{width:100px;margin-top:30px;background-color: #000;color: #fff;text-align: center;padding: 5px 0;margin:0 auto;border-radius:3px;}
footer{height:50px}
</style>
</head>
<body>
<div class="wrap">
	<form action="" name="" class="form1">
		<div class="middle">
			<p class="topic">
				<span class="icon-angle-left"></span>
				<span id="textInfo">管理收货地址</span>
		        <span class="icon-th"></span>
			</p>
		</div>
		<div id="content">
			<div class="slice"></div>
			<div class="div1">
				<ul>
					<li>
						<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:22px;display: inline-block;background-size:95px;color:#fff;background-position:1px 737px;"></div><div>首页</div></a>
					</li>
					<li id="sortPage">
						<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:18px;display: inline-block;background-size:95px;color:#fff;background-position:3px 716px;"></div><div>分类</div></a>
					</li>
					<li>
						<a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:30px;height:20px;display: inline-block;background-size:95px;color:#fff;background-position:-90px 675px;"></div><div>购物车</div></a>
					</li>
					<li>
						<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:30px;height:16px;display: inline-block;background-size:95px;color:#fff;background-position:2px 694px;"></div><div>我的账户</div></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="detailsInfo">
			<ul>
				<li>
					<div class="left">
		                <p>刘宁</p>
		                <p>浙江杭州滨江区火星</p>
		            </div>
					<div class="right">15566677777</div>
				</li>
				<li>
					<div class="left">
						<input type="checkbox" name="checkbox" id="email">
						<span class="default"><label for="email" style="background-image:url(images/sprite.png);width:20px;height:18px;display: inline-block;background-size:80px;background-position:1px 496px;"></label>默认地址</span>
					</div>
					<div class="right">
						<span class=" icon-pencil"></span>编辑<span class="icon-trash"></span>删除
					</div>
				</li>		
				<li>
					<div class="left">
		                <p>李星</p>
		                <p>浙江杭州滨江区火星</p>
		            </div>
					<div class="right">13455556666</div>
				</li>
		        <li>
		            <div class="left">
		            	<input type="checkbox" name="checkbox" id="email1">
		            	<span class="default1"><label for="email1" style="background-image:url(images/sprite.png);width:20px;height:18px;display: inline-block;background-size:80px;background-position:-20px 496px;"></label>设为默认</span>
					</div>
		             <div class="right">
		             	<span class=" icon-pencil"></span>编辑<span class="icon-trash"></span>删除
		            </div>
		        </li>
			</ul>
		</div>
		<div id="div1"></div>
	</form>
    <footer>
		<div class="footerTop">
			<button>添加新地址</button>
				</ul>
		</div>
	</footer>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/pub.js"></script>
<script type="text/javascript">

//点击左边的<返回或后退
$('.icon-angle-left').click(
	function(){
		window.history.back();
	}
)

//绑定左边按钮
$('.form1 input:checkbox').hide();
$('.form1 label:eq(1)').click(
	function(){
		$(this).css('background-position','1px 497px');
		$('.form1 label:eq(0)').css('background-position','-20px 497px')
	}
)
$('.form1 label:eq(0)').click(
	function(){
		$(this).css('background-position','1px 497px');
		$('.form1 label:eq(1)').css('background-position','-20px 497px')
	}
);
//绑定删除按钮
// (
// 	function(){
// 		var li = document.querySelectorAll('.detailsInfo ul li');
// 		for(var i = 0;i<li.length;i++){
// 			var icon_trash= document.querySelectorAll('.detailsInfo .icon-trash')[i];
// 			icon_trash.click(
// 				function(){
// 					var node = this.parentNode.parentNode.parentNode.parentNode;
// 					node.parentNode.removeChild(node);
// 				}
// 			)
// 		}
// 	}
// )();

//绑定添加地址按钮
$('button').click(
	function(){
		window.location.assign('newGetGoods.html')
	}
);
(
	function(){
		var html = '';
		html +='<div>设置成功</div>';
		$('input[name="checkbox"]').click(
        	function(){
           		if(this.checked == this.checked){
           			$('#div1').html(html).show().animate({display:'none'},10);
           		};  
        	}
      	)
      	// setTimeout(function(){document.getElementById('div1').style.display ='none';},100);  	 
	}
)();
</script>