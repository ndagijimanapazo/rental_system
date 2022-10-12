<?php
error_reporting(0);
session_start();
$con = new mysqli("localhost","root","","land");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LCRS || Land Conasolidation And Rental System</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="keywords" content="slideman, sliderman.js, javascript slider, jquery, slideshow, effects" />
		<meta name="description" content="Sliderman.js - will do all the sliding for you :)" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<script type="text/javascript" src="js/sliderman.1.3.8.js"></script>
		<link rel="stylesheet" type="text/css" href="css/sliderman.css" />
		<script type="text/javascript" src="../js/sliderman.1.3.8.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/sliderman.css" />
		<!-- Google Icons -->
		<link rel="stylesheet" 
			href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	</head>
	<body>
		<div id="wrapper">
			<div id="topo">
				<img src="img/logoo.png">
			</div>
			<div id="seperator">
				<h1>Land Consolidation And Rental System</h1>
			</div>
			<div id="nav">
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>		
						<li><a href="lands.php">Land</a></li>
						<li><a href="admin/">Admin</a></li>
						<li><a href="farmer/login.php">Farmer</a></li>
						<li><a href="aboutus.php">About Us</a></li>
						<li><a href="contactus.php">Contact Us</a></li>
					</ul>
				</nav>
			</div>