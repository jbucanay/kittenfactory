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
			<h2> Shop </h2>
			<br>
			<div class="row">
				<div class='column'>
					<a href='CarbonFiberSkis.php'><img src='Images/cfskis.png'
					width='300'
					height='200'></a>
					<br>
					Carbon Fiber Skis
					<br>
					$1000
					<br>
				</div>
				<div class="column">
					<a href='HybridSkis.php'><img src='Images/hybridskis.png'
					width='300'
					height='200'></a>
					<br>
					Hybrid Skis 
					<br>
					$800
					<br>
				</div>
		</body>
		
_END;










?>