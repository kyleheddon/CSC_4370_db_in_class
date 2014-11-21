<?php
	include 'lib/createTables.php';
	$tableCreator = new TableCreator();
	$tableCreator->create_tables();

	session_start();
	$logged_in = isset($_SESSION['current_user']);
	$on_login_page = strpos($_SERVER['SCRIPT_NAME'], 'login.php');
	if(!$logged_in && !$on_login_page){
		header('Location: ./login.php');
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
			<a id="logout" href="logout.php">Logout</a>

			<div class="container">
