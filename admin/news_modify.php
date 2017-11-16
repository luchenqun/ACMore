<?php
	session_start();
	require_once("../include/mysql.inc.php");
	$mysql = new MySql();  
	$id = $_GET["id"];
	$sql = 'SELECT* FROM `notification` WHERE id = ' . $id;
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);
	
	function submit_form()
	{
		$id = $_GET["id"];
		$title = $_POST[title];
		$time = date("Y-m-d H:i:s");
		$content = $_POST['editorValue'];
		$mysql = new MySql(); 
		if($title == "" || $content == "")
		{
			echo ("<script type='text/javascript'> alert('标题或内容不能为空！');history.go(-1);;</script>");
			exit();
		}
		$sql = "UPDATE notification SET title='$title', date='$time', content='$content' WHERE id='$id'";
		$mysql->query($sql);
		echo ("<script type='text/javascript'> alert('修改成功！');location.href='news_manage.php';</script>");
	}

	if($_POST[ok])
	{
		submit_form();
	}
  
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
<script type="text/javascript" src="../ueditor/editor_config.js"></script>
<script type="text/javascript" src="../ueditor/editor_all.js"></script>
<link rel="stylesheet" href="../ueditor/themes/default/ueditor.css"/>
</head>
<body>
<div id="body-wrapper">
    <div id="main-content">
		<?php include("resources/includes/shutcut.php") ;?>
		<div class="content-box">
		    <div class="content-box-header">
				<h3>修改通知</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					<form action="<?php echo $PHP_SELF; ?>" method="post">
						<p align=left><label>通知标题 </label><input class="text-input large-input" type="text" id="large-input" name="title" <?php echo "value='$row[title]'" ?>/></p>
					    <p><label>通知内容</label></p>
						<textarea id="editor"><?php echo $row[content]; ?></textarea> 
						<script type="text/javascript">
							var editor = new baidu.editor.ui.Editor();
							editor.render("editor");
						</script>
						<br />
						<br />
						<table><tr><td style="text-align:center">
					    <input class="button"  type = "submit" name="ok" value="确认修改" />			  
						</td></tr></table>						
					</form>
				</div>
			</div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
    </div>
</div>
</body>
</html>
