<?php 
session_start();
$con=mysqli_connect("localhost","root", "","ziggride" );
echo "helloooooooo"


$u_id=$_SESSION['login'];
$mobile=$_POST['mobile'];
$comment=$_POST['comment'];
$query="INSERT INTO feedback (u_id, u_mobile, comment)
VALUES('$u_id','$mobile', '$comment')";
mysqli_query($con, $query);
header('location: ziggride_home.php')
?>


