<?php
session_start();
include('../dbConnection.php');
define('PAGE','requests');
define('TITLE', 'Requests');
 include('includes/header.php');
if($_SESSION['is_adminlogin']){
$aEmail = $_SESSION['aEmail'];
}else{
   header("Location: login.php");
}
  ?>
<div class="col-sm-4 mb-5">	
<?php 
$sql = "SELECT requester_id, request_info,request_desc, request_date FROM submitrequest_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
echo '<div class="card mt-5 mx-5">';
echo '<div class="card-header">';
echo 'Request ID: '.$row['requester_id'];
echo '</div>';
echo '<div class="card-body">';
echo '<h5 class="card-title">Request Info:' .$row['request_info'].'</h5>';
echo "<p class='card-text'>".$row['request_desc']."</p>";
echo "<p class='card-text'>Request Date:" . $row['request_date'] ."</p>";
echo "<div class='float-right'>";
 echo '<form action="" method="POST"> <input type="hidden" name="id" value='. $row["requester_id"] .'><input type="submit" class="btn btn-danger mr-3" name="view" value="View"><input type="submit" class="btn btn-secondary" name="close" value="Close"></form>';
// if(isset($msg)){ echo  $msg; }
echo '</div>';
echo '</div>';
echo '</div>';
	}
} else{
	echo "No Request";
}
?>
</div>

<?php 


// delete query start
if(isset($_REQUEST['close'])){
	$sql = "DELETE FROM submitrequest_tb WHERE requester_id = {$_REQUEST['id']}";
	if($conn->query($sql) === TRUE){
	 echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
	}else{
		$msg = "Unable to delete";
	}
}
// delete query end



include('assignworkform.php');
include('includes/footer.php'); 
?>