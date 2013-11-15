<?php
    error_reporting(E_ALL^E_NOTICE);
	include("core/ini-val.php");
	include("core/connect.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8">
        <title>Ofrezco: Graphics, marketing, fun, and more online services for $10</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ofrezco: Graphics, marketing, fun, and more online services for $10">
        <meta name="author" content="Noobtty">
        <!--link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet"-->
        <link href="http://bootswatch.com/2/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/phrase.css" rel="stylesheet">
        <link href="css/logo.css" rel="stylesheet">
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
            .nav-list > .active > a, .nav-list > .active > a:hover, .nav-list > .active > a:focus {background:#ddd;}      
            .media {margin:20px 0;padding:30px;}
            .dp {border:5px solid rgb(251, 251, 251);transition:all 0.2s ease-in-out;}         
        </style>
        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
    </head>
    
    <body>
		<div style="height:3px;width:100%;background:url('https://d1wzu4qct23er4.cloudfront.net/assets/header_bar-cea2b632849690f1767c50d053c9100f.png') repeat scroll center top transparent;"></div>
        <div class="navbar navbar-static-top">
            <?php if (isset($_COOKIE["user"]) || (isset($_SESSION['user']) && isset($_SESSION['iduser']))){ ?>
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand title" href="#" style="font-size:30px;">
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
                            <li><a href="#">HOME</a></li>
                            <li><a href="#"><span class="label label-success">1</span> TO DO</a></li>
                            <li><a href="#"><img src="img/chat.png" alt="conversation"></a></li> 
                            <li><a href="#">SHOPPING</a></li>  
                            <li><a href="<?php echo $_COOKIE["user"].$_SESSION['user'].'/i/'; ?>">START SELLING</a></li> 
                            
                            <li class="dropdown"><a href="" class="dropdown-toggle" style="background:rgb(239,239,233);border:0;" data-toggle="dropdown"><?php echo $_COOKIE["user"].$_SESSION['user']; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background:rgb(150, 150, 150);">
                                    <li><a href="<?php echo $_COOKIE["user"].$_SESSION['user']; ?>"><i class="icon-user"></i> user</a></li>
                                    <li><a href="core/user/setting/"><i class="icon-cog"></i> Setting</a></li>
                                    <li><a href="help/support.php"><i class="icon-envelope"></i> Contact Support</a></li>
                                    <li class="divider"></li>
                                    <li><a href="core/logout.php"><i class="icon-off"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>       
    <?php } else { ?>
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button><a class="brand title" href="#" style="font-size:30px;">
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
                            <li><a href="#">GUIDE</a></li>
                            <li><a href="#signin" role="button" data-toggle="modal">SIGN IN</a></li>
                            <li><a href="#join" role="button" data-toggle="modal"><span class="label label-success">JOIN</span></a></li>
                        </ul>    
                    </div>
                </div>
            </div>
    <?php } ?>    
        </div>
		<div class="navbar hidden-phone" style="width:100%;margin:0;">
			<div class="row breadcrumb" style="margin:0;background:rgba(245, 245, 245, 0.6);">
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
                <form role="form" class="span6 pull-right" style="margin-top:8px;margin-bottom:0;">
                    <div class="input-append">
                      <input class="span5" id="appendedInput" type="text" placeholder="Find Amazing Ofrezco, starting at $10" style="padding:10px;" autocomplete="off" />
                      <button class="add-on" style="height:44px;"><i class="icon-search"></i></button>
                    </div>
                </form>				
            </div>            
        </div>
		
        <?php if (isset($_COOKIE["user"]) || (isset($_SESSION['user']) && isset($_SESSION['iduser']))){         
        $hora = date('G');
        $hora = $hora - 7; 
        ?>            
        <div class="thumbnails  hidden-phone" style="margin:0;border-bottom:1px solid #ddd;">
            <?php if( $hora >= 6 && $hora < 12) { ?>
            <img src="http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_backgrounds/bg-homepage-message-day-early-22799bb4f9d5876f31a17ef56b7bc6b1.png" alt="morning" />
			<div class="span12" style="width:100%;margin:0;background:rgb(205,244,255);">
				<h4 style="font-weight:600;margin-left:15px;">Hey <?php echo $_COOKIE["user"].$_SESSION['user']; ?>, It's coffee time!</h4>
            </div>
            <?php } elseif($hora >= 12 && $hora < 18) { ?>
			<img src="http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_backgrounds/bg-homepage-message-day-late-265c5df9a472f80e7298729c3149a237.png" alt="afternoon" />
			<div class="span12" style="width:100%;margin:0;background:rgb(205,244,255);">
				<h4 style="font-weight:600;margin-left:15px;">Hey <?php echo $_COOKIE["user"].$_SESSION['user']; ?>, How was lunch?</h4>
            </div>
            <?php } elseif($hora >= 18 && $hora < 24) { ?>
			<img src="http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_backgrounds/bg-homepage-message-night-early-c0f2514eec7b21076d42cbbd320d6fea.png" alt="evening" />
			<div class="span12" style="width:100%;margin:0;background:rgb(0,105,140);">
				<h4 style="font-weight:600;margin-left:15px;color:#fff;">Hey <?php echo $_COOKIE["user"].$_SESSION['user']; ?>, What a beautiful evening!</h4>
            </div>
            <?php } else { ?>
			<img src="http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_backgrounds/bg-homepage-message-night-early-c0f2514eec7b21076d42cbbd320d6fea.png" alt="night" />
			<div class="span12" style="width:100%;margin:0;background:rgb(0,105,140);">
				<h4 style="font-weight:600;margin-left:15px;color:#fff;">Hey <?php echo $_COOKIE["user"].$_SESSION['user']; ?>, You should be having dinner just about now...</h4>
            </div>
            <?php } ?>
        </div>
        
        <?php } else { ?>
		<div class="thumbnails" style="background:rgb(239,239,233);border-bottom:1px solid #ddd;">
			<div class="span6">
				<section class="rw-wrapper">
					<h2 class="rw-sentence">
						<span>Ofrezco </span>
						<div class="rw-words rw-words-2">
							<span>Gift</span>
							<span>Designer</span>
							<span>Animation</span>
							<span>Marketing</span>
							<span>Advertising</span>
							<span>Programming</span>
							<span>Music</span>
							<span>Lifestyle</span>
						</div><br>
						<span>directly to your </span>
						<div class="rw-words rw-words-2">
							<span>Family</span>
							<span>Job</span>
							<span>Kids</span>
							<span>Product</span>
							<span>Business</span>
							<span>Users</span>
							<span>Life</span>
							<span>Friends</span>
						</div>
					</h2>
				</section>
			</div>
			<div class="span6 pull-right">
				<h3 style="margin-top:65px;line-height:1.2em;font-weight:400;">The service where you find something you like, starting at $10</h3>
				<a href="#join" role="button" data-toggle="modal" class="btn btn-success" style="margin-left:35%;">Get started!</a>
			</div>
		</div>
        <?php } ?>
        
		<div style="margin-bottom:35px;"></div>        
        <?php if(isset($_SESSION['token_email'])) { ?>
        <div class="alert alert-info">
            <a href="core/logout.php" class="close" data-dismiss="alert">&times;</a>
            <strong>Completed!</strong> Your request has been made, please check your email.
        </div>
        <?php } ?>
        <div class="container" style="margin-bottom:10px;">
            <div class="breadcrumb" style="border:1px solid #ddd;">
                <div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-list span3">
                        <li class="active"><a href="#tab1" data-toggle="tab">Gift</a></li>
                        <li><a href="#tab2" data-toggle="tab">Graphics & Designer</a></li>
                        <li><a href="#tab3" data-toggle="tab">Video & Animation</a></li>
                        <li><a href="#tab4" data-toggle="tab">Online Marketing</a></li>
                        <li><a href="#tab5" data-toggle="tab">Writing & Translation</a></li>
                        <li><a href="#tab6" data-toggle="tab">Advertising</a></li>
                        <li><a href="#tab7" data-toggle="tab">Business</a></li>
                        <li><a href="#tab8" data-toggle="tab">Programming & Tech</a></li>
                        <li><a href="#tab9" data-toggle="tab">Music & Audio</a></li>
                        <li><a href="#tab10" data-toggle="tab">Fun & Bizarre</a></li>
                        <li><a href="#tab11" data-toggle="tab">Lifestyle</a></li>
                    </ul>
                    <div class="span1"></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small> 
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>  
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab5">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab6">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab7">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab8">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab9">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab10">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab11">
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                          <div class="thumbnail clearfix" style="border:0;">
                            <img class="media-object dp img-circle pull-right" alt="firstname" src="img/jozh.jpg" style="width: 60px;height:60px;">
                            <img src="http://placehold.it/240x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
                            <div class="caption" class="pull-left">
                              <h4><a href="#">Title</a></h4>
                              <p>Description</p>
                              <small><b>From: </b>First name - Last name</small>   
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="container" style="border-bottom:2px solid #ddd;">
            <h4>Popular Categories</h4><br>
            <div class="row-fluid span12" style="margin:0;">
                <div class="span4" id="categories" style="border-radius:5px;">
                    <div class="well well-small" style="margin:0;">  
                        <a href="#" style="font-size:18px;font-weight:bold;padding:5px;">Category</a>
                    </div>
                    <img src="http://placehold.it/380x125">
                </div>
                <div class="span4" id="categories" style="border-radius:5px;">
                    <div class="well well-small" style="margin:0;">  
                        <a href="#" style="font-size:18px;font-weight:bold;padding:5px;">Category</a>
                    </div>
                    <img src="http://placehold.it/380x125">
                </div>
                <div class="span4" id="categories" style="border-radius:5px;">
                    <div class="well well-small" style="margin:0;">  
                        <a href="#" style="font-size:18px;font-weight:bold;padding:5px;">Category</a>
                    </div>
                    <img src="http://placehold.it/380x125">
                </div>
            </div>
            <div class="row-fluid span12" style="padding-top:18px;margin:0;">
                <div class="span4" id="categories" style="border-radius:5px;">
                    <div class="well well-small" style="margin:0;">  
                        <a href="#" style="font-size:18px;font-weight:bold;padding:5px;">Category</a>
                    </div>
                    <img src="http://placehold.it/380x125">
                </div>
                <div class="span4" id="categories" style="border-radius:5px;">
                    <div class="well well-small" style="margin:0;">  
                        <a href="#" style="font-size:18px;font-weight:bold;padding:5px;">Category</a>
                    </div>
                    <img src="http://placehold.it/380x125">
                </div>
                <div class="span4" id="categories" style="border-radius:5px;">
                    <div class="well well-small" style="margin:0;">  
                        <a href="#" style="font-size:18px;font-weight:bold;padding:5px;">Category</a>
                    </div>
                    <img src="http://placehold.it/380x125">
                </div>
            </div>
        </div>
        
        <div style="margin-bottom:35px;"></div>        
        <div class="container">
            <h4>Newest</h4><br>
            <div class="row-fluid span12" style="margin:0;">
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid span12" style="padding-top:18px;margin:0;">
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid span12" style="padding-top:18px;margin:0;">
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail span3" id="categories" style="border-radius:5px;">                    
                    <img src="http://placehold.it/240x170">
                    <div class="modal-footer" style="text-align: left">
                        <div class="progress">
                            <div class="bar bar-success" style="width: 100%;"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8"><b>Title</b></div>
                            <div class="span4"><b>from $10</b></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container span3  hidden-phone" style="margin-left:32%;margin-top:55px;margin-bottom:35px;">
                <button class="btn span4"><h4>Load More!</h4></button>
            </div>
        </div-->            
        
        <!--div class="row-fluid" style="background:#fff;margin-top:50px;">
            <h4>Top Rated Sellers</h4>
            <div class="row" style="padding-top:15px;margin:0;">
                <div class="span1">
                    <img src="http://placehold.it/240x170" alt="" class="img-rounded">
                </div>
                <div class="span2">
                    <blockquote>
                        <p>Name Lastname</p>
                        <small><cite title="Source Title">Tijuana, Baja California  <i class="icon-map-marker"></i></cite></small>
                    </blockquote>
                    <p>
                        <i class="icon-envelope"></i> you@me.com <br>
                        <i class="icon-globe"></i> www.youme.com <br>
                        <i class="icon-gift"></i> October 20, 2013
                    </p>
                </div>
                <div class="span1">
                    <img src="http://placehold.it/240x170" alt="" class="img-rounded">
                </div>
                <div class="span2">
                    <blockquote>
                        <p>Name Lastname</p>
                        <small><cite title="Source Title">Tijuana, Baja California  <i class="icon-map-marker"></i></cite></small>
                    </blockquote>
                    <p>
                        <i class="icon-envelope"></i> you@me.com <br>
                        <i class="icon-globe"></i> www.youme.com <br>
                        <i class="icon-gift"></i> October 20, 2013
                    </p>
                </div>
                <div class="span1">
                    <img src="http://placehold.it/240x170" alt="" class="img-rounded">
                </div>
                <div class="span2">
                    <blockquote>
                        <p>Name Lastname</p>
                        <small><cite title="Source Title">Tijuana, Baja California  <i class="icon-map-marker"></i></cite></small>
                    </blockquote>
                    <p>
                        <i class="icon-envelope"></i> you@me.com <br>
                        <i class="icon-globe"></i> www.youme.com <br>
                        <i class="icon-gift"></i> October 20, 2013
                    </p>
                </div>
                <div class="span1">
                    <img src="http://placehold.it/240x170" alt="" class="img-rounded">
                </div>
                <div class="span2">
                    <blockquote>
                        <p>Name Lastname</p>
                        <small><cite title="Source Title">Tijuana, Baja California  <i class="icon-map-marker"></i></cite></small>
                    </blockquote>
                    <p>
                        <i class="icon-envelope"></i> you@me.com <br>
                        <i class="icon-globe"></i> www.youme.com <br>
                        <i class="icon-gift"></i> October 20, 2013
                    </p>
                </div>
              </div>
        </div-->
        <div class="row-fluid" style="background:#f5f5f5;border-bottom:1px solid #ddd;border-top:1px solid #ddd;">
            <div class="span3"></div>
            <form class="span6" style="margin-top:35px;">
                <div class="input-append span7">
                  <input class="input-xxlarge" id="appendedInput" type="text" placeholder="Find Amazing Ofrezco, starting at $10" autocomplete="off" style="height:30px;">
                  <button class="add-on" style="height:50px;"><i class="icon-search"></i></button>
                </div>
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