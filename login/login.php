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
      include 'login.css'
      ?>

    </style>
    <?php 
        include_once "../home/home.php";
       
    ?>
    <title>Login</title>
</head>
<body>

<form class="col-lg-6 offset-lg-3" method='POST' action='logininfo.php'>
<div class="d-grid gap-2 d-md-flex justify-content-md-end" id='signup'>
  <a href="../empSignup/emp_signup.php"><button class="btn btn-primary me-md-2" type="button">Employee Signup</button></a>
  <a href="../custSignup/cust_signup.php"><button class="btn btn-primary" type="button">Customer Signup</button></a>
</div>
<div id='formcont'>
        <div class="row mb-3">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username">
          </div>
        </div>
        <div class="row mb-3">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
        <a target="_self" class='atag'>Sign in</a></button>
        </div>
    </form>
</body>
</html>