function setEvent(obj,type,handler){
	if (obj.addEventListener) {
		obj.addEventListener(type,handler);
	} else if (obj.attachEvent) {		
		obj.attachEvent('on'+type,handler);
	} else {
		obj['on'+type] = handler;
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

