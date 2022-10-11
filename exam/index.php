<?php
session_start();
error_reporting(0);

if($_SESSION['student_email_address'] == ''){
	header('Location: ../index.php');
}

include 'includes/header.php';
?>

<!----- SIDEBAR TOGGLE ON/OFF ----->
<nav class="sidebar" id="sidebar">
	<div class="sidebar-header">
		<h3><img src="../images/chslogo.png" class="img-fluid"/><span>CHSES</span></h3>
	</div>

	<ul class="list-unstyled components">
		<li class="active">
			<a href="../exam" class="dashboard"><i class="material-icons">dashboard</i><span>dashboard</span></a>
		</li>

		<li class="">
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
          <!-- Left col -->
          <section class="col-lg-4">
          	<div class="card col">
						  <div class="card-body">
						  	<div class="icon icon-warning">
									<span class="material-icons" style="font-size: 40px;">cottage</span>
								</div>
						    <h5 class="card-title">
						    Welcome, 
						    <?php
									if(isset($_SESSION['student_fullname'])){
										echo $_SESSION['student_fullname'];
									}
									else {
										echo 'No user set';
									}
								?></h5>
						   <!-- <h6 class="card-subtitle mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a dui felis.</h6>-->
						  </div>
						</div>
          	<!--<div class="card col" style="min-height: 485;">
							<div class="card-header card-header-text">
								<h4 class="card-title">Activities</h4>
							</div>
							<div class="card-content">
								<div class="steamline">
									<div class="sl-item">
										<div class="sl-content">
											<small class="text-muted">5 min Ago</small>
											<p>Vecna has joined Project Upside down</p>
										</div>
									</div>
									<div class="sl-item">
										<div class="sl-content">
											<small class="text-muted">25 min Ago</small>
											<p>Vecna has joined Project Upside down</p>
										</div>
									</div>
									<div class="sl-item">
										<div class="sl-content">
											<small class="text-muted">5 min Ago</small>
											<p>Vecna has joined Project Upside down</p>
										</div>
									</div>
									<div class="sl-item">
										<div class="sl-content">
											<small class="text-muted">55 min Ago</small>
											<p>Vecna has opened a portal</p>
										</div>
									</div>
									<div class="sl-item">
										<div class="sl-content">
											<small class="text-muted">55 min Ago</small>
											<p>Vecna has opened a portal</p>
										</div>
									</div>
								</div>
							</div>
						</div> -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-8">
			
			<?php
			include 'db_config.php';
			 'results.php';

			session_start();
			$student_id = $_SESSION['student_id'];
			$sql = "SELECT * FROM results WHERE results.student_id_fk = $student_id LIMIT 1";
			$result = $connection->query($sql);
			?>
          	<div class="card" style="min-height: 300px;">
							<div class="card-header card-header-text">
								<!-----<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Primary</button>----->
								<h4 class="card-title">Exam taken</h4>
								<p class="category">some description here or date</p>
							</div>
							<div class="card-content table-responsive">
							<table class="table table-hover" id="examTable">
									<thead class="text-muted">
										<tr>
											<th><strong>#</strong></th>
											<th><strong>Examination</strong></th>
											<th><strong>Date</strong></th>
											<th><strong>Action</strong></th>
										</tr>
							</thead>
							<tbody>
							<?php	
							

								if (mysqli_num_rows($result) > 0) {
								$sn=1;
								while($data = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								<td><?php echo $_SESSION['student_id']; ?> </td>
								<td><?php echo "Strand Recommendation Exam"; ?> </td>
								<td><?php echo $data['result_date']; ?> </td>
								<td> <a href="results.php"><button class="resultbut">View Result</button></a></td>
								<tr>
								<?php
								$sn++;}} else { ?>
									<tr>
									<td colspan="6">No data found</td>
									</tr>

								<?php } ?>
							</div>
						</div>
          </section>
          <!-- right col -->
        </div>

<?php

include 'includes/scripts.php';
?>
<script src="../toggle_password/bootstrap-show-password.js"></script>
<script type="text/javascript">
var examTable;
$(document).ready(function() {

	// SET OF COLOR CLASSES FOR ACTIVITIES TIMELINE
  var classes        = new Array ('sl-primary', 'sl-danger', 'sl-success', 'sl-warning');
  // CALCULATE LENGTH ONCE, AS THIS WILL NEVER CHANGE
  var length        = classes.length;

  // SELECT SPECIFIC CLASS
  var links        = $('.sl-item');
  
  // LOOP THROUGH ALL .sl-item CLASS AND APPLY COLOR RANDOMLY
  $.each( links, function(key, value) {
      // GET RANDOM VALUE AND CLASS NAME FROM ARRAY AND ADD IT USING THE addClass FUNCTION
      console.log ("IN");
      $(value).addClass( classes[ Math.floor ( Math.random() * length ) ] );
  });

	examTable = $('#examTable').DataTable({
		columnDefs: [{
			"orderable": false, "targets": [4]
		}],
		"ajax": "",
		"lengthMenu": [ [10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500] ],
		"language": {
			"emptyTable": "No exam taken found!"
		}
	});
});

document.onkeydown=function(event){
	if (event.keyCode==116) {
		event.preventDefault();
	}
}
</script>
</body>
</html>
<style>
	.resultbut{
	background-color: #2E6930;
	color: white;
	padding: 4px;
	border:2px solid white;
	transition: 1s;
	}
	.resultbut:hover{
		border: 2px solid white;
		background: white;
		color:black;
		transition: 1s;
	}
</style>