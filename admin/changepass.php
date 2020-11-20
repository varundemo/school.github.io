<?php
session_start(); 
define('PAGE','change_pass');
define('TITLE', 'Change Password');
include('includes/header.php');
include('../dbConnection.php');
if($_SESSION['is_adminlogin']){
$aEmail = $_SESSION['aEmail'];
}else{
	// echo "<script> location.href='login.php'</script>";
   header("Location: login.php");
	
}

if(isset($_REQUEST['submit'])){
	if($_REQUEST['pass'] == ""){
		$msg = '<div class="col-sm-9 alert alert-warning">Fill All Fields</div>';
	}
	else{
		$pass = $_REQUEST['pass'];
		$sql = "UPDATE admin_login_tb SET a_password = '$pass' WHERE a_email = '$aEmail'";
		if($conn->query($sql) == TRUE){
			$msg = '<div class="col-sm-9 alert alert-success">Password Changed</div>';
		}
		else{
			$msg = '<div class="col-sm-9 alert alert-danger">Unable to Change Password</div>';
		}
	}
}

 ?>

 <div class="col-sm-9 col-md-10">
 	<div class="row">
 		<div class="col-sm-6">
 			<form action="" method="POST" class="mt-5 mx-5">
 				<div class="form-group">
 				<label>Email</label>
 				<input type="email" class="form-control" name="email" value="<?php if(isset($aEmail)){ echo $aEmail; } ?>" readonly>
 				</div>
 				<div class="form-group">
 				<label>New Password</label>
 				<input type="Password" name="pass" class="form-control">	
 				</div>
 				<div class="form-group">
 					<button class="btn btn-danger" name="submit">Submit</button>
 				</div>
<?php if(isset($msg)){ echo $msg; } ?>
 			</form>
 		</div>
 	</div>
 </div>

<?php include('includes/footer.php'); ?>