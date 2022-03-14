<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Customer Management </title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
</html>

<?php
require_once("../login/logininfo.php");

if(isset($_GET['customer_id'])){

$customer_id = $_GET['customer_id'];	

$query = "select first_name, last_name, address from customer where customer_id = $customer_id";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows;
for($j=0; $j<$rows; ++$j){
	
$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	
	<pre>
	<h4>
		Customer Information (Current): 
	</h4>
	First Name: $row[first_name]
	Last Name: $row[last_name]
	Address: $row[address]
	
	<h4>
		Desired Information:
	</h4>
	<form method='post' action='process_update_cust.php?customer_id=$customer_id'>
		<input type='text' name='first_name' placeholder='Desired First Name'>
		<input type='text' name='last_name' placeholder='Desired Last Name'>
		<input type='text' name='address' placeholder='Desired Address'>
		<input type='submit' value='Update Customer'>
	</form>
	<h4>
		Delete Customer:
	</h4>
	<form method='post' name='delete' action='process_delete_cust.php?=$customer_id'>
		<button>Delete Customer</button>
		<input type='hidden' name='customer_id' value=$customer_id>
	</form>
	</pre>
	
_END;

}

$conn->close();
}
?>