<?php
	session_start();
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$pagesize=5;    //����ÿҳ��ʾ��¼��Ŀ
	$mysql->getPage('contest', '', "order by id desc", $pagesize);

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
	$sql="select * from contest order by id desc limit $offset,$pagesize";
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
td{
	font-size: 16px;
	border:1px solid RGB(194,208,182);
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
					<h2 class="title">��ɳ����ѧ2012�������Ϣ����</h2>
					<p class="byline"></p>
					<p>&nbsp;</p>
						<div class="entry">
							<table style="border-collapse:collapse; margin:0 auto; width:96%; ">
							<?php while($row = $mysql->fetch_array($result))
							{
							?>
								<tr><td style="text-align:center; " colspan="2"><label style="font-size:20px"><?php echo $row[title]; ?>(<?php echo $row[type]; ?>)</label></td></tr>
								<tr><td colspan="2"><a href="<?php echo $row[url]; ?>">������ַ��<?php echo $row[url]; ?></a></td></tr>
								<tr>
									<td>������ʼʱ�䣺<?php echo $row[start]; ?></td>
									<td>��������ʱ�䣺<?php echo $row[end]; ?></td>
								</tr>
								<tr><td colspan="2">��ǰ��ʾ��<?php echo $row[remark]; ?></td></tr>
								<?php if(1 == $row[status]){?>
								<tr><td colspan="2">��ʾ�����ڱ���8Сʱ������д���˱�����Ϣ�������涨ʱ�����Ա�����ݾ���������ٶ�Ա���û���</td></tr>
								<?php }?>
								<tr><td colspan="2">&nbsp;</td></tr>
							<?php
							}
							?>
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