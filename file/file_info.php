<?php
	require_once("../include/mysql.inc.php");
    $id=$_GET['id'];
	$mysql = new MySql();
    $num=$mysql->num_rows($mysql->query("select * from fileinfo"));    //通过函数查询总记录数
    $sql="select * from fileinfo where fileid='$id'";
    $result=$mysql->query($sql);
   /*上下篇文章*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>长沙理工大学ACMore系统</title>
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
											<td>文件大小：<?php echo $arr[filesize];?></td>
											<td>文件分类：<?php echo $arr[fileclassify]; ?></td>
										</tr>
										<tr>
											<td>上传时间：<?php echo $arr[filedate]; ?></td>
											<td>下载次数：<?php echo $arr[filecount]; ?></td>
										</tr>
										<tr>
											<td>&nbsp;上&nbsp;传&nbsp;人：<?php echo $data[userName]; ?></td>
											<td>
												文件类型：
												<?php 
													$temp = strrev(strstr(strrev($arr[filename_storage]), '.'));
													echo str_replace($temp, '', $arr[filename_storage]);
												?>
											</td>
										</tr>
										<tr>
											<td colspan="2">文件描述：<?php echo $arr[filedesc] ?></td>
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