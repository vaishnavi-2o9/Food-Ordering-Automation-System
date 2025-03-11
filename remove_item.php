<?php
session_start();

// Check if the key is set in the POST request
if (isset($_POST['key'])) {
    // Get the key of the item to remove
    $key = $_POST['key'];

    // Check if the key exists in the cart
    if (isset($_SESSION['cart'][$key])) {
        // Remove the item from the cart
        unset($_SESSION['cart'][$key]);

        // Redirect back to the cart page
        header('Location: viewcart.php');
        exit;
    } else {
        // If the key does not exist, display an error message
        echo "Error: Item not found in cart.";
    }
} else {
    // If the key is not set, display an error message
    echo "Error: Key not provided.";
}
?>