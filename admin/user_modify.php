<?php
	session_start();
	require_once("../include/mysql.inc.php");
	require_once("../include/func.inc.php");
	$mysql = new MySql();
	$sql = "SELECT * FROM `user` WHERE userNo = '$_GET[userNo]'";
	$result = $mysql->query($sql);
	$row = $mysql->fetch_array($result);	
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
	font-size:16px;
	border:1;
}
</style>	
	
</head>
<body>
<div id="body-wrapper">
    <div id="main-content">
		<?php include("resources/includes/shutcut.php") ;?>
		<div class="content-box">
		    <div class="content-box-header">
				<h3>编辑用户资料</h3>
				<div class="clear"></div>
		    </div>

		    <div class="content-box-content">
				<div class="tab-content default-tab" id="tab1" >
					<form id = "form" name = "form" action="user_save.php" method= "post">
						<table>
						<tr>
							<td style="text-align:right;">账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userNo" value="<?php echo $row[userNo]; ?>"/></td>
							<td style="text-align:right;">真实姓名：</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userName" value="<?php echo $row[userName]; ?>"/></td>
						</tr>
						
						<tr>
							<td style="text-align:right;">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
							<td style="text-align:left;"><input type="radio" name="userSex" checked="checked" value="男"/>男&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="女" name="userSex" />女</td>
							<td style="text-align:right;">身份证号：</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userID" value="<?php echo $row[userID]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;院：</td>
							<td  style="text-align:left;">
								<select name="userCollege">		
									<?php
										if($row[userCollege] == '')
										{
											echo "<option value=\"====选择学院====\">====选择学院====</option>";
										}
										else
										{
											echo "<option value=\"$row[userCollege]\">$row[userCollege]</option>";
										}
									
									?>
									<option value="计算机与通信工程学院">计算机与通信工程学院</option>
									<option value="数学与计算科学学院">数学与计算科学学院</option>
									<option value="电气与信息工程学院">电气与信息工程学院</option>
									<option value="经济与管理学院">经济与管理学院</option>
									<option value="交通运输工程学院">交通运输工程学院</option>
									<option value="土木与建筑学院">土木与建筑学院</option>
									<option value="汽车与机械工程学院">汽车与机械工程学院</option>
									<option value="能源与动力工程学院">能源与动力工程学院</option>
									<option value="马克思主义学院">马克思主义学院</option>
									<option value="文法学院">文法学院</option>
									<option value="设计艺术学院">设计艺术学院</option>
									<option value="物理与电子科学学院">物理与电子科学学院</option>
									<option value="化学与生物工程学院">化学与生物工程学院</option>
									<option value="水利工程学院">水利工程学院</option>
									<option value="外国语学院">外国语学院</option>
									<option value="城南学院">城南学院</option>
								</select>							
							</td>								
							<td style="text-align:right;">专&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业：</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userMajor" value="<?php echo $row[userMajor]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">班&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级：</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userClass" value="<?php echo $row[userClass]; ?>"/></td>
							<td style="text-align:right;">电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userTel" value="<?php echo $row[userTel]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q：</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userQQ" value="<?php echo $row[userQQ]; ?>"/></td>							
							<td style="text-align:right;">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件：</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userEmail" value="<?php echo $row[userEmail]; ?>"/></td>						
						</tr>
						
						<tr>
							<td style="text-align:right;">OJ&nbsp;&nbsp;类型：</td>
							<td  style="text-align:left;">
								<select name="userOJ">
									<?php
										if($row[userOJ] == '')
										{
											echo "<option value=\"---请选择你的做题OJ---\">---请选择你的做题OJ---</option>";
										}
										else
										{
											echo "<option value=\"$row[userOJ]\">$row[userOJ]</option>";
										}
									
									?>
																	
									<option value="POJ">POJ</option>
									<option value="HDU">HDU</option>
								</select>							
							</td>							
							<td style="text-align:right;">OJ&nbsp;&nbsp;账号：</td>
							<td  style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userOJName" value="<?php echo $row[userOJName]; ?>"/></td>						
						</tr>						

						<tr>
							<td style="text-align:right;">参赛年份：</td>
							<td  style="text-align:left;">
								<select name="userJoinYear">
									<?php
										if($row[userJoinYear] == '')
										{
											echo "<option value=\"---请选择你的参赛年份---\">---请选择你的参赛年份---</option>";
										}
										else
										{
											echo "<option value=\"$row[userJoinYear]\">$row[userJoinYear]</option>";
										}
									?>								
																
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>									
								</select>							
							</td>	
							<td style="text-align:right;">OJ&nbsp;&nbsp;密码：</td>
							<td style="text-align:left;"><input class="text-input medium-input" type="text" id="medium-input" name="userOJPwd" value="<?php echo $row[userOJPwd]; ?>"/></td>						
						</tr>						
						
						<tr>
							<td style="text-align:right;">特&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;长：</td>
							<td style="text-align:left;" colspan="3"><input class="text-input large-input" type="text" id="large-input" name="userSpecial" value="<?php echo $row[userSpecial]; ?>"/></td>					
						</td>
						
						<tr>
							<td style="text-align:right;">参赛宣言：</td>
							<td style="text-align:left;" colspan="3"><input class="text-input large-input" type="text" id="large-input" name="userDeclar" value="<?php echo $row[userDeclar]; ?>"/></td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:right;"><input class="button"  type = "submit" name="ok" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td colspan="2" style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="button"  type = "reset"  name="cancel" value="重置" />	</td>
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
