<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();

	$userNo = $_SESSION['name'];

	$sql = "SELECT * FROM `user` WHERE userNo = '$userNo'";
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);	

	$name = $row['userOJName'];
	$ojname = $row['userOJ'];
	$sloves;
	if(strcasecmp($ojname, "POJ") === 0)
	{
		$url = 'http://poj.org/userstatus?user_id=' . $name;  //�����ҳ���ַ
		$info=file_get_contents($url);
		$match = '|user_id=' . $name . '>(.*?)<\/a>|';
		preg_match($match,$info, $sloves);
	}
	else
	{
		$url = 'http://acm.hdu.edu.cn/userstatus.php?user=' . $name;
		$info=file_get_contents($url);
		$match = '|Problems\sSolved<\/td><td\salign=center>(.*?)<\/td>|';
		preg_match($match,$info, $sloves);	
	}
	
	$sql = "SELECT * FROM `user` WHERE userNo = '$userNo'";
	$result=$mysql->query($sql);
	$row = $mysql->fetch_array($result);
	$userSloves  = 	$sloves[1];
	$sql = "UPDATE user SET userSloves='$userSloves' WHERE userNo='$userNo'";
	$mysql->query($sql);	
	
	alter("��������ԭ�򣬿��ܸ��»���ֲ���������OJ���������ԣ��������ṩ��OJ�˺���������֮���ٸ���һ��", "info_train.php");
?>