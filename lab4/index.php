<?php
session_start();
if (isset($_SESSION['state'])) {
	$saved_state = $_SESSION['state'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Lab Four: Forms</title>
		<meta name="description" content="Lab four for CST336 at CSU Monterey Bay Fall 2015. Using HTML Forms">
		<meta name="author" content="Richard Ciampa">

		<link type="text/css" rel="stylesheet" href="./Styles/theme.css" />
		<link type="text/css" rel="stylesheet" href="./Styles/theme-common.css" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<script type="text/javascript" src="./Scripts/js/main.js"></script>

		<script type="text/javascript">


		</script>

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="icon" type="image/png" href="./Media/Images/csumb-logo-white.png" />
		<link rel="apple-touch-icon" href="./Media/Images/csumb-logo-white.png">
	</head>

	<body>
		<div id="wrapper">
			<header>
				<h1>CSU Monterey Bay Hackathon</h1>
			</header>
			<nav></nav>

			<div id="content-container">
				<h2>Registration Form</h2>
				
				<form id="myForm" method="post" action="confirmation.php">

					<span class="form-label">First:</span>
					<?php
					global $saved_state;
					echo '<input type="text" name="firstName" id="fName" placeholder="Joe" size="30"
                             value="' . $saved_state['firstName'] . '"/>';
					if (isset($_SESSION['errors'])) {
						echo(in_array("firstName", $_SESSION['errors'])) ? "<span class='error-info'>* required!</span>" : "";
					}
					?>
					<br />

					<span class="form-label">Last:</span>
					<?php
					echo '<input type="text" name="lastName" id="lName" placeholder="Otter" size="30"
                             value="' . $saved_state['lastName'] . '"/>'; ;
					if (isset($_SESSION['errors'])) {
						echo(in_array("lastName", $_SESSION['errors'])) ? "<span class='error-info'>* required!</span>" : "";
					}
					?>

					<br />
					<br />

					Gender:
					<input type="radio" name="gender" id="Male" value="Male" />
					<label for="Male">Male</label>
					<input type="radio" name="gender" id="female" value="female" />
					<label for="female">Female</label>
					<input type="radio" name="gender" id="other" value="other" />
					<label for="other">Other</label>

					<br/>
					<br />

					University:
					<select name="university" size="1" onchange="updatePrice(this)">
						<option value="csumb">CSU Montrey Bay</option>
						<option value="ucsc">UC Santa Cruz</option>
						<option value="sjsu">CSU San Jose</option>
					</select>
					
					<span id="cost">$0.00</span>

					<br />
					<br />

					Merchandise:
					<br />
					<input type="checkbox" name="shirt" value="shirt" id="shirt" />
					<label for="shirt">Tee Shirt $5.00</label>
					<input type="checkbox" name="bottle" value="bottle" id="bottle" />
					<label for="shirt">Water Bottle: $7.00</label>

					<br />
					<br />

					<span class="form-label">Email:</span>
					<?php
					echo '<input type="email" name="email" id="email" placeholder="someone@csumb.edu" size="30"
                               value="' . $saved_state['email'] . '" />';
					if (isset($_SESSION['errors'])) {
						echo(in_array("email", $_SESSION['errors'])) ? "<span class='error-info'>* required!</span>" : "";
					}
					?>

					<br />
					<br />

					<input type="submit" value="Sign Up"/>
					<input type="reset" value="clear" />

				</form>

				<?php session_destroy(); ?>

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
		</div>

	</body>
</html>
