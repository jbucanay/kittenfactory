<?php
echo <<<_END
		<title>Home</title>
		<a href='AboutUs.php'><button> About Us </button></a>
		<a href='Shop.php'><button> Shop </button></a>
		<a href='Login.php'><button> Login </button></a>
		<link rel='stylesheet' href='../css/formatting.css'>
		<header>
		<a href='HomePage.php'><img src='../Images/logo.png'
		width= "200"
		height="200"></a>
		</header>
		<body>
			<h1> Kitten Factory </h1>
			<h2> View Cart </h2>
			<form method='POST' action='Payment.php'>
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
					<a href='ViewOrders.php'><button> View Orders </button></a>
				</footer>
			
		</body>
_END;



?>