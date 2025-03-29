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

    // Check if the form data is valid
    if (empty($customerName) || empty($customerNumber)) {
        echo "Please fill in all fields.";
        exit();
    }

    echo "Customer Name: $customerName<br>";
    echo "Customer Number: $customerNumber<br>";

    // Get total items and total prize from the cart
    $totalItems = '';
    $totalPrize = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            $totalItems .= $item['name'] . ', ';
            // Remove the '₹' symbol from the price
            $price = str_replace('₹', '', $item['price']);
            $totalPrize += (int) $price;
        }
        $totalItems = rtrim($totalItems, ', ');
        $totalPrize = number_format($totalPrize, 2); // Removed the '₹' symbol here

        echo "Total Items: $totalItems<br>";
        echo "Total Prize: ₹$totalPrize<br>"; // Added the '₹' symbol here

        // Prepare the SQL query to insert the form data into the database
        $sql = "INSERT INTO users (customer_name, customer_number, total_items, total_prize, saved_at) VALUES (?, ?, ?, ?, NOW())";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ssss", $customerName, $customerNumber, $totalItems, $totalPrize);

        // Execute the query
        if ($stmt->execute()) {
            header("Location:index.php");
        } else {
            echo "Error inserting customer data: " . $stmt->error . "<br>";
            exit();
        }
    } else {
        echo "Cart is empty<br>";
        exit();
    }

    // Close the statement and connection
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();

    // Redirect to payment page
    header("Location:index.php");
    exit();
} else {
    echo "Invalid request method.";
    exit();
}
?>