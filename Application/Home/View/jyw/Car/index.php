 <!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>购物车</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#container{background: #fff;border-bottom: 2px solid #e0e0e0;}
#main{width: 100%;float: left;}
#main>div{position: relative; width:94.444444%; padding:13px 2.77777777777778%;border-bottom: 1px solid #e0e0e0; float: left;}
a{color:#fff;text-decoration: none;}
.left{width: 39.58%;float: left;}
.choose{width:18px;height: 18px;border: 2px solid #878787;border-radius: 100%;display: block; float: left;text-align: center;line-height: 18px;}
label{width: 22px;height: 22px;float: left;z-index: 100;}
.picture{width: initial;height: 100px;}
.picture>img{width:70.17543859649123%;height: inherit;margin-left:6px;float:left; }
.center{width:53%;float: left;}
.name{font-size: 12px;line-height:20px;}
.standard{font-size: 11px;color:#a6a6a6;line-height:20px;}
.money{font-size:16px;color: red;line-height:30px;font-weight: bold; }
.num>span{width: 23px;height: 23px;border: 1px solid #c4c4c4;margin: 5px 3px 0 0;text-align: center; color: #c4c4c4;display: block;float: left;font-weight: bold;border-radius: 3px;}
.num>span:nth-of-type(2){width: 40%;}
 .right{width:20px;float: right;} 
 .right>img{position: absolute;top:70%; width:20px;float: right;}
#main #fee{width: 97.2%;height: 50px;position: fixed;bottom: 47px;left: 0; padding-right:0; font-size: 12px;line-height:25px;background: #fff;}
 #fee>div{height: 50px;width: 9%; float: left;margin-right: 3px;margin-top: 12px;}
 #fee>div>img{height:23px;}
 .all{margin:8px 10px;line-height:30px;font-size: 14px;float: left;}
 .all>span{margin-right: 8px;}
 .tatal{width:26%;font-size:13px;float: right;line-height:20px;margin-top: 3px;}
 .account{width:26%;padding-top: 0px; background: #8a011d;color: #fff;text-align: center;line-height:47px;float: right;
 }
 #footer{padding-top:0;}
input[type="checkbox"]{display: none;}
.icon-ok{color:#f5921a;}
</style>
<body>
<p style="height:47px;width:100%;float:left;"></p>
<div id="container">
	<div id="header">购物车
		<img src="<?php echo $staticPath;?>/images/help12.jpg" id="back">
		<img src="<?php echo $staticPath;?>/images/cart1.jpg" id="showpage">
	</div>
	<form action="" name="form">
		<div id="main">
			<?php
				foreach ($data as $value) {
					if($value['selected'] == 1){
					$temp = 'checked';
				}else{
					$temp = '';
				}

				echo '	<div data-goods_id="' , $value['goods_id'] , '" data-id="' , $value['id'] , '">';
				echo '        <div class="left">';
				echo '            <label for="list_' , $value['id'] , '">';
				echo '                <span class="choose"></span>';
				echo '            </label>';
				echo '            <input type="checkbox" ' , $temp , ' id="list_' , $value['id'] , '">';
				echo '            <div class="picture">';
				echo '                <img src="' , __ROOT__  . '/Uploads/' , $value['filename'] , '" alt="' , $value['name'] , '"></div>';
				echo '        </div>';
				echo '        <div class="center">';
				echo '            <div class="name">' , $value['name'] , '</div>';
				echo '            <div class="standard">规格：' , $value['format'] , '</div>';
				echo '            <div class="money">￥ ' , $value['price'] , '</div>';
				echo '            <div class="num">';
				echo '                <span class="minus">-</span>';
				echo '                <span class="count">' , $value['num'] , '</span>';
				echo '                <span class="add">+</span></div>';
				echo '        </div>';
				echo '        <div class="right">';
				echo '            <img src="',$staticPath,'/images/cart5.jpg" alt="" class="delete">';
				echo '        </div>';
				echo '        <div class="gift"></div>';
				echo '    </div>';
			}?>
		    	

		</div>
	</form>


		<div id="fee">
		    <div>
		        <img src="<?php echo $staticPath;?>/images/cart6.jpg" alt=""></div>上海地区（除崇明）满200元免运费。
		    <br>上海崇明、北京、江苏及浙江地区满300元免运费。</div></div>
		<p>
		</p>
		<div id="footer">
		    <div class="all">
		        <label for="choiceAll">
		            <span class="choose"></span>
		        </label>
		        <input type="checkbox" id="choiceAll" name="choice">全选</div>
		    <div class="account">结算(0)</div>
		    <div class="tatal">
		        <div>
		            <span>合计：</span>
		            <span>￥0.00</span></div>
		        <div>
		            <span>优惠：</span>
		            <span>￥0.00</span></div>
		    </div>
		</div>
	
	<div class="pageJump">
		<span></span>
		<ul>
			<li><a href="<?php echo U('Index/index');?>"><img src="<?php echo $staticPath;?>/images/pageJump1.png" alt="">首页</a></li>
			<li><a href="<?php echo U('Category/index')?>"><img src="<?php echo $staticPath;?>/images/pageJump2.png" alt="">分类</a></li>
			<li><a href="<?php echo U('Car/index')?>"><img src="<?php echo $staticPath;?>/images/pageJump3.png" alt="">购物车</a></li>
			<li><a href="<?php echo U('User/account')?>"><img src="<?php echo $staticPath;?>/images/pageJump4.png" alt="">我的账户</a></li>
		</ul>
	</div>

</div>
<p style="height:124px;background:#fff;width:100%;float:left;"></p>
</body>
</html>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>js/jquery-1.4.4.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$(".minus").click(function(){
	var html = parseInt($(this).next().html());
	if(html>1){
		html --;
		$(this).next().html(html);
	}else{
		alert("是否删除");
	}	
});
$(".add").click(function(){
	var html = parseInt($(this).prev().html());
	html ++;
	$(this).prev().html(html);
	
});
$(".delete").click(function(){
	var self = $(this);
	$.ajax({
		type:"GET",
		data:{"m":"Home","c":"Car","a":"del","id":"11"},
		url:"<?php echo U('Car/del')?>",
		success:function(data){
			console.log(data);
			if(data.code == "ok"){
				if(confirm("是否删除")){
					self.parent().parent().remove();
				}
			}
		},
		dataType:"json"
	})
});


/*$(".choose").toggle(
	function(){
	$(this).css({"border-color":"#f5921a"});
	$(this).html('<i class="icon-ok"></i>');
	},
	function(){
		$(this).css({"border-color":"#878787"});
		$(this).html('');
	}
);*/
/*(function(){
	$.ajax({
		type:"GET",
		data:{"m":"Home","c":"Car","a":"add","id":"1"},
		url:"http://pc2016:8015/index.php",
		success:function(data){
			console.log(data);
		},
		dataType:"json"
	})
})();*/
</script>
