<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore后台管理界面</title>
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
			if (confirm("您确定要注销回到首页吗？"))
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
				<label>你好, <?php echo $_SESSION['username'] . ",欢迎您的登录"?></label>
				<br />
				<a href="http://acmore.sinaapp.com/"  target="_blank" title="回系统首页">首页</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a onClick="logout();" title="注销登录">注销</a> 
		    </div>
		    <ul id="main-nav">
				<li> <a class="nav-top-item">发送通知</a> 
					<ul>
						<li><a href="news_add.php" target="main">写一个新通知</a></li>
						<li><a href="news_manage.php" target="main">管理通知</a></li>
					</ul>
				</li>
				<li> <a class="nav-top-item">文件管理</a>
				    <ul>
						<li><a href="files_upload.php" target="main">文件上传</a></li>
						<li><a href="files_manage.php" target="main">文件管理</a></li>
				    </ul>
				</li>				
				<li> <a class="nav-top-item">用户管理</a>
				    <ul>
						<li><a href="train_manage.php" target="main">用户管理</a></li>
						<li><a href="good_acmer_manage.php" target="main">优秀ACMer管理</a></li>						
				    </ul>
				</li>
				<li> <a class="nav-top-item">博客管理</a>
				    <ul>
						<li><a href="blog_write.php" target="main">写博文</a></li>
						<li><a href="blog_manage.php" target="main">管理博文</a></li>
				    </ul>
				</li>
				<li> <a class="nav-top-item">集训管理</a>
				    <ul>
						<li><a href="train_add.php" target="main">集训队员增减</a></li>
						<li><a href="contest_add.php" target="main">发布一个比赛</a></li>
						<li><a href="contest_manage.php" target="main">比赛管理</a></li>
						<li><a href="contest_score_manage.php" target="main">比赛积分审核</a></li>						
				    </ul>
				</li>				
				<li> <a class="nav-top-item">发送消息</a>
				    <ul>
						<li><a href="send_message.php" target="main">发送手机短信</a></li>
						<li><a href="send_email.php" target="main">发送邮件</a></li>
				    </ul>
				</li>
				<li> <a class="nav-top-item">系统设置</a>
				    <ul>
						<li><a href="set_score.php" target="main">积分设置</a></li>
						<li><a href="set_type.php" target="main">类别设置</a></li>						
				    </ul>
				</li>
		    </ul>
		</div>
    </div>
</body>
</html>
