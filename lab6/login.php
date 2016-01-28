<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Otter Express: login</title>
		<meta name="description" content="">
		<meta name="author" content="Richard Ciampa">
		
				<!-- Add the stylesheet links -->
		<link type="text/css" rel="stylesheet" href="./Styles/theme.css" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				<h1>Otter Express: login</h1>
			</header>
			<nav></nav>

			<div id="wrapper-login">
				<form method="post" action="loginProcess.php">

					Username:
					<input type="text" name="username" />
					<br />
					Password:
					<input type="password" name="password" />
					<br />
					<input type="submit" value="Login" name="loginForm" />

				</form>

			</div>

			<footer>
				<p>
					&copy; Copyright  by Richard Ciampa
				</p>
			</footer>
		</div>
	</body>
</html>
