
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
      <?php
      include 'shop.css'
      ?>

    </style>
    <?php 
        include_once "../home/home.php";
        
    ?>
    
</head>
	
		<body>
			
			<h2> Make Payment </h2>
			<form method='POST' action='../vieworders/ViewOrders.php'>
			<br>
			Credit Card <input type='text'>
			<br>
			<input type='submit' value='Process Payment'>
			</form>
			<footer>
				<a href='../vieworders/ViewOrders.php'><button> View Orders </button></a>
				<a href='../viewcart/ViewCart.php'><button> View Cart </button></a>
			</footer>
		</body>


<?php

?>