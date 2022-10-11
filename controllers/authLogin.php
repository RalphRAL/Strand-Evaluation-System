<?php 
session_start();
require_once '../database/db_config.php';

//IF FORM IS SUCCESSFULLY SUBMITTED ~SERVER-SIDED
if($_POST){

	//validation through SERVER-SIDED IF ARRAY IS NOT EMPTY
	$validator = array('success' => false, 'role' => array(), 'messages' => array());
	//POST METHOD REQUESTS FROM <input> tag
	$username = mysqli_real_escape_string($connection, $_POST['auth_username']);
	$password = mysqli_real_escape_string($connection, $_POST['auth_password']);

	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$query = $connection->query($sql);
	$row = $query->fetch_array();

	if($query->num_rows > 0)
	{
		if ($row['user_status'] == 'Active') {
			
			$validator['success'] = true;
			$validator['messages'] = "Login successfully!";
			$validator['role'] = $row['role'];
			$_SESSION['auth_username'] = $row['username'];
			$_SESSION['auth_userRole'] = $row['role'];
			$_SESSION['user_id'] = $row['user_id'];
			
		} else {
			$validator['success'] = false;
			$validator['messages'] = "Account is locked";
		}
	}
	else {

		$validator['success'] = false;
		$validator['messages'] = 'Wrong username or password!';
	}

	//CLOSE DATABASE CONNECTION ~ ALWAYS
	$connection->close();
	echo json_encode($validator);
}
?>