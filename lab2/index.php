<?php

include "./includes/ledBoard.inc.php";

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
	if ($text == "A" || $text == "E" || $text == "I" || $text == ")" || $text == "U") {
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
		<meta name="author" content="Richard Ciampa" />
		<title>Lab 2: Led Board</title>
		<link rel="stylesheet" type="text/css" href="./Styles/theme.css" />
		<link rel="stylesheet" type="text/css" href="./Styles/theme-common.css" />
		
		<link rel="icon" type="image/png" href="../Media/Images/csumb-logo-white.png" />
		
		<style>
			table {
				float: left;
				margin-right: 5px;
			}
		</style>

	</head>

	<body>
		<div id="wrapper">
			<h4 align="center">Styles: Edge, IE 11 & Firefox on Linux</h4>

			<?php

			$lineOne = array("K", "E", "E", "P");
			$lineTwo = array("O", "N");
			$lineThree = array("m", "O", "v", "I", "n", "g");

			echo "<div class='container'><div class='wordOne'>";
			drawWord($lineOne, "orange");
			echo "</div></div>";

			echo "<div class='container'><div class='wordTwo'>";
			drawWord($lineTwo, "random");
			echo "</div></div>";

			echo "<div class='container'><div class='wordThree'>";
			drawWord($lineThree, "rainbow");
			echo "</div></div>";
			?>
			<h2 align="center">Missing letters were not found on 
			    <a target="_blank" href="https://github.com/cst336/lab2_includes/blob/master/ledBoard.inc.php">GitHub</a></h2>
			    <h4 align="center">
			    	<a href="https://github.com/cst336/lab2_includes/commit/6af0afb8cd0cdc90fb119077742ef8da3ccc8fd8"
			    	   target="_blank" title="view my commit">
			    	 My assigned letter for GitHub was: H
			    	 </a>
			    </h4>
			 
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