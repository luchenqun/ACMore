<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");	

	$mysql = new MySql();
	$stuNum=check_stu_id($_POST["stuNum"], 12, 12);
	$name=check_name($_POST["name"], 2, 7);	
	$college=check_college($_POST["college"]);
	$major=check_major($_POST["major"]);
	$tel=check_tel($_POST["tel"]);
	$pwd=check_pwd($_POST["pwd1"], $_POST["pwd2"], 6, 16);
	$regdate = date("Y-m-d H:i:s");
	
	if($mysql->num_rows($mysql->query("SELECT * FROM `register` WHERE `stuNum`= $stuNum")) >= 1)
	{
		alert_back('该用户已经被注册,若有问题请联系管理员');
	}
	else
	{
		$sql = "INSERT INTO register(college, major, stuNum, name, tel, pwd, regdate) VALUES ('$college', '$major', '$stuNum', '$name', '$tel', '$pwd', '$regdate')";
		$mysql->query($sql);
		if(1 == $mysql->affected_rows())
		{
			location("恭喜您注册成功，请赶快组队注册组队信息！预祝你取得好成绩", "person_info_show.php");
		}
		else
		{
			alert_back('由于其他原因，注册失败，请重试');
		}
	}
?>