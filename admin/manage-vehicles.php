<?php
$con = new mysqli("localhost","root","","ziggride"); 
session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}

?>




<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
    <title>Admin Manage Vehicles   </title>
    <link rel="icon" href="../img/vehicleimages/logo.jpg" type="image/icon">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>
<body class="bg-light">

<div class="brand clearfix">
	<a href="manage-vehicles-simple.php" style="font-size: 35px;" class="text-white">ZiggRide | Admin Panel</a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="../logout.php"><img src="img/logout.jpg" class="ts-avatar hidden-side" alt=""> Logout </a>
			
			</li>
		</ul>
</div>
<div id="demo" class="container-fluid carousel slide p-0" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.ytimg.com/vi/eAG97EM6Xe0/maxresdefault.jpg" alt="Los Angeles" width="100%" height="500">
      <div class="carousel-caption">
        <h3>SEDAN</h3>   
      </div>   
    </div>
    <div class="carousel-item">
      <img src="https://img.indianauto.com/2019/08/26/Gruom402/automatic-suv-tata-nexon-badc.jpg" alt="Chicago" width="100%" height="500">
      <div class="carousel-caption">
        <h3>SUV</h3>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/gallery_slide/public/images/car-reviews/first-drives/legacy/focus_st-line_2018_799.jpg?itok=F5mtoM75" alt="Chicago" width="100%" height="500">
      <div class="carousel-caption">
        <h3>HATCHBACK</h3>
            </div>
      </div>   
    <div class="carousel-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTAmjDydfqDcfCkSkwtVBL3GOK3jcqXsLkLKg&usqp=CAU" alt="NEW YORK" width="100%" height="500">
      <div class="carousel-caption">
        <h3>Delux MUV</h3>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

 <!-- functionalities -->
 <div id="fun" class="d-flex bg-white justify-content-center p-2 m-5"  >
  <div class="row">
    <div class="col"> 
      <div class="center-block"> 
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseAdd" aria-expanded="false" aria-controls="collapseAdd">
      Add vehicle
      </button>
    </div>
    </div>  
    <div class="col"> 
      <div class="center-block"> 
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseRemove" aria-expanded="false" aria-controls="collapseRemove">
      Remove vehicle
      </button>
    </div>
    </div>
    <div class="col"> 
    <div class="center-block"> 
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseDisplay" aria-expanded="false" aria-controls="collapseDisplay">
        Display vehicles
      </button>
    </div>
  </div>
  </div>
  </div>
  
    <div class="collapse bg-dark m-5 justify-content-center" id="collapseAdd" >
    <div id="c1" class="card card-body">
    <p>
    <form id="adminadd" name="adminadd" method="post" enctype="multipart/form-data" >
    <div class="alert alert-primary text-center user-select-none" role="alert">
        Post a new Vehicle
      </div>
  <div class="form-group">
    <label for="bid">Vehicle title</label>
    <input type="text" class="form-control" id="bid" name="vid" required autofocus>
  </div>
  <div class="form-group">
    <label for="bookname">Price per day</label>
    <input type="number" class="form-control" id="bname" name="price" required>
  </div>
  <div class="form-group">
    <label for="author">Fuel Type</label>
    <input type="text" class="form-control" id="author" name="fuel" required>
  </div>
  <div class="form-group">
    <label for="author">Model Year</label>
    <input type="text" class="form-control" id="year" name="year" required>
  </div>
  <div class="form-group">
    <label for="qadd">Seating capacity</label>
    <input type="number" class="form-control" id="qadd" name="qadd" min="0" required>
  </div>
  <div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>
  <div class="text-center">
  <button type="submit" class="btn btn-success" name="addbtn" value="add" data-toggle="tooltip" data-placement="bottom" title="Add Vehicle">Submit</button>
    </div>
</form>
    </p>
    </div>
</div>

<?php
if(isset($_POST['addbtn']))
{   
    $vid=$_POST['vid'];
    $price=$_POST['price'];
    $fuel=$_POST['fuel'];
    $year=$_POST['year'];
    $seat=$_POST['qadd'];
    $vimage1=$_FILES['img1']['name'];
    $vimage2=$_FILES["img2"]["name"];
    $vimage3=$_FILES["img3"]["name"];
    move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
    move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
    move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
    echo $vimage1;
   
    $con = new mysqli("localhost","root","","ziggride"); 
    $sql = "INSERT INTO tblvehicles(VehiclesTitle,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3) VALUES('$vid',$price,'$fuel',$year,$seat,'$vimage1','$vimage2','$vimage3');";
    
    if (!mysqli_query($con, $sql)) 
   {  
       echo "
       <script> 
       alert('Error! Cannot Add New car');

       window.location.href='manage-vehicles-simple.php';</script>";     
   }
else{
       echo "<script>
       alert('New Vehicle Added Successfully!');
       window.location.href='manage-vehicles-simple.php';</script>";
      

   }
}


?>

<div class="collapse" id="collapseDisplay">
  <div id="c4" class="card card-body">
    <p>
    <?php 
     
      $sql = "SELECT * FROM  tblvehicles";
      $result = mysqli_query($con,$sql);

      if (mysqli_num_rows($result) > 0) {

        $str= "<div class=\"alert alert-dark text-center user-select-none\" role=\"alert\">
        Vehicles Available
        </div>
        <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover table-bordered table-dark\">
        <thead>
          <tr>
            <th scope=\"col\">Vehicle Name</th>
            <th scope=\"col\">Price Per day</th>
            <th scope=\"col\">Fuel Type</th>
            <th scope=\"col\">Model Year</th>
            <th scope=\"col\">Seating capacity</th>
          </tr>
        </thead>
        <tbody>
                ";
        echo $str;

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <th scope=\"row\">".$row["VehiclesTitle"]."</th><td>".$row["PricePerDay"]."</td><td>".$row["FuelType"]."</td><td>".$row['ModelYear']."</td><td>".$row['SeatingCapacity']."</td></tr>";

            
          }
          echo "  </tbody> </table></div>";

      }
      else {
        echo '<div class="alert alert-danger" role="alert">
        NO CARS BOOKED!
      </div>';
      }
    ?>


    </p>
    </div>
</div>


<div class="collapse" id="collapseRemove">
  <div id="c2" class="card card-body">
    <p>

    <?php


        $sql = "SELECT * from tblvehicles";
        $result = mysqli_query($con,$sql);

        if (mysqli_num_rows($result) > 0){
            echo "
      <form method=\"post\" name=\"adminremove\" id=\"adminremove\" onsubmit=\"return confirm1()\">
      <div class=\"alert alert-primary text-center user-select-none\" role=\"alert\">
        Remove a vehicle
      </div>
      <div class=\"form-group\">
      <label for=\"formbook\">Vehicle Title</label>
          <select class=\"form-control\" id=\"removeselect\" name=\"removeselect\">";
          while($row = mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row['id'].">".$row['VehiclesTitle']."</option>";
            }
            echo '</select></div>
            <div class="text-center">
        <button type="submit" name="removebtn" value="remove" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Remove Car">Remove Car</button>
        </div>
      </form>
      ';
        }
        else
    {
        echo '<div class="alert alert-danger" role="alert">
        No Cars Available
      </div>';
    }

    if(isset($_POST['removebtn'])){
        $bid=$_POST['removeselect'];
    
        $sql="DELETE FROM tblvehicles WHERE id=$bid;";
        if (!mysqli_query($con, $sql)){
            echo "<script> 
                alert('Error! Cannot Remove The Car');
                window.location.href='manage-vehicles-simple.php';</script>";
                session_write_close();
        }
        else{
            echo "<script>
            alert('Car Removed Successfully!');
            window.location.href='manage-vehicles-simple.php';</script>";
            session_write_close();
    
        }
    
    }
      ?>

    
    </p>
    </div>
</div>


 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->




<footer>
<p class="p-3 bg-dark text-white text-center container-fluid mt-5 ">Admin page- © 2020 ziggrideproduction</p>
</footer>
</body>
</html>