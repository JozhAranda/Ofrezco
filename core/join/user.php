<?php
	error_reporting(E_ALL^E_NOTICE);
	include("../ini-val.php");
	include("../connect.php");
	
	session_start(); 
	if (empty($_SESSION['user']) && empty($_SESSION['iduser'])){ header('location: ../../'); }
	
	if(isset($_POST['submit'])){
	
		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = mysql_real_escape_string($data);
			return $data;
		}
	
		$ident = $_SESSION['user'];
		mkdir('../../'.$ident.'/', 0700);
		mkdir('../../'.$ident.'/i/', 0700);

		if ( !empty($_POST['name'])) $name = sanitise_input($_POST["name"]); else $error = true;
		if ( !empty($_POST['firstname'])) $firstname = sanitise_input($_POST["firstname"]); else $error = true;
		if ( !empty($_POST['bio'])) $bio = sanitise_input($_POST["bio"]);
		if ( !empty($_POST['gender'])) $gender = sanitise_input($_POST["gender"]);
		if ( !empty($_POST['scholar'])) $scholar = sanitise_input($_POST["scholar"]);
		if ( !empty($_POST['state'])) $state = sanitise_input($_POST["state"]);
		if ( !empty($error)) { 
			echo '<script language="JavaScript"> alert("Error al registrar"); </script>'; 
			//header('Location: ../../404.html'); die; 
		}
		
		$photo = $_FILES["photo"]['name'];
		
        if(empty($photo)) {
            $directory = "../../img/avatar.jpg";
    	    $photo = dir($directory);
        }
        else {
            move_uploaded_file($HTTP_POST_FILES['photo']['tmp_name'], $ruta_destino);
		    copy($_FILES['photo']['tmp_name'],'../../'.$ident.'/'.$_FILES['photo']['name']);
        }
				
		$insert = $db->query("UPDATE user SET name = '$name', firstname = '$firstname', bio = '$bio', gender = '$gender', scholar = '$scholar',         state = '$state', photo = '$photo' WHERE username = '$ident'");
		
		if(isset($insert)){
			echo '<script language="JavaScript"> alert("Registro insertado correctamente"); </script>';
			$post = fopen('../../'.$ident.'/index.php', "w+");
			$post2 = fopen('../../'.$ident.'/i/index.php', "w+");
			
			if($post == false && $post2 == false)
				die("No se ha podido crear el archivo.");
			else {
    			fwrite($post,"<?php include('../cgi/profile.php'); ?>");
    			fclose($post);
    			fwrite($post2,"<?php include('../../cgi/new_gigs.php'); ?>");
    			fclose($post2);		
				header('location: ../../');
			}
		}
		else{ 
			echo '<script language="JavaScript"> alert("Error al registrar"); </script>';
			//header('Location: ../error.html'); 
		}
	}
	else{
		echo '<script language="JavaScript"> alert("Error al registrar"); </script>';
		//header('Location: ../error.html'); 
	}
	mysql_close($conection);
?>