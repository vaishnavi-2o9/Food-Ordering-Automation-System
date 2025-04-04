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
} else {
    echo "Database connection successful<br>";
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
            // Remove the '₹' symbol from the price
            $price = str_replace('₹', '', $item['price']);
            $total += intval($price) * $item['quantity']; // Add item price to the total
        }
        $totalItems = rtrim($totalItems, ', ');
        $totalPrize = $total; // Save the total price

        // Prepare the SQL query to insert the form data into the database
        $sql = "INSERT INTO users (customer_name, customer_number, order_type, total_items, total_quantity, total_prize, saved_at) VALUES (?, ?, ?, ?, ?, ?, NOW())";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ssssss", $customerName, $customerNumber, $orderType, $totalItems, $totalQuantity, $totalPrize);

        // Print the query and values
        echo "Query: $sql<br>";
        echo "Values: $customerName, $customerNumber, $orderType, $totalItems, $totalQuantity, $totalPrize<br>";

        // Execute the query
        if ($stmt->execute()) {
            // Close the statement and connection
            $stmt->close();
            $conn->close();

            // Redirect to payment page
            header("Location:index.php");
            exit();
        } else {
            echo "Error inserting customer data: " . $stmt->error . "<br>";
            exit();
        }
    } else {
        echo "Cart is empty<br>";
        exit();
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>