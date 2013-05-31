	//创建ajax引擎
	function getXmlHttpObject(){
		
		var xmlHttpRequest;
		//不同的浏览器获取xmlhttprequest对象的方法不一样
		if(window.ActiveXObject){
			xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP");
		}else{
			xmlHttpRequest=new XMLHttpRequest();
		}
		return xmlHttpRequest;
	}
	
	//这里我们写一个函数
	function $(id){
		
		return document.getElementById(id);
	}