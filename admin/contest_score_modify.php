<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();
	$id = $_GET[id];
	$gid = $_GET[gid];
	$sql="select * from contestscore where id = '$id'";
	$result=$mysql->query($sql);    //ִ�����
	$data = $mysql->fetch_array($result);
	
	if($_POST['ok'])
	{
		$time = date("Y-m-d H:i:s");
		$sql = "UPDATE `contestscore` SET `status` = '2', `sloves` = '$_POST[sloves]', `rank` = '$_POST[rank]', `remark` = '$_POST[remark]', `date` = '$time' WHERE `id` = '$id'";
		$mysql->query($sql);
		
		//��ȡ�û����������������뵽�û���user�е�rank��
		$rankres = $mysql->fetch_assoc($mysql->query("SELECT SUM(rank) sum FROM contestscore where userNo = '$data[userNo]'"));
		$rank = $rankres['sum'];
		$sql = "UPDATE `user` SET `userRank` = '$rank' WHERE userNo = '$data[userNo]'";
		$mysql->query($sql);
		
		location("��Ϊ���û������Ϣ", "contest_score_examine.php?id=$gid");
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
				<h3>��д�û�������Ϣ</h3>
				<div class="clear"></div>
		    </div>
		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="<?php echo $PHP_SELF; ?>" method= "post">
						<table >
						<tr>
							<td width="30%" style="text-align:right">�˺ţ�</td>
							<td width="70%" style="text-align:left"><?php echo $data[userNo];?></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">������</td>
							<td width="70%" style="text-align:left">
							<?php
								$sql="select * from user where userNo = '$data[userNo]'";
								$result=$mysql->query($sql);    //ִ�����
								$row = $mysql->fetch_array($result);
								echo $row[userName];
							?>
							</td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">ͨ����Ŀ����</td>
							<td width="70%" style="text-align:left"><input class="text-input small-input" type="text" id="small-input" name="sloves"/></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">����������</td>
							<td width="70%" style="text-align:left">
								<input class="text-input small-input" type="text" id="small-input"  name="rank"/>
								<?php
									$rank = 0;
									$count = 0;

									$sql="select * from contestscore where userNo = '$data[userNo]' and status = '2'";
									$result=$mysql->query($sql);    //ִ�����
									while($row = $mysql->fetch_array($result))
									{
										$rank += $row[rank];
										$count++;
									}
									if($count > 0)
										echo "&nbsp;&nbsp;&nbsp;&nbsp;(��ѧ���� ". $count . " �α�����ƽ������Ϊ" . ceil($rank / $count) . ")";
									else
										echo "&nbsp;&nbsp;&nbsp;&nbsp;(��ѧ�����ޱ������μ�¼)";
								?>
							</td>
						</tr>								
						<tr>
							<td width="30%" style="text-align:right">��ע��</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="remark"/></td>
						</tr>							
						<tr>
							<td colspan="2" style="text-align:center"><input class="button"  type = "submit" name="ok" value="ȷ����д" /></td>
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