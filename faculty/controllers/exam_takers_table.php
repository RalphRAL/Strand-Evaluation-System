<?php
require_once '../../database/db_config.php';

if(isset($_POST['ExamTakersTable'])){

	if ($_POST['ExamTakersTable'] ==  $_POST['ExamTakersTable']) {
		
		$sql = $connection->query("SELECT * FROM students WHERE exam_attempt = '1'");
		$row = $sql->num_rows;
		//$data = $sql->fetch_assoc();

		$x = 1;

		if($row > 0){
			$output = '
			<table class="table table-hover table-borderless table-thead-bordered" id="userTable">
				<thead class="thead-light">
					<tr>
						<th>#No</th>
						<th>Full Name</th>
						<th>Status</th>
						<th>Exam Attempt</th>
					</tr>
				</thead>
				<tbody>';

			while ($data = $sql->fetch_assoc()) {

				$status = '';
				if($data['student_status'] == 'Active'){
					$status = '<span class="badge badge-success">Active</span>';
				}
				else {
					$status = '<span class="badge badge-danger">Disabled</span>';
				}

				$exam_status = '';
				if($data['exam_attempt'] == '1'){
					$exam_status = '<span class="badge badge-primary">Taken</span>';
				}
				else {
					$exam_status = '<span class="badge badge-secondary">Not Taken</span>';
				}
				
				$output .=
				'<tr>
					<td>'.$x++.'</td>
					<td>'.$data['first_name'].' '.$data['middle_name'].' '.$data['last_name'].'</td>
					<td>'.$status.'</td>
					<td>'.$exam_status.'</td>
				</tr>';
			}

			$output .= '
				</tbody>
			</table>';
			echo $output;
		}
		else{
			echo '
					<div class="alert alert-info text-center" role="alert">
					  There are no exam takers yet.
					</div>';
		}
	}

}

?>