<?php
    error_reporting(E_ALL^E_NOTICE);
	include("../../core/ini-val.php");
	include("../../core/connect.php");
	session_start();
	function url(){
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url = substr($url, 25, -3);
        return $url;
    }
    $_SESSION['url'] = url();
    if(trim($_SESSION['url']) == $_SESSION['user']) {
        $aux = $_SESSION['user'];
        $user = $db->query("SELECT username, photo, scholar, bio, gender FROM user WHERE username = '$aux'");
        $row = $user->fetch(PDO::FETCH_ASSOC);
    }
    else {
        header('location: ../../');
    }
?>
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8">
        <?php if (!empty($_SESSION['user'])) echo "<title>". $_SESSION['user'] ." | Ofrezco</title>"; 
        else echo "<title>".$_SESSION['url']."| Ofrezco</title>";?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ofrezco: Graphics, marketing, fun, and more online services for $10">
        <meta name="author" content="Noobtty">
        <!--link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet"-->
        <link href="http://bootswatch.com/2/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
        <link href="http://blueimp.github.io/jQuery-File-Upload/css/jquery.fileupload.css" rel="stylesheet">
		<style>
            body{font-family:'Open Sans', sans-serif;background:#fbfbfb;}
			.title{font-weight:bold;color:#f9f9f9;font-style:italic;}
			.dropdown-toggle{background:#fff;color:#999;border:2px solid #ddd;}
			.nav{font-size:14px;}
			.navbar .nav > li > a {color:rgb(24, 188, 156);}
			.navbar .navbar-inner{background:rgb(239,239,233);border-bottom:1px solid #ddd;}
			.dropdown-menu{background:#fff;width:210px;}
			.dropdown-submenu{background:#fff;}
			.dropdown-toggle:hover{background:#fff;color:#999;}
            .dropdown-menu > li > a:hover {background:#eee;}
        </style>
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
    </head>
    
    <body>
		<div style="height:3px;width:100%;background:url('https://d1wzu4qct23er4.cloudfront.net/assets/header_bar-cea2b632849690f1767c50d053c9100f.png') repeat scroll center top transparent;"></div>
        <div class="navbar navbar-static-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand title" href="../../" style="font-size:30px;">Ofrezco!</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><a href="../../">HOME</a></li>
                            <li><a href="#"><span class="label label-success">1</span> TO DO</a></li>
                            <li><a href="#"><img src="../img/chat.png" alt="conversation"></a></li> 
                            <li><a href="#">SHOPPING</a></li>  
                            <li><a href="">START SELLING</a></li> 
                            
                            <li class="dropdown"><a href="#" class="dropdown-toggle" style="background:rgb(239,239,233);border:0;" data-toggle="dropdown"><?php echo $_SESSION['user']; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background:rgb(150, 150, 150);">
                                    <li><a href="../core/user/setting/"><i class="icon-cog"></i> Setting</a></li>
                                    <li><a href="../help/support.php"><i class="icon-envelope"></i> Contact Support</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../core/logout.php"><i class="icon-off"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="span12" style="margin-bottom:30px;"></div>        
        <div class="container">
            <img class="span2" style="margin:0;padding-right:10px;" src="../<?php echo $row['photo']; ?>" alt="<?php echo $row['username']; ?>">
            <div class="span8">
                <h2><?php if(trim($_SESSION['url']) == $_SESSION['user']) { echo $_SESSION['user']; } else { echo $_SESSION['url']; } ?></h2>
                <p><strong>Scholar: </strong><?php echo $row['scholar']; ?> | <strong>Gender: </strong><?php echo $row['gender']; ?></p>
                <p><?php echo $row['bio']; ?></p>  
            </div>
        </div>
        <hr style="border:1px solid #eee;">
        
        <div class="span12" style="margin-bottom:30px;"></div>        
        <div class="container">        
            <form accept-charset="UTF-8" action="../../core/user/gigs.php" method="post" enctype="multipart/form-data" class="well well-small span8" style="margin:0;">
                <h2 style="font-weight:400">Create a new Ofrezco.</h2><br>                
                <div class="input-append">
                    <textarea style="resize:none;font-size:28px;color:#888;" type="text" class="form-control span8" name="title" placeholder="I will do something i'm really good at" rows="4" id="contentbox1" required></textarea>
                    <div id="count1" class="label pull-right" style="margin-top: -10px;">50</div><br>
                </div><br>
                <!--select class="span4" name="category">
					<option value="" selected="">Select a Category</option>
                    <?php $category = $db->query("SELECT category FROM category");
                    while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>
					    <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
				    <?php } ?>
				</select-->
                <select class="span4" name="subcategory">
					<option value="" selected="">Select a Subcategory</option>
                    <?php $category = $db->query("SELECT subcategory FROM subcategory");
                    while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>
					    <option value="<?php echo $row['subcategory']; ?>"><?php echo $row['subcategory']; ?></option>
				    <?php } ?>
				</select>
                Maximum<select class="span2" name="time">
					<option value="" selected="">Duration</option>
					<option value="1">1 Day</option><option value="2">2 Day</option>
					<option value="3">3 Day</option><option value="4">4 Day</option>
					<option value="5">5 Day</option><option value="6">6 Day</option>
					<option value="7">7 Day</option><option value="8">8 Day</option>
					<option value="9">9 Day</option><option value="10">10 Day</option>
					<option value="11">11 Day</option><option value="12">12 Day</option>
					<option value="13">13 Day</option><option value="14">14 Day</option>
					<option value="15">15 Day</option><option value="16">16 Day</option>
					<option value="17">17 Day</option><option value="18">18 Day</option>
					<option value="19">19 Day</option><option value="20">20 Day</option>
					<option value="21">21 Day</option><option value="22">22 Day</option>
					<option value="23">23 Day</option><option value="24">24 Day</option>
					<option value="25">25 Day</option><option value="26">26 Day</option>
					<option value="27">27 Day</option><option value="28">28 Day</option>
                </select>To Realization<br><br>
                <span class="btn btn-success fileinput-button span7">
                    <i class="icon-plus" style="margin-top:3px;"></i>
                    <span>Select photo...</span>
                    <input id="fileupload" type="file" name="photo" />
                </span><br><br><br>
                <textarea class="form-control span8" name="description" id="contentbox2" style="resize:none;color:#888;" placeholder="Description" rows="4"></textarea>
                <div id="count2" class="label pull-right" style="margin-top: -10px;">350</div><br>
                
                <textarea class="form-control span8" name="instruction" id="contentbox3" style="resize:none;color:#888;font-size:24px;" placeholder="Instruction for buyer" rows="6"></textarea>
                <div id="count3" class="label pull-right" style="margin-top: -10px;">750</div><br><br>
                
                <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">Enviar</button><br>
            </form>
        </div>		
        
        <div class="row-fluid" style="background:#fafafa;">    
			<div class="container" style="margin-top:15px;">
				<div class="span12">
					<div class="span1"></div>
					<div class="span2">
						<ul class="unstyled">
							<li>Media & Press</li>
							<li><a href="#">About us</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact & support</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
					<div class="span2">
						<ul class="unstyled">
							<li>Applications</li>
							<li><a href="#">iOS</a></li>
							<li><a href="#">Android</a></li>							
						</ul>
					</div>
					<div class="span2">
						<ul class="unstyled">
							<li>Services</li>
							<li><a href="#">Custom Support</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Job board</a></li>							
						</ul>
					</div>
					<div class="span2">
						<ul class="unstyled">
							<li>Documentation</li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Developer API</a></li>							
						</ul>
					</div>	
					<div class="span2">
						<ul class="unstyled">
							<li>More</li>
							<li><a href="#">Students & teachers</a></li>
							<li><a href="#">The Shop</a></li>
							<li><a href="#">Contact us</a></li>
						</ul>
					</div>					
				</div>
			</div>
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="span1"></div>
					<div class="span6">
						<a href="#">Terms of Service</a>    
						<a href="#">Privacy</a>    
						<a href="#">Security</a>
					</div>
					<div class="span4">
						<p class="muted pull-right">&copy 2013 Ofrezco. All rights reserved</p>
					</div>
					<div class="span1"></div>
				</div>
			</div>
		</div>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="../../js/jquery-count.js"></script>
	</body>
</html>