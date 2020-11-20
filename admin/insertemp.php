<?php 
session_start();
define('TITLE','Add New Technician');
define('PAGE','technician');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
   header("Location: login.php");
	
}

if(isset($_REQUEST['empSubmit'])){
	if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
		$msg = '<div class="alert alert-warning col-sm-6 text-center offset-sm-3 mt-2">Fill all Fields</div>';
	}
	else{
		$eName = $_REQUEST['empName'];
		$eCity = $_REQUEST['empCity'];
		$eMobile = $_REQUEST['empMobile'];
		$eEmail = $_REQUEST['empEmail'];
	 $sql = "INSERT INTO technician_tb(empName, empCity, empMobile, empEmail) VALUES ('$eName', '$eCity', '$eMobile', '$eEmail')";
	    if($conn->query($sql) === TRUE){
	     $msg = '<div class="alert alert-success col-sm-6 offset-sm-3 text-center mt-2">Added Successfully</div>';
	    }
	    else{
	     $msg = '<div class="alert alert-danger col-sm-6 offset-sm-3 text-center mt-2">Unable to Add</div>';	
	    } 
	}
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Technician</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="empName">Name</label>
			<input type="text" class="form-control" name="empName" id="empName">
		</div>
		<div class="form-group">
			<label for="empCity">City</label>
			<input type="text" class="form-control" name="empCity" id="empCity">
		</div>
		<div class="form-group">
			<label for="empMobile">Mobile</label>
			<input type="text" class="form-control" name="empMobile" id="empMobile" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label for="empEmail">Email</label>
			<input type="email" class="form-control" name="empEmail" id="empEmail">
		</div>
		<div class="text-center">
			<button class="btn btn-danger" name="empSubmit" id="empSubmit">Submit</button>
			<a href="technician.php" class="btn btn-secondary">Close</a>
		</div>
	</form>
	<?php if(isset($msg)){ echo $msg; } ?>
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

<?php include('includes/footer.php'); ?>