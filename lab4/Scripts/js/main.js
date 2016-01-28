function updatePrice(elmt) {
	school = elmt.options[elmt.selectedIndex].value;
	cost = "";
	switch(school){
		case "sjsu":
		cost = "$10.00";
		break;
		case "ucsc":
		cost = "$100.00";
		break;
		default:
		cost = "$0.00";
	}
	
	document.getElementById("cost").innerHTML = cost;
}
