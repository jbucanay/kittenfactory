<?php




echo <<<_END
		<title>Login</title>
		<a href='AboutUs.php'><button> About Us </button></a>
		<a href='Shop.php'><button> Shop </button></a>
		<a href='Login.php'><button> Login </button></a>
		<link rel='stylesheet' href='formatting.css'>
		<header>
		<a href='HomePage.php'><img src='Images/logo.png'
		width= "200"
		height="200" /></a>
		</header>
		<body>
			<h1> Kitten Factory </h1>
			<h2> Login </h2>
			<form method="POST" action="ViewOrders.php">
				username
				<input type='text' name='username'>
				password
				<input type='text' name='password'>
				<input type='submit'>
			</form>
		</body>
		

_END;
?>


