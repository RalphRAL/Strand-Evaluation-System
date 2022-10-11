<?php 

require_once '../../database/db_config.php';

$output = array('success' => false, 'messages' => array());

$student_id = $_POST['student_id'];

$sql = "DELETE FROM students WHERE student_id = '$student_id'";
$query = $connection->query($sql);

if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing a student';
}

// close database connection
$connection->close();

echo json_encode($output);
?>