<?php
	require_once("../include/mysql.inc.php");
    $id=$_GET['id'];
	$mysql = new MySql();

    $sql="select * from notification where id='$id'";
    $result=$mysql->query($sql);
	$arr=$mysql->fetch_array($result);
	
	$sql = "UPDATE `notification` SET `readtimes` = `readtimes` + 1 WHERE `id` = '$id'";//�Ķ�������1
	$mysql->query($sql);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>��ɳ����ѧACMoreϵͳ</title>
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
					<h2 class="title"><?php echo "$arr[title]"; ?></a></h2>
					<p class="byline">����ʱ��:<?php echo "$arr[date]"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ������:<?php echo "$arr[author]"; ?></p>
					<div class="entry"><?php echo $arr[content]; ?>
					<br />
						<!-- UY BEGIN -->
						<div id="uyan_frame"></div>
						<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1633721" async=""></script>
						<!-- UY END -->					
					<br /><p align=right><a href="javascript:window.history.back(-1)">����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p></div>
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