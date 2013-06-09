<?php

	//接收用户名字和密码
	$loginUser = $_POST['username'];
	$pwd = $_POST['passwd'];
	
	//判断（因为没有用户表）
	if($pwd == "123"){
	
		//跳转到好友列表界面
		header("Location: friendList.php");
		
	}else{
		
		//不合法
		header("Location: login.php");
	}
	
?>