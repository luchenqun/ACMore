<?php
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$pagesize=5;    //����ÿҳ��ʾ��¼��Ŀ
	
	$page=$_GET["page"];
	$type=$_GET["type"];
	
	$mysql->getPage('blog', '', "where blogtype = '$type' order by blogviews desc", $pagesize);

	if(!$page||$page<1)
	{
	    $page=1;
	}
    elseif($page>$mysql->pageAll)
    {
		$page=$mysql->pageAll;
    }
	
	$offset=($page-1)*$pagesize;
	$sql="select * from blog where blogtype = '$type' order by blogviews desc limit $offset,$pagesize";
	$result=$mysql->query($sql);    //ִ�����
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>��ɳ����ѧACMoreϵͳ</title>
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
				<h3>�Ķ����а�</h3>
				<?php
					$sql = "select * from blog order by blogviews desc LIMIT 0, 20";
					$res=$mysql->query($sql);
					while($row_rank = $mysql->fetch_array($res)){
				?>
				<p><a href="blog_detail.php?id=<?php echo $row_rank[blogid] ?>"><?php echo $row_rank[blogtitle]; ?></a><span>&nbsp;[<?php echo $row_rank[blogviews]; ?>]</span></p>
				<?php
				}
				?>
				<div id="gadget-end">&nbsp;</div>				
			</div>
			
			<div id="gadget">
				<div id="gadget-begin">&nbsp;</div>
				<h3>�û��������а�</h3>
				<?php
					$sql = "select * from user order by userArticles desc LIMIT 0, 12";
					$res_user=$mysql->query($sql);
					while($row_user = $mysql->fetch_array($res_user)){
				?>
				<p><a href="blog_author.php?author=<?php echo $row_user[userNo] ?>"><?php echo $row_user[userName]; ?></a><span>&nbsp;(��<?php echo $row_user[userArticles]; ?>ƪ����)</span></p>
				<?php
				}
				?>
				<div id="gadget-end">&nbsp;</div>				
			</div>				
			
			<div id="gadget">
				<div id="gadget-begin">&nbsp;</div>
				<h3>���·���</h3>
				<?php
					$sql_type = "SELECT * FROM `set_type`";
					$result_type=$mysql->query($sql_type);
					while ($row_type = $mysql->fetch_array($result_type))
					{
				
				?>
				<p><a href="blog_type.php?type=<?php echo $row_type['type_name'];?>"><?php echo $row_type['type_name'];?></a></p>					
				<?php
					}
				?>
				<div id="gadget-end">&nbsp;</div>				
			</div>
		</div>
		<div id="content">
			<?php
			    while($row=$mysql->fetch_array($result))//ѭ�������array ����ֱ������ֶΣ���row�Ĳ�֮ͬ��
			    {
					$sql1 = "SELECT* FROM `user` WHERE userNo = '$row[blogauthor]'";
					$result1 = $mysql->query($sql1);
					$data = $mysql->fetch_array($result1);
			?>
				<div class="post">
					<div class="ct"><div class="l"><div class="r"></div></div></div>
						<h2 class="title"><a href="blog_detail.php?id=<?php echo $row[blogid] ?>"><?php echo $row[blogtitle]; ?></a></h2>
						<p class="byline">����ʱ��:<?php echo $row[blogdate]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										  ������:<a href="blog_author.php?author=<?php echo $row[blogauthor]; ?>"><?php echo $data[userName]; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										  ��ǩ:<a href="blog_type.php?type=<?php echo $row[blogtype]; ?>"><?php echo $row[blogtype]; ?></a>
						</p>
						<div class="entry">
							<blockquote>
								<?php
									echo strip_tags(substr(($row[blogcontent]), 0, 201)) . "......";
								?>
							</blockquote>
						</div>
						<p class="endline"><a href="blog_detail.php?id=<?php echo $row[blogid] ?>">�Ķ�ȫ��</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ���Ĵ���:(<?php echo $row[blogviews]; ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
	<div id="footer"><?php include("../include/foot.php"); ?></div>
</body>
</html>