<?php
session_start();
define('TITLE','Edit Product');
define('PAGE','assets');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
	// echo '<script> location.href="login.php"; </script>';
   header("Location: login.php");
	
}

if(isset($_REQUEST['update'])){
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$ava = $_REQUEST['ava'];
	$tot = $_REQUEST['tot'];
	$oc = $_REQUEST['oc'];
	$sp = $_REQUEST['sp'];
	$dop = $_REQUEST['dop'];
    if(($name == "") || ($ava == "") || ($tot == "") || ($oc == "") || ($sp == "") || ($dop == "")){
    	$msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
    }
    else{
    	$sql = "UPDATE assets_tb SET pname = '$name', pdop = '$dop', pava = '$ava', ptotal = '$tot', poriginalcost = '$oc', psellingcost = '$sp' WHERE pid = '$id'";
    	if($conn->query($sql) === TRUE){
    		$msg = '<div class="alert alert-success col-sm-6 mt-2">Data Updated</div>';
    	}
    	else{
    		$msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Updated</div>';
    	}
    }
}

?>

<?php
if(isset($_REQUEST['edit'])){
$sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
}
?>
<div class="col-sm-6 jumbotron mt-5 mx-2">
	<h3 class="text-center">Edit Product</h3>
	

	<form action="" method="POST">
		<div class="form-group">
			<label>Product ID</label>
			<input type="text" class="form-control" name="id" value="<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id']; } ?>" readonly>
		</div>
		<div class="form-group">
			<label>Product Name</label>
			<input type="text" class="form-control" name="name" value="<?php if(isset($row['pname'])){ echo $row['pname']; } ?>">
		</div>
		<div class="form-group">
			<label>Date of Purchase</label>
			<input type="date" class="form-control" name="dop" value="<?php if(isset($row['pdop'])){ echo $row['pdop']; } ?>">
		</div>
		<div class="form-group">
			<label>Available</label>
			<input type="text" class="form-control" name="ava" value="<?php if(isset($row['pava'])){ echo $row['pava']; } ?>" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label>Total</label>
			<input type="text" class="form-control" name="tot" value="<?php if(isset($row['ptotal'])){ echo $row['ptotal']; } ?>" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label>Original Cost Each</label>
			<input type="text" class="form-control" name="oc" value="<?php if(isset($row['poriginalcost'])){ echo $row['poriginalcost']; } ?>" onkeypress="isInputNumber(event)">
		</div>
		<div class="form-group">
			<label>Selling Price Each</label>
			<input type="text" class="form-control" name="sp" value="<?php if(isset($row['psellingcost'])){ echo $row['psellingcost']; } ?>" onkeypress="isInputNumber(event)">
		</div>
		<div class="text-center">
			<button class="btn btn-danger" name="update">Update</button>
		<a href="assets.php" class="btn btn-secondary">Close</a>
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

<?php
include('includes/footer.php');
?>