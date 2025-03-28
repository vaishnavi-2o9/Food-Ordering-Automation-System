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

    // Update the price to Indian Rupee (₹)
    foreach ($_SESSION['cart'] as &$item) {
        $item['price'] = '₹' . $item['price'];
    }

 // Display a popup
echo '<script>';
echo 'alert("Item added to cart successfully!\nItem: ' . $item_name . '\nPrice: ' . $item_price . '");';
echo 'window.location.href = "burger.html";';
echo '</script>';
exit();
}
?>