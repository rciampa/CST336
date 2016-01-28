<?php
include_once './includes/genericDataAccess.inc.php';

session_start();

if (isset($_POST['loginForm'])) {//checks whether user submitted the form

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * 
            FROM oe_admin
            WHERE username = :username
            AND password = :password";

	$namedParameters = array();
	$namedParameters[':username'] = $username;
	$namedParameters[':password'] = $password;

	$auth = fetchRecord($sql, $namedParameters);

	if (empty($auth)) {//wrong username or password

		echo "Wrong username or password!";

	} else {

		$_SESSION['username'] = $record['username'];
		$_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];

		header("Location: products.php");

	}
}
?>