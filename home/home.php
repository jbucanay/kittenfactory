<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    
    <style type="text/css">
        <?php 
        include "home.css"
        ?>

    </style>
<title>Kitten Factory | Ski Manufacturing</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
    <a class="navbar-brand" href="../home/home.php">
      <img src="../images/logo.png" alt="" width="50" height="50">
    </a>
  </div>
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../shop/shop.php">Skis</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../about/aboutus.php">About</a>
        </li>
      <?php

      session_start();

      if(isset($_SESSION['username'])){
        echo <<<_END
        <li class="nav-item">
          <a class="nav-link" href="../home/signout.php">Sign out</a>
        </li>

      _END;
      
      } 
      else {
        echo <<<_END
        <li class="nav-item">
          <a class="nav-link" href="../login/login.php">Login</a>
        </li>

      _END;
      }
      
     
      ?>
        
        <li class="nav-item">
          <a class="nav-link" href="../viewcart/viewcart.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>

	<h1> Kitten Factory </h1>
	<h2> Custom Carbon Fiber Skis </h2>
	

</body>
	


</html>