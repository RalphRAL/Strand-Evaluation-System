<?php

require_once '../../database/db_config.php';

//FORM SUBMISSION CONDITION
if ($_POST) {
	//THESE ARRAY WILL THROW A MESSAGE BASE ON THE OUTCOME OF THE QUERY	
	$validator = array('success' => false, 'messages' => array());

	//THESE ARE DATA INPUTS FROM USER
	$user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	//INSERT QUESTION
	$sql = "UPDATE users SET username = '$username', password = '$password' WHERE user_id = '$user_id'";
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