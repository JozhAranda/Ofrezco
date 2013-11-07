<?php
	error_reporting(E_ALL^E_NOTICE);
	include("../connect.php");
	include("../ini-val.php");
	
	if(isset($_POST['join'])){

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
    
		if ( !empty($_POST['username'])) $username = sanitise_input($_POST["username"]); else $error = true;
		if ( !empty($_POST['email'])) $email = sanitise_input($_POST["email"]); else $error = true;
		if ( !empty($_POST['password'])) $password = sanitise_input($_POST["password"]); else $error = true;
		//if ( !empty($_POST['token'])) $token = sanitise_input($_POST["token"]); else $error = true;
		if ( !empty($error)) { 
			echo '<script language="JavaScript"> alert("Error al acceder"); </script>'; 
			//header('Location: ../../404.html'); die; 
		}
		
		$token_url = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 36);
		$password = encrypt($password);		
				
		$register = $db->query("INSERT INTO user_pwd (username, email, password, token) VALUES ('$username', '$email', '$password', '$token_url')");
        
		
        if($register) {
            //include('function.php');
            $date = date("Y/m/d H:i:s");            
            $register = $db->query("INSERT INTO user (username, email, date) VALUES ('$username', '$email', '$date')");
            $create = $db->query("CREATE TABLE ".$username."(id int AUTO_INCREMENT PRIMARY KEY, title varchar(55) NOT NULL, category         varchar(25) NOT NULL, subcategory varchar(45) NOT NULL, photo longblob NOT NULL, time varchar(10) NOT NULL, description text NOT NULL, instruction longtext NOT NULL, date datetime NOT NULL)");
            session_start();
            $string = $_SERVER['HTTP_USER_AGENT']; 
            $string .= $username; 
            $_SESSION['iduser'] = sha1($string);
            $_SESSION['user'] = $username; 
            header('location: ../join/');
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