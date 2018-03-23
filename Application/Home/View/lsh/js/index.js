//返回顶部
setEvent(document.querySelector('.main .quick'),'click',
	function(){
		window.scrollTo(0,0);
	}
);

//轮播图

function animationRun(img){
	if(index >= img.length)index = 0;
	for (var i = 0; i < img.length - 1; i++) {
		if(index == i){
			img[i].style.display = 'block';
		}else{
			img[i].style.display = 'none';
		}
	};
	for (var i = 0; i < leng.length; i++) {
		leng[i].setAttribute('class','');
	}
	leng[index].setAttribute('class','on');
	index++;
}	
var index = 1,html='';
var img =document.querySelectorAll('#animation img');
html+='<span indexs="0" class="on"></span>';
for (var i = 1; i < img.length; i++) {
	html+='<span indexs="'+i+'"></span>';
}
document.getElementById('icon').innerHTML=html;
var leng=document.querySelectorAll('#animation .icon span');
var animationInterval = setInterval('animationRun(img)',1500);
