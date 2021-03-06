<!DOCTYPE html>

<html lang="en">

<?php
	
	session_start(); // to allow variable transfer between pages ...
	include("config.php");
	
	// Connect to database
	$dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

	if (mysqli_connect_errno()){
		echo "Connection failed;".mysqli_connect_error();
		exit;
	}

?>
	<head>
		<meta charset="utf-8">
		
		<!-- For assessment you need to change these -->
		<meta name="description" content="wine, ">
		<meta name="keywords" content="Wine Review Database">
		<meta name="keywords" content="wine, points, price">
		
		<title>Wine Review Database</title>
		
		<!-- for multiple fonts change | to %7c * no spaces* -->
		<link href="http://fonts.googleapis.com/css?family=Lato%7cUbuntu"
		rel="stylesheet">
		
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/data_style.css"> <!--custom style sheet -->
	</head>
	
	<body>
		<p class="message">Eek! Your browser does not support grid. 
		Please upgrade your system.</p>
		
		<div class="wrapper">
			
			<!-- logo / small image goes here -->
			<div class="box logo" style="padding-right:0px;">
				<a href="index.php"><img src="images/logo2.png"
				width ="300"
				height="150"
				alt="Dice" /></a>
			</div>
			
			<div class="box banner">
				<h1>Wine Review Database</h1>
			</div> <!-- / banner -->
