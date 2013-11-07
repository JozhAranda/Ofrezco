<?php
	error_reporting(E_ALL^E_NOTICE);
	include("../connect.php");
	include("../ini-val.php");
    
    if($isset($_GET['token_url'])) {
        $insert = $db->query("INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')");
    }
    else {
        $token_email = $db->query("SELECT * FROM user_pwd WHERE username='$user_email' OR email='$user_email' AND password='$password'");
        $row = $token_email->fetch(PDO::FETCH_ASSOC);
        
        $from = 'verify@chirt.com';
        $title = 'Welcome to Chirt!';
        $content = '
            <html>
            <head>
              <title>Welcome to Chirt</title>
            </head>
            <body>
              <h1>Welcome to Chirt</p>
              <a href="http://www.chirt.com/register/function.php?token_url=' . $row['token'] . '">Please click here to start in Chirt!</a>
            </body>
            </html>
        ';
        
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        mail($from, $title, $content, $header);
    }
?>