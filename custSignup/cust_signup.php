<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <title>Signup</title>
    <style type="text/css">
      <?php
      include 'cust_signup.css';
      
      ?>

    </style>
    <?php 
        include_once "../home/home.php";
        include "signup_cust.php";
    ?>
</head>
<body>
        

<form class="col-lg-6 offset-lg-3 " action="signup_cust.php" method="POST">
        </div>
        <button class="btn btn-primary">
        <a href="../login/login.php" class='atag'>Sign in</a></button>
        </div>
<div id='formcont'>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="first_name">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="last_name">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="address">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name='password'>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" ><a class='atag'>Submit</a></button>
        </div>
    </form>
</body>
</html>

