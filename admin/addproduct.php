<?php
session_start();
define('TITLE','Add New Product');
define('PAGE','assets');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
	echo '<script> location.href="login.php";</script>';
}

if(isset($_REQUEST['psubmit'])){
    if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
    	$msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
    }
    else{
    	$pname = $_REQUEST['pname'];
    	$pdop = $_REQUEST['pdop'];
    	$pava = $_REQUEST['pava'];
    	$ptotal = $_REQUEST['ptotal'];
    	$poriginalcost = $_REQUEST['poriginalcost'];
    	$psellingcost = $_REQUEST['psellingcost'];
    	$sql = "INSERT INTO assets_tb (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES('$pname', '$pdop', '$pava', '$ptotal', '$poriginalcost', '$psellingcost')";
    	if($conn->query($sql) === TRUE){
    		$msg = '<div class="alert alert-success col-sm-6 mt-2">Product Added Successfully</div>';
    	}
    	else{
    		$msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Add Product</div>';
    	}
    }

}
?>

<div class="col-sm-6 mt-5 mx-2 jumbotron">
	<h3 class="text-center">Add New Product</h3>
	<form action="" method="POST">
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" class="form-control" name="pname" id="pid">
		</div>
		<div class="form-group">
			<label>Date of Purchase</label>
			<input type="date" class="form-control" name="pdop">
		</div>
		<div class="form-group">
			<label>Available</label>
            <input type="text" class="form-control" name="pava" onkeypress="isInputNubmer(event)">
		</div>
		<div class="form-group">
			<label>Total</label>
			<input type="text" class="form-control" name="ptotal" onkeypress="isInputNubmer(event)">
		</div>
		<div class="form-group">
			<label>Original Cost Each</label>
			<input type="text" class="form-control" name="poriginalcost" onkeypress="isInputNubmer(event)">
		</div>
		<div>
			<label>Selling Cost Each</label>
			<input type="text" class="form-control" name="psellingcost" onkeypress="isInputNubmer(event)">
		</div>
		<div class="text-center mt-2">
			<button class="btn btn-danger" name="psubmit">Add Product</button>
			<a href="assets.php" class="btn btn-secondary">Close</a>
		</div>
	</form>
	<?php if(isset($msg)){ echo $msg; } ?>
</div>

<script>
	function isInputNubmer(evt) {
		// body...
		var ch = String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))){
			evt.preventDefault();
		}
	}

</script>

<?php
include('includes/footer.php');
?>