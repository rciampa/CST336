<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Richard Ciampa" />

		<title>Califonia Lottery Numbers</title>
		<link rel="stylesheet" type="text/css" href="./Styles/theme.css" />
		<link rel="stylesheet" type="text/css" href="./Styles/theme-common.css" />

		<link rel="icon" type="image/png" href="../Media/Images/csumb-logo-white.png" />

		<!-- Local Styles -->
		<style>
		</style>

	</head>

	<body>
		<div id="wrapper">
			<img class="ca-logo" src="Media/Images/calottery.png" alt="The California Lottery Logo with a letter L in the middel of the sun" />
			
			<?php
			include_once './includes/ca-lotto.php';
			
			//Make the $superLotto array global
			global $superLotto;
			//Sort the array
			sort($superLotto);
			
			echo "<table class='lottoTable' border='0''>";
			echo "<tr>
			      <th colspan='5'>Your Lottery Numbers</th>
			      <th>MEGA</th>
			      </tr>";
			
			echo "<tr>";
			

			//Print the lottery number to the screen
			for ($i =0; $i < count($superLotto) + 1; $i++) {

				if ($i == 5) {
					echo "<td id='power'>";
					echo rand(1, 27);
				}else{
					echo "<td>";
					echo $superLotto[$i];
				}
				
				echo "</td>";
			}
			
			?>
			
			</tr>
			</table>

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
		</div><!-- end of wrapper div -->
	</body>
</html>