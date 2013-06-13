<?php

	require_once 'SqlHelper.class.php';
	class MessageService{
	
		//添加信息到数据库中
		function addMessage($sender,$getter,$con){
			
			//组织一个sql
			$sql = "insert into messages(sender,getter,content,sendTime) values('$sender','$getter','$con',now())";
			
			//file_put_contents("d:\mylog.log",$sql."\r\n",FILE_APPEND);
			//创建一个SqlHelper对象
			$sqlHelper=  new SqlHelper();
			return $sqlHelper->execute_dml($sql);	
		}
		
	}
	
?>