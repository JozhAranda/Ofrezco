<?php
session_start();
$_SESSION = array();	
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 36000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	);
	setcookie('user', '', time()-3600, '/', '');
}
session_destroy();
header('location: ../');
?>