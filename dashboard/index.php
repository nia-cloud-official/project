<?php 
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ./../login.php');
	exit;
}?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php $_SESSION['name'];?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between"> 
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="./../assets/Logo.png" style="height: 40px;" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="./../assets/mini-logo.png" alt="logo" style="height:40px;width:40px;"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="search lesson">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Welcome Back, <?=htmlspecialchars($_SESSION['name'], ENT_QUOTES)?>!</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper"  style="width:90vw">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" 
        id="sidebar">
          <ul class="nav"><br><br><br><br>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Study Hub</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">AI Chatbot</span>
                <i class="mdi mdi-chat menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Test Results</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./courses.php">
                <span class="menu-title">My Courses</span>
                <i class="mdi mdi-chart-line menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">My Profile</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Courses</h6>
                </div>
                <a href="coursesStore.php"> 
                  <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a Course</button>
                </a>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel" style="padding-top:50px;">
          <div class="content-wrapper">
            <div class="page-header">
            <br><br>
            </div> 
            <center>
            <!-- Register for a course -->
             <div class="col-md-6 grid-margin stretch-card" style="width:300px;">
              <div class="card" style=>  
                <img src="https://th.bing.com/th/id/OIP.3ZC4y8AM8ks8fA8ldL8qbgHaFj?rs=1&pid=ImgDetMain" style="height: 200px;" alt=""/>
                  <div class="card-body">
                    <h4 class="card-title">Register for a Course</h4>
                    <p class="card-description">You can register for a course here!</p>
                    <center>
                    <button class="btn btn-block btn-lg btn-gradient-primary mt-4">Register Now</button>  
                    </center>
                  </div>
              </div>
            </div> 
            <!-- The timetable for examinations -->
            <div class="col-md-6 grid-margin stretch-card" style="width:300px;">
              <div class="card" style=>  
                <img src="https://th.bing.com/th/id/OIP.fwAyK6jlHifRjOYJISTEjwHaFT?rs=1&pid=ImgDetMain" style="height: 200px;" alt=""/>
                  <div class="card-body">
                    <h4 class="card-title">Examinations Timetable</h4>
                    <p class="card-description">Check and Stay upto date with upcoming exams</p>
                    <center>
                    <button class="btn btn-block btn-lg btn-gradient-primary mt-4">Checkout</button>  
                    </center>
                  </div>
              </div>
            </div>
          </center>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © COH & S  @<script>let date = new Date; document.write(date.getFullYear());</script></span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="mailto:support@cohs.education/" target="_blank">support@cohs.education</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>