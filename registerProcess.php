<?php
	
	//这里有两句话很重要，第一句告诉浏览器返回的数据时xml格式
	header("Content-Type: text/html;charset=utf-8");
	//返回数据不缓存  
    header("Cache-Control:no-cache"); 
	//这里要和请求方式对应 post还是get
	$username = $_POST['username'];
	
	$info="";
	if($username == "zhangxv"){
		//这里$info 是一个json数据格式的字串
		$info='[{"res":"用户名不可以用","id":"a001","date":"2013-5-23"},{"res":"用户名不可以用","id":"a005","date":"2013-5-23"}]';
	}else{
		
		$info='[{"res":"用户名可以用","id":"a001","date":"2013-5-23"},{"res":"用户名可以用","id":"a001","date":"2013-5-23"}]';
	}
	echo $info;	
?>