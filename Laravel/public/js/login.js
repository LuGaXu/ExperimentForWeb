
function login(){

	var email=$("#email").val();
	var password=$("#password").val();
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
 		alert ("Browser does not support HTTP Request")
 		return
 	}
 	xmlHttp.onreadystatechange=login_callback
	xmlHttp.open("POST", "user/login", true);
	xmlHttp.setRequestHeader("Content-Type",
			"application/x-www-form-urlencoded");
	xmlHttp.send("email="+email+"&password="+password);

}

function login_callback(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
		//alert("status="+xmlHttp.status);
		if (xmlHttp.status == 200) {
		 	alert(xmlHttp.responseText);
		}
	}
}

function GetXmlHttpObject(){
	var xmlHttp=null;
	try{
 	// Firefox, Opera 8.0+, Safari
 		xmlHttp=new XMLHttpRequest();
 	}catch (e){
    // Internet Explorer
    	try{
  			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  		}catch (e){
  			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
 	}
	return xmlHttp;
}