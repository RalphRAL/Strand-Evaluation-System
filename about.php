<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Caloocan High School Strand Evaluation System</title>
	<link rel="stylesheet" type="text/css" href="css/landingpage.css">
	<!--ICONS-->
	<link href="images/chslogo.png" rel="icon">
	<!--FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<section class="sub-header">
	<nav>
		<a href="index.php"><img src="images/chslogo.png"></a>
		<div class="nav-links" id="navLinks">
			<i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="about.php">ABOUT</a></li>
				<li><a href="index.php#strr">COURSE</a></li>
				<li><a href="index.php#camp">OUR CAMPUS</a></li>
				<li><a href="#footer">CONTACT</a></li>
			</ul>
		</div>
		<i class="fa-solid fa-bars" onclick="showMenu()"></i>
	</nav>
	<h1>About Us</h1>

</section>

<!--ABOUT US CONTENT-->

<section class="about-us">
	<div class="row">
		<div class="about-col">
			<h1>Caloocan High School</h1>
			<p>Caloocan High School first stepped its foot to then Municipality of Caloocan in 1941. It was once the second largest high school in the entire Asia, with a population of 10,000 students. Now, it currently offers multi-curricular programs, complying to the standards set by the Department of Education.</p>
			<a href="https://www.facebook.com/profile.php?id=100077370277782" targget="_blank"class="hero-btn green-btn-outline">EXPLORE NOW</a>
		</div>
		<div class="about-col">
			<img src="images/bout.jpg">
		</div>
	</div>
</section>

<!--FONTAWESOME 6-->
<script src="https://kit.fontawesome.com/fe40695223.js" crossorigin="anonymous"></script>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 class="footer-contact-h4">Useful Links</h4>
            <ul>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="index.php">Take Exam</a></li>
            </ul>
          </div>

        <!--  <div class="col-lg-3 col-md-6 footer-links">
            <h4 class="footer-contact-h4">Our Services</h4>
            <ul>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="#">Link Here</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="#">Link Here</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="#">Link Here</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="#">Link Here</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="#">Link Here</a></li>
            </ul>
          </div>-->

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4 class="footer-contact-h4">Contact Us</h4>
            <p class="footer-contact-p">
              10th Avenue,<br>
              West Grace Park, 1400 Caloocan,<br>
              Philippines <br><br>
              <strong>Phone:</strong> (02)361-0860<br>
              <strong>Email:</strong>calhiseniorhs@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h4 class="footer-contact-h4">About Us</h4>
            <p class="footer-contact-p">Caloocan High School (CHS) is a public junior to senior high learning facility managed and regulated by the Department of Education.</p>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/CalHighSchool" class="facebook" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="https://www.instagram.com/caloocanhighschool/?hl=en" class="instagram"><i class="fa-brands fa-instagram" target="_blank"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Caloocan Highschool</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->
<!--Menu Functions-->
<script>
	var navLinks = document.getElementById("navLinks");

	function showMenu(argument) {
		navLinks.style.right = "0";
	}
	function hideMenu(argument) {
		navLinks.style.right = "-200px";
	}
</script>
</body>
</html>
