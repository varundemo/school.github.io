<?php 
include('dbConnection.php');
if(isset($_REQUEST['rSignup'])){
	if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] =="") || ($_REQUEST['rPassword'] == "")){
		$regmsg =  "<div class='alert alert-warning'>Fill all fields</div>";
	}else{
		$sql = "SELECT r_email FROM requesterlogin_db WHERE r_email = '".$_REQUEST['rEmail']."'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$regmsg = "<div class='alert alert-warning'>Account Already Register</div>";
		}
	
    else{
$rName = $_REQUEST['rName'];
$rEmail = $_REQUEST['rEmail'];
$rPassword = $_REQUEST['rPassword'];
$sql = "INSERT INTO requesterlogin_db(r_name,r_email,r_password) VALUES('$rName','$rEmail','$rPassword')";
if($conn->query($sql) == TRUE){
	$regmsg = "<div class='alert alert-success'>Account created Succesfully.</div>";
	}
	else{
		$regmsg = "<div class='alert alert-danger'>Unable to create account</div>";
	}
}
}
}


?>
<div class="container" id="reg">
	<h2 class="text-center">Create an Account</h2>
<div class="row mt-4 mb-4">
	<div class="col-md-6 offset-md-3">
		<form action="" class="shadow-lg p-4" method="POST">
				<div class="form-group">
					<i class="fas fa-user"></i>
					<label for="name" class="pl-2 font-weight-bold">Name</label><input type="text" class="form-control" placeholder="Name" name="rName">
				</div>
				<div class="form-group">
					<i class="fas fa-user"></i>
					<label for="email" class="pl-2 font-weight-bold">Email</label>
					<input type="text" class="form-control" placeholder="Email" name="rEmail">
					<small class="form-text">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<i class="fas fa-key"></i>
					<label for="pass" class="pl-2 font-weight-bold">Password</label>
					<input type="text" class="form-control" placeholder="Password" name="rPassword">
				</div>
				<button type="submit" class="btn mt-5 btn-block shadow-sm font-weight-bold text-white" name="rSignup" style="background-color: #29d0c5;">Sign Up</button >
				<em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Term, Data Policy and Cookie Policy.</em><br>
				<?php if(isset($regmsg)){ echo $regmsg; } ?>
		</form>
	</div>
</div>
</div>