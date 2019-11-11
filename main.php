<?php
session_start();
/*session_destroy();
unset($_SESSION['emailid']);
unset($_SESSION['pass']);*/
if(isset($_POST["search"])){
  $search1=$_POST['search1'];
  $_SESSION['search1']=$search1;
}
if(isset($_SESSION['emailid']) && $_SESSION['pass']){
$url = "signin.php";
header('Location:'.$url);
}
else if(isset($_POST["signin"])){
$emailid=$_POST['emailid'];
$pass=$_POST['pass'];
$_SESSION['emailid']=$emailid;
$_SESSION['pass']=$pass;
$url = "./signin.php";
header('Location:'.$url);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <title>
    Team-7.kart
  </title>

</head>
<body>
<div class="container">
  <!-- Home Page begins here -->
  <!-- Navigation bar -->
    <nav class="navbar navbar-light bg-light ">
      <!-- Categorywise shopping -->
        <div class="btn-group">
          <button type="button" class="btn btn-danger">Categories</button>
             <button class="btn btn-danger dropdown-toggle dropdown-toggle-split" type="button" id="categoryButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </button> 
          <div class="dropdown-menu">
            <a class="dropdown-item" href="./electronics.php">Electronics</a><div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Fashion</a><div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Sports</a>
        </div>
      </div>
      <!-- Name of the website -->
        <a class="nav-link active" href="./main.php"><h4>Team 7.kart</h4></a>
        <!-- Search box to search products by details -->
        <form class="form-inline" action="./search.php" method="post">
         <div class="form-group">
           <input class="form-control mr-sm-2" type="search" name="search1" placeholder="What's on your mind" aria-label="Search" >
         </div>
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search"  >Search</button>
        </form>
        <!-- User login details / Sign Up, Sign In details -->
        <div class="btn-group">
            <button type="button" class="btn btn-danger">Sign In/Sign Up</button>
             <button class="btn btn-danger dropdown-toggle dropdown-toggle-split" type="button" id="categoryButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </button> 
            <div class="dropdown-menu">
              <form class="px-4 py-3" action="./main.php" method="post">
              <div class="form-group">
                  <label for="exampleDropdownFormEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="emailid">
              </div>
            <div class="form-group">
                <label for="exampleDropdownFormPassword1">Password</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="pass">
             </div>
   <!--           <div class="form-group">
               <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">
                    Remember me
                   </label>
                 </div>
            </div> -->
            <button type="submit" class="btn btn-primary" name="signin">Sign in</button>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./signup.php">New around here? Sign up</a>
            <a class="dropdown-item" href="#">Forgot password?</a>
      </div>
      </div>
      <!-- Order View Button(Functional only when user is logged in) -->
      <button type="button" class="btn btn-secondary " disabled>Orders</button>
      <!-- Cart Item View Button( Functional only when user is logged in) -->
      <button type="button" class="btn btn-secondary " disabled>Cart</button>
    </nav>
</div>

<!-- Navigation bar ends here -->
<!-- Beginning of the carousel section -->
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
<!-- Beginning of the carousel item section i.e., for the sports category -->
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="./photos/cricket.jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <div class="card-deck mt-4">
        <!-- Card made for Recent Order Section -->
        <div class="col-sm-4">
         <div class="card" >
        <img class="card-img-top" src="./photos/cart.png" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><p class="bg-light text-dark">Recent Orders</p></h5>
        <p class="card-text"><p class="bg-light text-dark">No orders to show</p>
        <a href="#" class="btn btn-primary">Go to Orders</a>
        </div>
     </div>
    </div>
<!-- Card made for Recently Viewed Section -->
    <div class="col-sm-4">
         <div class="card" >
        <img class="card-img-top" src="./photos/blank.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><p class="bg-light text-dark">Recently Viewed</p></h5>
        <p class="card-text"><p class="bg-light text-dark">Nothing up here</p>
        </div>
     </div>
    </div>
    </div>
      </div>
    </div>
<!-- End of Carousel First Section and beginning of the other -->
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="./photos/laptop.jpg"
          alt="Second slide">
        <div class="mask rgba-black-light"></div>
        </div>
        <div class="carousel-caption">
    <div class="card-deck mt-4">
        <!-- Card made for Recent Order Section -->
        <div class="col-sm-4">
         <div class="card" >
        <img class="card-img-top" src="./photos/cart.png" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><p class="bg-light text-dark">Recent Orders</p></h5>
        <p class="card-text"><p class="bg-light text-dark">No orders to show</p>
        <a href="#" class="btn btn-primary">Go to Orders</a>
        </div>
     </div>
    </div>
<!-- Card made for Recently Viewed Section -->
    <div class="col-sm-4">
         <div class="card" >
        <img class="card-img-top" src="./photos/blank.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><p class="bg-light text-dark">Recently Viewed</p></h5>
        <p class="card-text"><p class="bg-light text-dark">Nothing up here</p>
        </div>
     </div>
    </div>
    </div>
      </div>
    </div>
<!-- End of Carousel First Section and beginning of the other -->
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="./photos/laptop1.jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">

        <div class="card-deck mt-4">
        <!-- Card made for Recent Order Section -->
        <div class="col-sm-4">
         <div class="card" >
        <img class="card-img-top" src="./photos/cart.png" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><p class="bg-light text-dark">Recent Orders</p></h5>
        <p class="card-text"><p class="bg-light text-dark">No orders to show</p>
        <a href="#" class="btn btn-primary">Go to Orders</a>
        </div>
     </div>
    </div>
<!-- Card made for Recently Viewed Section -->
    <div class="col-sm-4">
         <div class="card" >
        <img class="card-img-top" src="./photos/blank.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><p class="bg-light text-dark">Recently Viewed</p></h5>
        <p class="card-text"><p class="bg-light text-dark">Nothing up here</p>
        </div>
     </div>
    </div>
    </div>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<!-- Ending of the carousel section -->
</body>
</html>
