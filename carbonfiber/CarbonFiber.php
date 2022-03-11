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
    <title>Carbon Fiber Skis</title>
</head>

		<body>
			<h2> Carbon Fiber Skis </h2>
			<div class="row">
				<div class='column'>
					<img src='../Images/cfskis.png'
					width='600'
					height='400'/>
					<br>
					$1000
					<br>
				</div>
				<div class="column">
						<form method='post'>
						Ski Length
						<select name='length' size='1'>
							<option value='174cm'>174 cm</option>
							<option value='180cm'>180 cm</option>
						</select>
						</form>
						<form method='post'action='../viewcart/ViewCart.php'>
						Color
						<select name='color' size='1'>
							<option value='black'>Black</option>
							<option value='grey'>Grey</option>
							<option value='pink'>Pink</option>
							<option value='blue'>Blue</option>
							<option value='green'>Green</option>
							<option value='purple'>Purple</option>
							<option value='white'>White</option>
						</select>
						</form>
						<form method='post' action='../viewcart/ViewCart.php'>
						Quantity
						<select name='quantity' size='1'>
							<option value='one'>1</option>
							<option value='two'>2</option>
							<option value='three'>3</option>
						</select>
						<br>
						<input type='submit' value='Add to Cart'>
						</form>
				</div>
				
		</body>


<?php

?>