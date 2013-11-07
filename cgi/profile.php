<?php
    error_reporting(E_ALL^E_NOTICE);
	include("../core/ini-val.php");
	include("../core/connect.php");
	session_start();
	function url(){
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url = substr($url, 25, -1);
        return $url;
    }
    $_SESSION['url'] = url();
    if(trim($_SESSION['url']) == $_SESSION['user']) {
        $aux = $_SESSION['user'];
        $user = $db->query("SELECT * FROM user WHERE username = '$aux'");
        $row = $user->fetch(PDO::FETCH_ASSOC);
        $gigs = $db->query("SELECT title, photo FROM ". $aux);
    }
    else {
        $aux = $_SESSION['url'];
        $user = $db->query("SELECT * FROM user WHERE username = '$aux'");
        $row = $user->fetch(PDO::FETCH_ASSOC);
        $gigs = $db->query("SELECT title, photo FROM ". $aux);
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
        <link href="css/phrase.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
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
                    <a class="brand title" href="../" style="font-size:30px;">Ofrezco!</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><a href="../">HOME</a></li>
                            <li><a href="#"><span class="label label-success">1</span> TO DO</a></li>
                            <li><a href="#"><img src="../img/chat.png" alt="conversation"></a></li> 
                            <li><a href="#">SHOPPING</a></li>  
                            <li><a href="#">START SELLING</a></li> 
                            
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
		<div class="navbar hidden-phone" style="width:98%;">
			<div class="thumbnails row-fluid breadcrumb span12 " style="margin:0;background:rgba(245, 245, 245, 0.6);">
                <div class="span3" style="margin-left:5%;margin-top:5px;">
					<div class="btn-group">
						<a class="btn dropdown-toggle input-medium" data-toggle="dropdown" href="#">Categories<span class="caret" style="margin-left:50px;"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Gift</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Greeting Cards</a></li>
									<li><a href="#" style="color:#777;">Video Greeting</a></li>
									<li><a href="#" style="color:#777;">Unusual Gifts</a></li>
									<li><a href="#" style="color:#777;">Arts & Crafts</a></li>
									<li><a href="#" style="color:#777;">Handmade Jewerly</a></li>
									<li><a href="#" style="color:#777;">Postcards</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Graphics & Designer</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Cartoons & Caricatures</a></li>
									<li><a href="#" style="color:#777;">Logo Design</a></li>
									<li><a href="#" style="color:#777;">Ebook</a></li>
									<li><a href="#" style="color:#777;">Web Design & UI</a></li>
									<li><a href="#" style="color:#777;">Photography & Photoshop</a></li>
									<li><a href="#" style="color:#777;">Flyers</a></li>
									<li><a href="#" style="color:#777;">Businnes Cards</a></li>
									<li><a href="#" style="color:#777;">Architecture</a></li>
									<li><a href="#" style="color:#777;">Presentation Design</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Video & Animation</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Commercials</a></li>
									<li><a href="#" style="color:#777;">Editing & Post Production</a></li>
									<li><a href="#" style="color:#777;">Animation & 3D</a></li>
									<li><a href="#" style="color:#777;">Testomonials</a></li>
									<li><a href="#" style="color:#777;">Stop Motion</a></li>
									<li><a href="#" style="color:#777;">Intros</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Online Marketing</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Web Analytics</a></li>
									<li><a href="#" style="color:#777;">Blog</a></li>
									<li><a href="#" style="color:#777;">Domain Research</a></li>
									<li><a href="#" style="color:#777;">Fan Page</a></li>
									<li><a href="#" style="color:#777;">Keyword Research</a></li>
									<li><a href="#" style="color:#777;">SEO</a></li>
									<li><a href="#" style="color:#777;">Social Marketing</a></li>
									<li><a href="#" style="color:#777;">Get Traffic</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Writing & Translation</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Copywriting</a></li>
									<li><a href="#" style="color:#777;">Creative Writing</a></li>
									<li><a href="#" style="color:#777;">Translation</a></li>
									<li><a href="#" style="color:#777;">Transcripts</a></li>
									<li><a href="#" style="color:#777;">Website Content</a></li>
									<li><a href="#" style="color:#777;">Resumes & Cover Letters</a></li>
									<li><a href="#" style="color:#777;">Speech Writing</a></li>
									<li><a href="#" style="color:#777;">Press Release</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Advertising</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Hold Your Sign</a></li>
									<li><a href="#" style="color:#777;">Flyers</a></li>
									<li><a href="#" style="color:#777;">Pet Models</a></li>
									<li><a href="#" style="color:#777;">Outdoor Advertising</a></li>
									<li><a href="#" style="color:#777;">Radio</a></li>
									<li><a href="#" style="color:#777;">Music Production</a></li>
									<li><a href="#" style="color:#777;">Banner Advertising</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Business</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Businnes Plan</a></li>
									<li><a href="#" style="color:#777;">Career Advice</a></li>
									<li><a href="#" style="color:#777;">Market Research</a></li>
									<li><a href="#" style="color:#777;">Presentations</a></li>
									<li><a href="#" style="color:#777;">Virtual Assistant</a></li>
									<li><a href="#" style="color:#777;">Businnes Tips</a></li>
									<li><a href="#" style="color:#777;">Branding Services</a></li>
									<li><a href="#" style="color:#777;">Financial Consulting</a></li>
									<li><a href="#" style="color:#777;">Legal Consulting</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Programming & Tech</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">.NET</a></li>
									<li><a href="#" style="color:#777;">Open Sources</a></li>
									<li><a href="#" style="color:#777;">CSS & HTML</a></li>
									<li><a href="#" style="color:#777;">CMS</a></li>
									<li><a href="#" style="color:#777;">Database</a></li>
									<li><a href="#" style="color:#777;">Java</a></li>
									<li><a href="#" style="color:#777;">iOS, Android & Mobile</a></li>
									<li><a href="#" style="color:#777;">Back-End</a></li>
									<li><a href="#" style="color:#777;">QA & Software Testing</a></li>
									<li><a href="#" style="color:#777;">Technology</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Music & Audio</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Audio Editing & Mastering</a></li>
									<li><a href="#" style="color:#777;">Jingles</a></li>
									<li><a href="#" style="color:#777;">Songwriting</a></li>
									<li><a href="#" style="color:#777;">Music Lessons</a></li>
									<li><a href="#" style="color:#777;">Narration & Voice-Over</a></li>
									<li><a href="#" style="color:#777;">Sound Effect & Loops</a></li>
									<li><a href="#" style="color:#777;">Custom Ringtones</a></li>
									<li><a href="#" style="color:#777;">Voicemail Greeting</a></li>
									<li><a href="#" style="color:#777;">Custom Song</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Fun & Bizarre</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Your Message On...</a></li>
									<li><a href="#" style="color:#777;">Celebrity Impersonators</a></li>
									<li><a href="#" style="color:#777;">Pranks</a></li>
									<li><a href="#" style="color:#777;">Dancers</a></li>
									<li><a href="#" style="color:#777;">Just for Fun</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"><a href="#" style="color:#777;">Lifestyle</a>
								<ul class="dropdown-menu">
									<li><a href="#" style="color:#777;">Animal Care & Pets</a></li>
									<li><a href="#" style="color:#777;">Relationship Advice</a></li>
									<li><a href="#" style="color:#777;">Diet & Weight Loss</a></li>
									<li><a href="#" style="color:#777;">Health & Fitness</a></li>
									<li><a href="#" style="color:#777;">Makeup, Styling & Beauty</a></li>
									<li><a href="#" style="color:#777;">Online Private Lessons</a></li>
									<li><a href="#" style="color:#777;">Astrology & Fortune</a></li>
									<li><a href="#" style="color:#777;">Cooking Recipes</a></li>
									<li><a href="#" style="color:#777;">Paretings Tips</a></li>
									<li><a href="#" style="color:#777;">Travels</a></li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
                <form class="span4 pull-right" style="margin-top:8px;margin-right:3%;margin-bottom:0;">
                    <div class="input-append">
                      <input class="input-xlarge" id="appendedInput" type="text" placeholder="Search..." style="padding:10px;" autocomplete="off" />
                      <button class="add-on" style="height:45px;"><i class="icon-search"></i></button>
                    </div>
                </form>				
            </div>            
        </div>
        
        <div class="span12" style="margin-bottom:30px;"></div>        
        <div class="container">
            <img class="span2" style="margin:0;padding-right:10px;" src="<?php echo $row['photo']; ?>" alt="<?php echo $row['username']; ?>">
            <div class="span7">
                <h2><?php if(trim($_SESSION['url']) == $_SESSION['user']) { echo $_SESSION['user']; } else { echo $_SESSION['url']; } ?></h2>
                <div class="span2 progress" style="margin:0;margin-top:6px;">
                    <div class="bar bar-success" style="border:1px solid #ccc;width:30%;"></div>
                </div>      
                <h4 style="margin-left:155px;">From: <strong><?php echo $row['state']; ?></strong> <a href="#">Contact</a></h4><br>
                <p><?php echo $row['bio']; ?></p>  
            </div>
        </div>
        <hr style="border:1px solid #eee;">
        
        <div class="span12" style="margin-bottom:30px;"></div>        
        <div class="container">
            <div class="span12" style="margin:0;">
            <?php while($rowi = $gigs->fetch(PDO::FETCH_ASSOC)) {?>       
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="i/<?php echo $rowi['photo']; ?>">
                    <div class="modal-footer" style="text-align: left">
                        <div class="row-fluid">
                            <div class="span8"><b><?php echo $rowi['title']; ?></b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
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
		<!-- Modal Start-->
		<div id="join" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-body">
				<h5 class="text-center">Already a member? <a href="#signin" data-toggle="modal" data-dismiss="modal" aria-hidden="true">Sign In</a></h5><hr/>
				<form accept-charset="UTF-8" action="core/register/" method="post"  style="margin:0;" onSubmit="BorrarAyuda(); return ValidateReg(this);">
					<label>Your email<input type="email" id="email" name="email" class="span4 pull-right" autocomplete="off" onBlur="ValidateEmail(this); BorrarAyuda();" onFocus="AyudaEmail();"/></label><br><br>
					<label>Choose a Username<input type="text" id="username" name="username" class="span4 pull-right" autocomplete="off" onBlur="ValidateUsr(this); BorrarAyuda();" onFocus="AyudaUsr();" /></label><br><br>
					<label>Choose a Password<input type="password" id="password" name="password" class="span4 pull-right" autocomplete="off" onBlur="ValidatePass(this); BorrarAyuda();" onFocus="AyudaPass();" /></label><br><br>
					<label>6+7 =<input type="text" id="verify" name="verify" class="span4 pull-right" autocomplete="off" /></label><br><br>
					<span class="span3"></span><input type="checkbox" id="terms" name="terms" style="margin:0;"/> I agree to the <a href="#" target="_blank">terms of service</a>
					<div class="modal-footer">
						<div id="mensajes" style="float:left;">
							<div id="ayuda"></div>
							<div id="error" style="color:red; float:left;"></div>
						</div>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						<button class="btn btn-success" name="join" id="join" type="submit">Join</button>
					</div>
				</form>
            </div>
		</div>
		<!-- Modal Sign In-->
		<div id="signin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<a href="#" class="label pull-right" data-dismiss="modal" aria-hidden="true">Close</a>                    
			<form accept-charset="UTF-8" action="core/login/" method="post"  style="margin:0;" onSubmit="BorrarAyuda(); return ValidateReg(this);">			
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
		<!-- Modal Forgot password-->
		<div id="forgot" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<a href="#" class="label pull-right" data-dismiss="modal" aria-hidden="true">Close</a>                    
			<form accept-charset="UTF-8" action="core/password.php" method="post" style="margin:0;" onSubmit="BorrarAyuda(); return ValidateReg(this);">			
                <div class="modal-body">
                    <h4 class="text-center" style="font-weight:600;">Reset Password</h4>
                    <p>Enter the email you used in your Fiverr profile. A password reset link will be sent to you by email.</p><hr/>
                    <label>Enter Email Address<input type="email" id="email" name="email_recover" class="span4 pull-right" autocomplete="off" required onBlur="ValidateEmail(this); BorrarAyuda();" onFocus="AyudaEmail();"/></label><br><br>                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" name="pass_forgot" id="pass_forgot" type="submit">Submit</button>
                </div>
			</form>										
		</div>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
        <script src="js/validations.js" type="text/javascript"></script>
	</body>
</html>