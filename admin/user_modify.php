<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql = "SELECT * FROM `user` WHERE userNo = '$_GET[userNo]'";
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<title>ACMore��̨��������</title>
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
	border:1;
}
</style>	
	
</head>
<body>
<div id="body-wrapper">
    <div id="main-content">
		<?php include("resources/includes/shutcut.php") ;?>
		<div class="content-box">
		    <div class="content-box-header">
				<h3>�༭�û�����</h3>
				<div class="clear"></div>
		    </div>

		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="user_save.php" method= "post">
						<table>
						<tr>
							<td style="text-align:right;">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ţ�</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userNo" value="<?php echo $row[userNo]; ?>"/></td>
							<td style="text-align:right;">��ʵ������</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userName" value="<?php echo $row[userName]; ?>"/></td>
						</tr>
						
						<tr>
							<td style="text-align:right;">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��</td>
							<td style="text-align:left;"><input type="radio" name="userSex" checked="checked" value="��"/>��&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="Ů" name="userSex" />Ů</td>
							<td style="text-align:right;">����֤�ţ�</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userID" value="<?php echo $row[userID]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">ѧ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ժ��</td>
							<td  style="text-align:left;">
								<select name="userCollege">		
									<?php
										if($row[userCollege] == '')
										{
											echo "<option value=\"====ѡ��ѧԺ====\">====ѡ��ѧԺ====</option>";
										}
										else
										{
											echo "<option value=\"$row[userCollege]\">$row[userCollege]</option>";
										}
									
									?>
									<option value="�������ͨ�Ź���ѧԺ">�������ͨ�Ź���ѧԺ</option>
									<option value="��ѧ������ѧѧԺ">��ѧ������ѧѧԺ</option>
									<option value="��������Ϣ����ѧԺ">��������Ϣ����ѧԺ</option>
									<option value="���������ѧԺ">���������ѧԺ</option>
									<option value="��ͨ���乤��ѧԺ">��ͨ���乤��ѧԺ</option>
									<option value="��ľ�뽨��ѧԺ">��ľ�뽨��ѧԺ</option>
									<option value="�������е����ѧԺ">�������е����ѧԺ</option>
									<option value="��Դ�붯������ѧԺ">��Դ�붯������ѧԺ</option>
									<option value="����˼����ѧԺ">����˼����ѧԺ</option>
									<option value="�ķ�ѧԺ">�ķ�ѧԺ</option>
									<option value="�������ѧԺ">�������ѧԺ</option>
									<option value="��������ӿ�ѧѧԺ">��������ӿ�ѧѧԺ</option>
									<option value="��ѧ�����﹤��ѧԺ">��ѧ�����﹤��ѧԺ</option>
									<option value="ˮ������ѧԺ">ˮ������ѧԺ</option>
									<option value="�����ѧԺ">�����ѧԺ</option>
									<option value="����ѧԺ">����ѧԺ</option>
								</select>							
							</td>								
							<td style="text-align:right;">ר&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ҵ��</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userMajor" value="<?php echo $row[userMajor]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userClass" value="<?php echo $row[userClass]; ?>"/></td>
							<td style="text-align:right;">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userTel" value="<?php echo $row[userTel]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q��</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userQQ" value="<?php echo $row[userQQ]; ?>"/></td>							
							<td style="text-align:right;">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userEmail" value="<?php echo $row[userEmail]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">OJ&nbsp;&nbsp;���ͣ�</td>
							<td  style="text-align:left;">
								<select name="userOJ">
									<?php
										if($row[userOJ] == '')
										{
											echo "<option value=\"---��ѡ���������OJ---\">---��ѡ���������OJ---</option>";
										}
										else
										{
											echo "<option value=\"$row[userOJ]\">$row[userOJ]</option>";
										}
									
									?>
																	
									<option value="POJ">POJ</option>
									<option value="HDU">HDU</option>
								</select>							
							</td>							
							<td style="text-align:right;">OJ&nbsp;&nbsp;�˺ţ�</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userOJName" value="<?php echo $row[userOJName]; ?>"/></td>						
						</tr>						

						<tr>
							<td style="text-align:right;">������ݣ�</td>
							<td  style="text-align:left;">
								<select name="userJoinYear">
									<?php
										if($row[userJoinYear] == '')
										{
											echo "<option value=\"---��ѡ����Ĳ������---\">---��ѡ����Ĳ������---</option>";
										}
										else
										{
											echo "<option value=\"$row[userJoinYear]\">$row[userJoinYear]</option>";
										}
									?>								
																
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>									
								</select>							
							</td>	
							<td style="text-align:right;">OJ&nbsp;&nbsp;���룺</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userOJPwd" value="<?php echo $row[userOJPwd]; ?>"/></td>						
						</tr>						
						
						<tr>
							<td style="text-align:right;">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</td>
							<td style="text-align:left;" colspan="3"><input class="text-input large-input" type="text" id="large-input" name="userSpecial" value="<?php echo $row[userSpecial]; ?>"/></td>					
						</td>
						
						<tr>
							<td style="text-align:right;">�������ԣ�</td>
							<td style="text-align:left;" colspan="3"><input class="text-input large-input" type="text" id="large-input" name="userDeclar" value="<?php echo $row[userDeclar]; ?>"/></td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:right;"><input class="button"  type = "submit" name="ok" value="�ύ" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td colspan="2" style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="button"  type = "reset"  name="cancel" value="����" />	</td>
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