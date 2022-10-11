<?php

require_once '../../database/db_config.php';

$output = array('data' => array());

//QUERY TO SELECT ALL USERS FROM DATABASE
$sql = "SELECT * FROM users";
$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

	$role = '';
	if($row['role'] == 'admin'){
		$role = 'Administrator';
	}
	if($row['role'] == 'user'){
		$role = 'User';
	}
	if($row['role'] == 'teacher'){
		$role = 'Teacher';
	}

	$status = '';
	if($row['user_status'] == 'Active'){
		$status = '<span class="badge badge-success">Active</span>';
	}
	else {
		$status = '<span class="badge badge-danger">Disabled</span>';
	}

	$actionButton = '
	<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateUserModal" title="Edit" onclick="updateUser('.$row['user_id'].')"><i class="fa-solid fa-pen"></i></a>
    	<a href="#" class="btn btn-danger btn-sm" title="Remove" onclick="removeUser('.$row['user_id'].')"><i class="fas fa-trash-alt"></i></a>
	';

	$output['data'][] = array(
		$x,
		$row['username'],
		$row['password'],
		$role,
		$status,
		$actionButton
	);

	$x++;
}

//CLOSE DATABASE CONNECTION
$connection->close();
//WE WRITE OUTPUT DATA IN ARRAY AND PRINT IT VIA json_encode 
echo json_encode($output);
?>