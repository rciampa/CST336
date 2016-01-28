<?php
function drawTableA($color) {
	echo "<br/><table border='1'>";
	for ($i = 0; $i < 10; $i++) {

		echo "<tr>";

		for ($j = 0; $j < 8; $j++) {

			if ($i < 2 || $j < 2 || $j > 5 || $i == 5) {
				echo "<td style='background-color:$color;'>";
				echo chr(rand(65, 90));
			} else {
				echo "<td><br/>";
			}

			echo "</td>";
		}

		echo "</tr>";

	}

	echo "</table>";
}

function drawTableE($color) {
	echo "<br/><table border='1'>";
	for ($i = 0; $i < 10; $i++) {

		echo "<tr>";

		for ($j = 0; $j < 8; $j++) {

			if ($i < 2 || $j < 2 || $i == 4 || $i == 5 || $i >= 8) {
				echo "<td style='background-color:$color;'>";
				echo chr(rand(65, 90));
			} else {
				echo "<td><br/>";
			}

			echo "</td>";
		}

		echo "</tr>";

	}

	echo "</table>";
}

function drawTableI($color) {
	echo "<br/><table border='1'>";
	for ($i = 0; $i < 10; $i++) {

		echo "<tr>";

		for ($j = 0; $j < 8; $j++) {

			if ($i < 2 || $i >= 8) {
				echo "<td style='background-color:$color;'>";
				echo chr(rand(65, 90));
			} else {
				echo "<td><br/>";
			}

			echo "</td>";
		}

		echo "</tr>";

	}

	echo "</table>";
}

function drawVowel($vowel, $color) {

	$vowel = strtoupper($vowel);

	echo "<br/><table border='1'>";
	for ($i = 0; $i < 10; $i++) {

		echo "<tr>";

		for ($j = 0; $j < 8; $j++) {

			switch (variable) {
				case 'A' :
					if ($i < 2 || $j < 2 || $j > 5 || $i == 5) {
						echo "<td style='background-color:$color;'>";
						echo chr(rand(65, 90));
					} else {
						echo "<td><br/>";
					}
					break;

				case 'E' :
					if ($i < 2 || $j < 2 || $i == 4 || $i == 5 || $i >= 8) {
						echo "<td style='background-color:$color;'>";
						echo chr(rand(65, 90));
					} else {
						echo "<td><br/>";
					}
					break;

				case 'I' :
					if ($i < 2 || $j > 5 || $i == 5) {
						echo "<td style='background-color:$color;'>";
						echo chr(rand(65, 90));
					} else {
						echo "<td><br/>";
					}

				default :
					break;
			}

			echo "</td>";
		}

		echo "</tr>";

	}

	echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Ciampa: Lab Two</title>
		<meta name="description" content="">
		<meta name="author" content="Richard Ciampa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

		<style>
			.layout {
				float: left;
			}
		</style>
	</head>

	<body>
		<div>
			<header>
				<h1>index</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
			</nav>

			<div>

				<?php

				for ($i = 0; $i < 15; $i++) {
					echo "Hello " . $i . " My rand char: " . chr(rand(65, 90)) . "<br/>";
				}

				drawTableA("blue");
				drawTableE("red");
				drawTableI("green");

				//drawVowel("i", "green");
				?>
			</div>

			<footer>
				<p>
					&copy; Copyright  by Richard Ciampa
				</p>
			</footer>
		</div>
	</body>
</html>
