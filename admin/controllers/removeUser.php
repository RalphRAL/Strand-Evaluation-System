<?php 

require_once '../../database/db_config.php';

$output = array('success' => false, 'messages' => array());

$user_id = $_POST['user_id'];

$sql = "DELETE FROM users WHERE user_id = '$user_id'";
$query = $connection->query($sql);

if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing a user';
}

// close database connection
$connection->close();

echo json_encode($output);
?>