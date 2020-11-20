<?php
define('TITLE','Profile');
define('PAGE','RequesterProfile');
session_start();
include('../dbConnection.php');       
if($_SESSION['is_login']){
$rEmail = $_SESSION['rEmail'];
}else{
	// echo "<script> location.href='RequesterLogin.php'</script>";
	 header("Location: RequesterLogin.php");
}

$sql = "SELECT * FROM requesterlogin_db WHERE r_email = '$rEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	$rName = $row['r_name'];
}

if(isset($_REQUEST['nameupdate'])){
	if($_REQUEST['rName'] == ""){
		$passmsg = "<div class='alert alert-warning'>Fill all fields.</div>";
	}else{
		$rName = $_REQUEST['rName'];
		$sql = "UPDATE requesterlogin_db SET r_name = '$rName' WHERE r_email = '$rEmail'";
		if($conn->query($sql) == TRUE){
			$passmsg = "<div class='alert alert-success'>Updated Successfully.</div>";
		}else{
			$passmsg = "<div class='alert alert-danger'>Unable to update.</div>";
		}
	}
}
?>

<!-- header page start -->
<?php include('includes/header.php'); ?>
<!-- header page end -->

<!-- form start -->
<div class="col-sm-6 mt-5">
	<form class="mx-5" action="" method="POST">
	
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="inputEmail"  placeholder="Email" value="<?php echo $rEmail;  ?>" readonly>
	</div>

	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="rName" value="<?php echo $rName; ?>" placeholder="Name">
	</div>

	<button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
	<?php if(isset($passmsg)){ echo $passmsg; }  ?>
</form>	
</div>
<!-- form end -->

		</div>
	</div>
	<!-- container end -->

<!-- footer start  -->
<?php include('includes/footer.php'); ?>
<!-- footer end -->