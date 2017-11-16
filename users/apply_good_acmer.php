<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	
	$sql = "SELECT * FROM `user` WHERE userNo = '$_SESSION[name]'";
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);	
	
	$sql = "SELECT * FROM `acmer` WHERE userNo = '$_SESSION[name]'";
	$result1 = $mysql->query($sql);
	$mysql->fetch_array($result1);
	
	if(1 == $mysql->affected_rows())
	{
		location("���Ѿ������˳�ɳ������ACMer,������༭״̬", "good_acmer_edit.php");
		exit();
	}
	
	if($_POST[ok])
	{
		$sql="INSERT INTO `acmer` (`userNo`, `story`, `address`, `company`, `salary`, `year`) VALUES ('$_SESSION[name]', '$_POST[story]', '$_POST[address]', '$_POST[company]', '$_POST[salary]', '$_POST[year]')";
		$mysql->query($sql);
		if(1 == $mysql->affected_rows())
		{
			location("�����ύ�ɹ�����ȴ�����Ա���", "right.php");
		}
		else
		{
			location("��������ԭ��δ���ύ�ɹ�������������дһ��", "apply_good_acmer.php");		
		}

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<title>ACMore��̨�������</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/right.css" type="text/css" media="screen" />
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
<style type="text/css">
td{
	font-size:16px;
}
</style>	
</head>
<body>
<div id="body-wrapper">
    <div id="main-content">
		<?php include("resources/includes/shutcut.php") ;?>
		<div class="content-box">
		    <div class="content-box-header">
				<h3>����ACMer����</h3>
				<div class="clear"></div>
		    </div>
		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="apply_good_acmer.php" method= "post">
						<table >
						<tr>
							<td width="30%"  style="text-align:right">�˺ţ�</td>
							<td width="70%" style="text-align:left"><?php echo $row[userNo]; ?></td>
						</tr>
						<tr>
							<td width="30%"  style="text-align:right">��ʵ������</td>
							<td width="70%"  style="text-align:left"><?php echo $row[userName]; ?></td>
						</tr>
						<tr>
							<td width="30%"  style="text-align:right">��ַ��</td>
							<td width="70%"  style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="address"/></td>
						</tr>
						<tr>
							<td width="30%"  style="text-align:right">��˾(ѧУ)��</td>
							<td width="70%"  style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="company"/></td>
						</tr>
						<tr>
							<td width="30%"  style="text-align:right">��н��</td>
							<td width="70%"  style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="salary"/></td>
						</tr>
						<tr>
							<td width="30%"  style="text-align:right">��ҵ(�Ͷ�)��ݣ�</td>
							<td width="70%"  style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="year"/></td>
						</tr>	
						<tr>
							<td width="30%"  style="text-align:right">ACMer�ɾͣ�</td>
							<td width="70%"  style="text-align:left"><textarea cols="100" rows="10"  name="story"></textarea></td>
						</tr>							
						<tr>
							<td width="30%" style="text-align:right"><input class="button"  type = "submit" name="ok" value="�ύ" /></td>
							<td width="70%" style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="button"  type = "reset"  name="cancel" value="����" /></td>
						</tr>
	
						</table>
					</form>
				</div>
		    </div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
    </div>
</div>
</body>
</html>
