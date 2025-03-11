<?php
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

    // Prepare the SQL query to insert the form data into the database
    $sql = "INSERT INTO users (customer_name, customer_number) VALUES (?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ss", $customerName, $customerNumber);

    // Execute the query
    if ($stmt->execute()) {
        // Get the last inserted ID
        $lastId = $conn->insert_id;

        // Save cart items to the database
        foreach ($_SESSION['cart'] as $key => $item) {
            $itemPrice = number_format($item['price'], 2);
            $sql = "INSERT INTO prize (customer_name, customer_number, item_name, item_prize, total, added_on) VALUES (?, ?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $customerName, $customerNumber, $item['name'], $itemPrice, $itemPrice);
            if ($stmt->execute()) {
                echo "Cart item saved successfully";
            } else {
                echo "Error saving cart item: " . $stmt->error;
            }
        }

        // Retrieve cart items from the database
        $sql = "SELECT item_name, item_prize FROM prize WHERE customer_name = ? AND customer_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $customerName, $customerNumber);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Item Name: " . $row['item_name'] . " - Item Prize: " . $row['item_prize'] . "<br>";
                }
            } else {
                echo "No data found";
            }
        } else {
            echo "Error retrieving cart items: " . $stmt->error;
        }

        // Calculate total prize
        $sql = "SELECT SUM(item_prize) AS total_prize FROM prize WHERE customer_name = ? AND customer_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $customerName, $customerNumber);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Total Prize: " . $row['total_prize'];
                }
            } else {
                echo "No data found";
            }
        } else {
            echo "Error calculating total prize: " . $stmt->error;
        }

        header("Location:payment.html");
    } else {
        echo "Error inserting customer data: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>