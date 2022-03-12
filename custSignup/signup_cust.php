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

        //verify if username is already in the databse first before creating the user

        $qry = "SELECT * FROM customer WHERE username = '$username'";
        $res = $conn->query($qry)->fetchAll(PDO::FETCH_ASSOC);
        // print_r($res);

        if(!$res){
            $newuserquery = "INSERT INTO customer (first_name, last_name, address, username, password) 
            VALUES ('$first_name','$last_name','$address','$username','$token')";
            $result = $conn->query($newuserquery);
            if(!$result){
                die($conn->error);
            } else {
                header("Location: ../login/login.php");
            }
        
           
        
        } else {
            // should add javascipt here to create an error on the page
            echo "User name already taken try again";
            header("Location: cust_signup.php");
        }

        
    }




}
catch (PDOException $e){
echo "Connection failed: " .$e->getMessage();
}



?>