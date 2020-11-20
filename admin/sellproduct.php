<?php 
session_start();
define('TITLE','Sell Product');
define('PAGE','assets');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
   header("Location: login.php");
}

if(isset($_REQUEST['psubmit'])){
	$pid = $_REQUEST['pid'];
	$pava = ($_REQUEST['pava'] - $_REQUEST['pquant']);

	$cname = $_REQUEST['cname']; 
	$cadd = $_REQUEST['caddress']; 
	$pname = $_REQUEST['pname']; 
	$pquant = $_REQUEST['pquant']; 
	$cpeach = $_REQUEST['psellingcost']; 
	$cptotal = $_REQUEST['totalcost']; 
	$cpdate = $_REQUEST['selldate']; 
	if(($cname == "") || ($cadd == "") || ($pname == "") || ($pquant == "") || ($cpeach == "") || ($cptotal == "") || ($cpdate == "")){
		$msg = '<div class="col-sm-6 alert alert-warning mt-2"> Fill All Fields</div>';
	}
	else{

		$sqlin = "INSERT INTO customer_tb (custname, custadd, cpname, cpquant, cpeach, cptotal, cdate) VALUES('$cname', '$cadd', '$pname', '$pquant', '$cpeach', '$cptotal', '$cpdate')";
		if($conn->query($sqlin) == TRUE){
			$genid = mysqli_insert_id($conn);
			session_start();
			$_SESSION['myid'] = $genid;
			echo "<script> location.href='productsellsuccess.php'; </script>";
		}

		$sql = "UPDATE assets_tb SET pava = '$pava' WHERE pid = '$pid'";
		$conn->query($sql);
	}
}
?>

<div class="jumbotron mt-5 col-sm-6 mx-3">
<h3 class="text-center">Customer Bill</h3>
<?php
if(isset($_REQUEST['issue'])){
$sql = "SELECT * FROM assets_tb WHERE pid={$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
}
?>
<form action="" method="POST">
	<div class="form-group">
		<label>Product ID</label>
		<input type="text" class="form-control" name="pid" value="<?php if(isset($row['pid'])){ echo $row['pid']; } ?>" readonly>
	</div> 
	<div class="form-group">
		<label>Customer Name</label>
		<input type="text" class="form-control" name="cname">
	</div>
	<div class="form-group">
		<label>Customer Adress</label>
		<input type="text" class="form-control" name="caddress">
	</div>
	<div class="form-group">
		<label>Product Name</label>
		<input type="text" class="form-control" name="pname" value="<?php if(isset($row['pname'])){ echo $row['pname']; } ?>" readonly>
	</div>
	<div class="form-group">
		<label>Available</label>
		<input type="text" class="form-control" name="pava" value="<?php if(isset($row['pava'])){ echo $row['pava']; } ?>" readonly>
	</div>
	<div class="form-group">
		<label>Quantity</label>
		<input type="text" class="form-control" name="pquant" onkeypress="isInputNumber(event)">
	</div>
	<div class="form-group">
		<label>Price Each</label>
		<input type="text" class="form-control" name="psellingcost" value="<?php if(isset($row['psellingcost'])){ echo $row['psellingcost']; } ?>" onkeypress="isInputNumber(evnet)">
	</div>
	<div class="form-group">
		<label>Total Price</label>
		<input type="text" class="form-control" name="totalcost" onkeypress="isInputNumber(event)">
	</div>
	<div class="form-group">
		<label>Date</label>
		<input type="date" class="form-control" name="selldate">
	</div>
	<div class="text-center">
		<button class="btn btn-danger" name="psubmit">Submit</button>
		<a href="assets.php" class="btn btn-secondary">Close</a>
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
include('includes/footer.php');
?>