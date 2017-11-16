<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore��̨�������</title>
	<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
	<link rel="stylesheet" href="resources/css/left.css" type="text/css" media="screen" />
	<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
	<script type="text/javascript" src="resources/scripts/facebox.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
	<script type="text/javascript">
		function logout(){
			if (confirm("��ȷ��Ҫע���ص���ҳ��"))
				window.top.location.href = "exit.php";
			return false;
		}
	</script>
</head>
<body>
    <div id="sidebar">
		<div id="sidebar-wrapper">
		    <br />
			<br />
			<br />
			<br />
		    <br />
			<br />
			<br />
			<br />
		    <div id="profile-links"> 
				<label>���, <?php echo $_SESSION['username'] . ",��ӭ���ĵ�¼"?></label>
				<br />
				<a href="http://acmore.sinaapp.com/"  target="_blank" title="��ϵͳ��ҳ">��ҳ</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a onClick="logout();" title="ע����¼">ע��</a> 
		    </div>
		    <ul id="main-nav">
				<li> <a class="nav-top-item">����֪ͨ</a> 
					<ul>
						<li><a href="news_add.php" target="main">дһ����֪ͨ</a></li>
						<li><a href="news_manage.php" target="main">����֪ͨ</a></li>
					</ul>
				</li>
				<li> <a class="nav-top-item">�ļ�����</a>
				    <ul>
						<li><a href="files_upload.php" target="main">�ļ��ϴ�</a></li>
						<li><a href="files_manage.php" target="main">�ļ�����</a></li>
				    </ul>
				</li>				
				<li> <a class="nav-top-item">�û�����</a>
				    <ul>
						<li><a href="train_manage.php" target="main">�û�����</a></li>
						<li><a href="good_acmer_manage.php" target="main">����ACMer����</a></li>						
				    </ul>
				</li>
				<li> <a class="nav-top-item">���͹���</a>
				    <ul>
						<li><a href="blog_write.php" target="main">д����</a></li>
						<li><a href="blog_manage.php" target="main">������</a></li>
				    </ul>
				</li>
				<li> <a class="nav-top-item">��ѵ����</a>
				    <ul>
						<li><a href="train_add.php" target="main">��ѵ��Ա����</a></li>
						<li><a href="contest_add.php" target="main">����һ������</a></li>
						<li><a href="contest_manage.php" target="main">��������</a></li>
						<li><a href="contest_score_manage.php" target="main">�����������</a></li>						
				    </ul>
				</li>				
				<li> <a class="nav-top-item">������Ϣ</a>
				    <ul>
						<li><a href="send_message.php" target="main">�����ֻ�����</a></li>
						<li><a href="send_email.php" target="main">�����ʼ�</a></li>
				    </ul>
				</li>
				<li> <a class="nav-top-item">ϵͳ����</a>
				    <ul>
						<li><a href="set_score.php" target="main">��������</a></li>
						<li><a href="set_type.php" target="main">�������</a></li>						
				    </ul>
				</li>
		    </ul>
		</div>
    </div>
</body>
</html>
