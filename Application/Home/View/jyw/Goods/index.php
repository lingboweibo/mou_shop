<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>商品列表</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#container{background: #fff;}
#header>div{height:30px;width:74%; border: 1px solid #c4c4c4;border-radius:13px;margin-top: 7px;margin-left: 9px;line-height: 30px; float: left;text-align: left; }
#header>div>img{width: 20px;margin-left: 13px;margin-top: 5px;float: left;}
#header input[type="text"]{width: 75%;height: 30px;border: 0;outline: none;padding-left:5px;float: left;}
#header>span{height: 46px; float: right;font-size: 13px;margin-right: 10px;}
#order>ul{width: 100%;height:36px;border-top: 1px solid #ccc;border-bottom:1px solid #ccc;float: left;}
#order>ul>li{width:24.55%;height:25px; margin-top:5px; border-right: 1px solid #ccc; border-collapse: collapse;font-size: 13px;text-align: center; list-style: none;line-height: 25px; float:left;}
#order>ul>li:last-of-type{border: 0;}
#order img{width: 12px;height: 12px;}
#main{width: 100% ;clear: both;float: left;}
.wrap{width:47.2%;padding:1.4%;float: left;}
.wrap>img{width: 100%;}
.name{width:70%;margin-left: 5px; font-size: 13px;line-height: 30px;overflow: hidden;white-space:nowrap;text-overflow:ellipsis;}
.add{line-height: 24px;margin-bottom: 15px;}
.price{margin-left: 5px;font-size:13px;color:#810a06;font-weight: bold; display: inline-block; float: left;}
.num{width: 29%;display: inline-block; margin-left: 10px;font-size: 10px;color:#a7a7a7;overflow:hidden;white-space: nowrap;text-overflow:ellipsis;}
.add img{width: 24px;float: right;margin-right: 10px;}
#nomore{text-align: center;font-size: 12px;color:#404040;line-height:35px;clear: both; }
#nomore img{width: 15px;height: 15px;}
</style>
<body>
<p style="height:45px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">
		<img src="<?php echo $staticPath;?>/images/help12.jpg" id="back">
		<div>
			<img src="<?php echo $staticPath;?>/images/find.jpg" alt="">
			<input type="text" placeholder="请输入关键字" name="find">
		</div>
		<span>筛选</span>
	</div>
	<div id="order">
		<ul>
			<li id="new">新品</li>
			<li id="prom">特惠</li>
			<li id="">销量</li>
			<li id="price">价格<img src="<?php echo $staticPath;?>/images/order.jpg" alt=""></li>
		</ul>
	</div>
	<div id="main"  data_id="<?php echo $id;?>" date-url="<?php echo U('detail',array('id' => 'GOODS_ID_GOODS_ID'));?>">
	</div>
	<?php include $includePath . '/footer.php';?>
</div>
<div id="nomore">---没有更多商品---</div>
<p style="height:100px;width:100%;float:left;"></p>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.4.4.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
var goodsH = 244;
var pageH =  goodsH * 6;
var loadedPage = 0;
var ifSuccess = true;
var goodsNum = 0;
var count = 10;
var order_by = "";
var cart_id = document.querySelector("#main");
fnScroll();
$(window).scroll(fnScroll);
function fnScroll() {
	var scrollT = document.body.scrollTop;
	var scrollPage = parseInt((scrollT - 85 + 40) / pageH) + 1;
	//判断当前滚屏到的页数是否大于已加载的页数 并且上次的ajax已经完成
	if(scrollPage + 1 > loadedPage && ifSuccess == true && goodsNum<count){
		ifSuccess = false;
		ajax(loadedPage + 1);
	}
}
function ajax(page){
	console.log('正在加载第' + page + '页');
	$('#nomore').html('<img src="<?php echo $staticPath;?>/images/loading.gif" alt="" /></br>加载中');
	var html = '';
	var url = "<?php echo U('Goods/lists');?>";
	if(page>1            )url += '&p='        + page;
	if(cart_id     !="")url +='&cat_id='    +cart_id.getAttribute("data_id");
	if(order_by !="")url +='&order_by' +order_by;
	console.log(url);
	$.get(url,null,
		function(data,status){
			$('#nomore').html('');
			ifSuccess = true;
			if(status == 'success'){
				if(data.code == 'ok'){
					console.log(data);
					var goods = data.goods_list;
					for(var i in goods){ 
						html += '<div class="wrap" id="'+ goods[i].id +'"><a href="'+data.img_url_fix+goods[i].id+'"><img src="'+ data.img_url_fix+goods[i].filename+'" alt=""><div class="name">' + goods[i].name + '</div></a><div class="add"><span class="price">￥' + goods[i].price + '</span><span class="num">' + goods[i].format + '</span><img src="<?php echo $staticPath;?>/images/add2.jpg" alt="" class="addGoods"></div></div>';
					}
					$('#main').append(html);
					goodsNum = $('#main').children().length;
					loadedPage = page;
					count = data.count;
					goodsH = $(".wrap").height();
					if(goodsNum >= count)$('#nomore').html('没有相关商品');
				}else{
					alert(data.msg);
				}
			}else{
				alert('网络错误');
			}
		}
		,'json'
	);
}
$(".addGoods").live("click",function(){
	var id = $(this).parent().parent().attr("id");
	$.ajax({
		type:"GET",
		data:{"m":"Home","c":"Car","a":"add","id":id},
		url:"<?php echo U(Car/add)?>",
		success:function(data){
			console.log(data);
			sessionStorage.setItem('count',data.count);
			$("#footer ul li span").html(sessionStorage.getItem('count'));
		},
		dataType:"json"
	});
});

//var arrPrice[];
$("#price").click(function(){
	order_by = "is_new";
	loadedPage = 0;
	goodsNum = 0;
	$(".wrap").remove();
	fnScroll();
	console.log(scrollPage,loadedPage);
})

//for($(".wrap").)
</script>
</html>
