<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");	
	if(isset($_SESSION['username']) && isset($_SESSION['pwd']))
	{
		location('', 'admin.php');
	}
	if($_POST)
	{
		check_code($_POST['inputcode'], $_SESSION['vcode']);
		$username = $_POST['username'];
		$passcode = $_POST['pwd'];
		$mysql = new MySql();
		$sql = "SELECT * FROM `admin` WHERE name = '$username' AND pwd = '$passcode'";
		$query = $mysql->query($sql);
		
		if(1 == $mysql->affected_rows())
		{
			$_SESSION['username'] = $username;
			$_SESSION['pwd'] = $passcode;
			location('', 'admin.php');
		}
		else
		{
			alert_back('用户名或密码错误！');
		}	
	}
	
	$vcode = new SaeVCode();
	$question = $vcode->question();
	$_SESSION['vcode'] = $vcode->answer();
	if($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')
	{
		$question = $vcode->question();
		$_SESSION['vcode'] = $vcode->answer();
		echo $question['img_url'];
		exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GBK2312" />
	<title>ACMore后台管理系统</title>
	<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/right.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.5.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#vcode").click(function(){
				$.get("index.php",function(data){
					$("#vcode").css({"background-image":"url(" + data + ")"});
				})
			})
		})	
	</script>
</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
    <div id="login-top">
		<marquee width=100% scrollamount=10 behavior=alternate direction=right align=middle border=1><a style="color:RGB(255, 255, 255); font-size:36px">欢迎管理员您的登陆</a></marquee>
	</div>

    <div id="login-content">
		<form id = "vform" name = "vform" action="index.php" method= "post">
		
		  <p>
			<label>账&nbsp;&nbsp;&nbsp;号&nbsp;</label>
			<input class="text-input" type="text" name="username" />
		  </p>
		  <div class="clear"></div>
		  
		  <p>
			<label>密&nbsp;&nbsp;&nbsp;码&nbsp;</label>
			<input class="text-input" type="password" name = "pwd" />
		  </p>
		  <div class="clear"></div>
		  
		  <p>
			<label>验证码&nbsp;</label>
			<input class="text-input" type="text" size="34"  id = "inputcode" name = "inputcode"/><span><span style="margin-left:100px;">验证码看不清单击图片换一张</span><span id = "vcode" style="margin: -80px 0 0 320px; padding:0 0 70px 0;display:-moz-inline-stack; display:inline-block;background:url('<?php echo $question['img_url']; ?>') no-repeat;width:80px;height:20px"></span></span>	  
		  </p>
		  <div class="clear"></div>	  
		  <p>
			<input class="button" type="reset" value="重置" />
		  </p>
		  <p>
			<input class="button" type="submit" value="登录" />
		  </p>
		</form>
   </div>
</div>
</body>
</html>
