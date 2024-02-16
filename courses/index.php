<?php
// Include the db.php file to connect to the database and get the courses data
include './../db.php';
// Get all the courses from the database
$courses = get_courses($pdo);
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
    <h1 class="text-center">Welcome to the Course Store</h1>
    <p class="text-center">Browse and buy the courses you want to learn.</p>
    <div class="row">
      <?php
      // Loop through the courses array and display each course in a card
      foreach ($courses as $course) {
        ?>
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <img src="<?php echo $course['image']; ?>" alt="<?php echo $course['name']; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $course['name']; ?></h5>
              <p class="card-text"><?php echo $course['description']; ?></p>
              <p class="card-text"><strong>$<?php echo $course['price']; ?></strong></p>
              <a href="course.php?id=<?php echo $course['id']; ?>" class="btn btn-primary">View Course</a>
              <a href="cart.php?action=add&id=<?php echo $course['id']; ?>" class="btn btn-success">Add to Cart</a>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</body>
</html>s