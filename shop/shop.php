<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
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
        
    ?>
    
</head>
<body >
  <main id='shop_main'>
<?php 

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

	if(!$found){
  
		header("Location: ../home/unauthorized.php");
	}
}
try 
{
  $conn = new PDO("mysql:host=$sn;dbname=$db", $un,$pw);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $qry = "SELECT * FROM product";
  $prep = $conn->prepare($qry);
  $prep->execute();
  $res = $prep->fetchAll(PDO::FETCH_ASSOC);

  
  for($i=0;$i<count($res);++$i){
    $ski_name = $res[$i]['ski_name'];
    $ski_makeup = $res[$i]['makeup'];
    $ski_desc = $res[$i]['description'];
    $product_id = $res[$i]['product_id'];
    $product_image = $res[$i]['product_img_path'];
   
    echo "<br>";
    echo "<br>";
    echo <<<_end
    <a href="../product/product.php?product_id=$product_id" class='atag'>
        <div class="card" style="width: 18rem;">
        <img src="$product_image" class="card-img-top" alt="product image">
      <div class="card-body">
        <h5 class="card-title">$ski_name</h5>
        <h6 class="card-subtitle mb-2 text-muted">$ski_makeup</h6>
        <p class="card-text">$ski_desc</p>
      </div>
    </div>
    </a>
    _end;
  }
 
  
  
  



}
catch (PDOException $e){
  echo "Connection failed: " .$e->getMessage();
}


// ob_end();

?>
</main>
</body>
</html>
