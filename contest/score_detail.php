<?php
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$sql="select * from contest order by id desc";
	$result=$mysql->query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>长沙理工大学ACMore系统</title>
<script type="text/javascript" src="../js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
<style type="text/css">
</style>
</head>
<body>
    <div id="header"></div>
    <div id="menu"><?php include("../include/menu.php"); ?></div>
	
	<div id="main-content">
		<div id="sidebar">
			<div id="gadget">
				<div id="gadget-begin">&nbsp;</div>
				<h3>未提交比赛积分名单</h3>
				<p>请下列同学赶快提交比赛积分，否则通过规定的时间管理员审核后积分将记为0</p>
				<br />
				<?php
					$sql4="select * from contestscore where status = 0";
					$result4=$mysql->query($sql4);
					while($row_not_sub = $mysql->fetch_array($result4))
					{
				?>
				<p>
				<?php 
					$sql5 = "SELECT* FROM `user` WHERE userNo = '$row_not_sub[userNo]'";
					$result5=$mysql->query($sql5);
					$row5 = $mysql->fetch_array($result5);
					echo $row5[userName];
				?>
				</p>
				<?php
					}
				?>
				<div id="gadget-end">&nbsp;</div>				
			</div>
		</div>
		<div id="content">
			<?php
			    while($row=$mysql->fetch_array($result))
			    {
					$id = $row[id];
			?>
				<div class="post">
					<div class="ct"><div class="l"><div class="r"></div></div></div>
						<h2 class="title"><?php echo $row[title] . "积分统计";?></h2>
						<p class="byline"></p>
						<div class="entry">
							<table style="border-collapse:collapse; margin:0 auto; width:96%; text-align:center">
								<tr>
									<?php
										echo "<td>姓名</td>";
										echo "<td>AC数</td>";
										echo "<td>比赛排名</td>";
										echo "<td>最后修改时间</td>";
										echo "<td>状态</td>";							
										echo "<td>备注</td>";
								
									?>
								</tr>
							<?php
								$sql="select * from `contestscore` where gid='$id' order by rank asc";
								$result1 = $mysql->query($sql);
								while($data=$mysql->fetch_array($result1))
								{
									$sql2 = "SELECT* FROM `user` WHERE userNo = '$data[userNo]'";
									$result2 = $mysql->query($sql2);
									$data1 = $mysql->fetch_array($result2);
									echo "<tr>";
									echo "<td>" .$data1[userName] . "</td>";
									echo "<td>" .$data[sloves] . "</td>";	
									echo "<td>" .$data[rank] . "</td>";	
									echo "<td>" .$data[date] . "</td>";										
									if(0 == $data[status])
									{
										echo "<td style=\"color: RGB(214,71,41)\">未提交</td>";
									}
									elseif(1 == $data[status])
									{
										echo "<td style=\"color: RGB(41,71,255)\">待审核</td>";
									}
									elseif(2 == $data[status])
									{
										echo "<td>已通过</td>";
									}
									echo "<td>$data[remark]&nbsp;</td>";
									echo "</tr>";
								}
							?>								
							</table>
						</div>
						<p class="endline"></p>
					<div class="cb"><div class="l"><div class="r"></div></div></div>
				</div>
			<?php
				}
			?>
		</div>
	</div>
	<div class="clear"></div>
	<div id="footer"><?php include("../include/foot.php"); ?></div>
</body>
</html>