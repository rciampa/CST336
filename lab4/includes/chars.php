<?php
function drawVowel($vowel, $color) {
	$vowel = strtoupper($vowel);
	echo "<table border = 1>";
	for ($i = 0; $i < 8; $i++) {//Controls rows
		echo "<tr>";
		for ($j = 0; $j < 8; $j++) {//Controls columns
			$colorToDisplay = "white";
			$vowelToDisplay = "";
			switch($vowel) {
				case "A" :
					if ($i < 2 || $j < 2 || $j > 5 || $i == 4) {
						$colorToDisplay = $color;
						$vowelToDisplay = $vowel;
					}
					break;

				case "E" :
					if ($i < 2 || $j < 2 || ($i != 2 && $i != 5)) {
						$colorToDisplay = $color;
						$vowelToDisplay = $vowel;
					}
					break;

				case "I" :
					if ($i < 1 || $i > 6 || $j == 3 || $j == 4) {
						$colorToDisplay = $color;
						$vowelToDisplay = $vowel;
					}
					break;

				case "O" :
					if ($i < 2 || $i > 5 || $j < 2 || $j > 5) {
						$colorToDisplay = $color;
						$vowelToDisplay = $vowel;
					}
					break;

				case "U" :
					if ($i > 5 || $j < 2 || $j > 5) {
						$colorToDisplay = $color;
						$vowelToDisplay = $vowel;
					}
					break;
			}//endSwitch

			if ($colorToDisplay == "rainbow") {
				$colorToDisplay = "rgb(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ")";
			}

			echo "<td style = 'background-color:$colorToDisplay'>";
			echo $vowelToDisplay;
			echo "</td>";

		}//endFor columns

		echo "</tr>";
	}//endFor rows
	echo "</table>";

}

function drawLetter($letter, $color) {
	$letter = strtoupper($letter);
	echo "<table border = 1>";
	for ($i = 0; $i < 8; $i++) {//Controls rows
		echo "<tr>";
		for ($j = 0; $j < 8; $j++) {//Controls columns
			$colorToDisplay = "white";
			$letterToDisplay = "";
			switch($letter) {
				case "B" :
					if ($i == 0 || $i == 3 || $i == 7 || $j == 0 || $j == 7) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "C" :
					if ($i < 2 || $j < 2 || $i > 5) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "D" :
					if (($i < 2 || $j < 2 || $i > 5 || $j >= 6) && !((($i == 0 && $j == 7) || ($i == 7 && $j == 7)))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "F" :
					if ($i < 2 || $j < 2 || $i == 4) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "G" :
					if ($i < 2 || $j < 2 || ($i == 4 && $j >= 4) || ($i == 3 && $j >= 4) || $i > 5 || ($i == 5 && $j > 5)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "H" :
					if ($j < 2 || ($i > 2 && $i < 5) || $j >= 6) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "J" :
					if ($j > 5 || $i > 5 || ($j >= 6)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "K" :
					if ($j < 2 || ($j == (7 - $i)) || ($j == $i) || (($j + 1) == $i) || (($j + 1) == (7 - $i))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "L" :
					if ($j < 2 || $i > 5) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "M" :
					if ($j < 2 || $j > 5 || (($i == 1 || $i == 2) && ($j == 2 || $j == 5)) || (($i == 4 || $i == 3) && ($j == 3 || $j == 4))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "N" :
					if ($j < 2 || $j > 5 || (($i == 1 || $i == 2) && ($j == 2)) || (($i == 4 || $i == 3) && ($j == 3 || $j == 4)) || (($i == 5 || $i == 6) && ($j == 5))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "P" :
					if ($i < 1 || $j < 1 || $i == 3 || ($j == 7 && $i < 4)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "Q" :
					if (($i < 2 && $j != 7) || ($j > 4 && $j != 7) || ($j < 2 && $i != 7) || ($i > 4 && $i != 7)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "R" :
					if ($i < 2 || $j < 2 || $i == 5 || $i == 4 || (($i == 2 || $i == 3) && $j > 5 || ($i == 6 && $j > 4 && $j != 7)) || ($i == 7 && $j > 5)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "S" :
					if ($i < 2 || $i > 5 || ($j < 2 && $i < 5) || ($j > 5 && $i > 3) || ($i > 2 && $i < 5)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "T" :
					if ($i < 2 || ($j > 2 && $j < 5)) {
						$colorToDisplay = "$color";
						$letterToDisplay = $letter;
					}
					break;

				case "V" :
					if (($i < 2 && ($j < 2 || $j > 5)) || (($i > 1 && $i < 4) && (($j > 0 && $j < 3) || ($j > 4 && $j < 7))) || (($i > 3 && $i < 6) && (($j > 1 && $j < 6))) || (($i > 5 && $i < 8) && (($j > 2 && $j < 5)))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "W" :
					if ($j < 2 || $j > 5 || ($i > 4 && $i < 7 && $j < 3) || ($i > 4 && $i < 7 && $j > 4) || ($i > 3 && $i < 6 && $j > 2 && $j < 5)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "X" :
					if ($i == $j || ($i + $j) == 7) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "Y" :
					if ($i > 2 && $j == 3 || $i > 2 && $j == 4 || $i < 4 && $j < 3 || $i < 4 && $j > 4) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

					if ($i > 2 && $j == 3 || $i > 2 && $j == 4 || $i < 4 && $j < 3 || $i < 4 && $j > 4) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "Z" :
					if ($i < 2 || $i > 6) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "!" :
					if (($j == 3 || $j == 4) && $i != 4 && $i != 5) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;

				case "?" :
					if (1) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
			}//endSwitch

			if ($colorToDisplay == "rainbow") {
				$colorToDisplay = "rgb(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ")";
			}

			echo "<td style = 'background-color:$colorToDisplay'>";
			echo $letterToDisplay;
			echo "</td>";

		}//endFor columns

		echo "</tr>";
	}//endFor rows
	echo "</table>";
}

function drawDigit($digit, $color) {

	echo "<table border = 1>";
	for ($i = 0; $i < 8; $i++) {//Controls rows
		echo "<tr>";
		for ($j = 0; $j < 8; $j++) {//Controls columns
			$colorToDisplay = "white";
			$digitToDisplay = "";
			switch($digit) {
				case "1" :
					if (1) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "2" :
					if ($i == 4) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "3" :
					if (1) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "4" :
					if (1) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "5" :
					if ($i < 2 || $i > 5 || $i == 3 || $i == 4 || ($j < 2 && $i < 4) || ($j > 5 && $i > 4)) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "6" :
					if ($i < 1 || $j < 2 || $i > 6 || ($i > 3 && $j > 5) || $i == 4) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "7" :
					if ($i == 0 || ($i == 1 && ($j == 6 || $j == 7)) || ($i == 2 && ($j == 5 || $j == 6)) || ($i == 3 && ($j == 4 || $j == 5)) || ($i == 4 && ($j == 3 || $j == 4)) || ($i == 5 && ($j == 2 || $j == 3)) || ($i == 6 && ($j == 1 || $j == 2)) || ($i == 7 && ($j == 0 || $j == 1))) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "8" :
					if (1) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;

				case "9" :
					if ($i == 0 || $i == 3 || $j > 6 || $j == 0 && $i < 4) {
						$colorToDisplay = $color;
						$digitToDisplay = $digit;
					}
					break;
			}//endSwitch

			if ($colorToDisplay == "rainbow") {
				$colorToDisplay = "rgb(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ")";
			}

			echo "<td style = 'background-color:$colorToDisplay'>";
			echo $digitToDisplay;
			echo "</td>";

		}//endFor columns

		echo "</tr>";
	}//endFor rows
	echo "</table>\n";

}
