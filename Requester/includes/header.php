
<!DOCTYPE html>
<html>
<head>
	<title><?php echo TITLE; ?></title>

	<!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../CSS/bootstrap.min.css.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../CSS/all.min.css.css">

 <!-- Custome CSS -->
 <link rel="stylesheet" href="../CSS/custom.css">
</head>
<body>
	<!-- top navbar -->
	<nav class="navbar navbar-dark fixed-top bg-danger flex-md-norap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">Online Service</a>
	</nav>
	<!-- top navbar end -->

	<!--container start -->
	<div class="container-fluid mb-5" style="margin-top:40px;">
		<div class="row">

			<!-- side bar start -->
			<nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column text-dark">
						<li class="nav-item">
							<a class="nav-link text-dark <?php if(PAGE == 'RequesterProfile'){ echo 'active'; } ?>" href="RequesterProfile.php"><i class="fas fa-user"></i>Profile<span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-dark <?php if(PAGE == 'SubmitRequest'){ echo 'active'; } ?>" href="SubmitRequest.php"><i class="fab fa-accessible-icon"></i>Submit Request</a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-dark <?php if(PAGE == 'CheckStatus'){ echo 'active'; } ?>" href="CheckStatus.php"><i class="fas fa-align-center"></i>Service Status</a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-dark <?php if(PAGE == 'changepass'){
							echo 'active';
						} ?>"  href="RequesterChangepass.php"><i class="fas fa-key"></i>Change Password</a>
						</li>

						<li class="nav-item"><a class="nav-link text-dark" href="../logout.php"><i class="fas fa-key"></i>Logout</a></li>

					</ul>
				</div>
			</nav>
<!-- sidebar end -->