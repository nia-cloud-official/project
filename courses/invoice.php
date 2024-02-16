<?php
// Include the db.php file to connect to the database and get the cart data
include './../db.php';
// Include the FPDF library
require_once('./../fpdf/fpdf.php');
// Start the session to store the cart items
session_start();
// Check if the cart session variable is set and not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  // Initialize the total variable to store the sum of the subtotals
  $total = 0;
  // Loop through the cart session variable
  foreach ($_SESSION['cart'] as $id => $quantity) {
    // Get the item from the database by its id
    $item = get_item($pdo, $id);
    // Calculate the subtotal by multiplying the price and the quantity
    $subtotal = $item['price'] * $quantity;
    // Add the subtotal to the total
    $total += $subtotal;
  }
  // Create a new FPDF object
  $pdf = new FPDF();
  // Set the document information
  $pdf->SetCreator('Cart Store');
  $pdf->SetAuthor('Cart Store');
  $pdf->SetTitle('Invoice');
  $pdf->SetSubject('Invoice');
  $pdf->SetKeywords('Invoice, Cart, Store');
  // Add a page
  $pdf->AddPage();
  // Set the font
  $pdf->SetFont('Arial', 'B', 20);
  // Write the title
  $pdf->Write(0, 'Invoice', '', 0, 'C', true, 0, false, false, 0);
  // Write a line break
  $pdf->Ln();
  // Write the date
  $pdf->Write(0, 'Date: ' . date('Y-m-d'), '', 0, 'R', true, 0, false, false, 0);
  // Write a line break
  $pdf->Ln();
  // Create a HTML table for the invoice items
  $html = '<table border="1" cellpadding="5" cellspacing="0">';
  $html .= '<tr>';
  $html .= '<th>Image</th>';
  $html .= '<th>Name</th>';
  $html .= '<th>Price</th>';
  $html .= '<th>Quantity</th>';
  $html .= '<th>Subtotal</th>';
  $html .= '</tr>';
  // Loop through the cart session variable and display each item in a row
  foreach ($_SESSION['cart'] as $id => $quantity) {
    // Get the item from the database by its id
    $item = get_item($pdo, $id);
    // Calculate the subtotal by multiplying the price and the quantity
    $subtotal = $item['price'] * $quantity;
    // Append the row to the HTML table
    $html .= '<tr>';
    $html .= '<td><img src="' . $item['image'] . '" width="100" height="100"></td>';
    $html .= '<td>' . $item['name'] . '</td>';
    $html .= '<td>$' . $item['price'] . '</td>';
    $html .= '<td>' . $quantity . '</td>';
    $html .= '<td>$' . number_format($subtotal, 2) . '</td>';
    $html .= '</tr>';
  }
  // Append the total row to the HTML table
  $html .= '<tr>';
  $html .= '<td colspan="4" align="right"><strong>Total</strong></td>';
  $html .= '<td>$' . number_format($total, 2) . '</td>';
  $html .= '</tr>';
  // Close the HTML table
  $html .= '</table>';
  // Write the HTML table to the PDF document
  $pdf->writeHTML($html, true, false, true, false, '');
  // Set the PDF document name
  $pdf->Output('invoice.pdf', 'I');
} else {
  // Display a message that the cart is empty
  echo "Your cart is empty. Please add some items to your cart.";
}
?>
