<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");	
	$s = new SaeStorage();
    $id=$_GET['id'];
	$mysql = new MySql();

    $sql="select * from fileinfo where fileid='$id'";
    $result=$mysql->query($sql);
	$row = $mysql->fetch_array($result);
	
	if (!($s->fileExists ("file", $row[filename_storage])))
	{
		alert_back("文件找不到了，请联系管理员");
	}
	else
	{
		Header("Content-type: application/octet-stream");
		Header("Accept-Ranges: bytes");
		Header("Content-Disposition: attachment; filename=" .$row[filename_storage]);
		$downCount = $row[filecount] + 1;
		$sql = "UPDATE fileinfo SET filecount='$downCount' WHERE fileid='$id'";
		$mysql->query($sql);
		echo $s->read("file", $row[filename_storage] );
		exit;
	}
 ?>