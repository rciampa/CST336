<?php
include_once "./includes/servo-torque.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Servo Torque Converter</title>
		<meta name="description" content="">
		<meta name="author" content="Richard Ciampa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="./Styles/theme.css"/>
		<link rel="stylesheet" type="text/css" href="./Styles/theme-common.css"/>

		<!-- Load the script files for this project -->
		<script type="text/javascript" src="./Scripts/js/main.js"></script>

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="icon" type="image/png" href="./Media/Images/csumb-logo-white.png" />
		<link rel="apple-touch-icon" href="./Media/Images/csumb-logo-white.png">
	</head>

	<body>
		<div id="page-container">

			<header>
				<h1>Servo Torque Converter</h1>
			</header>

			<nav></nav>

			<div id="wrapper">
				<p id="converted">
					<span><?=doConversion(getConvertValue()); ?></span>
				</p>
				<p> 
					<?=voltageTable() ?>
				</p>
			</div><!-- End wrapper -->

			<footer>
				<figure>
					<img class="footerLogoImage" src="./Media/Images/csumb-logo-white.png" />
				</figure>
				<p>
					All rights reserved &copy; Copyright by Richard Ciampa
				</p>
			</footer>

		</div><!-- page-conainer -->
	</body>
</html>
