<html>
	<head>
		<title>Login</title>
		<link rel='stylesheet' href='../css/formatting.css'>
	<head> 
	<header>
		<a href='HomePage.php'>
			<img src='../images/logo.png' width= "200" height="200" />
		</a>
		<a href='AboutUs.php'><button> About Us </button></a>
		<a href='Shop.php'><button> Shop </button></a>
		<a href='Login.php'><button> Login </button></a>
	</header>
	<body>
		<h1> Kitten Factory </h1>
		<h2> Login </h2>
		<form method="POST" action="CustomerLogin.php">
			username
			<input type='text' name='username'>
			password
			<input type='text' name='password'>
			<input type='submit'>
		</form>
	</body>
</html>

<?php

?>
