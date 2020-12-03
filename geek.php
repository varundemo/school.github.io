<?php
include('construct.php');
$obj = new Dad;
//$val[];
$val = $obj->show();
//print_r($val);
foreach($val as $value){
	echo $value['name'];
}

?>


<form action="" method="POST">
	<label for="name">Name</label><br>
	<input type="text" name="name"><br>
	<label for="name">Email</label><br>
	<input type="email" name="email"><br>
	<label for="pass">Password</label><br>
	<input type="password" name="pass"><br>
	<button type="submit" name="submit">Submit</button>
</form>