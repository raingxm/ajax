<?php
	
	//这里有两句话很重要，第一句告诉浏览器返回的数据时xml格式
	header("Content-Type: text/xml;charset=utf-8");
	//返回数据不缓存  
    header("Cache-Control:no-cache"); 
	//这里要和请求方式对应 post还是get
	//$username = $_POST['username'];
	
	//这里我们看看如何处理格式xml
	$info="";
	if($username == "zhangxv"){
		
		$info.="<res><mes>用户名不可以用,对不起</mes></res>";	//注意，这里的数据是返回给请求的页面
		//echo "用户名重复";
	}else{
		$info.="<res><mes>用户名可以用,恭喜</mes></res>";
		//echo "恭喜可以使用";
	}
	echo $info;	
?>