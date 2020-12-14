<?php 
session_start();
require 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		 Zigg Ride!!!
	</title>
<link rel="stylesheet" type="text/css" href="home_page.css">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <link rel="icon" href="img/vehicleimages/logo.jpg" type="image/icon">
</head>
<body>

 <style>
 html, body {
    padding:0;
    margin:0;
    height:100%
}
</style>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <h1 style='color:white'>ZiggRide</h1>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="ziggride_home.html">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <?php if(isset($_SESSION['login']))
              {?>
              <li>
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              <?php } else { ?>
                <li class="nav-item">
                <a class="nav-link" href="login_page.php">Login</a>
                </li>
        <li class="nav-item">
        <a class="nav-link" href="newuser_login_page.html">Sign Up</a>
      </li>
              <?php } ?>
      
    </ul>
<!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>	


<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.ytimg.com/vi/eAG97EM6Xe0/maxresdefault.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>SEDAN</h3>   
      </div>   
    </div>
    <div class="carousel-item">
      <img src="https://img.indianauto.com/2019/08/26/Gruom402/automatic-suv-tata-nexon-badc.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>SUV</h3>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/gallery_slide/public/images/car-reviews/first-drives/legacy/focus_st-line_2018_799.jpg?itok=F5mtoM75" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>HATCHBACK</h3>
            </div>
      </div>   
    <div class="carousel-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTAmjDydfqDcfCkSkwtVBL3GOK3jcqXsLkLKg&usqp=CAU" alt="NEW YORK" width="1100" height="500">
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

<section class="my-5">
    <div class="py-5">
    <h2 class="text-center">About Us</h2>
    </div> 
  <div class="container-fluid">
    <div class="row">
         <div class="col-lg-6 col-md-6 col-12">
    <img src="https://s3-eu-west-1.amazonaws.com/%2Fgoldcar/goldcarweb/landings/full/Car-Hire-Online.jpeg" class="img-fluid aboutimg">
    </div>   

    <div class="col-lg-6 col-md-6 col-12">
    <p class="py-5"> 
    Select from the wide range of cars, that suits you the best!!<br/>
    Book your desired car for most affordable price..<br/>
    We provide you the deed <br/>                                   
    To staisfy all your need!!</br>
    And that's a promise from  ZiggRide
 


    </p>  
    </div>  
  </div>
</div>
</section>

<a href="car-listing.php"><button type="button" class="btn btn-primary btn-lg btn-block">Click here to book car</button>
</a>


<section class="my-5" >
    <div class="py-5">
    <hr/>
    <h2 class="text-center"> Our Services or features</h2>
  </div>
<div class="container-fluid ">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-12">
      <div class="card" >
       <img class="card-img-top" height="200px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRm7JQ2nDaolaQLp6LfDJmzHQZcWMce4u9YXQ&usqp=CAU" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">cost efficient</h4>
            <p class="card-text">Some example text.</p>
           <!--<a href="#" class="btn btn-primary">See Profile</a>-->
       </div>
</div>

    </div>

        <div class="col-lg-4 col-md-4 col-12">
      <div class="card" >
       <img class="card-img-top"height="200px"  src="https://s3.amazonaws.com/blog.v-comply.com/wp-content/uploads/2017/09/04191037/user-friendly.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">user friendly</h4>
            <p class="card-text">Some example text.</p>
          <!-- <a href="#" class="btn btn-primary">See Profile</a>-->
       </div>
</div>

    </div>

        <div class="col-lg-4 col-md-4 col-12">
      <div class="card" >
       <img class="card-img-top"height="200px"  src="https://s3.amazonaws.com/intanibase/iad_screenshots/1949/5565/6.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">faster bookings</h4>
            <p class="card-text">some sample text </p>
            <!--  <a href="#" class="btn btn-primary">See Profile</a>-->
       </div>
</div>

    </div>
  </div>
</div>


  <section class="my-5  border">
    <div class="py-5">
      <h2 class="text-center">Contact us</h2>
    </div> 
    <div class="w-50 m-auto">
      <form action="userinfo.php" method="POST">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="user" autocomplete="off" class="form-control">
        </div>
         <div class="form-group">
          <label>Email Id</label>
          <input type="Email" name="email" autocomplete="off" class="form-control">
        </div>
         <div class="form-group">
          <label>Mobile</label>
          <input type="text" name="mobile" autocomplete="off" class="form-control">
        </div>
         <div class="form-group">
          <label>Comment</label>
         <textarea class="form-control" name="comment"></textarea>
        </div>
        <div align="center">
        <button  type="submit" class="btn btn-success ">Submit</button>
        </div>
      </form>
    </div>
  </section>

<footer>
  <p class="p-3 bg-dark text-white text-center">© 2020 ziggrideproduction</p>

</footer>

</body>
</html>