<?php
session_start(); // Start the session

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to add items to the cart
function addToCart($item) {
    if (isset($_SESSION['cart'][$item])) {
        $_SESSION['cart'][$item]++;
    } else {
        $_SESSION['cart'][$item] = 1;
    }
}

// Check if an item is being added to the cart
if (isset($_GET['add'])) {
    $item = $_GET['add'];
    addToCart($item);
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barriecito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cart.css">
    <title>Cart Menu</title>
</head>
<body>
  
    <header>
        <div class="header-controls">
            <h1>Food Factory (All Dishes)</h1>
            <div class="search-container">
                <input type="text" id="search" placeholder="Search for a burger..." onclick="this.focus();">
                <button id="search-button">Search</button>
            </div>
        </div>
        <div class="dishes-header">
            <h2>All Dishes</h2>
            <div class="dishes-images">
                <!-- Example of a dish with add to cart functionality -->
                <div class="dishes-image">
                    <img src="burger.jpeg" alt="Great American Burger" onclick="addToCart('Burger')" style="cursor: pointer;">
                    <span class="details">Burger | Price: $5.99</span>
                </div>
                <!-- Repeat for other dishes -->
            </div>
            <nav class="menu">
                <!-- Your menu items here -->
            </nav>
        </div>
    </header>
    <div class="cart-section">
        <button class="view-cart-button" onclick="showCart()"> 
            <h2> View Cart: <span id="cart-count"><?php echo count($_SESSION['cart']); ?></span> items</h2>
         </button>
        <button class="pay-now-button" onclick="payNow();">Pay Now</button>
    </div>
    <script src="cart.js"></script>
</body>
</html>