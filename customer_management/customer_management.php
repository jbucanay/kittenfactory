<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Customer Management </title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
</html>

<?php
ob_start();

require_once "../home/home.php";

 $page_roles = array('admin','employee');
 $found=0;
 
 if(isset($_SESSION['username'])){
 $userobj = new User($_SESSION['username']);
 $user_roles = $userobj->getRoles();
 
	 foreach ($user_roles as $urole){
		 foreach ($page_roles as $prole){
			 if($urole==$prole){
 
				 $found=1;
			 }
		 }
	 }
  }
	 if(!$found){
   
		 header("Location: ../home/unauthorized.php");
	 }


$query = "select first_name, last_name, customer_id, address from customer";

$conn = new mysqli($sn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows;
for($j=0; $j<$rows; ++$j){
	
$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<pre>
	First Name: $row[first_name]
	Last Name: $row[last_name]
	Customer ID: $row[customer_id]
	Address: $row[address]
	
	<a href="edit_customer.php?customer_id=$row[customer_id]">
		<button class="btn btn-dark"> Edit Customer </button>
	</a>
	</pre>
	
_END;
}
// ob_end();

?>

