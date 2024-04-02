<?php 
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    

    $profilePicture = ''; 

    if (!empty($_FILES['profilepicture']['name'])) {
      $target_directory = "uploads/";
      $target_file = $target_directory . basename($_FILES["profilepicture"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["profilepicture"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file)) {
              $profilePicture = $target_file; // Set profile picture path
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
  }

    // Ensure form fields are not empty
    if (!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($mobile) && !empty($address) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $user_id = generateRandomString(20);

        // No hashing, storing plain text password
        $plain_password = $password;

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO users (user_id, username, password, email, firstname,lastname,mobile,address ,profilepicture) VALUES (?, ?, ?, ?,?,?,?,?,?)");
        
        // Bind parameters
        $stmt->bind_param("sssssssss", $user_id, $username, $plain_password, $email,$firstname,$lastname,$mobile,$address ,$profilePicture);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Please enter valid information!";
    }
}
?>


























<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> GrowBox </title>

  <!-- Link bootstrap files -->
  <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"> </script>

  <!-- bootstrap cdn-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
          <img src="/images/Logo.svg" alt="MainLogo" class="main-logo" width="200px" height="55px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link D-Active" href="/index.html">Home</a>
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
  <!-- NavBar end -->

  <!-- Login start here-->
  <div class="T-logingMargin">
    <div class="container">
      <form method="post" enctype="multipart/form-data" class="col-12 col-md-5 col-lg-6">
        <div class="row">
          <div class="col-md-6">
            <h3 class="T-SingupText1 mb-3">Create Account</h3>

            <h6 class="T-SingupText2 ">Hey,Enter Your Details To Create Your Account</h6>
            <div class="login">


              <div class="form__group field2">
                <input type="input" class="form__field2 " placeholder="First Name" name="firstname" required="">
                <label for="name" class="form__label2 ">First Name</label>
              </div>

              <div class="form__group field2">
                <input type="input" class="form__field2 " placeholder="Last Name" name="lastname">
                <label for="name" class="form__label2 ">Last Name</label>
              </div>

              <div class="form__group field2">
                <input type="input" class="form__field2 " placeholder="Mobile" name="mobile">
                <label for="name" class="form__label2 ">Mobile</label>
              </div>

              <div class="form__group field2">
                <input type="input" class="form__field2 " placeholder="Address" name="address">
                <label for="name" class="form__label2 ">Address</label>
              </div>


            </div>

            <div class="form__group field2">
              <input type="input" class="form__field2 " placeholder="Username" name="username" required="">
              <label for="name" class="form__label2 ">Username</label>
            </div>

            <div class="form__group field2">
              <input type="input" class="form__field2 " placeholder="Email" name="email">
              <label for="name" class="form__label2 ">Email</label>
            </div>

            <div class="form__group field2">
              <input type="input" class="form__field2 " placeholder="Password" name="password" required="">
              <label for="name" class="form__label2 ">Password</label>
            </div>
            <!-- profile picture -->
            <div class="mb-4">
              <label for="password" class="form-label21">
                <span class="j-SearchBarLabel">Profile Picture <span class="j-redStarMark">*</span></span>
              </label>
              <br>
              <input type="file" class="file" name="profilepicture">
            </div>

            <!-- checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label j-SearchBarLabel" for="flexCheckDefault">
                Agree with Privacy Policies
              </label>
            </div>







            <div class="btn ">
              <div class="d-flex1 justify-content-center">
                <!-- IDs added to the links for JavaScript to reference -->
                <a id="account-button" href="#">
                  <button class="D-Button-Primary2 px-4 text-center" type="submit">
                    Create Account
                  </button>
                </a>
              </div>
            </div>



          </div>




          <div class="col-md-6">
            <div class="logingImage text-center">
              <img src="\images\Mask groupR.png" alt="Logo" class="T-singupImg ">
            </div>

            


          </div>
    </div>
  </div>
  </form>
  </div>

  </div>