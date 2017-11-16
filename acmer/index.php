<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
  	$mysql = new MySql();
	$sql = "SELECT * FROM `set`";
	$result=$mysql->query($sql);
	$row = $mysql->fetch_array($result);
	
	$nums = $mysql->num_rows($mysql->query("SELECT * FROM contestscore WHERE status <> '2'"));

	$sql = "SELECT * FROM `user` WHERE userTrain = '1' AND userJoinYear = '$row[trainyear]' order by userRank asc";
	$result1=$mysql->query($sql);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>��ɳ����ѧACMoreϵͳ</title>
<script type="text/javascript" src="../js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
<style type="text/css">
td{
	border:2px solid RGB(194,208,182);
	text-align:center;
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
					<h2 class="title">��ɳ����ѧ<?php echo $row[trainyear];?>����ټ�ѵ��Ա����</h2>
					<p class="byline"></p>
					<div class="entry">
						<?php if($nums >= 1){ ?>
						<p style="color:RGB(214,71, 12); text-align:center">��ʾ�����ж�Աû���ύ�����ɼ������߹���Ա���ύ�Ĳ��ֶ�Ա�ɼ�δ��ˣ������������ο�</p>
						<?php } ?>
						<table style="border-collapse:collapse; margin:0 auto;width:98%">
							<tr>
								 <td>����</td>
								 <td>ѧ��</td>
								 <td>רҵ</td>
								 <td>�绰</td>
								 <td>��������֮��</td>
								 <td>����ɾ�</td>
								 <td>����</td>
								 <td>��ϸ����</td>
							</tr>
							<?php
								$rank = 1;
							   while ($date = $mysql->fetch_array($result1))
							   {

							?>
							<tr>
								 <td><?php echo $date[userName]; ?></td>
								 <td><?php echo $date[userNo]; ?></td>
								 <td><?php echo $date[userMajor]; ?></td>
								 <td><?php echo $date[userTel]; ?></td>
								 <td><?php echo $date[userRank]; ?></td>
								 <td>
								 <?php
									if(1 == $rank)
									{
										echo "<img src=\"../images/medal_gold.png\" alt=\"����\" />";
									}
									elseif(2 == $rank)
									{
										echo "<img src=\"../images/medal_silver.png\" alt=\"����\" />";
									}
									elseif(3 == $rank)
									{
										echo "<img src=\"../images/medal_bronze.png\" alt=\"ͭ��\" />";
									}
									elseif($rank >=4 && $rank <= 15)
									{
										echo "<img src=\"../images/medal-iron.png\" alt=\"����\" />";
									}
									else
									{
										echo "<img src=\"../images/smiley-cry.png\" alt=\"����\" />";
									}
								 ?>
								 </td>
								 <td><?php echo $rank++; ?></td>
								 <td>
									<a href="acmer_detail.php?stuNum=<?php echo $date[userNo]; ?>" title="����"><img src="../images/present.png" alt="����" /></a>							 
								 </td>
							</tr>

							<?php } ?>
						</table>
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