<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();  
	$userNo = $_GET["userNo"];
	$sql = "UPDATE user SET userTrain = '0' WHERE userNo = '$userNo'";
	$mysql->query($sql);
	alter("已取消该队员集训资格", "train_add.php");
?>