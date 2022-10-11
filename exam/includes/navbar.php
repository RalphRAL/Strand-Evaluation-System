<!----- PAGE CONTENT ----->

<div id="content">
	
	<!----- TOP NAVBAR DESIGN----->

	<div class="top-navbar">
		<nav class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<button type="button" id="sidebar-collapse" class="d-xl-block d-lg-block d-md-none d-none">
					<span class="material-icons">menu_open</span>
				</button>

				<a class="navbar-brand" href="../exam">Dashboard</a>
				<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
					<span class="material-icons">more_vert</span>
				</button>
				<div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarcollapse">
					
					<ul class="nav navbar-nav ml-auto">
						<!--<li class="nav-item dropdown active">
							<a class="nav-link" href="#" data-toggle="dropdown">
								<span class="material-icons">notifications</span>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">You have 4 new notifications</a>
								</li>
								<li>
									<a href="#">You have 4 new notifications</a>
								</li>
								<li>
									<a href="#">You have 4 new notifications</a>
								</li>
								<li>
									<a href="#">You have 4 new notifications</a>
								</li>
							</ul>
						</li>-->
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" data-toggle="dropdown">
							<?php
								if(isset($_SESSION['student_email_address'])){
									echo $_SESSION['student_email_address'];
								}
								else {
									echo 'No user set';
								}
							?></a>
							<ul class="dropdown-menu">
								<li>
									<a href="profile.php">Profile <i class="material-icons float-right" style="color: #2e6930;">person</i></a>
								</li>
								<li>
									<a href="../database/logout.php">Log out <i class="material-icons float-right" style="color: #2e6930;">logout</i></a><!--Change its styling di pantay-->
								</li>
							</ul>
						</li>
					</ul>
				</div>						
			</div>
		</nav>
	</div>
