<?php
// Include the db.php file to connect to the database and get the course data
include './../db.php';
// Start the session to store the cart items
session_start();
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
  }
} else {
  // Redirect to the homepage if the cart is empty
  header('Location: index.php');
  exit();
}
// Check if the checkout form is submitted
if (isset($_SESSION['name'])) {
  // Get the form input values
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  // Validate the input values
  $errors = array();
  // Check if there are no errors
  if (empty($errors)) {
    // Prepare the SQL statement to insert the order details into the database
    $stmt = $pdo->prepare("INSERT INTO orders (name , status) VALUES (:name, 'pending')");
    // Bind the input values to the statement parameters
    $stmt->bindParam(':name', $name);
    // Execute the statement
    if ($stmt->execute()) {
      // Get the last inserted order id
      $order_id = $pdo->lastInsertId();
      // Loop through the cart session variable
      foreach ($_SESSION['cart'] as $id => $quantity) {
        // Get the course from the database by its id
        $course = get_course($pdo, $id);
        // Prepare the SQL statement to insert the order item details into the database
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, course_id, quantity, price) VALUES (:order_id, :course_id, :quantity, :price)");
        // Bind the order and course values to the statement parameters
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':course_id', $id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':price', $course['price']);
        // Execute the statement
        $stmt->execute();
      }
      // Clear the cart session variable
      unset($_SESSION['cart']);
      // Display a success message and a link to the invoice page
      echo "Your order has been placed successfully. Thank you for shopping with us.";
      echo "You can view your invoice from here: [Invoice](https://dcodemania.com/post/shopping-cart-with-checkout-system-php-mysqli-ajax)";
    } else {
      // Display an error message
      echo "There was a problem with your order. Please try again later.";
    }
  } else {
    // Display the errors
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}
?>
