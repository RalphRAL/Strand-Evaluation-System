<?php 

$servername = "127.0.0.1"; //LOCAL HOST IP
$username = "root";        //DEFAULT
$password = "";            //DEFAULT
$dbname = "chs_ses_db";   //DATABASE NAME
//DEFAULT TIME ZONE
date_default_timezone_set("Asia/Manila");
//DATABASE CONNECTION
$connection = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM users";
$query = $connection->query($sql);
$checkRows = $query->num_rows;

/**
USE THIS TO TEST THE CONNECTION TO DATABASE.
if ($connection) {
	echo 'connected successfully';
}**/
/** 
CHECK IF THERE ARE USERS IN DATABASE, IF ZERO USERS THEN INSERT DEFAULT administrator credentials
username = admin
password = admin
**/
if($checkRows === 0){

	$sql = "INSERT INTO users VALUES('', 'admin', 'admin', 'admin', 'Active')";
	$query = $connection->query($sql);
	return false;
}
?>