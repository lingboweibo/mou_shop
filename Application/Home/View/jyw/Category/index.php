<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>商品分类</title>
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<style>
#header>div{height:30px;width:83%; border: 1px solid #c4c4c4;border-radius:13px;margin-top: 7px;margin-left: 9px;line-height: 30px; float: left;text-align: left; }
#header>div>img{width: 20px;margin-left: 13px;margin-top: 5px;float: left;}
#header input[type="text"]{width: 75%;height: 30px;border: 0;outline: none;padding-left:5px;float: left;}
#main{width:100%;float: left;background: #fff;}
#left{width: 25%;float:left;background: #f6f2f1;position:fixed;overflow: hidden;top:45px;bottom: 52px;}
#left ul{width:100%;height: 100%;overflow-y:auto;overflow-x: hidden;padding-right: 20%; }
#left ul li{width:100%;height:48px;line-height: 48px;border-bottom:1px solid #e0e0e0;text-align: center;}
#left ul li a{font-size:12px;color: #a2a2a2;font-weight: bold; }
#left ul li.selected{background: #fff;}
#right{width:75%;float: right;}
#right ul{float: left;}
#right h3{font-size: 18px;font-weight: bold;color: #4a4a4a;padding-left: 20px;}
#right ul li{width: 33.3%;height:100px;list-style: none;margin-top:10px; text-align: center; float: left;font-size: 12px;color: #898989;}
#main ul li img{width: 60px;}
</style>
<body>
<p style="height:47px;width:100%;float:left;"></p>
<div id="container">	
	<div id="header">
		<img src="<?php echo $staticPath;?>/images/help12.jpg" id="back">
		<div>
			<img src="<?php echo $staticPath;?>/images/find.jpg" alt="">
			<input type="text" placeholder="请输入关键字" name="find">
		</div>
	</div>
	<div id="main">
		<div id="left">
			<ul>
				<?php
				foreach ($category as $key => $value) {
					echo '<li';
					if($value['id'] == $id)echo ' class="selected"';//判断循环到的分类id = 传来的id 就多echo  class="selected"
					echo '><a data-index="',$key,'" href="' , U('index',array('id' => $value['id'])) , '">' , $value['name'] , '</a></li>';
				}
				?>
			</ul>
		</div>
		<div id="right">
			<div class="scroll">
				<?php
				foreach ($second as $key => $value) {
					echo '<ul>';
					echo '	<h3><a href="' , U('Goods/index',array('id' => $value['id'])) , '">' , $value['name'] , '</a></h3>';
						//上面是循环二级分类数据 $key会从0 1 2……这样递增变化直到循环结束
						//循环二级分类数据时$key=0时 $data[$key]就会是$key=0的二级分类数据对应的三级分类数据
						foreach ($data[$key] as $one) {
							echo '<li><a href="' , U('Goods/index',array('id' => $one['id'])) , '"><img src="' . __ROOT__ . '/Uploads/ico/' , $one['ico'] , '" alt=""><br>' , $one['name'] , '</a></li>';
						}
					echo '</ul>';
				}
				?>
			</div>
		</div>
	</div>
	<?php include $includePath . '/footer.php';?>
</div>
<p style="height:52px;width:100%;float:left;"></p>
</body>
<script type="text/javascript" src="<?php echo $staticPath;?>/js/jquery-1.11.3.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script type="text/javascript">
var li = document.querySelectorAll("#left ul li");
for (var i = 0; i < li.length; i++) {
	if(li[i].className == 'selected')break;
};
var ul = document.querySelector('#left ul');
ul.scrollTop = i * li[0].offsetHeight;

</script>
</html>
