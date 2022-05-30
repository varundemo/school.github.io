<?php
   
   //This form work with Live server
   if(isset($_REQUEST['submit'])){

		if(($_REQUEST['name'] ==   "") || ($_REQUEST['email'] ==   "") || ($_REQUEST['message'] ==   "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill All Fields</div>';
		}
		else{
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$message = $_REQUEST['message'];

			$mailTo = "";                // write the mail whose you want to send it
			$header = "From: ". $email;
			$txt = "You have received an email from ". $name ."\n\n".$message;
			$subject = "";  // write subject of the mail

			mail($mailTo, $subject, $txt, $header);
			$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Sent Successfully</div>';

		}
   }


   ?>




<div class="col-md-8"> 
			<form action="" method="post">
				<input type="text" class="form-control" name="name" placeholder="Name"><br>
				<input type="email" class="form-control" name="email" placeholder="E-mail"><br>
				<textarea class="form-control" name="message" placeholder="How can we help you?" style="height: 150px;"></textarea><br>
				<input type="submit" name="submit">

				<?php if(isset($msg)){ echo $msg; } ?>
			</form>
			</div>

