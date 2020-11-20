<!DOCTYPE html>
<html>
<head>
	<title>My Project</title>

	 <!--Bootstrap CSS-->
    <link rel="stylesheet" href="CSS/bootstrap.min.css.css">

    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="CSS/all.min.css.css">
    <link rel="stylesheet" href="CSS/custom.css">

   
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<!-- start navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top new-col">
	<a href="index.php" class="navbar-brand">Online Services</a>
	<span class="navbar-text">Best Service,Right Time,Right People</span>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="myMenu">
		<ul class="navbar-nav pl-5 custom-nav first_ui">
			<li class="nav-item pl-3"><a href="index.php">Home</a></li>
			<li class="nav-item  pl-3" ><a href="#Services">Services</a></li>
			<li class="nav-item pl-3"><a href="#reg">Registration</a></li>
			<li class="nav-item pl-3"><a href="Requester/RequesterLogin.php">Login</a></li>
			<li class="nav-item pl-3"><a href="#contact">Contact</a></li>
		</ul>
	</div>
</nav>
<!-- end navigation -->

<!-- start header -->
<header class="jumbotron back-image" style="background-image:url(image/Banner1.jpeg);">
	<div class="myclass mainHeading">
		<h1 class="text-uppercase font-weight-bold">Welcome</h1>
		<p class="font-italic aim text-white">Best Service,Right Time,Right People</p>
		<a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
		<a href="#reg" class="btn mr-4">Sign Up</a>
    </div>
</header>
<!-- end header -->

<!-- introduction section -->
<div class="container">
		<div class="jumbotron text-white" style="background-color: #9db1c5 !important;">
			<h3 class="text-center">Online Services</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
	</div>
	<!-- end introduction -->

<!-- Start service -->
<div class="container text-center border-bottom" id="Services">
	<h2>Our Services</h2>
	<div class="row mt-4">
		<div class="col-sm-4 mb-4">
			<a href="#"><i class="fas fa-tv fa-8x
				text-success"></i></a>
			<h4>Electronic Appliances</h4>
		</div>
			<div class="col-sm-4 mb-4">
			<a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
			<h4>Preventive Maintenance</h4>
		</div>
			<div class="col-sm-4 mb-4">
			<a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
			<h4>Fault Repair</h4>
		</div>
	</div>
</div>
<!-- End service -->

<!-- start registration form -->
 <?php include('userRegistration.php') ?>
<!-- end registration form -->

<!-- start happy customer -->
<div class="jumbotron" style="background-color: #9db1c5">
	<div class="container">
		<h2 class="text-center text-white">Happy Customers</h2>
		<div class="row mt-5">
			<!-- first column -->
			<div class="col-lg-3 col-sm-6">
				<div class="card shadow-lg mb-2">
					<div class="card-body text-center">
						<img src="image/avtar1.jpeg" style="border-radius: 100px;">
						<h4 class="card-title">Rahul Kumar</h4>
						<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                ducimus voluptas
                nesciunt debitis numquam.</p>
					</div>
				</div>
			</div>
			<!-- end first column -->


			<!-- 2nd column -->
			<div class="col-lg-3 col-sm-6">
				<div class="card shadow-lg mb-2">
					<div class="card-body text-center">
						<img src="image/avtar2.jpeg" style="border-radius: 100px;">
						<h4 class="card-title">Sonam Sharma</h4>
						<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                ducimus voluptas
                nesciunt debitis numquam.</p>
					</div>
				</div>
			</div>
			<!-- end 2nd column -->

			<!-- start 3rd column -->
			<div class="col-lg-3 col-sm-6">
				<div class="card shadow-lg mb-2">
					<div class="card-body text-center">
						<img src="image/avtar3.jpeg" class="img-fluid" style="border-radius: 100px;">
						<h4 class="card-title">Sumit Vyas</h4>
						<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                ducimus voluptas
                nesciunt debitis numquam.</p>
					</div>
				</div>
			</div>
            <!-- end 3rd column -->

         <!-- start 4th column -->
         <div class="col-lg-3 col-sm-6">
         	<div class="card shadow-lg mb-2">
         		<div class="card-body text-center">
         			<img src="image/avtar4.jpeg" class="image-fluid" style="border-radius: 100px;">
         			<h4 class="card-title">Riya Gupta</h4>
         			<p class="card-text">Itaque illo explicabo voluptatum, saepe libero rerum, ad
                ducimus voluptas
                nesciunt debitis numquam.</p>
         		</div>
         	</div>
         </div>
         <!-- end 4th column -->
		</div>
	</div>
</div>
<!-- end happy customer -->

<!-- contact us start -->
<div class="container" id="contact">
	<h2 class="text-center">Contact US</h2>
	<div class="row">

		<!-- contact start -->
	<?php include('contactform.php'); ?>
			<!-- contact end -->

	<!-- address start-->
	<div class="col-md-4 text-center">
		<strong>Headquarter:</strong>
		  Online Servie Pvt Ltd, <br>
        Sec IV, Noida <br>
        UP - 834005 <br>
        Phone: +00000000 <br>
        <a href="#" target="_blank">www.osms.com</a><br>
	<br><br>
	<strong>Delhi Branch:</strong><br>
	  Online Service Pvt Ltd, <br>
        Sec IV, Dawarka <br>
        Delhi - 834005 <br>
        Phone: +00000000 <br>
        <a href="#" target="_blank">www.osss.com</a><br>
	</div>
      <!-- end addres -->

	</div>
</div>
<!-- end contact us -->

<footer class="container-fluid bg-dark mt-5" style="border-top: 3px solid #29d0c5;">
	<div class="container">
		<div class="row py-3">
			<div class="col-md-6">
				<!-- footer 1st column start-->
             <span>
             	<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
             	<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
             	<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
             	<a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
             	<a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
             </span>
         </div>
                 <!-- footer 1st column end -->
                 <!-- footer 2nd column start -->
                 <div class="col-md-6 text-right">
				<small class="text-white">Designed by Someone &copy; 2020</small>
				<small><a href="Admin/login.php">Admin Login</a></small>
			</div>
			<!-- footer 2nd column end -->
		
		</div>
	</div>
</footer>

<!-- -Bootstrap JavaScript----->
<script src="JS/jquery.min.js.js"></script>
<script src="JS/popper.min.js.js"></script>
<script src="JS/bootstrap.min.js.js"></script>
<script src="JS/all.min.js"></script> 

</body>
</html>