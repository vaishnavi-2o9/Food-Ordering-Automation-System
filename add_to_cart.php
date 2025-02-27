<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve item details from the form
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the item to the cart
    $_SESSION['cart'][] = [
        'name' => $item_name,
        'price' => $item_price
    ];

    // Redirect back to the cake menu
    header('Location: cart.html');
    exit();
}
?>