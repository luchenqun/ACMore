<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['pwd']);	
	echo "<script>location.href='http://acmore.sinaapp.com/';</script>";	
?>