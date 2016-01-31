<?php
//Start a new server side session
session_start();

/*
 * We create a server side session variable of type array
 * to hold the fields that contain missing data. The seesion
 * variable is ONLY avaiable from the server that origianlly
 * hadeled the session variable creation unless SQL session
 * state has been enabled.
 */
$_SESSION['errors'] = array();
$_SESSION['state'] = array("vConvert" => "");

/*
 * Lets check to see if all the fiels are
 * present in the query string
 */
foreach ($_GET as $key => $value) {
	if (empty($value)) {
		$_SESSION['errors'][] = $key;
	} else {
		$_SESSION['state'][$key] = $value;
	}
}

/*
 * Redirect the user if we have missing data
 */
if (count($_SESSION['errors']) > 0) {
	header("Location:index.php");
} else {
	session_destroy();
}


function getConvertValue() {
	return (isset($_GET['vConvert'])) ? $_GET['vConvert'] : 0;
}

function getMaxVoltage() {
	return (isset($_GET['mvValue'])) ? $_GET['mvValue'] : 0;
}

function doConversion($value) {
	if ($_GET['convertFrom'] == "oz-in") {
		return convertOzToKg($value) . " Kg-cm";
	} else {
		return convertKgToOz($value) . " Oz-in";
	}
}

function convertKgToOz($value) {
	return number_format(($value * 35.27396) / 2.54, 2);
}

function convertOzToKg($value) {
	return number_format(($value * 0.02835) * 2.54, 2);
}

function voltageTable() {
	$volts = getMaxVoltage();
	$degrade = 0;
	$table = "";
	$table = "\n<table id='torque-degrade'>";
	$table .= "\n<tr>";

	do {
		$table .= "\n<th>@" . number_format($volts, 1) . " Volts</th>";
		$volts -= 1;
	} while($volts > 4.4);

	$table .= "\n</tr>";

	$volts = getMaxVoltage();

	$table .= "\n<tr>";
	
	do {
		$table .= "\n<td>" . 
		          number_format((doConversion(getConvertValue()) - (doConversion(getConvertValue())* $degrade)),2)
				  . "</td>";
		$volts -= 1;
		$degrade += .15;
	} while($volts > 4.4);

	$table .= "\n</tr>";

	$table .= "\n</table>\n";

	return $table;
}
?>