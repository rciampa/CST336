/**
 * @author Richard Ciampa
 */

var dataUri = "./oe-data-access.php?";

function getOpenOrders() {
	dataUriCall = dataUri + "fnc=OpenOrders" + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cbGetOpenOrders();
	}, true, null);
}

/*
 * Call back function for the getOpenOrders() function call. Used to
 * retrieve all open orders in the Otter Express database system
 */
function cbGetOpenOrders() {
	document.getElementById("data-content").innerHTML = xmlhttpRequest.responseText;
}

/*
 * Get the information on orders of a client
 */
function getClientOrders() {
	client = document.getElementById("lastName").value;
	dataUriCall = dataUri + "fnc=findClientOders&client=" + client + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cbGetClientOrders();
	}, true, null);
	
	uiClientOrdersSql();
	
	document.title = titlePart + ": Client Orders (" + client + ")";
}

/*
 * Call back function for the getClientOrders() function call
 */
function cbGetClientOrders() {
	document.getElementById("data-client-orders").innerHTML = xmlhttpRequest.responseText;
}

/*
 * Retireives all the clients in the Otter Express database
 */
function getAllClients() {
	dataUriCall = dataUri + "fnc=allClients" + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cbGetAllClients();
	}, true, null);
	
	uiClientsSql();
}

/*
 * Call back function for the getAllClients() function call
 */
function cbGetAllClients() {
	document.getElementById("data-content").innerHTML = xmlhttpRequest.responseText;
}

/*
 * Gets the dashboard objects for display
 */
function getDashboard() {
	dataUriCall = dataUri + "fnc=dashboard" + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cbGetDashboard();
	}, true, null);
	
	uiDashboardSql();
}

/*
 * Call back function for the getDashboard() function call
 */
function cbGetDashboard(){
	document.getElementById("data-content").innerHTML = xmlhttpRequest.responseText;
}

/*
 * Get the order history by client
 */
function getOrderHistory(){
		dataUriCall = dataUri + "fnc=orderHist" + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cbGetOrderHistory();
	}, true, null);
	
	uiOrderHistorySql();
}

/*
 * Call back function for the getOderHistry() function call
 */
function cbGetOrderHistory(){
	document.getElementById("data-content").innerHTML = xmlhttpRequest.responseText;
}

/*
 * Get clients without orders
 */
function getClientsWithoutOrders(){
		dataUriCall = dataUri + "fnc=clientWoOrders" + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cbGetClientsWithoutOrders();
	}, true, null);
	
	uiClientWithoutOrders();
}

/*
 * Call back function for the getOrderHistory() function call
 */
function cbGetClientsWithoutOrders(){
	document.getElementById("data-content").innerHTML = xmlhttpRequest.responseText;
}

/*
 * Get product volume
 */
function getProductVolume(){
		dataUriCall = dataUri + "fnc=productVol" + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cbGetProductVolume();
	}, true, null);
	
	uiProductVolume();
}

/*
 * Call back function for the getProductVolume() function call
 */
function cbGetProductVolume(){
	document.getElementById("data-content").innerHTML = xmlhttpRequest.responseText;
}

