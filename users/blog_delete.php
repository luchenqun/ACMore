<?php
	session_start();
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();  
	$id = $_GET["id"];
	$sql = "DELETE FROM blog WHERE blogid = '$id'";
	$mysql->query($sql);
	alter("ɾ���ɹ���", "blog_manage.php");

?>