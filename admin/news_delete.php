<?php
	session_start();
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();  
	$id = $_GET["id"];
	$sql = "DELETE FROM notification WHERE id = '$id'";
	$mysql->query($sql);
	echo ("<script type='text/javascript'> alert('É¾³ý³É¹¦£¡');location.href='news_manage.php';</script>");
?>