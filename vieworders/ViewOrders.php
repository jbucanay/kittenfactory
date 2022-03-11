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
        include_once "../home/home.php";
        
    ?>
    <title>View Orders</title>
</head>

		<body>
			<div class="card" style="wideth: 18rem;">
				<div class='card'>
				<h2> Order History</h2>
					Order ID: (DD-MM-YYY $$$)
					<br>
					<br>
					<br>
				<h2> Return Order</h2>
					<form method='POST'>
					Order ID: <input type='text'>
					<br>
					<input type='submit' value='Return'>
					</form>
				</div>
				<div class="card" style="wideth: 18rem;">
					<h2>Manage Order</h2>
					<form method='POST'>
					Order ID: <input type='text'>
					<br>
					Update Address: <input type='text'>
					<br>
					Update Quantity: <input type='text'>
					<br>
					Cancel Order? <input type='checkbox'>
					<br>
					<input type='submit' value='Update'>
					</form>
			</div>
		</body>
		<footer>
			<a href='../payment/Payment.php'><button> Make Payment </button></a>
			<a href='../viewcart/ViewCart.php'><button> View Cart </button></a>
		</footer>


<?php

?>