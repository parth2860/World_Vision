<?php
  // Create database connection
  session_start();
  error_reporting(0);
  $con = mysqli_connect("localhost", "root", "", "db");
  //insert category
  if (isset($_POST['up'])){ 
  $name =$_POST['name'];
  $email =  $_POST['email'];
  $subject =  $_POST['subject'];
  //$message = $_POST['message'];
  $message = mysqli_real_escape_string($con, $_POST['message']);
  $sql="INSERT INTO `feedback`( `username`, `email`, `topic`, `feed`) VALUES ('$name','$email','$subject','$message')";
  /*$result=mysqli_query($db, $sql);}
  mysqli_close($db);*/
  if (mysqli_query($con, $sql)) {
    echo "your message is stored  successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  
  mysqli_close($con);
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
                <?php
                
                if($_SESSION['user']==true ){
                  $user = $_SESSION['user'];

                  $psql="SELECT * FROM users where email='$user'  ";
                  $result = mysqli_query($con, $psql);
                  $row = mysqli_fetch_assoc($result); 
                  
                
                echo '<div class="dropdown">
                <img class="rounded-circle" src="../admin/post/'.$row['dp'].'"  class="rounded-circle" width="50" height="50">
                <span class="username">'.$row['fname'].' '.$row['lname'].'</span>
                  <div class="dropdown-content">
                  <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="../pages/profile.php">My Profile</a>
              </li>
              <li>
                <a href="../pages/logout.php"><i class="../icon_key_alt"></i> Log Out</a>
              </li>
                  </div>
                </div>
                ';
                }
                else{
               
                  header('location:log.php');
                      //<a href="../pages/log.php">LOGIN</a>
                   
               
                }
                
              ?>
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
                      <a class="nav-link" href="./art.php">	Entertainment</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./politics.php">Politics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./aboutus.php">AboutUs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./contactus.php">ContactUs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./feedback.php">Feedback</a>
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
                Feed back
              </h1>
              <p class="text-secondary fs-15 mb-5 pb-3">
                give us chance to bulid  services better 
              </p>
            </div>
          </div>
        </div>
        <div class="contact-wrap">
          <div class="row">
            <div class="col-lg-6  mb-5 mb-sm-2">
                    <!--start form -->
              <form method="post">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>  Username</label>
                      <input
                        type="text"
                        class="form-control"
                        name="name"
                        aria-describedby="name"
                        placeholder="Name *"
                      />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                    <label>  Email</label>
                      <input
                        type="email"
                        class="form-control"
                        name="email"
                        aria-describedby="email"
                        placeholder="Email *"
                      />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                    <label> Topic need to look after</label>
                      <input
                        type="text"
                        class="form-control"
                        name="subject"
                        aria-describedby="Subject"
                        placeholder="Subject"
                      />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                    <label> Suggetion </label>
                      <textarea
                        class="form-control textarea"
                        placeholder="Message"
                        name="message"
                      ></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      
                      <button   class="btn btn-lg btn-dark font-weight-bold" name="up" >SUBMIT</button>
                    </div>
                  </div>
                </div>
              </form>
                      <!--end form -->
            </div>
            <div class="col-lg-6 mb-2 mb-lg-2">
              <div class="contact-right-padding">
                <div class="row">
                  <div class="col-sm-12  mb-2 mb-lg-2">
                    <h1>user review</h1>
                    <p class="mb-4 fs-15">
                     show us what your view  about our product/services/site
                    </p>
                    <img
                  src="../assets/images/travel/User-review.jpg"
                  class="img-fluid"
                  alt="world-news" width="700" height="700"
                />
                  </div>
                </div>
              </div>
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
