//这些是点手机上的后退键（返回键）的处理程序，可以加公共的JS文件里
//如果不处理 用户点 后退键（返回键）的事件，一点了之后就立即退出APP
function myBack(){
	if
	(
		var localHref = document.location.href;//获取当前页面的网址
		//在哪些页面上点后退就要弹出退出就写哪些页面的文件名在这下面的条件里
		// localHref.indexOf('/login.html',0         ) > 0 ||
		// localHref.indexOf('/login_gesture.html',0 ) > 0 ||
		localHref.indexOf('/index.html',0         ) > 0 
		// localHref.indexOf('/project_list.html',0  ) > 0 ||
		// localHref.indexOf('/my_home.html',0       ) > 0
	){
		if(confirm('您确定要退出?')){
			plus.runtime.quit();//实现退出，也就是关闭APP
		}else{
			return false;
		}
	}
	history.back();
}

document.addEventListener('plusready', 
	function(){
		//set_back_click();
		plus.key.addEventListener('backbutton',myBack);//监听返回键
	}
,false);