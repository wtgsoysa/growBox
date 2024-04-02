<?php
session_start();
$userLoggedIn = isset($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GrowBox </title>

    <!-- Link bootstrap files --> 
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.js" > </script>

    <!-- bootstrap cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>

    <!-- Fav Icon -->
    <link rel="icon" href="/images/fav_icon.png" />

    <!-- Link style sheets -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Remix icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" />

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">


</head>

<body class="container">

    <!-- Nav Bars start -->
  <div class="container-fluid">
    <div class="container fixed-top">
      <nav class="navbar navbar-expand-lg bg-body-tertiary px-4 py-0 mt-4 d-NavContainerFluid">
        <a class="navbar-brand" href="/index.html">
          <img src="/images/Logo.svg" alt="MainLogo" class="main-logo"  width="200px" height="55px" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link D-Active" href="/index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Packages</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>

          <div class="d-flex justify-content-center g-4">
              <!-- IDs added to the links for JavaScript to reference -->
                <a id="account-button" href="login.php" >
                    <button class="D-Button-Primary text-center ">
                        Login
                    </button>
                </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- NavBar end -->



  <!-- Head Titles section -->
  <div class="container A-title-head-section">
    <div class="row">
      <div class="col">

        <p class="A-SubTitle-text center-text"> Cultivate City Life </p>
        <p class="A-Title-text center-text"> Sprout & Thrive: Empowering </p>
        <p class="A-Title-text center-text"> Urban Gardeners </p>

      </div>
    </div>
  </div>

  <div class="container A-title-head-section head-para">
    <div class="row">
      <div class="col-md-6 offset-md-3 center-text">

        <p class="A-Title-Para center-text "> "Welcome to growBox, where urban farming meets innovation. Discover the joy of growing your own food in the heart of the city. Explore our resources, tutorials, and personalized recommendations to cultivate thriving gardens in urban spaces. Let's green up our cities together!". </p>


      </div>
    </div>
  </div>
  <!-- End Head Titles section -->



  


    











<!--Link script sheets -->
<script src="/js/script.js" > </script>

</body>
</html>