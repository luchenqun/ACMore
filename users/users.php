<?php
	session_start();
	if(!isset($_SESSION['name']) && !isset($_SESSION['pass']) )
	{
		echo ("<script type='text/javascript'> alert('请先登录！');</script>");
		echo "<script>location.href='index.php';</script>";
		exit();
	}
?>
<html>
<head>
<title>用户后台管理中心</title>
<meta http-equiv=Content-Type content=text/html;charset=GB2312>
</head>
  <frameset cols="240px, *">
	<frame src="left.php" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main"  />
	<frame src="right.php" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
  </frameset>
</html>