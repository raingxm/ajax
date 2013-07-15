<?php
	
	require_once "MessageService.class.php";
	//这个控制器，专门用于响应用户取数据请求
	
	//这里有两句话很重要，第一句告诉浏览器返回的数据时xml格式
    header("Content-Type: text/xml;charset=utf-8");
    //返回数据不缓存 
    header("Cache-Control:no-cache");
	
	$getter = $_POST['getter'];
	$sender = $_POST['sender'];
	
	//file_put_contents("d:/mylog.log",$getter."--".$sender."\r\n",FILE_APPEND);
	
	//调用MessageService来获取信息
	$messageService = new MessageService();
	$mesList = $messageService->getMessage($sender,$getter);
	
	echo $mesList;
?>