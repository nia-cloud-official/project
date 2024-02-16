<?php
// Include the db.php file to connect to the database and get the course data
include './../db.php';
// Start the session to store the cart items
session_start();
// Check if the action parameter is set in the URL
if (isset($_GET['action'])) {
  // Get the action parameter from the URL
  $action = $_GET['action'];
  // Switch the action parameter to handle different cases
  switch ($action) {
    // Case 1: Add a course to the cart
    case 'add':
      // Check if the id parameter is set in the URL
      if (isset($_GET['id'])) {
        // Get the id parameter from the URL
        $id = $_GET['id'];
        // Check if the cart session variable is set
        if (isset($_SESSION['cart'])) {
          // Check if the course is already in the cart
          if (array_key_exists($id, $_SESSION['cart'])) {
            // Increment the quantity of the course by one
            $_SESSION['cart'][$id]++;
          } else {
            // Add the course to the cart with a quantity of one
            $_SESSION['cart'][$id] = 1;
          }
        } else {
          // Create the cart session variable as an associative array
          $_SESSION['cart'] = array();
          // Add the course to the cart with a quantity of one
          $_SESSION['cart'][$id] = 1;
        }
      }
      // Redirect to the cart page
      header('Location: cart.php');
      exit();
      break;
    // Case 2: Remove a course from the cart
    case 'remove':
      // Check if the id parameter is set in the URL
      if (isset($_GET['id'])) {
        // Get the id parameter from the URL
        $id = $_GET['id'];
        // Check if the cart session variable is set
        if (isset($_SESSION['cart'])) {
          // Check if the course is in the cart
          if (array_key_exists($id, $_SESSION['cart'])) {
            // Decrement the quantity of the course by one
            $_SESSION['cart'][$id]--;
            // Check if the quantity of the course is zero
            if ($_SESSION['cart'][$id] == 0) {
              // Remove the course from the cart
              unset($_SESSION['cart'][$id]);
            }
          }
        }
      }
      // Redirect to the cart page
      header('Location: cart.php');
      exit();
      break;
    // Case 3: Clear the cart
    case 'clear':
      // Check if the cart session variable is set
      if (isset($_SESSION['cart'])) {
        // Unset the cart session variable
        unset($_SESSION['cart']);
      }
      // Redirect to the cart page
      header('Location: cart.php');
      exit();
      break;
    // Default case: Invalid action
    default:
      // Redirect to the homepage
      header('Location: index.php');
      exit();
      break;
  }
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
    <h1 class="text-center">Your Shopping Cart</h1>
    <p class="text-center">Review and modify the courses you have added to your cart.</p>
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Subtotal</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Check if the cart session variable is set and not empty
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
              // Initialize the total variable to store the sum of the subtotals
              $total = 0;
              // Loop through the cart session variable
              foreach ($_SESSION['cart'] as $id => $quantity) {
                // Get the course from the database by its id
                $course = get_course($pdo, $id);
                // Calculate the subtotal by multiplying the price and the quantity
                $subtotal = $course['price'] * $quantity;
                // Add the subtotal to the total
                $total += $subtotal;
                ?>
                <tr>
                  <td><img src="<?php echo $course['image']; ?>" alt="<?php echo $course['name']; ?>" class="img-thumbnail"></td>
                  <td><?php echo $course['name']; ?></td>
                  <td>$<?php echo $course['price']; ?></td>
                  <td><?php echo $quantity; ?></td>
                  <td>$<?php echo number_format($subtotal, 2); ?></td>
                  <td>
                    <a href="cart.php?action=remove&id=<?php echo $course['id']; ?>" class="btn btn-danger">Remove</a>
                  </td>
                </tr>
                <?php
              }
              ?>
              <tr>
                <td colspan="4" class="text-right"><strong>Total</strong></td>
                <td>$<?php echo number_format($total, 2); ?></td>
                <td>
                  <a href="cart.php?action=clear" class="btn btn-warning">Clear Cart</a>
                  <a href="checkout.php" class="btn btn-success">Done</a>
                </td>
              </tr>
              <?php
            } else {
              // Display a message if the cart is empty
              ?>
              <tr>
                <td colspan="6" class="text-center">Your cart is empty.</td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
