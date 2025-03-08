<?php
session_start(); // Start the session

// Check if the key is set
if (isset($_POST['key'])) {
    // Remove the item from the cart
    unset($_SESSION['cart'][$_POST['key']]);

    // Re-index the cart array
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Redirect back to the cart page
    header('Location: viewcart.php');
    exit;
} else {
    // If the key is not set, redirect back to the cart page
    header('Location: viewcart.php');
    exit;
}
?>