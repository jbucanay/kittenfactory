<?php
echo <<<_END
		<title>Home</title>
		<a href='AboutUs.php'><button> About Us </button></a>
		<a href='Shop.php'><button> Shop </button></a>
		<a href='Login.php'><button> Login </button></a>
		<link rel='stylesheet' href='formatting.css'>
		<header>
		<a href='HomePage.php'><img src='Images/logo.png'
		width= "200"
		height="200"></a>
		</header>
		<body>
			<h1> Kitten Factory </h1>
			<div class="row">
				<div class='column'>
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
				<div class="column">
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
			<a href='Payment.php'><button> Make Payment </button></a>
			<a href='ViewCart.php'><button> View Cart </button></a>
		</footer>
_END;



?>