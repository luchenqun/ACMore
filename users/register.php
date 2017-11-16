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
				alert_back('���û��Ѿ���ע��,������������ϵ����Ա');
			}
			
			$sql = "INSERT INTO `user` (`userNo`, `userName`, `userPwd`) VALUES ('$userNo', '$userName', '$pwd')";
			$mysql->query($sql);
			if(1 == $mysql->affected_rows())
			{
				location("ע��ɹ�,�����ڵ�¼����������Ϣ", "index.php");
			}
			else
			{
				alert_back('��������ԭ��ע��ʧ�ܣ������Ի���ϵ����Ա');
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
<title>��ɳ����ѧACMoreϵͳ</title>
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
				<h2 class="title">�û�ע��</a></h2>
				<p class="byline"></p>
				<div class="entry">
					<form id = "form" name = "form" action="register.php" method= "post">
						<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
							<tr>
								<td id="left">ѧ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ţ�</td>
								<td id="right"><input class="inputstyle" type="text" name="userNo" /><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*ֻ����ѧ�ţ������˺Ų�����ע��)</label></td>
							</tr>
							<tr>
								<td id="left">��ʵ������</td>
								<td id="right"><input class="inputstyle" type="text" name="userName" /><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*������������ʵ��������ֹʹ���ǳ�)</label></td>
							</tr>							
							<tr>
								<td id="left">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�룺</td>
								<td id="right"><input class="inputstyle" type="password" name="pwd1" /><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*���볤��Ϊ6 ~ 16λ)</label></td>
							</tr>
							<tr>
								<td id="left">ȷ�����룺</td>
								<td id="right"><input class="inputstyle" type="password" name="pwd2" /></td>
							</tr>	
							<tr>
								<td id="left">��&nbsp;֤&nbsp;�룺</td>
								<td id="right"><input class="inputstyle" style="width:100px;" type="text" name="inputcode" /><span id = "vcode" style=" display:-moz-inline-stack; display:inline-block; background:url('<?php echo $question['img_url']; ?>') no-repeat; margin:0 0 0 10px"><label style="margin:0 0 0 100px;font-size:12px">(�����ִ�Сд�������嵥��ͼƬ��һ��)</label></span></td>
							</tr>							
							<tr>
							<td colspan="2" align="center"><input height="35px" width="45" type="submit" value="ע��" class="radio"></td>
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