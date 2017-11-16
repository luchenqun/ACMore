<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
  	$mysql = new MySql();
	$userNo = $_GET['stuNum'];
	$sql = "SELECT * FROM `user` WHERE `userNo`='$userNo'";
	$result=$mysql->query($sql);
	$data = $mysql->fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>长沙理工大学ACMore系统</title>
<script type="text/javascript" src="../js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
<style type="text/css">
td{
	border:2px solid RGB(194,208,182);
}
</style>
</head>
<body>
    <div id="header"></div>
    <div id="menu"><?php include("../include/menu.php"); ?></div>
	
	<div id="main-content">
		<div id="sidebar">
		</div>
		<div id="content" style = "margin-left: 0px;">
			<div class="post">
				<div class="ct"><div class="l"><div class="r"></div></div></div>
					<h2 class="title">集训队员<?php echo $data[userName];?>详细资料</h2>
					<p class="byline"></p>
					<div class="entry">		
						<table style="border-collapse:collapse; margin:0 auto; width:96%; ">
							<tbody>
								<tr>
									<td  dataspan="1" colspan="4"  style="text-align:center;">
										<img style="float:none" src="<?php echo $data[userImage];?>" />
									</td>
								</tr>
								<tr>
									<td style="text-align:right;">
										姓名：
									</td>
									<td >
										<?php echo $data[userName];?>
									</td>
									<td style="text-align:right;">
										学号：
									</td>
									<td >
										<?php echo $data[userNo]; ?>
									</td>
								</tr>
								<tr>
									<td style="text-align:right;">
										性别：
									</td>
									<td >
										<?php echo $data[userSex]; ?>
									</td>
									<td style="text-align:right;">
										专业：
									</td>
									<td >
										<?php echo $data[userMajor]; ?>
									</td>
								</tr>
								<tr>
									<td style="text-align:right;">
										电话：
									</td>
									<td >
										<?php echo $data[userTel]; ?>
									</td>
									<td style="text-align:right;">
										班级：
									</td>
									<td >
										<?php echo $data[userClass]; ?>
									</td>
								</tr>
								<tr>
									<td style="text-align:right;">
										邮件：
									</td>
									<td >
										<?php echo $data[userEmail]; ?>
									</td>
									<td style="text-align:right;">
										Q&nbsp;&nbsp;Q：
									</td>
									<td >
										<?php echo $data[userQQ]; ?>
									</td>
								</tr>
								<tr>
									<td style="text-align:right;">
										学院：
									</td>
									<td >
										<?php echo $data[userCollege]; ?>
									</td>
									<td style="text-align:right;">
										班级：
									</td>
									<td >
										<?php echo $data[userClass]; ?>
									</td>
								</tr>
								
								<tr>
									<td style="text-align:right;">
										博文数：
									</td>
									<td >
										<?php echo $data[userArticles]; ?>
									</td>
									<td style="text-align:right;">
										OJ账号：
									</td>
									<td >
										<?php echo $data[userOJName]; ?>
									</td>
								</tr>								
								<tr>
									<td style="text-align:right;">
										所做OJ类型：										
									</td>
									<td >
										<?php echo $data[userOJ]; ?>
									</td>
									<td style="text-align:right;">
										OJ解题数：
									</td>
									<td >
										<?php echo $data[userSloves]; ?>
									</td>
								</tr>
								<tr>
									<td style="text-align:right;">
										比赛排名之和：
									</td>
									<td colspan="3">
										<?php echo $data[userRank]; ?>
									</td>
								</tr>								
								<tr>
									<td style="text-align:right;">特长：</td>
									<td colspan="3"><?php echo $data[userSpecial]; ?></td>
								</tr>
								<tr>
									<td style="text-align:right;">宣言：</td>
									<td colspan="3"><?php echo $data[userDeclar]; ?></td>
								</tr>								
							</tbody>
						</table>
						<br />
						<br />
						<br />
					</div>
					<p class="endline"></p>
					<p class="endline"></p>
				<div class="cb"><div class="l"><div class="r"></div></div>
				</div>
			</div>
		</div>
	</div>

	<div class="clear"></div>
	<div id="footer"><?php include("../include/foot.php"); ?></div>
</body>
</html>