<?php
	session_start();
	require_once("../include/mysql.inc.php");
	
	$mysql = new MySql();  
	$s = new SaeStorage();
	
	$id = $_GET["id"];
	
	$sql = 'SELECT* FROM `fileinfo` WHERE fileid = ' . $id;
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);
	
	if($s->fileExists("file", $row[filename_storage]))
	{
		$s->delete("file", $row[filename_storage]);
		$sql = "DELETE FROM fileinfo WHERE fileid = '$id'";
		$mysql->query($sql);
		echo ("<script type='text/javascript'> alert('ɾ���ɹ���');location.href='files_manage.php';</script>");
	}
	else
	{
		echo ("<script type='text/javascript'> alert('�ļ������ڣ�');location.href='files_manage.php';</script>");	
	}
?>