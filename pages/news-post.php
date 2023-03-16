<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "db");
$user = $_SESSION['user']; 

$sql="SELECT * FROM users where email='$user'  ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$usid = $data['id'];  

function get_safe_value($con,$str){
  if($str!=''){
    $str=trim($str);
    return mysqli_real_escape_string($con,$str);
  }
}

if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($con,$_GET['type']);
  if($type=='like'){
        
          $pid=get_safe_value($con,$_GET['id']);
          $like="INSERT into likes (uid, pid) values ('$usid','$pid') ";
          mysqli_query($con,$like);
          mysqli_query($con,"update post set likes = +1 where id = '$pid'");
        }

  }

if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($con,$_GET['type']);
  if($type=='unlike'){
        
        $pid=get_safe_value($con,$_GET['id']);
        $unlike="DELETE from likes  WHERE uid = '$usid' and pid = '$pid' ";
        mysqli_query($con,$unlike);
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
                      <a class="nav-link" href="./aboutus.php">About Us</a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>

          <!-- partial -->
        
    
     <!-- post -->
     <div    id="WORLD Post" class="tabcontent" >
          <img  src="../assets/images/travel/WhatsApp Image 2021-05-27 at 1.38.48 PM (1).jpeg" height="200"  width="1100"  >
                    <h3 align="center">TECH</h3> 
                    <!--grid start -->
          <div class="" >
          
          <div class="row" >
            <div class="col-sm-12">
              <div class="d-flex position-relative  float-left">
                <h3 class="section-title">Tech News</h3>
              </div>
            </div>
          </div>
          <div class="row">

          <?php 
           $sql = "SELECT * FROM `post` WHERE `category` = 'tech' AND `status` = 1  and `image` NOT LIKE '%mp4' order by id DESC  limit 4";
               
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


          </div>
           </div>
         <!--grid end -->
                    <?php
                    $results_per_page = 5;
                    $result = mysqli_query($con,"SELECT * FROM `post` WHERE `category` = 'tech' AND `status` = 1  and `image` NOT LIKE '%mp4' order by id DESC ");
                     
                    $number_of_results = mysqli_num_rows($result);
                    $number_of_pages = ceil($number_of_results/$results_per_page);
  
                        if(!isset($_GET['page'])) {
                          $page = 1;
                        }else{
                          $page =$_GET['page'];
                        }
  
                        $this_page_first_result = ($page-1)*$results_per_page;


                 
                  
                  if($r3->num_rows > 0){

                     $re = mysqli_query($con ,"SELECT * FROM `post` WHERE `category` = 'tech' AND `status` = 1  and `image` NOT LIKE '%mp4' order by id DESC LIMIT $this_page_first_result,$results_per_page ");
                    while($row = mysqli_fetch_array($re))
                   
                    { 
                  echo'
                  <div    id="WORLD Post" class="tabcontent" >
                    
                  <div class="card social-timeline-card overflow mb-3"  style=" border: 2px solid #C7C4C4;  border-radius: 12px">
                  <div class="card-header " style="background-color:#DEDDDD;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                               
                            </div>
                            <div class="ml-2">
                                <div class="h5 m-0 text-blue">'.$row['username'].'</div>
                                <div class="h7 text-muted">'.$row['time'].'</div>
                            </div>
                            
                        </div>   <h2><div align="center" >'.$row['title'].'</div></h2>
                      <div>
                      <div class="dropdown">
                        '.$row['category'].'
                            <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2">
                            <a class="dropdown-item" href="feedback.php">Feedback</a>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>

                
                <table  align="justify">
                <tr ">
                <td >   <img src="../admin/post/'.$row['image'].' " width=500 height=300 > </td>
                <td align="center" width=600 height=300> '.$row['content'].'</td>
                </tr>
                </table>
                
                <div class="card-footer">
                  ';
                  
                  $post_id = $row['id'];
                  $query = "SELECT * from likes where uid = '$usid' and pid = '$post_id' ";
                  $result = mysqli_query($con,$query);
                  $like = mysqli_fetch_assoc($result);


                  if($like == true){
                    echo '<a href="?type=unlike&id='.$row['id'].'" class="card-link"><i class="fa fa-gittip">Unlike</i>';
                    
                  }else{
                    echo '<a href="?type=like&id='.$row['id'].'" class="card-link"><i class="fa fa-gittip">Like</i>';
                  }
                  
                  echo '</a>
                  <i class="fa fa-gittip">'; 
                  $post_id = $row['id'];
                  $count = mysqli_query($con,"SELECT COUNT(pid) AS code FROM likes WHERE pid = '$post_id'");

                  $lcount = mysqli_fetch_array($count);
                  echo $lcount['code'];
                  echo ' like</i>

                </div>
              </div>
              ';

                 
                  }
                }

                for($page=1;$page<=$number_of_pages;$page++){
                  echo '
                  <tr>
                      <td align=center> <a href="news-post.php?page='.$page.'">' .$page. '</a>  ';
                  echo '
                  </td>
                  </tr>';
                }
                  ?>
                  

                  </div>
                  
                  
        <!-- end post-->
        </div>
      </header>
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
    <!-- Custom js for this page-->
    <script src="../assets/js/demo.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
