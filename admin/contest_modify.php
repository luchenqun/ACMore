<?php
	session_start();
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();  
	$id = $_GET["id"];
	$sql="select * from contest WHERE id = '$id'";
	$mysql->query($sql);
	$row = $mysql->fetch_array($result);
	
	if($_POST['ok'])
	{
		$sql = "UPDATE contest SET title='$_POST[title]', url='$_POST[url]', start='$_POST[start]', end='$_POST[end]', type='$_POST[type]', remark='$_POST[remark]' WHERE id='$id'";
		$mysql->query($sql);
		alter("������Ϣ�޸ĳɹ���", "contest_manage.php");
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore��̨�������-��������</title>
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
				<h3>�޸ı�����Ϣ</h3>
				<div class="clear"></div>
		    </div>
		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="<?php echo $PHP_SELF; ?>" method= "post">
						<table >
						<tr>
							<td width="30%" style="text-align:right">�������⣺</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" value="<?php echo $row[title];?>" name="title"/></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">�������ӣ�</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" value="<?php echo $row[url];?>" name="url"/></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">��ʼʱ�䣺</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" value="<?php echo $row[start];?>" name="start"/></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">����ʱ�䣺</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" value="<?php echo $row[end];?>" name="end"/></td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">�������ͣ�</td>
							<td width="70%" style="text-align:left">
								<select name="type">
									<option value="��ѵ������">---��ѡ���������---</option>;
									<option value="��ѵ������">��ѵ������</option>
									<option value="��ѵ�����">��ѵ�����</option>
								</select>
							</td>
						</tr>							
						<tr>
							<td width="30%" style="text-align:right">����˵����</td>
							<td width="70%" style="text-align:left"><textarea cols="100" rows="10"  name="remark"><?php echo $row[remark];?></textarea></td>
						</tr>							
						<tr>
							<td colspan="2" style="text-align:center"><input class="button"  type = "submit" name="ok" value="ȷ���޸�" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
