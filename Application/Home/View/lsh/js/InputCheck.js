//HTML5给form元素新增了一个novalidate属性，指定为true或者就直接仅仅声明这个属性的时候，不会验证字段
//如果想用js来验证，那一般就应该禁用浏览器自带的验证

//============表单验证构造器================
//input参数 表示一个表单name元素，比如输入框，或单选、多选……
//支持同名的多个表单基本元素，比如多选框和单选框
//但select暂不支持同名的多个
//
//由表单基本元素的HTML属性决定验证规则：（如果没有特别说明，没写的属性表示不验证该属性，如果是单选框的只会获取同名的第一个的这些属性作为规则）
// require 是否必填
// max     允许最大值
// min     允许最小值
// pattern 此属性暂不支持
// my_type 数据类型 int整数 float整数或小数 datetime日期时间 date日期 time时间
// cn_name 错误提示字段名 如果为空或没写将会取placeholder的值，如果也没就会是空
//
//
//方法：
//val()          获取当前表单元素的值(value) ，如果radio单选的或返回选中项的值，如果有同名的将会返回数组（radio单选的除外）
//verification() 验证值 如果值不合法将会返回错误提示 并且给err属性赋值为错误提示
//ifErrFocus() 验证值是否不合法，并让值是不合法的元素获得焦点 如果不合法将会返回true，合法则返回false
//这个方法还会接收一个参数，如果这个参数为true在检测到值不合法时就会弹出警告框提示错误信息
//
//
//ifErrShow()  验证值是否不合法，并让值是不合法的元素显示错误信息（显示错误信息的标签的id为当前表单元素的name_err_序号）如果不合法将会返回true，合法则返回false
//这个方法还会接收两个参数：ifAlert,index
//ifAlert参数为true在检测到值不合法时就会弹出警告框提示错误信息
//index参数 表示显示错误信息的标签的序号，默认为0  用于区分同name的表单元素  显示错误信息的标签的id = 当前表单元素的name + '_err_' + 序号
//
//
//noSubmit 阻止表单提交，需要传来事件对象
//
//
//如果是同名name的有多个的验证方式
//单个验证还是总验证 由 verification 属性决定，
//HTML里的verification 为空表示分开验证多个(但不会每个都验证是否为空，同名的只要有一个不为空，那不为空的规则就算通过)
//不为空表示验证单个
function InputCheck(input){
	var self      = this;
	this.input    = input;
	this.err      = '';
	this.errIndex;
	this.inputLength = input.length;//同名元素个数，如果有多个同名的表单元素，则input.length 会大于1
	if(this.inputLength == undefined)this.inputLength = 1;

	if(this.inputLength > 1){
		this.nodeName = input[0].nodeName;
		if(this.nodeName == 'OPTION'){
			this.nodeName = 'SELECT';
			this.inputLength   = 1;
		}
	}else{
		this.nodeName = input.nodeName;
	}
	

	this.val = function (){
		var i;
		var value = [];
		// var nodeName = self.input.nodeName;
		// if(nodeName == 'SELECT' || nodeName == 'textarea')return self.input.value;
		var input_1 = self.input;
		var inputType;
		if(self.inputLength > 1){
			inputType = self.input[0].type;
		}else{
			inputType = self.input.type;
		}
		if(inputType == 'radio'){//如果type是单选按钮的话 就要循环判断选中状态，
			for (i = 0; i < self.inputLength; i++) {
				if(self.input[i].checked)return self.input[i].value;//如果当前循环到的是已选中的就返回这个的 value
			};
		}else if(inputType == 'checkbox'){//多选
			for (i = 0; i < self.inputLength; i++) {
				//console.log('self.input[i].checked=' + self.input[i].checked);
				//console.log('value=' + self.input[i].value);
				if(self.input[i].checked)value[i] = self.input[i].value;//如果当前循环到的是已选中的就把这个已选项的value加入到 value 数组 （用选项的下标作为value的下标）
			};
		}else if(self.inputLength > 1){
			for (i = 0; i < self.inputLength; i++) {
				value[i] = self.input[i].value;//普通的（单选和多选除外）如果是有多个同名的，也把value加到数组里
			};
		}else{
			return self.input.value;//如果这个name是一个元素的，就是普通的直接返回value
		}
		return value;//多个的会返回value这个数组
	}
	this.ifErrFocus = function (ifAlert){
		self.err = self.verification();
		if(self.err){
			//if(ifAlert)alert(self.err);                  改成下面的
			if(ifAlert)document.getElementById('error_msg').innerHTML=self.err;
			if(self.inputLength == 1)self.input.focus();
			return true;
		}
		return false;
	}
	this.ifErrShow = function (ifAlert,index){
		var input    = self.input;
		var nodeName = input.nodeName;
		if(self.inputLength > 1)input = input[0];

		self.err = self.verification();
		//console.log('错误=' + self.err);
		if(index == undefined)index = 0;
		var span = document.getElementById(input.name + '_err_' + index);
		//console.log(input.name + '_err_' + index);
		if(self.err){
			if(ifAlert)alert(self.err);
			if(span)span.innerHTML = self.err;
			return true;
		}
		if(span)span.innerHTML = '';
		return false;
	}
	this.noSubmit = function (event){
		event.preventDefault();//阻止表单提交
		event.retrunValue = false;//阻止表单提交
		return false;
	}
	this.verification = function (){//验证值 如果值不合法将会返回错误提示 并且给err属性赋值为错误提示
		self.errIndex = undefined;
		var value     = self.val();//先获取表单元素的value
		var verification;
		var err;
		var i;
		if(self.inputLength > 1){//判断有没有同名的，如果有则会>1
			verification = input[0].getAttribute('verification');//为空表示分开验证多个 不为空表示验证单个
			if(verification == '' || verification == null || verification == undefined){
				//验证多个 下面这里用循环验证
				for(i =0;i<self.inputLength;i++){
					if(value[i] != undefined){
						err = self.verification_one(self.input[0],value[i]);//在循环里调用 验证一个值的方法
						if(err){//如果循环验证到有其中一个值不合法就返回错误
							self.errIndex;
							return err;
						}
					}
				}
				var require  = input[0].getAttribute('require');//分开多的，如果其中一个有值那必须验证就能通过，如果全都没有值那就不能通过必填验证
				if(require && value.length == 0){
					var cnName   = input[0].getAttribute('cn_name');
					if(! cnName)cnName = input[0].getAttribute('placeholder');
					return cnName + '不能为空！';
				}
			}else{//合并后验证 因为多的value是放到数组里的，所以这里用了join来合并数组的值为一个值，传过去验证
				err = self.verification_one(self.input[0],value.join(''));
			}
		}else{
			return self.verification_one(self.input,value);
		}
	}
	this.verification_one = function (input,value){//这里的方法是验证一个的
		//下面几行代码是获取验证规定，是从HTML属性里获取的
		var require  = input.getAttribute('require');
		var max      = input.getAttribute('max');
		var min      = input.getAttribute('min');
		var pattern  = input.getAttribute('pattern');
		var type     = input.getAttribute('my_type');//先获取自定义的type优先
		var cnName   = input.getAttribute('cn_name');
		
		if(type == null)type = input.type;//如果自定义的type没有的话就会获取元素的type属性
		var i;
		var temp;
		//下面注释的这个功能还没有实现
		// if(! require){//如果require 为空还得判断一下 require 属性是否存在，因为存在这个属性就算是空值也表示是必填
		// 	for(i in input){
		// 		console.log('i in =' + i);
		// 		if(i == 'require')require = true;
		// 	}
		// }
		// console.log(input);
		// console.log('require=' + require);
		//console.log('value=' + value);
		if(! cnName)cnName = input.getAttribute('placeholder');//如果没有自定义的中文名称，则会获取placeholder提示的内容作为中文名称
		if(require && value == ''){
			//console.log(cnName + '不能为空！');
			return cnName + '不能为空！';
		}else{
			//console.log(require + ' value = ' + value);
		}
		if(value == '')return false;
		if(type == 'int' || type == 'float'){
			if(isNaN(value))return cnName + '必须是数字！';
			if(type == 'int'){
				value = parseInt(value,10);
			}else{
				value = parseFloat(value);
			}
			if(max && value > max)return cnName + '不能超过' + max;
			if(min && value < min)return cnName + '不能小于' + min;
		}else if(type == 'datetime'){
			temp = new Date(value);
			if(isNaN(temp.getTime()))return cnName + '不是正确的日期时间格式';
		}else if(type == 'date'){
			temp = new Date(value);
			if(isNaN(temp.getTime()))return cnName + '不是正确的日期格式';
		}else if(type == 'time'){//12:33
			if(value.length > 5)return cnName + '不是正确的时间格式';
			temp = value.split(':');
			if(temp.length != 2 ||
				isNaN(temp[0]) ||
				isNaN(temp[1])
			)return cnName + '不是正确的时间格式';
			temp[0] = temp[0] - 1 + 1;//实现转为数字
			temp[1] = temp[1] - 1 + 1;//实现转为数字
			if( temp[0] < 0  || temp[1] < 0  ||
				temp[0] > 60 || temp[1] > 60 || temp[0] > 24
			)return cnName + '不是正确的时间格式';
		}else{
			if(min){
				if(value.length < min)return cnName + '字数不能小于' + min;
			}
			if(max){
				if(value.length > max)return cnName + '字数不能超过' + max;
			}
		}
	}
}