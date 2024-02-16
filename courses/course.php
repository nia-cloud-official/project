<?php
// Include the db.php file to connect to the database and get the course data
include './../db.php';
// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
  // Get the id parameter from the URL
  $id = $_GET['id'];
  // Get the course from the database by its id
  $course = get_course($pdo, $id);
} else {
  // Redirect to the homepage if the id parameter is not set
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Store</title>
  <!-- Link to the Bootstrap CDN for the grid system and some basic styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link to the custom CSS file for the additional styles -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center">Course Details</h1>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <img src="<?php echo $course['image']; ?>" alt="<?php echo $course['name']; ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $course['name']; ?></h5>
            <p class="card-text"><?php echo $course['description']; ?></p>
            <p class="card-text"><strong>$<?php echo $course['price']; ?></strong></p>
            <a href="cart.php?action=add&id=<?php echo $course['id']; ?>" class="btn btn-success">Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
