<?php
session_start(); 
define('PAGE','work_report');
define('TITLE', 'Work Report');
include('includes/header.php'); 
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
   header("Location: login.php");
}
?>

<div class="text-center col-sm-9 col-md-10 mt-5">
	<form action="" method="POST">
		<div class="form-row">
		<div class="form-group offset-md-1 col-md-2 d-print-none">
		<input type="date" class="form-control" name="startdate">
		</div>
		<div class="form-group offset-md-1 col-md-2 d-print-none">
		<input type="date" class="form-control" name="enddate">
		</div>
		<div class="offset-md-1 d-print-none">
			<input type="submit" class="btn btn-secondary" name="search" value="Search">
		</div>

		</div>
	</form>


<?php
if(isset($_REQUEST['search'])){
	$startdate = $_REQUEST['startdate'];
	$enddate = $_REQUEST['enddate'];

	$sql = "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){ 
		?>
<p class="bg-dark text-white p-2 mt-4">Details</p>
<table class="table">
	<thead>
		<tr>
			<th>Req ID</th>
			<th>Request Info</th>
			<th>Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Mobile</th>
			<th>Technicia</th>
			<th>Assigned Date</th>
		</tr>
	</thead>
	<tbody>
	<?php 
while($row = $result->fetch_assoc()){
	?>
		<tr>
			<td><?php echo $row['request_id'] ?></td>
			<td><?php echo $row['request_info'] ?></td>
			<td><?php echo $row['requester_name'] ?></td>
			<td><?php echo $row['requester_add1'] ?></td>
			<td><?php echo $row['requester_city'] ?></td>
			<td><?php echo $row['requester_mobile'] ?></td>
			<td><?php echo $row['assign_tech'] ?></td>
			<td><?php echo $row['assign_date'] ?></td>
		</tr>
<?php } ?>
	</tbody>
</table>
<form>
	<input type="submit" class="d-print-none btn btn-secondary" name="print" value="Print" onclick="window.print()">
</form>
<?php	}
else{
	echo '<div class="alert alert-warning">No Record Found !</div>';
}
}
?>
</div>
<?php include('includes/footer.php'); ?>