<?php 
session_start();
define('PAGE','work');
define('TITLE', 'Work');
include('includes/header.php'); 
include('../dbConnection.php');
if($_SESSION['is_adminlogin']){
	$aEmail = $_SESSION['aEmail'];
} else{
   header("Location: login.php");
}
?>

<div class="col-sm-9 col-md-10 mt-5">
	<?php 
$sql = "SELECT * FROM assignwork_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
	echo '<table class="table">
	<thead>
	  <tr>
	  	<th scope="col">Req ID</th>
	  	<th scope="col">Request Info</th>
	  	<th scope="col">Name</th>
	  	<th scope="col">Address</th>
	  	<th scope="col">City</th>
	  	<th scope="col">Mobile</th>
	  	<th scope="col">Technician</th>
	  	<th scope="col">Assigned Date</th>
	  	<th scope="col">Action</th>
	  </tr>
	</thead>';
echo '<tbody>';
while($row = $result->fetch_assoc()){
	echo '<tr>
		<th scope="row">'.$row['request_id'].'</th>
		<td>'.$row['request_info'].'</td>
		<td>'.$row['requester_name'].'</td>
		<td>'.$row['requester_add1'].' '.$row['requester_add2'].'</td>
		<td>'.$row['requester_city'].'</td>
		<td>'.$row['requester_mobile'].'</td>
		<td>'.$row['assign_tech'].'</td>
		<td>'.$row['assign_date'].'</td>
		<td><form class="d-inline" action="viewassignwork.php" method="POST"><input type="hidden" name="id" value='. $row["request_id"]. '></input><button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button></form>
			<form action="" class="d-inline" method="POST">
			<input type="hidden" name="id" value='.$row["request_id"].'>
            <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
            </form>
			</form>
		</td>
		</tr>';
}
echo '</tbody>';
echo  '</table>';
}

if(isset($_REQUEST['id'])){
	$sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
	if($conn->query($sql) == TRUE){
		$msg = '<meta http-equiv="refresh" content="0;URL=?deleted" />';

	}else{
		$msg = '<div class="alert alert-warning">Unable to Delele</div>';
	}
}
if(isset($msg)){ echo $msg;
}
	?>

</div>

<?php include('includes/footer.php'); ?>