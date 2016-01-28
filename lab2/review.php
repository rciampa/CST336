<DOCTYPE html/>

<html lang="en=US">
	<head>
		<meta charset="UTF-8" />
		<meta name="author"  content="Richard Ciampa" />

		<title>PHP: Config</title>

		<link  rel="icon" type="image/png" href="Media/Images/csumb-logo-white.png"/>
	</head>
	<body>

		<?php
		echo "<h1>Hello, PHP!</h1>";

		$price = rand(1, 100);

		if ($price <= 50) {
			$tax = .1;
		} else {
			$tax = .2;
		}

		//Or

		$tax = ($price <= 50) ? .1 : .2;

		echo "<br/>Item price.. : $" . $price;
		echo "<br/>Tax............. : $" . number_format($price * .085, 2);
		echo "<br/>";
		for ($i = 0; $i < 27; $i++) {
			echo "-";
		}
		echo "<br/>Total........... : $" . number_format($price * 1.085, 2);
		?>
	</body>
</html>