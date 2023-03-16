<?php
  // Create database connection
  session_start();
  $db = mysqli_connect("localhost", "root", "", "db");
  
  if($_SESSION['ADMIN_USERNAME']==false){
    header('location:login.php');
  }
  //login
  $admin=$_SESSION['ADMIN_USERNAME'];
  $sql="SELECT * FROM `admin_user` WHERE username='$admin' ";
  $result = mysqli_query($db,$sql);
  $data = mysqli_fetch_assoc($result);
//close
?>