<?php 

require_once '../../database/db_config.php';

$output = array('success' => false, 'messages' => array());

$exam_id = $_POST['exam_id'];

$sql = "DELETE FROM exam_table WHERE exam_id = '$exam_id'";
$query = $connection->query($sql);

if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing an exam';
}

// close database connection
$connection->close();

echo json_encode($output);
?>