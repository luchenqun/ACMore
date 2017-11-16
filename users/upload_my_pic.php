<?php
	session_start();
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");	
    if($_POST[ok])
	{
		$mysql = new MySql();
		$s2 = new SaeStorage();
		$img = new SaeImage();		

		$filename = 'filename';
		$files = $_FILES[$filename];
		$name= "$_SISSION[name]".time().".jpg";
		$size = getimagesize($_FILES['filename']['tmp_name']);
		$form_data =$files['tmp_name'];
		$img_data = file_get_contents($form_data);//获取本地上传的图片数据
		
		$img->setData($img_data);
		if($size[1] > 600)
		{
			$img->resize(600); //图片缩放
		}
		$img->improve();//提高图片质量的函数
		$new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
		$s2->write('image',$name,$new_data);//将xxx修改为自己的storage 名称
		$path= $s2->getUrl('image',$name);//将xxx修改为自己的storage 名称
		
		$sql = "UPDATE `user` SET `userImage` = '$path' WHERE `userNo` = '$_SESSION[name]'";
		
		$mysql->query($sql);
		echo ("<script type='text/javascript'> alert('照片上传成功！');location.href='my_pic_show.php';</script>");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>用户后台管理-上传照片</title>
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
				<h3>上传照片</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
				
				    <form action="upload_my_pic.php" method="post" enctype="multipart/form-data">
						<input class="text-input medium-input" type='file' name='filename'/>
						<br />
						<br />
						<label>注意：上传照片只能为png,jpg,jepg格式，长宽最大为600，若超过600，则按照600宽度的比列自动压缩。大小不能超过2M，否则拒绝上传</label>
						<label>由于上传没有进度条，请选择图片点击上传之后，按照网速，等待1 ~ 5分钟，照片传完之后会自动跳转到照片显示界面</label>
						<center><input class="button" type="submit" value="上传" name="ok"/></center>
				    </form>
					
				</div>
			</div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
	</div>
</div>
</body>
</html>
