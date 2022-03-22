<?php
include_once "../home/home.php";


$conn = new mysqli($sn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
if (isset($_POST['username']) && isset($_POST['password'])) {
	
	$tmp_username = mysql_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_fix_string($conn, $_POST['password']);
	$query_cust = "SELECT password FROM customer WHERE username = '$tmp_username'";
	$query_admin = "SELECT password FROM employee WHERE username = '$tmp_username'";
	$resultcust = $conn->query($query_cust); 
	$resultadmin = $conn->query($query_admin); 
	if(!$resultcust && !$resultadmin) die($conn->error);
	
	$passwordFromDB="";
	if($resultcust){
		$rowscust = $resultcust->num_rows;
		for($j=0; $j<$rowscust; $j++)
		{
			$resultcust->data_seek($j); 
			$rowcust = $resultcust->fetch_array(MYSQLI_ASSOC);
			$passwordFromDB = $rowcust['password'];
		
		}
	}
	if($resultadmin){
		$rowsadmin = $resultadmin->num_rows;
		for($j=0; $j<$rowsadmin; $j++)
		{
			$resultadmin->data_seek($j); 
			$rowadmin = $resultadmin->fetch_array(MYSQLI_ASSOC);
			$passwordFromDB = $rowadmin['password'];
		
		}
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