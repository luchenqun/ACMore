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
		$img_data = file_get_contents($form_data);//��ȡ�����ϴ���ͼƬ����
		
		$img->setData($img_data);
		if($size[1] > 600)
		{
			$img->resize(600); //ͼƬ����
		}
		$img->improve();//���ͼƬ�����ĺ���
		$new_data = $img->exec(); // ִ�д������ش����Ķ���������
		$s2->write('image',$name,$new_data);//��xxx�޸�Ϊ�Լ���storage ����
		$path= $s2->getUrl('image',$name);//��xxx�޸�Ϊ�Լ���storage ����
		
		$sql = "UPDATE `user` SET `userImage` = '$path' WHERE `userNo` = '$_SESSION[name]'";
		
		$mysql->query($sql);
		echo ("<script type='text/javascript'> alert('��Ƭ�ϴ��ɹ���');location.href='my_pic_show.php';</script>");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>�û���̨����-�ϴ���Ƭ</title>
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
				<h3>�ϴ���Ƭ</h3>
				<div class="clear"></div>
		    </div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
				
				    <form action="upload_my_pic.php" method="post" enctype="multipart/form-data">
						<input class="text-input medium-input" type='file' name='filename'/>
						<br />
						<br />
						<label>ע�⣺�ϴ���Ƭֻ��Ϊpng,jpg,jepg��ʽ���������Ϊ600��������600������600��ȵı����Զ�ѹ������С���ܳ���2M������ܾ��ϴ�</label>
						<label>�����ϴ�û�н���������ѡ��ͼƬ����ϴ�֮�󣬰������٣��ȴ�1 ~ 5���ӣ���Ƭ����֮����Զ���ת����Ƭ��ʾ����</label>
						<center><input class="button" type="submit" value="�ϴ�" name="ok"/></center>
				    </form>
					
				</div>
			</div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
	</div>
</div>
</body>
</html>
