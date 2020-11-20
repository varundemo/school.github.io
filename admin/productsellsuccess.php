<?php
session_start();
define('TITLE','assets');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
   header("Location: login.php");
	
}

$myid = $_SESSION['myid'];
$sql = "SELECT * FROM customer_tb WHERE custid = '$myid'";
$result = $conn->query($sql);
if($result->num_rows == 1){
	$row = $result->fetch_assoc();
}
?>

<div class="ml-5 mt-5">
	<h3 class="text-center">Customer Bill</h3>
	<table class="table">
		<tr>
			<th>Customer ID</th>
			<td><?php echo $row['custid'] ?></td>
		</tr>
		<tr>
			<th>Customer Name</th>
			<td><?php echo $row['custname'] ?></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><?php echo $row['custadd'] ?></td>
		</tr>
		<tr>
			<th>Product</th>
			<td><?php echo $row['cpname'] ?></td>
		</tr>
		<tr>
			<th>Quantity</th>
			<td><?php echo $row['cpquant'] ?></td>
		</tr>
		<tr>
			<th>Price Each</th>
			<td><?php echo $row['cpeach'] ?></td>
		</tr>
		<tr>
			<th>Total Cost</th>
			<td><?php echo $row['cptotal'] ?></td>
		</tr>
		<tr>
			<th>Date</th>
			<td><?php echo $row['cdate'] ?></td>
		</tr>
		<tr>
			<td>
				<form class="d-print-none" action="" method="POST">
					<input type="submit" class="btn btn-danger" value="Print" onclick="window.print()" name="">
				</form>
			</td>
			<td>
				<a href="assets.php" class="btn btn-secondary d-print-none">Close</a>
			</td>
		</tr>
	</table>
</div>

<?php
include('includes/footer.php');
?>