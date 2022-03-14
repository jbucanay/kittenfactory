
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
	<?php
	include "cart.css";
	?>

    </style>
    <?php 
        include_once "../home/home.php";
        
    ?>
    <title>View Cart</title>
</head>


		<body>
		
		<main id='cart_main'>
			<?php
			$sn = "localhost:8889";
			$un = "root";
			$pw = "root";
			$db = "kitten_factory";

		try {

			if(empty($_SESSION['username'])){
				header("Location: ../login/login.php");
			}

			$conn = new PDO("mysql:host=$sn;dbname=$db", $un,$pw);
        	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			if(isset($_POST['product_id'])){
			array_push($_SESSION['cart'], $_POST);
			}
			$cart = $_SESSION['cart'];
			

			$total_cost = 0;

			for($i=0;$i<count($cart);++$i){
			$total_cost += $cart[$i]['price']*$cart[$i]['quantity'];
			$img = $cart[$i]['image'];
			$name = $cart[$i]['ski_name'];
			$price = $cart[$i]['price'];
			$quantity = $cart[$i]['quantity'];
			$size = $cart[$i]['size'];
			$prod_id = $cart[$i]['product_id'];
			$available = $cart[$i]['available'];
			$remaining = $available-$quantity;
			$qry = "UPDATE ski_size_price_qty SET quantity_available = $remaining WHERE product_id = $prod_id AND ski_size = $size";
			$prep = $conn->prepare($qry);
			$prep->execute();
			

			echo <<<_end

				<div class="card" style="width: 12rem;" id='card_cont'>
				<img src="$img" class="card-img-top" alt="product image">
			<div class="card-body">
				<h5 class="card-title">$name</h5>
				<p class="card-text">$$price</p>
				<p class="card-text">Size: $size cm</p>
				<p class="card-text">quantity: $quantity</p>
				
			</div>
			</div>


			_end;


			
			}

			echo "<br>";

			
			
		
			
			
		
		}
		catch (PDOException $e){
			echo "Connection failed: " .$e->getMessage();
		  }
			
			
			?>
		</main>
		<section id='section'>
		<?php 
		echo <<<_end
		<p>Subtotal: $$total_cost</p>
		<div><small>Shipping & taxes calculated at checkout</small></div>
		<button  class="btn btn-warning" type='Submit'>Checkout</button>
		
		
		_end;
		
		
		?>
		</section>
			
		</body>



