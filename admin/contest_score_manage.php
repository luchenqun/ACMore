<?php
	session_start();
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();
	$sql="select * from contest order by id desc";
	$result = $mysql->query($sql);
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore��̨����-�����������</title>
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
				<h3>�����������</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					  <table>
					  
						<thead>
						  <tr>
							<th>����</th>
							<th>��ʼʱ��</th>
							<th>����ʱ��</th>
							<th>״̬</th>
							<th>����</th>
						  </tr>
						</thead>
						
						<tbody>
						<?php while ($row=$mysql->fetch_array($result))
						{
						?>
						  <tr>
							<td><a href="../contest/index.php" target="_blank"><?php echo $row[title]; ?></a></td>
							<td><?php echo $row[start]; ?></td>
							<td><?php echo $row[end]; ?></td>
							<td>
								<?php 
									$sql = "select * from contestscore where gid='$row[id]' and status='1'";
									$mysql->fetch_array($mysql->query($sql));
									$num = $mysql->affected_rows();
									echo $num . "�˴���ˣ�";
									
									$sql = "select * from contestscore where gid='$row[id]' and status='0'";
									$mysql->fetch_array($mysql->query($sql));
									$num = $mysql->affected_rows();
									echo $num . "��δ�ύ";									
								?>
							</td>
							<td>
							    <a href="contest_score_examine.php?id=<?php echo $row[id] ?>" title="��˱�������"><img src="resources/images/icons/hammer_screwdriver.png" alt="����" /></a>								
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
