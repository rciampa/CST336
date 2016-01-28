<?php

if (isset($_POST['uploadForm'])) {
	if ($_FILES["fileName"]["error"] > 0) {
		echo "Error: " . $_FILES["fileName"]["error"] . "<br>";
	} else {
		if (($_FILES["fileName"]["size"] / 1024) < 700) {

			echo "Upload: " . $_FILES["fileName"]["name"] . "<br>";
			echo "Type: " . $_FILES["fileName"]["type"] . "<br>";
			echo "Size: " . ($_FILES["fileName"]["size"] / 1024) . " KB<br>";
			echo "Stored in: " . $_FILES["fileName"]["tmp_name"];

			move_uploaded_file($_FILES["fileName"]["tmp_name"], $_FILES["fileName"]["name"]);
			echo "<img src=" . $_FILES["fileName"]["name"] . " />";
		}else{
			echo "File to big!<br/>";
			if(unlink($_FILES["fileName"]["tmp_name"])){
				echo "and was deleted";
			}
		}
	}
} //endIf form submission
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>upload</title>
		<meta name="description" content="">
		<meta name="author" content="ciam1324">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				<h1>upload</h1>
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
				<form method="post" enctype="multipart/form-data">
					Select File:
					<input type="file" name="fileName" />
					<br />
					<input type="submit" value="Upload file" name="uploadForm"/>
				</form>
			</div>

			<footer>
				<p>
					&copy; Copyright  by ciam1324
				</p>
			</footer>
		</div>
	</body>
</html>
