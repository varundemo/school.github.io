<!-- header page start  -->
<?php 
include('../dbConnection.php');
define('TITLE','Serive Status');
define('PAGE', 'CheckStatus');
session_start();
if(isset($_SESSION['is_login'])){
	$rEmail = $_SESSION['rEmail'];	
}
else{
 //header('location.href="RequesterLogin.php"');
 header("Location: RequesterLogin.php");
}
include('includes/header.php'); ?>
<!-- header page end -->

<div class="col-sm-6 mt-5 mx-3">
	<form action="" class="mt-3 form-inline d-print-none" method="POST">
		<div class="form-group mr-3">
			<label>Enter Request ID: </label>
			<input type="text" name="checkid" class="form-control" onkeypress="isInputNumber(event)" name="">
		</div>
		<button type="submit" class="btn btn-danger" name="search">Search</button>
	</form>

<?php
if(isset($_REQUEST['search'])){
	if(($_REQUEST['checkid'] == "")){
		echo  '<div class="alert alert-warning mt-2 text-center col-sm-6">Fill the Field.</div>';
	}
else{
	$sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if(($row['request_id']) != ($_REQUEST['checkid'])){
       echo  '<div class="alert alert-danger mt-2 text-center col-sm-6">Enter a valid ID.</div>';	
    }else{

?>
<h3 class="text-center mt-5">Assign Work Details</h3>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td>Request ID</td>
			<td><?php if(isset($row['request_id'])){
				echo $row['request_id'];
			} ?></td>
		</tr>

		<tr>
			<td>Request Info</td>
			<td><?php if(isset($row['request_info'])){ echo $row['request_info']; } ?></td>
		</tr>

		<tr>
			<td>Request Description</td>
			<td><?php if(isset($row['request_desc'])){
				echo $row['request_desc'];
			} ?></td>
		</tr>

		<tr>
			<td>Name</td>
			<td><?php if(isset($row['requester_name'])){ echo $row['requester_name']; } ?></td>
		</tr>

		<tr>
			<td>Address Line 1</td>
		    <td><?php if(isset($row['requester_add1'])){ echo $row['requester_add1']; } ?></td>
		</tr>

		<tr>
			<td>Address Line 2</td>
			<td><?php if(isset($row['requester_add2'])){ echo $row['requester_add2']; } ?></td>
		</tr>

		<tr>
			<td>City</td>
			<td><?php if(isset($row['requester_city'])){ echo $row['requester_city']; } ?></td>
		</tr>

		<tr>
			<td>State</td>
			<td><?php if(isset($row['requester_state'])){ echo $row['requester_state']; } ?></td>
		</tr>

		<tr>
			<td>Pin Code</td>
			<td><?php if(isset($row['requester_zip'])){ echo $row['requester_zip']; } ?></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><?php if(isset($row['requester_email'])){ echo $row['requester_email']; } ?></td>
		</tr>

		<tr>
			<td>Mobile</td>
			<td><?php if(isset($row['requester_mobile'])){ echo $row['requester_mobile']; } ?></td>
		</tr>
        
        <tr>
			<td>Assign Date</td>
			<td><?php if(isset($row['assign_date'])){ echo $row['assign_date']; } ?></td>
		</tr>
		
		<tr>
			<td>Technician Name</td>
			<td><?php if(isset($row['assign_tech'])){ echo $row['assign_tech']; } ?></td>
		</tr>

		<tr>
			<td>Customer Sign</td>
			<td></td>
		</tr>	

		<tr>
			<td>Technician Sign</td>
			<td></td>
		</tr>
	</tbody>
</table>

<!-- print button start -->
<div>
	<form class="d-print-none">
		<input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
	</form>
</div>
<!-- print button end -->

<?php }}} ?>
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

<!-- footer start  -->
<?php include('includes/footer.php'); ?>
<!-- footer end