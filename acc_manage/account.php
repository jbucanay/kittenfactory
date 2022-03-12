<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Manage Account</title>
    <style type="text/css">
      <?php
      include 'account.css';
      
      ?>

    </style>
    <?php 
        include_once "../home/home.php";
    ?>
</head>
<body>
    <?php 

$sn = "localhost:8889";
$un = "root";
$pw = "root";
$db = "kitten_factory";


$user = $_SESSION['username'];

try {
    $conn = new PDO("mysql:host=$sn;dbname=$db", $un,$pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $res = $conn->query("SELECT * FROM users where username = '$user'")->fetch(PDO::FETCH_ASSOC);
    print_r($res);
    echo "<br>";
    echo <<<_end
        <div class="card">
        <div class="card-header">
        <p>$res[first_name] $res[last_name]</p>
        </div>
        <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    _end;
    

    


}

catch (PDOException $e){
    echo "Connection failed: " .$e->getMessage();
    }
    
    
    
    
    
    ?>
    
</body>
</html>












