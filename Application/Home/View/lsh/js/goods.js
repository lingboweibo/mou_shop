//获取滚动条当前的位置 
function getScrollTop() { 
	var scrollTop = 0; 
	if (document.documentElement && document.documentElement.scrollTop) { 
		scrollTop = document.documentElement.scrollTop; 
	}else if (document.body) { 
		scrollTop = document.body.scrollTop; 
	} 
	return scrollTop; 
} 

//获取当前可见范围的高度 
function getClientHeight() { 
	var clientHeight = 0; 
	if (document.body.clientHeight && document.documentElement.clientHeight) { 
		clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight); 
	}else { 
		clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight); 
	} 
	return clientHeight; 
} 

//获取文档完整的高度 
function getScrollHeight() { 
	return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight); 
} 

//ajax加载商品列表一次和绑定页面滚动到底部再加载商品
;(
	function () {
		var page=1;
		var cat_id = $('.goodsListAjax').attr('data-id');
		var page_size='';
		var order_by='';
		function goodsListAjax(obj) {
			//4.1.4	获取商品列表接口的ajax代码
			//ajax代码
				//面面会有成功处理函数($data){
				// 获取ul对象date-url属性得到商品详情链接的URL
				//链接到商品详情页面的URL = ul对象date-url属性
				//链接到商品详情页面的URL = 链接到商品详情页面的URL 把GOODS_ID_GOODS_ID替换为实际商品ID
				//要把返回的data数据，给 ul class="goods_list" 增加li
				// ul对象.添加子元素('<li><a href="链接到商品详情页面的URL"><img src="换成实际获取到的图片路径" alt=""></a>……</li>')
				//
				//}
			//ajax代码
			$('#tips').html('<img src="'+staticPath+'/imgs/loading.gif" alt="">&nbsp;正在加载...');
			$.ajax({
				url: goodsLists_url,
				type: 'GET',
				dataType: 'json',
				data: {
					cat_id:cat_id,
					page_size:page_size,
					order_by:order_by,
					p:page
				},
				error: function(){
					alert('发生错误');
					$('#tips').html('发生错误');
				},
				success: function(data){
					page++;
					if(data.code == 'ok'){
						var html='';
						if(data.goods_list.length==0){
							$('#tips').html('- 没有更多商品 -');
							html='';
						}else{
							for (var i = 0; i < data.goods_list.length; i++) {
								html+='<li data-id="'+data.goods_list[i].id+'">';
								html+='<a href="'+data_url.replace('GOODS_ID_GOODS_ID',data.goods_list[i].id)+'">';
								html+='<img src="'+data.img_url_fix+data.goods_list[i].filename+'" alt="'+data.goods_list[i].name+'">';
								html+='</a>';
								html+='<h4>'+data.goods_list[i].name+'</h4>';
								html+='<span>'+data.goods_list[i].price+'</span>';
								html+='<span>'+data.goods_list[i].format+'</span>';
								html+='<span class="icon-shopping-cart"></span>';
								if(data.goods_list[i].is_new==1){
									html+='<span>新品</span>';
								}
								html+='</li>';
								//console.log(data.goods_list[i]);
							}
						}
						
						if(obj){
							$(obj.doc).html(html);
							if(html==''){
								return;
							}
						}else{
							$('.goodsListAjax').append(html);
						}
						if(page>=data.page_count){
							$('#tips').html('- 没有更多商品 -');
						}else{
							$('#tips').html('');
						}
						console.log(data);
						$('.main .icon-shopping-cart').click(function() {
							$.ajax({
								url: carAdd_url,
								type: 'GET',
								dataType: 'json',
								data: {
									id:$(this).parent().attr('data-id')
								},
								error: function(){
									alert('发生错误');
								},
								success: function(data){
									console.log(data);
								}
							});
						});
					}else{
						alert(data.msg);
						$('#tips').html('');
					}
				}
			});
		}
		goodsListAjax();
		$(window).scroll(function() {
			if (getScrollTop() + getClientHeight() == getScrollHeight()) { 
				goodsListAjax();
			} 
		});
		//is_new 新品  prom_2 限时促销  sales_sum 销量高
		$('.goods_menu li a').click(
			function () {
				$('.goods_menu li a').attr('class','');
				$(this).attr('class','on');
				page=1;
				order_by=$(this).attr('order_by');
				//order_by='';
				console.log(order_by);
				goodsListAjax({doc:'#good_goods'});
			}
		);

		var order=[
				'is_new',
				'prom_3',
				'sales_sum',
				'price_0',
				'',
				'',
				'',
				'price_1',
		]
		$('.main .menu_list a').click(
			function() {
				var index=$(this).attr('data-index');
				order_by=order[index];
				page=1;
				$('#tips').html('<img src="'+staticPath+'/imgs/loading.gif" alt="">&nbsp;正在加载...');
				$.ajax({
					url: goodsLists_url,
					type: 'GET',
					dataType: 'json',
					data: {
						cat_id:cat_id,
						page_size:page_size,
						order_by:order_by,
						p:page
					},
					error: function(){
						alert('发生错误');
						$('#tips').html('发生错误');
					},
					success: function(data){
						page++;
						if(data.code == 'ok'){
							if(index<=3){
								$('.main .menu_list a:eq('+index+')').attr('data-index',parseInt(index)+4);
							}else{
								$('.main .menu_list a:eq('+(index-4)+')').attr('data-index',parseInt(index)-4);
							}
							
							var html='';
							$('.menu_list li a').attr('class','');
					 		$('.main .menu_list a:eq('+index+')').attr('class','selected');
					 		
							if(data.goods_list.length==0){
								$('#tips').html('- 没有更多商品 -');
								html='';
							}else{
								for (var i = 0; i < data.goods_list.length; i++) {
									html+='<li data-id="'+data.goods_list[i].id+'">';
									html+='<a href="'+data_url.replace('GOODS_ID_GOODS_ID',data.goods_list[i].id)+'">';
									html+='<img src="'+data.img_url_fix+data.goods_list[i].filename+'" alt="'+data.goods_list[i].name+'">';
									html+='</a>';
									html+='<h4>'+data.goods_list[i].name+'</h4>';
									html+='<span>'+data.goods_list[i].price+'</span>';
									html+='<span>'+data.goods_list[i].format+'</span>';
									html+='<span class="icon-shopping-cart"></span>';
									if(data.goods_list[i].is_new==1){
										html+='<span>新品</span>';
									}
									html+='</li>';
									//console.log(data.goods_list[i]);
								}
							}
							$('#goodsList').html(html);
							if(page>=data.page_count){
								$('#tips').html('- 没有更多商品 -');
							}else{
								$('#tips').html('');
							}
							console.log(data);
							$('.main .icon-shopping-cart').click(function() {
								$.ajax({
									url: carAdd_url,
									type: 'GET',
									dataType: 'json',
									data: {
										id:$(this).parent().attr('data-id')
									},
									error: function(){
										alert('发生错误');
									},
									success: function(data){
										console.log(data);
									}
								});
							});
						}else{
							alert(data.msg);
							$('#tips').html('');
						}
					}
				});
			}
		);
	}
)();
// $(document).ready(function () {
// 	console.log($('.icon-shopping-cart'));
// 	$('.main .icon-shopping-cart').click(function() {
// 		$.ajax({
// 			url: carAdd_url,
// 			type: 'GET',
// 			dataType: 'json',
// 			data: {
// 				id:$(this).parent().attr('data-id')
// 			},
// 			error: function(){
// 				alert('发生错误');
// 			},
// 			success: function(data){
				
// 			}
// 		});
// 	});
// })