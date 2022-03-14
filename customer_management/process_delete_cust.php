<?php
require_once("../login/logininfo.php");

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['customer_id'])) {
	
	$customer_id = $_POST['customer_id'];

	$query = "delete from customer where customer_id = $customer_id";

	$result = $conn->query($query);
	if(!$result) die($conn->error);

	header("Location: customer_management.php");
}

?>