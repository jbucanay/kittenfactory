<?php

require_once "../home/home.php";

$conn = new mysqli($sn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_GET['customer_id'])) {
	
$customer_id = $_GET['customer_id'];


if(isset($_POST['first_name'])) {
	$first_name = $_POST['first_name'];
	if($first_name!=''){
	$query1 = "update customer set first_name = '$first_name' where customer_id = $customer_id";	
	$result = $conn->query($query1);
	if(!$result) die($conn->error);
}
}
if(isset($_POST['last_name'])) {
	$last_name = $_POST['last_name'];
	if($last_name!=''){
	$query2 = "update customer set last_name = '$last_name' where customer_id = $customer_id";	
	$result = $conn->query($query2);
	if(!$result) die($conn->error);
}
}
if(isset($_POST['address'])) {
	$address = $_POST['address'];
	if($address!=''){
		$query3 = "update customer set address = '$address' where customer_id = $customer_id";	
		$result = $conn->query($query3);							
		if(!$result) die($conn->error);
}
}
header("Location: customer_management.php");

}
$conn->close();
?>