function getCity() {
	//alert($("#zipCode").val());
	$.ajax({
		type : "get",
		url : "http://hosting.otterlabs.org/laramiguel/ajax/zip.php",
		dataType : "json",
		data : {
			"zip_code" : $("#zipCode").val()
		},
		success : function(data, status) {
			//alert(data["city"]);
			$("#city").html(data["city"]);
			$("#latitude").html(data["latitude"]);
			$("#longitude").html(data["longitude"]);

		},
		complete : function(data, status) {//optional, used for debugging purposes
			//alert(status);
		}
	});

}

function getCounties() {
	$.ajax({
		type : "get",
		url : "http://hosting.otterlabs.org/laramiguel/ajax/countyList.php",
		dataType : "json",
		data : {
			"state" : $("#state").val()
		},
		success : function(data, status) {
			$("#county").html("<option> - Select One - </option>");

			for (var i = 0; i < data['counties'].length; i++) {

				$("#county").append("<option>" + data['counties'][i].county + "</option>");

			}
		},
		complete : function(data, status) {//optional, used for debugging purposes
			//alert(status);
		}
	});
}

function checkPassword() {
	if ($('#password').val().length < 8) {
		$('#passwordError').html("The password must be longer than 8 characters!");
		return;
	}

	if (!/[0-9]/.test($('#password').val())) {
		$('#passwordError').html("The password must have one digit!");
		return;
	}

	if (!/[A-Z]/.test($('#password').val())) {
		$('#passwordError').html("The password must have one uppercase character!");
		return;
	}

}

function checkUsername() {
	//alert($('#username').val());

	if ($('#username').val().length < 5) {

		$('#usernameError').html("Username must be longer than 5 characters!");
		return;

	}

	$.ajax({
		type : "get",
		url : "http://hosting.otterlabs.org/laramiguel/cst336/labs/lab8/verifyUsername.php",
		dataType : "json",
		data : {
			"username" : $('#username').val()
		},
		success : function(data, status) {

			if (data['available'] == "false") {

				$('#usernameError').html("NOT available");
				$('#usernameError').css("color", "red");
				$('#username').css("backgroundColor", "red");
				$('#username').focus();

			} else {

				$('#usernameError').html("Available!");
				$('#usernameError').css("color", "green");
				$('#username').css("backgroundColor", "");

			}

		},
		complete : function(data, status) {//optional, used for debugging purposes
			//alert(status);
		}
	});

}
