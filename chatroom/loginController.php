<?php

	//接收用户名字和密码
	$loginUser = $_POST['username'];
	$pwd = $_POST['passwd'];
	
	//判断（因为没有用户表）
	if($pwd == "123"){
	
		//把该用户的名字保存到session中
		session_start();
		$_SESSION['loginuser'] = $loginUser;
		
		//跳转到好友列表界面
		header("Location: friendList.php");
		
	}else{
		
		//不合法
		header("Location: login.php");
	}
	
?>