<?php
session_start();
define('PAGE','requester');
define('TITLE', 'Requester');
 include('includes/header.php');
 include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}else{
	// echo "<script> location.href='login.php'; </script>";
   header("Location: login.php");
	
}

?>

<?php
if(isset($_REQUEST['update'])){
	if(($_REQUEST['id'] == "") || ($_REQUEST['name'] == "") || ($_REQUEST['email'] == "")){
		$msg = '<div class="alert alert-warning mt-2">Fill All Fiels</div>';
	}
	else{
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
	$sql = "UPDATE requesterlogin_db SET r_name = '$name', r_email = '$email' WHERE r_login_id = '$id'";
	if($conn->query($sql) == TRUE){
		$msg = '<div class="alert alert-success mt-2">Update Fields.</div>';
	}	else{
		$msg = '<div class="alert alert-danger mt-2">Unable to Update</div>';
	}
	}
}
 ?>

<div class="col-sm-6 mt-5 jumbotron">
	<h3 class="text-center">Update Requester Details</h3>
<?php 
if(isset($_REQUEST['view'])){
	$sql = "SELECT * FROM requesterlogin_db WHERE r_login_id = {$_REQUEST['id']}";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
}
?>
<form action="" method="POST">
	<div class="form-group">
		<label>Request ID</label>
		<input type="text" class="form-control" name="id" value="<?php if(isset($row['r_login_id'])){ echo $row['r_login_id']; } ?>" readonly>
	</div>

	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="<?php if(isset($row['r_name'])){ echo $row['r_name']; } ?>">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input class="form-control" type="email" name="email" value="<?php if(isset($row['r_email'])){ echo $row['r_email']; } ?>">
	</div>

	<div class="text-center">
		<form action="" method="POST">
		<button class="btn btn-danger" name="update">Update</button>
		<a href="requester.php" class="btn btn-secondary">Close</a>
		</form>
		<?php if(isset($msg)){ echo $msg; } ?>
	</div>
</form>	
</div>



<?php include('includes/footer.php'); ?>