<?php 
  session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
    $userId = $_SESSION['userId'];
    $username = $_SESSION['username'];
  }
  else{
    $loggedin = false;
    $userId = 0;
  }
?>

<style>
  .upper-nav {
      font-family: "poppins", sans-serif;
      font-size: 12px;
  }

  .upper-nav a {
      color: white;
      margin: 0px 3px;
  }

  .navbar {
      font-family: "poppins", sans-serif;
      background: white;
      height: 80px;
      box-shadow: 5px 5px 10px 2px #d3d3d3;
  }

  .navbar .container-fluid {
      margin: 0px 90px;
  }

  .navbar-brand img {
      width: 140px;
  }

  .location-div {
      font-size: 0.95rem;
  }

  .location-text {
      font-size: 0.75rem;
  }

  .icon {
      color: #ff6e0c;
  }

  .btn-line {
      height: 40px;
      border-left: 1px solid #f5c09c;
  }

  .brand-before {
      display: none;
  }

  .location-div .fa-caret-down {
      display: none;
  }

  @media screen and (max-width: 900px) {
      .navbar-brand {
          display: none;
      }
      .brand-before {
          display: flex;
      }
      .brand-before img {
          width: 60px;
      }
      .navbar .container-fluid {
          margin: 0px 0px;
      }
      /*.fa-circle-user {
          color: black;
      }*/
      .nav-btn {
          padding: 8px !important;
      }
      .location-div .icon {
          display: inline;
      }

      .fa-location-dot {
          font-size: 18px !important;
      }
      .location-div {
          font-size: 0.80rem;
      }

  }


  @media screen and (max-width: 468px) {
      .nav-btn, .btn-cart {
        font-size: 8px;
        margin: 2px !important;
        padding: 2px !important;
      }
      .fa-location-dot {
          font-size: 18px !important;
      }
      .fa-magnifying-glass {
          font-size: 18px !important;
      }
      .fa-truck {
          font-size: 18px !important;
      }
      .fa-circle-user {
          font-size: 18px !important;
      }
      .fa-cart-shopping {
          font-size: 18px !important;
      }
      .location-div {
          font-size: 0.80rem;
      }
      .location-text {
          font-size: 0.60rem;
      }

  }

  @media screen and (max-width: 365px) {
      .dropdown-toggle {
        margin: 0px !important;
        padding: 0px !important;
      }
      .brand-before img {
          width: 40px;
      }
      .location-div {
          font-size: 0.75rem;
      }
      .location-text {
          font-size: 0.65rem;
      }
      .nav-btn {
          padding: 2px !important;
      }
  }


</style>

<div class="full-nav w-100 sticky-top">
        <div class="container-fluid d-inline-block text-center p-2 bg-danger text-light upper-nav">For events, inquiries &
            bulk orders please contact us on <a href="mailto:info@dunkindonuts.pk">info@dunkindonuts.pk</a> / <a href="tel:+923060185803">+92 306 0185803</a></div>
        <nav class="navbar">
            <div class="container-fluid justify-content-between">
                <div class="navbar-location d-flex align-items-center gap-2">
                    <a href="index.php" class="navbar-brand brand-before m-0"><img src="img/brand.jpg" alt="logo"></a>
                    <i class="fa-solid fa-location-dot fs-3 icon"></i>
                    <div class="location-div">
                        Deliver to<i class="fa-solid fa-caret-down icon px-2" style="color: black"></i>
                        <div class="location-text">
                            PECHS - Block 3, ...
                        </div>
                    </div>
                </div>
                <a href="index.php" class="navbar-brand"><img src="img/brand.jpg" alt="logo"></a>
                <div class="d-flex">

                    <button class="btn nav-btn px-3" type="submit" data-toggle="modal" data-target="#searchModal"><i class="fa-solid fa-magnifying-glass fs-5 icon"></i></button>
                    <span class="btn-line"></span>

                    <a href="viewOrder.php"><button class="btn nav-btn px-3" type="button"><i class="fa-solid fa-truck fs-4 icon"></i></button></a>
                    <span class="btn-line"></span>

                    <?php
                      $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
                      $countresult = mysqli_query($conn, $countsql);
                      $countrow = mysqli_fetch_assoc($countresult);      
                      $count = $countrow['SUM(`itemQuantity`)'];
                      if(!$count) {
                        $count = 0;
                    }

                    if($loggedin){
                      echo '
                      <div class="text-center">
                        <a href="viewProfile.php"><button class="btn nav-btn" style="padding-right:0px;"><i class="fa-solid fa-circle-user fs-4 icon"></i></button></a>
                      </div>
                      <div class="dropdown show">
                        <a class="icon dropdown-toggle mx-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="partials/_logout.php">Logout</a
                        </div>
                      </div>
                      ';
                    }
                    else { 
                    ?>

                    <button class="btn nav-btn px-3" type="button" data-toggle="modal" data-target="#loginModal"><i class="fa-solid fa-circle-user fs-4 icon"></i></button>

                    <?php } ?>
                    <span class="btn-line line-2"></span>
                    <a href="viewCart.php"><button class="btn px-3 btn-cart" type="submit"><i class="fa-solid fa-cart-shopping fs-4 icon"></i><?php echo ' ( '.$count.' )' ?></button></a>
                </div>
            </div>
        </nav>
    </div>

<?php
  include 'partials/_searchModal.php';
  include 'partials/_loginModal.php';
  include 'partials/_signupModal.php';

  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You can now login.
            <button type="button" class="bg-danger" style="border-radius:5px; border:none; padding: 5px 5px 0px 5px; " data-dismiss="alert"><span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span></button>
          </div>';
  }
  if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> ' .$_GET['error']. '
            <button type="button" class="bg-danger" style="border-radius:5px; border:none; padding: 5px 5px 0px 5px; " data-dismiss="alert"><span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span></button>
          </div>';
  }
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in
            <button type="button" class="bg-danger" style="border-radius:5px; border:none; padding: 5px 5px 0px 5px; " data-dismiss="alert"><span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span></button>
          </div>';
  }
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Invalid Credentials
            <button type="button" class="bg-danger" style="border-radius:5px; border:none; padding: 5px 5px 0px 5px; " data-dismiss="alert"><span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span></button>
          </div>';
  }
?>

