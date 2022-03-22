<!DOCTYPE html>
<html lang="en">
	<head>
		<title> View Employees </title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
</html>

<?php
include_once "../home/home.php";

$query = "select first_name, last_name, position, product_id from employee";

$conn = new mysqli($sn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows;
for($j=0; $j<$rows; ++$j){
	
$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	
	<pre>
	Employee Name: $row[first_name]
	Position: $row[position]
	Product: $row[product_id]	
	</pre>
 
_END;

}

$conn->close();
?>