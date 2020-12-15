<?php 
$con=mysqli_connect("localhost","root", "","ziggride" );
if($con)
{ echo "Comment recieved successfully";}

else
{ echo "Comment not recieved";}
mysqli_select_db($con, 'feedback');
$user=$_POST['user'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$comment=$_POST['comment'];

$query="INSERT INTO feedback (u_name, u_email, u_mobile, comment)
VALUES('$user', '$email', '$mobile', '$comment')";
mysqli_query($con, $query);
header('location: ziggride_home.php')
?>

