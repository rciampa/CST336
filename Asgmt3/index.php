<?php
 session_start();
 
 print_r($_SESSION['errors']);
 
 function vConvertCheck(){
     if(isset($_SESSION['errors'])){
     	return ($_SESSION['errors'][0] == "vConvert")? "<span id='rec'>Required!</span>": "";
     }
 }
 
 session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Servo Torque Converter</title>
		<meta name="description" content="Assignment three for CST336 using PHP to process HTML form data">
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

			<div>
				<form method="get" action="torque-convert.php" >
					<br />
					
					Convert from:
					<input type="radio" name="convertFrom" checked="checked" value="kg-cm" id="kg" 
					onchange="convertFromTo(this)" required="required"/>
					<label for="kg">Kg-cm</label>
					<input type="radio" name="convertFrom" value="oz-in" id="oz" 
					onchange="convertFromTo(this)" required="required"/>
					<label for="oz">Oz-in</label>
					
					<span id="conversionUnits">To: Oz-in</span>
					
					<br /><br />
					
					<label for="volts">Voltage Range: 4.8 Volts</label>
					to <span id="opp-volt">6.6 Volts</span>
					<br />
					<input id="vrange" type="range" min="4.8" max="8.4" id="volts" maxlength="8.4" 
					step=".1" onchange="onVoltChange(this)" formnovalidate="formnovalidate" 
					name="mvValue" title="Set the max DC Voltage of servo" value="6.6"/>
					       
					
					
					<br />
					<br />
					
					Value to convert:
					<input type="text" id="servoTorqueValue" name="vConvert"  
					placeholder="in Kg-cm" onclick="onVoltChange()" maxlength="3" />
					<?=vConvertCheck()?>
					
					<br />
					
					<input type="submit" value="Convert" />
					<input type="reset" value="Clear" onclick="clearForm()"/>
				</form>
				
			</div>
			
		 </div><!-- End wrapper -->

			<footer>
				<figure>
					<img class="footerLogoImage" src="./Media/Images/csumb-logo-white.png" />
				</figure>
				<p>
					All rights reserved &copy; Copyright by Richard Ciampa
				</p>
			</footer>

		</div>
	</body>
</html>
