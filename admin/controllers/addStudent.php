<?php
require_once '../../database/db_config.php';

if ($_POST) {
	//VALIDATOR ONLY
	$validator = array('success' => false, 'messages' => array());
	//THESE ARE DATA INPUTS FROM USER
	$firstName = mysqli_real_escape_string($connection, $_POST['stud_fn']);
	$middleName = mysqli_real_escape_string($connection, $_POST['stud_mn']);
	$lastName = mysqli_real_escape_string($connection, $_POST['stud_ln']);
	$mobileNum = mysqli_real_escape_string($connection, $_POST['stud_mobileNum']);
	$emailAdd = mysqli_real_escape_string($connection, $_POST['stud_emailAdd']);
	$password = mysqli_real_escape_string($connection, $_POST['stud_pass']);

	//INSERT DATA IF USER IS NOT EXISTING
	$sql = "INSERT INTO students (first_name, middle_name, last_name, mobile_number, email_address, student_password) VALUES ('$firstName', '$middleName', '$lastName', '$mobileNum', '$emailAdd', '$password')";
	$query = $connection->query($sql);
	
	if($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Successfully added a student!";

	} else {
		$validator['success'] = false;
		$validator['messages'] = "Something went wrong.";
	}

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}
?>