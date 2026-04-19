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
        $total = 0; // Initialize total price
        foreach ($_SESSION['cart'] as $key => $item) {
            $totalItems .= $item['name'] . ' x ' . $item['quantity'] . ', ';
            $totalQuantity += $item['quantity'];
            // Remove the '₹' symbol from the price and convert to float
            $price = (float)str_replace('₹', '', $item['price']);
            $total += $price * $item['quantity'];
        }
        $totalItems = rtrim($totalItems, ', ');
        $totalPrize = $total; // Save the total price

        // **FIXED QUERY** - Check your table structure and adjust column names accordingly
        // Option 1: If your table has column 'order_type' - uncomment this
        $sql = "INSERT INTO users (customer_name, customer_number, order_type, total_items, total_quantity, total_prize, saved_at) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        
        // Option 2: If column is named differently (like 'orderType'), use this:
        // $sql = "INSERT INTO users (customer_name, customer_number, orderType, total_items, total_quantity, total_prize, saved_at) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        
        // Option 3: If you don't have order_type column, use this:
        // $sql = "INSERT INTO users (customer_name, customer_number, total_items, total_quantity, total_prize, saved_at) VALUES (?, ?, ?, ?, ?, NOW())";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("sssss", $customerName, $customerNumber, $totalItems, $totalQuantity, $totalPrize);

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind the parameters (adjust based on your chosen SQL query above)
        $stmt->bind_param("ssssss", $customerName, $customerNumber, $orderType, $totalItems, $totalQuantity, $totalPrize);

        // Print the query and values for debugging (remove in production)
        echo "Query: $sql<br>";
        echo "Values: $customerName, $customerNumber, $orderType, $totalItems, $totalQuantity, $totalPrize<br>";

        // Execute the query
        if ($stmt->execute()) {
            // Clear cart after successful order
            unset($_SESSION['cart']);
            
            // Close the statement and connection
            $stmt->close();
            $conn->close();

            // Redirect to payment page
            header("Location: payment.php");
            exit();
        } else {
            echo "Error inserting customer data: " . $stmt->error . "<br>";
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        echo "Cart is empty<br>";
        $conn->close();
        exit();
    }
} else {
    echo "Invalid request method.";
    exit();
}

$conn->close();
?>