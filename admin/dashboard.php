<?php
define('PAGE', 'dashboard');
define('TITLE', 'Dashboard');
session_start();
include('../dbConnection.php');       
if($_SESSION['is_adminlogin']){
$aEmail = $_SESSION['aEmail'];
}else{
	echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['logout'])){
 session_start();
 session_destroy();
 echo "<script> location.href='login.php';</script>";
}

$sql = "SELECT max(requester_id) FROM submitrequest_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$request = $row[0];

$sql = "SELECT max(request_id) FROM assignwork_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$work = $row[0];

$sql = "SELECT * FROM technician_tb";
$result = $conn->query($sql);
$tech = $result->num_rows;
?>
<?php include('includes/header.php'); ?>

<div class="col-sm-9 col-md-10">

	<!-- card start -->
	<div class="row mx-5 text-center">
		<div class="col-sm-4 mt-5">
			<div class="card bg-danger text-white" style="max-width: 18rem;">
				<div class="card-header">
					Requestes Received
				</div>
				<div class="card-body">
					<h4 class="card-title"><?php echo $request; ?></h4>
					<a class="btn text-white" href="request.php">View</a>
				</div>
			</div>
		</div>

		<div class="col-sm-4 mt-5">
			<div class="card bg-success text-white mb-3" style="max-width: 18rem;">
				<div class="card-header">
					Assigned Work
				</div>
				<div class="card-body">
					<h4 class="card-title">
					<?php echo $work; ?>	
					</h4>
                    <a class="btn text-white" href="work.php">View</a>
				</div>
			</div>
		</div>

         <div class="col-sm-4 mt-5">
         	<div class="card bg-info text-white">
         		<div class="card-header">
         			No. of Technician
         		</div>
         		<div class="card-body">
         			<h4 class="card-title"><?php echo $tech; ?></h4>
         			<a class="btn text-white" href="technician.php">View</a>
         		</div>
         	</div>
         </div>
     </div>
<!-- cards end -->

<!-- table start -->
<div class="text-center mx-5 mt-5">
<p class="bg-dark text-white p-2">List of Requesters</p>
<?php 
$sql = "SELECT * FROM requesterlogin_db";
$result = $conn->query($sql);
if($result->num_rows > 0){
echo '<table class="table">
<thead>
<tr>
<th>Requester ID</th>
<th>Name</th>
<th>Email</th>
</tr>
</thead>
<tbody>';
while($row = $result->fetch_assoc()){
	$rid = $row['r_login_id'];
	$rname = $row['r_name'];
	$remail = $row['r_email'];
echo "<tr>";
echo "<th>$rid</th>";
echo "<td>$rname</td>";
echo "<td>$remail</td>";
echo "</tr>";
  }
echo "</tbody>";
echo " </table>";
}
?>
</div>

</div>



<?php include('includes/footer.php'); ?>