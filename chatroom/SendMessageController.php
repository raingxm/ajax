<?php	
	require_once 'MessageService.class.php';
	
	header("Content-Type: text/html;charset=utf-8");
     //返回数据不缓存 
    header("Cache-Control:no-cache");
	//控制器
	//接收信息
	$sender = $_POST['sender'];
	$getter = $_POST['getter'];
	$con = $_POST['con'];
	
	//把信息输出到文件
	//file_put_contents("d:\mylog.log",$sender."-".$getter."-".$con."\r\n",FILE_APPEND);

	$messageService = new MessageService();
	$res = $messageService->addMessage($sender,$getter,$con);
	if($res == 1){
		//正常
	}else{
		echo "error";
	}
?>