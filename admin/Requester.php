<?php
session_start();
define('PAGE','requester');
define('TITLE', 'Requester');
 include('includes/header.php');
 include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
}else{
   header("Location: login.php");
}
  ?>
<!-- table start -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">List of Requester</p>
	<?php
$sql = "SELECT * FROM requesterlogin_db";
$result = $conn->query($sql);
if($result->num_rows >0){
	echo '<table class="table">
          <thead>
          <tr>
          <th scope="col">Requester ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
          <tr>
          </thead>
          <tbody>';
while($row = $result->fetch_assoc()){
    echo  '<tr>';
    echo   '<th scope="row">'.$row["r_login_id"].'</th>';
    echo '<td>'.$row['r_name'].'</td>';
    echo '<td>'.$row['r_email'].'</td>';
    echo '<td><form action="editreq.php" method="POST" class="d-inline"><input type="hidden" name="id" value='.$row["r_login_id"].' ></input><button type="submit" class="btn btn-info" name="view"><i class="fas fa-pen"></i></button></form>
      <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["r_login_id"]. '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>';
    echo   '</tr>';
    echo   '</tbody>';

}
	echo   '<table>';
} else{
  echo "0 Result";
}

if(isset($_REQUEST['delete'])){
 $sql = "DELETE FROM requesterlogin_db WHERE r_login_id = {$_REQUEST['id']}";
 if($conn->query($sql) === TRUE){
  echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
 } else{
  echo "Unable to Delete Data";
 }
}
	 ?>
</div>
<!-- table end -->

<div class="float-right">
<a class="btn btn-danger box" href="insertreq.php"><i class="fas fa-plus fa-2x"></i></a>  
</div>

<?php include('includes/footer.php'); ?>
