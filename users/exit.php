<?php
	session_start();
	unset($_SESSION['name']);
	unset($_SESSION['pass']);
	echo "<script>location.href='http://acmore.sinaapp.com/';</script>";	
?>