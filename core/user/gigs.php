<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8">
        <title>Ofrezco: Graphics, marketing, fun, and more online services for $5</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ofrezco: Graphics, marketing, fun, and more online services for $5">
        <meta name="author" content="Noobtty">
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap-responsive.css" rel="stylesheet">
        <!--link href="http://bootswatch.com/2/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet"-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
		<style>
            body{font-family:'Open Sans', sans-serif;background:#f5f5f5;}
        </style>
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
        <script src="../js/validations.js" type="text/javascript"></script>
    </head>
    
    <body>
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
			//$data = mysql_real_escape_string($data);
			return $data;
		}
	
		if ( !empty($_POST['title'])) $title = sanitise_input($_POST["title"]); else $error = true;
		if ( !empty($_POST['subcategory'])) $subcategory = sanitise_input($_POST["subcategory"]); else $error = true;
		if ( !empty($_POST['time'])) $time = sanitise_input($_POST["time"]);
		if ( !empty($_POST['description'])) $description = sanitise_input($_POST["description"]);
		if ( !empty($_POST['instruction'])) $instruction = sanitise_input($_POST["instruction"]);
		if ( !empty($error)) { 
			echo '<script language="JavaScript"> alert("Error al registrar"); </script>'; 
			//header('Location: ../../404.html'); die; 
		}
		
		$date = date('Y/m/d H:m:s');
		$photo = $_FILES["photo"]['name'];
		move_uploaded_file($HTTP_POST_FILES['photo']['tmp_name'], $ruta_destino);
		copy($_FILES['photo']['tmp_name'],'../../'.$_SESSION['user'].'/i/'.$_FILES['photo']['name']);
        
        $query = $db->query("SELECT id_category FROM subcategory WHERE subcategory = '$subcategory'");
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $category = $row['id_category'];
        		
		$insert = $db->query("INSERT INTO ".$_SESSION['user']."(title, category, subcategory, photo, time, description, instruction, date) VALUES ('$title', '$category', '$subcategory', '$photo', '$time', '$description', '$instruction', '$date')");
		
		if(isset($insert)){
			     ?>
			     <div class="container" style="margin-left:16.6%">  
                    <div class="alert alert-success span6" style="margin-left:8.3%">
                        <a href="" class="close" data-dismiss="alert">&times;</a>
                        <h4>Success!</h4> <br><strong>You did it, you're inside.</strong>
                    </div>                
                    <div class="well well-small span8" style="margin:0;">			
                        <div class="modal-body">
                            <a href="../../" class="btn btn-success" style="margin-left:16.6%">Return home</a>
                        </div>
                    </div>
                </div><?php
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
?>