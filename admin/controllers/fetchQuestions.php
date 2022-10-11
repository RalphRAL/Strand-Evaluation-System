<?php
require_once '../../database/db_config.php';

//FETCH ALL QUESTIONS
if (isset($_POST["fetchQuestions"])) {
	
	if ($_POST["fetchQuestions"] == "fetchQuestions") {

    $exam_id = $_POST['exam_id'];

		/*$sql = "SELECT * FROM rented_item 
            INNER JOIN homeowner_table
            ON rented_item.homeowner_id = homeowner_table.id
            WHERE inventory_id = 1 AND homeowner_table.id = '$homeownerID' ORDER BY rented_item.rented_item_id DESC LIMIT 5";*/

    $sql = "SELECT * FROM questions 
            INNER JOIN exam_table
            ON questions.exam_id_fk = exam_table.exam_id
            WHERE exam_table.exam_id = '$exam_id' ORDER BY questions.question_id";
		$query = $connection->query($sql);

		$output = '';

    if($query->num_rows > 0){

      $output .= '
      <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="examTable1">
          <thead class="text-muted">
            <tr>
              <th class="text-left pl-1">Questions</th>
              <th class="text-center" width="20%">Action</th>
            </tr>
          </thead>
          <tbody>
      ';

      $x = 1;

      while ($row = $query->fetch_assoc()) {

        $choiceA = '';
        $choiceB = '';
        $choiceC = '';
        $choiceD = '';

        if ($row['question_choice1'] == $row['question_answer']) 
        { 
          $choiceA = '<span class="pl-4 text-success font-weight-bold">A. '.$row['question_choice1'].'</span><br>';
        }
        else {
          $choiceA = '<span class="pl-4"><span class="font-weight-bold">A.</span> '.$row['question_choice1'].'</span><br>';
        }
        //CHOICE B
        if ($row['question_choice2'] == $row['question_answer']) 
        { 
          $choiceB = '<span class="pl-4 text-success font-weight-bold">B. '.$row['question_choice2'].'</span><br>';
        }
        else {
          $choiceB = '<span class="pl-4"><span class="font-weight-bold">B.</span> '.$row['question_choice2'].'</span><br>';
        }

        //CHOICE C
        if ($row['question_choice3'] == $row['question_answer']) 
        { 
          $choiceC = '<span class="pl-4 text-success font-weight-bold">C. '.$row['question_choice3'].'</span><br>';
        }
        else {
          $choiceC = '<span class="pl-4"><span class="font-weight-bold">C.</span> '.$row['question_choice3'].'</span><br>';
        }

        //CHOICE D
        if ($row['question_choice4'] == $row['question_answer']) 
        { 
          $choiceD = '<span class="pl-4 text-success font-weight-bold">D. '.$row['question_choice4'].'</span><br>';
        }
        else {
          $choiceD = '<span class="pl-4"><span class="font-weight-bold">D.</span> '.$row['question_choice4'].'</span><br>';
        }
      
        $output .= '
                  <tr>
                    <td>
                      <b>'.$x++.') '.$row['question'].'</b><br>
                      '.$choiceA.'
                      '.$choiceB.'
                      '.$choiceC.'
                      '.$choiceD.'
                    </td>
                    <td class="align-middle">
                      <div class="btn-group" role="group">
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateExamQuestionModal" title="Update" onclick="retrieveQuestion('.$row['question_id'].')"> Update </a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove" onclick="removeQuestion('.$row['question_id'].')"> Remove </a>
                      </div>
                    </td>
                  </tr>
        ';

      }
    }
    else {
      $output .= '<div class="alert alert-warning text-center text-lg" role="alert">
                    <strong style="font-size: 16px;">No questions at this moment</strong>.
                  </div>';
    }
		$output .= '
				</tbody>
			</table>
		';
		echo $output;
	}
}
?>