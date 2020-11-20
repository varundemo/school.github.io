<?php
session_start();
define('PAGE','assets');
define('TITLE', 'Assets');
 include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}
else{
	// echo '<script> location.href="login.php"; </script>';
	 header("Location: login.php");
}
?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">Product/Parts Details</p>
<?php 
$sql = "SELECT * FROM assets_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
	echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
	echo '<th scope="col">Product ID</th>';
	echo '<th scope="col">Name</th>';
	echo '<th scope="col">Date of Purchase</th>';
	echo '<th scope="col">Availabe</th>';
	echo '<th scope="col">Total</th>';
	echo '<th scope="col">Orignal Cost Each</th>';
	echo '<th scope="col">Selling Price Each</th>';
	echo '<th scope="col">Action</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	while($row = $result->fetch_assoc()){
		echo '<tr>';
		echo '<th>'. $row['pid'].'</th>';
		echo '<td>'. $row['pname'].'</td>';
		echo '<td>'. $row['pdop'].'</td>';
		echo '<td>'. $row['pava'].'</td>';
		echo '<td>'. $row['ptotal'].'</td>';
		echo '<td>'. $row['poriginalcost'].'</td>';
		echo '<td>'. $row['psellingcost'].'</td>';
		echo '<td>
			<form action="editproduct.php" method="POST" class="d-inline"><input type="hidden" name="id" value='.$row["pid"].'><button class="btn btn-info" value="edit" name="edit"><i class="fas fa-pen"></i></button>
			</form>
		 	<form action="" method="POST" class="d-inline">
		 		<input type="hidden" name="id" value='.$row['pid'].'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
		 	</form>
		 	<form action="sellproduct.php" method="POST" class="d-inline">
		 	<input type="hidden" name="id" value='.$row["pid"].'>
		 	<button type="submit" class="btn btn-warning" name="issue" value="Issue"><i class="fas fa-handshake"></i></button>
		 	</form>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
}
else{
	echo '0 Result';
}
?>
</div>

<?php 
if(isset($_REQUEST['delete'])){
	$id = $_REQUEST['id'];
	$sql = "DELETE FROM assets_tb WHERE pid = '$id'";
	if($conn->query($sql) === TRUE){
		echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
	}
	else{
		echo "Unable to delete";
	}
}
 ?>

</div>
<!-- side bar end -->

<div class="float-right">
<a class="btn btn-danger box" href="addproduct.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

</div>



<!-- bootstrap javascript -->
<script src="../JS/jquery.min.js.js"></script>
<script src="../JS/popper.min.js.js"></script>
<script src="../JS/bootstrap.min.js.js"></script>
<script src="../JS/all.min.js"></script>
</body>
</html>