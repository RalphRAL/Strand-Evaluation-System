<?php

require_once '../../database/db_config.php';

//FORM SUBMISSION CONDITION
if ($_POST) {
	//THESE ARRAY WILL THROW A MESSAGE BASE ON THE OUTCOME OF THE QUERY	
	$validator = array('success' => false, 'messages' => array());

	//THESE ARE DATA INPUTS FROM USER
	$student_id = mysqli_real_escape_string($connection, $_POST['student_id']);
	$firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
	$middleName = mysqli_real_escape_string($connection, $_POST['middleName']);
	$lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
	$mobileNum = mysqli_real_escape_string($connection, $_POST['mobileNum']);
	$email = mysqli_real_escape_string($connection, $_POST['emailAdd']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	//INSERT QUESTION
	$sql = "UPDATE students SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', mobile_number = '$mobileNum', email_address = '$email', student_password = '$password' WHERE student_id = '$student_id'";

	$query = $connection->query($sql);
	
	if($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Profile has been updated!";

	} else {
		$validator['success'] = false;
		$validator['messages'] = "Something went wrong!";
	}

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}
?>