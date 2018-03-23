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
		<h2>编辑收货地址<div onclick="window.history.back()"><i class="icon-angle-left"></i></div></h2></div>
	</div>
	<div class="main">
		<form action="<?php echo U('Address/editSubmit',array('id'=>$id));?>" method="POST">
			<ul>
			
				<li><div class="left">收货人  </div><div class="right"><input name="consignee" type="text" placeholder="请填写收货人  " value="<?php echo $data['consignee'];?>"></div></li>
				<li><div class="left">手机号码</div><div class="right"><input name="mobile"    type="text" placeholder="请填写手机号码" value="<?php echo $data['mobile'];?>"></div></li>
				<li>
					<div class="left">所在地区</div>
					<div class="right" id="select_city">
					<?php
						$arr = array();
						$arr['addValue']  = '';//附加选项值
						$arr['addText']  = '请选择';//附加选项文字
						$arr['name']  = 'city[]';//select的name
		
						$parArr = getParentCityId($data['city']);//获取当前这个会员所在的城市ID的所有上级ID数组、级别高的在前面
						$parArr[] = $data['city'];//把当前这个会员所在的城市ID 也加到 上级ID数组 里，然后这个数组就会包含  当前这个会员所在的城市ID的所有上级ID和他所在城市ID
		
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
						
        			</div>
      			</li>
				<li><div class="left">街道地址</div><div class="right">
					<textarea name="address"><?php echo $data['address'];?></textarea></div>
				</li>
				<li><label>
						<input name="is_default" type="checkbox" <?php if($data['is_default'] == 1){echo 'checked';}?> value="1">设为默认地址
					</label></li>
			
			</ul>
			<button>提交修改</button>
		</form>
	</div>
	<?php include $includePath . '/footer.php';?>
<script src="<?php echo $staticPath;?>/js/pub.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script src="<?php echo $staticPath;?>/js/jquery-1.8.2.min.js?v=<?php echo C('STATIC_VERSION');?>"></script>
<script>
$('#select_city').change( //利用城市接口实现城市联动
	function(e){
		var select=e.target;
		var value=select.value;
		delNextSibling(select);
		$.get("<?php echo U('Home/City/getCity'),'&id=';?>" + value,'',
			function(data,state){
				if(state=='success'){
					if (data.code=='ok'){
						if(data.data.length == 0){return;}
						$('#select_city').append('<br><select></select>');
						var lastSelect=$('#select_city select:last');
						lastSelect.append('<option value="">请选择</option>');
						for (var i = 0; i < data.data.length; i++) {
							lastSelect.append('<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>');
						}
					}else{
						alert(data.msg);
					}
				}else{
					alert('发生错误');
				}
			}
		,'json')
	}
)
//删除下一个节点
function delNextSibling(node){
	var divNext = node.nextSibling;
	if(divNext){
		var par = divNext.parentNode;
		par.removeChild(divNext);
		delNextSibling(node);
	}
}
</script>
</body>
</html>