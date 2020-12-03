<?php
Class Father{
	private $host_name;
	private $user_name;
	private $password;
	private $db_name;
	public $conn;
   	public function __construct(){
   	$this->host_name = 'localhost';
   	$this->user_name = 'root';
   	$this->password = '';
   	$this->db_name = 'gsajaxphp';

   	$this->conn = new mysqli($this->host_name,$this->user_name,$this->password,$this->db_name);
   	if($this->conn->connect_error){
   		echo "Unable to connect";
   	}
   	else{
   		echo "Connected succesfully";
   	}
   }
}
// Class Son extends Father{
// 	// public $result;
// 	// public $obj;
// 	public function show(){
// 	// $obj = new Father;
// 	$sql = "SELECT * FROM student";
// 	$result = $this->conn->query($sql);
// 	if($result->num_rows > 1){
// 		while($row = $result->fetch_assoc()){
// 			echo  $row['name'];
// 		}
// 		 // return $new;
// 	}
// 	}
// }
// $obj = new Son;
// $obj->show();
// $obj->show();






?>