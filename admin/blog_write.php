<?php
  session_start();
  require_once("../include/mysql.inc.php");
  require_once("../include/func.inc.php");
  $mysql = new MySql();  
  $sql = "SELECT * FROM `set_type`";
  $result=$mysql->query($sql);
  
  if($_POST[ok])
  {
    $title = $_POST[blogtitle];
    $author = $_SESSION['username'];
    $time = date("Y-m-d H:i:s");
    $content = $_POST['editorValue'];
	$type = $_POST[blogclassify];
	
	if($title == "" || $content == "")
	{
		echo ("<script type='text/javascript'> alert('标题或内容不能为空！');history.go(-1);;</script>");
		exit();
	}

    $sql = "INSERT INTO blog (blogauthor, blogtitle, blogdate, blogcontent, blogtype) VALUES ('$author', '$title', '$time', '$content', '$type')";
    $result = $mysql->query($sql);
	alter("提交成功", "blog_write.php");
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK2312" />
<title>ACMore后台管理-写博文</title>
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
				<h3>写博文</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					<form action="<?php echo $PHP_SELF; ?>" method="post">
						<p align=left><label>标题 </label><input class="text-input large-input" type="text" id="large-input" name="blogtitle" /></p>
					    <p><label>内容</label></p>
							<textarea id="editor"></textarea> 
							<script type="text/javascript">
								var editor = new baidu.editor.ui.Editor();
								editor.render("editor");
							</script>
						<br />
						<br />
					
						<label style="text-align:center">博文分类</label>
						<label style="text-align:center">
							<select class="small-input" name="blogclassify"  >
							<?php
								while ($row = $mysql->fetch_array($result))
								{
							?>
								<option value="<?php echo $row['type_name'];?>"><?php echo $row['type_name'];?></option>						
							<?php
								}
							?>
							</select>
						</label>
						<br />
						<table><tr><td style="text-align:center">
					    <input class="button"  type = "submit" name="ok" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    <input class="button"  type = "reset"  name="cancel" value="重置" />
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
