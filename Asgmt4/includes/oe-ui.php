<?php


function uiClientOrders($clientOdrers) {

	echo "<table class='dataTable'>\n"
	     . "<tr>\n"
	     . "<th>Order ID</th>"
	     . "<th>Date Time</th>"
	     . "<th>Time Requested</th>"
	     . "<th>Building Requested</th>"
	     . "<th>Office Number</th>"
	     . "</tr>";
	
	$i = 0;
	foreach ($clientOdrers as $row) {
		if ($i++ % 2 == 0) {
			echo "<tr class='dataHighliteRow'>";
		} else {
			echo "<tr>";
		}
		echo "<td>" . $row['orderId'] . "</td>";
		echo "<td>" . $row['dateTime'] . "</td>";
		echo "<td>" . $row['timeRequested'] . "</td>";
		echo "<td>" . $row['buildingRequested'] . "</td>";
		echo "<td>" . $row['officeNumber'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
}

function uiAllClients($clients){
	
	echo "<table class='dataTable'>\n"
	     . "<tr>\n"
	     . "<th>ID</th>"
	     . "<th>First</th>"
	     . "<th>Last</th>"
	     . "<th>Phone</th>"
	     . "<th>Email</th>"
	     . "<th>college</th>"
	     . "<th>Building</th>"
	     . "<th>Office</th>"
	     . "</tr>";
	
	$i = 0;
	foreach ($clients as $row) {
		if ($i++ % 2 == 0) {
			echo "<tr class='dataHighliteRow'>";
		} else {
			echo "<tr>";
		}
		echo "<td>" . $row['otterId'] . "</td>";
		echo "<td>" . $row['firstName'] . "</td>";
		echo "<td>" . $row['lastName'] . "</td>";
		echo "<td>" . $row['phone'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['collegeName'] . "</td>";
		echo "<td>" . $row['buildingName'] . " (" . $row['buildingNumber'] . ")</td>";
		echo "<td>" . $row['officeNumber'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	
}

function uiDashboard($dashboardItems){
	

	foreach ($dashboardItems as $key => $value) {
		echo "<div class='dashboard-item'>";
		echo "<span class='dashboard-item-value'>" . $value . "</span>";
		echo "<p>" . $key . "</p>";
		echo "</div>";
	}
	
}

function uiOrderHistory($orderHistory){
	
		echo "<table class='dataTable'>\n"
	     . "<tr>\n"
	     . "<th>Client</th>"
	     . "<th>Contact</th>"
	     . "<th>Order Info</th>"
	     . "<th>Total</th>"
	     . "</tr>";
	
	$i = 0;
	foreach ($orderHistory as $row) {
		if ($i++ % 2 == 0) {
			echo "<tr class='dataHighliteRow'>";
		} else {
			echo "<tr>";
		}
		echo "<td>" . $row['firstName'] . ", " . $row['lastName'] . "</td>";
		
		echo "<td><a href='tel:" . $row['phone'] . "'>". $row['phone'] . "</a><br/>" 
		     . "<a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a></td>";
		
		echo "<td>" . "Order ID: " . $row['orderId'] . " Deliver by: " . $row['timeRequested'] . "<br/>"
		      . "Item: " . $row['productName'] . "<br/> Price: $" . $row['price'] 
		      . " Qty: " . $row['qty'] . "</td>";
		
		echo "<td>$" . $row['Total'] . "</td>";
		
		echo "</tr>";
	}

	echo "</table>";
}

function uiClentsWithoutOrders($clients){
		
		echo "<table class='dataTable'>\n"
	     . "<tr>\n"
	     . "<th>Client</th>"
	     . "<th>Contact</th>"
	     . "<th>Building</th>"
	     . "</tr>";
	
	$i = 0;
	foreach ($clients as $row) {
		if ($i++ % 2 == 0) {
			echo "<tr class='dataHighliteRow'>";
		} else {
			echo "<tr>";
		}
		echo "<td>" . $row['firstName'] . ", " . $row['lastName'] . " (" 
		     . $row['otterId']  . ")</td>";
		
		echo "<td><a href='tel:" . $row['phone'] . "'>". $row['phone'] . "</a><br/>" 
		     . "<a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a></td>";
		
		echo "<td>" . $row['buildingName'] . " (" . $row['buildingNumber'] . ")</td>";
		
		echo "</tr>";
	}

	echo "</table>";
}

function uiGetProductVolume($report)
{
		echo "<table class='dataTable'>\n"
	     . "<tr>\n"
	     . "<th>Product ID</th>"
	     . "<th>Name</th>"
	     . "<th>Price</th>"
	     . "<th>Qty Sold</th>"
	     . "<th>Sales</th>"
	     . "</tr>";
	
	$i = 0;
	foreach ($report as $row) {
		if ($i++ % 2 == 0) {
			echo "<tr class='dataHighliteRow'>";
		} else {
			echo "<tr>";
		}
		echo "<td>" . $row['productId'] . "</td>";
		echo "<td>" . $row['productName'] . "</td>";
		echo "<td class='sales-total'>$" . $row['price'] . "</td>";
		echo "<td>" . $row['qty'] . "</td>";
		if($row['Sales'] == "" || $row['Sales'] == null){
			echo "<td class='sales-total'> -- </td>";
		}else{
		    echo "<td class='sales-total'>$" . $row['Sales'] . "</td>";
		}
		echo "</tr>";
	}

	echo "</table>";
}

?>