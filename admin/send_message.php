<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql="select * from user";
	$result=$mysql->query($sql);    //ִ�����
	
	if($_POST[ok])
	{	
/*	
		if(strcmp(substr($_POST['msg'], 0, 6), "acmore") != 0)
		{
			alter("�ø��ѹ��ܲ�����������", "send_message.php");		
		}
*/
		$array = $_POST['checkbox'];
		$len = count($array);
		if(0 == $len)
		{
			alter("��û��ѡ���κ��ˣ�", "send_message.php");	
		}
		
		for($i=0; $i<$len; $i++)
		{
			$sms = apibus::init("sms"); //�������ŷ������
			$mobile = $array[$i]; 
			$msg = $_POST['msg'];
			$obj = $sms->send( $mobile, $msg , "GBK2312"); 

			 //������� Tips: �ף��������ʧ���ǲ��շѵ� 
			if ( $sms->isError( $obj ) )
			{ 
				alter("�ֻ�����Ϣ����ʧ�ܣ�", "send_message.php");
			} 
			else
			{
				alter("�ֻ�����Ϣ���ͳɹ���", "send_message.php");
			}
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
	<title>ACMore��̨�������</title>
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
	<script>
	function isSelectAll(obj,type){
	   if(obj!=null&&obj!=""){
		if(document.getElementsByName(obj)!=undefined&&document.getElementsByName(obj).length>0){
		 var userids = document.getElementsByName(obj);
		 if(type=="ȫѡ"){
		  for(var i=0;i<userids.length;i++){
		   if(userids[i].checked == false){
			userids[i].checked = true;
		   }
		  } 
		 }else if(type=="ȫ��ѡ"){
		  for(var i=0;i<userids.length;i++){
		   if(userids[i].checked == true){
			userids[i].checked = false;
		   }
		  } 
		 }else if(type=="��ѡ"){
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
				<h3>���Ͷ�����Ϣ</h3>
				<div class="clear"></div>
		    </div>

		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >	
					<form id = "form" name = "form" action="send_message.php" method= "post">
						<p><label>��������(���ܳ���49����)</label></p>
						<textarea cols="100" rows="4"  name="msg"></textarea> 
						<br />
						<br />
						<br />
						
						<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center; background:RGB(243, 243, 243);">	
							<tr>
								<td colspan="16">������Ҫ���Ͷ����˵�ǰ����
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="ȫѡ" onclick="isSelectAll('checkbox[]','ȫѡ');" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="ȫ��ѡ" onclick="isSelectAll('checkbox[]','ȫ��ѡ');" />
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
											echo "<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$row[userTel]\">$row[userName][$row[userTel]]</td>";
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
								<td  colspan="16" style="text-align:center"><input class="button"  type = "submit" name="ok" value="ȷ��������Ϣ" /></td>
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
