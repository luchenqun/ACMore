<?php
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$sql="SELECT * FROM register";
	$result=$mysql->query($sql);    //ִ�����
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
							<h2 class="title">У�������Ϣע��</h2>
							<p class="byline"></p>
							<div class="entry">
								<blockquote>
									<form name="form1" action="team_info_next.php" method="post">
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td align="right" width="30%" height="15">����������</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="teamName"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*���������ɺ��֣���ĸ�����ֺ��»������)</label></td>
											</tr>
				
											<tr>
											<td align="right" width="30%" height="15">��ϵ�绰��</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="tel"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*У����Ϣ�Ĵ��ｫͨ�����ֻ�����)</label></td>
											</tr>
											
											<tr>
											<td align="right" width="30%" height="15">�������룺</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd1"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*����Ϊ6��16λ,���뽫��Ϊ��������ʹ��)</label></td>
											</tr>

											<tr>
											<td align="right" width="30%" height="15">����ȷ�ϣ�</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd2" onblur="checkPassword();"></td>
											</tr>
				
										</table>

										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
												<td colspan="16">��������ѡ������ӵĶ��Ѱɣ����û�з�����Ķ��ѣ����������Ͽ�ע��У��������Ϣ������ϸ�˶�������ѧ���Ƿ�һ�£�</td>
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
											<td height="25" align="center"><input type="submit" value="��һ��" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="����" class="radio" ></td>
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