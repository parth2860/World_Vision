<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "db");
$user = $_SESSION['user']; 


//show all user data
$sql="SELECT * FROM users where email='$user'  ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$sql="SELECT * FROM users where email='$user'  ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$usid = $data['id'];



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

   //insert post
  if (isset($_POST['upload'])) {
    //get userid
    $userid = $data['id'];
    //get username
    $username = $data['username'];
  // get image  
  $image = $_FILES['img']['name'];
  	// Get text
  	$content = mysqli_real_escape_string($con, $_POST['con']);
     //get page name
     $a=$_GET['id'];

     $b=$_GET['name'];
    $title= $_POST['title'];

    $cat= $_POST['cat'];
   // $uname=$_POST['uname'];
   // $uid=$_POST['uid'];
  	// image file directory
  	$target = "../admin/post/".basename($image);

  //	$isql = "INSERT INTO post (title, con , cat, image) VALUES ('$title', '$image_text', '$cat', '$text')";
    $isql = "INSERT INTO `group1`( `name`, `text`, `image`, `username`, `gname`, `status`) 
    VALUES ('$title','$content','$image','$username','$b','1')";
  	// execute query
  	mysqli_query($con, $isql);

  	if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
  		echo "Image uploaded successfully";

          header('location:profile.php');
  	}else{
  		echo "Failed to upload image";
    }
  }
  //update profile
 
 
    if(isset($_REQUEST['Update'])){
      $dp = $_FILES['dp']['name'];
      $get = "../admin/post/".basename($dp);
      $q = "UPDATE users SET fname='$_POST[fname]', lname='$_POST[lname]', dp='$dp', email='$_POST[email]', pass='$_POST[pass]', gender='$_POST[gen]', dob='$_POST[dob]', mno='$_POST[mno]' WHERE email='$user' ";
      if (move_uploaded_file($_FILES['dp']['tmp_name'], $get)) {
        echo "Image uploaded successfully";
  
            
      }else{
        echo "Failed to upload image";
      }
      if(  mysqli_query($con, $q))
         {
        $_SESSION['user'] = $user;
        header('location:profile.php');}
      else
      {
        echo "Faild";
      }
    }
  
    //delete post
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
        $delete_sql="delete from post where id='$id'";
        mysqli_query($con,$delete_sql);
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
  <style type="text/css">

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
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #ffffff;    
}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background: #ffffff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
    
}


.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #ffffff;
   color: white;
   text-align: center;
}
div.ex4 {
  background-color: lightblue;
  width: 110px;
  height: 110px;
  overflow: visible;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background: linear-gradient(to top left, #33ccff -131%, #ffffff 118%);
  color: linear-gradient(to right, #000000 -160%, #ffffff 154%);
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background: linear-gradient(to top left, #33ccff -131%, #ffffff 118%);
  color: linear-gradient(to right, #000000 -160%, #ffffff 154%);;
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
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
                  <li>30°C,London</li>
                </ul>
                <div>
                  <a class="navbar-brand" href="#"
                    ><img src="../assets/images/logo.svg" alt=""
                  /></a>
                </div>
                <!--up -->
                <?php
                
                if($_SESSION['user']== TRUE){
                  $user = $_SESSION['user'];

                  $psql="SELECT * FROM users where email='$user'  ";
                  $result = mysqli_query($con, $psql);
                  $row = mysqli_fetch_assoc($result); 
                  
                
                echo '<div class="dropdown">
                <img class="rounded-circle" src="../admin/post/'.$row['dp'].'"  class="rounded-circle" width="50" height="50">
                <span class="username">'.$row['fname'].' '.$row['lname'].'</span>
                  <div class="dropdown-content">
                  <div class="log-arrow-up"></div>
              
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
                      <a href="./pages/reg.php">REGISTRATION</a>
                    </li>
                    <li>
                      <a href="./pages/log.php">LOGIN</a>
                    </li>
                  </ul>
                </div>
                ';
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
                      <a class="nav-link" href="./art.php">Entertainment</a>
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
        </div>
      </header>
    
      


      <!-- Start -->
      

      <div class="container">
        <div class="main-body">
    
      
          
          <div class="row gutters-sm">
            <div class="col-12 mb-3">
              <div class="card h-100">
                
                  
              </div>
            </div>
          </div>
          
            <div class="col-12 mb-3">
              <div class="card h-100">
                <div class="card-body overflow">
                  <div class="tab" style="background-color:#DEDDDD;">
                    <button class="tablinks active" onclick="openCity(event, 'About Profile')">About Profile</button>
                    <button class="tablinks" onclick="openCity(event, 'New Post')">New Post</button>
                    <button class="tablinks" onclick="openCity(event, 'Feed Post')">Feed Post</button>
                    <button class="tablinks" onclick="openCity(event, 'video Post')">Video Post</button>
                    <button class="tablinks" onclick="openCity(event, 'notification')">Notification</button>
                  </div>
                  <?php
                  $a=$_GET['id'];
                  $psql = "SELECT * FROM group_mst where id=$a";
                  $r2 = $con->query($psql);
                  if($r2->num_rows > 0) {
                    while($row = $r2->fetch_assoc()){
                      
                      
                  echo'
                  <div id="About Profile" class="tabcontent">
                    <h3>About Profile</h3>
                    <div class="col-md-12 mb-3">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Page Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['name'].'
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Description</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['text'].'
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Image.</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['image'].'
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Created by</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['username'].'
                            </div>
                          </div>
                          <hr>
                          
                      </div>
                    </div>
                  </div>
                </div>
                  ';
                    }
                  }
                  ?>
                  <!--new post -->
                  <div id="New Post" class="tabcontent">
                  <h3>New Post</h3>
                    <div class="col-sm-12 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h4 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">New Post</i></h4>
                      
                          <div class="contact-wrap">
                          <div class="row">
                            <div class="col-lg-12  mb-5 mb-sm-4">
                              <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                  
                                      <input type="text" name="title" class="form-control" placeholder="Enter Feed Titile"/> 
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <textarea class="form-control" name="con" placeholder="Enter Feed Content"></textarea>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <lable> Upload Picture </lable>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input class="from-control" type="file" name="img"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <button class="btn btn-lg btn-dark font-weight-bold" name="upload">Post</button>
                                    </div>
                                  </div>
                                </div>             
                              </form>
                            </div>
                          </div>
                        </div>
                    
                    </div>
                  </div>
                </div>
                  </div>
                  
                  <!-- all post-->
                  <div id="Feed Post" class="tabcontent">
                    <h3>Page Post</h3>
                    <?php

                     $b=$_GET['name'];
                    // $username = $data['username'];
                     $usql = "SELECT * FROM group1 where gname='$b'   and `image` NOT LIKE '%mp4' order by id DESC";
                     //$usql = "SELECT * FROM group1    ";
                  $r3 = $con->query($usql);
                  if($r3->num_rows > 0) {
                    while($rw = $r3->fetch_assoc()){
                  echo'
                    <div class="card social-timeline-card overflow mb-3"  style=" border: 2px solid #C7C4C4;  border-radius: 12px">
                      <div class="card-header " style="background-color:#DEDDDD;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0 text-blue">'.$rw['username'].'</div>
                                    <div class="h7 text-muted">'.$rw['time'].'</div>
                                </div>
                            </div> <h2><div align="center" >'.$rw['title'].'</div></h2>
                          <div> 
                          <div class="dropdown">
                            '.$rw['category'].'
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2" >
                                
                                  <a class="dropdown-item" href="update.php?type=show&id='.$rw['id'].'" style="background-color:#DEDDDD;">EDIT</a>
                                  
                                   <a class="dropdown-item" href="?type=delete&id='.$rw['id'].'" style="background-color:#DEDDDD;">Delete</a> 
                                  
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    <table  align="justify">
                    <tr ">
                    <td >   <img src="../admin/post/'.$rw['image'].' " width=500 height=300 > </td>
                    <td align="center" width=500 height=300> '.$rw['content'].'</td>
                    </tr>
                    </table>
                    
                    <div class="card-footer">
                      ';
                      
                      $post_id = $rw['id'];
                      $query = "SELECT * from likes where uid = '$usid' and pid = '$post_id' ";
                      $result = mysqli_query($con,$query);
                      $like = mysqli_fetch_assoc($result);


                      if($like == true){
                        echo '<a href="?type=unlike&id='.$rw['id'].'" class="card-link"><i class="fa fa-gittip">Unlike</i>';
                        
                      }else{
                        echo '<a href="?type=like&id='.$rw['id'].'" class="card-link"><i class="fa fa-gittip">Like</i>';
                      }
                      
                      echo '</a>
                      <i class="fa fa-gittip">'; 
                      $post_id = $rw['id'];
                      $count = mysqli_query($con,"SELECT COUNT(pid) AS code FROM likes WHERE pid = '$post_id'");

                      $lcount = mysqli_fetch_array($count);
                      echo $lcount['code'];
                      echo ' like</i>

                    </div>
                  </div>
                  ';
                  }
                  }

               
                  ?>
                  

                  </div>
                  <!--start -->
                  <div id="video Post" class="tabcontent">
                  <h3>Video</h3>
                    <?php

                       $b=$_GET['name'];
                     //$username = $data['username'];
                     $usql = "SELECT * FROM group1 where gname='$b'   and `image`  LIKE '%mp4' order by group1.id DESC";
                  //$usql = "SELECT * FROM post,users where users.username='$username' and post.username=users.username order by post.id desc";
                 /* $usql="SELECT users.username, post.title, post.category,post.image,post.content
                     FROM post
                   INNER JOIN users ON users.username=post.username 
                   order by post.id DESC";*/
                  $r3 = $con->query($usql);
                  if($r3->num_rows > 0) {
                    while($rw = $r3->fetch_assoc()){
                  echo'
                    <div class="card social-timeline-card overflow mb-3"  style=" border: 2px solid #C7C4C4;  border-radius: 12px">
                      <div class="card-header " style="background-color:#DEDDDD;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0 text-blue">'.$rw['username'].'</div>
                                    <div class="h7 text-muted">'.$rw['time'].'</div>
                                </div>
                            </div> <h2><div align="center" >'.$rw['name'].'</div></h2>
                          <div> 
                          <div class="dropdown">
                            '.$rw['gname'].'
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2">
                                
                                  <a class="dropdown-item" href="update.php?type=show&id='.$rw['id'].'" style="background-color:#DEDDDD;">EDIT</a>
                                  
                                   <a class="dropdown-item" href="?type=delete&id='.$rw['id'].'" style="background-color:#DEDDDD;">Delete</a> 
                                  
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    <table  align="justify >
                    <tr ">
                    <td align="center">   <video  width=550 height=350 controls ><source src="../admin/post/'.$rw['image'].' " > </video> </td>
                   
                    </tr>
                    <tr> <td align="center" width=500 height=70> '.$rw['text'].'</td></tr>
                    </table>
                    
                    <div class="card-footer">
                      <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>

                    </div>
                  </div>
                  ';
                  }
                  }

               
                  ?>
                  
                  </div>
                  
                  <!--end -->
                   <!--start -->
                   <div id="notification" class="tabcontent">
                  <h3>n</h3>
                  <?php
                  $a=$_GET['id'];

                  $ql = " SELECT * FROM `group_mst`   where id=$a               ";
                  $r2 = $con->query($ql);
                  if($r2->num_rows > 0) {
                    while($row = $r2->fetch_assoc()){ ?>


                  
                  <div class="card social-timeline-card overflow mb-3"  style=" border: 2px solid #C7C4C4;  border-radius: 12px">
                      <div class="card-header " style="background-color:#DEDDDD;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="100" height="100" src="../admin/post/<?php echo $row['image']; ?>" alt="">
                                </div>
                                <div class="ml-2">created by
                                    <div class="h5 m-0 text-blue"><?php echo $row['username']; ?></div>
                                    <div class="h7 text-muted"><?php echo $row['time']; ?></div>
                                </div>
                            </div> <h1><b><div   ><?php echo $row['name']; ?></div></b></h1>
                            
                          <div> 

                          <div class="dropdown">
                            
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2">
                                
                                  <a class="dropdown-item" href="g.php?id='.$row['id'].'&name='.$row['name'].'">view</a>
                               
                                </div>
                          </div>
                        </div>

                      </div>
                      <h4><div align="center" style="background-color:white;" ><?php echo $row['text']; ?></div></h4>
                    </div>
                                        <!--form start -->
                                        <div class="panel-group m-bot20" id="accordion">
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title" align="center">
                                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                                       +ADD Post
                                                                    </a>
                                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <!--s -->
                                                    <div class="contact-wrap">
                                                                <div class="row">
                                                                  <div class="col-lg-12  mb-5 mb-sm-4">
                                                                    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                                      <div class="row">
                                                                        <div class="col-sm-6">
                                                                          <div class="form-group">
                                                                        
                                                                            <input type="text" name="title" class="form-control" placeholder="Enter Feed Titile"/> 
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">
                                                                        <div class="col-sm-6">
                                                                          <div class="form-group">
                                                                            <textarea class="form-control" name="con" placeholder="Enter Feed Content"></textarea>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                      
                                                                      <div class="row">
                                                                        <div class="col-sm-3">
                                                                          <div class="form-group">
                                                                            <lable> Upload Picture </lable>
                                                                          </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                          <div class="form-group">
                                                                            <input class="from-control" type="file" name="img"/>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">
                                                                        <div class="col-sm-6">
                                                                          <div class="form-group">
                                                                            <button class="btn btn-lg btn-dark font-weight-bold" name="upload">Post</button>
                                                                          </div>
                                                                        </div>
                                                                      </div>             
                                                                    </form>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                    <!--e -->

                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                           
                                        <!--form end -->
                                        <div class="col-12 mb-3">
                                       <div class="card h-100">
                                       <div class="card-body overflow">

                                       <section class="panel" style="background-color:#C7C4C4;" >
                                       <header class="panel-heading tab-bg-primary ">
                                         <ul class="nav nav-tabs">
                                           <li class="active">
                                             <a data-toggle="tab" href="#home">POST</a>
                                           </li>
                                           <li class="">
                                             <a data-toggle="tab" href="#about">VIDEO</a>
                                           </li>
                                           
                                         </ul>
                                       </header>
                                       <div class="panel-body">
                                         <div class="tab-content">
                                           <div id="home" class="tab-pane active">
                                             POST
                                             <!--start -->
                                                       <?php

                     $b=$_GET['name'];
                    // $username = $data['username'];
                     $usql = "SELECT * FROM group1 where gname='$b'   and `image` NOT LIKE '%mp4' order by id DESC";
                     //$usql = "SELECT * FROM group1    ";
                  $r3 = $con->query($usql);
                  if($r3->num_rows > 0) {
                    while($rw = $r3->fetch_assoc()){
                  echo'
                    <div class="card social-timeline-card overflow mb-3"  style=" border: 2px solid #C7C4C4;  border-radius: 12px">
                      <div class="card-header " style="background-color:#DEDDDD;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0 text-blue">'.$rw['username'].'</div>
                                    <div class="h7 text-muted">'.$rw['time'].'</div>
                                </div>
                            </div> <h2><div align="center" >'.$rw['title'].'</div></h2>
                          <div> 
                          <div class="dropdown">
                            '.$rw['gname'].'
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2" >
                                
                                  <a class="dropdown-item" href="update.php?type=show&id='.$rw['id'].'" style="background-color:#DEDDDD;">EDIT</a>
                                  
                                   <a class="dropdown-item" href="?type=delete&id='.$rw['id'].'" style="background-color:#DEDDDD;">Delete</a> 
                                  
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    <table  align="justify">
                    <tr ">
                    <td >   <img src="../admin/post/'.$rw['image'].' " width=500 height=300 > </td>
                    <td align="center" width=500 height=300> '.$rw['content'].'</td>
                    </tr>
                    </table>
                    
                    <div class="card-footer">
                      ';
                      
                      $post_id = $rw['id'];
                      $query = "SELECT * from likes where uid = '$usid' and pid = '$post_id' ";
                      $result = mysqli_query($con,$query);
                      $like = mysqli_fetch_assoc($result);


                      if($like == true){
                        echo '<a href="?type=unlike&id='.$rw['id'].'" class="card-link"><i class="fa fa-gittip">Unlike</i>';
                        
                      }else{
                        echo '<a href="?type=like&id='.$rw['id'].'" class="card-link"><i class="fa fa-gittip">Like</i>';
                      }
                      
                      echo '</a>
                      <i class="fa fa-gittip">'; 
                      $post_id = $rw['id'];
                      $count = mysqli_query($con,"SELECT COUNT(pid) AS code FROM likes WHERE pid = '$post_id'");

                      $lcount = mysqli_fetch_array($count);
                      echo $lcount['code'];
                      echo ' like</i>

                    </div>
                  </div>
                  ';
                  }
                  }

               
                  ?>
                                             <!--end-->
                                           </div>
                                           <div id="about" class="tab-pane">VIDEO
                                           <!--start -->
                                           <?php

                     $b=$_GET['name'];
                    // $username = $data['username'];
                     $usql = "SELECT * FROM group1 where gname='$b'   and `image`  LIKE '%mp4' order by id DESC";
                     //$usql = "SELECT * FROM group1    ";
                  $r3 = $con->query($usql);
                  if($r3->num_rows > 0) {
                    while($rw = $r3->fetch_assoc()){
                  echo'
                    <div class="card social-timeline-card overflow mb-3"  style=" border: 2px solid #C7C4C4;  border-radius: 12px">
                      <div class="card-header " style="background-color:#DEDDDD;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0 text-blue">'.$rw['username'].'</div>
                                    <div class="h7 text-muted">'.$rw['time'].'</div>
                                </div>
                            </div> <h2><div align="center" >'.$rw['title'].'</div></h2>
                          <div> 
                          <div class="dropdown">
                            '.$rw['gname'].'
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2" >
                                
                                  <a class="dropdown-item" href="update.php?type=show&id='.$rw['id'].'" style="background-color:#DEDDDD;">EDIT</a>
                                  
                                   <a class="dropdown-item" href="?type=delete&id='.$rw['id'].'" style="background-color:#DEDDDD;">Delete</a> 
                                  
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    <table  align="justify >
                    <tr ">
                    <td align="center">   <video  width=550 height=350 controls ><source src="../admin/post/'.$rw['image'].' " > </video> </td>
                   
                    </tr>
                    <tr> <td align="center" width=500 height=70> '.$rw['text'].'</td></tr>
                    </table>
                    
                    <div class="card-footer">
                      ';
                      
                      $post_id = $rw['id'];
                      $query = "SELECT * from likes where uid = '$usid' and pid = '$post_id' ";
                      $result = mysqli_query($con,$query);
                      $like = mysqli_fetch_assoc($result);


                      if($like == true){
                        echo '<a href="?type=unlike&id='.$rw['id'].'" class="card-link"><i class="fa fa-gittip">Unlike</i>';
                        
                      }else{
                        echo '<a href="?type=like&id='.$rw['id'].'" class="card-link"><i class="fa fa-gittip">Like</i>';
                      }
                      
                      echo '</a>
                      <i class="fa fa-gittip">'; 
                      $post_id = $rw['id'];
                      $count = mysqli_query($con,"SELECT COUNT(pid) AS code FROM likes WHERE pid = '$post_id'");

                      $lcount = mysqli_fetch_array($count);
                      echo $lcount['code'];
                      echo ' like</i>

                    </div>
                  </div>
                  ';
                  }
                  }

               
                  ?>
                                           <!--end -->
                                           </div>
                                           
                                         </div>
                                       </div>
                                     </section>

                                      </div></div></div>
                    </div>
                  
                  <?php
                    }
                  }
                  ?>
                  
                  </div>
                  
                  <!--end -->
                  
                </div>
                
              </div>
            </div>
              
            </div>
          </div>
          
        </div>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>

      
  
      
      




      <!-- end -->



    <!-- container-scroller ends -->
    <!-- partial:../partials/_footer.html -->
    <footer>
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="border-top"></div>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="pages/news-post.php">News</a></li>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="pages/world.php">World</a></li>
                  <li><a href="pages/author.php">General</a></li>
                  <li><a href="pages/business.php">Business</a></li>
                  <li><a href="pages/politics.php">Politics</a></li>
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="pages/world.php">World</a></li>
                  <li><a href="pages/sports.php">Sports</a></li>
                  <li><a href="pages/art.php">Art</a></li>
                  <li><a href="#">Magazine</a></li>
                  <li><a href="pages/real-estate.php">Real estate</a></li>
                  <li><a href="pages/travel.php">Travel</a></li>
                  <li><a href="pages/author.php">Author</a></li>
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="#">Features</a></li>
                  <li><a href="#">Photography</a></li>
                  <li><a href="#">Video</a></li>
                  <li><a href="pages/news-post.php">Newsletters</a></li>
                  <li><a href="#">Live Events</a></li>
                  <li><a href="#">Stores</a></li>
                  <li><a href="#">Jobs</a></li>
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="#">More</a></li>
                  <li><a href="#">RSS</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">User Agreement</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="pages/aboutus.php">About us</a></li>
                  <li><a href="pages/contactus.php">Contact</a></li>
                </ul>
              </div>
            </div>
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
    <!-- inject:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script>
    //main tab
      function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
      }
      
      //
      var modal = document.getElementById("myModal");

      var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 
    </script>
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
<?php
mysqli_close($con)
?>