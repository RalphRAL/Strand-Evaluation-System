<?php
session_start();

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
?>

<!----- MAIN CONTENT ----->

<div class="main-content">

	<div class="row">
		<div class="d-flex justify-content-between" style="width: 100%;">		
			<ul class="breadcrumb">
			  <li>Manage Exams</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="alert alert-success text-lg" role="alert">
			  <strong>Note:</strong><p style="font-size: 16px;">&#x2022; A toggle button in the column <strong>"STATUS"</strong> designates whether an exam is <strong>Active or Inactive</strong>.
			  <br>&#x2022; There will be only one (1) exam active at once. The rest will be set to inactive automatically.</p>
			</div>
			<div class="card" style="min-height: 300px;">
				<div class="card-header card-header-text">
					<div class="float-right">
						<button type="button" id="bt_refresh" class="btn btn-primary btn-sm mr-1"><i class="fa-solid fa-rotate-right"></i></button>
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addExamModal">Add Exam</button>
					</div>
					<h4 class="card-title">Exam List</h4>
					<span>Toggle column:</span>
					<div class="btn-group" role="group">
					  <a class="toggle-vis btn btn-primary btn-sm" data-column="1" style="cursor: pointer;">Title</a><a class="toggle-vis btn btn-primary btn-sm" data-column="2">Time Limit</a><a class="toggle-vis btn btn-primary btn-sm" data-column="3">Description</a><a class="toggle-vis btn btn-primary btn-sm" data-column="4">Created</a>
					</div>
				</div>
				<div class="card-content table-responsive">
					<table class="table table-hover table-borderless table-thead-bordered" id="examTable">
						<thead class="thead-light">
							<tr>
								<th>#No</th>
								<th>Title</th>
								<th>Time Limit</th>
								<th>Description</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<!-- Exam Modal -->
<div class="modal fade" id="addExamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!---- ADD EXAM FORM ---->
        <form id="addExamForm" action="controllers/addExam.php" method="POST">
		<div class="form-group">
          <label for="examTitle">Exam Title</label>
          <input type="text" class="form-control" id="examTitle" name="examTitle" placeholder="Enter exam title">
        </div>
        <div class="form-group">
          <label for="examTimeLimit">Exam Time Limit</label>
          <select class="form-control" id="examTimeLimit" name="examTimeLimit">
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
          <label for="examDescription">Exam Description</label>
          <textarea class="form-control" id="examDescription" name="examDescription" placeholder="Enter exam description or instruction here." rows="3" aria-describedby="examDescHelp"></textarea>
          <small id="examDescHelp" class="form-text text-muted">You may leave this blank.</small>
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
<script src="../toggle_password/bootstrap-show-password.js"></script>
<!--JS Functions-->
<script src="../js/admin/manage-exam.js"></script>
</body>
</html>