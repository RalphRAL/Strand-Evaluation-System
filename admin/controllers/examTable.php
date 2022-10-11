<?php

require_once '../../database/db_config.php';

$output = array('data' => array());

//QUERY TO SELECT ALL EXAM FROM DATABASE
$sql = "SELECT * FROM exam_table";
$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

	$str = $row['exam_id'];
	$examID = urlencode(base64_encode($str));

	$switch_check = '';

	$formatted_date =  date('F d, Y', strtotime($row['exam_timestamp']));

	if($row['exam_status'] == '1') 
	{
		$switch_check = 'checked';
	}

	$toggle_status = ' 	<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="'.$examID.'" '.$switch_check.' onclick="toggle_examStatus('.$row['exam_id'].')">
							<label class="custom-control-label" for="'.$examID.'"></label>
						</div>';

	$actionButton = '
	    <a href="edit-exam.php?examID='.$examID.'" class="btn btn-info btn-sm" title="Edit"><i class="fa-solid fa-pen"></i></a>
    	<a href="#" class="btn btn-danger btn-sm" title="Remove" onclick="removeExam('.$row['exam_id'].')"><i class="fas fa-trash-alt"></i></a>
	';

	$output['data'][] = array(
		$x,
		$row['exam_title'],
		$row['exam_time_limit'] .' Minutes',
		$row['exam_description'],
		$formatted_date,
		$toggle_status,
		$actionButton
	);

	$x++;
}

//CLOSE DATABASE CONNECTION
$connection->close();
//WE WRITE OUTPUT DATA IN ARRAY AND PRINT IT VIA json_encode 
echo json_encode($output);
?>