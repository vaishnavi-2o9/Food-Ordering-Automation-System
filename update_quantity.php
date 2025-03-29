<?php
session_start();

if (isset($_POST['key']) && isset($_POST['action'])) {
    $key = $_POST['key'];

    if (isset($_SESSION['cart'][$key])) {
        if ($_POST['action'] == 'increase') {
            $_SESSION['cart'][$key]['quantity']++;
        } elseif ($_POST['action'] == 'decrease' && $_SESSION['cart'][$key]['quantity'] > 1) {
            $_SESSION['cart'][$key]['quantity']--;
        } elseif ($_POST['action'] == 'remove') {
            unset($_SESSION['cart'][$key]);
        }
    }
}

// Redirect back to cart page
header("Location: viewcart.php");
exit;
?>
