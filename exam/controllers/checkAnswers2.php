<?php

require_once '../../database/db_config.php';
//FORM SUBMISSION CONDITION
if ($_POST) {

	$counter = 0;
	$Resultans = 0;

	//THESE ARRAY WILL THROW A MESSAGE BASE ON THE OUTCOME OF THE QUERY	
	$validator = array('success' => false, 'messages' => array());

	if(!empty($_POST['quizcheck'])){

		$checked_count = count($_POST['quizcheck']);

		$selected = $_POST['quizcheck'];
		$q1= "SELECT ans_id_fk FROM questions";
		$ansresults = mysqli_query($connection,$q1);
		$i = 1;

		while ($rows = mysqli_fetch_array($ansresults)) {
			$flag = $rows['ans_id_fk'] == $selected[$i];

			if ($flag) {
				$counter++;
				$Resultans++;
			}else {
				$counter++;
			}
			$i++;
		}

		$validator['success'] = true;
		$validator['messages'] =  "Number of answered questions ".$counter .", Your Score:". $Resultans;

	}
	else {
		$validator['success'] = false;
		$validator['messages'] =  "sad";
	}

	//THESE ARE DATA INPUTS FROM USER
	//$examAnswers = mysqli_real_escape_string($connection, $_POST['quizcheck']);

	////ADD USER ACCOUNT QUERY IS NOT EXISTING
	//$sql = "SELECT ans_id_fk FROM questions WHERE ans_id_fk = $examAnswers";
	/**$query = $connection->query($sql);
	
	if($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Same shit";

	} else {
		$validator['success'] = false;
		$validator['messages'] = "Something went wrong!";
	}**/

	//CLOSE DATABASE CONNECTION
	$connection->close();
	echo json_encode($validator);
}
?>