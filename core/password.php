<?php
	error_reporting(E_ALL^E_NOTICE);
	include("connect.php");
	include("ini-val.php");
	
	if(isset($_POST['pass_forgot'])){

		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = mysql_real_escape_string($data);
			return $data;
		}
    
        $salt ='chirt';    
        function encrypt($text) {
            return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB,       mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
        }
    
		if ( !empty($_POST['email_recover'])) $email_recover = sanitise_input($_POST["email_recover"]); else $error = true;
		if ( !empty($error)) { 
			echo '<script language="JavaScript"> alert("Error al acceder"); </script>'; 
			//header('Location: ../../404.html'); die; 
		}
						
		$recover = $db->query("SELECT email, password FROM user_pwd WHERE email = '$email_recover'");
		
        if(isset($recover)) {            
            $token_email = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);
		    $password = encrypt($token_email);
            session_start();
            $string = $_SERVER['HTTP_USER_AGENT']; 
            $_SESSION['token_email'] = sha1($string);
            header('location: ../');
        }	
        else{ 
            echo '<script language="JavaScript"> alert("Error al intentar ingresar"); </script>';
            //header('Location: ../'); 
        }
    }
	else{
		echo '<script language="JavaScript"> alert("Error al intentar ingresar"); </script>';
		//header('Location: ../'); 
	}
	mysql_close($conection);
?>