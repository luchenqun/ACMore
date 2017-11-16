<?php
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$pagesize=40;    //设置每页显示记录数目
	$mysql->getPage('user', '', '', $pagesize);

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
	$sql="select * from user limit $offset,$pagesize";
	$result=$mysql->query($sql);    //执行语句
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore后台管理界面</title>
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
				<h3>用户资料管理</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					  <table>
					  
						<thead>
						  <tr>
							<th>账号</th>
							<th>姓名</th>
							<th>电话</th>
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
							<td><a href="../acmer/acmer_detail.php?stuNum=<?php echo $row[userNo] ?> " target="_blank"><?php echo $row[userNo]; ?></a></td>
							<td><?php echo $row[userName]; ?></td>
							<td><?php echo $row[userTel]; ?></td>
							<td>
							    <a href="user_modify.php?userNo=<?php echo $row[userNo] ?>" title="编辑用户资料"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
								<?php echo "<a href=\"user_reject.php?userNo=$row[userNo]\" title=\"拒绝用户\" onclick=\"if(confirm('该操作会随机修改用户的密码，拒绝用户再次登录')) return true;else return false; \" ><img src=\"resources/images/icons/reject.png\" alt=\"Delete\" /></a> "; ?>								
								<?php echo "<a href=\"user_delete.php?userNo=$row[userNo]\" title=\"删除用户所有资料\" onclick=\"if(confirm('确实要删除该用户的所有资料吗？删除后数据无法恢复！请务必谨慎操作！')) return true;else return false; \" ><img src=\"resources/images/icons/cross.png\" alt=\"Delete\" /></a> "; ?>
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
