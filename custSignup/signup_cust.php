<?php 
$sn = "localhost:8889";
$un = "root";
$pw = "root";
$db = "kitten_factory";

try {
    $conn = new PDO("mysql:host$sn;dbname=$db", $un,$pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
} catch (PDOException $e){
    echo "Connection failed: " .$e->getMessage();
}

?>