<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
if(isset($_REQUEST['adminlogin'])){
  $aEmail = $_REQUEST['aEmail'];
  $aPass = $_REQUEST['aPass'];
  $sql = "SELECT * FROM admin_login_tb WHERE a_email = '$aEmail' AND a_password = '$aPass' limit 1";
  $result = $conn->query($sql);
  if($result->num_rows == 1){
  	$_SESSION['is_adminlogin'] = true;
  	$_SESSION['aEmail'] = $aEmail;
  	echo "<script> location.href='dashboard.php'</script>";
  }else{
  	$msg = "<div class='alert alert-danger'>Unable to login</div>";
  }
}
}else{
	echo "<script> location.href='dashboard.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>

<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../CSS/bootstrap.min.css.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../CSS/all.min.css.css0">

	<title>Login</title>
</head>
<body>
	<div class="text-center mt-5" style="font-size: 30px;">
		<i class="fas fa-stethoscope"></i>
		<span>Online Maintenance Management System</span>
	</div>

	<p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger"></i><span>Admin Area</span></p>

	<div>
		<div class="row justify-content-center">
			<div class="col-sm-6 col-md-4">
				<form action="" class="shadow-lg p-4" method="POST">
					<div class="form-group">
						<i class="fas fa-user"></i>
						<label class="font-weight-bold pl-2">Email</label>
						<input class="form-control" type="email" name="aEmail">
						<small class="form-text">We'll will never share your email with anyone else.</small>
					</div>

					<div class="form-group">
						<i class="fas fa-key"></i>
						<label class="pl-2 font-weight-bold">Password</label>
						<input type="password" class="form-control" name="aPass">
					</div>

                   <button type="submit" class="btn btn-outline-danger btn-block mt-3 font-weight-bold shadow-sm" name="adminlogin">Login</button>
                   <?php if(isset($msg)){ echo $msg; } ?> 
				</form>
				<div class="text-center mt-2">
				<a class="btn btn-primary" href="../index.php">Back to Home</a>
				</div>
			</div>
		</div>
	</div>

<!-- Boostrap JavaScript -->
  <script src="../JS/jquery.min.js.js"></script>
  <script src="../JS/popper.min.js.js"></script>
  <script src="../JS/bootstrap.min.js.js"></script>
  <script src="../JS/all.min.js"></script>

</body>
</html>