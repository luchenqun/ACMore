<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();

	$userNo = $_SESSION['name'];

	$sql = "SELECT * FROM `user` WHERE userNo = '$userNo'";
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);
	if(0 == $row[userTrain])
	{
		location("�㻹δ�����ټ�ѵ�ʸ�", "right.php");
	}

	$sql = "SELECT * FROM `contestscore` WHERE userNo = '$userNo'";
	$result = $mysql->query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>�û���̨�������</title>
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
				<h3>���������ύ</h3>
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
							<th>��ʾ</th>
							<th>����</th>
						  </tr>
						</thead>
					
						<tbody>
						<?php while ($row = $mysql->fetch_array($result))
						{
							$gid = $row[gid];
							$sql = "SELECT * FROM `contest` WHERE id = '$gid'";
							$data = $mysql->fetch_array($mysql->query($sql));
						?>
						  <tr>
							<td><?php echo $data[title];?></td>
							<td><?php echo $data[start];?></td>
							<td><?php echo $data[end];?></td>
							<td>
								<?php 
									if(0 == $row[status])
										echo "<label style=\"color:#f00\">���ύ������Ϣ</label>";
									if(1 == $row[status])
										echo "�����";
									if(2 == $row[status])
										echo "���ͨ��";
								?>
							</td>
							<td>
								<?php 
									if(0 == $row[status]){
								?>
							    <a href="contest_score_sub.php?id=<?php echo $row[id]; ?>" title="�ύ������Ϣ"><img src="resources/images/icons/submit.png" alt="Edit" /></a> 	
								<?php
								}
								?>
								<?php 
									if(1 == $row[status]){
								?>
							    <a href="contest_score_edit.php?id=<?php echo $row[id]; ?>" title="�༭��������"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> 
							    <a href="../contest/score_detail.php" title="�鿴�ôα�������" target="_blank"><img src="resources/images/icons/read.png" alt="Edit" /></a> 										
								<?php
								}
								?>
								<?php 
									if(2 == $row[status]){
								?>
							    <a href="../contest/score_detail.php" title="�鿴�ôα�������" target="_blank"><img src="resources/images/icons/read.png" alt="Edit" /></a> 							
								<?php
								}
								?>							
							</td>
						  </tr>
						 <?php }
						 ?>
						 
						</tbody>
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
						
					  </table>
				</div>
		    </div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
    </div>
</div>
</body>
</html>
