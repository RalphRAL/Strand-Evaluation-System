<?php

require_once '../../database/db_config.php';

//FORM SUBMISSION CONDITION
if ($_POST) {
	//THESE ARRAY WILL THROW A MESSAGE BASE ON THE OUTCOME OF THE QUERY	
	$validator = array('success' => false, 'messages' => array());

	//THESE ARE DATA INPUTS FROM USER
	$exam_id = mysqli_real_escape_string($connection, $_POST['exam_id']);
	$question = mysqli_real_escape_string($connection, $_POST['question']);
	$question_choice_A = mysqli_real_escape_string($connection, $_POST['question_choice_A']);
	$question_choice_B = mysqli_real_escape_string($connection, $_POST['question_choice_B']);
	$question_choice_C = mysqli_real_escape_string($connection, $_POST['question_choice_C']);
	$question_choice_D = mysqli_real_escape_string($connection, $_POST['question_choice_D']);
	$question_correct_Answer = mysqli_real_escape_string($connection, $_POST['question_correct_Answer']);

	//CHECK IF CORRECT ANSWER IS ANY FROM THE CHOICES PROVIDED
	if($question_correct_Answer == $question_choice_A || 
	   $question_correct_Answer == $question_choice_B || 
	   $question_correct_Answer == $question_choice_C || 
	   $question_correct_Answer == $question_choice_D)
	{
		//INSERT QUESTION
		$sql = "INSERT INTO questions (exam_id_fk, question, question_choice1, question_choice2, question_choice3, question_choice4, question_answer) VALUES ('$exam_id','$question', '$question_choice_A', '$question_choice_B', '$question_choice_C', '$question_choice_D', '$question_correct_Answer')";
		$query = $connection->query($sql);
		
		if($query === TRUE) {
			$validator['success'] = true;
			$validator['messages'] = "Question Added!";

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
?>