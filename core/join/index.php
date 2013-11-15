<?php 
    session_start(); 
    if (empty($_SESSION['user']) && empty($_SESSION['iduser']))
        header("location: ../../");
    else {
?>
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8">
        <title>Ofrezco | Join</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap-responsive.css" rel="stylesheet">        
        <!--link href="http://bootswatch.com/2/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet"-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
        <link href="http://blueimp.github.io/jQuery-File-Upload/css/jquery.fileupload.css" rel="stylesheet">
        <link href="../../css/logo.css" rel="stylesheet">
		<style>
            body{font-family:'Open Sans', sans-serif;background:#fbfbfb;}
			.title{font-weight:bold;color:#f9f9f9;font-style:italic;}
			.dropdown-toggle{background:#fff;color:#999;border:2px solid #ddd;}
			.nav{font-size:14px;}
			.navbar .navbar-inner{background:rgb(239,239,233);border-bottom:1px solid #ddd;}
			.dropdown-menu{background:#fff;width:200px;}
			.dropdown-submenu{background:#fff;}
			.dropdown-toggle:hover{background:#fff;color:#999;}
        </style>
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/validations.js" type="text/javascript"></script>
		<script type="text/javascript" src="../../js/jquery-count.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-static-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>                        
                    <a class="brand title" href="../../" style="font-size:30px;">
                        <div class="logo">
                          <div class="box n1"></div>
                          <div class="box n2"></div>
                          <div class="box n3"></div>
                          <div class="box n11"></div>
                          <div class="box n5"></div>
                          <div class="box n6"></div>
                          <div class="box n7"></div>
                          <div class="box n9"></div>
                        </div>
                    </a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><a href=""><span class="label label-success"><?php echo $_SESSION['user']; ?></span></a></li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
        		
        <div class="thumbnails  hidden-phone" style="margin-top:0;border-bottom:2px solid #ddd;">
            <img src="http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_backgrounds/bg-homepage-welcome-new-trees-32849d8f8e18ff4eb284d85c826026b6.png" style="background:url(http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_backgrounds/bg-homepage-welcome-new-clouds-768c386a323ec603c21ac36c23845257.png);"/>
        </div>
        <br><br>
		<div class="container">
            <form accept-charset="UTF-8" action="user.php" method="post" enctype="multipart/form-data" class="well well-small span6" style="margin:0;border:1px solid #ddd;">
                <h3 class="text-center">Please complete the form below to complete your registration.</h3><br>                
                <img src="../../img/avatar.jpg" alt="avatar" class="span2" style="margin:0;"/><br><br>
                <span class="btn btn-success fileinput-button span3" style="margin-top:63px;">
                    <i class="icon-plus" style="margin-top:3px;"></i>
                    <span>Select photo...</span>
                    <input id="fileupload" type="file" name="photo" />
                </span><br><br><br><br><br><br>
                <div class="input-append">
                    <input style="color:#888;" type="text" class="span6" name="name" placeholder="Name" required /> 
                </div><br><br>
                <div class="input-append">
                    <input style="color:#888;" type="text" class="span6" name="firstname" placeholder="Firstname" required />                    
                </div><br><br>
                <textarea class="form-control span6" name="bio" id="contentbox" style="resize:none;color:#888;" placeholder="Your Bio" rows="5"></textarea>
                <div id="count" class="label pull-right" style="margin-top: -10px;">350</div><br>
                <select class="span2" name="gender">
					<option value="" selected="">Gender Select</option>
					<option value="male">Man</option>
					<option value="female">Woman</option>
				</select>
                <select class="span4" name="scholar">
					<option value="" selected="">Scholar Select</option>
					<option value="k12">K-12</option>
					<option value="middle">Junior / Middle</option>
					<option value="highschool">High School / GED</option>
					<option value="college">College / Associate Degree</option>
					<option value="bachelor">Bachelor</option>
					<option value="Master">Master</option>
					<option value="Doctorate">Doctorate</option>
				</select>
                <select class="span6" name="state">
					<option value="" selected="">Select state</option>
					<option value="Aguascalientes">Aguascalientes</option>
					<option value="Baja California">Baja California</option>
					<option value="Baja California Sur">Baja California Sur</option>
					<option value="Campeche">Campeche</option>
					<option value="Coahuila">Coahuila</option>
					<option value="Colima">Colima</option>
					<option value="Chiapas">Chiapas</option>
					<option value="Chihuahua">Chihuahua</option>
					<option value="Distrito Federal">Distrito Federal</option>
					<option value="Durango">Durango</option>
					<option value="Guanajuato">Guanajuato</option>
					<option value="Guerrero">Guerrero</option>
					<option value="Hidalgo">Hidalgo</option>
					<option value="Jalisco">Jalisco</option>
					<option value="México">México</option>
					<option value="Michoacán">Michoacán</option>
					<option value="Morelos">Morelos</option>
					<option value="Nayarit">Nayarit</option>
					<option value="Nuevo">Nuevo León</option>
					<option value="Oaxaca">Oaxaca</option>
					<option value="Puebla">Puebla</option>
					<option value="Querétaro">Querétaro</option>
					<option value="Quintana Roo">Quintana Roo</option>
					<option value="San Luis Potosí">San Luis Potosí</option>
					<option value="Sinaloa">Sinaloa</option>
					<option value="Sonora">Sonora</option>
					<option value="Tabasco">Tabasco</option>
					<option value="Tamaulipas">Tamaulipas</option>
					<option value="Tlaxcala">Tlaxcala</option>
					<option value="Veracruz">Veracruz</option>
					<option value="Yucatán">Yucatán</option>
					<option value="Zacatecas">Zacatecas</option>
				</select><br><br>
                <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">Enviar</button>
            </form>
            <div class="well well-small span5 pull-right" style="border:1px solid #ddd;">
                <h3 class="text-center">¡You can't wait to start, then start the magic!</h3><br>
                <a href="../../" name="skip" class="btn btn-success span4" alt="skip">Skip</a><br><br><br>
                <p>Don't worry, you can always change your profile data.</p>
            </div>
        </div>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>
	</body>
</html>
<?php } ?>