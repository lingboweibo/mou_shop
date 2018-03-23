function setEvent(obj,type,handler){
	if (obj.addEventListener) {
		obj.addEventListener(type,handler);
	} else if (obj.attachEvent) {		
		obj.attachEvent('on'+type,handler);
	} else {
		obj['on'+click] = handler;
	}
}
function byId(id){
	return document.getElementById(id);
}
function byTagName(tagName,element){
	if(element)return element.getElementsByTagName(tagName);
	return document.getElementsByTagName(tagName);
}
function query(selector,element){
	if(element)return element.querySelector(selector);	
	return document.querySelector(selector);
}
function queryAll(selector,element){
	if(element)return element.querySelectorAll(selector);	
	return document.querySelectorAll(selector);
}

setTimeout(
	function (){
		var header_home = byId('header_home');
		if(! header_home)return ;
		setEvent(header_home,'click',
			function (){
				window.location.assign('home.html');
			}
		);
	}
	,300
);

//点击右上角，显示content的内容
$('#content').hide();
$('.icon-th').click(
    function(){
        console.log(1);
        $('#content').show();
    }
);
//点其它地方就隐藏content的内容
$('.detailsInfo').click(
	function(){
		$('#content').hide();
	}
)
//点击content里的每一个li分别跳转到相应的页面
$('.div1 li:eq(0)').click(
	function(){
		window.location.assign('index.html');
	}
)
$('.div1 li:eq(1)').click(
	function(){
		window.location.assign('goods_sort.html');
	}
)
$('.div1 li:eq(2)').click(
	function(){
		window.location.assign('buy.html');
	}
)
$('.div1 li:eq(3)').click(
	function(){
		window.location.assign('host.html');
	}
)
//底部链接
$('.index_sort').click(
    function(){
        window.location.assign('index.html');
    }
)
$('.page_sort').click(
    function(){
        window.location.assign('goods_sort.html');
    }
)
$('.buy_cart').click(
    function(){
        window.location.assign('buy.html');
    }
)
$('.my_host').click(
    function(){
        window.location.assign('host.html');
    }
)