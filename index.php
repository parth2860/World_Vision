<?php
session_start();
error_reporting(0);


$con = mysqli_connect("localhost", "root", "", "db");

?>  
<?php

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
      href="./assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="./assets/vendors/aos/dist/aos.css/aos.css" />
    <link
      rel="stylesheet"
      href="./assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="./assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css"
    />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">

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
      <div class="main-panel">
        <header id="header">
          <div class="container">
            <!-- partial:partials/_navbar.html -->
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
                    ><img src="assets/images/logo.svg" alt=""
                  /></a>
                </div>
                <?php
                
                if($_SESSION['user']==true ){
                  $user = $_SESSION['user'];

                  $psql="SELECT * FROM users where email='$user'  ";
                  $result = mysqli_query($con, $psql);
                  $row = mysqli_fetch_assoc($result); 
                  
                
                echo '<div class="dropdown">
                <img class="rounded-circle" src="admin/post/'.$row['dp'].'"  class="rounded-circle" width="50" height="50">
                <span class="username">'.$row['fname'].' '.$row['lname'].'</span>
                  <div class="dropdown-content">
                  <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="pages/profile.php">My Profile</a>
              </li>
              <li>
                <a href="pages/logout.php"><i class="../icon_key_alt"></i> Log Out</a>
              </li>
                  </div>
                </div>
                ';
                }
                else{
                  echo '<div class="d-flex">
                  <ul class="navbar-right">
                    <li>
                      <a href="pages/reg.php">REGISTRATION</a>
                    </li>
                    <li>  
                      <a href="pages/log.php">LOGIN</a>
                    </li>
                  </ul>
                  
                </div>';}
                
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
                      <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/world.php">World</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/author.php">Local</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/news-post.php">Tech</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/business.php">Games</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/sports.php">Sports</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/art.php">Entertainment</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/politics.php">Politics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/aboutus.php">About Us</a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>

            <!-- partial -->
          </div>
        </header>
        <div class="container">
          <div class="banner-top-thumb-wrap">
            <div class="d-lg-flex justify-content-between align-items-center">
              
            </div>
          </div>
          
          <?php
     // $sql = "SELECT * FROM headline order by id DESC";
      //$result = mysqli_query($db, $sql);
     // $data = mysqli_fetch_assoc($result);
      ?>
          <div class="row" align="center">
            <div class="col-lg-6"> 
              <div class="owl-carousel owl-theme" id="main-banner-carousel">
              <?php 
             $usql = "SELECT * FROM headline order by id DESC limit 6";
                 
             $r3 = $con->query($usql);
             if($r3->num_rows > 0){
               while($row = $r3->fetch_assoc())
               
               {echo'
                <div class="item">
                  <div class="carousel-content-wrapper mb-2">
                    <div class="carousel-content">
                      <h1 class="font-weight-bold">
                      '.$row['title'].'
                      </h1>
                      <h5 class="font-weight-normal  m-0">
                      '.$row['text'].'
                      </h5>
                     
                    </div>
                    <div class="carousel-image">
                      <img src="admin/image/'.$row['image'].'" height="300"  />
                    </div>
                  </div>
                </div>
                ';
              }
            }
              ?>
                
                

                

                

              </div>
            </div>
            <!--heading-->
           
            <div class="col-lg-6">
              <div class="row">
             
              <?php 
             $usql = "SELECT * FROM headline order by id DESC limit 6 ";
                 
             $r3 = $con->query($usql);
             if($r3->num_rows > 0){
               while($row = $r3->fetch_assoc())
               
               {echo'
                <div class="col-sm-6">
                  <div class="py-3 border-bottom">
                    <div class="d-flex align-items-center pb-2">
                      <img
                        src="assets/images/dashboard/Profile_1.jpg"
                        class="img-xs img-rounded mr-2"
                        alt="thumb"
                      />
                      <span class="fs-12 text">'.$row['title'].'</span>
                    </div>
                    <p class="fs-14 m-0 font-weight-medium line-height-sm">
                    '.$row['text'].'
                    </p>
                  </div>
                </div>
                ';
              }
             }
              ?>
                
              </div>
            </div>
          
          
          <!--post start -->
          <div class="world-news" >
          
            <div class="row" >
              <div class="col-sm-12">
                <div class="d-flex position-relative  float-left">
                  <h3 class="section-title">ALL News</h3>
                </div>
              </div>
            </div>
            <div class="row">

            <?php 
             $usql = "SELECT * FROM `post` where  `image` NOT LIKE '%mp4' order by id DESC  limit 12";
                 
             $r3 = $con->query($usql);
             if($r3->num_rows > 0){
               while($row = $r3->fetch_assoc())
               
               { 
           
            echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
                <div class="position-relative image-hover">
                  <img 
                    src="admin/post/'.$row['image'].'"  height="300" width="300"
                    class="img-fluid" 
                    alt="world-news"
                  />
                     <span class="thumb-title">'.$row['category'].'</span>
                  </div>
                 <h5 class="font-weight-bold mt-3">uploaded by--
                 '.$row['username'].'</h5>
                  
                <p class="fs-15 font-weight-normal">
                    '.$row['title'].'
                    </p>
<a href="pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
                name="up">Read More</a> 
               
              </div>
              ';
            }
          }
            ?>


            </div>
          </div>
          <!--post end -->
          <div class="editors-news">
            
               
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="container">
            
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-between">
                  <img src="assets/images/logo.svg" class="footer-logo" alt="" />

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
      </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="./assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
