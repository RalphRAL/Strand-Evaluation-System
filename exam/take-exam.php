<?php
session_start();
error_reporting(0);

$student_id = $_SESSION['student_id'];

if($_SESSION['student_email_address'] == ''){
	header('Location: ../index.php');
}
include '../database/db_config.php';

$studentData = $connection->query("SELECT * FROM students WHERE student_id = '$student_id'"); 
$sD_row = $studentData->fetch_assoc();
if($sD_row['exam_attempt'] == '1'){
	header('Location: load-exam.php');
}

include 'includes/header-noback.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';
?>
			<!----- MAIN CONTENT ----->

			<div class="main-content">

				<div class="row">
          <section class="col-lg-12">
          	<div class="card" style="min-height: 300px; font-size: 14px;">
          		<?php
          		$examData = $connection->query("SELECT * FROM exam_table WHERE exam_status = '1'"); 
          		$show_examData = $examData->fetch_assoc();
          		?>
							<div class="card-header card-header-text">
								<!-----<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Primary</button>----->
								<h3 class="card-title font-weight-bold"><?php echo $show_examData['exam_title'];?></h3>
								<p class="category"><?php echo $show_examData['exam_description'];?></p>
								<input type="hidden" name="exam_time_limit" id="exam_time_limit" value="<?php echo $show_examData['exam_time_limit']?>">
							</div>
							<div class="card-content table-responsive">
								<form id="ExamForm" method="POST">
								<input type="hidden" name="examAction" id="examAction">
								<input type="hidden" name="exam_id" id="exam_id" value="<?php echo $show_examData['exam_id'];?>">
								<table class="align-middle mb-0 table table-borderless" id="userTable">
									<?php
									$sql = "SELECT * FROM questions 
							            INNER JOIN exam_table
							            ON questions.exam_id_fk = exam_table.exam_id
							            WHERE exam_status = '1' 
							            ORDER BY questions.question_id";
									$query = $connection->query($sql);
									if ($query->num_rows > 0) {
										$x = 1;
										while ($row = $query->fetch_assoc()) {?>
										<?php $questionID = $row['question_id'];?>
									<tr>
										<td>
	                      <p><b><?php echo $x++.") ". $row["question"];?></b></p>
	                      <div class="col-md-4 float-left">
	                        <div class="form-check">
													  <input class="form-check-input" type="radio" name="quizcheck[<?php echo $questionID; ?>][correct]" id="choiceAnswer" value="<?php echo $row['question_choice1'] ?>" required>
													  <label class="form-check-label">
													  	<span class="font-weight-bold">A.</span>
													    <?php echo $row['question_choice1'];?>
													  </label>
													</div>
													<div class="form-check">
													  <input class="form-check-input" type="radio" name="quizcheck[<?php echo $questionID; ?>][correct]" id="choiceAnswer" value="<?php echo $row['question_choice2'] ?>" required>
													  <label class="form-check-label">
													  	<span class="font-weight-bold">B.</span>
													    <?php echo $row['question_choice2'];?>
													  </label>
													</div>
												</div>
												<div class="col-md-8 float-left">
													<div class="form-check">
													  <input class="form-check-input" type="radio" name="quizcheck[<?php echo $questionID; ?>][correct]" id="choiceAnswer" value="<?php echo $row['question_choice3'] ?>" required>
													  <label class="form-check-label">
													  	<span class="font-weight-bold">C.</span>
													    <?php echo $row['question_choice3'];?>
													  </label>
													</div> 
													<div class="form-check">
													  <input class="form-check-input" type="radio" name="quizcheck[<?php echo $questionID; ?>][correct]" id="choiceAnswer" value="<?php echo $row['question_choice4'] ?>" required>
													  <label class="form-check-label"> 
													  	<span class="font-weight-bold">D.</span>
													    <?php echo $row['question_choice4'];?>
													  </label>
													</div> 
												</div>
	                  </td>
									</tr>
									<?php       
										}//END OF WHILE
									?>
                  <!--END QUESTION--->
                  <tr>
                      <td style="padding: 20px;">
                        <!--<button type="button" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reset</button>-->
                        <input type="submit" target=_blank value="Submit" class="btn btn-xlg btn-primary p-2 pl-4 pr-4 float-left" id="submitAnswerFrmBtn">
                      </td>
                 	</tr>
									<?php
									}//END OF IF num_rows
									else { ?>
										<div class="alert alert-warning text-center text-lg" role="alert">
										  <strong style="font-size: 16px;">No questions at this moment</strong>.
										</div>
									<?php } ?>
								</table>
								</form>
							</div>
						</div>
          </section>
          <!-- right col -->
        </div>
    		<div class="floating-timer">
        		<!--<form name="cd">
                <input type="hidden" name="" id="timeExamLimit" value="<?php echo $show_examData['exam_time_limit']?>">
                <label style="color: white;">Remaining Time : </label>
                <input style="border:none; background-color: transparent; color:white; font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly disabled/>
            </form>-->

        		<span class="badge badge-danger timer-show" id="demo" style="padding: 10px;"></span>
        </div>

        <style type="text/css">
          .floating-timer { position: fixed; top: 100px; right: 40px; font-size: 25px;}
        	/**.floating-timer { position: fixed; top: 100px; right: 40px; font-size: 20px; border-radius: 5px; padding-left: 25px; background-color: #2E6930;}**/
        </style>
<?php
include 'includes/footer.php';
?>


<?php
include 'includes/scripts.php';
?>
<!--JS Functions-->
<script src="../js/exam/exam.js"></script>
</body>
</html>