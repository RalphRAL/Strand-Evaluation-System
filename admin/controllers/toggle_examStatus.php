<?php 

require_once '../../database/db_config.php';

$output = array('success' => false, 'messages' => array());

$exam_id = $_POST['exam_id'];

//CHECK WHETHER THERE IS AN ACTIVE EXAM
$check_status = "SELECT * FROM exam_table WHERE exam_status = '1'";
$cs_query = $connection->query($check_status);
$fetchData = $cs_query->fetch_assoc();

$examID = $fetchData['exam_id']; //ID to be updated where its status is active

$updateActiveExam = "UPDATE exam_table SET exam_status = '0' WHERE exam_id = '$examID'";
$uAE_query = $connection->query($updateActiveExam);

if($uAE_query === TRUE) {
	//SET AN EXAM ACTIVE.
	$sql = "UPDATE exam_table SET exam_status = '1' WHERE exam_id = '$exam_id'";
	$query = $connection->query($sql);

	if($query === TRUE) {
		$output['success'] = true;
		$output['messages'] = 'Exam status has been updated!';
	} else {
		$output['success'] = false;
		$output['messages'] = 'Something went wrong!';
	}
} else {
	$output['success'] = false;
	$output['messages'] = 'Something went wrong!';
}


/**if($row = $cs_query->num_rows == 1){
	$output['active'] = true;
	$output['messages'] = 'There is an active exam, Only one(1) exam will be active at a time.';
	if($row = $cs_query->num_rows == 0) {
	//SET AN EXAM ACTIVE.
	$sql = "UPDATE exam_table SET exam_status = '0' WHERE exam_id = '$exam_id'";
	$query = $connection->query($sql);

	if($query === TRUE) {
		$output['success'] = true;
		$output['messages'] = 'Exam status has been updated!';
	} else {
		$output['success'] = false;
		$output['messages'] = 'Something went wrong!';
	}
}

}else {
	$output['active'] = false;
	$output['messages'] = 'Something went wrong!';
}**/

// close database connection
$connection->close();

echo json_encode($output);
?>