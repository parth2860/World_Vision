<?php
 include 'conn.php';



function get_safe_value($db,$str){
  if($str!=''){
    $str=trim($str);
    return mysqli_real_escape_string($db,$str);
  }
}
//approve or rejected
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($db,$_GET['type']);
  if($type=='approve'){
    $id=get_safe_value($db,$_GET['id']);
    $d_sql="UPDATE `feedback` SET `status`='0' WHERE id='$id'";
    mysqli_query($db,$d_sql);
  }
}

if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($db,$_GET['type']);
  if($type=='reject'){
    $id=get_safe_value($db,$_GET['id']);
    $de_sql="UPDATE `feedback` SET `status`='1' WHERE id='$id'";
    mysqli_query($db,$de_sql);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Blank | Creative - Bootstrap 3 Responsive Admin Template</title>
  
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Nice <span class="lite">Admin</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <li id="task_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-task-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 5 pending tasks</p>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Design PSD </div>
                    <div class="percent">90%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                      <span class="sr-only">90% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">
                      Project 1
                    </div>
                    <div class="percent">30%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                      <span class="sr-only">30% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Digital Marketing</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Logo Designing</div>
                    <div class="percent">78%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                      <span class="sr-only">78% Complete (danger)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Mobile App</div>
                    <div class="percent">50%</div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                      <span class="sr-only">50% Complete</span>
                    </div>
                  </div>

                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 5 new messages</p>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Greg  Martin</span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Bob   Mckenzie</span>
                                    <span class="time">5 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, What is next project plan?
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Phillip   Park</span>
                                    <span class="time">2 hrs</span>
                                    </span>
                                    <span class="message">
                                        I am like to buy this Admin Template.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Ray   Munoz</span>
                                    <span class="time">1 day</span>
                                    </span>
                                    <span class="message">
                                        Icon fonts are great.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">7</span>
                        </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 4 new notifications</p>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span>
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span>
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/india.png">
                            </span>
                            <span class="username"><?php echo $data['username']; ?> </span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="alluser.php">
                          <i class="icon_documents_alt"></i>
                          <span>ALL USER</span>
                      </a>
          </li>
          <li class="">
            <a class="sub" href="post.php">
                          <i class="icon_documents_alt"></i>
                          <span>Post</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="category.php">
                          <i class="icon_documents_alt"></i>
                          <span>All Post</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="addcat.php">
                          <i class="icon_documents_alt"></i>
                          <span>Manage Category</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="heading.php">
                          <i class="icon_documents_alt"></i>
                          <span>Headline</span>
                      </a>
          </li>
          
          

          <li>
            <a class="" href="aboutus.php">
                          <i class="icon_piechart"></i>
                          <span>About Us</span>

                      </a>

          </li>

          <li>
            <a class="" href="feedback.php">
                          <i class="icon_piechart"></i>
                          <span>Feedback</span>

                      </a>

          </li>
          <li>
            <a class="" href="contactus.php">
                          <i class="icon_mobile"></i>
                          <span>Contact Us</span>

                      </a>

          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Feedback Approvel</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Feedback</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <?php
        
        $results_per_page = 10;
        $sql = "select * from feedback ORDER BY `id` DESC";
        $result = $db->query($sql);
        $number_of_results = mysqli_num_rows($result);
        $number_of_pages = ceil($number_of_results/$results_per_page);

            if(!isset($_GET['page'])) {
              $page = 1;
            }else{
              $page =$_GET['page'];
            }

            $this_page_first_result = ($page-1)*$results_per_page;
          
          if($result->num_rows > 0) {
           
        
          echo '
          <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th scope="col"> userName </th>
              <th scope="col"> Email </th>
              <th scope="col"> Topic </th>
              <th scope="col"> Feedback </th>
              <th scope="col"> Action</th>
            </tr>
          </thead>
          <tbody>'; 
              $result = mysqli_query($db ,"SELECT * from feedback ORDER BY `id` DESC LIMIT $this_page_first_result,$results_per_page");
              while($row = mysqli_fetch_array($result)){
          echo '<tr>';
             echo '<td>'.$row["username"].'</td>';
             echo '<td>'.$row["email"].'</td>';
             echo '<td>'.$row["topic"].'</td>';
             echo '<td>'.$row["feed"].'</td>';
             if($row['status']==!0){
              echo "<td> <span  class='btn btn-success btn-sm'><a href='?type=approve&id=".$row['id']."'>approved</a></span> </td>";}
               else{ 
              echo "<td> <span  class='btn btn-danger btn-sm'><a href='?type=reject&id=".$row['id']."'>rejected</a></span> </td>"  ;}
             /*echo '<td> <button type="submit" class="btn btn-success btn-sm"> Approve </button> | <button type="submit" class="btn btn-danger btn-sm"> Decline </button> </td>
            </tr>'*/
            echo '</tr>';;
         }
        echo '</tbody>
        </table>';
        for($page=1;$page<=$number_of_pages;$page++){
          echo '
          <tr>
              <td align=center> <a href="feedback.php?page='.$page.'">' .$page. '</a>  ';
          echo '
          </td>
          </tr>';
        }

        }else
        {
          echo '
          <table class="table table-striped table-advance table-hover>
          <thead>
            <tr>
              <th scope="col"> Name </th>
              <th scope="col"> Email </th>
              <th scope="col"> Username </th>
              <th scope="col"> Action</th>
            </tr>
          </thead>';
        }

        

        ?>


        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
    </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
