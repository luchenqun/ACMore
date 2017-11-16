<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();  
	$sql = "SELECT * FROM `set_type`";
	$result=$mysql->query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>�û���̨����-�����ϴ��ļ�</title>
	<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/right.css" type="text/css" media="screen" />
	<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
	<script type="text/javascript" src="resources/scripts/facebox.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
	<script type="text/javascript" src="resources/scripts/upload.js"></script>	
</head>
<body>
<div id="body-wrapper">
    <div id="main-content">
		<?php include("resources/includes/shutcut.php") ;?>
		<div class="content-box">
		    <div class="content-box-header">
				<h3>�ļ��ϴ�</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					<div id="load" style="text-align:center"></div>
				    <br />
					<form action="files_move.php" method="post" enctype="multipart/form-data">
						<input class="text-input medium-input" type='file' name='myfile'/>
						<br />
						<br />
						<label>�ļ�����</label>
						<br />
						<textarea  cols="10" rows="8" name="filedesc"></textarea>
						<br />
						<br />
						<label>�ļ�����</label>
						<select class="small-input" name="fileclassify" >
						<?php
							while ($row = $mysql->fetch_array($result))
							{
						?>
							<option value="<?php echo $row['type_name'];?>"><?php echo $row['type_name'];?></option>						
						<?php
							}
						?>
                        </select>
						<br />
						<br />
						<center><input class="button" type="submit" name="ok"  onclick="loading()" value="�ϴ�" /></center>
				    </form>
					
				</div>
			</div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
	</div>
</div>
</body>
</html>
