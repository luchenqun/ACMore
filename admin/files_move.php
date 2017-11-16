<?php
	session_start();
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");	
    if($_POST[ok])
	{
		$mysql = new MySql();
		$file_up= new SaeUpload("file", "myfile");
		$rs = $file_up->upload();
		if(0 == $rs['state'])
		{
			location("由于某些原因，上传文件失败，请仔细阅读上传文件注意事项", "right.php");
		}
		else
		{
			$name = $rs['sql_filename'];
			$filename_storage = $rs['filename_storage'];
			$filesize = human_readable_filesize($rs['size']);//获取文件大小
			$desc = $_POST['filedesc'];				
			$fileclass = $_POST['fileclassify'];
			$time = date("Y-m-d H:i:s");
			$url = $rs['url'];
			$fileauthor = $_SESSION['username'];
			
			$sql = "INSERT INTO fileinfo(filename, filename_storage, filesize, filedesc, fileclassify, fileauthor, fileurl, filedate) VALUES ('$name', '$filename_storage','$filesize', '$desc', '$fileclass', '$fileauthor', '$url', '$time')";			
			$mysql->query($sql);
			
			if(1 == $mysql->affected_rows())
			{
				location("文件上传成功，将跳转回上传页面", "files_upload.php");
			}
			else
			{
				$rs->delete("file", $rs['sql_filename']);//删除已经上传到服务器的文件
			}
		}
	}
?>