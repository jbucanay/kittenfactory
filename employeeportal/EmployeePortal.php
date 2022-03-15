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
      include 'shop.css'
      ?>

    </style>
    <?php 
        include_once "../home/home.php";
        
    ?>
    
</head>
	<body>
		<h2> Employee Portal </h2>
		<br>

		<a href='../view_employees/view_employees.php'> 
			<button> View Employees </button>
		</a>
		<a href='../customer_management/customer_management.php'>
			<button> View and Manage Customers </button>
		</a>

	</body>


<?php
//database login creditials
$sn = "localhost:8889";
$un = "root";
$pw = "root";
$db = "kitten_factory";

try {

    // Connection to database
    // source: https://www.w3schools.com/php/php_mysql_connect.asp 
    $conn = new PDO("mysql:host=$sn;dbname=$db", $un,$pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    echo "<br>";
    //get values from form
    if(!empty(($_POST['first_name'])) 
        && !empty(($_POST['first_name']))
        && !empty(($_POST['last_name']))
        && !empty(($_POST['position']))
        && !empty(($_POST['username']))
        && !empty(($_POST['password']))
        )
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $position = $_POST['position'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $token = password_hash($password,PASSWORD_DEFAULT); 


        $newemployeequery = "INSERT INTO employee (first_name, last_name, position, username, password) 
        VALUES ('$first_name','$last_name','$position','$username','$token')";
      
        $qryresult = $conn->query($newemployeequery);
        if(!$qrysult) die($conn->error);
        
    }




}
catch (PDOException $e){
echo "Connection failed: " .$e->getMessage();
}

?>