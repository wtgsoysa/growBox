<?php 
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
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
                
          </div>
        </div>
      </nav>
    </div>
  </div>
   
  <!-- PROFILE PAGE START BY HERE-->

  <div class="container">
    <div class="row">
      <div class="col-md-6 colum1" >
        <div class="columextra1">

        
        <!--Profile details-->
        <!-- content start -->
          <div class="space-tab-100">

            <div class="ProfileTabTopMargin"></div>
              <div class="P-DisplayPictureDiv text-center">
          
                  <?php 
                  // Check if the profile picture exists
                  if (!empty($user_data['profilepicture']) && file_exists($user_data['profilepicture'])) {
                      $profilepicture = $user_data['profilepicture'];
                  } else {
                      $profilepicture = 'default.png'; // Provide a default picture path or use a placeholder
                  }
                  ?>
                  
                  <div class="Profile">
                    <!--img src="<?php echo $profilepicture; ?>" alt="Profile Picture" class="P-DisplayPicture"-->
                   <img src="\images\urban-farmer.jpg" alt="Profile Photo" class="P-DisplayPicture">

                   

                  </div>
                  
                  
          
                  <div class="P-text mt-5">
                  <span class="profiletag1"> Username : </span>
                      <span class="Pnamephp">
                         <span class="Pnamephp">
                        <?php echo $user_data['username']; ?>
                        </span> <br><br> 

                  <span class="profiletag2"> Email : </span>
                        <span class="Pnamephp">
                           <span class="Pnamephp">
                          <?php echo $user_data['email']; ?>
                          </span> <br> <br>
                  <span class="profiletag3"> First Name : </span>
                      <span class="Pnamephp">
                        <?php echo $user_data['firstname']; ?>
                        </span> <br> <br>
                      
                  <span class="profiletag4"> Last Name : </span>
                      <span class="Pnamephp">
                        <?php echo $user_data['lastname']; ?>
                        </span> <br> <br>
                        
                  <span class="profiletag5"> Mobile : </span>
                      <span class="Pnamephp">
                        <?php echo $user_data['mobile']; ?>
                        </span> <br> <br>
          
                  <span class="profiletag6"> Address : </span>
                      <span class="Pnamephp">
                        <?php echo $user_data['address']; ?>
                        </span> <br>
              
                      
                      
          
                        
                    
                    
                

              </div>
              
              </div>  
          </div>


  
            

      <!-- logout button -->
      <div class="logout">
        <a href="logout.php" target="_blank">
          <button class="D-Button-Primary text-center mt-5" type="submit">
            LogOut
          </button>
        </a>

      </div>
    </div>
  </div>
  <div class="col-md-6 colum2">  
    <div class="columextra2">
    <h1 class="order3">Order History</h1>
                
                  
  </div>
</div>
</div>
</div>
<!-- content end -->