<?php 
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])){
	// echo "<script> location.href='RequesterProfile.php';</script>";
	 header("Location: RequesterProfile.php");
}
 if(isset($_REQUEST['login'])){
	if(($_REQUEST['rEmail']=="") || ($_REQUEST['rPassword']=="")){
		$msg = "<div class='alert alert-warning'>Enter All fields.</div>";
	}else{

$rEmail = mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
$rPassword = mysqli_real_escape_string($conn,trim($_REQUEST['rPassword']));
$sql = "SELECT r_email, r_password FROM requesterlogin_db WHERE r_email ='".$rEmail."'
AND r_password = '".$rPassword."' limit 1";
$result = $conn->query($sql);
if($result->num_rows == 1){
	$_SESSION['is_login'] = true;
	$_SESSION['rEmail'] = $rEmail;
	echo "<script> location.href='RequesterProfile.php';</script>";
}else{
	$msg = "<div class='alert alert-warning'>Enter valid details.</div>";
}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="../CSS/bootstrap.min.css.css">

	<!-- font awosome css -->
	<link rel="stylesheet" href="../CSS/all.min.css.css">


	<title>Login</title>
</head>
<body>
<div class="mb-3 text-center mt-5" style="font-size:30px;">
	<i class="fas fa-stethoscope"></i>
	<span>Online Maintenance System</span>
</div>

<div class="text-center" style="font-size: 20px;">
<p><i class="fas fa-user-secret text-danger"></i>
<span>Requester Area</span>
</p>

<div class="container-fluid mb-5">
	<div class="row justify-content-center">
		<div class="col-sm-6 col-md-4">
			<form action="" class="shadow-lg p-4" method="POST">
				<div class="form-group">
					<i class="fas fa-user"></i>
					<label for="email" class="font-weight-bold pl-2">Email</label>
					<input type="email" class="form-control" placeholder="Email" name="rEmail" id="email">
					<small class="form-text">We'll never share your email with anyone else.</small>
				</div>

				<div class="form-group">
					<i class="fas fa-key"></i>
					<label for="email" class="font-weight-bold pl-2" placeholder="Password">Password</label>
					<input type="password" class="form-control" name="rPassword" placeholder="Password" id="pass">
				</div>

				<button type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold" name="login">Login</button>
<?php if(isset($msg)){ echo $msg; }?>
				
			</form>
			<div class="pt-5">
       <a class="btn btn-primary" href="../index.php">Back to Home</a>
   </div>
		</div>
	</div>
</div>
</div>
<!-- Boostrap JavaScript -->
  <script src="../JS/jquery.min.js"></script>
  <script src="../JS/popper.min.js"></script>
  <script src="../JS/bootstrap.min.js"></script>
  <script src="../JS/all.min.js"></script>

</body>
</html>