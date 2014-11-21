<?php
	include 'lib/createTables.php';
	include_once 'lib/util.php';

	$tableCreator = new TableCreator();
	$tableCreator->create_tables();

	session_start();
	$logged_in = isset($_SESSION['current_user']);
	$on_login_page = strpos($_SERVER['SCRIPT_NAME'], 'login.php');
	if(!$logged_in && !$on_login_page){
		redirect_to('login.php');
	}
?>
<!DOCTYPE html>
<html>
		<head>
				<meta charset="UTF-8">
				<title><?php if(isset($page_title)) echo $page_title ?></title>
				<link rel="stylesheet" type="text/css" href="style.css">
		</head>
		<body>
			<ul id="user_nav">
				<li class="bold"><?php echo $_SESSION['current_user']['username']; ?></li>
				<li><a id="logout" href="logout.php">Logout</a></li>
			</ul>


			<div class="container">
