<?php
session_start();

$userID = $_SESSION['user_id'];

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

		<li class="">
			<a href="category.php" class="dashboard"><i class="material-icons">category</i><span>Category</span></a>
		</li>

		<div class="small-screen navbar-display">
			<li class="d-lg-none d-md-block d-xl-none d-sm-block active">
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
			  <li>Profile</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8 col-sm-6 col-sm-6">
			<div class="card" style="min-height: 300px;">
				<div class="card-header card-header-text">
					<div class="form-row justify-content-between">
						<h4 class="card-title">My Profile</h4>
						<div class="form-row">
							<div class="form-group col">
								<h4 class="card-title">Status</h4>
							</div>
					      	<div class="form-group col">
					      		<h5><span class="userStatus">Status</span></h5>
					      	</div>
					    </div>
					</div>
				</div>
				<div class="card-content">
					<form id="updateProfileForm" action="../admin/controllers/updateProfile.php" method="POST">
					  <input type="hidden" name="user_id" id="user_id" value="<?php echo $userID;?>">
					  <div class="form-group row">
					    <label for="username" class="col-sm-2 col-form-label font-weight-bold">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="username" id="username" value="USERNAME">
					    </div>
					  </div>
					  <div class="form-group row">
				        <label for="password" class="col-sm-2 col-form-label font-weight-bold">Password</label>
				        <div class="col-sm-10">
				          <div class="input-group">
				           <input type="password" class="form-control" name="password" id="password" value="PASSWORD" data-toggle="password" aria-describedby="passwordHelpBlock">
				            <div class="input-group-append">
				            	<span class="input-group-text input-group-text-toggle" data-toggle="tooltip" title="Show Password"><i class="far fa-eye-slash"></i>
				         		</span>
				            </div>
				          </div>
				        </div>
				      </div>
		        	  <div class="form-group row">
					    <label for="userRole" class="col-sm-2 col-form-label font-weight-bold">Role</label>
					    <div class="col-sm-10">
					      <input type="text" readonly class="form-control" name="userRole" id="userRole" value="Role">
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
<script src="../toggle_password/bootstrap-show-password.js"></script>
<!--JS Functions-->
<script src="../js/faculty/profile.js"></script>
</body>
</html>