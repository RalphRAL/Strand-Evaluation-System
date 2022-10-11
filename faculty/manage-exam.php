<?php
session_start();

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
    <div class="d-flex justify-content-between" style="width: 100%;">   
      <ul class="breadcrumb">
        <li><a href="category.php">Category</a></li>
        <li>Manage Exam</li>
      </ul>
    </div>
  </div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="alert alert-success text-lg" role="alert">
			  <strong>Note:</strong><p style="font-size: 16px;">&#x2022; A toggle button in the column <strong>"EXAM STATUS"</strong> designates whether an exam is <strong>Active or Inactive</strong>.
			  <br>&#x2022; There will be only one (1) exam active at once. The rest will be set to inactive automatically.</p>
			</div>
			<div class="card" style="min-height: 300px;">
				<div class="card-header card-header-text">
					<div class="float-right">
						<button type="button" id="bt_refresh" class="btn btn-primary btn-sm mr-1"><i class="fa-solid fa-rotate-right"></i></button>
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addExamModal">Add Exam</button>
					</div>
					<h4 class="card-title">Exam List</h4>
					<p class="category">some description here or date</p>
				</div>
				<div class="card-content table-responsive">
					<table class="table table-hover table-borderless table-thead-bordered" id="examTable">
						<thead class="thead-light">
							<tr>
								<th>#No</th>
								<th>Exam Title</th>
								<th>Exam Time Limit</th>
								<th>Exam Description</th>
								<th>Exam Created</th>
								<th>Exam Status</th>
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
        <form id="addExamForm" action="../admin/controllers/addExam.php" method="POST">
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
<!--JS Functions-->
<script src="../js/faculty/manage-exam.js"></script>
</body>
</html>