<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();

	$userNo = $_GET['userNo'];
	$pwd = substr(md5(rand(1, 99999999)), 0, 8);
	$sql="UPDATE user SET userPwd = '$pwd' WHERE userNo = '$userNo'";
	$mysql->query($sql);
	$msg = "该用户密码已随机修改为" . $pwd;
	alter($msg, "train_manage.php");

?>