<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<script type="text/javascript" src="my.js" ></script>
<script type="text/javascript">
	
	window.resizeTo(200,500);
	function change1(val,obj){
	
		if(val == 'over'){
			obj.style.color = "red";
			obj.style.cursor = "hand";
		}else if(val == 'out'){
			obj.style.color = "black";
		}
	}
	
	//响应点击新的聊天窗口
	function openChatRoom(obj){
		
		//打开新的窗口
		//这里因为window.open是get方式提交，所以到服务器后，变成乱码
		//所以需要编码
		window.open("chatRoom.php?username="+encodeURI(obj.innerText),"_blank");
	}
</script>
</head>
<h1>好友列表</h1>
<ul>
<li onmouseover="change1('over',this)" onclick="openChatRoom(this)" onmouseout="change1('out',this)" >宋江</li>
<li onmouseover="change1('over',this)" onclick="openChatRoom(this)" onmouseout="change1('out',this)" >苏昶</li>
<li onmouseover="change1('over',this)" onclick="openChatRoom(this)" onmouseout="change1('out',this)" >小姝</li>
</ul>
</html>