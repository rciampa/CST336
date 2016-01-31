var d = new Date();
var startTime = d.getTime();
//gets the time in miliseconds

function youFoundIt() {
	document.getElementById("feedback").innerHTML = "You found it!";
	document.getElementById("feedback").style.color = "green";
	document.getElementById("letterToFind").style.backgroundColor = "yellow";
	var ltfParent = document.getElementById("letterToFind").parentElement;
	ltfParent.style.backgroundColor = "cyan";

	d = new Date();
	var endTime = d.getTime();
	var timeTaken = endTime - startTime;

	document.getElementById("time").innerHTML = "Time taken: " + Math.round(timeTaken / 1000) + " seconds";
	
	if(Math.round(timeTaken / 1000) < 3){
		document.getElementById("feedback").innerHTML += "You found it! Awesome!!!";
	}
	
	ltf = document.getElementById("letterToFind").innerHTML;
	
	insertGameData(ltf, timeTaken);
	
}
