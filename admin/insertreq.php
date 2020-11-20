<?php 
session_start();
define('TITLE','Add New Requester');
define('PAGE','requester');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}else{
   header("Location: login.php");
}

if(isset($_REQUEST['sub'])){
	if(($_REQUEST['name'] == "") || ($_REQUEST['mail'] == "") || ($_REQUEST['pass'] == "")){
		$msg = '<div class="mt-2 alert alert-danger text-center">Fill All Fields</div>';
	} else{
		$name = $_REQUEST['name'];
		$email = $_REQUEST['mail'];
		$pass = $_REQUEST['pass'];
	$sql = "INSERT INTO requesterlogin_db (r_name,r_email,r_password) VALUES('$name', '$email', '$pass')";
	if($conn->query($sql) == TRUE){
		$msg = '<div class="mt-2 alert alert-success text-center">Data Added</div>';
	}	else{
		$msg = '<div class="mt-2 alert alert-warning text-center">Unable to add</div>';
	}
	}
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3>Add New Requester</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="mail">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="pass">
		</div>

		<div>
			<button class="btn btn-danger" name="sub">Submit</button>
			<a href="requester.php" class="btn btn-secondary">Close</a>
		</div>
	</form>
	<?php if(isset($msg)){ echo $msg; } ?>
</div>

<?php
include('includes/footer.php');
 ?>