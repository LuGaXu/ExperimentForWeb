

function get_user_name(){

	var url="/api/v1/users";

	$.getJSON(url,function (data) {    
		alert(data);
	});

}
