<?php 
session_start();
require 'db.php';
$email=$_POST["username"];
$password=$_POST["password"];

if(isset($_POST['adminlogin'])){
    $sql= "SELECT * FROM admin WHERE email = '$email' AND password= '$password'";
    $res=mysqli_query($connect, $sql);
    $_SESSION['email']=$email;

if(mysqli_num_rows($res)==1)
{
    header("location:admin.php");
    $_SESSION['login']=$_POST['username'];
    $_SESSION['admin']=1;
    $_SESSION['email']=$email;
}
else 
{

header('Location:login_page.php?Invalid=Invalid Credentials ');
}
}
else{
$sql= "SELECT * FROM users WHERE email = '$email' AND password= '$password'";

$res=mysqli_query($connect, $sql);
if(mysqli_num_rows($res)==1)
{
    header("location:ziggride_home.php");
$_SESSION['login']=mysqli_fetch_row($res)[0];
}
else 
{

header('Location:login_page.php?Invalid=Invalid Credentials ');
}
}
$connect->close();

 ?>
