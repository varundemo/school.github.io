
<!DOCTYPE html>
<html>
<head>
	<title><?php echo TITLE; ?></title>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="../CSS/bootstrap.min.css.css">

	<!--font awesome css-->
	<link rel="stylesheet" href="../CSS/all.min.css.css">
	
	<!-- Custom css -->
	<link rel="stylesheet" href="../CSS/custom.css">

</head>
<body>
<!-- top navbar -->
<nav class="navbar navbar-dark fixed-top shadow bg-danger">
	<a class="navbar-brand col-sm-3 col-md-2" href="dashboard.php">Online Service</a>
</nav>
<!-- top navbar end -->

<!-- side bar start -->
<div class="container-fluid mb-5" style="margin-top: 40px;">
<div class="row">
	<nav class="col-sm-3 col-md-2 py-5 sidebar bg-light d-print-none">
		<div class="sidebar-sticky">
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == dashboard){ echo "active"; } ?>" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == work){ echo "active"; } ?>" href="work.php"><i class="fab fa-accessible-icon"></i>Work Order</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == requests){ echo "active"; } ?>" href="Request.php"><i class="fas fa-align-center"></i>Requests</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == assets){ echo "active"; } ?>" href="assets.php"><i class="fas fa-database"></i>Assets</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == technician){ echo "active"; } ?>" href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == requester){ echo "active"; } ?>" href="Requester.php"><i class="fas fa-user"></i>Requester</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == sell_report){ echo "active"; } ?>" href="sellproductreport.php"><i class="fas fa-table"></i>Sell Report</a>
				</li>

				<li>
					<a class="nav-link text-dark <?php if(PAGE == work_report){ echo "active"; } ?>" href="workreport.php"><i class="fas fa-table"></i>Work Report</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark <?php if(PAGE == change_pass){ echo "active"; } ?>" href="changepass.php"><i class="fas fa-key"></i>Change Password</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-dark" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				</li>
			</ul>
		</div>
	</nav>
