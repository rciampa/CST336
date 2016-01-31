/**
 * @author Richard Ciampa
 */

var dataUri = "./includes/database.php?";

function insertGameData(ltf,t) {
	dataUriCall = dataUri + "letter=" + ltf + "&time=" + t + "&rand=" + Math.random();
	loadAsyncData(encodeURI(dataUriCall), "GET", function() {
		cb();
	}, true, null);
}

/*
 * Call back function for the getOpenOrders() function call. Used to
 * retrieve all open orders in the Otter Express database system
 */
function cb() {

}
