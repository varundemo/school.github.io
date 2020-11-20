<?php
define('TITLE','Success');
include('includes/header.php');
include('../dbConnection.php');       
define('PAGE','RequesterProfile');
session_start();
if($_SESSION['is_login']){
$rEmail = $_SESSION['rEmail'];
}else{
	// echo "<script> location.href='RequesterLogin.php'</script>";
     header("Location: RequesterLogin.php");
}

$sql = "SELECT * FROM submitrequest_tb WHERE requester_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	echo "<div class='ml-5 mt-5'>
	<table class='table'>
    <tbody>
    
    <tr>
    <th>Request ID</th>
    <td>".$row['requester_id']."</td>
    </tr>

    <tr>
    <th>Name</th>
    <td>".$row['requester_name']."</td>
    </tr>

    <tr>
    <th>Email ID</th>
    <td>".$row['requester_email']."</td>
    </tr>

    <tr>
    <th>Request Info</th>
    <td>".$row['request_info']."</td>
    </tr>

    <tr>
    <th>Request Description</th>
    <td>".$row['request_desc']."</td>
    </tr>

    <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
    </tr>

    </tbody>
    </table>
    </div>";

}

include('includes/footer.php');
?>