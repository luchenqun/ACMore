<?php
	session_start();
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$pagesize=5;    //设置每页显示记录数目
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
	$result=$mysql->query($sql);    //执行语句
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore后台管理-比赛管理</title>
	<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/right.css" type="text/css" media="screen" />
	<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
	<script type="text/javascript" src="resources/scripts/facebox.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
</head>
<body>
<div id="body-wrapper">
    <div id="main-content">
		<?php include("resources/includes/shutcut.php") ;?>
	
		<div class="content-box">
		    <div class="content-box-header">
				<h3>比赛管理</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					  <table>
					  
						<thead>
						  <tr>
							<th>标题</th>
							<th>开始时间</th>
							<th>结束时间</th>
							<th>操作</th>
						  </tr>
						</thead>
						
						<tfoot>
						  <tr>
							<td colspan="6">
							    <div class="pagination">
								<?php
									echo $mysql->showPage();
								?>
								</div>
							  <!-- End .pagination -->
							  <div class="clear"></div>
							</td>
						  </tr>
						</tfoot>
						
						<tbody>
						<?php while ($row = $mysql->fetch_array($result))
						{
						?>
						  <tr>
							<td><a href="../contest/index.php" target="_blank"><?php echo $row[title]; ?></a></td>
							<td><?php echo $row[start]; ?></td>
							<td><?php echo $row[end]; ?></td>
							<td>
							    <a href="contest_modify.php?id=<?php echo $row[id] ?>" title="编辑比赛"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> 							
								<?php echo "<a href=\"contest_delete.php?id=$row[id]\" title=\"删除比赛\" onclick=\"if(confirm('确实要删除此条记录吗,删除后数据无法恢复？')) return true;else return false; \" ><img src=\"resources/images/icons/cross.png\" alt=\"Delete\" /></a> "; ?>
							</td>
						  </tr>
						 <?php }
						 ?>
						</tbody>
						
					  </table>
				</div>
			</div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
	</div>
</div>
</body>
</html>
