<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
      <?php
      include 'login.css'
     
      ?>

    </style>
<?php 
session_start();

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	
	echo "Welcome back $username <br>";
}else{
	echo "Please login.<br>";
}
include_once "../home/home.php";
require_once "../login/logininfo.php";



$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
        
$query = "SELECT * FROM order_line";
        
$result = $conn->query($query); 
if(!$result) die($conn->error);
        
$rows = $result->num_rows;
        

echo <<<_END
    <title>Login</title>
</head>
<body>
<div class="card" style="width: 25rem;">
<div class='card'>
<h2> View Orders </h2>
<table>
<tr>
<th>Order ID</th><th>Product ID</th><th>Quantity</th><th>Price</th>
</tr>
_END;
for($j=0; $j<$rows; $j++)
{

    $row = $result->fetch_array(MYSQLI_ASSOC); 
echo "<tr>";
echo "<td>" . $row[order_id] . "</td>";
echo "<td>" . $row[product_id] . "</td>";
echo "<td>" . $row[quantity_ordered] . "</td>";
echo "<td>" . $row[price_paid] . "</td>";
echo "</tr>";
}
echo "</table>";
echo <<<_END
<h2> Return Order</h2>
<form method='POST'>
Order ID: <input type='text' name='order_id'>
<br>
Quantity: <input type='text' name='quantity'>
<br>
<input type='submit' value='Return'>
</form>
</div>

<div class="card">
<h2>Cancel Order</h2>
<form method='POST'>
Order ID: <input type='text' name='order_id_cancel'>
<br>
<input type='submit' value='Cancel'>
</form>
</div>

</body>
<footer>
<a href='../payment/Payment.php'><button> Make Payment </button></a>
<a href='../viewcart/ViewCart.php'><button> View Cart </button></a>
</footer>
_END;

if (isset($_POST['order_id']) && isset($_POST['quantity'])) {
$order_id = $_POST['order_id'];
$quantity = $_POST['quantity'];

$returnorder = "INSERT INTO return_table (return_dttm,order_id,quantity_returned) 
VALUES (CURRENT_TIMESTAMP,'$order_id','$quantity')";
        
$return = $conn->query($returnorder); 
if(!$return) die($conn->error);
        
$rows = $return->num_rows;
}
if (isset($_POST['order_id_cancel'])) {
$order_id_cancel = $_POST['order_id_cancel'];



$cancelorderreturn = "DELETE FROM return_table
WHERE order_id = '$order_id_cancel' ";

$cancelorder = "DELETE FROM order_line
WHERE order_id = '$order_id_cancel' ";

$cancelordertable = "DELETE FROM order_table 
WHERE order_id = '$order_id_cancel' ";	



$cancelreturn = $conn->query($cancelorderreturn);
if(!$cancelreturn) die($conn->error);
			
$cancel = $conn->query($cancelorder); 
if(!$cancel) die($conn->error);

$canceltable = $conn->query($cancelordertable); 
if(!$canceltable) die($conn->error);
			
$rows = $cancel->num_rows;
}
?>

