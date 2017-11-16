<?php
	session_start();
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$pagesize=5;    //����ÿҳ��ʾ��¼��Ŀ
	$mysql->getPage('blog', '', "where blogauthor = $_SESSION[name] order by blogid desc", $pagesize);

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
	$sql="select * from blog where blogauthor = $_SESSION[name] order by blogid desc limit $offset,$pagesize";
	$result=$mysql->query($sql);    //ִ�����
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>�û���̨����-���Ĺ���</title>
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
				<h3>���Ĺ���</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					  <table>
					  
						<thead>
						  <tr>
							<th>����</th>
							<th>����</th>
							<th>����ʱ��</th>
							<th>����</th>
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
							<td><a href="../blog/blog_detail.php?id=<?php echo $row[blogid] ?>" target="_blank"><?php echo $row[blogtitle]; ?></a></td>
							<td><?php echo $row[blogauthor]; ?></td>
							<td><?php echo $row[blogdate]; ?></td>
							<td>
							    <a href="blog_modify.php?id=<?php echo $row[blogid] ?>" title="�༭"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> 
								<?php echo "<a href=\"blog_delete.php?id=$row[blogid]\" title=\"ɾ��\" onclick=\"if(confirm('ȷʵҪɾ��������¼��,ɾ���������޷��ָ���')) return true;else return false; \" ><img src=\"resources/images/icons/cross.png\" alt=\"Delete\" /></a> "; ?>
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
