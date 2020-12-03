<?php
class Dad{
	public $conn;
	// public $result;
	// public $row;
	function __construct(){
		$this->conn = new mysqli("localhost","root","","gsajaxphp");
// 		// $conn = "Hello";
// 		// echo $conn;
	}
	function insert($name,$email,$pass){
	$sql = "INSERT INTO student (name, email, password) VALUES('$name','$email','$pass')";
	if($this->conn->query($sql)==TRUE){
		echo "Added<br><br>";
	}
	}	
	public function show(){
		$sql = "SELECT * FROM student";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$new[] = $row;
		// echo "Hello";
			}
				return $new;
		}
	}
}

// $objselec = new Dad;
// $objselec->show();
// if(isset($_POST['submit'])){
// 	$name = $_POST['name'];
// 	$email = $_POST['email'];
// 	$pass = $_POST['pass'];
// 	$obj = new Dad;

// 	$obj->insert($name,$email,$pass);	
// }
// $conn->query($sql)

?>



<?php
// // class ()
// Son extends Dad{
// // 		function insert(){
// // 			parent::__construct();
// // 			return "Great";
// // 		}
// // }
// $obj = new Dad;
// if(is_object($obj)){
// 	echo "This is object";
// }
// echo $obj->insert();

//$sql = "INSERT INTO student (name, email, password) VALUES('Raman','raman@gmail.com','raman')";
// if($obj->query($sql)){
	// echo "Field Added";
// }
// $conn = new mysqli("localhost","root","","gsajaxphp");
// var_dump($conn);
// echo "<br><b>Host Info:</b> ".$conn->host_info;
// echo "<br><b>Client Info:</b> ".$conn->client_info;
// echo "<br><b>Field Count:</b> ".$conn->field_count;
// echo "<br><b>Stat:</b> ".$conn->stat;
// echo "<br><b>SQL State:</b> ".$conn->sqlstate;
// if($conn->connect_error){
// 	echo "";
// }else{
// 	echo "connected";
// }
// $sql = "INSERT INTO student (name, email, password) VALUES('Puran','puran@gmail.com','puran')";
// if($conn->query($sql)==TRUE){
// 	echo "Field Added";
// }
?>
