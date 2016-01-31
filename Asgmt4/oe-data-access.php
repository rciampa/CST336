<?php
    include_once './includes/dataAccess.php';
	
	
	switch($_GET['fnc']){
		case 'OpenOrders':
			getOpenOrders();
			break;
		case 'findClientOders':
			if(isset($_GET['client']) && !empty($_GET['client'])){
				getClientOrders($_GET['client']);
			}else{
				echo "missing parameter";
			}
			break;
		case 'allClients':
			getAllClients();
			break;
		case 'dashboard':
			getDashboard();
			break;
		case 'orderHist':
			getOrderHistory();
			break;
		case 'clientWoOrders':
			getClientsWithoutOrders();
			break;
		case 'productVol':
			getProductVolume();
			break;
	}
	
?>