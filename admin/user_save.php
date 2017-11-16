<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");

	if($_POST[ok])
	{
		$userName = $_POST['userName'];
		$userSex = $_POST['userSex'];
		$userID = $_POST['userID'];
		$userCollege = $_POST['userCollege'];
		$userMajor = $_POST['userMajor'];
		$userClass = $_POST['userClass'];
		$userTel = $_POST['userTel'];
		$userQQ = $_POST['userQQ'];
		$userEmail = $_POST['userEmail'];
		$userSpecial = $_POST['userSpecial'];
		$userDeclar = $_POST['userDeclar'];
		$userJoinYear = $_POST['userJoinYear'];
		$userOJName = $_POST['userOJName'];
		$userOJ = $_POST['userOJ'];
		$userOJPwd = $_POST['userOJPwd'];
		
		$userNo = $_POST[userNo];
		
		$mysql = new MySql();
		$sql="UPDATE user SET userName = '$userName', userSex = '$userSex', userID = '$userID', userCollege = '$userCollege', userMajor = '$userMajor', userClass = '$userClass', userTel = '$userTel', userQQ = '$userQQ', userEmail = '$userEmail', userSpecial = '$userSpecial', userDeclar = '$userDeclar', userJoinYear = '$userJoinYear', userOJName = '$userOJName', userOJPwd = '$userOJPwd' , userOJ = '$userOJ' WHERE userNo = '$userNo'";
		$mysql->query($sql);

		alter("资料已更新", "train_manage.php");

	}
?>