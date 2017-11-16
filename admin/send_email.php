<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql="select * from user";
	$result=$mysql->query($sql);    //执行语句
	
	if($_POST[ok])
	{		
		$array = $_POST['checkbox'];
		$len = count($array);
		
		if(0 == $len)
		{
			alter("你没有选择任何人！", "send_email.php");		
		}

		$title = $_POST['title'];	
		$msg = $_POST['msg'];
		
		for($i=0; $i<$len; $i++)
		{
			$mail = new SaeMail();

			//请将邮箱改为你自己的邮箱
		    $mailto = $array[$i];

			$mailtitle = mb_convert_encoding($title, "UTF8" ,"GB2312");
			$mailcontent = mb_convert_encoding($msg, "UTF8", "GB2312");
			
			$mailfrom = 'luchenqun@qq.com';
			$mailpwd =  'fendoubuxi596320' ;
			
			$ret = $mail->quickSend( $mailto , $mailtitle , $mailcontent, $mailfrom ,$mailpwd);
			
			if($ret===false)
			{
				var_dump($mail->errno(),$mail->errmsg());
			}
			else
			{
				alter("邮件发送成功！", "send_email.php");
			}
			
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore后台管理界面</title>
	<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/right.css" type="text/css" media="screen" />
	<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
	<script type="text/javascript" src="resources/scripts/facebox.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
	<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
	<style type="text/css">
	td{
		background:RGB(243, 243, 243);
		font-size:16px;
	}
	</style>	
	</style>	
	<script>
	function isSelectAll(obj,type){
	   if(obj!=null&&obj!=""){
		if(document.getElementsByName(obj)!=undefined&&document.getElementsByName(obj).length>0){
		 var userids = document.getElementsByName(obj);
		 if(type=="全选"){
		  for(var i=0;i<userids.length;i++){
		   if(userids[i].checked == false){
			userids[i].checked = true;
		   }
		  } 
		 }else if(type=="全不选"){
		  for(var i=0;i<userids.length;i++){
		   if(userids[i].checked == true){
			userids[i].checked = false;
		   }
		  } 
		 }else if(type=="反选"){
		  for(var i=0;i<userids.length;i++){
		   if(userids[i].checked == true){
			userids[i].checked = false;
		   }else{
			userids[i].checked = true;
		   }
		  } 
		 }
		}
	   }
	  
	}
	</script>	
</head>
<body>
<div id="body-wrapper">
    <div id="main-content">
		<?php include("resources/includes/shutcut.php") ;?>
		<div class="content-box">
		    <div class="content-box-header">
				<h3>发送邮件内容</h3>
				<div class="clear"></div>
		    </div>

		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >	
					<form id = "form" name = "form" action="send_email.php" method= "post">
						<p align=left><label>邮件标题 </label><input class="text-input large-input" type="text" id="large-input" name="title" /></p>
						<p><label>邮件内容</label></p>
						<textarea cols="100" rows="4"  name="msg"></textarea> 
						<br />
						<br />
						<br />
						
						<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center; background:RGB(243, 243, 243);">	
							<tr>
								<td colspan="16">请在需要发送邮件人的前面打√
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="全选" onclick="isSelectAll('checkbox[]','全选');" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="全不选" onclick="isSelectAll('checkbox[]','全不选');" />								
								</td>
							</tr>
							<?php for($i=0; $i<mysql_num_rows($result);)
							{
								$count=3;
							?>
							  <tr>
								<?php
									for($j=0; $j<$count;$j++)
									{
										if($i + $j >= mysql_num_rows($result))
											break;
										if (mysql_data_seek($result, $i+$j) && ($row = mysql_fetch_assoc($result)))
										{
											echo "<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$row[userEmail]\">$row[userName][$row[userEmail]]</td>";
											echo "<td>&nbsp;&nbsp;</td>";
										}
									}
									$i += $count;
								?>
							  </tr>
							 <?php 
							 }
							 ?>		
							<tr>
								<td  colspan="16" style="text-align:center"><input class="button"  type = "submit" name="ok" value="确定发送邮件" /></td>
							</tr>
						</table>										
					</form>
				</div>
		    </div>
		</div>
		<?php include("resources/includes/footer.php") ; ?>
    </div>
</div>
</body>
</html>
