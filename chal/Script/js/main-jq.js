var d = new Date();
var startTime = d.getTime();//gets the time in miliseconds

function youFoundIt() {

	$("#feedback").html("Awesome!!! You found it!");
	$("#feedback").css("color", "green");
	$("#letterToFind").css("backgroundColor", "yellow");
	$("#letterToFind").parent().css("backgroundColor", "cyan");

	d = new Date();
	var endTime = d.getTime();
	var timeTaken = (endTime - startTime) / 1000;

	$("#timeTaken").html($("#timeTaken").html() + "You took " + timeTaken + " seconds.");
}

function formValidation() {

	if ($("#toFind").val() == $("#toOmit").val()) {
		$("#feedback").html("Letters must be different!");
		$("#feedback").css("color", "red");

		return false;
	}

}

