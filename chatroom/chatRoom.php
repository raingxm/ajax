<html>
<head>
<?php
	
	//接收window.open()传递的用户名
	$username = $_GET['username'];
	//使用php的方法
	$username = trim($username);
	
	//这里我们取出session保存的登录人的名字
	session_start();
	$loginuser = $_SESSION['loginuser'];
	
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<script type="text/javascript" src="my.js" ></script>
<script type="text/javascript">
	
	//设置窗口大小
	window.resizeTo(800,700);
	
	function sendMessage(){
		
		//创建一个xmlHttpRequest对象
		var myXmlHttpRequest = getXmlHttpObject();
		if(myXmlHttpRequest){
			
			var url = "SendMessageController.php";
			//这里新的知识点，js中如何使用php数据
			//如何在这里得到发送人的名字??
			var data = "con="+$("con").value+"&getter=<?php echo $username;?>&sender=<?php echo $loginuser; ?>";
			window.alert(data);
			
			myXmlHttpRequest.open("post",url,true);
			//还有一句话，这句话必须有
			myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			
			myXmlHttpRequest.onreadystatechange = function (){
				
				if(myXmlHttpRequest.readyState == 4){
					
					if(myXmlHttpRequest.status == 200){
						
						//这里有返回的信息，这里不需要处理
					}
				}
			}
			
			//正式发送
			myXmlHttpRequest.send(data);
		}
	}
</script>

</head>
<center>
<h1>聊天室(<font color="red"><?php echo $loginuser?></font>正在和<font color="red"><?php echo $username;?></font>聊天)</h1>
<textarea cols="50" rows="20"></textarea><br/>
<input type="text" style="width:300px" id="con" />
<input type="button" value="发送信息" onclick="sendMessage()" />
</center>
</html>