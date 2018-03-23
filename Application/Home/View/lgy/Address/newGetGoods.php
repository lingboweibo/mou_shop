<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新增收货地址</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/pub.css">
<style type="text/css">
.checkbox{margin-right: 5px;font-size: 16px;}
.middle .topic{height:20px;line-height:20px;vertical-align: middle;width:100%;position:fixed;top:0;left:0; background: #fff;}
.detailsInfo{border-top:none;margin-top:40px}
.detailsInfo ul li{zoom:1;overflow:hidden;border-bottom: 1px solid #ccc;padding:10px 0; background-color:#fff}
.detailsInfo ul li .left{float: left;width:25.69444444444444%;text-align: right;}
.detailsInfo ul li .right{float: left;margin-left:12px}
.detailsInfo ul li .right input{border: none;height: 20px}
.detailsInfo ul li .right select{width:200px; height:30px;color: #868686;float: right;margin-bottom:5px}
.detailsInfo ul li .left span{padding-right: 5px;}
.detailsInfo ul li label{margin-right: 5px}
.safeButton{width:100%;text-align:center;margin-top: 20px}
.safeButton button{width:84.72222222222222%;background-color:#f7941c;color: #fff; font-weight: bold; height:30px; line-height:30px;border:none; border-radius:4px;}
</style>
</head>
<body>
<div class="wrap">
		<form action="" name="" id="form1">
			<div class="middle">
				<p class="topic">
				    <span class="icon-angle-left"></span>
				    <span id="textInfo">新增收货地址</span>
			    </p>
			</div>
			<div class="detailsInfo">
				<ul>
					<li>
						<div class="left">收货人</div>
						<div class="right"><input type="text" name="cnname" value="刘宁" ><span id="cnname_err_0" class="err"></span</div>
					</li>
					<li>
						<div class="left">手机号码</div>
						<div class="right"><input type="text" class="tel" name="tel" placeholder="15566677777"><span id="cnname_err_0" class="err"></span></div>
					</li>
					<li>
						<div class="left">所在地区</div>
						<div class="right" name="area">
							<div id="select_city">
						        <select name="city_id">
						            <option value="">请选择</option>
						            <option value="110000000">北京市</option>
						            <option value="120000000">天津市</option>
						            <option value="130000000">河北省</option>
						            <option value="140000000">山西</option>
						            <option value="150000000">内蒙古自治区</option>
						            <option value="210000000">辽宁省</option>
						            <option value="220000000">吉林省</option>
						            <option value="230000000">黑龙江省</option>
						            <option value="310000000">上海市</option>
						            <option value="320000000">江苏省</option>
						            <option value="330000000">浙江省</option>
						            <option value="340000000">安徽省</option>
						            <option value="350000000">福建省</option>
						            <option value="360000000">江西省</option>
						            <option value="370000000">山东省</option>
						            <option value="410000000">河南省</option>
						            <option value="420000000">湖北省</option>
						            <option value="430000000">湖南省</option>
						            <option value="440000000" selected="">广东省</option>
						            <option value="450000000">广西壮族自治区</option>
						            <option value="460000000">海南省</option>
						            <option value="500000000">重庆市</option>
						            <option value="510000000">四川省</option>
						            <option value="520000000">贵州省</option>
						            <option value="530000000">云南省</option>
						            <option value="540000000">西藏自治区</option>
						            <option value="610000000">陕西省</option>
						            <option value="620000000">甘肃省</option>
						            <option value="630000000">青海省</option>
						            <option value="640000000">宁夏回族自治区</option>
						            <option value="650000000">新疆维吾尔自治区</option>
						            <option value="710000000">台湾省</option>
						            <option value="810000000">香港特别行政区</option>
						            <option value="820000000">澳门特别行政区</option>
						        </select>
						    </div>
							<!-- <select>
								<option>江苏</option>
								<option>上海</option>
								<option>广州</option>
							</select><br>
							<select>
								<option>---</option>
								<option>上海</option>
								<option>广州</option>
							</select><br>
							<select>
								<option>---</option>
								<option>上海</option>
								<option>广州</option>
							</select> -->
						</div>
					</li>
					<li>
						<div class="left">街道地址</div>
		    			<div class="right" name="details_area">
		    				<textarea cols="30" rows="7" style="border:none;resize:none" placeholder="火星"></textarea>
		    			</div>
					</li>
					<li>
		            	<div><span><input type="checkbox" class="checkbox" id="checkbox"><label for="checkbox" style="background-image:url(images/sprite.png);width:22px;height:19px;display: inline-block;background-size:90px;background-position:2px 579px;"></label></span>设为默认地址</div>
		            </li>
				</ul>
			</div>
			<div class="safeButton"><button>提交</button></div>
		</form>
	<footer>
		<div class="footerTop">
			<ul>
				<li>
					<a href="#"><div class="index_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-22px 737px;"></div><div>首页</div></a>
				</li>
				<li>
					<a href="#"><div class="page_sort" style="background-image:url(images/sprite.png);width:28px;height:13px;display: inline-block;background-size:95px;background-position:-20px 716px;"></div><div>分类</div></a>
				</li>
				<li>
					<a href="#"><div class="buy_cart" style="background-image:url(images/sprite.png);width:35px;height:13px;display: inline-block;background-size:95px;background-position:-110px 675px;"></div><div>购物车</div></a>
				</li>
				<li>
					<a href="#"><div class="my_host" style="background-image:url(images/sprite.png);width:40px;height:13px;display: inline-block;background-size:95px;background-position:-13px 695px;"></div><div>我的账户</div></a>
				</li>
			</ul>
		</div>
	</footer>	
</div>
</body>
</html>
<script src="js/jquery-1.4.4.js"></script>
<script type="text/javascript">
$('.icon-angle-left').click(
	function(){
		window.location.assign('host.html');
	}
)
$(' #form1 [name="cnname"]').blur(
	function (){
		if(/^(?:[\u4e00-\u9FA5]|[a-z]){2,5}$/i.test(this.value) == false){//没有匹配结果就表示不合法
			alert('您输入的姓名不对');
		}else{
			// $('#' + this.name + '_err_0').html('');
			alert('恭喜')
		}
	}
)
// $('#form1 [name="tel"]').blur(

// 	function (){
// 		console.log(1);
// 		var tel = new RegExp(/\d/gi);
// 		console.log(tel);
// 		if(tel){
// 			alert('恭喜你,填写正确')
// 		}else{
// 			alert('手机号码是用数字填写的');
// 		}
// 	}
// )


$('#select_city').change(
	function (event){
		var select = event.srcElement;
		var value = select.value;
		$(select).nextAll().remove();//删除这个下拉选择框后面的所有的弟弟节点
		$.get('http://pc2016:8015/index.php?m=Home&c=City&a=getCity&id=' + value,
			function (data,state){
				if(state == 'success'){
					if(data.code!='ok'){
						alert(data.msg);
						return;
					}
					if(data.data.length>0){
						$(select).after('<div><select name="select"><option value="">请选择</option></select></div>')
						var selectLast = $('#select_city select:last');
						for(var i in data.data){//i是下标
							selectLast.append('<option value="'+ data.data[i]['id']+'">'+ data.data[i]['name']+'</option>');
						}
					}	
				}
			}
		,'json')
	}
)
</script>