<?php
session_start();
error_reporting(0);

if($_SESSION['auth_userRole'] == '' || $_SESSION['auth_userRole'] != 'teacher'){
	header('Location: ../auth-login.php');
	session_unset();
	session_destroy();
}

include 'includes/header.php';
?>

<!----- SIDEBAR TOGGLE ON/OFF ----->
<nav class="sidebar" id="sidebar">
	<div class="sidebar-header">
		<h3><img src="../images/chslogo.png" class="img-fluid"/><span>CHSES Faculty</span></h3>
	</div>

	<ul class="list-unstyled components">
		<li class="">
			<a href="../faculty" class="dashboard"><i class="material-icons">dashboard</i><span>dashboard</span></a>
		</li>

		<li class="active">
			<a href="category.php" class="dashboard"><i class="material-icons">category</i><span>Category</span></a>
		</li>

		<div class="small-screen navbar-display">
			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="profile.php"><i class="material-icons">account_box</i><span>Profile</span></a>
			</li>
			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="../controllers/auth-logout.php"><i class="material-icons">logout</i><span>Log Out</span></a>
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
			      	<div class="card-deck">
					  <div class="card col-sm-3">
					    <img src="../images/online_test.svg" class="card-img-top" alt="..." style="padding: 2.5rem;">
					    <div class="card-body">
					      <h5 class="card-title">Manage Exam</h5>
					      <p class="card-text">Exam Management is to help you set questions and answers.</p>
					    </div>
					    <div class="card-footer">
					      <a href="manage-exam.php" id="bt_takeExam" class="btn btn-primary btn-block"> Manage Exam </a>
					    </div>
					  </div>
					  <div class="card col-sm-3">
					    <img src="../images/students.svg" class="card-img-top" alt="..." style="padding: 1.5rem;">
					    <div class="card-body">
					      <h5 class="card-title">Manage Students</h5>
					      <p class="card-text">Student Management includes student record creation.</p>
					    </div>
					    <div class="card-footer">
					      <a href="manage-student.php" id="bt_takeExam" class="btn btn-primary btn-block"> Manage Students </a>
					    </div>
					  </div>
				  	</div>
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
</script>