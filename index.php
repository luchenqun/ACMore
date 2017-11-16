<?php
	require_once("include/mysql.inc.php");
	$mysql = new MySql();
	$pagesize=5;    //设置每页显示记录数目
	$mysql->getPage('notification', '', 'order by id desc', $pagesize);

	$page=$_GET["page"];
	
	if(!$page||$page<1)
	{
	    $page=1;
	}
    elseif($page>$mysql->pageAll)
    {
		$page=$mysql->pageAll;
    }
	
	$offset=($page-1)*$pagesize;
	$sql="select * from notification order by id desc limit $offset,$pagesize";
	$result=$mysql->query($sql);    //执行语句
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>长沙理工大学ACMore系统</title>
<link rel="shortcut icon" href="favicon.ico" /> 
<script type="text/javascript" src="js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="styles/globle.css"/>
</head>
<body>
    <div id="header"></div>
    <div id="menu"><?php include("include/menu.php"); ?></div>
	
	<div id="main-content">
		<div id="sidebar">
			<div id="gadget">
				<div id="gadget-begin">&nbsp;</div>
				<h3>通知阅读排行榜</h3>
				<?php
					$sql = "select * from notification order by readtimes desc LIMIT 0, 20";
					$res_rd=$mysql->query($sql);
					while($row_notice = $mysql->fetch_array($res_rd)){
				?>
				<p><a href="inform/detailInform.php?id=<?php echo $row_notice[id] ?>"><?php echo $row_notice[title]; ?></a><span>&nbsp;[<?php echo $row_notice[readtimes]; ?>]</span></p>
				<?php
				}
				?>
				<div id="gadget-end">&nbsp;</div>				
			</div>		
		</div>
		<div id="content">
			<?php
				$count = 0;
			    while($row=mysql_fetch_array($result))//循环输出，array 可以直接输出字段，和row的不同之处
			    {
					++$count;				
			?>
				<div class="post">
					<div class="ct"><div class="l"><div class="r"></div></div></div>
						<h2 class="title"><a href="inform/detailInform.php?id=<?php echo $row[id] ?>"><?php echo $row[title]; ?><?php if($count <= 3) echo "<sup style=\"color:RGB(214,71,41)\">new!</sup>"; ?></a></h2>
						<p class="byline">发表时间:<?php echo $row[date]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 发表人:<?php echo $row[author]; ?></p>
						<div class="entry">
							<blockquote>
								<?php
									echo strip_tags(substr(($row[content]), 0, 200)) . "......";
								?>
							</blockquote>
						</div>
						<p class="endline"><a href="inform/detailInform.php?id=<?php echo $row[id] ?>">阅读全文</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 阅读次数:(<?php echo $row[readtimes]; ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
					<div class="cb"><div class="l"><div class="r"></div></div></div>
				</div>
			<?php
				}
			?>
			<?php if($mysql->pageAll > 1) {
			?>	
				<div class="post">
					<div class="ct"><div class="l"><div class="r"></div></div></div>
						<div class="entry">
							<div class="pagination"><?php echo $mysql->showPage();?></div>
						</div>
					<div class="cb"><div class="l"><div class="r"></div></div></div>
				</div>
			<?php
				}
			?>
		</div>
	</div>
	<div class="clear"></div>
	<div id="footer"><?php include("include/foot.php"); ?></div>
</body>
</html>