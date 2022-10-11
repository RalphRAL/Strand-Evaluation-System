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

		<li class="">
			<a href="load-exam.php" class="dashboard"><i class="material-icons">border_color</i><span>Exam</span></a>
		</li>

		<div class="small-screen navbar-display">
			<li class="d-lg-none d-md-block d-xl-none d-sm-block active">
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
		<div class="col-lg-12">
			<div class="card" style="min-height: 300px;">
				<div class="card-header card-header-text">
					<div class="form-row justify-content-between">
						<h4 class="card-title">My Profile</h4>
						<div class="form-row">
							<div class="form-group col">
								<h4 class="card-title">Status</h4>
							</div>
					      	<div class="form-group col">
					      		<h5><span class="student_status">Status</span></h5>
					      	</div>
					    </div>
					</div>
				</div>
				<div class="card-content">
					<form id="updateProfileForm" action="controllers/updateProfile.php" method="POST">
					<input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id;?>">
					  <div class="form-row">
					  	<div class="form-group col-lg-4 col-md-4">
					      <label for="firstName">First Name</label>
					      <input type="text" class="form-control" name="firstName" id="firstName">
					    </div>
					    <div class="form-group col-lg-4 col-md-4">
					      <label for="middleName">Middle Name</label>
					      <input type="text" class="form-control" name="middleName" id="middleName">
					    </div>
					    <div class="form-group col-lg-4 col-md-4">
					      <label for="lastName">Last Name</label>
					      <input type="text" class="form-control" name="lastName" id="lastName">
					    </div>
					  </div>
					  <div class="form-row">
					  	<div class="form-group col-lg-4 col-md-4">
					      <label for="mobileNum">Mobile Number</label>
					      <input type="text" class="form-control" name="mobileNum" id="mobileNum">
					      <small id="mobileNumHelpBlock" class="form-text text-muted">
							 There should be 11 digits in a mobile number. (Example: 09XXXXXXXXX)
						  </small>
					    </div>
					    <div class="form-group col-lg-4 col-md-4">
					      <label for="emailAdd">Email</label>
					      <input type="email" class="form-control" name="emailAdd" id="emailAdd" aria-describedby="emailAddHelp">
					      <small id="emailAddHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					    </div>
					    <div class="form-group col-lg-4 col-md-4">
					      <label for="inputPassword4">Password</label>
					      <div class="input-group">
					       <input type="password" class="form-control" name="password" id="password" value="PASSWORD" data-toggle="password" aria-describedby="passwordHelpBlock">
					        <div class="input-group-append">
					        	<span class="input-group-text input-group-text-toggle" data-toggle="tooltip" title="Show Password"><i class="far fa-eye-slash"></i>
					      		</span>
					        </div>
					      </div>
					      <small id="passwordHelpBlock" class="form-text text-muted">
							  The password must contain at least 8 characters.
						  </small>
					    </div>
					  </div>
					  <button type="submit" class="btn btn-primary">Save Changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php

include 'includes/footer.php';
?>


<?php

include 'includes/scripts.php';
?>
</body>
</html>
<script src="../toggle_password/bootstrap-show-password.js"></script>
<script src="../js/exam/profile.js"></script>