<?php
include('dbConstruct.php');
Class Twin extends Father{
	function insert($name,$email,$pass){
		$sql = "INSERT INTO student (name, email, password) VALUES ('$name','$email','$pass')";
		if($this->conn->query($sql) == TRUE){
			echo "Data Inserted";
		}
		else{
			echo "Unable to insert";
		}
	}
}







?>

<form action="" method="POST">
	<label for="">Name</label>
	<input type="text" name="name">
	<label for="">Email</label>
	<input type="email" name="email">
	<label for="">Password</label>
	<input type="password" name="pass">
	<br><br><input type="submit" name="sub">
<?php
  if(isset($_POST['sub'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$objtwo = new Twin;
	$objtwo->insert($name,$email,$pass);
}
?>
</form>