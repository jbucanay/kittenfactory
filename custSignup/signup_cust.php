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
        && !empty(($_POST['address']))
        && !empty(($_POST['user_name']))
        && !empty(($_POST['password']))
        )
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        
        $qr = "SELECT * FROM customer WHERE user_name = '$user_name'";
        $res = $conn->query($qr);
        print_r($res);


       
        
        
    }
    else {
        echo 'not complete';
    }




} catch (PDOException $e){
    echo "Connection failed: " .$e->getMessage();
}



?>