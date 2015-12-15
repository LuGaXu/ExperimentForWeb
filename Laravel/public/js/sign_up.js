
var xmlHttp;

var email_valid=false;
var nickname_valid=false;
var pw_valid=false;
var check_pw_valid=false;
var gender_valid=false;

function check_all_valid(){

	//alert(email_valid+" "+nickname_valid+" "+pw_valid+" "+check_pw_valid+" "+gender_valid)

	if(email_valid&&nickname_valid&&pw_valid&&check_pw_valid&&gender_valid){
		$('#submit-button').removeAttr("disabled");
	}else{
		$('#submit-button').attr('disabled','true');
	}
}

function exists_user(email){
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
 		alert ("Browser does not support HTTP Request")
 		return
 	}
	var url="../php/server/check_exist_user.php"
	url=url+"?email="+email
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=exists_user_call_back 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function exists_user_call_back(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 		user_exist=xmlHttp.responseText;
 		if(user_exist=="exist"){
 			$('#email-error').html("邮箱已经存在");
 			email_valid=false;
 		}else{
 			$('#email-error').html("");
 			email_valid=true;
 		}
 		check_all_valid();
 	} 
}

function set_nickname(){
    var nickname=$("#nickname").val();
	if(nickname.length>0){
		nickname_valid=true;
	}else{
		nickname_valid=false;
	}
	check_all_valid();
}

function set_gender(){
	gender_valid=true;
	check_all_valid();
}

function set_password(){
	var p1=$("#password").val();
	var p2=$("#password-verify").val();
	if(p1.length>0){
		pw_valid=true;
		if(p2.length>0){
			check_password();
		}
	}else{
		pw_valid=false;
	}
	check_all_valid();
}

function check_password(){
	var p1=$("#password").val();
	var p2=$("#password-verify").val();

	if(p1!=p2){
		$("#password-verify").css("border-bottom","2px solid #ef5350");
		$("#password-verify").css("box-shadow","0 0 0 0");
		$('#password-error2').html("密码不匹配");
		check_pw_valid=false;
	}else{
		$("#password-verify").css("border-bottom-color","#4CAF50");
		$('#password-error2').html("");
		check_pw_valid=true;
	}
	check_all_valid();
}

//点击 提交 按钮时，执行本方法
function sign_up(){

	xmlHttp=GetXmlHttpObject();

	var email=$("#email").val();
	var password=$("#password").val();
	var gender=$("#gender").val();
	var nickname=$("#nickname").val();
	var user_type=0;

	if (xmlHttp==null){
 		alert ("Browser does not support HTTP Request")
 		return
 	}

 	xmlHttp.onreadystatechange = sign_up_callback;
	xmlHttp.open("POST", "../php/server/sign_up.php", false);
	xmlHttp.setRequestHeader("Content-Type",
			"application/x-www-form-urlencoded");
	xmlHttp.send("email=" + email+"&nickname="+nickname+
		"&gender="+gender+"&password="+password+"&user_type="+user_type);

}

function sign_up_callback(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
		
		if (xmlHttp.status == 200) {
			//alert("status="+xmlHttp.status)
		    window.location.href="index.html"
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