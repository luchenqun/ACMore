<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();
	
	$stuNum = $_GET['stuNum'];
	$sql="SELECT * FROM register WHERE stuNum = '$stuNum'";
	$result=$mysql->query($sql);    //ִ�����
	$row = $mysql->fetch_array($result);
	
	if($_POST['modify'])
	{
		if(strcmp($row[pwd], $_POST['pwd']) != 0)
		{
			location("�������������ע��ʱ�ĸ�����Ϣ���벻һ�£���ֹ�޸ģ�", "person_info_show.php");
		}
		else
		{
			$name=check_name($_POST["name"], 2, 7);	
			$major=check_major($_POST["major"]);
			$tel=check_tel($_POST["tel"]);

			$sql = "UPDATE `register` SET `name`='$name', `college`='$_POST[college]', `major`='$major', `tel`='$tel' WHERE `stuNum`= '$stuNum'";
			$mysql->query($sql);
			if(1 == $mysql->affected_rows())
				location("�޸ĳɹ�", "person_info_show.php");
			else
				location("�޸�ʧ�ܣ�������", "person_info_show.php");
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
							<h2 class="title">У��������Ϣ�޸�</h2>
							<p class="byline"></p>
							<div class="entry">
								<blockquote>
									<form name="form1" action="<?php echo $PHP_SELF; ?>" method="post">
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td align="right" width="30%" height="15">ѧ�ţ� </td>
											<td align="left" width="70%">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[stuNum]; ?> </td>
											</tr>

											<tr>
											<td align="right" width="30%" height="15">������</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="name" value="<?php echo $row[name]; ?>"></td>
											</tr>
											
											<tr>
											<td align="right" width="30%" height="15"> ����Ժϵ��</td>
												<td align="left" width="70%">
													<select  class="inputstyle" name="college">
													<?php echo "<option value=\"$row[college]\">$row[college]</option>"; ?>
													<option value="�������ͨ�Ź���ѧԺ">�������ͨ�Ź���ѧԺ</option>
													<option value="��ѧ������ѧѧԺ">��ѧ������ѧѧԺ</option>
													<option value="��������Ϣ����ѧԺ">��������Ϣ����ѧԺ</option>
													<option value="���������ѧԺ">���������ѧԺ</option>
													<option value="��ͨ���乤��ѧԺ">��ͨ���乤��ѧԺ</option>
													<option value="��ľ�뽨��ѧԺ">��ľ�뽨��ѧԺ</option>
													<option value="�������е����ѧԺ">�������е����ѧԺ</option>
													<option value="��Դ�붯������ѧԺ">��Դ�붯������ѧԺ</option>
													<option value="���˼����ѧԺ">���˼����ѧԺ</option>
													<option value="�ķ�ѧԺ">�ķ�ѧԺ</option>
													<option value="�������ѧԺ">�������ѧԺ</option>
													<option value="��������ӿ�ѧѧԺ">��������ӿ�ѧѧԺ</option>
													<option value="��ѧ�����﹤��ѧԺ">��ѧ�����﹤��ѧԺ</option>
													<option value="ˮ������ѧԺ">ˮ������ѧԺ</option>
													<option value="�����ѧԺ">�����ѧԺ</option>
													<option value="����ѧԺ">����ѧԺ</option>
													 </select>
												 </td>
											</tr>

											<tr>
											<td align="right" width="30%" height="15">��ѧרҵ��
											</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="major" value="<?php echo $row[major]; ?>"></td>
											</tr>
											<tr>
											<td align="right" width="30%" height="15">��ϵ�绰��</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="tel" value="<?php echo $row[tel]; ?>"></td>
											</tr>
											<tr>
											<td align="right" width="30%" height="15">���룺</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(��������ע�������Ϣʱע������룬��ֹ�����޸�)</label></td>
											</tr>
											<tr>
											<td colspan="2" height="25" align="center"><input type="submit" value="ȷ���޸�" class="radio" name="modify"></td>
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
