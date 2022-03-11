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
        
        // check if user already exists
        // documentation for PDO fetch: https://phpdelusions.net/pdo/fetch_modes
        $qr = "SELECT * FROM customer WHERE user_name = '$user_name'";
        $res = $conn->query($qr)->fetch(PDO::FETCH_ASSOC);
        // if user does not exist create the new user
        if(!$res){
            $hash_pass = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO customer (first_name, last_name, address, user_name,password) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$first_name,$last_name,$address,$user_name,$password]);
        
        } else {
            //handle user when username already exist
            echo "username taken, create another one";
        }
        


       
        
        
    }
    // create an error when the form is not complete
    else {
        echo 'Please complete the form';
    }




} catch (PDOException $e){
    echo "Connection failed: " .$e->getMessage();
}



?>