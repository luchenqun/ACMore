<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");	
	$mysql = new MySql();
	if($_POST['ok'])
	{
		$teamName=$_POST["teamName"];
		$num=$_POST['len'];
		$pwd=$_POST["pwd"];
		$tel=$_POST["tel"];
		
		$stuNum = array("N/A","N/A","N/A");
		$stuPwd = array();
		$regdate = date("Y-m-d H:i:s");
		
		for($i=0; $i<$num; ++$i)
		{
			$stuNum[$i] = $_POST['stu'.$i];
			$stuPwd[$i] = $_POST['pwd'.$i];
		}
		
		for($i=0; $i<$num; ++$i)
		{
			$temp = $stuNum[$i];
			$sql="select * from register where stuNum='$temp'";
			$row = $mysql->fetch_array($mysql->query($sql));

			if(strcmp($row[pwd], $stuPwd[$i]) != 0)
			{
				location("�������������" . $stuNum[$i] . "ע��ĸ������벻һ�£���ֹע�ᣡ", "team_info.php");
			}
		}

		$sql = "INSERT INTO teaminfo(teamName, num, stuNum1, stuNum2, stuNum3, tel, pwd, regdate) VALUES ('$teamName', '$num', '$stuNum[0]', '$stuNum[1]', '$stuNum[2]', '$tel', '$pwd', '$regdate')";
		$mysql->query($sql);

		if(1 == $mysql->affected_rows())
		{
			location("��ϲ��ע��ɹ���Ԥף��Ķ���ȡ�úóɼ�", "team_info_show.php");
		}
		else
		{
			location("��������ԭ��ע��ʧ�ܣ������ԣ�", "team_info.php");
		}

	}
?>