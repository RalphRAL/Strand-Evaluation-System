<?php 
require_once 'database/db_config.php';

$sql = 'SELECT * FROM users';
$query = $connection->query($sql);
$row = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Caloocan High School Strand Evaluation System</title>
	<link rel="stylesheet" type="text/css" href="css2/homepage.css">
	<!--ICONS-->
	<link href="images/chslogo.png" rel="icon">
	<!--FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<section class="header">
	<nav>
		<a href="index.php"><img src="images/chslogo.png"></a>
		<div class="nav-links" id="navLinks">
			<i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
			<ul>
				<li><a href="#">HOME</a></li>
				<li><a href="about.php">ABOUT</a></li>
				<li><a href="#strr">COURSE</a></li>
				<li><a href="#camp">OUR CAMPUS</a></li>
				<li><a href="#footer">CONTACT</a></li>
			</ul>
		</div>
		<i class="fa-solid fa-bars" onclick="showMenu()"></i>
	</nav>

<div class="text-box">
	<h1 class="animate-fadeInUp">Caloocan High School</h1>
	<h1 class="animate-fadeInUp">Strand Evaluation</h1>
	<p class="animate-fadeInUp">For Incoming Senior High School Students</p>
	<a href="registration.php" class="hero-btn animate-fadeInUp">TAKE EXAM</a>
</div>
</section>

<!--FONTAWESOME 6-->
<script src="https://kit.fontawesome.com/fe40695223.js" crossorigin="anonymous"></script>

<!--STRANDS-->
<section class="strands" id="strr">
	<h1>Senior High School Program Offerings</h1>
	<div class="row">
		<div class="strand-col">
			<h3>STEM</h3>
			<p>Science, Technology, Engineering, and Mathematics strand. Through the STEM strand, senior high school students are exposed to complex mathematical and science theories and concepts which will serve as a foundation for their college courses.</p>
		</div>
		<div class="strand-col">
			<h3>ABM</h3>
			<p>The Accountancy, Business, and Management Strand strand seeks to prepare the young business leaders of tomorrow. ABM strand paves the way for business-related college degrees. It teaches the basic concepts of financial management, accounting, and corporate operations.</p>
		</div>
		<div class="strand-col">
			<h3>HUMMS</h3>
			<p>The Humanities and Social Sciences strands equip students with a wide range of discipline with the use of their experiences and skills into the investigation and inquiry of human situations by studying its behavior and social changes using empirical, analytical, and critical method techniques.</p>
		</div>
		<div class="strand-col">
			<h3>TVL</h3>
			<p>TVL Strand is designed to develop students' skills that is useful for livelihood and technical projects. It provides a curriculum that is a combination of Core Courses and specialized hands-on courses that meets the competency-based assessment of TESDA.</p>
		</div>
	</div>
</section>

<!--CAMPUS-->
<section class="campus" id="camp">
	<h1>Our Campus</h1>
	

	<div class="row">
		<div class="campus-col">
			<img src="images/campp.jpg">
			<div class="layer">
				<h3>PROGRAMS
				<p style="color:white;">Caloocan High School offers a number of curricular programs suited for you to become a geared asset as you enter college level.</p>
				</h3>
			</div>
		</div>
		<div class="campus-col">
			<img src="images/students.jpg">
			<div class="layer">
				<h3>STUDENTS
				<p style="color:white;">Caloocan High School makes sure that learning is a great experience. Students become engaged on both academic and extra-curricular activities.</p>
				</h3>
			</div>
		</div>
		<div class="campus-col">
			<img src="images/alumn.jpg">
			<div class="layer">
				<h3>ALUMNI
				<p style="color:white;">Reconnect with your batchmates with some events organized by various CHS Alumni Associations.</p>
				</h3>
			</div>
		</div>
	</div>
</section>

<!--FACILITIES-->
<!--<section class="facilities">
	<h1>Our Facilities</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

	<div class="row">
		<div class="facilities-col">
			<img src="http://dummyimage.com/820x720/173518/fff.png&text=820x720">
			<h3>Facility 1</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</div>
		<div class="facilities-col">
			<img src="http://dummyimage.com/820x720/173518/fff.png&text=820x720">
			<h3>Facility 2</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</div>
		<div class="facilities-col">
			<img src="http://dummyimage.com/820x720/173518/fff.png&text=820x720">
			<h3>Facility 3</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		</div>
	</div>
</section>-->

<!--TESTIMONIALS-->
<!--<section class="testimonials">
	<h1>What our student says</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

	<div class="row">
		<div class="testimonial-col">
			<img src="images/maya-hawke.jpg">
			<div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in volutpat velit. Orci varius natoque penatibus et magnis dis parturient montes</p>
				<h3>Robin Buckley</h3>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-regular fa-star-half-stroke"></i>
				<i class="fa-regular fa-star"></i>
			</div>
		</div>
		<div class="testimonial-col">
			<img src="images/steve-harrington.jpg">
			<div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in volutpat velit. Orci varius natoque penatibus et magnis dis parturient montes</p>
				<h3>Steve Harrington</h3>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-regular fa-star-half-stroke"></i>
			</div>
		</div>
	</div>
</section>-->

<!--CALL TO ACTION-->
<style>
	.cta{
	margin: 100px auto;
	width: 80%;
	background-image: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)),url(images/banner.jpg);
	background-position: center;
	background-size:cover;
	border-radius: 10px;
	text-align: center;
	padding: 100px 0;
	}

	.cta h1{
		color: #fff;
		margin-bottom: 40px;
	}

	@media(max-width: 700px){
		.cta h1 img{
			font-size: 24px;
		}
	}

</style>
<section class="cta">
	<h1>We'd love to hear from you!</h1>
	<a href="https://www.facebook.com/profile.php?id=100077370277782" target="_blank" class="hero-btn">CONTACT US</a>
</section>

<a href="#" onclick="backtotopFunc()" id="backtotopBtn"><i class="fa-solid fa-angle-up"></i></a>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 class="footer-contact-h4">Useful Links</h4>
            <ul>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="/CHS_SES/">Home</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="fa-solid fa-chevron-right"></i> <a href="#top">Take Exam</a></li>
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
              <strong>Phone:</strong>(02)361-0860<br>
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

	/** BACK TO TOP BUTTON **/
	var backtotopBtn = document.getElementById("backtotopBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	    backtotopBtn.style.display = "block";
	  } else {
	    backtotopBtn.style.display = "none";
	  }
	}

	// When the user clicks on the button, scroll to the top of the document
	function backtotopFunc() {
	  document.body.scrollTop = 0;
	  document.documentElement.scrollTop = 0;
	}
</script>
</body>
</html>
