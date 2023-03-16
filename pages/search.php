<?php
session_start();

error_reporting(0);

$con = mysqli_connect("localhost", "root", "", "db");
$user = $_SESSION['user']; 


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
                <!--up -->
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

                <!--up end-->
                
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
                      <a class="nav-link" href="./search.php">+Explore</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./g_mst.php">+Pages</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./aboutus.php">About Us</a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>

          <!-- partial -->
          
          <div    id="WORLD Post" class="tabcontent" >
          

              
              
              <form align="center" method="post" enctype="multipart/form-data" >
            <div>
            <!-- 3-->
           
           <select name="csearch"  Required>
           <option value="" >- Choose Category -</option>
           <?php
                            
                      $re = mysqli_query($con, "SELECT * FROM `category_mst` ");
                  
                        ?>                           
                                                  <?php
                                                  
                                                    while ($row = mysqli_fetch_array($re)){ 
                            
                                                  ?>
                                                
                                                  <option value="<?php echo $row["category_name"]; ?>"><?php echo $row["category_name"]; ?></option>
                                                  <?php } ?>
                                                              
                                      </select>
              <button type="submit" name="cfind"> find</button>
             </div>
              </form><!-- 3 end-->

              <form align="center" method="post" enctype="multipart/form-data" >
            <div>
           <input class="" type="text" name="search" placeholder="search post" Required>
              <button type="submit" name="find"> find</button>
             </div>
              </form>

              <form align="center" method="post" enctype="multipart/form-data" >
            <div><!-- 2-->
           <input type="text" name="vsearch" placeholder="search video" Required>
           
              <button type="submit" name="vfind"> find</button>
             </div>
              </form>
                    <h3 align="center">Explore</h3> 
                    
         <!--grid start -->
         <div class="" >
          
          <div class="row" >
            <div class="col-sm-12">
              <div class="d-flex position-relative  float-left">
                
              </div>
            </div>
          </div>
          <div class="row">

          <?php 
          // $sql = "SELECT * FROM `post` WHERE  `status` = 1 AND `image` NOT LIKE '%mp4' order by id DESC  limit 4";
          $vtitle=$_POST['vsearch'];
          if(isset($_POST['vfind'])){
 
$sql = "SELECT * FROM `post` WHERE  `content` LIKE '%$vtitle%' AND `status` = 1  AND `image`  like '%mp4' order by id DESC ";
      
           $r3 = $con->query($sql);
           if($r3->num_rows > 0){
             while($row = $r3->fetch_assoc())
             
             { 
         
          echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
              <div class="position-relative image-hover">
                <video  height="200" width="300"  controls>
                  <source src="../admin/post/'.$row['image'].'" 
                  class="img-fluid" 
                  alt="world-news"
                /> </video>
                   <span class="thumb-title">'.$row['category'].'</span>
                </div>
               <h5 class="font-weight-bold mt-3">uploaded by--
               '.$row['username'].'</h5>
                
              <p class="fs-15 font-weight-normal">
                  '.$row['title'].'
                  </p>
                <a href="../pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
              name="up">Read More</a> 
             
            </div>
            ';
          }
         } 
        }
          ?>


          </div>
           </div>
         <!--grid end  2-->
         <!--grid start -->
         <div class="" >
          
          <div class="row" >
            <div class="col-sm-12">
              <div class="d-flex position-relative  float-left">
               
              </div>
            </div>
          </div>
          <div class="row">

          <?php 
         
          $cat=$_POST['csearch'];
          if(isset($_POST['cfind'])){
  // $usql = "SELECT * FROM post   order by id DESC ";
$sql = "SELECT * FROM `post` WHERE  `category` LIKE '%$cat%' AND `status` = 1 AND `image` NOT LIKE '%mp4' order by id DESC ";
      
           $r3 = $con->query($sql);
           if($r3->num_rows > 0){
             while($row = $r3->fetch_assoc())
             
             { 
         
          echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
              <div class="position-relative image-hover">
                <img
                   src="../admin/post/'.$row['image'].'"  height="300" width="300" 
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
                <a href="../pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
              name="up">Read More</a> 
             
            </div>
            ';
          }
         } 
        }
          ?>


          </div>
           </div>
         <!--grid end  3-->
        
              <!--grid start -->
          <div class="" >
          
          <div class="row" >
            <div class="col-sm-12">
              <div class="d-flex position-relative  float-left">
               
              </div>
            </div>
          </div>
          <div class="row">

          <?php 
          // $sql = "SELECT * FROM `post` WHERE  `status` = 1 AND `image` NOT LIKE '%mp4' order by id DESC  limit 4";
          $title=$_POST['search'];
          if(isset($_POST['find'])){
  // $usql = "SELECT * FROM post   order by id DESC ";
$sql = "SELECT * FROM `post` WHERE  `content` LIKE '%$title%' AND `status` = 1 AND `image` NOT LIKE '%mp4' order by id DESC ";
      
           $r3 = $con->query($sql);
           if($r3->num_rows > 0){
             while($row = $r3->fetch_assoc())
             
             { 
         
          echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
              <div class="position-relative image-hover">
                <img
                   src="../admin/post/'.$row['image'].'"  height="300" width="300" 
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
                <a href="../pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
              name="up">Read More</a> 
             
            </div>
            ';
          }
         } 
        }
          ?>


          </div>
           </div>
         <!--grid end  1-->
         <!-- main post-->
           <!--grid start -->
           <div class="" >
          
          <div class="row" >
            <div class="col-sm-12">
              <div class="d-flex position-relative  float-left">
                
              </div>
            </div>
          </div>
          <div class="row">

          <?php 
           $sql = "SELECT * FROM `post` WHERE  `status` = 1 AND `image` NOT LIKE '%mp4' order by id DESC  limit 4";
         
      
           $r3 = $con->query($sql);
           if($r3->num_rows > 0){
             while($row = $r3->fetch_assoc())
             
             { 
         
          echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
              <div class="position-relative image-hover">
                <img
                   src="../admin/post/'.$row['image'].'"  height="300" width="300" 
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
                <a href="../pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
              name="up">Read More</a> 
             
            </div>
            ';
          }
         } 
        
          ?>
          <!-- --><?php 
           $sql = "SELECT * FROM `group1` WHERE  `status` = 1 AND `image` NOT LIKE '%mp4' order by id DESC  limit 4";
         
      
           $r3 = $con->query($sql);
           if($r3->num_rows > 0){
             while($row = $r3->fetch_assoc())
             
             { 
         
          echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
              <div class="position-relative image-hover">
                <img
                   src="../admin/post/'.$row['image'].'"  height="300" width="300" 
                  class="img-fluid" 
                  alt="world-news"
                />
                   <span class="thumb-title">'.$row['gname'].'</span>
                </div>
               <h5 class="font-weight-bold mt-3">uploaded by--
               '.$row['username'].'</h5>
                
              <p class="fs-15 font-weight-normal">
                  '.$row['name'].'
                  </p>
                <a href="../pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
              name="up">Read More</a> 
             
            </div>
            ';
          }
         } 
        
          ?>


          </div>
           </div>
         <!--grid end -->
         <!--grid start -->
         <div class="" >
          
          <div class="row" >
            <div class="col-sm-12">
              <div class="d-flex position-relative  float-left">
                
              </div>
            </div>
          </div>
          <div class="row">

          <?php 
           $sql = "SELECT * FROM `post` WHERE  `status` = 1 AND `image`  LIKE '%mp4' order by id DESC  limit 4";
         
      
           $r3 = $con->query($sql);
           if($r3->num_rows > 0){
             while($row = $r3->fetch_assoc())
             
             { 
         
          echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
              <div class="position-relative image-hover">
                <video  height="200" width="300"  controls>
                   <source src="../admin/post/'.$row['image'].'"  
                  class="img-fluid" 
                  alt="world-news"
                /> </video>
                   <span class="thumb-title">'.$row['category'].'</span>
                </div>
               <h5 class="font-weight-bold mt-3">uploaded by--
               '.$row['username'].'</h5>
                
              <p class="fs-15 font-weight-normal">
                  '.$row['title'].'
                  </p>
                <a href="../pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
              name="up">Read More</a> 
             
            </div>
            ';
          }
         } 
        
          ?>


          </div>
           </div>
         <!--grid end -->
         <!--grid start -->
         <div class="" >
          
          <div class="row" >
            <div class="col-sm-12">
              <div class="d-flex position-relative  float-left">
                
              </div>
            </div>
          </div>
          <div class="row">

          <?php 
           $sql = "SELECT * FROM `group1` WHERE  `status` = 1 AND `image`  LIKE '%mp4' order by id DESC  limit 4";
         
      
           $r3 = $con->query($sql);
           if($r3->num_rows > 0){
             while($row = $r3->fetch_assoc())
             
             { 
         
          echo '<div class="col-lg-3 col-sm-6 mb-5 mb-sm-2" >
              <div class="position-relative image-hover">
                <video  height="200" width="300"  controls>
                   <source src="../admin/post/'.$row['image'].'"  
                  class="img-fluid" 
                  alt="world-news"
                /> </video>
                   <span class="thumb-title">'.$row['gname'].'</span>
                </div>
               <h5 class="font-weight-bold mt-3">uploaded by--
               '.$row['username'].'</h5>
                
              <p class="fs-15 font-weight-normal">
                  '.$row['name'].'
                  </p>
                <a href="../pages/post.php?type=view&id='.$row['id'].' " class="font-weight-bold text-dark pt-2"
              name="up">Read More</a> 
             
            </div>
            ';
          }
         } 
        
          ?>


          </div>
           </div>
         <!--grid end -->
           <!-- main post end-->         

                  </div>
                  
                  
        <!-- end partial-->
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
