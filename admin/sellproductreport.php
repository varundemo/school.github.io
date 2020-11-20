<?php
session_start();
define('PAGE','sell_report');
define('TITLE', 'Sell Report');
 include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
   header("Location: login.php");
}
?>

<div class="col-sm-9 col-md-10  mt-5 text-center">
	<form action="" method="POST" class="d-print-none">
		<div class="form-row">
		<div class="form-group col-md-2">
		<input type="date" class="form-control" name="startdate">
		</div>
		<span>to</span>
		<div class="form-group col-md-2">
		<input type="date" class="form-control" name="enddate">
		</div>
		<div>
			<input type="submit" class="btn btn-secondary" name="search" value="Search">
		</div>
	</form>
</div>

<?php 
if(isset($_REQUEST['search'])){
	$startdate = $_REQUEST['startdate'];
	$enddate = $_REQUEST['enddate'];

	$sql = "SELECT * FROM customer_tb WHERE cdate BETWEEN '$startdate' AND '$enddate'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){


 echo '<p class="bg-dark text-white p-2 mt-5">Details</p>
<table class="table">
	<thead>
		<tr>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price Each</th>
			<th>Total</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>';

while($row = $result->fetch_assoc()){ 
	
	echo '<tr>';  
    echo '<th>'.  $row['custid'].'</th>';
    echo '<td>'.  $row['custname'] .'</td>';
    echo '<td>'.  $row['custadd'] .'</td>';
    echo '<td>'.  $row['cpname'] .'</td>';
    echo '<td>'.  $row['cpquant'] .'</td>';
    echo '<td>'.  $row['cpeach'] .'</td>';
    echo '<td>'.  $row['cptotal'] .'</td>';
    echo '<td>'.  $row['cdate'] .'</td>';
    echo '</tr>';
    }

  
echo  '</tbody>
</table>';
echo '<td>
  <form class="d-print-none">
    <input type="submit" class="btn btn-danger" name="print" onClick="window.print()">
  </form>
</td>';

}
else{
    echo "<div class='alert alert-warning col-sm-6 mt-2 ml-5'>No Record Found !</div>";
}
}






		?>


<?php include('includes/footer.php'); ?>