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
      ob_start();
      include 'account.css';
      
      ?>

    </style>
    <?php 
        include_once "../home/home.php";
    ?>
</head>
<body>
<footer>
    <a href='../employeeportal/employeeportal.php'>
			<button  class="btn btn-dark"> Employee Portal </button>
		</a>
    </footer>
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

$user = $_SESSION['username'];

try {
    $conn = new PDO("mysql:host=$sn;dbname=$db", $un,$pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $res = $conn->query("SELECT * FROM customer where username = '$user'")->fetch(PDO::FETCH_ASSOC);
    
    if(!$res){
        $res = $conn->query("SELECT * FROM employee where username = '$user'")->fetch(PDO::FETCH_ASSOC);
    }
    
    echo "<br>";
    echo <<<_end
        <div class="card">
        <div class="card-header">
        $res[first_name] $res[last_name]
        </div>
        <div class="card-body">
        <p class="card-text">Username: $res[username]</p>
        </div>
    </div>
    _end;
    

    


}

catch (PDOException $e){
    echo "Connection failed: " .$e->getMessage();
    }
    
    
    
    
    // ob_end();
    ?>
    
</body>

</html>












