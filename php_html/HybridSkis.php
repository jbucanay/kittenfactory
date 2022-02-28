<html>
	<head>
		<title>Home</title>
		<link rel='stylesheet' href='../css/formatting.css'>
	</head>	
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
		<h2> Hybrid Skis </h2>
		<div class="row">
			<div class='column'>
				<img src='../images/hybridskis.png'
				width='600'
				height='400'/>
				<br>
				$800
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
				<form method='post'>
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
				<form method='post'>
					Quantity
					<select name='quantity' size='1'>
						<option value='one'>1</option>
						<option value='two'>2</option>
						<option value='three'>3</option>
					</select>
					<br>
					<input type='submit'>
				</form>
			</div>
		</div>
	</body>
</html>




<?php
# kittenfactory

?>