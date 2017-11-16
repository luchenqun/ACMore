<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();
	
	$array = $_POST['checkbox'];
	$len = count($array);

	$teamName = check_team_name($_POST['teamName']);
	if($mysql->num_rows($mysql->query("SELECT * FROM `teaminfo` WHERE `teamName`= '$teamName'")) >= 1)
	{
		alert_back('\"' . $teamName . '\"�����Ѿ�����ע,��ʹ����������');
	}	
	$tel = check_tel($_POST['tel']);
	$pwd = check_pwd($_POST['pwd1'], $_POST["pwd2"], 6, 16);
	
	if($len == 0 || $len >= 4)
	{
		alert_back('��û��ѡ���Ա��ѡ��Ķ�Ա������3��');	
	}	
	
	for($i=0; $i<$len; $i++)
	{
		$sql="SELECT * FROM teaminfo";
		$result = $mysql->query($sql);
		while($row = $mysql->fetch_array($result))
		{
			if(strcmp($array[$i], $row[stuNum1]) == 0 || strcmp($array[$i], $row[stuNum2]) == 0 || strcmp($array[$i], $row[stuNum3]) == 0)
			{
				location("ѧ��Ϊ" . $array[$i]. "��ѧ���Ѿ���\"" . $row[teamName] . "\"����������ע��ʧ��", "regedit_guide.php");
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
							<h2 class="title">У�������Ϣע��</h2>
							<p class="byline"></p>
							<div class="entry">
								<blockquote>
									<form name="form1" action="team_info_save.php" method="post">
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<input type="hidden" name="len" value="<?php echo $len; ?>" />	
											<input type="hidden" name="teamName" value="<?php echo $teamName; ?>" />		
											<input type="hidden" name="tel" value="<?php echo $tel; ?>" />	
											<input type="hidden" name="pwd" value="<?php echo $pwd; ?>" />												
											<td colspan="2" align="center" height="15">Ϊ�˷�ֹ����ע�ᣬ����Ҫ�����Աע�������Ϣʱ��ע��ĸ������룬������һ��</td>
											</tr>
											
											<?php for($i=0; $i<$len; $i++){ ?>
											<tr>
											<input type="hidden" name="<?php echo 'stu' . $i; ?>" value="<?php echo $array[$i]; ?>" />
											<td align="right" width="50%" height="15"><?php echo $array[$i]; ?>��</td>
											<td align="left" width="50%"><input class="inputstyle" type="password" size="22" name="<?php echo 'pwd' . $i; ?>"></td>
											</tr>
											<?php } ?>
										</table>
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td height="25" align="center"><input type="submit" name = "ok" value="ȷ��" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="����" class="radio" ></td>
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