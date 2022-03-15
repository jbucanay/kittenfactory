<!DOCTYPE html>
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
   
   
    ?>
    
</head>
	<body>
		<h2> Employee Portal </h2>
		<br>

		<a href='../view_employees/view_employees.php'> 
			<button  class="btn btn-warning"> View Employees </button>
		</a>
		<a href='../customer_management/customer_management.php'>
			<button  class="btn btn-warning"> View and Manage Customers </button>
		</a>
        <a href='../manageorders/manageorders.php'>
			<button  class="btn btn-warning"> View and Manage Orders </button>
		</a>
	</body>

</html>