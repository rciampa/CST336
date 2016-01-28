<?php

include_once './includes/db_access.inc.php';

$conn = createConn();
//gets database connection

function displayCategories() {
	$sql = "SELECT categoryId, categoryName
        FROM oe_category WHERE 1";
	$records = getDataBySQL($sql);
	foreach ($records as $record) {
		echo "<option value = '" . $record['categoryId'] . "'>" . $record['categoryName'] . "</option>";
	}
}

function displayAllProducts() {
	$sql = "SELECT productName, price FROM oe_product";

	$records = getDataBySQL($sql);

    return $records;
}

function filterProducts() {
	global $conn;
	if (isset($_GET['searchForm'])) {//user submitted the filter form

		$categoryId = $_GET['categoryId'];

             $sql = "SELECT productName, price, productId 
                FROM oe_product
                WHERE categoryId = :categoryId"; //using Named Parameters (prevents SQL injection)
            
            $namedParameters = array();
            $namedParameters[":categoryId"] = $categoryId;
            
            $maxPrice = $_GET['maxPrice'];
            
            if (!empty($maxPrice)) { //the user entered a max price value in the form
                
               //$sql = $sql . " ";
               $sql .= " AND price <= :price"; //using named parameters
               $namedParameters[":price"] = $maxPrice;
             
            }
            
            if (isset($_GET['healthyChoice'])) {
                
                $sql .= " AND healthyChoice = 1";
            }
            
            $orderByFields = array("price", "productName");
            $orderByIndex = array_search($_GET['orderBy'],$orderByFields);
            
            //$sql .= " ORDER BY " . $_GET['orderBy'];
            $sql .= " ORDER BY " . $orderByFields[$orderByIndex]; //prevents SQL injection
            
            
            $statement = $conn->prepare($sql);
            $statement->execute($namedParameters);
            $records = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $records;

	}
}
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Otter Express: Product Search</title>
		<meta name="description" content="Lab five for CST336. SQL select statments with named parameters">
		<meta name="author" content="Richard Ciampa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link type="text/css" rel="stylesheet" href="./Styles/theme.css"/>

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="icon" type="image/png" href="./Media/Images/csumb-logo-white.png">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				<h1>Otter Express: Product Search</h1>
			</header>
			<nav></nav>
			<div id="wrapper">
				<form method="get">
					<fieldset>
						<legend>Search Criteria:</legend>
					<span>Select Category</span>
					<select name="categoryId">
						<?=getCategories() ?>
					</select>

					<span>Max Price</span>
					<input type="number" placeholder="max price" name="maxPrice" min="1.00" max="40.00" step=".50"
					value="<?=$_GET['maxPrice'] ?>"/>

					<strong>Order by:</strong>
					<select name="orderBy">
						<option value="price">Price</option>
						<option value="productName">Name</option>
					</select>
					
					<br />
					
					<input type="checkbox" name="healthyChoice" id="healthyChoice"  <?=isset($_GET['healthyChoice']) ? "checked" : "" ?> />
					<label for="healthyChoice">Healthy Choice</label>
					
					<br />
					<br />

					<input type="submit" value="Search Products" name="searchForm" />
					</fieldset>

				</form>
				<div id="item-list">
				<?php
				//Displays all products by default
				if (!isset($_GET['searchForm'])) {
					$records = getAllProducts();
				} else {
					$records = filterProducts();
				}

				foreach ($records as $record) {
					echo "<a target='descriptionFrame' href='getProductInfo.php?productId=" . $record['productId'] . "'>";
					echo $record['productName'];
					echo "</a>";
					echo "- $" . $record['price'] . "<br>";
				}
				?>
				</div>
			<div id="description-frame">
            <iframe src="getProductInfo.php" name="descriptionFrame" width="250" height="300" frameborder="0"/>
            </iframe>				
			</div>
        </div>
			<footer>
				<p>
					All rights reserved &copy; Copyright  by Richard Ciampa
				</p>
			</footer>
		</div>
	</body>
</html>
