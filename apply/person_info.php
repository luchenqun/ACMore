<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type"content="text/html; charset=GB2312"/>
<title>长沙理工大学ACMore系统</title>
<script src="../js/menu.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../styles/globle.css"/>
<style type="text/css">
td{
	border:0px solid RGB(194,208,182);
	padding:6px 0;
}
</style>
</head>
    <div id="header"></div>
	
    <div id="menu"><?php include("../include/menu.php"); ?></div>
	
	<div id="main-content">
		<div id="sidebar">
		</div>
		<div id="content" style = "margin-left: 0px;">
			<div class="post">
				<div class="ct"><div class="l"><div class="r"></div></div></div>
							<h2 class="title">校赛个人信息注册</h2>
							<p class="byline"></p>
							<div class="entry">
								<blockquote>
									<form name="form1" action="person_info_save.php" method="post">
										<table style="border-collapse:collapse; margin:0 auto; cellspacing:0; cellpadding:0; align:center">	
											<tr>
											<td align="right" width="30%" height="15">学号： </td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="stuNum"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*请仔细核对自己的学号，注册后不允许修改)</label> </td>
											</tr>

											<tr>
											<td align="right" width="30%" height="15">姓名：</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="name"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*请使用汉语填写你的姓名)</label></td>
											</tr>
											
											<tr>
											<td align="right" width="30%" height="15"> 所在院系：</td>
												<td align="left" width="70%">
													<select  class="inputstyle" name="college">
													<option value="">====选择学院====</option>
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
											</tr>

											<tr>
											<td align="right" width="30%" height="15">所学专业：
											</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="major"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*请使用汉语填写你的专业)</label></td>
											</tr>
											<tr>
											<td align="right" width="30%" height="15">手机号码：</td>
											<td align="left" width="70%"><input class="inputstyle" type="text" size="22" name="tel"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(*请填写你的手机号码)</label></td>
											</tr>
											<tr>
											<td align="right" width="30%" height="15">密码：</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd1"><label style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(*密码是你加入组队和修改个人信息凭证)</label></td>
											</tr>
											<tr>
											<td align="right" width="30%" height="15">重复密码：</td>
											<td align="left" width="70%"><input class="inputstyle" type="password" size="22" name="pwd2"></td>
											</tr>
											<tr>
											<td colspan="2" height="25" align="center"><input type="submit" value="注册" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置" class="radio" ></td>
											</tr>
										</table>
									</form>
								</blockquote>
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