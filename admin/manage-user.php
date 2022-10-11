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

		<li class="dropdown active">
			<a href="#pageUser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
			<i class="material-icons">manage_accounts</i><span>Users</span></a>
			<ul class="collapse show list-unstyled menu" id="pageUser">
				<li class="active"><a href="manage-user.php"><i class="material-icons" style="color: #2e6930;">&#8226;</i>Manage Users</a></li>
				<li><a href="manage-student.php"><i class="material-icons">&#8226;</i>Manage Students</a></li>
			</ul>
		</li>

		<li class="dropdown">
			<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
			<i class="material-icons">border_color</i><span>Exam</span></a>
			<ul class="collapse list-unstyled menu" id="pageSubmenu1">
				<li><a href="manage-exam.php"><i class="material-icons">&#8226;</i>Manage Exam</a></li>
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
			  <li>Manage Users</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card" style="min-height: 300px;">
				<div class="card-header card-header-text">
					<div class="float-right">
						<button type="button" id="bt_refresh" class="btn btn-primary btn-sm mr-1"><i class="fa-solid fa-rotate-right"></i></button>
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addUserModal">Add User</button>
					</div>
					<h4 class="card-title">User Record</h4>
					<span>Toggle column:</span>
					<div class="btn-group" role="group">
					  <a class="toggle-vis btn btn-primary btn-sm" data-column="1" style="cursor: pointer;">Username</a><a class="toggle-vis btn btn-primary btn-sm" data-column="2">Password</a><a class="toggle-vis btn btn-primary btn-sm" data-column="3">Role</a><a class="toggle-vis btn btn-primary btn-sm" data-column="4">Account Status</a>
					</div>
				</div>
				<div class="card-content table-responsive">
					<table class="table table-hover table-borderless table-thead-bordered" id="userTable">
						<thead class="thead-light">
							<tr>
								<th>#No</th>
								<th>Username</th>
								<th>Password</th>
								<th>Role</th>
								<th>Account Status</th>
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


<!-- ADD USER MODAL -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!---- ADD USER FORM ---->
        <form id="addUserForm" action="controllers/addUser.php" method="POST">
        <div class="form-group row">
          <label for="accountUsername" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="accountUsername" id="accountUsername" placeholder="Enter username">
          </div>
        </div>
        <div class="form-group row">
            <label for="accountPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <div class="input-group">
               <input type="password" class="form-control" name="accountPassword" id="accountPassword" placeholder="Enter password" data-toggle="password">
                <div class="input-group-append">
                  <span class="input-group-text input-group-text-toggle" data-toggle="tooltip" title="Show Password"><i class="far fa-eye-slash"></i>
                  </span>
                  <span class="input-group-text" data-toggle="tooltip" title="Generate Password" id="btn_generatePass"><i class="material-icons">auto_fix_normal</i>
                  </span>
                </div>
              </div>
            </div>
        </div>
        <div class="form-group row">
          <label for="accountRole" class="col-sm-2 col-form-label">Roles</label>
          <div class="col-sm-10">
            <select class="form-control" name="accountRole" id="accountRole">
              <option value="" selected>Select a role</option>
                <option value="user">User</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Administrator</option>
            </select>
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

<!-- UPDATE USER MODAL -->
<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!---- ADD USER FORM ---->
        <form id="updateUserForm" action="controllers/updateUser.php" method="POST">
        <div class="form-group row">
          <label for="updateUsername" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="updateUsername" id="updateUsername" placeholder="Enter username">
          </div>
        </div>
        <div class="form-group row">
            <label for="updatePassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <div class="input-group">
               <input type="password" class="form-control" name="updatePassword" id="updatePassword" placeholder="Enter password" data-toggle="password">
                <div class="input-group-append">
                  <span class="input-group-text input-group-text-toggle" data-toggle="tooltip" title="Show Password"><i class="far fa-eye-slash"></i>
                  </span>
                  <span class="input-group-text" data-toggle="tooltip" title="Generate Password" id="generateUpdatePass"><i class="material-icons">auto_fix_normal</i>
                  </span>
                </div>
              </div>
            </div>
        </div>
        <div class="form-group row">
          <label for="updateRole" class="col-sm-2 col-form-label">Roles</label>
          <div class="col-sm-10">
            <select class="form-control" name="updateRole" id="updateRole">
              <option value="" selected>Select a role</option>
                <option value="user">User</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Administrator</option>
            </select>
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
<script src="../js/admin/manage-user.js"></script>
</body>
</html>