<?php
session_start(); // Start the session

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h1>Your Cart is Empty</h1>";
} else {
    echo "<h1>Your Cart</h1>";
    echo "<ul>";
    $total = 0; // Initialize total price

    // Loop through each item in the cart
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>{$item['name']} - \${$item['price']}</li>";
        $total += $item['price']; // Add item price to the total
    }

    echo "</ul>";
    echo "<h3>Total: \${$total}</h3>"; // Display the total price

    // Add a button to clear the cart
    echo '<form action="clear_cart.php" method="post">
              <button type="submit">Clear Cart</button>
          </form>';
}
?>