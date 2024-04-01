<?php
	ob_start();
	session_start();
	session_destroy(); 
	if(isset($_SESSION['user']))
		unset($_SESSION['user']); 
	header ("Location: login.php");
?>