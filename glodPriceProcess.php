<?php
	
	//这里有两句话很重要
	header("Content-Type: text/html;charset=utf-8");
	//返回数据不缓存  
    header("Cache-Control:no-cache"); 
	
	$cities = $_POST['city'];
	/*
	$temp="";
	for($i=0;$i<count($cities);$i++){
		
		$temp.=$cities[$i];
	}*/
	
	//file_put_contents("d:/mylog.txt",$temp,FILE_APPEND);
	
	//随机生成三个500到2000的数
	//$res = '[{"price":"400"},{"price":"1000"},{"price":"1200"}]';
	
	$res = '[';
	for($i=0;$i<count($cities);$i++){
		
		if($i == count($cities)-1){
			$res.='{"cityname":"'.$cities[$i].'","price":"'.rand(500,2000).'"}]';
		}else{
			$res.='{"cityname":"'.$cities[$i].'","price":"'.rand(500,2000).'"},';
		}
	}
	//file_put_contents("d:/mylog.txt",$res."\r\n",FILE_APPEND);
	echo $res;
?>