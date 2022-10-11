<?php
require_once 'db_config.php';

if ($_POST) {
	//VALIDATOR ONLY
	$validator = array('success' => false, 'messages' => array());
	//THESE ARE DATA INPUTS FROM USER
	$firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
	$middleName = mysqli_real_escape_string($connection, $_POST['middleName']);
	$lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
	$mobileNum = mysqli_real_escape_string($connection, $_POST['mobileNum']);
	$emailAdd = mysqli_real_escape_string($connection, $_POST['emailAdd']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	//INSERT DATA IF USER IS NOT EXISTING
	$sql = "INSERT INTO students (first_name, middle_name, last_name, mobile_number, email_address, student_password) VALUES ('$firstName', '$middleName', '$lastName', '$mobileNum', '$emailAdd', '$password')";
	$query = $connection->query($sql);
	
	if($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Successfully registered!";

	} else {
		$validator['success'] = false;
		$validator['messages'] = "Something went wrong.";
	}

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}
?>