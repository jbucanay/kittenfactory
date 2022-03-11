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
        && !empty(($_POST['username']))
        && !empty(($_POST['password']))
        )
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $token = password_hash($password,PASSWORD_DEFAULT); 


        $newuserquery = "INSERT INTO customer (first_name, last_name, address, username, password) 
        VALUES ('$first_name','$last_name','$address','$username','$token')";
      
        $result = $conn->query($newuserquery);
        if(!$result) die($conn->error);
        
    }




}
catch (PDOException $e){
echo "Connection failed: " .$e->getMessage();
}

echo "<a href='../login/login.php'>Log In</a>"

?>