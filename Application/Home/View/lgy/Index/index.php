<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>首页</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
<link rel="stylesheet" href="<?php echo $staticPath;?>/css/jquery.hiSlider.css?v=<?php echo C('STATIC_VERSION');?>">
<style type="text/css">
body{height:2000px}
.tip{float: right;}
.word1{width: 100%;margin-left:5px;margin-top:5px;overflow:hidden;text-overflow:ellipsis;white-space: nowrap;}
ul{background-color: #fff;}
.centBottom{color: #731108;font-size: 14px;font-weight: bold;text-align: center;}
.middle {vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;z-index:1}
.middle .left{width: 20.38888888888889%;float: left;margin-left: 5px}
.middle .center{width:57.88888888888889%;float: left;height:21px;margin-left: 5px;border: 1px solid #ccc;border-radius:13px;margin-top: 10px;margin-bottom: 5px;padding-top:6px;margin-right:6.201550387596899% }
.middle .center input{padding-left:2px;width:120px;border: none;}
.middle .center .icon-search{padding-right: 5px;padding-left:10px;font-size: 14px}
.middle .icon-user{float:right;margin-right:15px;margin-top:15px;font-size:18px}
#banner{width:100%;z-index:2;margin-top: 38px}
.banner{width: 100%;}
.introduce{text-align:center;margin:10px 0;}
.content{width: 100%;zoom:1;overflow:hidden;padding-top:5px;background-color: #fff;padding-bottom:8px}
.content ul li{width:32%;float: left}
.content ul li:nth-child(1),.content ul li:nth-child(2){margin-right:6px}
.content ul li .left{float: left;padding-top: 5px}
.content ul li .icon-shopping-cart{float:left;margin-top:10px;margin-left: 5px}
.contentCenter{width: 100%;zoom: 1;overflow: hidden;background-color: #fff}
.contentCenter ul{padding-top:10px}
.contentCenter ul li{width:33.14917127071823%;float: left;}
.bgBanner{zoom:1;overflow:hidden;width:100%;padding-top:8px;background-color: #fff}
.sortSelect{width: 100%}
.sortSelect ul{border-top: 1px solid #e0e0e0}
.sortSelect ul li{width: 49.5%;float: left;border-bottom: 1px solid #e0e0e0;padding:6px 0}
.sortSelect ul li:nth-child(1),.sortSelect ul li:nth-child(3){border-right: 1px solid #e0e0e0}
.sort{width: 100%}
.sort ul li{width: 24.5%;float: left;padding:5px 0;border-right: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0;background-color: #fff}
.sort ul li span{margin:14px 15px;color: #343434;padding-left: 0;padding: 5px 0}
.sort ul li:nth-child(4),.sort ul li:nth-child(8){border-right: none;}
.hotGoods{width: 100%}
.hotGoods ul li{width: 33%;float: left;text-align: center;padding:6px 0;margin: 4px 0}
.hotGoods ul li:first-child,.hotGoods ul li:nth-child(2){border-right:1px solid #e0e0e0 }
.bgBanner1{width: 100%}
.goods_list{width: 100%}
.goods_list li{width: 46.2%;float: left;padding: 5px 6px}
.goods_list li .left{float: left;}
.goods_list li .left span.centBottom{color: #731108;font-size: 14px;font-weight: bold;padding-top:10px;padding-left: 0}
.goods_list li .right{float:right;}
.load{width: 100%;text-align:center;margin:10px 40%;}
.load img{width:6%;float: left;}
.load span{font-size:14px;float: left;}
.goodsM{width:100%;}
.goodsM .left{width: 65.27777777777778%;padding-top: 10px; margin-left:34.57777777777778%;color:#666;}
.goodsM .right{float: right;}
/*.out{width: 100%;overflow:hidden;}
.out ul{width: 300%}
.out ul li{width:15%;float: left;}*/
footer .icon-home{color: #8b0d01}
</style>
</head>
<body>
<div class="wrap">
	<div class="middle">
		<div class="left"><img src="<?php echo $staticPath;?>/images/index.jpg"></div>
		<div class="center">
			<span class="icon-search"></span><input type="text" placeholder="请输入关键字" style="outline:none;">
		</div>
		<span class="icon-user"></span>
	</div>
	<div id="banner">
		<ul class="hiSlider">
			<li class="hiSlider-item"><img src="<?php echo $staticPath;?>/images/index_01.jpg"></li>
			<li class="hiSlider-item"><img src="<?php echo $staticPath;?>/images/index_01_01.jpg"></li>
			<li class="hiSlider-item"><img src="<?php echo $staticPath;?>/images/index_01_02.jpg"></li>
			<li class="hiSlider-item"><img src="<?php echo $staticPath;?>/images/index_01.jpg"></li>
		</ul>
		<div class="introduce">-----最当季-----</div>
	</div>
	<!--<div class="out">
	<ul class="in">
		<li><img src="<?php echo $staticPath;?>/images/goodsList_01.png"></li>
		<li><img src="<?php echo $staticPath;?>/images/goodsList_02.png"></li>
		<li><img src="<?php echo $staticPath;?>/images/goodsList_03.png"></li>
		<li><img src="<?php echo $staticPath;?>/images/goodsList_01.png"></li>
        <li><img src="<?php echo $staticPath;?>/images/goodsList_01.png"></li>
		<li><img src="<?php echo $staticPath;?>/images/goodsList_02.png"></li>
		
	</ul>
	</div>	-->
	 <div class="content">
		<ul>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_02.jpg"><div class="word1">火山宾香蕉1根(CS)gjhg</div>
				<div class="left"><span class="centBottom">￥20.00</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_03.jpg"><div class="word1">火山宾香蕉1根(CS)gjhg</div>
				<div class="left"><span class="centBottom">￥28.00</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_04.jpg"><div class="word1">火山宾香蕉1根(CS)gjhg</div>
				<div class="left"><span class="centBottom">￥16.00</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
		</ul>
	</div> 
	<div class="contentCenter">
		<ul>
			<li><img src="<?php echo $staticPath;?>/images/index_05.jpg"></li>
			<li><img src="<?php echo $staticPath;?>/images/index_06.jpg"></li>
			<li><img src="<?php echo $staticPath;?>/images/index_07.jpg"></li>
		</ul>
	</div>
	<div class="content">
		<ul>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_08.jpg"><div class="word1">台凤牌纯凤梨汁</div>
				<div class="left"><span class="centBottom">￥13.70</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_09.jpg"><div class="word1">佳世坦纳牌含气饮用水</div>
				<div class="left"><span class="centBottom">￥10.50</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_10.jpg"><div class="word1">德里克牌纯牛奶</div>
				<div class="left"><span class="centBottom">￥14.80</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
		</ul>
	</div>
	<div class="bgBanner"><img src="<?php echo $staticPath;?>/images/index_11.jpg"></div>
	<div class="content">
		<ul>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_12.jpg"><div class="word1">美式原味烤鸡(整只熟)</div>
				<div class="left"><span class="centBottom">￥38.00</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_13.jpg"><div class="word1">原味恰巴特</div>
				<div class="left"><span class="centBottom">￥8.00</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
			<li>
				<img src="<?php echo $staticPath;?>/images/index_14.jpg"><div class="word1">城市香葱拉发饼</div>
				<div class="left"><span class="centBottom">￥15.00</span></div>
				<span class="icon-shopping-cart"></span>
			</li>
		</ul>
	</div>
	<div class="banner">
		<div class="introduce">-----分类选-----</div>
	</div>
	<div class="sortSelect">
		<ul>
			<li><img src="<?php echo $staticPath;?>/images/index_15.jpg"></li>
			<li><img src="<?php echo $staticPath;?>/images/index_16.jpg"></li>
			<li><img src="<?php echo $staticPath;?>/images/index_17.jpg"></li>
			<li><img src="<?php echo $staticPath;?>/images/index_18.jpg"></li>
		</ul>
	</div>
	<div class="sort">
		<ul>
			<li><img src="<?php echo $staticPath;?>/images/index_19.jpg"><span>豆制品</span></li>
			<li><img src="<?php echo $staticPath;?>/images/index_20.jpg"><span>水&饮料</span></li>
			<li><img src="<?php echo $staticPath;?>/images/index_21.jpg"><span>营养早餐</span></li>
			<li><img src="<?php echo $staticPath;?>/images/index_23.jpg"><span>休闲零食</span></li>
			<li><img src="<?php echo $staticPath;?>/images/index_24.jpg"><span>调味品</span></li>
			<li><img src="<?php echo $staticPath;?>/images/index_25.jpg"><span>粮油杂货</span></li>
			<li><img src="<?php echo $staticPath;?>/images/index_26.jpg"><span>城市自制</span></li>
			<li><img src="<?php echo $staticPath;?>/images/index_27.jpg"><span>家居日用</span></li>
		</ul>
	</div>
	<div class="banner">
		<div class="introduce">-----觅好货-----</div>
	</div>
	<div class="hotGoods">
		<ul>
			<li>热销单品</li>
			<li>新品到货</li>
			<li>促销品专区</li>
		</ul>
	</div>
	<div class="bgBanner1"><img src="<?php echo $staticPath;?>/images/index_28.jpg"></div>
	<ul class="goods_list" data-id="<?php echo $id;?>" date-url="<?php echo U('detail',array('id' => 'GOODS_ID_GOODS_ID'));?>">
			<!-- <li>
				<a><img src="<?php echo $staticPath;?>/images/goodsList_01.png"><h4>菲律宾香蕉1根(CS)</h4><div class="left"><span class="centBottom">￥3.00</span><span>1根</span></div><span class="icon-shopping-cart"></span></a>
			</li>
			<li>
				<a><img src="<?php echo $staticPath;?>/images/goodsList_02.png"><h4>泰国龙眼 500g(CS)</h4<div class="left"><span class="centBottom">￥17.00</span><span>500g</span></div><span class="icon-shopping-cart"></span></a>
			</li>
			<li>
				<a><img src="<?php echo $staticPath;?>/images/goodsList_03.png"><h4>泰国芒果</h4<br><div class="left"><span class="centBottom">￥35.00</span><span>1个</span></div><span class="icon-shopping-cart"></span></a>
			</li>
			<li>
				<a><img src="<?php echo $staticPath;?>/images/goodsList_04.png"><h4>越南火龙果</h4<br><div class="left"><span class="centBottom">￥19.90</span><span>2个</span></div><span class="icon-shopping-cart"></span></a>
			</li> -->
	</ul>
	<div class="load"><img src="<?php echo $staticPath;?>/images/loading.gif"><span>加载中....</span></div>
	<div class="goodsM">
		<!-- <div class="left">--没有更多商品--</div> -->
		<div class="right" id="top1"><span class="icon-arrow-up"></span></div>
	</div>
	<?php include $includePath . '/footer.php';?>
</div>
</body>
</html>
<!-- <script src="js/App.js"></script> -->
<script src="<?php echo $staticPath;?>/js/jquery-1.4.4.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery.1.9.1.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery.hiSlider.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
//绑定返回顶部操作
$('.goodsM .right').click(
	function(){
		window.scrollTo(0,0);
	}
);

$('#form1 button').click(
	function (){
		console.log(1);
		$.ajax(
			{
				type:'POST',
				url :'<?php echo U('editPasswordApi');?>',
				data:{
					'srcPassword':document.editPasswordForm.srcpPassword.value,
					'newPassword':document.editPasswordForm.newPassword.value,
				},
				success:function(data){
					if(data.code =='ok'){
						alert('密码填写正确');
					}else{
						alert('密码填写失败' + data.msg);
					}	
				},
				error:function(){alert('ajax发生错误')},
				dataType:'json',
			}
		)
	}	
)
//图片轮流播放
$('.hiSlider').hiSlider(
	{
		isFlexible:true,
		isSupportTouch:true,
		isShowTitle:false,
		isShowControls:false,
		titleAttr:function(curIdx){return $('img',this).attr('alt');}
	}
);
//加入购物车
$('.icon-shopping-cart').click(
	function(){
		$(this).css('color','#fe8d00');

	}
);
//绑定返回顶部
$('.icon-arrow-up').click(
	function(){
		body.scrollTo(0,0);
	}
);

//点击hotGoods ul li变颜色
$('.hotGoods ul li').click(
	function(){
		$(this).css('color','#fe8d00')
	}
);
// $('.hotGoods ul li').mouseout(){
// 	function(){
// 		$(this).css('color','#000');
// 	}
// };
//scrollHeight: 获取对象的滚动高度。
//scrollTop:设置或获取位于对象最顶端和窗口中可见内容的最顶端之间的距离
//offsetHeight:获取对象相对于版面或由父坐标 offsetParent 属性指定的父坐标的高度
//document.documentElement.scrollTop 垂直方向滚动的值
// document.body.scrollHeight是body元素的滚动高度，
// document.documentElement.scrollHeight为页面的滚动高度，
//网页可见区域高： document.body.clientHeight;
//网页被卷去的高： document.body.scrollTop;
//网页正文全文高： document.body.scrollHeight;

//要获取当前页面的滚动条纵坐标位置，用：document.documentElement.scrollTop;
//而不是：document.body.scrollTop;
var srcPage = function srcScrollTop(){
	var scrollTop = 0;
	if(document.documentElement&&document.documentElement.scrollTop){
		scrollTop = document.documentElement.scrollTop;
	}else{
		scrollTop = document.body.scrollTop;
	}
	return scrollTop;
}
//当前页面可见区域高： document.body.clientHeight;

var visualHeight = function srcClientHeight(){
	var clientHeight = 0;
	if(document.body.clientHeight && document.documentElement.clientHeight){
		clientHeight = document.body.clientHeight
	}else{
		clientHeight = document.documentElement.clientHeigh;
	}
	return clientHeight;
}

// document.body.scrollHeight是body元素的滚动高度，
var sumHeight = function srcScrollHeight(){
	return document.body.scrollHeight
};

//获取商品列表
(
	function(){
		var page=1;
		$.ajax(
			{
				type:'GET',
				url:'<?php echo U('Goods/lists');?>',
				data:{
					p:page,
				},
				success:function(data){
					console.log(data);
					if(data.code == 'ok'){
						var html ='';
						for(var i=0; i<data.goods_list.length;i++){
							html +='<li>';
							html+='<a href="'+ data.img_url_fix+data.goods_list[i].id+'">';
							html+='<img src="'+data.img_url_fix+data.goods_list[i].filename+'" alt="'+data.goods_list[i].name+'">';
							html+='<h4>'+ data.goods_list[i].name+'</h4>';
							html+='<div class="left">';
							html+='<span class="centBottom">'+data.goods_list[i].price+'</span>';
							html+='<span>'+data.goods_list[i].format+'</span>';
							html+='</div>';
							html+='<span class="icon-shopping-cart"></span>';
							if(data.goods_list[i].is_new==1){
							html+='<span>新品</span>';
							}
							html+='</a>';
							html+='</li>';
						}
						$('.goods_list').append(html);
						page++;
						if(page){
							$('')
						}
					}else{
						alert('加载失败' + data.msg);
					}
				},
				dataType:'json',	
			}
		);
		//var 上次的获取商品列表的ajax是否已经完成 = false;
		// 绑定滚屏事件,事件处理函数(){
		// 判断当前滚屏到的页数是否大于已加载的页数 并且上次的ajax已经完成{
		//     上次的获取商品列表的ajax是否已经完成 = false;//刚开始发送ajax请求时，ajax请求还没有完成。派一个人出发去拿东西，这里他是刚出发，还没回来。返回成功或失败时他才是回来了。
		//     调用ajax加载下一页数据
		// (
		// {
		//          要发送的数据
		//          成功处理函数{//派出去的人拿到东西回来了
		//             上次的获取商品列表的ajax是否已经完成 = true;
		//          }
		//          失败处理函数{{//派出去的人回来了他说没拿到东西
		//             上次的获取商品列表的ajax是否已经完成 = true;
		//          }
		// }
		// );
		// }
		// }
		$(window).scroll(
			function(){
				if(srcScrollTop() + srcClientHeight() == srcScrollHeight()){
					$.ajax(
						{
							type:'GET',
							url:'<?php echo U('Goods/lists');?>',
							data:{
								p:page,
							},
							success:function(data){
								console.log(data);
								if(data.code == 'ok'){
									var html ='';
									for(var i=0; i<data.goods_list.length;i++){
										html +='<li>';
										html+='<a href="'+ data.img_url_fix+data.goods_list[i].id+'">';
										html+='<img src="'+data.img_url_fix+data.goods_list[i].filename+'" alt="'+data.goods_list[i].name+'">';
										html+='<h4>'+ data.goods_list[i].name+'</h4>';
										html+='<div class="left">';
										html+='<span class="centBottom">'+data.goods_list[i].price+'</span>';
										html+='<span>'+data.goods_list[i].format+'</span>';
										html+='</div>';
										html+='<span class="icon-shopping-cart"></span>';
										if(data.goods_list[i].is_new==1){
										html+='<span>新品</span>';
										}
										html+='</a>';
										html+='</li>';
									}
									$('.goods_list').append(html);
									page++;
								}else{
									alert('加载失败' + data.msg);
								}
							},
							dataType:'json',	
						}
					);
				}
			}
		);
	}
)();
</script>