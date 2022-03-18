<?php
require_once("../login/logininfo.php");
require_once "../home/home.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['customer_id'])) {
	
	$customer_id = $_POST['customer_id'];

	$delete_cust_orders = "delete from order_table where customer_id = $customer_id";
	
	$delete_cust_orders_result = $conn->query($delete_cust_orders);
	if(!$delete_cust_orders_result) die($conn->error);
}

if(isset($delete_cust_orders)) {

	$delete_cust = "delete from customer where customer_id = $customer_id";

	$delete_cust_result = $conn->query($delete_cust);
	if(!$delete_cust_result) die($conn->error);


}

	header("Location: customer_management.php");

?>