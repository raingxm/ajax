<?php

	//�����û����ֺ�����
	$loginUser = $_POST['username'];
	$pwd = $_POST['passwd'];
	
	//�жϣ���Ϊû���û���
	if($pwd == "123"){
	
		//��ת�������б����
		header("Location: friendList.php");
		
	}else{
		
		//���Ϸ�
		header("Location: login.php");
	}
	
?>