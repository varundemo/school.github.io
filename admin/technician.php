<?php 
session_start();
define('PAGE','technician');
define('TITLE', 'Technician');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}else{
   header("Location: login.php");
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">List of Technician</p>
<?php
$sql = "SELECT * FROM technician_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
	echo '<table class="table">
	<thead>
	<tr>
	<th scope="col">Emp ID</th>
	<th scope="col">Name</th>
	<th scope="col">City</th>
	<th scope="col">Mobile</th>
	<th scope="col">Email</th>
	<th scope="col">Action</th>
	</tr>
	</thead>
	<tbody>';
    while($row = $result->fetch_assoc()){
	 echo '<tr>';
	 echo '<th>'. $row["empid"] .'</th>';
	 echo '<td>'. $row["empName"] .'</td>';
	 echo '<td>'. $row["empCity"] .'</td>';
	 echo '<td>'. $row["empMobile"] .'</td>';
	 echo '<td>'. $row["empEmail"] .'</td>';
	 echo '<td>
		<form action="editemp.php" method="POST" class="d-inline">
		<input type="hidden" name="id" value='. $row["empid"].'>
		<button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button>
		</form>
		<form action="" method="POST" class="d-inline">
		<input type="hidden" name="id" value='. $row["empid"].'>
		<button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
		</form>
		</td>';
	 echo '</tr>';
    }
 echo '</tbody>';	
 echo '</table>';	
}
else{
	echo "0 Result";
}

if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
  	 echo '<meta http-equiv="refresh" content="0;URL=?deleted" />'; 
    }
    else{
    	echo 'Unable to delete';
    }

}
?>	
</div>
</div>

<div class="float-right">
	<a href="insertemp.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>

</div>

<input type="text" onkeypress="isInputNumber(event)">
<script>
	function isInputNumber(evt) {
		// body...
		// var ch = String.fromCharCode(evt.which)
		document.write("Hello");
	// }
</script>

<?php include('includes/footer.php'); ?>