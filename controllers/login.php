<?php 
session_start();
require_once '../database/db_config.php';

//IF FORM IS SUCCESSFULLY SUBMITTED ~SERVER-SIDED
if($_POST){

	//validation through SERVER-SIDED IF ARRAY IS NOT EMPTY
	$validator = array('success' => false, 'messages' => array());
	//POST METHOD REQUESTS FROM <input> tag
	$emailAdd = mysqli_real_escape_string($connection, $_POST['emailAdd']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	$sql = "SELECT * FROM students WHERE email_address = '$emailAdd' AND student_password = '$password'";
	$query = $connection->query($sql);
	$row = $query->fetch_array();

	if($query->num_rows > 0)
	{
		$validator['success'] = true;
		$validator['messages'] = "Login successfully!";
		$_SESSION['student_email_address'] = $row['email_address'];
		$_SESSION['student_id'] = $row['student_id'];
		$_SESSION['exam_attempt'] = $row['exam_attempt'];
		$_SESSION['student_fullname'] = $row['first_name'].' '.$row['last_name'];

	}
	else {

		$validator['success'] = false;
		$validator['messages'] = 'Incorrect E-mail or Password.';
	}

	//CLOSE DATABASE CONNECTION ~ ALWAYS
	$connection->close();
	echo json_encode($validator);


}
?>