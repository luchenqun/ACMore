<?php
	session_start();
	require_once("../include/func.inc.php");
	if(!isset($_SESSION['name']) && !isset($_SESSION['pass']) )
	{
		alter('���ȵ�¼��', 'index.php');
		exit();
	}
?>
<html>
<head>
<title>��ɳ����ѧACMore��������</title>
<meta http-equiv=Content-Type content=text/html;charset=GB2312>
</head>
  <frameset cols="240px, *">
	<frame src="left.php" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main"  />
	<frame src="info_complete.php" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
  </frameset>
</html>