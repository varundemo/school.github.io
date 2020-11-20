<?php // Inser query start
if(session_id() == ''){
session_start();
}
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
}else{
  // echo "<script> location.href='login.php';</script>";
   header("Location: login.php");
}

if(isset($_REQUEST['view'])){
$rid = $_REQUEST['id'];
$sql = "SELECT * FROM submitrequest_tb WHERE requester_id = {$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// $rinfo = $_REQUEST['request_info'];
}


if(isset($_REQUEST['assign'])){
	if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields.</div>';
	}else{   
	 $rid = $_REQUEST['request_id'];
    $rinfo = $_REQUEST['request_info'];
    $rdesc = $_REQUEST['requestdesc'];
    $rname = $_REQUEST['requestername'];
    $radd1 = $_REQUEST['address1'];
    $radd2 = $_REQUEST['address2'];
    $rcity = $_REQUEST['requestercity'];
    $rstate = $_REQUEST['requesterstate'];
    $rzip = $_REQUEST['requesterzip'];
    $remail = $_REQUEST['requesteremail'];
    $rmobile = $_REQUEST['requestermobile'];
    $rassigntech = $_REQUEST['assigntech'];
    $rdate = $_REQUEST['inputdate'];
	$sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date) VALUES ('$rid', '$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate')";
	 if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Assigned Successfully </div>';
		}else{
			$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to assign work.</div>';
		}
	}
}
?>
  <!-- form start  -->
<div class="col-sm-5 jumbotron">
 <!-- main content start -->
<form action="" method="POST">	
<h5 class='text-center'>Assign Work Request</h5>

<div class="form-group">
      <label for="request_id">Request ID</label>
 	 <input type="text" id="request_id" class="form-control" name="request_id" value="<?php if(isset($row['requester_id'])){
	echo $row['requester_id']; } ?>" readonly>
 </div>
             
<div class="form-group">
     <label for="request_info">Request Info</label>
     <input type="text" id="request_info" class="form-control" name="request_info" value="<?php if(isset($row['request_info'])){
	echo $row['request_info']; } ?>">
</div>

<div>
	<label for="requestdesc">Description</label>
	<input type="text" id="requestdesc" class="form-control" name="requestdesc" value="<?php if(isset($row['request_desc'])){
	echo $row['request_desc']; } ?>">
</div>

<div class="form-group">
      <label>Name</label>
       <input type="text" class="form-control" name="requestername" value="<?php if(isset($row['requester_name'])){
	echo $row['requester_name']; } ?>">
</div>		     

<div class="form-row">
   <div class="col-md-6">
     <label>Address Line 1</label>
     <input type="text" class="form-control" name="address1" value="<?php if(isset($row['requester_add1'])){
	echo $row['requester_add1']; } ?>"> 
   </div>

   <div class="col-md-6">
     <label>Address Line 2</label>
     <input type="text" class="form-control" name="address2" value="<?php if(isset($row['requester_add2'])){
	echo $row['requester_add2']; } ?>">
   </div>
</div>

<div class="form-row">
 	<div class="form-group col-md-4">
       <label>City</label>
       <input type="text" class="form-control" name="requestercity" value="<?php if(isset($row['requester_city'])){
	echo $row['requester_city']; } ?>">
    </div>

    <div class="form-group col-md-4">
        <label>State</label>
        <input type="text" class="form-control" name="requesterstate" value="<?php if(isset($row['requester_state'])){
	echo $row['requester_state']; } ?>">
 	</div>

 	<div class="form-group col-md-4">
        <label>Zip</label>
        <input type="text" class="form-control" name="requesterzip" value="<?php if(isset($row['requester_zip'])){
	echo $row['requester_zip']; } ?>" onkeypress="isInputNumber(event);"> 
 	</div>
 </div>

<div class="form-row">
    <div class="form-group col-md-8">
        <label>Email</label>
        <input type="email" class="form-control" name="requesteremail" value="<?php if(isset($row['requester_email'])){
	echo $row['requester_email']; } ?>">
    </div>

    <div class="col-md-4 form-group">
       <label>Moblie</label>
       <input type="text" class="form-control" name="requestermobile" value="<?php if(isset($row['requester_mobile'])){
	echo $row['requester_mobile']; } ?>" onkeypress="isInputNumber(event);">
    </div> 		
</div>

<div class="form-row">
      <div class="form-group col-md-6">
      <label>Assign to Technician</label>
      <input type="text" name="assigntech" class="form-control" >
</div>

<div class="form-group col-md-6">
      <label>Date</label>
      <input type="date" name="inputdate" class="form-control">
</div>
</div> 		

<div class="float-right">
 		<button type="submit" class="btn btn-success" name="assign">Assign</button>

 		<button type="reset" class="btn btn-secondary">Reset</button>
</div>
</form>	
 	<?php if(isset($msg)){ echo $msg; } ?>
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