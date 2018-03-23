(
	function(){
		var link;//获取加链接的元素
		var links = [//链接地址
						'#',
						'#',
						'news.html'
					];
		for (var i = 0; i < links.length; i++) {
			link=document.querySelector('.my-message li:nth-child('+(i+1)+') a');
			link.href=links[i];
		}
	}
)();

(
	function(){
		var link;//获取加链接的元素
		var links = [//链接地址
						'member.html',
						'password.html',
						'manage_address.html',
						'favorites.html',
						'detailed_list.html',
						'help.html',
					];
		for (var i = 0; i < links.length; i++) {
			link=document.querySelector('.user_list li:nth-child('+(i+1)+') a');
			link.href=links[i];
		}
	}
)();