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



    if (!empty($errors)) {
        echo implode("<br>", $errors);
    } else {
        // Prepare the SQL query to insert the form data into the database
        $sql = "INSERT INTO users (customer_name, customer_number) VALUES (?, ?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("ss", $customerName, $customerNumber);

        // Execute the query
        if ($stmt->execute()) {
            header("Location:payment.html");
        } else {
            echo "Error inserting customer data: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Invalid request method.";
}
?>
