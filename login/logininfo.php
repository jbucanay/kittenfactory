<?php
include_once "../home/home.php";
$hn = 'localhost:3306';
$db = 'kitten_factory';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	$tmp_username = mysql_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_fix_string($conn, $_POST['password']);
	
	$query = "SELECT password FROM customer WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "Login Successful! Welcome back $tmp_username<br>";
		
		
		$_SESSION['username']= $tmp_username;
		if(empty($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}
		
       header("Location: ../shop/shop.php");
	}
	else
	{
		header("Location: login.php");
	
	}
	
}

$conn->close();

function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}
	
?>