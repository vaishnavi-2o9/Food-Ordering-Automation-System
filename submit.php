<?php
// Start the session
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $customerName = trim($_POST["customer_name"] ?? '');
    $customerNumber = trim($_POST["customer_number"] ?? '');
    $orderType = trim($_POST["order-type"] ?? '');

    // Check if the form data is valid
    if (empty($customerName) || empty($customerNumber) || empty($orderType)) {
        echo "Please fill in all fields.";
        exit();
    }

    // Get total items, total prize and total quantity from the cart
    $totalItems = '';
    $totalQuantity = 0;
    $totalPrize = 0;
    
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $totalItems .= $item['name'] . ' x ' . $item['quantity'] . ', ';
            $totalQuantity += $item['quantity'];
            $price = (float)str_replace('₹', '', $item['price']);
            $total += $price * $item['quantity'];
        }
        $totalItems = rtrim($totalItems, ', ');
        $totalPrize = $total;

        // ✅ FIXED: REMOVED 'order_type' column - using only existing columns
        $sql = "INSERT INTO users (customer_name, customer_number, total_items, total_quantity, total_prize, saved_at) VALUES (?, ?, ?, ?, ?, NOW())";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // ✅ FIXED: Bind only 5 parameters (no order_type)
        $stmt->bind_param("sssss", $customerName, $customerNumber, $totalItems, $totalQuantity, $totalPrize);

        // Execute the query
        if ($stmt->execute()) {
            // Clear cart after successful order
            unset($_SESSION['cart']);
            
            $stmt->close();
            $conn->close();
            
            header("Location: payment.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        echo "Cart is empty";
        exit();
    }
} else {
    echo "Invalid request method.";
}
$conn->close();
?>