<html>
<head>
<title>用户注册</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
<script type="text/javascript">
<!--	
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
	var myXmlHttpRequest="";
	//验证用户名是否存在
	function checkName(){
		
		myXmlHttpRequest = getXmlHttpObject();
		
		//怎么判断创建ok
		if(myXmlHttpRequest){
			
			//通过myXmlHttpRequest对象发送请求到服务器的某个页面
			//第一个参数表示请求的方式，"get" / "post"
			//第二个参数指定url，对哪个页面发出ajax请求（本质仍然是http请求）
			//第三个参数	true表示使用异步机制，如果false表示不使用异步机制

			var url="/ajax/registerProcess.php";
			var data="username="+$('username').value;
			//打开请求
			myXmlHttpRequest.open("post",url,true);
			//还有一句话，这句话必须有
			myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			
			//指定回调函数，chuli是函数名
			myXmlHttpRequest.onreadystatechange = chuli;
			//真的发送请求，如果是get请求则填入 null即可
			//如果是post请求，则填入实际数据
			myXmlHttpRequest.send(data);
		}
	}
	
	//回调函数
	function chuli(){
		
		//window.alert("处理函数被调用"+myXmlHttpRequest.readyState);
		//我要取出从registerProcess.php页面返回的数据
		if(myXmlHttpRequest.readyState == 4){
			
			//取出值，根据返回信息的格式定. text
			//window.alert("服务器返回"+myXmlHttpRequest.responseText);
			//$("myres").value = myXmlHttpRequest.responseText;
			
			//看看如何取出xml格式数据
			//window.alert(myXmlHttpRequest.responseXML);
			
			//获取mes节点
			var mes = myXmlHttpRequest.responseXML.getElementsByTagName("mes");
			//var mes = myXmlHttpRequest.responseXML.getElementsByTagName("mes")[0].childNodes[0].nodeValue;
			//取出mes节点值
			//var mes_val =  mes[0].childNodes[0].nodeValue;
			window.alert(mes.length);
		}
	}
	
	//这里我们写一个函数
	function $(id){
		
		return document.getElementById(id);
	}
	
//-->
</script>
</head>
<body>
	<form action="???" method="post">
    用户名字:<input type="text"   name="username1" id="username"><input type="button" onclick="checkName();"  value="验证用户名">
    <input style="border-width: 0px;color: red;background-color: white;" type="text" id="myres">
    <br/>
    用户密码:<input type="password" name="password"><br>
    电子邮件:<input type="text" name="email"><br/>
    <input type="submit" value="用户注册">
    </form>
    <form action="???" method="post">
    用户名字:<input type="text" name="username2" >
   
    <br/>
    用户密码:<input type="password" name="password"><br>
    电子邮件:<input type="text" name="email"><br/>
    <input type="submit" value="用户注册">
    </form>
</body>
</html>
