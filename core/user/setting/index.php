<?php
    error_reporting(E_ALL^E_NOTICE);
	include("../../ini-val.php");
	include("../../connect.php");
	session_start();
    $user = $_SESSION['user'];
    $user2 = $_COOKIE['user'];
    $verify = $db->query("SELECT * FROM user WHERE username='$user' OR username='$user2'");
    $aux = $verify->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8">
        <title>Ofrezco: Graphics, marketing, fun, and more online services for $10</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ofrezco: Graphics, marketing, fun, and more online services for $5">
        <meta name="author" content="Noobtty">
        <!--link href="../../../css/bootstrap.css" rel="stylesheet">
        <link href="../../../css/bootstrap-responsive.css" rel="stylesheet"-->
        <link href="http://bootswatch.com/2/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
        <link href="http://blueimp.github.io/jQuery-File-Upload/css/jquery.fileupload.css" rel="stylesheet">
		<style>
            body{font-family:'Open Sans', sans-serif;background:#f9f9f9; padding-top:100px;}
			.title{font-weight:bold;color:#f9f9f9;font-style:italic;}
			.dropdown-toggle{background:#fff;color:#999;border:2px solid #ddd;}
			.nav{font-size:14px;}
			.dropdown-menu{background:#fff;width:200px;}
			.dropdown-submenu{background:#fff;}
			.dropdown-toggle:hover{background:#fff;color:#999;}
        </style>
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
        <script src="../../../js/validations.js" type="text/javascript"></script>
    </head>
    
    <body>        
        <?php if (isset($_COOKIE['user']) || (isset($_SESSION['user']) && isset($_SESSION['iduser']))){ ?>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand title" href="../../../" style="font-size:30px;">Ofrezco!</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="divider-vertical"></li>
                            <li><a href="../../../">HOME</a></li>
                            <li class="divider-vertical"></li>
                            <li><a href="#"><span class="label label-success">1</span> TO DO</a></li>
                            <li class="divider-vertical"></li>
                            <li><a href="#"><img src="../../../img/chat.png" alt="conversation"></a></li> 
                            <li class="divider-vertical"></li>
                            <li><a href="#">SHOPPING</a></li>  
                            <li class="divider-vertical"></li>
                            <li><a href="#">START SELLING</a></li> 
                            <li class="divider-vertical"></li> 
                            <li class="divider-vertical"></li>                            
                            
                            <li class="dropdown"><a href="#" class="dropdown-toggle" style="background:rgb(44, 62, 80);border:0;" data-toggle="dropdown"><?php echo $_SESSION['user']; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background:rgb(100, 100, 100);">
                                    <li><a href=""><i class="icon-cog"></i> Setting</a></li>
                                    <li><a href="../../../help/support.php"><i class="icon-envelope"></i> Contact Support</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../../logout.php"><i class="icon-off"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if($_GET['var']) {?>
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> your profile has been updated successfully.
            </div>
            <?php } ?>
            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#public_profile" data-toggle="tab">Public Profile Settings</a></li>
                    <li><a href="#account_settings" data-toggle="tab">Account Settings</a></li>
                    <li><a href="#change_password" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="public_profile">
                        <div class="well well-small span8" style="margin-left:16.9%;">
                            <form accept-charset="UTF-8" action="update.php" method="post" enctype="multipart/form-data">
                                <h2>Public Profile Settings</h2><hr><br>
                                <p class="span3">Profile Photo</p>
                                <div class="span5 pull-right" style="margin-bottom:15px;">                
                                    <img src="../../../<?php echo $_SESSION['user'].'/'.$aux['photo']; ?>" alt="avatar" class="span2 pull-left" style="margin-top:-50px;"/>
                                    <p class="span2" style="margin-top:-35px;">This photo is your identity on Ofrezco! and appears on your profile.</p>
                                    <span class="btn btn-success fileinput-button span2" style="margin-left: 20px;">
                                        <i class="icon-plus" style="margin-top:3px;"></i>
                                        <span>Select photo...</span>
                                        <input id="fileupload" type="file" name="photo" />
                                    </span>
                                </div>
                                <p class="span3">Something About You<br> (150 - 300 characters)</p>
                                <textarea class="form-control span5 pull-right" name="bio" id="contentbox" style="resize:none;color:#888;margin-top:-50px;" placeholder="Your Bio" rows="5" maxlength="350"><?php echo $aux['bio']; ?></textarea>
                                <div id="count" class="label pull-right" style="margin-top:58px;">350</div><br>
                                <!--p class="span3">Your location</p>
                                <select class="span5 pull-right" name="state">
                                    <option value="" selected="">Select state</option>
                                    <option value="k12">K-12</option>
                                </select-->
                                <!--select class="span2 pull-right" name="city">
                                    <option value="" selected="">Scholar Select</option>
                                    <option value="k12">K-12</option>
                                </select-->
                                <button type="submit" class="btn btn-primary span3 pull-right" style="margin:15px;" name="submita" id="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="account_settings">                        
                        <div class="well well-small span8" style="margin-left:16.9%;">
                            <form accept-charset="UTF-8" action="update.php" method="post" enctype="multipart/form-data">
                                <h2>Account Settings </h2><hr><br>
                                <span class="span2 pull-left">Name</span><input style="color:#888;" type="text" class="span5 pull-right" name="name" placeholder="Name" value="<?php echo $aux['name']; ?>"/> 
                                <br><br><br>
                                <span class="span2 pull-left">Last name</span><input style="color:#888;" type="text" class="span5 pull-right" name="firstname" placeholder="Firstname" value="<?php echo $aux['firstname']; ?>"/> 
                                <br><br><br>   
                                <span class="span2 pull-left">Email</span><input style="color:#888;" type="email" class="span5 pull-right" name="email" placeholder="Email" value="<?php echo $aux['email']; ?>"/> 
                                <br><br><br>                                
                                <button type="submit" class="btn btn-primary span3 pull-right" style="margin:15px;" name="submitb" id="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="change_password">                    
                        <div class="well well-small span8" style="margin-left:16.9%;">
                            <form accept-charset="UTF-8" action="update.php" method="post" enctype="multipart/form-data">
                                <h2>Change Password</h2><hr><br>
                                <span class="span2 pull-left">Current Password</span><input style="color:#888;" type="password" class="span5 pull-right" name="current" required /> 
                                <br><br><br>
                                <span class="span2 pull-left">New Password</span><input style="color:#888;" type="password" class="span5 pull-right" name="new" required /> 
                                <br><br><br>   
                                <span class="span2 pull-left">Confirm Password</span><input style="color:#888;" type="password" class="span5 pull-right" name="new_2" required /> 
                                <br><br><br>                                
                                <button type="submit" class="btn btn-primary span3 pull-right" style="margin:15px;" name="submitc" id="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--div class="well well-small span3 pull-right" style="margin:0;">
                <h5>Actions</h5><hr>
                <p><a href="#public_profile" data-toggle="tab">Public Profile Settings</a></p>
                <p><a href="">Account Settings</a></p>
                <p>Change Password</p>                
            </div-->
        </div>
        <?php } ?>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>
		<script type="text/javascript" src="../../../js/jquery-count.js"></script>
	</body>
</html>       