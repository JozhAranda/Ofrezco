<?php
    /*$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_database = 'chirt'; 

	$conection = @mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

	mysql_query("SET NAMES 'utf8'");
	mysql_select_db($db_database,$conection);*/
    try {
	    $db = new PDO('mysql:host=localhost;dbname=chirt;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch(PDOException $e){
	    echo "ERROR: " . $e->getMessage();
	}
?>