<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="Untitled-1.css" rel="stylesheet" type="text/css" />
<script src="my.js"></script>
<script type="text/javascript">
	var myXmlHttpRequest;
	
	function updateGlodPrice(){
		myXmlHttpRequest = getXmlHttpObject();
		
		if(myXmlHttpRequest){
			
			//创建ajax引擎成功
			var url = "/ajax/glodPriceProcess.php";
			var data = "city[]=dj&city[]=tw&city[]=ld";
			myXmlHttpRequest.open("post",url,true);
			
			//还有一句话，这句话必须有
			myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			myXmlHttpRequest.onreadystatechange = function chuli(){
				
				//接收json数据格式
				if(myXmlHttpRequest.readyState == 4){
					if(myXmlHttpRequest.status == 200){
					
						//取出并转成对象数组
						var res_objects = eval("("+myXmlHttpRequest.responseText+")");
						$('dj').innerText = res_objects[0].price;
						$('tw').innerText = res_objects[1].price;
						$('ld').innerText = res_objects[2].price;
					}
				}
			}
			
			myXmlHttpRequest.send(data);
		}
	}
	
	//使用定时器，每隔5秒发送一次
	setInterval("updateGlodPrice()",5000);
	
</script>
</head>
<body>
	<center>
		<h1>每隔5秒钟更新数据(以1000为基数计算涨跌)</h1>
		<table>
			<tr><td colspan="3"><img src="gjhj_bj_tit.jpg" /></td></tr>
			<tr><td>市场</td><td>最新价格$</td><td>涨跌</td></tr>
			<tr><td>伦敦</td><td id='ld'>788.7</td><td><img src="down.jpg" />211.3</td></tr>
			<tr><td>台湾</td><td id='tw'>854.0</td><td><img src="down.jpg" />146.0</td></tr>
			<tr><td>东京</td><td id='dj'>1791.3</td><td><img src="up.jpg" />791.3</td></tr>
		</table>
	</center>
</body>
</html>