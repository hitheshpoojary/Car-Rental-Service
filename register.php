<?php 
require 'db.php';
$email=$_POST["email"];
$password=$_POST["password"];
$sql="INSERT INTO users(email, password) VALUES('$email', '$password')";
if($connect->query($sql)===TRUE)
{
echo "record created successfully!";
}
else 
{
echo "record creation unsuccessfull!";
}

$connect->close();
 ?>


