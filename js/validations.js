var pass = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,16})$/;
var usr = /[a-zA-Z0-9]{5,20}$/;
var email = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}$/;

function AyudaUsr() {
	document.getElementById('ayuda').innerHTML="Only alphanumeric characters. Between 5 y 20 length.";
}
function AyudaPass() {
	document.getElementById('ayuda').innerHTML="At least 1 uppercase, 1 lowercase, 1 number. Between 8 and 20 length.";
}
function AyudaEmail() {
	document.getElementById('ayuda').innerHTML="Enter a valid email.";
}

function BorrarAyuda() {
	document.getElementById('ayuda').innerHTML="";
}

function ValidateUsr(campo) {
    if ((campo.value.match(usr)) && (campo.value!='')) {
    	document.getElementById('username').style.borderColor='green';
        document.getElementById('username').style.backgroundColor='white';
        document.getElementById('error').innerHTML="";
        return true;
    } else {
        document.getElementById('username').style.borderColor='red';
        document.getElementById('username').style.backgroundColor='#FFB2B2';
        document.getElementById('ayuda').innerHTML="Only alphanumeric characters. Between 5 y 20 lenght.";
        document.getElementById('error').innerHTML="One ore more fields are invalid";
        return false;
    } 
}

function ValidateEmail(campo) {
    if ((campo.value.match(email)) && (campo.value!='')) {
    	document.getElementById('email').style.borderColor='green';
        document.getElementById('email').style.backgroundColor='white';
        document.getElementById('error').innerHTML="";
        return true;
    } else {
        document.getElementById('email').style.borderColor='red';
        document.getElementById('email').style.backgroundColor='#FFB2B2';
        document.getElementById('error').innerHTML="One ore more fields are invalid"
        return false;
    } 
}

function ValidatePass(campo) {
    if ((campo.value.match(pass)) && (campo.value!='')) {
    	document.getElementById('password').style.borderColor='green';
        document.getElementById('password').style.backgroundColor='white';
        document.getElementById('error').innerHTML="";
        return true;
    } else {
        document.getElementById('password').style.borderColor='red';
        document.getElementById('password').style.backgroundColor='#FFB2B2';
        document.getElementById('error').innerHTML="One ore more fields are invalid";
        return false;
    } 
}

function ValidateReg(frm) {

	if ((ValidateUsr(frm.username) == true) && (ValidatePass(frm.password) == true) && (ValidateEmail(frm.email) == true) && (frm.terms.checked)) {
		return true;
	} else {
		if (!frm.terms.checked) {
			document.getElementById('error').innerHTML="You must accept the terms of service";
		}
		return false;
	}
}

function chk_login(){
    var username=document.getElementById("email_username_log").value;
    var password=document.getElementById("password_log").value;
    var params = "username="+username+"&password="+password;
    var url = "login.php";
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'html',
        data: params,
        beforeSend: function() {
            document.getElementById("status").innerHTML= 'checking...'  ;
        },
        complete: function() {

        },
        success: function(html) {
            document.getElementById("status").innerHTML= html;
            if(html=="success"){
                document.getElementById("status").innerHTML = "hola";
            window.location = "test.php";

            }

        }
    });
}