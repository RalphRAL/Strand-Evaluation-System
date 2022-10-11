<?php 

$servername = "127.0.0.1"; //LOCAL HOST IP
$username = "root";        //DEFAULT
$password = "";            //DEFAULT
$dbname = "chs_ses_db";   //DATABASE NAME
//DEFAULT TIME ZONE
date_default_timezone_set("Asia/Manila");
//DATABASE CONNECTION
$connection = new mysqli($servername, $username, $password, $dbname);

/**
USE THIS TO TEST THE CONNECTION TO DATABASE.
if ($connection) {
	echo 'connected successfully';
}**/
?>