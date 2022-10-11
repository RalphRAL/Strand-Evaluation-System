<?php
require_once '../../database/db_config.php';

//FORM SUBMISSION CONDITION
if ($_POST) {
	
	$validator = array('success' => false, 'messages' => array());
	//THESE ARE DATA INPUTS FROM USER
	$exam_id = $_POST['exam_id'];
	$update_examTitle = mysqli_real_escape_string($connection, $_POST['update_examTitle']);
	$update_examTimeLimit = mysqli_real_escape_string($connection, $_POST['update_examTimeLimit']);
	$update_examDescription = mysqli_real_escape_string($connection, $_POST['update_examDescription']);

	//UPDATE EXAM DETAILS
	$sql = "UPDATE exam_table SET
			exam_title = '$update_examTitle',
			exam_time_limit = '$update_examTimeLimit', 
			exam_description = '$update_examDescription'
			WHERE exam_id = '$exam_id'";
	$query = $connection->query($sql);
	
	if($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Exam details updated!";

	} else {
		$validator['success'] = false;
		$validator['messages'] = "Something went wrong!";
	}

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}