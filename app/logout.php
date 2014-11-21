<?php
	include 'lib/util.php';

	session_start();
	$_SESSION['current_user'] = null;

	redirect_to('login.php');
?>
