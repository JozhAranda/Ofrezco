<?php
	error_reporting(E_ALL^E_NOTICE);
	include("../../ini-val.php");
	include("../../connect.php");
	
	session_start(); 
	if (empty($_SESSION['user']) && empty($_SESSION['iduser'])){ header('location: ../../../'); }
	
	if(isset($_POST['submita']) || isset($_POST['submitb']) ||isset($_POST['submitc'])){
	
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
        
		$ident = $_SESSION['user'];

		if ( !empty($_POST['name'])) $name = sanitise_input($_POST["name"]); 
		if ( !empty($_POST['firstname'])) $firstname = sanitise_input($_POST["firstname"]); 
		if ( !empty($_POST['bio'])) $bio = sanitise_input($_POST["bio"]);
		if ( !empty($_POST['email'])) $email = sanitise_input($_POST["email"]);
		
		if ( !empty($_POST['current'])) $current = sanitise_input($_POST["current"]);
		if ( !empty($_POST['new'])) $new = sanitise_input($_POST["new"]);
		if ( !empty($_POST['new_2'])) $new_2 = sanitise_input($_POST["new_2"]);
		
		$photo = $_FILES["photo"]['name'];
		$new = encrypt($new);
		$current = encrypt($current); 
        
        if(empty($photo)) {
            $directory = "../../../img/avatar.jpg";
    	    $photo = dir($directory);
        }
        else {
            move_uploaded_file($HTTP_POST_FILES['photo']['tmp_name'], $ruta_destino);
		    copy($_FILES['photo']['tmp_name'],'../../../'.$ident.'/'.$_FILES['photo']['name']);
        }
				
        if(isset($_POST['submita'])){
		    $insert = $db->query("UPDATE user SET bio = '$bio', photo = '$photo' WHERE username = '$ident'");
            header('location: index.php?var=success');
        }
        elseif(isset($_POST['submitb'])){
            $insert = $db->query("UPDATE user SET name = '$name', firstname = '$firstname', email = '$email' WHERE username = '$ident'");
            header('location: index.php?var=success');
        }
        elseif(isset($_POST['submitc'])){
            $query = $db->query("SELECT password FROM user_pwd WHERE username = '$ident'");
            $row = $query->fetch(PDO::FETCH_ASSOC);
            if($current == $row['password']){            
                $insert = $db->query("UPDATE user_pwd SET password = '$new' WHERE username = '$ident'");
                header('location: index.php?var=success');
            }
        }
		else{ 
			echo '<script language="JavaScript"> alert("Error al registrar1"); </script>';
			//header('Location: ../error.html'); 
		}
	}
	else{
		echo '<script language="JavaScript"> alert("Error al registrar2"); </script>';
		//header('Location: ../error.html'); 
	}
	//mysql_close($conection);
?>