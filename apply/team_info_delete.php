<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql="select * from teaminfo";
	$result=$mysql->query($sql);    //执行语句
	
	$teamName = $_GET['teamName'];
	
	if($_POST['del'])
	{
		$sql="select * from teaminfo WHERE teamName = '$teamName'";
		$row = $mysql->fetch_array($mysql->query($sql));
		if(strcmp($row[pwd], $_POST['pwd']) != 0)
		{
			location("输入的密码与你注册的组队密码不一致，禁止删除！", "team_info_show.php");
		}
		else
		{
			$sql = "DELETE FROM teaminfo WHERE teamName = '$teamName'";
			$mysql->query($sql);
			if(1 == $mysql->affected_rows())
			{
				location("队伍删除成功", "team_info_show.php");
			}
			else
			{
				location("由于其他原因，队伍删除失败，请重试", "team_info_show.php");
			}
		}
	}
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
							<h2 class="title">校赛组队信息删除</h2>
							<p class="byline"></p>
							<div class="entry">
								<blockquote>
									<form name="form1" action="<?php echo $PHP_SELF; ?>" method="post">
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td align="right" width="30%" height="15">比赛队名：</td>
											<td align="left" width="70%">&nbsp;&nbsp;<?php echo $teamName; ?></td>
											</tr>
											
											<tr>
											<td align="right" width="30%" height="15">队名密码：</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd"><label style="font-size:12px;">&nbsp;&nbsp;(为了防止恶意删除，请输入你的队名密码)</label></td>
											</tr>
										</table>
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td height="25" align="center"><input type="submit" value="确认删除" name = "del" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="team_info_show.php">点错了，我不删除</a></td>
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
