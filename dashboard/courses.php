<?php 
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ./../login.php');
	exit;
}
?>

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
                  <p class="mb-1 text-black"><?php echo $_SESSION['name'];?></p>
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
              <a class="nav-link" href="./">
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
              <a class="nav-link active" href="#">
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
                <a href="./../courses/"> 
                  <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a Course</button>
                </a>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            <br><br><br>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Your Courses</h4>
                    <div class="table-responsive">
                    <?php
// Include the db.php file to connect to the database and get the course data
include './../db.php';
// Check if the user is logged in
if (isset($_SESSION['name'])) {
  // Get the session name from the session variable
  $name = $_SESSION['name'];
  // Prepare the SQL statement to get the order details by the name
  $stmt = $pdo->prepare("SELECT * FROM orders WHERE name = :name");
  // Bind the name to the statement parameter
  $stmt->bindParam(':name', $name);
  // Execute the statement
  $stmt->execute();
  // Fetch the order data as an associative array
  $order = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if the order exists
  if ($order) {
    // Get the order status from the order data
    $status = $order['status'];
    // Check if the order status is paid
    if ($status == 'paid') {
      // Display a message that the user has paid for their courses
      echo "You have paid for your courses. Here are the courses you have purchased:";
      // Prepare the SQL statement to get the order items by the order id
      $stmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id = :order_id");
      // Bind the order id to the statement parameter
      $stmt->bindParam(':order_id', $order['order_id']);
      // Execute the statement
      $stmt->execute();
      // Fetch the order items as an associative array
      $order_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // Loop through the order items and display each course in a card
      foreach ($order_items as $order_item) {
        // Get the course from the database by its id
        $course = get_course($pdo, $order_item['course_id']);
        // Display the course image, name, and price in a card
        echo "<br><br>";
        echo "<div class='wrap'>";
        echo "<div class='box'>";
        echo "<div class='box-top'>";
        echo "<img class='box-image' src='{$course['image']}' alt='{$course['name']}' class='card-img-top'>";
        echo "<div class=''>";
        echo "<div class='title-flex'>";
        echo "<h3 class='box-title'>{$course['name']}</h3>";
        echo "<p class='user-follow-info'>$ {$course['price']}</p>";
        echo "<p href='#' class='description'>{$course['description']}</p>";
        echo "</div>";
        echo "<a href='./class/{$course['name']}/' class='button'>Continue &rightarrow;</a>";
        echo "</div>";
      }
    } else {
      // Display a message that the user has a pending payment
      echo "You have a pending payment for your order. Please complete the payment to access your courses.";
    }
  } else {
    // Display a message that the user has no orders
    echo " <a href='./../courses/'> <button class='btn btn-outline-primary'>Add <i class='mdi mdi-plus menu-icon'></i></button></a>";
  }
} else {
  // Display a message that the user is not logged in
  echo "You are not logged in. Please log in or register to access your courses.";
}
?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <style>

.wrap h3 {
  font-size: 1.5em;
  font-weight: 700;
}

.wrap p {
  font-size: 1em;
  line-height: 1.7;
  font-weight: 300;
  color: var(--text-gray);
}

.description {
  white-space: wrap;
}

a {
  text-decoration: none;
  color: inherit;
}

.wrap {
  align-items: stretch;
  width: 300px;
  gap: 24px;
  padding: 24px;
  flex-wrap: wrap;
}

.box {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  position: relative;
  padding: 5px;
  background: #fff;
  width: 300px;
  box-shadow: 1px 1px 2px  1px black;
}

.box-top {
  display: flex;
  flex-direction: column;
  position: relative;
  gap: 12px;
}

.box-image {
  width: 23.4vw;
  height: 200px;
  object-fit: fill;
}

.title-flex {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.box-title {
  border-left: 3px solid var(--purple);
  padding-left: 12px;
}

.user-follow-info {
  color: hsl(0, 0%, 60%);
}

.button {
  display: block;
  justify-content: center;
  align-items: center;
  text-align: center;
  margin-top: auto;
  padding: 16px;
  color: #000;
  background: transparent;
  box-shadow: 0px 0px 0px 1px black inset;
  transition: background 0.4s ease;
}

.button:hover {
  background: var(--purple);
}

.fill-one {
  background: var(--light-bg);
}

.fill-two {
  background: var(--pink);
}

/* RESPONSIVE QUERIES */

@media (min-width: 320px) {
  .title-flex {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 460px) {
  .title-flex {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 640px) {
  .box {
    flex-basis: calc(50% - 12px);
  }
  .title-flex {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 840px) {
  .title-flex {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 1024px) {
  .box {
    flex-basis: calc(33.3% - 16px);
  }
  .title-flex {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 1100px) {
  .box {
    flex-basis: calc(25% - 18px);
  }
}

         </style>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © COH & S 2024</span>
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