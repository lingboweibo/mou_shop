<div class="foot">
	<ul>
		<li><a<?php if(CONTROLLER_NAME == 'Index'){ echo ' class="on"';} ?> href="<?php echo U('Index/index');?>"><i class="icon-home"></i><br>首页</a></li>
		<li><a<?php if(CONTROLLER_NAME == 'Category'){ echo ' class="on"';} ?> href="<?php echo U('Category/index');?>"><i class="icon-reorder"></i><br>分类</a></li>
		<li><a<?php if(CONTROLLER_NAME == 'Car'){ echo ' class="on"';} ?> href="<?php echo U('Car/index');?>"><i class="icon-shopping-cart"></i><br>购物车</a>
		<?php
			if($cart_num){
				echo '<span class="cart_num">',$cart_num ,'</span>';
			} 
		?>
		</li>
		<li><a<?php if(CONTROLLER_NAME == 'User'){ echo ' class="on"';} ?> href="<?php echo U('User/account');?>"><i class="icon-user"></i><br>我的账户</a></li>
	</ul>
</div>
<script>
var staticPath="<?php echo $staticPath;?>";

var account_url="<?php echo U('User/account');?>";
var goodsLists_url="<?php echo U('Goods/lists');?>";

var carAdd_url="<?php echo U('Car/add');?>";
var carDel_url="<?php echo U('Car/del');?>";
var carQuantity_url="<?php echo U('Car/quantity');?>";
var carChecked_url="<?php echo U('Car/checked');?>";
var carCheckedAll_url="<?php echo U('Car/checkedAll');?>";
var carCancel_url="<?php echo U('Car/cancel');?>";

var delAddress_url="<?php echo U('Address/delAddress');?>";
var defaultAddress_url="<?php echo U('Address/setDefault');?>";

var favoriteAdd_url="<?php echo U('Favorite/add');?>";
var favoriteDel_url="<?php echo U('Favorite/del');?>";

</script>