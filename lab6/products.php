<?php

include_once './includes/genericDataAccess.inc.php';

session_start();

if (isset($_SESSION['username'])) {
	header("location: login.php");
}

function displayAllProducts(){
    $sql = "SELECT productId, productName FROM oe_product";
    $records = fetchAllRecords($sql);
    foreach ($records as $record) {
        echo $record['productName']; 
        echo " <a href='updateProduct.php?productId=".$record['productId']."'> Update </a> ";
        echo " <a href='deleteProduct.php'> Delete </a>";
        echo "<br />";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>products</title>
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
				<h1>products</h1>
			</header>
			<nav></nav>

			<div>
				<strong> Welcome <?=$_SESSION['adminName'] ?>!
				</strong>

				<form action="logout.php">
					<input type="submit" value="Logout" />
				</form>

				<form action="addProduct.php">
					<input type="submit" value="Add New Product" />
				</form>

				<?=displayAllProducts() ?>
			</div>

			<footer>
				<p>
					&copy; Copyright  by ciam1324
				</p>
			</footer>
		</div>
	</body>
</html>
