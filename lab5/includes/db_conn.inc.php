<?php
function createConn() {
	
	$db_user = 'ciam1324';
	$db_pass = '23c160875b24d7f';
	$host = 'localhost';
	$dbname = 'ciam1324';
	$db_dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
	$conn = new PDO($db_dsn, $db_user, $db_pass);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	return $conn;
}

function fetchAllRecords($sql){
	$conn = createConn();

    //Prepare the sql and execute the statment
    $query = $conn -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $query -> execute();
    //Retieve all the rows
    $records = $query -> fetchAll(PDO::FETCH_ASSOC); // fetch becuase only one record
    
    return $records;
	
    $conn = null;
}

?>