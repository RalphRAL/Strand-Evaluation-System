<?php
session_start();
error_reporting(0);

if($_SESSION['student_email_address'] == ''){
	header('Location: ../index.php');
}

$student_id = $_SESSION['student_id'];

include '../database/db_config.php';
include 'includes/header.php';
?>

<!----- SIDEBAR TOGGLE ON/OFF ----->
<nav class="sidebar" id="sidebar">
	<div class="sidebar-header">
		<h3><img src="../images/chslogo.png" class="img-fluid"/><span>CHSES</span></h3>
	</div>

	<ul class="list-unstyled components">
		<li class="">
			<a href="../exam" class="dashboard"><i class="material-icons">dashboard</i><span>dashboard</span></a>
		</li>

		<li class="active">
			<a href="load-exam.php" class="dashboard"><i class="material-icons">border_color</i><span>Exam</span></a>
		</li>

		<div class="small-screen navbar-display">
			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="profile.php"><i class="material-icons">account_box</i><span>Profile</span></a>
			</li>
			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="../database/logout.php"><i class="material-icons">logout</i><span>Log Out</span></a>
			</li>
		</div>

	</ul>
</nav>


<?php
include 'includes/navbar.php';

?>
			<!----- MAIN CONTENT ----->

			<div class="main-content">

				<div class="row">
			      <section class="col-lg-12">
			      	<!-----<div class="card" style="min-height: 300px; font-size: 14px;">----->
			      		<?php
			      		$studentData = $connection->query("SELECT * FROM students WHERE student_id = '$student_id'"); 
			      		$row = $studentData->fetch_assoc();
			      		$bt_exam = '';
			      		$card_image = '';
			      		$card_title = '';
			      		$card_desc= '';

			      		if($row['exam_attempt'] == '1'){
			      				$card_image = '../images/online_test.svg';
			      				$card_title = 'Well done!';
			      				$card_desc = 'It appears that you have finished the exam. In order to view and print your results, click the button below.';
			      				$bt_exam = '<a href="results.php"  target="_blank" class="btn btn-primary btn-block"> View Result </a>';
			      		}else {
			      				$card_image = '../images/take_exam.svg';
			      				$card_title = 'Examination';
			      				$card_desc = 'The exam has a fixed time setup; once it reaches zero, your answers will be immediately submitted. Click the button below to start the exam.';
			      				$bt_exam = '<button type="button" id="bt_takeExam" class="btn btn-primary btn-block"> Take Exam </button>';
			      		}
			      		?>
						<div class="card" style="width: 18rem;">
						  <img src="<?php echo $card_image;?>" class="card-img-top" alt="..." style="padding: 2.5rem;">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $card_title;?></h5>
						    <p class="card-text mb-3"><?php echo $card_desc;?></p>
						   <?php echo $bt_exam;?>
						  </div>
						</div>
									<!-----</div>
								</div>----->
			      </section>
          <!-- right col -->
        </div>
<?php

include 'includes/footer.php';
?>


<?php

include 'includes/scripts.php';
?>
</body>
</html>
<script type="text/javascript">
$( "#bt_takeExam" ).click(function() {

	const swalWithBootstrapButtons = Swal.mixin({
	  customClass: {
	    confirmButton: 'btn btn-primary',
	    cancelButton: 'btn btn-danger ml-3'
	  },
	  buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
	  title: "Are you ready?",
	  text: "The time will begin once you continue.",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonText: 'Yes, proceed!',
	  cancelButtonText: 'No, cancel!'
	}).then((result) => {
	  if (result.isConfirmed) {
	    window.location = "take-exam.php";
	  } else if (
	    /* Read more about handling dismissals below */
	    result.dismiss === Swal.DismissReason.cancel
	  ) {
	    swalWithBootstrapButtons.fire(
	      'Cancelled',
	      "Come back, as soon as you're ready, :)",
	      'error'
	    )
	  }
	})
});

</script>