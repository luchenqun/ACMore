<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql="select * from teaminfo";
	$result=$mysql->query($sql);    //ִ�����
	
	$teamName = $_GET['teamName'];
	
	if($_POST['del'])
	{
		$sql="select * from teaminfo WHERE teamName = '$teamName'";
		$row = $mysql->fetch_array($mysql->query($sql));
		if(strcmp($row[pwd], $_POST['pwd']) != 0)
		{
			location("�������������ע���������벻һ�£���ֹɾ����", "team_info_show.php");
		}
		else
		{
			$sql = "DELETE FROM teaminfo WHERE teamName = '$teamName'";
			$mysql->query($sql);
			if(1 == $mysql->affected_rows())
			{
				location("����ɾ���ɹ�", "team_info_show.php");
			}
			else
			{
				location("��������ԭ�򣬶���ɾ��ʧ�ܣ�������", "team_info_show.php");
			}
		}
	}
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
	border:0px solid RGB(194,208,182);
	padding:6px 0;
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
							<h2 class="title">У�������Ϣɾ��</h2>
							<p class="byline"></p>
							<div class="entry">
								<blockquote>
									<form name="form1" action="<?php echo $PHP_SELF; ?>" method="post">
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td align="right" width="30%" height="15">����������</td>
											<td align="left" width="70%">&nbsp;&nbsp;<?php echo $teamName; ?></td>
											</tr>
											
											<tr>
											<td align="right" width="30%" height="15">�������룺</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd"><label style="font-size:12px;">&nbsp;&nbsp;(Ϊ�˷�ֹ����ɾ������������Ķ�������)</label></td>
											</tr>
										</table>
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td height="25" align="center"><input type="submit" value="ȷ��ɾ��" name = "del" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="team_info_show.php">����ˣ��Ҳ�ɾ��</a></td>
											</tr>
										</table>
									</form>
								</blockquote>
								</div>
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
