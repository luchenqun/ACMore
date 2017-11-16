<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();

	$userNo = $_GET['userNo'];
	
	$sql = "SELECT * FROM `user` WHERE userNo = '$userNo'";
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);	
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
				<h3>�û���������</h3>
				<div class="clear"></div>
		    </div>

		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
						<table >
						<tr>
							<td>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ţ�&nbsp;<?php echo $row[userNo] ?></td>
							<td>��ʵ������<?php echo $row[userName]; ?></td>
						</tr>
						
						<tr>
							<td>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[userSex]; ?></td>
							<td>���֤�ţ�<?php echo $row[userID]; ?></td>
						</tr>
						
						<tr>
							<td>ѧ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ժ��<?php echo $row[userCollege];?></td>
							<td>ר&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ҵ��&nbsp;<?php echo $row[userMajor]; ?></td>
						</tr>
						
						<tr>
							<td>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;<?php echo $row[userClass]; ?></td>
							<td>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;<?php echo $row[userTel]; ?></td>
						</tr>
						
						<tr>
							<td>Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q��&nbsp;<?php echo $row[userQQ]; ?></td>
							<td>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;<?php echo $row[userEmail]; ?></td>
						</tr>
						
						<tr>
							<td>OJ&nbsp;&nbsp;���ͣ�<?php echo $row[userOJ];?></td>
							<td>OJ&nbsp;&nbsp;�˺ţ�&nbsp;<?php echo $row[userOJName]; ?></td>
						</tr>						

						<tr>
							<td>������ݣ�<?php echo $row[userJoinYear];?></td>
							<td>OJ&nbsp;&nbsp;���룺&nbsp;<?php echo $row[userOJPwd]; ?></td>
						</tr>						
						
						<tr>
							<td colspan="2">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����<?php echo $row[userSpecial]; ?></td>
						</td>
						
						<tr>
							<td colspan="2">�������ԣ�<?php echo $row[userDeclar]; ?></td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:center"><a href="user_modify.php?userNo=<?php echo $row[userNo];?>">�༭��������</a></td>
						</tr>
	
						</table>
				</div>
		    </div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
    </div>
</div>
</body>
</html>
