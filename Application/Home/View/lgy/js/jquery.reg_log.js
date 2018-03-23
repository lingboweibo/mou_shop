$.rLog = function (obj){
	console.log(obj);
	var html,i;
	$('#my_log_table_12345').remove();
	html = '<table id="my_log_table_12345">';
	html += '<tr>';
	if(obj != null){
		for (i = 0; i < obj.length; i++) {
			html += '<th>匹配文本(' + i + ')</th>';
		};
		if(obj.index != undefined){
			html += '<th>出现位置(index)</th><th>原字符串(input)<div>×</div></th>';
		}else{
			html += '<th><div>×</div></th>';
		}
		html += '</tr>';
		html += '<tr>';
		for (i = 0; i < obj.length; i++) {
			var value=obj[i];
			if(value =='\r')value='回车符';
			if(value =='\b')value='退格符';
			if(value =='\o')value='空字符';
			if(value =='\n')value='换行符';
			if(value =='\o')value='null';	
			html += '<td>' + htmlEncode(value) + '</td>';
		};
		if(obj.index != undefined){
			html += '<td>' + obj.index + '</td><td>' + htmlEncode(obj.input) + '</td>';
		}else{
			html += '<td></td>';
		}
	}else{
		html += '<th>没有匹配结果</th><th><div>×</div></th>';
	}
	html += '</tr>';
	html += '</table>';
	$('body').append(html);
	$('#my_log_table_12345').css({'border-collapse':'collapse',position:'fixed',left:'2px',bottom:'2px','min-width':'600px','z-index':999});
	$('#my_log_table_12345 th,#my_log_table_12345 td').css({padding:'3px',border:'1px solid #ccc'});
	$('#my_log_table_12345 th').css({background:'#cff'});

	$('#my_log_table_12345 div').css({float:'right',cursor:'pointer'})
	.hover(
		function (){this.style.color = 'red';},
		function (){this.style.color = '#000';}
	)
	.click(function (){$('#my_log_table_12345').remove();});

	function htmlEncode(value){
		return $('<div/>').text(value).html();
	}
};

// $.成员 = 值;
// $.extend({成员1:值1, 成员2:值2,……});


// $.extend(
// 	{
// 		log:
// 		function (obj){
// 			$('#my_log_table_12345').remove();
// 			var html = '<table id="my_log_table_12345">';
// 			html += '<tr><th>标签名</th><th>ID</th><th>类</th><th>内容<div>×</div></th></tr>';
// 			for (var i = 0; i < obj.length; i++) {
// 				html += '<tr><td>' + obj[i].nodeName + '</td><td>' + obj[i].id + '</td><td>' + obj[i].className + '</td><td>' + $(obj[i]).text() + '</td></tr>';
// 			};
// 			html += '</table>';
// 			$('body').append(html);
// 			$('#my_log_table_12345').css({'border-collapse':'collapse',position:'fixed',right:'2px',bottom:'2px','min-width':'500px','z-index':999});
// 			$('#my_log_table_12345 th,#my_log_table_12345 td').css({padding:'3px',border:'1px solid #ccc'});
// 			$('#my_log_table_12345 th').css({background:'#cff'});

// 			$('#my_log_table_12345 div').css({float:'right',cursor:'pointer'})
// 			.hover(
// 				function (){this.style.color = 'red';},
// 				function (){this.style.color = '#000';}
// 			)
// 			.click(function (){$('#my_log_table_12345').remove();});
// 		}
// 		,
// 		log2 : function (obj){console.log(obj)}
// 	}
// );


//border-collapse 合并边框，如果没有这个属性表格边框会是双线
//hover 是jq对象的一个方法，它可以接收两个参数：
//第一个参数是 鼠标移入时执行的函数，
//第二个参数是 鼠标移出时执行的函数
//
//jq对象.hover(鼠标移入时执行的函数,鼠标移出时执行的函数);
//
//链式操作
//jq对象.方法1(参数).方法2(参数).方法3(参数)
//jq对象.css(参数).hover2(参数).click(参数)