// 属性
// error 错误处理函数(在构造时可以不传这个函数，如果不传就使用默认的，如果传就使用传来的)
// success 成功处理函数
// 请求的url
// 请求方式

// 方法
// send 发送请求的方法
// 
function MyHttp(success,error){
	this.success = success;
	if(error){
		this.error   = error;
	}else{
		this.error   = function (data){
			//console.log(data);
			alert(data.msg);
		};
	}
	this.http    = new XMLHttpRequest();
	var self     = this;
	//发送请求的方法
	//parameter 参数表示要发送的数据 | 对象格式 例如:{"username":"aaa","password","xxx"}

	//apiName 参数表示接口名称
	this.send    = function(parameter){
		var parmeterName;
		var body = '';
		// if(apiName != 'register' && ){//判断如果不是注册接口或登录接口就加入公共参数
		//  	parameter.login_key = sessionStorage.getItem('登录凭据');
		//  	parameter.user_id = sessionStorage.getItem('用户ID');
		// // 	//parameter.port_name = apiName;
		// }	
		
		for(parmeterName in parameter){//循环传来的对象数据
			//把数据分解拼接成为 参数名1=值1&参数名2=值2&参数名3=值3 这种格式
			body += parmeterName + '=' + encodeURIComponent(parameter[parmeterName]) + '&';
			//console.log(parameter[parmeterName]);
		}
		if(body) body = body.substr(0,body.length - 1);//把最后一个& 去掉
		self.http.open('POST','http://s.50css.com:8001/e.php?' );
		self.http.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		console.log('发送数据:' + body);
		//console.log('url=' + url);
		self.http.send(body);
	}

	//绑定状态变处理函数
	self.http.onreadystatechange = function(){
		var data = {};//data变量，它也是一个对象，它的作用是给返回的数据 错误处理函数或成功处理函数进行处理的
		//它会有如下属性
		//status HTTP状态
		//code   返回的JSON状态码
		//msg    状态说明
		switch(self.http.readyState)	{
			case 0:break;//console.log('http请求已初始化');
			case 1:break;//console.log('http请求已打开');
			case 2:break;//console.log('http请求已发送');
			case 3:break;//console.log('http请求已响应');
			case 4:if(self.http.status == 200){
				//data = eval('(' + self.http.responseText + ')');
				try{//这里面的是有可能会出错的代码
					data = JSON.parse(self.http.responseText);//获取返回的字符串内容 转成对象
					console.log('返回数据转成的对象:' , data);
				}catch(err){//如果前面的代码出错，这里的代码就会运行
					console.log('返回数据转成对象失败');
					console.log('返回数据=' + self.http.responseText);
					alert('服务器返回数据异常');
					return;
				}


				data.status = self.http.status;//把这里内部ajax对象的http状态赋值给data的status属性，让成功或错误处理函数可以使用
				//各个实例的 成功处理函数和错误处理函数 想要获取HTTP状态的话就可以从data的status属性中获取
				if(data.code == 'ok'){
					self.success(data,self.http.responseText);//调用成功处理函数 把 data转过去
				}else{
					self.error(data);//把 data转送错误处理函数
				}
			}else{
				console.log('收到错误数据:' + self.http.responseText);
				console.log('http状态码=' + self.http.status)
				data.code = 'http_err';
				data.msg = self.http.responseText;
				data.status = self.http.status;
				self.error(data);//调用 错误处理函数 传data过去
			}
			break;
			default :break;
		}
	};
}