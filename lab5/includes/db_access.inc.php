<?php
   include_once 'db_conn.inc.php';
   
   function getClientReport(){

      $sql = "SELECT firstName, lastName, phone\n"
             . "FROM oe_client c\n"
             . "LEFT JOIN oe_order o ON c.otterId = o.clientId\n"
             . "WHERE collegeId =1\n"
             . "AND o.orderId IS NULL";
			 
        $conn = createConn();

        //Prepare the sql and execute the statment
        $query = $conn -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $query -> execute();
        //Retieve all the rows
        $clients = $query -> fetchAll(PDO::FETCH_ASSOC);

        uiClientReport($clients);

        $conn = null;
}

function uiClientReport($clientReport)
{
	
        echo "<table class='dataTable'>\n"
             . "<tr>\n"
             . "<th>First</th>"
             . "<th>Last</th>"
             . "<th>Phone</th>"
             . "</tr>";

        $i = 0;
        foreach ($clientReport as $row) {
                if ($i++ % 2 == 0) {
                        echo "<tr class='dataHighliteRow'>";
                } else {
                        echo "<tr>";
                }
                echo "<td>" . $row['firstName'] . "</td>";
                echo "<td>" . $row['lastName'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "</tr>";
        }

        echo "</table>";
	
}

function getMaxPriceProduct()
{
	$sql = "SELECT `productName`, `productDescription`, `price` \n"
           . "FROM `oe_product`\n"
           . "WHERE price = (SELECT MAX(`price`) FROM `oe_product`) ";
		   
    $conn = createConn();

    //Prepare the sql and execute the statment
    $query = $conn -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $query -> execute();
    //Retieve all the rows
		
    $maxProduct = $query -> fetch(PDO::FETCH_ASSOC); // fetch becuase only one record 
	
	print_r($maxProduct);
	
	uiGetMaxPriceProduct($maxProduct);
	
	$conn = null;
}

function geProductDescription($Id)
{
	$sql = "SELECT `productDescription` \n"
           . "FROM `oe_product`\n"
           . "WHERE productId = :currentId";
		   
    $conn = createConn();

    //Prepare the sql and execute the statment
    $query = $conn -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$namedParameters = array();
	$namedParameters[':currentId'] = $Id;
    $query -> execute($namedParameters);
    //Retieve the row
    $ProductDescription = $query -> fetch(PDO::FETCH_ASSOC); // fetch becuase only one record 
	
	echo $ProductDescription['productDescription'];
	
	$conn = null;
}


function uiGetMaxPriceProduct($product){
	echo "<table class='dataTable'>\n"
          . "<tr>\n"
          . "<th>Name</th>"
          . "<th>Description</th>"
          . "<th>Price</th>"
          . "</tr>";

    echo "<tr>";
    echo "<td>" . $product['productName'] . "</td>";
    echo "<td>" . $product['productDescription'] . "</td>";
    echo "<td>" . $product['price'] . "</td>";
    echo "</tr>";
    echo "</table>";
	
		
}

function getAllProducts(){
	$sql = "SELECT `productName`, `productDescription`, `price`, `productId` \n"
           . "FROM `oe_product`\n";
		   
    //uiGetAllProducts(fetchAllRecords($sql));
    return fetchAllRecords($sql);
}

function uiGetAllProducts($products){
	echo "<table class='dataTable'>\n"
          . "<tr>\n"
          . "<th>Name</th>"
          . "<th>Description</th>"
          . "<th>Price</th>"
          . "</tr>";

     foreach ($products as $product) {
    	echo "<tr>";
    	echo "<td>" . $product['productName'] . "</td>";
    	echo "<td>" . $product['productDescription'] . "</td>";
    	echo "<td>" . $product['price'] . "</td>";
    	echo "</tr>";
    }
      echo "</table>";
    
}

function getCategories()
{
    $sql = "SELECT `categoryId`, `categoryName` \n"
           . "FROM `oe_category`\n";
		   
	uiGetCategories(fetchAllRecords($sql));
	
}

function uiGetCategories($categories){
	foreach ($categories as $row) {
			echo "<option value='". $row['categoryId'] . "'>" . $row['categoryName'] . "</option>"; 		
	}
}
   
?>