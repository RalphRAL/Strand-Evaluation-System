<!----- SIDEBAR TOGGLE ON/OFF ----->
<nav class="sidebar" id="sidebar">
	<div class="sidebar-header">
		<h3><img src="../images/chslogo.png" class="img-fluid"/><span>CHSES Admin</span></h3>
	</div>

	<ul class="list-unstyled components">
		<li class="">
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
				<li><a href="manage-user.php"><i class="material-icons" style="color: #2e6930;">&#8226;</i>Manage Users</a></li>
				<li><a href="manage-student.php"><i class="material-icons" style="color: #2e6930;">&#8226;</i>Manage Students</a></li>
			</ul>
		</li>

		<li class="dropdown active">
			<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
			<i class="material-icons">border_color</i><span>Exam</span></a>
			<ul class="collapse list-unstyled menu active" id="pageSubmenu1">
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
