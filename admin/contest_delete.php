<?php
	session_start();
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();  
	$id = $_GET["id"];
	
	$sql = "DELETE FROM contest WHERE id = '$id'";
	$mysql->query($sql);
	
	$sql = "DELETE FROM contestscore WHERE gid = '$id'";
	$mysql->query($sql);	
	
	location("ɾ���ɹ���", "contest_manage.php");

?>