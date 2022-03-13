<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
      <?php
      include 'product.css'
      ?>

    </style>
    <?php 
        include_once "../home/home.php";
        
    ?>
</head>
<body>
<main id='pro_main'>
    <?php 
   

$sn = "localhost:8889";
$un = "root";
$pw = "root";
$db = "kitten_factory";

    try {
        $conn = new PDO("mysql:host=$sn;dbname=$db", $un,$pw);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $product_id = $_GET['product_id'];
        
        // ski_size_price_qty COLUMNS: 	
                //product_id
                //ski_size
                //price
                //quantity_available  
        // product columns  	
                //product_id
                //ski_name
                //makeup
                //description
                //product_img_path

            $get_prod = $conn->prepare("SELECT ski_name,product_img_path FROM product WHERE product_id = $product_id");
            $get_prod->execute();
            $product = $get_prod->fetchAll(PDO::FETCH_ASSOC);
            $ski_name = $product[0]['ski_name'];
            $ski_img = $product[0]['product_img_path'];
            
            
        
            $qry = "SELECT ssq.ski_size,ssq.price,ssq.quantity_available
            FROM product prd
            INNER JOIN ski_size_price_qty ssq
            ON prd.product_id = ssq.product_id
            WHERE prd.product_id = $product_id
            ";
        $prep = $conn->prepare($qry);
        $prep->execute();
        $res = $prep->fetchAll(PDO::FETCH_ASSOC);
        // print_r($res);

        for($i=0;$i<count($res);++$i){
        
        $price = $res[$i]['price'];
        $size = $res[$i]['ski_size'];
        $available = $res[$i]['quantity_available'];
        
        
        
        echo <<<_end
        <form class="card" style="width: 30rem;" id='form_card' action="../viewcart/ViewCart.php" method="post">
        <h5 class="card-title text-center">$ski_name</h5>
        <input value='$ski_name' hidden name='ski_name'></input>
        
        <div class="card-body">
        <img src="$ski_img" class="card-img-top" alt="..." value="$ski_img">
        <input value='$ski_img' hidden name='image'></input>
        <input value='$product_id' name='product_id' hidden></input>
        <input value='$price' name='price' hidden>$$price</input>
        <input value='$available' name='available' hidden></input>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
            <input type="number" class="form-control" name='quantity' placeholder="Enter quantity" min="1" max="$available" value='1' name='quantity' required >
            </div>
            <input value='$size' name='size' hidden>Length $size cm</input>
            
            
            <br>
            <button  class="btn btn-warning" type='Submit'>Add to Cart</button>
        </div>
        
        </form>
        _end;
        
        
        
        
        }

       
    }
    catch (PDOException $e){
        echo "Connection failed: " .$e->getMessage();
      }
    ?>  
    </main>
</body>
</html>