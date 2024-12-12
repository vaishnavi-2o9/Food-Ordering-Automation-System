<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Your Cart</title>
</head>
<body>
    <header>
        <h1>Your Cart</h1>
    </header>
    <div class="cart-items">
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item => $quantity): ?>
                    <li><?php echo htmlspecialchars($item); ?> - Quantity: <?php echo $quantity; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="cart-actions">
        <a href="index.php">Continue Shopping</a>
        <button onclick="payNow();">Pay Now</button>
    </div>
</body>
</html>