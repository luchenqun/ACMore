<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql = "SELECT * FROM `user` WHERE userNo = '$_SESSION[name]'";
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);	
	$userNo = $row[userNo];
	
	if($_POST['ok'])
	{
		if(strcmp($row[userPwd], $_POST[userPwd]) != 0)
		{
			alter("ԭʼ���������������ȷ��ԭʼ���룡�����޸�ʧ�ܣ�", "info_pwd.php");
		}
		else
		{
			if(strcmp($_POST[newPwd1], $_POST[newPwd2]) != 0)
			{
				alter("�������������벻һ�£������޸�ʧ�ܣ�", "info_pwd.php");
			}
			else
			{
				$sql="UPDATE user SET userPwd = '$_POST[newPwd1]' WHERE userNo = '$userNo'";
				$mysql->query($sql);
				if(1 == $mysql->affected_rows())
				{
					unset($_SESSION['name']);
					unset($_SESSION['pass']);
					echo "<script>alert('�����޸ĳɹ��������µ�¼');window.top.location.href = 'index.php';;</script>";	
				}
				else
				{
					alter("���ݿ��޸��������ٳ��ԣ�", "info_pwd.php");
				}
			}
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
				<h3>�����޸�</h3>
				<div class="clear"></div>
		    </div>

		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="info_pwd.php" method= "post">
						<table >
						<tr>
							<td style="text-align:center">ԭʼ���룺<input class="text-input small-input" type="password" id="small-input" name="userPwd"/></td>					
						</tr>
						
						<tr>
							<td style="text-align:center">�µ����룺<input class="text-input small-input" type="password" id="small-input" name="newPwd1" /></td>
						</tr>
						
						<tr>
							<td style="text-align:center">ȷ�����룺<input class="text-input small-input" type="password" id="small-input" name="newPwd2" /></td>
						</tr>
						
						<tr>
							<td style="text-align:center"><input class="button"  type = "submit" name="ok" value="�����޸�" /></td>
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
