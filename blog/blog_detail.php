<?php
	require_once("../include/mysql.inc.php");
    $id=$_GET['id'];
	$mysql = new MySql();
	
    $sql="select * from blog where blogid='$id'";//通过id查找博客内容
    $result=$mysql->query($sql);
	$arr=$mysql->fetch_array($result);	
	
	$sql = "UPDATE `blog` SET `blogviews` = `blogviews` + 1 WHERE `blogid` = '$id'";//阅读次数加1
	$mysql->query($sql);	
	
	$sql = "SELECT* FROM `user` WHERE userNo = '$arr[blogauthor]'";//通过学号查找姓名
	$result = $mysql->query($sql);
	$data = $mysql->fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
</style>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>长沙理工大学ACMore系统</title>
<script src="../js/menu.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
<script src="../ueditor/third-party/SyntaxHighlighter/shCore.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../ueditor/third-party/SyntaxHighlighter/shCoreDefault.css" />
<script type="text/javascript">
	SyntaxHighlighter.all();
</script>
</head>
    <div id="header"></div>
    <div id="menu"><?php include("../include/menu.php"); ?></div>
	
	<div id="main-content">
		<div id="sidebar">
		</div>
		<div id="content" style = "margin-left: 0px;">
			<div class="post">
				<div class="ct"><div class="l"><div class="r"></div></div></div>
					<h2 class="title"><?php echo "$arr[blogtitle]"; ?></a></h2>
					<p class="byline">发表时间:<?php echo "$arr[blogdate]"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 发表人:<?php echo "$data[userName]"; ?></p>
					<div class="entry"><?php echo $arr[blogcontent]; ?><br />
					<br />
						<!-- UY BEGIN -->
						<div id="uyan_frame"></div>
						<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1633721" async=""></script>
						<!-- UY END -->	

					<br />
					<p align=right><a href="javascript:window.history.back(-1)">返回&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p></div>
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