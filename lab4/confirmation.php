<?php

//Start a new server side session
session_start();

/*
 * We create a server side session variable of type array
 * to hold the fields that contain missing data. The seesion
 * variable is ONLY avaiable from the server that origianlly
 * hadeled the session variable creation unless SQL session
 * state has been enabled.
 */
$_SESSION['errors'] = array();
$_SESSION['state'] = array("firstName"=>"", "lastName"=>"", "email"=>"");

/*
 * Lets check to see if all the fiels are
 * present in the query string
 */ 
foreach ($_POST as $key => $value) {
	if(empty($value))
	{
		$_SESSION['errors'][] = $key;
	}else{
		$_SESSION['state'][$key] = $value;
	}
}

/*
 * Redirect the user if we have missing data
 */
if(count($_SESSION['errors']) > 0){
	header("Location:index.php");
}else{
	session_destroy();
}


function getTitle() {

	if (isset($_POST["gender"])) {
		if ($_POST["gender"] == "Male") {
			return "Mr.";
		} elseif ($_POST["gender"] == "Female") {
			return "Ms.";
		}
	}
}

function getFullName() {
	$name = "";
	if (isset($_POST["firstName"])) {
		$name = $_POST["firstName"];
	}

	if (isset($_POST["lastName"])) {
		$name .= " " . $_POST["lastName"];
	}

	return $name;
}

function calcCost() {
	$cost = 0;
	if (isset($_POST["university"])) {
		switch ($_POST["university"]) {
			case 'ucsc' :
				$cost = 100.00;
				break;
			case 'sjsu' :
				$cost = 10.00;
				break;
			default :
				$cost = 0.0;
				break;
		}
	}

	if (isset($_POST["shirt"])) {
		$cost += 5;
	}

	if (isset($_POST["bottle"])) {
		$cost += 7;
	}

	return number_format($cost, 2);
}
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="./Styles/theme.css" />
		<link type="text/css" rel="stylesheet" href="./Styles/theme-common.css" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Registration Confirmation</title>
		<meta name="description" content="">
		<meta name="author" content="Richard Ciampa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div id="wrapper">
			<header>
				<h1>Registration Confirmation</h1>
			</header>
			<nav></nav>

			<div id="reg-message">
				<p>
				Dear <?=getTitle() ?>  <?=getFullName() ?> <br /> <br />
				
				Thank you for joining us this weekend! We look forward to seeing you at this years
				hackathon and wish you and your team great success.
				<br /><br />
				Swimmingly, <br /><br />
				  Joe Otter
				</p>
				
				<br />

				<span class="total"> Your total: <?="$" . calcCost() ?> </span>
			</div>

				<!-- Footer section -->
				<footer>
					<hr />
					<figure >
						<img class="footerLogoImage" src="./Media/Images/csumb-logo.png"
						alt="Image of Otter and first letters of the university, which are M & B" />
					</figure>
					This site is ONLY intended as an educational tool for building HTML pages. The site content
					is strictly sample text only. Richard Ciampa &copy; All Rights reserved
				</footer>
		</div>
	</body>
</html>
