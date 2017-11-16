<?php
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$sql="select * from teaminfo";
	$result=$mysql->query($sql);    //执行语句
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GBK2312"/>
<title>长沙理工大学ACMore系统</title>
<script type="text/javascript" src="../js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
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
					<h2 class="title">长沙理工大学第七届程序设计大赛组队报名信息</h2>
					<p class="byline"></p>
					<div class="entry">
						<table style="border-collapse:collapse; margin:0 auto; width:90%;  text-align:center">
							<tr>
								 <td>队名</td>
								 <td>人数</td>
								 <td>队员1</td>
								 <td>队员2</td>
								 <td>队员3</td>
								 <td>电话</td>								 
								 <td>操作</td>
							</tr>
							<?php
								while($data = $mysql->fetch_array($result)){
							?>
							<tr>
								 <td><?php echo $data[teamName]; ?></td>
								 <td><?php echo $data[num]; ?></td>								 
								 <td><?php echo $data[stuNum1]; ?></td>
								 <td><?php echo $data[stuNum2]; ?></td>
								 <td><?php echo $data[stuNum3]; ?></td>								 
								 <td><?php echo $data[tel]; ?></td>
								 <td>
									<a href="team_info_delete.php?teamName=<?php echo $data[teamName]; ?>" title="删除" ><img src="../images/cross.png" alt="Delete" /></a>							 
								 </td>
							</tr>

							<?php } ?>
						</table>												
					</div>
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