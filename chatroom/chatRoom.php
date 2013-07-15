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
	
	window.setInterval("getMessage()",5000);
	function getMessage(){
		
		//创建一个xmlHttpRequest对象
		var myXmlHttpRequest = getXmlHttpObject();
		if(myXmlHttpRequest){
			
			var url = "GetMessageController.php";
			var data = "getter=<?php echo $loginuser; ?>&sender=<?php echo $username; ?>";
			myXmlHttpRequest.open("post",url,true);
			
			myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			
			//指定处理结果的函数
			myXmlHttpRequest.onreadystatechange = function(){
				
				if(myXmlHttpRequest.readyState == 4){
					
					if(myXmlHttpRequest.status == 200){
						
						//这里很重要
						//接收$messageInfo="<meses><mesid>1</mesid><sender>张三</sender><getter>宋江</getter>
						//<con>hello,world</con><sendTime>2013-7-12</sendTime></meses>"
						var mesRes = myXmlHttpRequest.responseXML;
						//第一步取出con和sendTime
						var cons = mesRes.getElementsByTagName("con");
						var sendTimes = mesRes.getElementsByTagName("sendTime");
						//window.alert(cons.length);
						if(cons.length != 0){
							
							//可以处理，有多少条记录，就显示多少条记录
							for(var i=0;i<cons.length;i++){
								
								$('mycons').value += "<?php echo $username; ?> 对"+" <?php echo $loginuser; ?>说："
								+cons[i].childNodes[0].nodeValue+"  "+sendTimes[i].childNodes[0].nodeValue+"\r\n";
							}
							
						}
					}
				}
			}
			
			//发送信息
			myXmlHttpRequest.send(data);				
		}
	}
	
	function sendMessage(){
		
		//创建一个xmlHttpRequest对象
		var myXmlHttpRequest = getXmlHttpObject();
		if(myXmlHttpRequest){
			
			var url = "SendMessageController.php";
			//这里新的知识点，js中如何使用php数据
			//如何在这里得到发送人的名字??
			var data = "con="+$("con").value+"&getter=<?php echo $username;?>&sender=<?php echo $loginuser; ?>";
			//window.alert(data);
			
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
			
			//把你的话显示到聊天框框
			$('mycons').value += "我对<?php echo $username; ?>说： "+$('con').value+
				"  "+new Date().toLocaleString()+"\r\n";
		}
		$('con').value = "";
	}
</script>

</head>
<center>
<h1>聊天室(<font color="red"><?php echo $loginuser?></font>正在和<font color="red"><?php echo $username;?></font>聊天)</h1>
<textarea id="mycons" cols="50" rows="20"></textarea><br/>
<input type="text" style="width:300px" id="con" />
<input type="button" value="发送信息" onclick="sendMessage()" />
</center>
</html>