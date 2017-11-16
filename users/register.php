<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	
	if($_POST)
	{
			check_code($_POST['inputcode'], $_SESSION['vcode']);
			$userNo = check_stu_id($_POST['userNo'], 12, 12);
			$userName = check_name($_POST['userName'], 2, 7);
			$pwd = check_pwd($_POST['pwd1'], $_POST['pwd2'], 6, 16);
			$mysql = new MySql();	
			
			if($mysql->num_rows($mysql->query("SELECT * FROM `user` WHERE `userNo`= $userNo")) >= 1)
			{
				alert_back('该用户已经被注册,若有问题请联系管理员');
			}
			
			$sql = "INSERT INTO `user` (`userNo`, `userName`, `userPwd`) VALUES ('$userNo', '$userName', '$pwd')";
			$mysql->query($sql);
			if(1 == $mysql->affected_rows())
			{
				location("注册成功,请现在登录完善其他信息", "index.php");
			}
			else
			{
				alert_back('由于其他原因，注册失败，请重试或联系管理员');
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>长沙理工大学ACMore系统</title>
<script src="../js/menu.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.5.2/jquery.min.js"></script>
<style type="text/css">
td{
	border:0px solid RGB(194,208,182);
	padding:6px 0;
	height:22px;
	font-size:20px;
}
#left{
	text-align:right;
	width:45%;
}

#right{
	text-align:left;
}

label{
	font-size:15px;
	margin:0 0 0 20px;	
}
</style>
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
    <div id="header"></div>
	
    <div id="menu"><?php include("../include/menu.php"); ?></div>
	
	<div id="main-content">
		<div id="sidebar">
		</div>
		<div id="content" style = "margin-left: 0px;">
			<div class="post">
				<div class="ct"><div class="l"><div class="r"></div></div></div>
				<h2 class="title">用户注册</a></h2>
				<p class="byline"></p>
				<div class="entry">
					<form id = "form" name = "form" action="register.php" method= "post">
						<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
							<tr>
								<td id="left">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</td>
								<td id="right"><input class="inputstyle" type="text" name="userNo" /><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*只能是学号，其他账号不予以注册)</label></td>
							</tr>
							<tr>
								<td id="left">真实姓名：</td>
								<td id="right"><input class="inputstyle" type="text" name="userName" /><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*请输入您的真实姓名，禁止使用昵称)</label></td>
							</tr>							
							<tr>
								<td id="left">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
								<td id="right"><input class="inputstyle" type="password" name="pwd1" /><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*密码长度为6 ~ 16位)</label></td>
							</tr>
							<tr>
								<td id="left">确认密码：</td>
								<td id="right"><input class="inputstyle" type="password" name="pwd2" /></td>
							</tr>	
							<tr>
								<td id="left">验&nbsp;证&nbsp;码：</td>
								<td id="right"><input class="inputstyle" style="width:100px;" type="text" name="inputcode" /><span id = "vcode" style=" display:-moz-inline-stack; display:inline-block; background:url('<?php echo $question['img_url']; ?>') no-repeat; margin:0 0 0 10px"><label style="margin:0 0 0 100px;font-size:12px">(不区分大小写，看不清单击图片换一张)</label></span></td>
							</tr>							
							<tr>
							<td colspan="2" align="center"><input height="35px" width="45" type="submit" value="注册" class="radio"></td>
							</tr>							
						</table>
					</form>							
				</div>
				<p class="endline"></p>
				<p class="endline"></p>
				<div class="cb"><div class="l"><div class="r"></div></div></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div id="footer"><?php include("../include/foot.php"); ?></div>
</body>
</html>