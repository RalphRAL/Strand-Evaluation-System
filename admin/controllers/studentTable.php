<?php

require_once '../../database/db_config.php';

$output = array('data' => array());

//QUERY TO SELECT ALL USERS FROM DATABASE
$sql = "SELECT * FROM students";
$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

	$status = '';
	if($row['student_status'] == 'Active'){
		$status = '<span class="badge badge-success">Active</span>';
	}
	else {
		$status = '<span class="badge badge-secondary">Disabled</span>';
	}

	$exam_status = '';
	if($row['exam_attempt'] == '1'){
		$exam_status = '<span class="badge badge-primary">Taken</span>';
	}
	else {
		$exam_status = '<span class="badge badge-secondary">Not Taken</span>';
	}

	$actionButton = '
    	<a href="#" class="btn btn-danger btn-sm" title="Remove" onclick="removeStudent('.$row['student_id'].')"><i class="fas fa-trash-alt"></i></a>
	';

	$output['data'][] = array(
		$x,
		$row['first_name'].' '.$row['middle_name'].' '.$row['last_name'],
		$row['mobile_number'],
		$row['email_address'],
		$status,
		$exam_status,
		$actionButton
	);

	$x++;
}

//CLOSE DATABASE CONNECTION
$connection->close();
//WE WRITE OUTPUT DATA IN ARRAY AND PRINT IT VIA json_encode 
echo json_encode($output);
?>