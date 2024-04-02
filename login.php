<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{

			//read from database
			$query = "SELECT * FROM users WHERE username = ?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows === 1) {
        $user_data = $result->fetch_assoc();
        $stored_password = $user_data['password'];

        // Verify password without hashing
        if ($password === $stored_password) {
            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location: profile.php");
            die;
        } else {
            echo "Wrong username or password!";
        }
    } else {
        echo "Wrong username or password!";
    }
		}else
		{
			echo "wrong username or password!";
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
     <form method="post" >
        <div class="row">
            <div class="col-md-6">
                <h3 class="T-LoginText1 mb-3">Login To Your Account</h3>
                
                <h6 class="T-LoginText2 ">Enter Your Login Details</h6>
                <div class="login">

                
                <div class="form__group field">
                  <input type="input" class="form__field " placeholder="Password" name="username" required="">
                  <label for="name" class="form__label ">Username</label>
                </div><br>

                <div class="form__group field">
                  <input type="input" class="form__field " placeholder="Password" name="password" required="">
                  <label for="name" class="form__label ">Password</label>
                </div>



               <div class="btn ">
                <div class="d-flex1 justify-content-center">
                  <!-- IDs added to the links for JavaScript to reference -->
                    <a id="account-button" href="#" >
                        <button class="D-Button-Primary text-center " type="submit">
                            Login
                        </button>
                    </a>
                </div>
              </div>
              <div class="createAcc">
                <p>
                  <span class="account">
                    Don't have an account ?
                  </span>
                  <span class="create">
                    <a href="signup.php" class="cre">Create Account</a>
                  </span>
                </p>
              </div>

              
            </form>      

          </div>
                
                

        </div>
            <div class="col-md-6">
                <div class="logingImage text-center" >
                    <img src="\images\Mask group.png" alt="Logo" class="T-logingImg " >
                </div>
                
                
            </div>
        </div>
    
    </div>

  </div>
  

  