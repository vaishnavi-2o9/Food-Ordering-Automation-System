<?php
session_start(); // Start the session

// Clear the cart
unset($_SESSION['cart']);

// Redirect back to the cart page
header('Location: viewcart.php');
exit();
?>