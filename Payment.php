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
			<h2> Make Payment </h2>
			<form method='POST' action='ViewOrders.php'>
			<br>
			Credit Card <input type='text'>
			<br>
			<input type='submit' value='Process Payment'>
			</form>
			<footer>
				<a href='ViewOrders.php'><button> View Orders </button></a>
				<a href='ViewCart.php'><button> View Cart </button></a>
			</footer>
		</body>
_END;



?>