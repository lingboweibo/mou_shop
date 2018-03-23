<!DOCTYPE HTML>
<html>
<head>
	<title>地址</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/new_address.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>新增收货地址<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<form action="<?php echo U('addSubmit')?>" method="post">
			<ul>
				<li><div class="left">收货人</div><div class="right"><input name="consignee" type="text" placeholder="请输入收货人姓名"></div></li>
				<li><div class="left">手机号码</div><div class="right"><input name="mobile" type="text" placeholder="请输入手机号码"></div></li>
				<li><div class="left">所在地区</div><div class="right" id="select_city">
				<?php
				//下面这十多行PHP代码会显示一个或多个城市下拉选择框
				$arr = array();
				$arr['addValue']  = '';//附加选项值
				$arr['addText']  = '请选择';//附加选项文字
				$arr['name']  = 'city[]';//select的name
				$arr['data']  = getCityData(0);//选项数据 表示下拉选择要显示哪些选项
				echo selectHtml($arr);//显示下拉框

				?>
				</div></li>
				<li><div class="left">街道地址</div><div class="right"><textarea name="address">江苏省xx市xx</textarea></div></li>
				<li><label><input type="checkbox" value="1" name="is_default">设为默认地址</label></li>
				<button>保存</button>
			</ul>
		</form>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
var AJAX_URL_CITY = '<?php echo U('Home/City/getCity',array('id' => 'CITY_ID_CITY_ID_CITY_ID'));//CITY_ID_CITY_ID_CITY_ID是一个自定义的标识符，到时在JS里会被替换为选中项的value ?>';
</script>
<script src="<?php echo __ROOT__ , C('STATIC_PATH');?>/js/city.js?v=<?php echo C('STATIC_VERSION');?>"></script>
</body>
</html>