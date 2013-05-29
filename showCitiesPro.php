<?php

	//服务器端
	//这里有两句话很重要，第一句告诉浏览器返回的数据时xml格式
	header("Content-Type: text/xml;charset=utf-8");
	//返回数据不缓存  
    header("Cache-Control:no-cache"); 
	
	//接收用户选择的省的名字
	$province = $_POST['Provice'];
	
	//如何在调试过程中，看到接收的数据
	//方法：写入到日志文件中去
	//file_put_contents("d:/mylog.txt",$province."\r\n",FILE_APPEND);
	
	//到数据库去查询有那些城市(现在先不到数据库)
	$info = "";
	if($province == "zhejiang"){
		$info.= "<province><city>杭州</city><city>宁波</city><city>温州</city></province>";
	}else if($province == "jiangsu"){
		$info.= "<province><city>南京</city><city>苏州</city><city>徐州</city></province>";
	}
	
	echo $info;
?>