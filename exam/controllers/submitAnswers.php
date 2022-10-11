<?php 

session_start();
require_once '../../database/db_config.php';
//STUDENT ID
$student_id = $_SESSION['student_id'];

//FORM SUBMISSION CONDITION
if ($_POST) {
	//THESE ARRAY WILL THROW A MESSAGE BASE ON THE OUTCOME OF THE QUERY	
	$validator = array('success' => false, 'messages' => array());

	$exam_id = mysqli_real_escape_string($connection, $_POST['exam_id']);
	
	foreach ($_REQUEST['quizcheck'] as $key => $value) {
		$value = $value['correct'];
		$insertResult = "INSERT INTO results(exam_id_fk, student_id_fk, question_id_fk, result_answer) VALUES ('$exam_id' ,'$student_id', '$key' ,'$value')";
		$query = $connection->query($insertResult);
	}
	
	if($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Your answers has been submitted!";

		$addAttempt = $connection->query("UPDATE students SET exam_attempt = '1' WHERE student_id = '$student_id'");

	} else {
		$validator['success'] = false;
		$validator['messages'] = "Something went wrong!";
	}
	

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}
?>