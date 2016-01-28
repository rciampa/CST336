<?php

$host = "localhost";
$dbname = "ciam1324";  //your otterid
$username = "ciam1324"; //your otterid
$password = "23c160875b24d7f";

//creates connection to database
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


function cosFacultyWithoutOrders(){
global $dbConn;  //using a global variable
    
$sql = "SELECT firstName, lastName, phone 
        FROM oe_client c
        LEFT JOIN oe_order o
        ON c.otterId = o.clientId
        WHERE collegeId = 1 AND orderId IS NULL";
 $statement = $dbConn->prepare($sql); //prevents SQL Injection
 $statement->execute();
 //$records = $statement->fetchAll(); //fetch and fetchAll
 $records = $statement->fetchAll(PDO::FETCH_ASSOC); //fetch and fetchAll
 
 //print_r($records);
 foreach ($records as $record) {
    echo $record['firstName'] . "<br />";
 }
}//endFunction
 
function getMostExpensiveProduct(){
global $dbConn;  //using a global variable
    
$sql = "SELECT productName, price
        FROM oe_product
        WHERE price = ( 
           SELECT MAX( price ) 
               FROM oe_product )";
 $statement = $dbConn->prepare($sql); //prevents SQL Injection
 $statement->execute();
 //$records = $statement->fetchAll(); //fetch and fetchAll
 $records = $statement->fetch(PDO::FETCH_ASSOC); //Use "Fetch" when expecting only one record
 
 //print_r($records);
 echo $records['productName'] . " - " . $records['price'];
   
}//endFunction
?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        
        <h2>Report 1: COS Faculty who have not placed any order</h2>
        <strong>SQL:</strong>
        <pre> 
SELECT firstName, lastName, phone 
FROM oe_client c
LEFT JOIN oe_order o
ON c.otterId = o.clientId
WHERE collegeId = 1 AND orderId IS NULL
       </pre> 
       <?= cosFacultyWithoutOrders() ?>    
        
        <br /><hr><br />
        
        <h2>Report 2: Most Expensive Product</h2>
        <strong>SQL:</strong>
        <pre> 
SELECT productName, price
FROM oe_product
WHERE price = ( 
   SELECT MAX( price ) 
   FROM oe_product )
       </pre> 
        <?= getMostExpensiveProduct() ?>
        
    </body>
</html> 