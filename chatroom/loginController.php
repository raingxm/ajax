<?php

	//�����û����ֺ�����
	$loginUser = $_POST['username'];
	$pwd = $_POST['passwd'];
	
	//�жϣ���Ϊû���û���
	if($pwd == "123"){
	
		//�Ѹ��û������ֱ��浽session��
		session_start();
		$_SESSION['loginuser'] = $loginUser;
		
		//��ת�������б����
		header("Location: friendList.php");
		
	}else{
		
		//���Ϸ�
		header("Location: login.php");
	}
	
?>