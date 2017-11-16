<?php
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$pagesize=5;    //设置每页显示记录数目
	
	$page=$_GET["page"];
	$type=$_GET["type"];
	
	$mysql->getPage('fileinfo', '', "where fileclassify  = '$type' order by filecount  desc", $pagesize);

	if(!$page||$page<1)
	{
	    $page=1;
	}
    elseif($page>$mysql->pageAll)
    {
		$page=$mysql->pageAll;
    }
	
	$offset=($page-1)*$pagesize;
	$sql="select * from fileinfo where fileclassify  = '$type' order by filecount  desc limit $offset,$pagesize";
	$result=$mysql->query($sql);    //执行语句
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
				<h3>下载排行榜</h3>
				<?php
					$sql = "select * from fileinfo order by filecount desc LIMIT 0, 15";
					$res=$mysql->query($sql);
					while($row_rank = $mysql->fetch_array($res)){
				?>
				<p><a href="file_info.php?id=<?php echo $row_rank[fileid] ?>"><?php echo $row_rank[filename]; ?></a><span>&nbsp;[<?php echo $row_rank[filecount]; ?>]</span></p>
				<?php
				}
				?>

				<div id="gadget-end">&nbsp;</div>				
			</div>
			<div id="gadget">
				<div id="gadget-begin">&nbsp;</div>
				<h3>下载分类</h3>
				<?php
					$sql_type = "SELECT * FROM `set_type`";
					$result_type=$mysql->query($sql_type);
					while ($row_type = $mysql->fetch_array($result_type))
					{
				
				?>
				<p><a href="file_type.php?type=<?php echo $row_type['type_name'];?>"><?php echo $row_type['type_name'];?></a></p>					
				<?php
					}
				?>
				<div id="gadget-end">&nbsp;</div>				
			</div>
		</div>
		<div id="content">
			<div class="post">
				<div class="ct"><div class="l"><div class="r"></div></div></div>
					<h2 class="title">资料下载</h2>
					<?php while ($row = $mysql->fetch_array($result))
					{
							$sql1 = "SELECT* FROM `user` WHERE userNo = '$row[fileauthor]'";
							$result1 = $mysql->query($sql1);
							$data = $mysql->fetch_array($result1);
					?>
					<p class="byline"></p>
					<div class="entry">
						<h4><a href="../file/file_info.php?id=<?php echo $row[fileid]; ?>" target="_blank"><?php echo $row[filename]; ?></a></h4>
						<p>文件分类:<?php echo $row[fileclassify]; ?>&nbsp;|&nbsp;上传人：<?php echo $data[userName]; ?>&nbsp;|&nbsp;上传时间:<?php echo $row[filedate] ?> &nbsp;|&nbsp;下载次数：<?php echo $row[filecount] ?></p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;资料描述：<?php echo $row[filedesc] ?></p>
					</div>
					<?php
					}
					?>
					
					<div class="pagination"><?php echo $mysql->showPage();?></div>
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