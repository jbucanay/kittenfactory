<?php

session_start();

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	
	echo "Welcome back $username <br>";
}else{
	echo "Please login.<br>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
     

    </style>
    <?php 
        include_once "../home/home.php";
        
    ?>
    <title>View Cart</title>
</head>

<h2> View Cart </h2>
		<body>
			
			<form method='POST' action='../payment/Payment.php'>
			Carbon Fiber Skis (Quantity): 
			<br>
			Length:
			<br>
			Color:
			<br>
			Hybrid Skis (Quantity):
			<br>
			Length:
			<br>
			Color:
			<br>
			Cart Total:
			<br>
			<input type='submit' value='Proceed to Payment'>
			</form>
				<footer>
					<a href='../vieworders/ViewOrders.php'><button> View Orders </button></a>
				</footer>
			
		</body>



<?php
?>