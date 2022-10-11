<?php
session_start();

include '../database/db_config.php';
include 'includes/header.php';
?>

<!----- SIDEBAR MENU ----->
<nav class="sidebar" id="sidebar">
	<div class="sidebar-header">
		<h3><img src="../images/chslogo.png" class="img-fluid"/><span>CHSES Admin</span></h3>
	</div>

	<ul class="list-unstyled components">
		<li class="">
			<a href="../admin" class="dashboard"><i class="material-icons">dashboard</i><span>dashboard</span></a>
		</li>

		<li class="dropdown">
			<a href="#pageUser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
			<i class="material-icons">manage_accounts</i><span>Users</span></a>
			<ul class="collapse list-unstyled menu" id="pageUser">
				<li><a href="manage-user.php"><i class="material-icons">&#8226;</i>Manage Users</a></li>
				<li><a href="manage-student.php"><i class="material-icons">&#8226;</i>Manage Students</a></li>
			</ul>
		</li>

		<li class="dropdown active">
			<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
			<i class="material-icons">border_color</i><span>Exam</span></a>
			<ul class="collapse show list-unstyled menu" id="pageSubmenu1">
				<li class="active"><a href="manage-exam.php"><i class="material-icons" style="color: #2e6930;">&#8226;</i>Manage Exam</a></li>
			</ul>
		</li>

		<div class="small-screen navbar-display">
			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="profile.php"><i class="material-icons">account_box</i><span>Profile</span></a>
			</li>
			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="controllers/auth-logout.php"><i class="material-icons">logout</i><span>Log Out</span></a>
			</li>
		</div>

	</ul>
</nav>


<?php
include 'includes/navbar.php';

$examID = $_GET['examID'];
$showID = base64_decode(urldecode($examID));
?>

<!----- MAIN CONTENT ----->

<div class="main-content">

	<div class="row">
		<div class="d-flex justify-content-between" style="width: 100%;">		
			<ul class="breadcrumb">
			  <li><a href="manage-exam.php">Manage Exam</a></li>
			  <li>Edit Exam</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<section class="col-lg-7">
			<div class="card" style="font-size: 14px;">
				<?php 
            $sql = $connection->query("SELECT * FROM questions WHERE exam_id_fk = '$showID'");
        ?>
				<div class="card-header card-header-text">
					<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addExamQuestionModal">Add Question</button>
					<h4 class="card-title">Questions <span class="badge badge-primary countQuestions">0</span></h4>
					<input type="hidden" name="showID" id="showID" value="<?php echo $showID;?>">
				</div>
				<div class="card-content table-responsive scrollable" style="min-height: 850px;">
					<div class="load-questions"></div>
				</div>
			</div>
		</section>
		<section class="col-lg-5">
			<div class="card" style="min-height: 300px;">
				<div class="card-header card-header-text">
					<h4 class="card-title">Exam Details <a tabindex="0" class="text-danger" role="button" data-toggle="popover" data-trigger="focus" title="Information Guide" data-content="The information displayed here can be modified."><i class="fa-regular fa-circle-question"></i></a></h4>
					<!--<p class="category">some text here</p>This is based on exam id from database-->
				</div>
				<div class="card-content table-responsive">
		    	<!---- UPDATE EXAM FORM ---->
		      <form id="updateExamDetailsForm" action="controllers/updateExamDetails.php" method="POST">
		      	<input type="hidden" name="exam_id" id="exam_id">
						<div class="form-group">
		          <label for="update_examTitle">Title</label>
		          <input type="text" class="form-control" id="update_examTitle" name="update_examTitle" placeholder="Enter exam title">
		        </div>
		        <div class="form-group">
		          <label for="update_examTimeLimit">Time Limit</label>
		          <select class="form-control" id="update_examTimeLimit" name="update_examTimeLimit">
		            <option value="">Select Time</option>
		            <option value="1">1 Minute</option>
		            <option value="10">10 Minutes</option>
		            <option value="20">20 Minutes</option>
		            <option value="30">30 Minutes</option>
		            <option value="40">40 Minutes</option>
		            <option value="50">50 Minutes</option>
		            <option value="60">60 Minutes</option>
		          </select>
		        </div>
		        <div class="form-group">
		          <label for="update_examDescription">Description</label>
		          <textarea class="form-control" id="update_examDescription" name="update_examDescription" placeholder="Enter exam description or instruction here." rows="3" aria-describedby="examDescHelp"></textarea>
		          <small id="examDescHelp" class="form-text text-muted">You may leave this blank.</small>
		        </div>
		        <div class="form-group">
		          <label for="examStatus">Status</label><br>
		          <h5><span class="badge examStatus">Status</span></h5>
		        </div>
		      	<button type="submit" class="btn btn-primary btn-sm float-right">Save changes</button>
				  </form>
				</div>
			</div>
		</section>
	</div>

<!-- Add Question Modal -->
<div class="modal fade" id="addExamQuestionModal" tabindex="-1" aria-labelledby="addExamQuestionModal" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!---- ADD EXAM QUESTION FORM ---->
        <form id="addQuestionForm" action="controllers/addQuestion.php" method="POST">
        	<input type="hidden" name="exam_id" id="exam_id" value="<?php echo $showID;?>">
		    <div class="form-group">
          <label for="question" class="font-weight-bold">Question</label>
          <textarea class="form-control" id="question" name="question" rows="3" placeholder="Enter question here" aria-describedby="updateQuestion"></textarea>
        </div>
        <p class="font-weight-bold mb-3">Input your choices here</p>
        <div class="form-group">
          <input type="text" class="form-control" id="question_choice_A" name="question_choice_A" placeholder="Choice A" title="Choice A">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="question_choice_B" name="question_choice_B" placeholder="Choice B" title="Choice B">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="question_choice_C" name="question_choice_C" placeholder="Choice C" title="Choice C">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="question_choice_D" name="question_choice_D" placeholder="Choice D" title="Choice D">
        </div>
        <div class="form-group">
          <label for="exam_correct_Answer" class="text-success font-weight-bold">Correct Answer</label>
          <input type="text" class="form-control is-valid" id="question_correct_Answer" name="question_correct_Answer" aria-describedby="examAnsHelp">
          <small id="examAnsHelp" class="form-text text-muted">Enter the correct answer from the choices above.</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
      	</form>
    </div>
  </div>
</div>

<!-- Update Question Modal -->
<div class="modal fade" id="updateExamQuestionModal" tabindex="-1" aria-labelledby="updateExamQuestionModal" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!---- ADD EXAM QUESTION FORM ---->
        <form id="updateQuestionForm" action="controllers/updateQuestion.php" method="POST">
        	<input type="hidden" name="question_id" id="question_id">
		    <div class="form-group">
          <label for="update_question" class="font-weight-bold">Question</label>
          <textarea class="form-control" id="update_question" name="update_question" rows="3" placeholder="Enter question here" aria-describedby="updateQuestion"></textarea>
        </div>
        <p class="font-weight-bold mb-3">Input your choices here</p>
        <div class="form-group">
          <input type="text" class="form-control" id="update_question_choice_A" name="update_question_choice_A" placeholder="Choice A" title="Choice A">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="update_question_choice_B" name="update_question_choice_B" placeholder="Choice B" title="Choice B">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="update_question_choice_C" name="update_question_choice_C" placeholder="Choice C" title="Choice C">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="update_question_choice_D" name="update_question_choice_D" placeholder="Choice D" title="Choice D">
        </div>
        <div class="form-group">
          <label for="update_question_correct_Answer" class="text-success font-weight-bold">Correct Answer</label>
          <input type="text" class="form-control is-valid" id="update_question_correct_Answer" name="update_question_correct_Answer" aria-describedby="examAnsHelp">
          <small id="examAnsHelp" class="form-text text-muted">Enter the correct answer from the choices above.</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
      	</form>
    </div>
  </div>
</div>

<?php
include 'includes/footer.php';
?>
<?php
include 'includes/scripts.php';
?>
<!--JS Functions-->
<script src="../js/admin/edit-exam.js"></script>
</body>
</html>