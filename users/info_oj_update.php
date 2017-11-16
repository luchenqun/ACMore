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
		$url = 'http://poj.org/userstatus?user_id=' . $name;  //这儿填页面地址
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
	
	alter("由于网络原因，可能更新会出现差错，若与你的OJ解题数不对，请检查你提供的OJ账号密码无误之后再更新一次", "info_train.php");
?>