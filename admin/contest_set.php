<?php
	session_start();
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();  
	
	$id = $_GET["id"];
	$sql="select * from content WHERE id = '$id'";
	$mysql->query($sql);
	$row = $mysql->fetch_array($result);
	
	
	if($_POST['ok'])
	{
		$problems = $_POST[problems];
		$joins = $_POST[joins];
		$ac = array();
		$time = mktime();
		
		for($i='a', $j=1; $i<='j'; $i++, $j++)
			$ac[$j] = $_POST[$i];
		
		//������������Ϣ���뵽���ݿ�contestset��
		$sql = "INSERT INTO contestset (id, problems, joins, problemAac, problemBac, problemCac, problemDac, problemEac, problemFac, problemGac, problemHac, problemIac, problemJac, date) VALUES ('$id', '$problems', '$joins', '$ac[1]', '$ac[2]', '$ac[3]', '$ac[4]', '$ac[5]', '$ac[6]', '$ac[7]', '$ac[8]', '$ac[9]', '$ac[10]', '$time')";
		$mysql->query($sql);
		
		//�޸�content�е�status����ʾ�ñ����Ѿ����ú�
		$sql = "UPDATE content SET status='1' WHERE id='$id'";
		$mysql->query($sql);
		
		//��contestscore�н����м�ѵ�ʸ���Ա��ͳ�ֱ��������д
		$sql="select * from user WHERE userTrain = '1'";
		$result = $mysql->query($sql);
		while($data = $mysql->fetch_array($result))
		{
			$userNo = $data[userNo];
			$sql = "INSERT INTO contestscore (gid, userNo) VALUES ('$id', '$userNo')";
			$mysql->query($sql);			
		}
		
		alter("�������óɹ�����֪ͨ������Ա��24Сʱ֮��ͳ�Ʒ���������ôα������ּ�Ϊ0", "contest_manage.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GBK2312" />
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
				<h3>���ñ�����Ϣ</h3>
				<div class="clear"></div>
		    </div>
		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="<?php echo $PHP_SELF; ?>" method= "post">
						<table >
						<tr><td colspan="2" style="text-align:center"><label>������Ϣ</label></td></tr>
						<tr>
							<td width="30%" style="text-align:right">�������⣺</td>
							<td width="70%" style="text-align:left"><?php echo $row[title];?></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">�������ӣ�</td>
							<td width="70%" style="text-align:left"><?php echo $row[url];?></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">��ʼʱ�䣺</td>
							<td width="70%" style="text-align:left"><?php echo $row[start];?></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">����ʱ�䣺</td>
							<td width="70%" style="text-align:left"><?php echo $row[end];?></td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">�������ͣ�</td>
							<td width="70%" style="text-align:left"><?php echo $row[type];?></td>
						</tr>		
						
						<tr><td colspan="2" style="text-align:center"><label>��ú�����������Ϣ�ɣ�</label></td></tr>	
						<tr>
							<td width="30%" style="text-align:right"> ������Ŀ����</td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"problems\" >";
								for($problems=1; $problems<=10; $problems++)
								{
									echo	"<option value=\"$problems\">$problems</option>";
								}
								echo "</select>";
							
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right"> ����������</td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"joins\" >";
								for($joins=1; $joins<=888; $joins++)
								{
									echo	"<option value=\"$joins\">$joins</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿA(1)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"a\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿB(2)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"b\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿC(3)ͨ��������</td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"c\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿD(4)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"d\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿE(5)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"e\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿF(6)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"f\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿG(7)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"g\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿH(8)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"h\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿI(9)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"i\" >";
								for($i=0; $i<=888; $i++)
								{
									echo	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">��ĿJ(10)ͨ�������� </td>
							<td width="70%" style="text-align:left">
							<?php 
								echo "<select class=\"small-input\" name=\"j\" >";
								for($i=0; $i<=888; $i++)
								{
									echo 	"<option value=\"$i\">$i</option>";
								}
								echo "</select>";
							?>
							</td>
						</tr>	
						<tr><td colspan="2" style="text-align:center; color:#F00"><label>ע�⣺���ϸ���˳��������Ŀͨ��������������ʣ�µ���Ŀ����������ʾ0���ɡ�</label></td></tr>	
						
						<tr>
							<td colspan="2" style="text-align:center"><input class="button"  type = "submit" name="ok" value="ȷ��" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
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