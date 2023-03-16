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

    $title= $_POST['title'];

    $cat= $_POST['cat'];
   // $uname=$_POST['uname'];
   // $uid=$_POST['uid'];
  	// image file directory
  	$target = "../admin/post/".basename($image);

  //	$isql = "INSERT INTO post (title, con , cat, image) VALUES ('$title', '$image_text', '$cat', '$text')";
    $isql = "INSERT INTO post ( `title`, `content`, `category`, `image`,`username`,`user_id`,`status`) VALUES ('$title', '$content', '$cat', '$image','$username','$userid','1')";
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
    //delete page 
    if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_value($con,$_GET['type']);
      if($type=='delt'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from group_mst where id='$id'";
        mysqli_query($con,$delete_sql);
      }
    }
    //delete page post
    if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_value($con,$_GET['type']);
      if($type=='del'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from group1 where id='$id'";
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
                  <li></li>
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
        </div>
      </header>
    
      


      <!-- Start -->
      

      <div class="container">
        <div class="main-body">
    
      
          
          <div class="row gutters-sm">
            <div class="col-12 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../admin/post/<?php echo $data['dp'];?>" alt="user" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                      <h4><?php echo $data['fname'] ," ", $data['lname']; ?></h4>
                      <h4><?php echo $data['username'] ; ?></h4>
                      <button class="btn btn-primary" id="myBtn">Edit Profile</button>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Edit Profile</i></h4>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
            
                        <div class="contact-wrap mb-3">
                          <div class="row">
                            <div class="col-lg-12  mb-5 mb-sm-4">
                              <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> photo </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="file" name="dp" class="form-control" value="<?php  echo $data['dp'] ?>"/>
                                      <img  src="../admin/post/<?php echo $data['dp'];?> " class="rounded-circle" width="150" height="150"> 
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> First Name </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="text" name="fname" class="form-control" value="<?php  echo $data['fname']?>"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> Last Name </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="text" name="lname" class="form-control" value="<?php  echo $data['lname']?>"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> Email </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="text" name="email" class="form-control" value="<?php  echo $data['email']?>"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> Password </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="password" name="pass" class="form-control" value="<?php  echo $data['pass']?>"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> Mobile No. </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="text" name="mno" class="form-control" value="<?php  echo $data['mno']?>"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> Date of Birth </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                    <input
                                      type="date"
                                      name="dob"
                                      value="<?php  echo $data['dob']?>"
                                      class="form-control"               
                                    />
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label> Gender </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                    <select class="form-control" name="gen">
                                                  <option value="<?php  echo $data['gender']?>">- <?php  echo $data['gender']?>-</option>
                                                  <option value='Male'>Male</option>
                                                  <option value='Female'>Female</option>
                                                  <option value='Other'>Other</option>
                                                </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <button class="btn btn-lg btn-dark font-weight-bold" name="Update">Update</button>
                                    </div>
                                  </div>
                                </div>             
                              </form>
                            </div>
                          </div>
                        </div>
                
                
            </div>
              <div class="modal-footer">
                  
              </div>
            </div>
          </div>
          
            <div class="col-12 mb-3">
              <div class="card h-100">
                <div class="card-body overflow">
                  <div class="tab" style="background-color:#cfc9c8;">
                    <button class="tablinks active" onclick="openCity(event, 'About Profile')">About Profile</button>
                    <button class="tablinks" onclick="openCity(event, 'New Post')">New Post</button>
                    <button class="tablinks" onclick="openCity(event, 'Feed Post')">Feed Post</button>
                    <button class="tablinks" onclick="openCity(event, 'video Post')">Video Post</button>
                    <button class="tablinks" onclick="openCity(event, 'notification')">Notification</button>
                    <button class="tablinks" onclick="openCity(event, 'pages')">Pages</button>
                  </div>
                  <?php
                  $psql = "SELECT * FROM users WHERE email='$user'";
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
                              <h6 class="mb-0">User Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['username'].'
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['email'].'
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Mobile No.</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['mno'].'
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Date of Birth</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              '.$row['dob'].'
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Gender</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            '.$row['gender'].'
                          </div>
                        </div>
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
                                    <b>Post Title</b>
                                      <input type="text" name="title" class="form-control" placeholder="Enter Post Title" required/> 
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                    <b>Post Description</b>
                                      <textarea class="form-control" name="con" placeholder="Enter Post Content" required></textarea>
                                    </div>
                                  </div>
                                </div>
                                <?php
                            
                            $re = mysqli_query($con, "SELECT * FROM `category_mst` ");
                          // $row = mysqli_num_rows($re);
                            
                        ?>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                    <select class="form-control" name="cat" required>
                                                              <option value="">- Choose Post Category -</option>
                                                              <?php
                                                  /*for($i=1;$i<=$row;$i++)
                                                  {
                                                    $row=mysqli_fetch_array($re);*/
                                                    while ($row = mysqli_fetch_array($re)){ 
                            
                                                  ?>
                                                  <?php //$row=mysqli_fetch_array($re); ?>
                                                  <option value="<?php echo $row["category_name"]; ?>"><?php echo $row["category_name"]; ?></option>
                                                  <?php } ?>
                                                              
                                      </select>
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
                                      <input class="from-control" type="file" name="img" required/>
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
                    <h3>Feed Post</h3>
                    <?php

                 
                     $username = $data['username'];
                     $usql = "SELECT * FROM post where username='$username'   and `image` NOT LIKE '%mp4' order by post.id DESC";
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

                 
                     $username = $data['username'];
                     $usql = "SELECT * FROM post where username='$username'   and `image`  LIKE '%mp4' order by post.id DESC";
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
                            </div> <h2><div align="center" >'.$rw['title'].'</div></h2>
                          <div> 
                          <div class="dropdown">
                            '.$rw['category'].'
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
                    <tr> <td align="center" width=500 height=70> '.$rw['content'].'</td></tr>
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
                  
                  <!--end -->
                  <!--start -->
                  <div id="notification" class="tabcontent">
                  <h3>notification</h3>
                    <?php

                 
                     $username = $data['username'];
                     $usql = "SELECT * FROM post where username='$username'   and status=0  order by post.id DESC";
                  //$usql = "SELECT * FROM post,users where users.username='$username' and post.username=users.username order by post.id desc";
                 /* $usql="SELECT users.username, post.title, post.category,post.image,post.content
                     FROM post
                   INNER JOIN users ON users.username=post.username 
                   order by post.id DESC";*/
                  $r3 = $con->query($usql);
                  if($r3->num_rows > 0) {
                    while($rw = $r3->fetch_assoc()){
                     
                     echo' 
                     category post notification
                     <div class="card-header " style="background-color:#DEDDDD;">
                     <p > post you uploaded on <i style="background-color:#fcb603;"> '.$rw['time'].' </i> title name <i style="background-color:#fcb603;">'.$rw['title'].'</i> is templorily blocked by admin due to misleading content.try to change your post and wait for adminrespose</p>
                     </div>
                     ';
                     
                  }
                  }
                   ?>
                   <!--page note-->
                   <?php

                 
                     $username = $data['username'];
                     $usql = "SELECT * FROM group1 where username='$username'   and status=0  order by group1.id DESC";
                  //$usql = "SELECT * FROM post,users where users.username='$username' and post.username=users.username order by post.id desc";
                 /* $usql="SELECT users.username, post.title, post.category,post.image,post.content
                     FROM post
                   INNER JOIN users ON users.username=post.username 
                   order by post.id DESC";*/
                  $r3 = $con->query($usql);
                  if($r3->num_rows > 0) {
                    while($rw = $r3->fetch_assoc()){
                     
                     echo' 
                     pages post notification
                     <div class="card-header " style="background-color:#f7c9c3;">
                     <p > post you uploaded on <i style="background-color:#fcb603;"> '.$rw['time'].' </i> page name <i style="background-color:#fcb603;">'.$rw['gname'].'</i> title name<i style="background-color:#fcb603;"> '.$rw['name'].' </i>is templorily blocked by admin due to misleading content.try to change your post and wait for adminrespose</p>
                     </div>
                     ';
                     
                  }
                  }
                   ?>

                  
                  </div>
                  <!--end -->
                  <!--pages post -->
                  <div id="pages" class="tabcontent">
                  <h3>Pages</h3>
                        <!--all groups -->
                        <?php
                  $ql = " SELECT * FROM `group_mst`  where username='$username'                ";
                  $r2 = $con->query($ql);
                  if($r2->num_rows > 0) {
                    while($row = $r2->fetch_assoc()){


                  echo'
                  <div class="card social-timeline-card overflow mb-3"  style=" border: 2px solid #C7C4C4;  border-radius: 12px" >
                      <div class="card-header " style="background-color:#DEDDDD;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="../admin/post/'.$row['image'].'" alt="">
                                </div>
                                <div class="ml-2">
                                    
                                    <div class="h7 text-muted">'.$row['time'].'</div>
                                </div>
                            </div> <h2><b><div align="center" >'.$row['name'].'</div></b></h2>
                          <div> 
                          <div class="dropdown">created by
                          '.$row['username'].'
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2">
                                
                                  <a class="dropdown-item" href="g.php?id='.$row['id'].'&name='.$row['name'].'">view</a>
                                  <a class="dropdown-item" href="?type=delt&id='.$row['id'].'" >Delete</a> 
                                  
                                  
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  ';
                 
                    }
                  }
                  ?>
                        <!--close groups -->

                  <section class="panel" style="background-color:white;" >
                                       <header  class="panel-heading tab-bg-primary ">
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
                                           <div id="home" class="tab-pane ">
                                             POST
                                              <!--pstart -->
                                              <?php

                                                      //$b=$_GET['name'];
                                                      $username = $data['username'];
                                                      $usql = "SELECT * FROM group1 where username='$username'   and `image` NOT LIKE '%mp4' order by id DESC";
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
                                                                
                                                                  <a class="dropdown-item" href="gupdate.php?type=show&id='.$rw['id'].'" style="background-color:#DEDDDD;">EDIT</a>
                                                                  
                                                                    <a class="dropdown-item" href="?type=del&id='.$rw['id'].'" style="background-color:#DEDDDD;">Delete</a> 
                                                                  
                                                                </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      </div>


                                                      <table  align="justify">
                                                      <tr ">
                                                      <td >   <img src="../admin/post/'.$rw['image'].' " width=500 height=300 > </td>
                                                      <td align="center" width=500 height=300><b>'.$rw['name'].'</b> <br>'.$rw['text'].'</td>
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
                                                    <!--pend-->
                                             </div>
                                             <div id="about" class="tab-pane ">
                                             video
                                              <!--vstart -->
                                           <?php

                                                //$b=$_GET['name'];
                                                 $username = $data['username'];
                                                $usql = "SELECT * FROM group1 where username='$username'   and `image`  LIKE '%mp4' order by id DESC";
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
                                                          
                                                            <a class="dropdown-item" href="gupdate.php?type=show&id='.$rw['id'].'" style="background-color:#DEDDDD;">EDIT</a>
                                                            
                                                              <a class="dropdown-item" href="?type=del&id='.$rw['id'].'" style="background-color:#DEDDDD;">Delete</a> 
                                                            
                                                          </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                </div>


                                                <table  align="justify >
                                                <tr ">
                                                <td align="center">   <video  width=550 height=350 controls ><source src="../admin/post/'.$rw['image'].' " > </video> </td>

                                                </tr>
                                                <tr> <td align="center" width=500 height=70> <b>'.$rw['name'].'</b><br>'.$rw['text'].'</td></tr>
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
                                                <!-- vend -->
                                             </div> 
                                             </div>
                                              </div>
                                              </section>
                  </div>
                  <!-- pages end -->
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