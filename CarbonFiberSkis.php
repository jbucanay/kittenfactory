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
			<h2> Carbon Fiber Skis </h2>
			<div class="row">
				<div class='column'>
					<img src='Images/cfskis.png'
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
						<form method='post'action='ViewCart.php'>
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
						<form method='post' action='ViewCart.php'>
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
_END;



?>