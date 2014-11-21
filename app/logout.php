<?php
	session_start();
	$_SESSION['current_user'] = null;
	header('Location: ./login.php');
?>
