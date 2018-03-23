<!DOCTYPE HTML>
<html>
<head>
	<title>分类</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/classify.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2><input type="text" placeholder="请输入关键字"><div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2>
	</div>
	<div class="main">
		<div class="left">
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
		<div class="right">
			<div class="scroll">
				<?php
				foreach ($second as $key => $value) {
					echo '<ul>';
					echo '	<h3><a href="' , U('Goods/index',array('id' => $value['id'])) , '">' , $value['name'] , '</a></h3>';
						//上面是循环二级分类数据 $key会从0 1 2……这样递增变化直到循环结束
						//循环二级分类数据时$key=0时 $data[$key]就会是$key=0的二级分类数据对应的三级分类数据
						foreach ($data[$key] as $one) {
							echo '<li data-id="',$one['id'],'"><a href="' , U('Goods/index',array('id' => $one['id'])) , '"><img src="' . __ROOT__ . '/Uploads/ico/' , $one['ico'] , '" alt=""><br>' , $one['name'] , '</a></li>';
						}
					echo '</ul>';
				}
				?>
			</div>
		</div>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
//先获取当前分类所在.left ul 里的下标
var li = document.querySelectorAll('.left ul li');
for (var i = 0; i < li.length; i++) {
	if(li[i].className == 'selected')break;
};
//让ul滚动到i * 一个li的高度
var ul = document.querySelector('.left ul');
ul.scrollTop = i * li[0].offsetHeight;

//文档加载完毕绑定a点击事件
setEvent(window,'load',function () {
	var leng=document.querySelectorAll('.main .right .scroll ul a');
	for (var i = 0; i < leng.length; i++) {
		setEvent(leng[i],'click',
			function () {
				sessionStorage.setItem('cat_id',this.parentNode.getAttribute('data-id'));
			}
		)
	}
})
</script>
</body>
</html>