<?php

session_start();

if(!isset($_SESSION['login'])){
  echo "<script> 
            alert('Unauthorised Access!');
            window.location.href='home.php';</script>";
            session_write_close();
}
else if($_SESSION['admin']!=1){
  echo "<script> 
            alert('Unauthorised Access!');
            window.location.href='home.php';</script>";
            session_write_close();
}

$name = $_SESSION['login'];
$email=$_SESSION['email'];


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--google fonts-->
    <link href='https://fonts.googleapis.com/css?family=Aref Ruqaa' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Belleza' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Alike' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Asul' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet'>


    <!--icon-->
    <link href="icons/book2.png" rel="icon" type="image/icon">

    <!--external css files-->
    <link href="css/css_common.css" rel="stylesheet" type="text/css">
    <link href="css/css_user.css" rel="stylesheet" type="text/css">
    <link href="css/css_admin.css" rel="stylesheet" type="text/css">

    <style>

    </style>

    <!--external js files-->
    <script src="js/js_common.js" type="text/javascript"></script>

    <script type="text/javascript">
    function confirm1(){
      if(confirm("Are you sure wanna continue?")){
          return true;
      }
      else
      {
          return false;
      }
    
    }
    </script>

    <script>
      function show_qty(no)
      {
        var res=no.split("|");
        document.getElementById('qty').innerHTML = res[1];
      }
   </script>


    <title>Library</title>
  </head>
  <body>
<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
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


<!--end of header -->

<!--profile details-->

<section id="userDetail">
  <div class=" jumbotron text-center">
  <div class=" text-center">
  <div>
   <h1 >My Profile</h1>
  </div>
  <?php
  echo '
  <a href="#"><img src="icons/avatar.jpg" alt="profile" id="profileimg" data-toggle="tooltip" data-placement="bottom" title="'.$name.'" > </a>'; ?>
  <br><br>
  <div style="padding-bottom:20px; margin-bottom:0">
    <p class="card-text">Name :<?php echo " ".$name;?> </p>
    <p class="card-text">Email ID :<?php echo " ".$email;?> </p>
    
    <a class="btn btn-success btn-lg" href="logout.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Logout">Log Out</a>
  </div>

  </div>
  </div>
</section>
<!--end of profile -->

<?php

    //database details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ziggride";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    $sql = "SELECT * FROM tblvehicle";
    $result = mysqli_query($conn,$sql);

?>

 <!-- functionalities -->
 <div id="fun" >
  <div class="row">
    <div class="col"> 
      <div class="center-block"> 
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseAdd" aria-expanded="false" aria-controls="collapseAdd">
      Add Car
      </button>
  </div>
    </div>  
    <div class="col"> 
      <div class="center-block"> 
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseRemove" aria-expanded="false" aria-controls="collapseRemove">
      Remove Car
      </button>
    </div>
  </div>
  <div class="col"> 
      <div class="center-block"> 
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseUpdate" aria-expanded="false" aria-controls="collapseUpdate">
      Update Book
      </button>
    </div>
  </div>
    <div class="col"> <div class="center-block"> 
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseDisplay" aria-expanded="false" aria-controls="collapseDisplay">
        Display Books
      </button>
    </div>
  </div>
  </div>
</div>

<div class="collapse" id="collapseAdd">
  <div id="c1" class="card card-body">
    <p>
    <form id="adminadd" name="adminadd" action="adminfun.php" method="post" onsubmit="return confirm1()">
    <div class="alert alert-primary text-center user-select-none" role="alert">
        Add New Book
      </div>
  <div class="form-group">
    <label for="bid">Vehicle Name</label>
    <input type="text" class="form-control" id="bid" name="bid" required autofocus>
  </div>
  <div class="form-group">
    <label for="bookname">Vehicle Brand</label>
    <input type="text" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Price Perday</label>
    <input type="text" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Fuel Type</label>
    <input type="text" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Model Year</label>
    <input type="text" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Seating Capacity</label>
    <input type="text" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Air Conditioner</label>
    <input type="checkbox" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">ABS</label>
    <input type="checkbox" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Power Steering</label>
    <input type="checkbox" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Airbag</label>
    <input type="text" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Power Windows</label>
    <input type="text" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Infotainment</label>
    <input type="checkbox" class="form-control" id="bname" name="bname" required>
  </div>
  <div class="form-group">
    <label for="bookname">Central Locking</label>
    <input type="checkbox" class="form-control" id="bname" name="bname" required>
  </div>
  
  <div class="text-center">
  <button type="submit" class="btn btn-success" name="addbtn" value="add" data-toggle="tooltip" data-placement="bottom" title="Add Book">Submit</button>
    </div>
</form>


    </p>
    </div>
</div>

<div class="collapse" id="collapseRemove">
  <div id="c2" class="card card-body">
    <p>

    <?php


        $sql = "SELECT * from tblvehicles";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0){
            echo "
      <form action=\"adminfun.php\" method=\"post\" name=\"adminremove\" id=\"adminremove\" onsubmit=\"return confirm1()\">
      <div class=\"alert alert-primary text-center user-select-none\" role=\"alert\">
        Remove Existing Book
      </div>
      <div class=\"form-group\">
      <label for=\"formbook\">Book Name</label>
          <select class=\"form-control\" id=\"removeselect\" name=\"removeselect\">";
          while($row = mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row['id'].">".$row['VehiclesTitle']."</option>";
            }
            echo '</select></div>
            <div class="text-center">
        <button type="submit" name="removebtn" value="remove" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Remove Book">Remove Book</button>
        </div>
      </form>
      ';
        }
        else
    {
        echo '<div class="alert alert-danger" role="alert">
        No Books Available
      </div>';
    }

      ?>

    
    </p>
    </div>
</div>

<div class="collapse" id="collapseUpdate">
  <div id="c3" class="card card-body">
    <p>
    <?php


        $sql = "SELECT bookid,bookname,quantity from book";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0){

            echo "
      <form action=\"adminfun.php\" method=\"post\" name=\"adminupdate\" id=\"adminupdate\" onsubmit=\"return confirm1()\">
      <div class=\"alert alert-primary text-center user-select-none\" role=\"alert\">
        Update Quantity
      </div>
        <div class=\"form-group\">
          <label for=\"formbook\">Book Name</label>
          <select class=\"form-control\" id=\"updateselect\" name=\"updateselect\" onChange=\" return show_qty(this.value)\">";
          while($row = mysqli_fetch_assoc($result))
            {
                echo "<option value=".$row['bookid']."|".$row['quantity'].">".$row['bookname']."</option>";
            }
            echo '</select></div>
            <div>
            <p> Available Quantity: <span id="qty"></span></p>
            <p>
            <div class="row">
            <div class="col-sm-3">
            <label for="addq">Add</label></div>
            <div class="col-sm-3">
            <input type="number" id="addq" name="addq" min="0" value="0"></div></div>

            <div class="row">
            <div class="col-sm-3">
            <label for="removeq">Remove</label></div>
            <div class="col-sm-3">
            <input type="number" id="removeq" name="removeq" min="0" value="0"></div></div>
            </p>
          
        </div>
        <div class="text-center">
        <button type="submit" name="updatebtn" value="update" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Update">Update Book</button>
        </div>
      </form>
      ';


        }
        else
    {
        echo '<div class="alert alert-danger" role="alert">
        No Books Available
      </div>';
    }
    ?>
    </p>
    </div>
</div>

<div class="collapse" id="collapseDisplay">
  <div id="c4" class="card card-body">
    <p>
    <?php 
      $sql = "SELECT * FROM  tblvehicles";
      $result = mysqli_query($conn,$sql);

      if (mysqli_num_rows($result) > 0) {

        $str= "<div class=\"alert alert-dark text-center user-select-none\" role=\"alert\">
        Books Available
        </div>
        <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover table-bordered table-dark\">
        <thead>
          <tr>
            <th scope=\"col\">Id</th>
            <th scope=\"col\">Vehicle Name</th>
            <th scope=\"col\">Vehicle Brand</th>
            <th scope=\"col\">Price Perday</th>
            <th scope=\"col\">Fuel Type</th>
            <th scope=\"col\">Model Year</th>
            <th scope=\"col\">Seating Capacity</th>
            <th scope=\"col\">Air Conditioner</th>
            <th scope=\"col\">ABS</th>
            <th scope=\"col\">Power Steering</th>
            <th scope=\"col\">Airbag</th>
            <th scope=\"col\">Power Windows</th>
            <th scope=\"col\">Infotainment</th>
            <th scope=\"col\">Central Locking</th>

          </tr>
        </thead>
        <tbody>
                ";
        echo $str;

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td><a href='display.php?name='".$row['id']."''><img src='assets/images/".$row['Vimage1']."' alt='car1' style='width:75%;height:auto'></a></td>
            <th scope=\"row\">".$row["id"]."</th><td>".$row["VehiclesTitle"]."</td><td>".$row["VehiclesBrand"]."</td><td>".$row["PricePerDay"]."</td><td>".$row['FuelType']."</td><td>".$row['ModelYear']."</td><td>".$row['SeatingCapacity']."</td><td>".$row['AirConditioner']."</td><td>".$row['AntiLockBrakingSystem']."</td><td>".$row['PowerSteering']."</td><td>".$row['DriverAirbag']."</td><td>".$row['PowerWindows']."</td><td>".$row['CDPlayer']."</td><td>".$row['CentralLocking']."</td></tr>";

            
          }
          echo "  </tbody> </table></div>";

      }
      else {
        echo '<div class="alert alert-danger" role="alert">
        NO BOOKS BORROWED!
      </div>';
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
  </body>
</html>