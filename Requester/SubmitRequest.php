<!-- header page start --> 
<?php 
define('TITLE','Submit Request');
define('PAGE', 'SubmitRequest');
// to check login status start
include('../dbConnection.php');       
session_start();
if($_SESSION['is_login']){
$rEmail = $_SESSION['rEmail'];
}else{
	// echo "<script> location.href='RequesterLogin.php'</script>";
	 header("Location: RequesterLogin.php");
}
// to check login status end


if(isset($_REQUEST['submitrequest'])){
	// checking for empty field
if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc']=="") || ($_REQUEST['requestername']=="") || ($_REQUEST['requesteradd1']=="") || ($_REQUEST['requesteradd2']=="") || ($_REQUEST['requestercity']=="") || ($_REQUEST['requesterstate']=="") || ($_REQUEST['requesterzip']=="") || ($_REQUEST['requesteremail']=="") || ($_REQUEST['requestermobile']=="") || ($_REQUEST['requestdate']=="")){
	$msg = "<div class='alert alert-warning  offset-md-4 col-md-4 my-2'>Fill all fields</div>";
}
else{
	$rinfo = $_REQUEST['requestinfo'];
	$rdesc = $_REQUEST['requestdesc'];
	$rname = $_REQUEST['requestername'];
	$radd1 = $_REQUEST['requesteradd1'];
	$radd2 = $_REQUEST['requesteradd2'];
	$rcity = $_REQUEST['requestercity'];
	$rstate = $_REQUEST['requesterstate'];
	$rzip = $_REQUEST['requesterzip'];
	$remail = $_REQUEST['requesteremail'];
	$rmobile = $_REQUEST['requestermobile'];
	$rdate = $_REQUEST['requestdate'];
	 $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate')";

	if($conn->query($sql)== TRUE){
		$genid = mysqli_insert_id($conn);
		$msg = "<div class='alert alert-success  offset-md-4 col-md-4 my-2'>Request Submitted</div>";
		session_start();
		$_SESSION['myid'] = $genid;
		echo "<script>location.href='submitrequestsuccess.php'</script>";
	}else{
		$msg = "<div class='alert alert-danger  offset-md-4 col-md-4 my-2'>Unable to Submit Request.</div>";

	}
}
}


include('includes/header.php'); 
?><!-- header page end -->

<!--Requester form start-->
<div class="col-sm-9 col-md-10 mt-5">
	<form class="mx-5" action="" method="POST">

		<div class="form-group">
		<label>Request Information</label>
		<input type="text" class="form-control" name="requestinfo" placeholder="Request Information">
	    </div>

	    <div class="form-group">
		<label>Description</label>
		<input type="text" class="form-control" name="requestdesc" placeholder="Description">
	    </div>

	    <div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="requestername" placeholder="Name">
	    </div>

    <!-- address row started -->
	   <div class="form-row">
	   <div class="form-group col-md-6">
	   	<label for="inputAddress">Address Line 1</label>
	   	<input type="text"  class="form-control" name="requesteradd1">
	   </div>	

	   <div class="form-group col-md-6">
	   	<label>Address Line 2</label>
	   	<input type="text" class="form-control" name="requesteradd2" >
	   </div>
	   </div>
 <!-- address row end -->

<!-- adress line 2 start-->
<div class="form-row">
 <div class="form-group col-md-6">
 	<label>City</label>
 	<input type="text" class="form-control" name="requestercity">
 </div>

 <div class="form-group col-md-4">
 	<label>State</label>
 	<input type="text" class="form-control" name="requesterstate">
 </div>

 <div class="form-group col-md-2">
 	<label>Zip</label>
 	<input type="text" class="form-control" name="requesterzip" onkeypress="isInputNumber(event)">
 </div>
</div>
<!-- address line 3 end -->

<div class="form-row">
	<div class="form-group col-md-6">
		<label>Email</label>
		<input type="text" class="form-control" name="requesteremail">
	</div>
	<div class="form-group col-md-2">
		<label>Moblie</label>
		<input type="text" class="form-control" name="requestermobile"  onkeypress="isInputNumber(event)">
	</div>
	<div class="form-group col-md-2">
		<label>Date</label>
		<input type="date" class="form-control" name="requestdate">
	</div>
</div>

<button type="Submit" class="btn btn-danger" name="submitrequest">Submit</button>
<button type="reset" class="btn btn-secondary">Reset</button>
	</form>
	<?php if(isset($msg)){  echo $msg; } ?>
</div>
<!-- Requester form end -->
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