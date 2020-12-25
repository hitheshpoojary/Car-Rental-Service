<?php 
require 'db.php';
$email=$_POST["email"];
$password=$_POST["password"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$bdate=$_POST["birthday"];



$sql="INSERT INTO users(email, password,fname,lname,birthday) VALUES('$email', '$password', '$fname', '$lname', '$bdate')";

if($connect->query($sql)===TRUE)
{
echo "<script>
alert('Record created successfully!');
window.location.href='login_page.php';
</script>";

}
else 
{
echo "record creation unsuccessfull!";
}

$connect->close();
 ?>


