/*
 * The asynchronous remote data functino to
 * call for all remote data requests
 */

/*
 * @url the url of the remote end point.
 */
function loadAsyncData(url, recMethod, cfunc, isAsync, pstDataStr) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttpRequest = new XMLHttpRequest();
	} else {// code for IE6, IE5
		try {
			xmlhttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
		} catch(e) {
			alert('Exeption: ' + e.description);
		}
	}

	if (!xmlhttpRequest) {
		alert('Giving up :-( Cannot create an XMLHTTP instance');
		return false;
	}

	//Here is the function passed in to handle
	//on ready state changed
	xmlhttpRequest.onreadystatechange = function(){
		if (xmlhttpRequest.readyState == 4 && xmlhttpRequest.status == 200) {
			cfunc(xmlhttpRequest);
		}
	};

	xmlhttpRequest.open(recMethod, url, isAsync);

	if (recMethod == "GET") {
		xmlhttpRequest.send(null);
	} else {
		xmlhttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttpRequest.send(pstDataStr);
	}
}