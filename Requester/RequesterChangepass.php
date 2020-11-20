<!-- header page start -->
<?php 
define('TITLE','Change Passoword');
define('PAGE','changepass');
include('includes/header.php'); 
// <!-- header page end -->

session_start();
include('../dbConnection.php');       
if($_SESSION['is_login']){
$rEmail = $_SESSION['rEmail'];
}else{
	 header("Location: RequesterLogin.php");
}
if(isset($_REQUEST['passupdate'])){
	if($_REQUEST['rPassword'] == ""){
		$passmsg = "<div class='col-sm-4 offset-sm-3 alert alert-warning mt-2'>Fill All Fields</div>";
	}else{
		$pass = $_REQUEST['rPassword'];
		$sql = "UPDATE requesterlogin_db SET r_password = '$pass' WHERE r_email = '$rEmail'";
		if($conn->query($sql) == TRUE){
			$passmsg = "<div class='col-sm-6 offset-sm-3 alert alert-success mt-2'>Updated Successfully</div>";
		}else{
			$passmsg = "<div class='col-sm-6 offset-sm-3 alert alert-warning mt-2'>Unable to Update</div>";
		}
	}

}

?>
<div class="col-sm-9 col-md-10">
	<div class="row">
		<div class="col-sm-6">
			<form class="mt-5 mx-5" method="POST">
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" value="<?php echo $rEmail ?>" name="" readonly>
				</div>

				<div class="form-group">
					<label>New Password</label>
					<input type="password" class="form-control" name="rPassword">
				</div>

				<button class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
				<button class="btn btn-secondary mt-4">Reset</button>
      <?php if(isset($passmsg)){ echo $passmsg; } ?>
			</form>
			
		</div>
	</div>
</div>

<!-- footer start  -->
<?php include('includes/footer.php'); ?>
<!-- footer end -->