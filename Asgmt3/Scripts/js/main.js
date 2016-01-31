function onVoltChange(obj) {
	var volt = obj.value;
	document.getElementById("opp-volt").innerHTML = volt + " Volts";
}

function convertFromTo(obj) {
	if (obj.id == "oz") {
		document.getElementById("conversionUnits").innerHTML = "To: Kg-cm";
		document.getElementById("servoTorqueValue").placeholder = "in Oz-in";
	} else {
		document.getElementById("conversionUnits").innerHTML = "To: Oz-in";
		document.getElementById("servoTorqueValue").placeholder = "in Kg-cm";
	}
}

function clearForm() {
	document.getElementById("servoTorqueValue").placeholder = "in Kg-cm";
	document.getElementById("conversionUnits").innerHTML = "To: Oz-in";
	document.getElementById("opp-volt").innerHTML = "6.6 Volts";
	document.getElementById("rec").innerHTML = "";

}


