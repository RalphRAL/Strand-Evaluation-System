<?php
require_once '../../database/db_config.php';

//FORM SUBMISSION CONDITION
if ($_POST) {
	
	$validator = array('success' => false, 'messages' => array());
	//THESE ARE DATA INPUTS FROM USER
	$question_id = $_POST['question_id'];
	$update_question = mysqli_real_escape_string($connection, $_POST['update_question']);
	$update_question_choice_A = mysqli_real_escape_string($connection, $_POST['update_question_choice_A']);
	$update_question_choice_B = mysqli_real_escape_string($connection, $_POST['update_question_choice_B']);
	$update_question_choice_C = mysqli_real_escape_string($connection, $_POST['update_question_choice_C']);
	$update_question_choice_D = mysqli_real_escape_string($connection, $_POST['update_question_choice_D']);
	$update_question_correct_Answer = mysqli_real_escape_string($connection, $_POST['update_question_correct_Answer']);


	//CHECK IF CORRECT ANSWER IS ANY FROM THE CHOICES PROVIDED
	if($update_question_correct_Answer == $update_question_choice_A || 
	   $update_question_correct_Answer == $update_question_choice_B || 
	   $update_question_correct_Answer == $update_question_choice_C || 
	   $update_question_correct_Answer == $update_question_choice_D)
	{
		//INSERT QUESTION
		$sql = "UPDATE questions SET
				question = '$update_question',
				question_choice1 = '$update_question_choice_A', 
				question_choice2 = '$update_question_choice_B', 
				question_choice3 = '$update_question_choice_C', 
				question_choice4 = '$update_question_choice_D', 
				question_answer = '$update_question_correct_Answer'
				WHERE question_id = '$question_id'";
		$query = $connection->query($sql);
		
		if($query === TRUE) {
			$validator['success'] = true;
			$validator['messages'] = "Question updated!";

		} else {
			$validator['success'] = false;
			$validator['messages'] = "Something went wrong!";
		}
	} else {
		$validator['success'] = false;
		$validator['messages'] = "No correct answer set, please copy the correct answer from the choices.";
	}

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}