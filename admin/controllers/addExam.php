<?php

require_once '../../database/db_config.php';

//FORM SUBMISSION CONDITION
if ($_POST) {
	//THESE ARRAY WILL THROW A MESSAGE BASE ON THE OUTCOME OF THE QUERY	
	$validator = array('success' => false, 'messages' => array());

	//THESE ARE DATA INPUTS FROM USER
	$examTitle = mysqli_real_escape_string($connection, $_POST['examTitle']);
	$examTimeLimit = mysqli_real_escape_string($connection, $_POST['examTimeLimit']);
	$examDescription = mysqli_real_escape_string($connection, $_POST['examDescription']);

	//ADD USER ACCOUNT QUERY IS NOT EXISTING
	$sql = "INSERT INTO exam_table (exam_title, exam_time_limit, exam_description) VALUES ('$examTitle', '$examTimeLimit', '$examDescription')";
	$query = $connection->query($sql);
	
	if($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Exam successfully created!";

	} else {
		$validator['success'] = false;
		$validator['messages'] = "Something went wrong!";
	}

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}
?>