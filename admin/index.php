<?php
session_start();
require 'db.php';
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=$_POST['password']; 
$sql ="SELECT UserName,Password FROM admin WHERE UserName='$email' and Password='$password'";

$res=mysqli_query($connect, $sql);
if(mysqli_num_rows($res)==1)
{
	$_SESSION['alogin']=$_POST['username'];
	echo "<script type='text/javascript'> document.location = 'manage-vehicles-simple.php'; </script>";
}
else 
{
	echo "<script>alert('Invalid Details');</script>";
}
}
$connect->close();

?>
<!DOCTYPE html>   
<html>   
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/vehicleimages/logo.jpg" type="image/icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 
    <?php 

if(isset($_GET["Invalid"]))
{
    echo "<script type='text/javascript'>alert('Invalid Credentials!');</script>";
}

     ?>


<title> Login Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: 	#A0522D; 
 
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   

 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;
       
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   

</style>   
</head>    
<body>      


    <form method="POST"> 
        <br> 
        <div class="container">   
        <center> <h1> ADMIN LOGIN </h1> </center>
            <label>Username : </label>   
            <input type="text" placeholder="username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder=" Password" name="password" required>  
         
            <button type="submit" name="login">Login</button>  <br>
          
         
    
            
        </div>   
    </form> 
      
</body>     
</html>  