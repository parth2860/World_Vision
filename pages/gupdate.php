<?php

error_reporting(0);

$con = new mysqli('localhost','root','','db');

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
//like
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($con,$_GET['type']);
  if($type=='like'){
        
          $pid=get_safe_value($con,$_GET['id']);
          $like="INSERT into likes (uid, pid) values ('$usid','$pid') ";
          mysqli_query($con,$like);
          mysqli_query($con,"update post set likes = +1 where id = '$pid'");
        }

  }
//dislike
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($con,$_GET['type']);
  if($type=='unlike'){
        
        $pid=get_safe_value($con,$_GET['id']);
        $unlike="DELETE from likes  WHERE uid = '$usid' and pid = '$pid' ";
        mysqli_query($con,$unlike);
  }
}

//update
 $user=$_GET['id']; 

$sql="SELECT * FROM group1 where id='$user'  ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
  $q = "UPDATE `group1` SET `text`='$_POST[con]',`name`='$_POST[title]' WHERE id='$user'";
  if (mysqli_query($con, $q)) {
   // $_SESSION['user'] = $user;
    header('location:profile.php');
  }else
  {
    echo "Faild";
  }
}
  /* //update post
   function get_safe_value($con,$str){
    if($str!=''){
      $str=trim($str);
      return mysqli_real_escape_string($con,$str);
    }
  }

  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="update from post where id='$id'";
      mysqli_query($con,$delete_sql);
    }
  }
  $username = $data['username'];
  $usql = "SELECT * FROM post where username='$username'  order by post.id desc";*/

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
  <script>
function myFunction() {
  var message, x;
  message = document.getElementById("p01");
  message.innerHTML = "";
  x = document.getElementById("demo").value;
  try { 
    if(x == "")  throw "empty";
    if(isNaN(x)) throw "not a number";
    x = Number(x);
    if(x < 5)  throw "too low";
    if(x > 10)   throw "too high";
  }
  catch(err) {
    message.innerHTML = "Input is " + err;
  }
}
</script>

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
                  echo '
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
                
                ';
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
                      <a class="nav-link" href="./search.php">+Explore</a>
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
                update
              </h1>
              
            </div>
          </div>
        </div>
        <div class="contact-wrap">
          <div class="row">
            <div class="col-lg-6  mb-5 mb-sm-2">
             
            <form method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="row">
                                                                        <div class="col-sm-6">
                                                                          <div class="form-group">
                                                                        
                                                                          <b> Title</b> <input type="text" name="title" class="form-control" value="<?php  echo $data['name']?>"/> 
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                    <b>Text</b>
                                    <textarea    class="form-control" name="con" ><?php  echo $data['text']?></textarea>
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <button class="btn btn-lg btn-dark font-weight-bold" name="update">update</button>
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
