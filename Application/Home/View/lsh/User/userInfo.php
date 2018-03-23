<!DOCTYPE HTML>
<html>
<head>
	<title>会员信息</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/font-awesome.min.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/pub.css?v=<?php echo C('STATIC_VERSION');?>">
	<link rel="stylesheet" href="<?php echo $staticPath;?>/css/member.css?v=<?php echo C('STATIC_VERSION');?>">
</head>
<body>
	<div class="header">
		<h2>会员信息<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<form action="<?php echo U('userInfoSubmit');?>" method="post">
			<ul>
				<li><div class="left">*姓名</div><div class="right"><input name="name" type="text" placeholder="请输入姓名" value="<?php echo $data['name'];?>"></div></li>
				<li><div class="left">昵称</div><div class="right"><input name="nickname" type="text" placeholder="请输入姓名" value="<?php echo $data['nickname'];?>"></div></li>
				<li><div class="left">出生日期</div><div class="right"><input name="birth" type="text" placeholder="请输入您的出生日期" value="<?php echo $data['birth'];?>"></div></li>
				<li>
					<div class="left">性别</div>
					<div class="right">
						<label><input value="1" type="radio" name="sex"<?php if($data['sex'] == 1){echo ' checked';}?>>男</label>
						<label><input value="2" type="radio" name="sex"<?php if($data['sex'] == 2){echo ' checked';}?>>女</label>
					</div>
				</li>
				<li><div class="left">职业</div><div class="right">
				<?php
				//下面这几行PHP代码会显示一个职业下拉选择框
				$job = getJobData();
				$arr['data']  = $job;//选项数据 表示下拉选择要显示哪些选项，这是职业的下拉选择框，要显示的选项就是职业数据
				$arr['name']  = 'job_id';//select的name
				$arr['value'] = $data['job_id'];//预选值  value=这个值的选项就会被选中
				echo selectHtml($arr);//此函数会返回下拉选择框的HTML
				?>
				</div></li>
				
				<li><div class="left">所在地区</div><div class="right" id="select_city">
				<?php
				//下面这十多行PHP代码会显示一个或多个城市下拉选择框
				$arr = array();
				$arr['addValue']  = '';//附加选项值
				$arr['addText']  = '请选择';//附加选项文字
				$arr['name']  = 'city_id[]';//select的name

				$parArr = getParentCityId($data['city_id']);//获取当前这个会员所在的城市ID的所有上级ID数组、级别高的在前面
				$parArr[] = $data['city_id'];//把当前这个会员所在的城市ID 也加到 上级ID数组 里，然后这个数组就会包含  当前这个会员所在的城市ID的所有上级ID和他所在城市ID

				foreach ($parArr as $key => $value) {
					if($key == 0){
						$arr['data']  = getCityData(0);//选项数据 表示下拉选择要显示哪些选项
					}else{
						$arr['data']  = getCityData($parArr[$key - 1]);//选项数据 表示下拉选择要显示哪些选项 传当前数组的前一个元素过去获取下级城市数据
					}
					$arr['value'] = $value;//预选值  value=这个值的选项就会被选中 循环到的地区ID
					echo selectHtml($arr);//显示下拉框
				}
				?>
				</div></li>
				<li><div class="left">地址</div><div class="right"><textarea name="address" placeholder="请输入您的地址"><?php echo $data['address'];?></textarea></div></li>
				<li><div class="left">*手机号码</div><div class="right"><input maxlength="16" require name="mobile" type="text" value="<?php echo $data['mobile'];?>"><!-- <button>更改</button> --></div></li>
				<li><div class="left">QQ号码</div><div class="right"><input name="qq" placeholder="请输入您的QQ号码" type="text" value="<?php echo $data['qq'];?>"></div></li>
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