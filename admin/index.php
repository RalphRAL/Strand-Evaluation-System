<?php
session_start();
error_reporting(0);

if($_SESSION['auth_userRole'] == '' || $_SESSION['auth_userRole'] != 'admin'){
	header('Location: ../auth-login.php');
	session_unset();
	session_destroy();
}

include 'includes/header.php';
?>

<!----- SIDEBAR MENU ----->
<nav class="sidebar" id="sidebar">
	<div class="sidebar-header">
		<h3><img src="../images/chslogo.png" class="img-fluid"/><span>CHSES Admin</span></h3>
	</div>

	<ul class="list-unstyled components">
		<li class="active">
			<a href="../admin" class="dashboard"><i class="material-icons">dashboard</i><span>dashboard</span></a>
		</li>

		<!--<div class="small-screen navbar-display">
			<li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				<i class="material-icons">notifications</i><span> 4 notification</span></a>
				<ul class="collapse list-unstyled menu" id="homeSubmenu0">
					<li> <a href="">You have 1 new messages</a></li>
					<li> <a href="">You have 2 new messages</a></li>
					<li> <a href="">You have 3 new messages</a></li>
					<li> <a href="">You have 4 new messages</a></li>
				</ul>
			</li>

			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="#"><i class="material-icons">apps</i><span>apps</span></a>
			</li>
			<li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="#pageUser1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				<i class="material-icons">person</i>User</a>
				<ul class="collapse list-unstyled menu" id="pageUser1">
					<li> <a href="">Log out <i class="material-icons float-right">logout</i></a></li>
				</ul>
			</li>
			<li class="d-lg-none d-md-block d-xl-none d-sm-block">
				<a href="#"><i class="material-icons">settings</i><span>setting</span></a>
			</li>
		</div>-->

		<li class="dropdown">
			<a href="#pageUser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
			<i class="material-icons">manage_accounts</i><span>Users</span></a>
			<ul class="collapse list-unstyled menu" id="pageUser">
				<li><a href="manage-user.php"><i class="material-icons">&#8226;</i>Manage Users</a></li>
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
					<div class="col-lg-3 col-md col-sm-6">
						<div class="card">
						  <div class="card-body scrollable">
						  	<div class="icon icon-warning">
									<span class="material-icons" style="font-size: 40px;">cottage</span>
								</div>
						    <h3 class="card-title" style="text-transform: capitalize;">Welcome, 
						    <?php
									if(isset($_SESSION['auth_userRole'])){
										if($_SESSION['auth_userRole'] == 'admin'){
											echo 'Administrator';
										}
									}
									else {
										echo 'No role set';
									}
									?>
								</h3>
						   <!-- <h6 class="card-subtitle mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a dui felis.</h6>-->
						  </div>
						</div>
					</div>

					<div class="col-lg-3 col-md col-sm-6">
						<div class="card card-stats">
							<div class="card-header">
								<div class="icon icon-rose">
									<span class="material-icons">person</span>
								</div>
							</div>
							<div class="card-content">
								<p class="category"><strong>Users</strong></p>
								<h3 class="card-title load-NumberofUsers">0</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons text-info">info</i>
									<a href="manage-user.php">See All</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md col-sm-6">
						<div class="card card-stats">
							<div class="card-header">
								<div class="icon icon-success">
									<span class="material-icons">groups</span>
								</div>
							</div>
							<div class="card-content">
								<p class="category"><strong>Students</strong></p>
								<h3 class="card-title load-NumberofStudents">0</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons text-info">info</i>
									<a href="manage-student.php">See All</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md col-sm-6">
						<div class="card card-stats">
							<div class="card-header">
								<div class="icon icon-info">
									<span class="material-icons">fact_check</span>
								</div>
							</div>
							<div class="card-content">
								<p class="category"><strong>Exam Takers</strong></p>
								<h3 class="card-title load-NumberofTakers">0</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons text-info">update</i>
									Just updated
								</div>
							</div>
						</div>
					</div>
				</div>

				<!----- SECOND ROW----->

				<div class="row">
					<div class="col-lg-4 col-md-12">
						<!-----<div class="card" style="min-height: 30px;">
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
						</div>----->
					</div>
					<div class="col-lg-12 col-md-8">
						<div class="card" style="min-height: 300px;">
							<div class="card-header card-header-text">
								<!-----<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Primary</button>----->
								<h4 class="card-title">Recent added</h4>
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
<?php

include 'includes/footer.php';
?>


<?php

include 'includes/scripts.php';
?>
<!--JS Functions-->
<script src="../js/admin/index.js"></script>
</body>
</html>