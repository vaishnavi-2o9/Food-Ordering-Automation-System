<?php
session_start(); // Start the session

// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check the table structure
$sql = "DESCRIBE cart";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['Field'] . "<br>";
    }
} else {
    echo "No columns found";
}

// Save cart items to the database
foreach ($_SESSION['cart'] as $key => $item) {
    $item_price = number_format($item['price'], 2);
    $sql = "INSERT INTO cart (item_name, item_prize) VALUES ('{$item['name']}', '$item_price')";
    if ($conn->query($sql) === TRUE) {
        echo "Cart item saved successfully";
    } else {
        echo "Error saving cart item: " . $conn->error;
    }
}

$conn->close(); // Close the database connection

header('Location: name.html');
exit();
?>