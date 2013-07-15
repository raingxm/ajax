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
		
		
		//获取数据，并把数据组装好返回给客户端（聊天室）
		function getMessage($sender,$getter){
			
			//组织sql语句
			$sql = "select * from messages where sender='$sender' and getter='$getter' and isGet=0";
			
			$sqlHelper=  new SqlHelper();
			$array = $sqlHelper->execute_dql($sql);
			
			//返回，现在我们来定一下返回给客户端的信息格式
			//xml-json
			//$messageInfo="<meses><mesid>1</mesid><sender>张三</sender><getter>宋江</getter>
			//<con>hello,world</con><sendTime>2013-7-12</sendTime></meses>"
			
			//难点，如何拼接这个xml格式
			$messageInfo="<meses>";
			for($i=0;$i<count($array);$i++){
				
				$row = $array[$i];
				$messageInfo.= "<mesid>{$row['id']}</mesid><sender>{$row['sender']}".
				"</sender><getter>{$row['getter']}</getter><con>{$row['content']}".
				"</con><sendTime>{$row['sendTime']}</sendTime>";
				
			}
			$messageInfo.="</meses>";
			//输出日志
			//file_put_contents("d:/mylog.log",$messageInfo."\r\n",FILE_APPEND);
			
			//更新,标记消息为已读，即 isGet设为1
			$sql2 = "update messages set isGet=1 where sender='$sender' and getter='$getter'";
			$sqlHelper->execute_dml($sql2);
			
			//关闭连接
			$sqlHelper->close_connect();
			
			return $messageInfo;
		}
		
	}
	
?>