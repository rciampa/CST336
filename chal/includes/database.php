<?php

include_once 'conn.inc.php';

if (isset($_GET['letter']) && isset($_GET['time'])) {
	insertGameData($_GET['letter'] . $_GET['time']);
}

function insertGameData() {
	$sql = "INSERT INTO `ca_letterTime`(`letter`, `duration`) VALUES (:letter,:time)";

	$namedParameters = array();
	$namedParameters[':letter'] = $_GET['letter'];
	$namedParameters[':time'] = $_GET['time'];
	
	insertRecord($sql, $namedParameters);

}

function insertRecord($sql, $namedParameters = array()) {

	$conn = createSqlConn();
	//Prepare the sql and execute the statment
	$scolar = $conn -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$scolar -> execute($namedParameters);

}
?>
