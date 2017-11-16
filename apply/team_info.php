<?php
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$sql="SELECT * FROM register";
	$result=$mysql->query($sql);    //执行语句
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
							<h2 class="title">校赛组队信息注册</h2>
							<p class="byline"></p>
							<div class="entry">
								<blockquote>
									<form name="form1" action="team_info_next.php" method="post">
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td align="right" width="30%" height="15">比赛队名：</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="teamName"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*队名可以由汉字，字母，数字和下划线组成)</label></td>
											</tr>
				
											<tr>
											<td align="right" width="30%" height="15">联系电话：</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="tel"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*校赛信息的传达将通过该手机号码)</label></td>
											</tr>
											
											<tr>
											<td align="right" width="30%" height="15">队名密码：</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd1"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*密码为6到16位,密码将作为比赛密码使用)</label></td>
											</tr>

											<tr>
											<td align="right" width="30%" height="15">密码确认：</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd2" onblur="checkPassword();"></td>
											</tr>
				
										</table>

										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
												<td colspan="16">请在下面选择你组队的队友吧！如果没有发现你的队友，请提醒他赶快注册校赛个人信息！请仔细核对姓名和学号是否一致！</td>
											</tr>
											<?php for($i=0; $i<mysql_num_rows($result);)
											{
												$count=4;
												
											?>
											  <tr>
												<?php
													for($j=0; $j<$count; ++$j)
													{
														if($i + $j >= mysql_num_rows($result))
															break;
														if (mysql_data_seek($result, $i+$j) && ($row = mysql_fetch_assoc($result)))
														{
															echo "<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$row[stuNum]\">$row[name][$row[stuNum]]</td>";
															echo "<td>&nbsp;&nbsp;</td>";
														}
													}
													$i += $count;
												?>
											  </tr>
											 <?php }
											 ?>											
										</table>
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td height="25" align="center"><input type="submit" value="下一步" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置" class="radio" ></td>
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