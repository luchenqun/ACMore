<?php
	require_once("../include/mysql.inc.php");
    $id=$_GET['id'];
	$mysql = new MySql();
    $num=$mysql->num_rows($mysql->query("select * from fileinfo"));    //ͨ��������ѯ�ܼ�¼��
    $sql="select * from fileinfo where fileid='$id'";
    $result=$mysql->query($sql);
   /*����ƪ����*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>��ɳ����ѧACMoreϵͳ</title>
<script src="../js/menu.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
<style type="text/css">
td{
	border:1px solid RGB(85, 85, 85);
}
</style>
</head>
    <div id="header"></div>
	
    <div id="menu"><?php include("../include/menu.php"); ?></div>
	
	<div id="main-content">
		<div id="sidebar">
		</div>
		<div id="content" style = "margin-left: 0px;">
			<div class="post">
				<div class="ct"><div class="l"><div class="r"></div></div></div>
					<?php while($arr=mysql_fetch_array($result))
					{ 
							$sql1 = "SELECT* FROM `user` WHERE userNo = '$arr[fileauthor]'";
							$result1 = $mysql->query($sql1);
							$data = $mysql->fetch_array($result1);
					?>
							<h2 class="title"><?php echo "$arr[filename]"; ?></a></h2>
							<p class="byline"></p>
							<div class="entry">
								<table style="border-collapse:collapse; margin:0 auto; width:60%">
									<tbody>
										<tr>
											<td>�ļ���С��<?php echo $arr[filesize];?></td>
											<td>�ļ����ࣺ<?php echo $arr[fileclassify]; ?></td>
										</tr>
										<tr>
											<td>�ϴ�ʱ�䣺<?php echo $arr[filedate]; ?></td>
											<td>���ش�����<?php echo $arr[filecount]; ?></td>
										</tr>
										<tr>
											<td>&nbsp;��&nbsp;��&nbsp;�ˣ�<?php echo $data[userName]; ?></td>
											<td>
												�ļ����ͣ�
												<?php 
													$temp = strrev(strstr(strrev($arr[filename_storage]), '.'));
													echo str_replace($temp, '', $arr[filename_storage]);
												?>
											</td>
										</tr>
										<tr>
											<td colspan="2">�ļ�������<?php echo $arr[filedesc] ?></td>
										</tr>
										<tr>
											<center><td colspan="2"><a href="file_download.php?id=<?php echo $arr[fileid] ?>" style="color: RGB(173, 183, 158);"><img src="../images/download.png" /></a></td></center>
										</tr>										
									</tbody>
								</table>
								<br />
									<!-- UY BEGIN -->
									<div id="uyan_frame"></div>
									<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1633721" async=""></script>
									<!-- UY END -->	
							</div>
					<?php
						}
					?>
							<p class="endline"></p>
							<p class="endline"></p>

				<div class="cb"><div class="l"><div class="r"></div></div></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div id="footer"><?php include("../include/foot.php"); ?></div>
</body>
</html>