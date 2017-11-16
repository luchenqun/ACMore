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
<title>长沙理工大学ACMore系统</title>
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
					<h2 class="title">长沙理工大学<?php echo $row[trainyear];?>年暑假集训队员名单</h2>
					<p class="byline"></p>
					<div class="entry">
						<?php if($nums >= 1){ ?>
						<p style="color:RGB(214,71, 12); text-align:center">提示：还有队员没有提交比赛成绩，或者管理员对提交的部分队员成绩未审核，总排名暂作参考</p>
						<?php } ?>
						<table style="border-collapse:collapse; margin:0 auto;width:98%">
							<tr>
								 <td>姓名</td>
								 <td>学号</td>
								 <td>专业</td>
								 <td>电话</td>
								 <td>比赛排名之和</td>
								 <td>所获成就</td>
								 <td>排名</td>
								 <td>详细资料</td>
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
										echo "<img src=\"../images/medal_gold.png\" alt=\"金牌\" />";
									}
									elseif(2 == $rank)
									{
										echo "<img src=\"../images/medal_silver.png\" alt=\"银牌\" />";
									}
									elseif(3 == $rank)
									{
										echo "<img src=\"../images/medal_bronze.png\" alt=\"铜牌\" />";
									}
									elseif($rank >=4 && $rank <= 15)
									{
										echo "<img src=\"../images/medal-iron.png\" alt=\"铁牌\" />";
									}
									else
									{
										echo "<img src=\"../images/smiley-cry.png\" alt=\"加油\" />";
									}
								 ?>
								 </td>
								 <td><?php echo $rank++; ?></td>
								 <td>
									<a href="acmer_detail.php?stuNum=<?php echo $date[userNo]; ?>" title="详情"><img src="../images/present.png" alt="详情" /></a>							 
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