<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");

	if($_POST[ok])
	{
		$userName = check_name($_POST['userName'], 2, 7);
		$userSex = $_POST['userSex'];
		$userID = check_identity_card($_POST['userID']);
		$userCollege = check_college($_POST['userCollege']);
		$userMajor = check_major($_POST['userMajor']);
		$userClass = check_class($_POST['userClass']);
		$userTel = check_tel($_POST['userTel']);
		$userQQ = check_qq($_POST['userQQ']);
		$userEmail = check_email($_POST['userEmail']);
		$userSpecial = $_POST['userSpecial'];
		$userDeclar = $_POST['userDeclar'];
		$userJoinYear = check_join_year($_POST['userJoinYear']);
		$userOJName = check_oj_account($_POST['userOJName']);
		$userOJ = check_oj_type($_POST['userOJ']);
		$userOJPwd = $_POST['userOJPwd'];
		$userNo = $_SESSION['name'];
		
		$mysql = new MySql();
		$sql="UPDATE user SET userName = '$userName', userSex = '$userSex', userID = '$userID', userCollege = '$userCollege', userMajor = '$userMajor', userClass = '$userClass', userTel = '$userTel', userQQ = '$userQQ', userEmail = '$userEmail', userSpecial = '$userSpecial', userDeclar = '$userDeclar', userJoinYear = '$userJoinYear', userOJName = '$userOJName', userOJPwd = '$userOJPwd' , userOJ = '$userOJ' WHERE userNo = '$userNo'";
		$mysql->query($sql);
		
		if(1 == $mysql->affected_rows())
		{
			$sql = "SELECT * FROM `user` WHERE userNo = '$username'";
			$result = $mysql->query($sql);
			$row = $mysql->fetch_array($result);
			if(strcmp($row[userImage], "../images/lovely.jpg") != 0)
			{
				location("ҳ�潫ת����ĸ����ս��棬������Ҫ�����ɸ�����ĸ�����Ƭ", "my_pic_show.php");
			}
			else
			{
				location("�������Ƴɹ����������Ƭ���밴��Ҫ���ϴ������Ƭ", "upload_my_pic.php");
			}
		}
		else
		{
			location("����ʧ�ܣ�������", "info_complete.php");
		}
	}
?>