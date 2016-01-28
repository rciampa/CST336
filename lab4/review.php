<?php
$message;

if (isset($_GET["message"])) {
	$message = $_GET["message"];
}

function ledBoard($text, $color) {
	$text = strtoupper($text);

	if ($color == "random") {
		$color = generateRandomColor();
	}

	for ($i = 0; $i < strlen($text); $i++) {
		if (is_integer($text[$i])) {
			
			drawDigit($text[$i], $color);

		} elseif (isVowel($text[$i])) {

			drawVowel($text[$i], $color);

		} else {

			drawLetter($text[$i], $color);

		}
	}
}

function drawWord($word, $color) {
	foreach ($word as &$letter) {
		ledBoard($letter, $color);
	}
}

function isVowel($text) {
	if ($text == "A" || $text == "E" || $text == "I" || $text == "O" || $text == "U") {
		return TRUE;
	} else {
		return FALSE;
	}
}

function generateRandomColor() {

	return "rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ")";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Review: HTML Forms</title>
		<meta name="description" content="">
		<meta name="author" content="Richard Ciampa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		<link type="text/css" rel="stylesheet" href="./Styles/review/theme.css" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="icon" type="image/png" href="./Media/Images/csumb-logo-white.png" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				<h1>Review: HTML Forms</h1>
			</header>
			<nav></nav>

			<div>
				<form action="review.php" method="get">
					Text:
					<input type="text" name="message" size="15" placeholder="Type Here"/><br />
					<input type="radio" name="color" value="Red" id="clrRed" />
					<label for="clrRed">Red</label>
					<br />
					<input type="radio" name="color" value="Yellow" id="clrYellow" />
					<label for="clrYellow">Yellow</label>
					<br />
					<input type="radio" name="color" value="rainbow" id="clrRainbow" />
					<label for="clrRainbow">Rainbow</label>
					<br />
					
					<select name="vowel">
						<option value="A">A</option>
						<option value="E">E</option>
						<option value="I">I</option>
						<option value="O">O</option>
						<option value="U">U</option>
					</select>
					
					<br />
					
					<input type="submit" value="Send" />
				</form>

				<?php
				include_once './includes/chars.php';
				global $message;
				echo "You typed: " . $message;
				$wordToDraw = array();
				
				for ($i=0; $i < strlen($message) ; $i++) { 
					array_push($wordToDraw, $message[$i]);
				}
				
				drawWord($wordToDraw, "rainbow");
				
				?>
			</div>

			<footer>
				<p>
					All Rights Reserved &copy; Copyright  by Richard Ciampa
				</p>
			</footer>
		</div>
	</body>
</html>
