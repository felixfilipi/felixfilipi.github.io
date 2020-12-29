<?php

	require_once 'vendor/autoload.php';

	$dbhost = 'localhost';
	$dbname = 'beli_desain';
	$dbuser = 'root';
	$dbpass = '1234';
	$appname = 'belidesain.com';

//Checks mysqli plugin (for debug only!)	
//if(!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//echo "Error: mysqli is missing or failed to start";
//}else{
//echo "mysqli founded!";
//}


	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if($conn->connect_error) die($connection->connect_error);

	function createTable($name, $query){
		queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
		echo "Table '$name' created or already exists. <br>";
	}

	function queryMysql($query){
		global $conn;
		$result = $conn->query($query);
		if(!$result) die($conn->error);
		return $result;
	}

	function destroySession(){
		$_SESSION = array();

		if(session_id() != "" || isset($_COOKIE[session_name()])){
			setcookie(session_name(), '', time()-2592000, '/');
			session_destroy();
		}
	}

	function sanitizeString($var){
		global $conn;
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		return $connection->real_escape_string($var);
	}

	function getDateNow(){
		$d = strtotime("now");
		$date = date("Y-m-d h:i:s", $d);
		return $date;
	}

?>
