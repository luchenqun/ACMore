<?php
	require_once("../include/mysql.inc.php");
    require_once("../include/func.inc.php");
	$mysql = new MySql();
	$id = $_GET[id];
	$gid = $_GET[gid];
	$sql="select * from contestscore where id = '$id'";
	$result=$mysql->query($sql);    //执行语句
	$data = mysql_fetch_array($result);
	
	if(0 == $data[status])
	{
		location("该用户未提交分数，无法拒绝", "contest_score_examine.php?id=$gid");
	}
	
	if(1 == $data[status] || 2 == $data[status] || 3 == $data[status])
	{
		$sql = "UPDATE `contestscore` SET `status` = '3' WHERE `id` = '$id'";
		$mysql->query($sql);
		location("该用户分数已拒绝通过", "contest_score_examine.php?id=$gid");
	}
?>