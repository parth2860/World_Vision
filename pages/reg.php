<?php

session_start();
error_reporting(0);


$con= new mysqli('localhost','root','','db');
  
	
 

    if (isset($_POST['reg'])) {
      $fname = $_POST['fname'];
	    $lname = $_POST['lname'];
      $email = $_POST['email'];
      $user = $_POST['user'];
	    $gen = $_POST['gen'];
      $dob = $_POST['dob'];
      $mno = $_POST['mno'];
      $pass = $_POST['pass'];
      

      // sql query
      $sql= "insert into users (fname,lname,username,email,gender,dob,mno,pass) values('$fname','$lname','$user','$email','$gen','$dob','$mno','$pass')";
      
      // execute query
    if($con->query($sql) == TRUE)
		{
		header('location:./log.php');
		}
		else
		{
		header('location:./reg.php');
		}  

}
?>
<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Vision</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="../assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="../assets/vendors/aos/dist/aos.css/aos.css" />
    <link
      rel="stylesheet"
      href="../assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="../assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css"
    />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- endinject -->
  </head>
  <style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

  <body>
    <div class="container-scroller">
      <header id="header">
        <div class="container">
          <!-- partial:../partials/_navbar.html -->
          <nav class="navbar navbar-expand-lg navbar-light">
              <div class="d-flex justify-content-between align-items-center navbar-top">
                <ul class="navbar-left">
                  <li>
                  <?php
                    echo date('l, M d, Y') ;
                  ?>
                  </li>
                  </li>
                  <li></li>
                </ul>
                <div>
                  <a class="navbar-brand" href="#"
                    ><img src="../assets/images/logo.svg" alt=""
                  /></a>
                </div>
                <div class="d-flex">
                  <ul class="navbar-right">
                    <li>
                      <a href="./reg.php">REGISTRATION</a>
                    </li>
                    <li>
                      <a href="./log.php">LOGIN</a>
                    </li>
                  </ul>
                  
                </div>
              </div>
              <div class="navbar-bottom-menu">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div
                  class="navbar-collapse justify-content-center collapse"
                  id="navbarSupportedContent"
                >
                  <ul
                    class="navbar-nav d-lg-flex justify-content-between align-items-center"
                  >
                    <li>
                      <button class="navbar-close">
                        <i class="mdi mdi-close"></i>
                      </button>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link active" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./world.php">World</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./author.php">Local</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./news-post.php">Tech</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./business.php">Games</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./sports.php">Sports</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./art.php">Entertainment</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./politics.php">Politics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./aboutus.php">About Us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

          <!-- partial -->
        </div>
      </header>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="text-center">
              <h1 class="text-center mt-5">
                REGISTRATION
              </h1>
              <p class="text-secondary fs-15 mb-5 pb-3">
                IF YOU ARE ALREADY REGISTERED THEN <a href="./log.php">LOGIN</a> HERE.
              </p>
            </div>
          </div>
        </div>
        <div class="contact-wrap">
          <div class="row">
            <div class="col-lg-12  mb-5 mb-sm-4">
              <form method="post">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" style="p.outset {border-style: outset;}"><label><b>First Name </b></label>
                      <input
                        type="text"
                        name="fname"
                        class="form-control"                                             
                        placeholder="First Name"
                      />
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group"><label><b>Last Name </b></label>
                      <input
                        type="text"
                        name="lname"
                        class="form-control"               
                        placeholder="Last Name"
                      />
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group"><label><b>Gender </b></label>
                    <select class="form-control" name="gen">
                                                  <option value="">- Choose Gender -</option>
                                                  <option value='Male'>Male</option>
                                                  <option value='Female'>Female</option>
                                                  <option value='Other'>Other</option>
                                                </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group"><label><b>Date Of Birth </b></label>
                      <input
                        type="date"
                        name="dob"
                        placeholder="Date of Birth"
                        class="form-control"               
                      />
                    </div>
                  </div>
                </div>

                

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group"><label><b>Username</b> </label>
                      <input
                        type="text"
                        name="user"
                        class="form-control"                        
                        placeholder="Enter User Name"
                      />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group"><label><b>Email</b> </label>
                      <input
                        type="text"
                        name="email"
                        class="form-control"                        
                        placeholder="Enter Email"
                      />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group"><label><b>Mobile no </b></label>
                      <input
                        type="text"
                        name="mno"
                        class="form-control"                        
                        placeholder="Enter Mobile No."
                      />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label><b>Password</b> </label>
                      <input
                        type="password"
                        name="pass"
                        class="form-control"                        
                        placeholder="Enter Password"
                      />
                    </div>
                  </div>
                </div>

                
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <button class="btn btn-lg btn-dark font-weight-bold" name="reg">REGISTRATION</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- container-scroller ends -->
    <!-- partial:../partials/_footer.html -->
    <footer>
          <div class="container">
            
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-between">
                  <img src="../assets/images/logo.svg" class="footer-logo" alt="" />

                  <div class="d-flex justify-content-end footer-social">
                    <h5 class="m-0 font-weight-600 mr-3 d-none d-lg-flex">Follow on</h5>
                    <ul class="social-media">
                      <li>
                        <a href="#">
                          <i class="mdi mdi-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-youtube"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-linkedin"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div
                  class="d-lg-flex justify-content-between align-items-center border-top mt-5 footer-bottom"
                >
                  <ul class="footer-horizontal-menu">
                    <li><a href="#">Terms of Use.</a></li>
                    <li><a href="#">Privacy Policy.</a></li>
                    <li><a href="#">Accessibility & CC.</a></li>
                    <li><a href="#">AdChoices.</a></li>
                    <li><a href="#">Advertise with us Transcripts.</a></li>
                    <li><a href="#">License.</a></li>
                    <li><a href="#">Sitemap</a></li>
                  </ul>
                  <p class="font-weight-medium">
                    © 2020 <a href="https://www.bootstrapdash.com/" target="_blank" class="text-dark">@ BootstrapDash</a>, Inc.All Rights Reserved.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </footer>

    <!-- partial -->
    <!-- inject:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../assets/vendors/aos/dist/aos.js/aos.js"></script>
    <script src="../assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../assets/js/demo.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
