<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql="select * from user";
	$result=$mysql->query($sql);    //ִ�����
	
	if($_POST[ok])
	{
		$array = $_POST['checkbox'];
		$len = count($array);

		for($i=0; $i<$len; $i++)
		{
			$sql = "UPDATE user SET userTrain = '1' WHERE userNo = '$array[$i]'";
			$mysql->query($sql);
		}
		
		alter("��Ա���ӳɹ�", "train_add.php");
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
		background:RGB(243, 243, 243);
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
				<h3>��ѵ��Ա��������</h3>
				<div class="clear"></div>
		    </div>

		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >	
					<form id = "form" name = "form" action="train_add.php" method= "post">
						<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center; background:RGB(243, 243, 243);">	
							<tr>
								<td colspan="16">��ѡ��ѵ��Ա��������,�����Ҫȡ��ĳ����Ա��ѵ�ʸ����������<img src="resources/images/icons/cross.png" /></td>
							</tr>
							<?php for($i=0; $i<mysql_num_rows($result);)
							{
								$count=3;
							?>
							  <tr>
								<?php
									for($j=0; $j<$count;)
									{
										if($i + $j >= mysql_num_rows($result))
											break;
										if (mysql_data_seek($result, $i+$j) && ($row = mysql_fetch_assoc($result)))
										{
											if($row[userTrain] == 1 )
											{
												$j++;
												echo "<td>$row[userName][$row[userNo]]<a href=\"train_cancel.php?userNo=$row[userNo]\" title=\"ȡ����ѵ�ʸ�\" onclick=\"if(confirm('ȷʵҪȡ���ö�Ա�ļ�ѵ�ʸ���')) return true;else return false; \" ><img src=\"resources/images/icons/cross.png\" alt=\"Delete\" /></a></td>";
												echo "<td>&nbsp;&nbsp;</td>";
											}
											else
												$i++;
										}
									}
									$i += $count;
								?>
							  </tr>
							 <?php 
							 }
							 ?>		
							 
							<tr><td colspan="16" style="background:RGB(255, 255, 255);">&nbsp;</td></tr>
							 
							<tr>
								<td colspan="16">��������ѡ��ѵ��Ա�����û�з��ֶ�Ա����Ϊ��<a href="train_account_add.php">�����˺�</a></td>
							</tr>
							<?php for($i=0; $i<mysql_num_rows($result);)
							{
								$count=3;
							?>
							  <tr>
								<?php
									for($j=0; $j<$count;)
									{
										if($i + $j >= mysql_num_rows($result))
											break;
										if (mysql_data_seek($result, $i+$j) && ($row = mysql_fetch_assoc($result)))
										{
											if($row[userTrain] == 0 )
											{
												$j++;
												echo "<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$row[userNo]\">$row[userName][$row[userNo]]</td>";
												echo "<td>&nbsp;&nbsp;</td>";
											}
											else
												$i++;
										}
									}
									$i += $count;
								?>
							  </tr>
							 <?php 
							 }
							 ?>		
							<tr>
								<td  colspan="16" style="text-align:center"><input class="button"  type = "submit" name="ok" value="ȷ��" /></td>
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
