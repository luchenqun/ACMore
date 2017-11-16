<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	
	if($_POST['ok'])
	{
		$sql = "INSERT INTO `contest` (`id`, `title`, `url`, `start`, `end`, `type`, `remark`) VALUES (NULL, '$_POST[title]', '$_POST[url]', '$_POST[start]', '$_POST[end]', '$_POST[type]' ,'$_POST[remark]')";
		$mysql->query($sql);
		
		$row = $mysql->getRs('contest', 'id', 'order by id desc');
		$id = $row[id];
		
		//在contestscore中建立有集训资格人员的统分表格，由其填写
		$sql="select * from user WHERE userTrain = '1'";
		$result = $mysql->query($sql);
		while($data = $mysql->fetch_array($result))
		{
			$userNo = $data[userNo];
			$sql = "INSERT INTO contestscore (gid, userNo) VALUES ('$id', '$userNo')";
			$mysql->query($sql);			
		}
		
		alter("比赛发布成功！请在比赛之后及时提醒集训队员填写比赛个人信息", "contest_manage.php");
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GBK2312" />
	<title>ACMore后台管理界面-发布比赛</title>
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
				<h3>发布一个比赛</h3>
				<div class="clear"></div>
		    </div>
		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="contest_add.php" method= "post">
						<table >
						<tr>
							<td width="30%" style="text-align:right">比赛标题：</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="title"/></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">比赛链接：</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="url"/></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">开始时间：</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="start"/></td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">结束时间：</td>
							<td width="70%" style="text-align:left"><input class="text-input medium-input" type="text" id="medium-input" name="end"/></td>
						</tr>	
						<tr>
							<td width="30%" style="text-align:right">比赛类型：</td>
							<td width="70%" style="text-align:left">
								<select name="type">
									<option value="集训个人赛">---请选择比赛类型---</option>;
									<option value="集训个人赛">集训个人赛</option>
									<option value="集训组队赛">集训组队赛</option>
								</select>
							</td>
						</tr>							
						<tr>
							<td width="30%" style="text-align:right">比赛说明：</td>
							<td width="70%" style="text-align:left"><textarea cols="100" rows="10"  name="remark"></textarea></td>
						</tr>							
						<tr>
							<td colspan="2" style="text-align:center"><input class="button"  type = "submit" name="ok" value="确认增加" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
