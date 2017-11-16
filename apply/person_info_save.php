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
		alert_back('���û��Ѿ���ע��,������������ϵ����Ա');
	}
	else
	{
		$sql = "INSERT INTO register(college, major, stuNum, name, tel, pwd, regdate) VALUES ('$college', '$major', '$stuNum', '$name', '$tel', '$pwd', '$regdate')";
		$mysql->query($sql);
		if(1 == $mysql->affected_rows())
		{
			location("��ϲ��ע��ɹ�����Ͽ����ע�������Ϣ��Ԥף��ȡ�úóɼ�", "person_info_show.php");
		}
		else
		{
			alert_back('��������ԭ��ע��ʧ�ܣ�������');
		}
	}
?>