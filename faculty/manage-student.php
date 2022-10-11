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
        <li>Manage Student</li>
      </ul>
    </div>
  </div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card" style="min-height: 300px;">
				<div class="card-header card-header-text">
					<div class="float-right">
						<button type="button" id="bt_refresh" class="btn btn-primary btn-sm mr-1"><i class="fa-solid fa-rotate-right"></i></button>
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStudentModal">Add Student</button>
					</div>
					<h4 class="card-title">Student Record</h4>
					<span>Toggle column:</span>
					<div class="btn-group" role="group">
					  <a class="toggle-vis btn btn-primary btn-sm" data-column="1" style="cursor: pointer;">Name</a><a class="toggle-vis btn btn-primary btn-sm" data-column="2">Mobile #</a><a class="toggle-vis btn btn-primary btn-sm" data-column="3">E-mail</a><a class="toggle-vis btn btn-primary btn-sm" data-column="4">Status</a><a class="toggle-vis btn btn-primary btn-sm" data-column="5">Exam Status</a>
					</div>
				</div>
				<div class="card-content table-responsive">
					<table class="table table-hover table-borderless table-thead-bordered" id="studentTable">
						<thead class="thead-light">
							<tr>
								<th>#No</th>
								<th>Name</th>
								<th>Mobile #</th>
								<th>E-mail Address</th>
								<th>Status</th>
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


<!-- User Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!---- ADD STUDENT FORM ---->
        <form id="addStudentForm" action="../admin/controllers/addStudent.php" method="POST">
        <div class="form-group row">
          <label for="stud_fn" class="col-sm-4 col-form-label">First name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="stud_fn" id="stud_fn">
          </div>
        </div>
        <div class="form-group row">
          <label for="stud_mn" class="col-sm-4 col-form-label">Middle name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="stud_mn" id="stud_mn">
          </div>
        </div>
        <div class="form-group row">
          <label for="stud_ln" class="col-sm-4 col-form-label">Last name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="stud_ln" id="stud_ln">
          </div>
        </div>
        <div class="form-group row">
          <label for="stud_mobileNum" class="col-sm-4 col-form-label">Mobile number</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="stud_mobileNum" id="stud_mobileNum" aria-describedby="mobileNumHelpBlock">
            <small id="mobileNumHelpBlock" class="form-text text-muted">
							 There should be 11 digits in a mobile number. (Example: 09XXXXXXXXX)
						</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="stud_emailAdd" class="col-sm-4 col-form-label">E-mail address</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="stud_emailAdd" id="stud_emailAdd">
          </div>
        </div>
        <div class="form-group row">
            <label for="stud_pass" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
              <div class="input-group">
               <input type="password" class="form-control" name="stud_pass" id="stud_pass" data-toggle="password" aria-describedby="passwordHelpBlock">
                <div class="input-group-append">
                  <span class="input-group-text input-group-text-toggle" data-toggle="tooltip" title="Show Password"><i class="far fa-eye-slash"></i>
                  </span>
                  <span class="input-group-text" data-toggle="tooltip" title="Generate Password" id="btn_generatePass"><i class="material-icons">auto_fix_normal</i>
                  </span>
                </div>
              </div>
              <small id="passwordHelpBlock" class="form-text text-muted">
							  The password must contain at least 8 characters.
							</small>
            </div>
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
<script src="../js/faculty/manage-student.js"></script>
</body>
</html>