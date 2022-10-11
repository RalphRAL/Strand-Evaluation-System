<?php 

require_once '../../database/db_config.php';

$output = array('success' => false, 'messages' => array());

$question_id = $_POST['question_id'];

$sql = "DELETE FROM questions WHERE question_id = '$question_id'";
$query = $connection->query($sql);

if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing a question';
}

// close database connection
$connection->close();

echo json_encode($output);
?>