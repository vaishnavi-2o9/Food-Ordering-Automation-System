=<?php
session_start();

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [
            'burgers' => [],
            'dips' => [],
            'drinks' => [],
            'prizes' => []
        ];
    }

    // Handle adding burgers
    if (isset($_POST['burger_name']) && isset($_POST['burger_price']) && isset($_POST['burger_quantity'])) {
        $burgerName = $_POST['burger_name'];
        $burgerPrice = floatval($_POST['burger_price']);
        $burgerQuantity = intval($_POST['burger_quantity']);

        // Add the burger to the cart
        if ($burgerQuantity > 0) {
            $_SESSION['cart']['burgers'][] = [
                'name' => $burgerName,
                'price' => $burgerPrice,
                'quantity' => $burgerQuantity
            ];
            echo "Burger added to cart.";
        } else {
            echo "Invalid quantity for burger.";
        }
    }

    // Handle adding dips
    if (isset($_POST['dip_name']) && isset($_POST['dip_price']) && isset($_POST['dip_quantity'])) {
        $dipName = $_POST['dip_name'];
        $dipPrice = floatval($_POST['dip_price']);
        $dipQuantity = intval($_POST['dip_quantity']);

        // Add the dip to the cart
        if ($dipQuantity > 0) {
            $_SESSION['cart']['dips'][] = [
                'name' => $dipName,
                'price' => $dipPrice,
                'quantity' => $dipQuantity
            ];
            echo "Dip added to cart.";
        } else {
            echo "Invalid quantity for dip.";
        }
    }

    // Handle adding drinks
    if (isset($_POST['drink_name']) && isset($_POST['drink_price']) && isset($_POST['drink_quantity'])) {
        $drinkName = $_POST['drink_name'];
        $drinkPrice = floatval($_POST['drink_price']);
        $drinkQuantity = intval($_POST['drink_quantity']);

        // Add the drink to the cart
        if ($drinkQuantity > 0) {
            $_SESSION['cart']['drinks'][] = [
                'name' => $drinkName,
                'price' => $drinkPrice,
                'quantity' => $drinkQuantity
            ];
            echo "Drink added to cart.";
        } else {
            echo "Invalid quantity for drink.";
        }
    }

    // Handle adding prizes
    if (isset($_POST['prize_name']) && isset($_POST['prize_price']) && isset($_POST['prize_quantity'])) {
        $prizeName = $_POST['prize_name'];
        $prizePrice = floatval($_POST['prize_price']);
        $prizeQuantity = intval($_POST['prize_quantity']);

        // Add the prize to the cart
        if ($prizeQuantity > 0) {
            $_SESSION['cart']['prizes'][] = [
                'name' => $prizeName,
                'price' => $prizePrice,
                'quantity' => $prizeQuantity
            ];
            echo "Prize added to cart.";
        } else {
            echo "Invalid quantity for prize.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>