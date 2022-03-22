
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
      <?php
	  ob_start();
      include 'shop.css'
      ?>

    </style>
<?php 


include_once "../home/home.php";


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$page_roles = array('admin','customer','employee');
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

	
echo <<<_END
    
</head>
	
		<body>
			
			<h2> Make Payment </h2>
			<form method='POST'>
			<br>
			Credit Card <input type='text' name='credit_card'>
			<br>
			<button type="submit" class="btn btn-dark">
        <a target="_self" >Process Payment</a></button>
			</form>
			<footer>
				<a href='../vieworders/ViewOrders.php'><button  class="btn btn-warning"> View Orders </button></a>
				<a href='../viewcart/ViewCart.php'><button  class="btn btn-warning"> View Cart </button></a>
			</footer>
		</body>


_END;
if (isset($_POST['credit_card'])) {
	$creditcard= $_POST['credit_card'];
	
	$insertpayment = "INSERT INTO payment (pmt_dttm,credit_card) 
	VALUES (CURRENT_TIMESTAMP,'$creditcard')";
			
	$payment = $conn->query($insertpayment); 
	if(!$payment) die($conn->error);
			
	$rows = $payment->num_rows;
	}
	ob_end();
?>