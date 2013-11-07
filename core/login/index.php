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
	include("../connect.php");
	include("../ini-val.php");
	
	if(isset($_POST['login'])){

		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = mysql_real_escape_string($data);
			return $data;
		}  		
		
		$salt ='chirt';    
        function simple_encrypt($text) {
            return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
        }

		if ( !empty($_POST['user_email'])) $user_email = sanitise_input($_POST["user_email"]); else $error = true;
		if ( !empty($_POST['password'])) $password = sanitise_input($_POST["password"]); else $error = true;
		if ( !empty($error)) { 
			//echo '<script language="JavaScript"> alert("Error al acceder"); </script>'; 
			header('Location: ../../404.html'); die; 
		}
		
		$password = simple_encrypt($password);
						
        try {
            $query = $db->query("SELECT * FROM user_pwd WHERE username='$user_email' OR email='$user_email' AND password='$password'");
        }catch(PDOException $e){
	        echo "ERROR: " . $e->getMessage();
    	}
		$var = 0;
        if(isset($query)){
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                if(($username == $row['user_email'] || $email == $row['user_email']) && $password == $row['password']){                  
                    session_start();
                    $string = $_SERVER['HTTP_USER_AGENT']; 
                    $string .= $username; 
                    $_SESSION['iduser'] = sha1($string);
                    $_SESSION['user'] = $row['username'];
                    
                    $verify = $db->query("SELECT name, firstname FROM user WHERE username='$user_email' OR email='$user_email'");
                    $aux = $verify->fetch(PDO::FETCH_ASSOC);
                    if($aux['name'] == null || $aux['firstname'] == null)
                        header('location: ../join/');
                    else { 						
                        session_start();
                        $string = $_SERVER['HTTP_USER_AGENT']; 
                        $_SESSION['error'] = sha1($string);
                        header('Location: ../../');
                    }
                    $var = 1;
                }
                else {
                   echo '<script language="JavaScript"> alert("Acceso invalido!"); </script>';
                } 			
            }
            if ($var == 0){  ?>    
                <div class="container" style="margin-left:16.6%">  
                    <div class="alert alert-error span6" style="margin-left:8.3%">
                        <a href="" class="close" data-dismiss="alert">&times;</a>
                        <h4>Error!</h4> <br><strong>Please check your username/email and password.</strong>
                    </div>                
                    <form accept-charset="UTF-8" action="index.php" method="post" class="span8" style="margin:0;" onSubmit="BorrarAyuda(); return ValidateReg(this);">			
                        <div class="modal-body">
                            <h5 class="text-center">Not a member yet? <a href="#join" data-toggle="modal" data-dismiss="modal" aria-hidden="true">Register now</a> — it's fun and easy!</h5><hr/>				
                            <label>Email/Username<input type="text" id="email_username_log" name="user_email" class="span4 pull-right" autocomplete="off" required/></label><br><br>
                            <label>Password<input type="password" id="password_log" name="password" class="span4 pull-right" autocomplete="off" required/></label><br><br>
                            <span class="span3"></span><input type="checkbox" id="remember" name="remember" style="margin:0;"/> Remember me
                        </div>
                        <div class="modal-footer">
                            <a href="#forgot" class="pull-left" style="margin-top:8px;" data-toggle="modal" data-dismiss="modal" aria-hidden="true">Forgot Password?</a>
                            <button class="btn btn-success" name="login" id="login" type="submit">Login</button>
                        </div>
                    </form>
                </div>
         <?php }
        }
        else{ 
            echo '<script language="JavaScript"> alert("Error al intentar ingresar"); </script>';
            header('Location: ../'); 
        }
    }
	else{
		echo '<script language="JavaScript"> alert("Error al intentar ingresar"); </script>'; 
		//header('Location: ../'); 
	}
	//mysql_close($conection);
?>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>
	</body>
</html>