<?php 
session_start();
define('TITLE','Technician');
define('PAGE','technician');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}else{
	// echo '<script> location.href="login.php"; </script>';
   header("Location: login.php");
	
}

if(isset($_REQUEST['empUpdate'])){
	if(($_REQUEST['empID'] == "") ||($_REQUEST['empName'] == "") ||($_REQUEST['empCity'] == "") ||($_REQUEST['empMobile'] == "") ||($_REQUEST['empEmail'] == "")){
		$msg = '<div class="col-sm-6 alert alert-warning">Fill All Fields</div>';
	}
	else{
		$id = $_REQUEST['empID'];
		$name = $_REQUEST['empName'];
		$city = $_REQUEST['empCity'];
		$mobile = $_REQUEST['empMobile'];
		$email = $_REQUEST['empEmail'];
		$sql = "UPDATE technician_tb SET empName = '$name', empCity = '$city', empMobile = '$mobile', empEmail = '$email' WHERE empID = '$id'";
		if($conn->query($sql) === TRUE){
			$msg = '<div class="col-sm-6 alert alert-success mt-2">Updated Successfully</div>';
		}
		else{
			$msg = '<div class="col-sm-6 alert alert-danger mt-2">Unable to Update</div>';
		}
	}
}


?>

<div class="col-sm-6 jumbotron mt-5 mx-3">
	<h3>Update Technician Details</h3>
	<?php	if(isset($_REQUEST['view'])){
 $sql = "SELECT * FROM technician_tb WHERE empid = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
} ?>
	<form action="" method="POST">
		<div class="form-group">
		 <label>Emp ID</label>
		 <input type="text" name="empID" class="form-control"  value="<?php if(isset($row['empid'])){ echo $row['empid']; } ?>">
		</div>
		<div>
			<label>Name</label>
			<input type="text" name="empName" class="form-control" value="<?php if(isset($row['empName'])){ echo $row['empName']; } ?>">
		</div>
		<div>
			<label>City</label>
			<input type="text" name="empCity" class="form-control" value="<?php if(isset($row['empCity'])){ echo $row['empCity']; } ?>">
		</div>
		<div class="form-group">
			<label>Moblie</label>
			<input type="text" name="empMobile" class="form-control" value="<?php if(isset($row['empMobile'])){ echo $row['empMobile']; } ?>" onkeypress="isInputNumber(event)">
		</div>
		<div>
			<label>Email</label>
			<input type="email" name="empEmail" class="form-control" value="<?php if(isset($row['empEmail'])){ echo $row['empEmail']; } ?>">
		</div>
		<div class="text-center mt-2">
			<button type="submit" class="btn btn-danger" name="empUpdate">Update</button>
			<a href="technician.php" class="btn btn-secondary">Close</a>
		</div>
		<?php if(isset($msg)){ echo $msg; } ?>
	</form>
</div>

<script>
	function isInputNumber(evt) {
		// body...
		var ch = String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))){
			evt.preventDefault();
		}
	}
</script>



<?php 
include('includes/footer.php'); ?>
