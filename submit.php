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

<<<<<<< HEAD
    // Validate the form data
    $errors = [];
    if (empty($customerName)) {
        $errors[] = "Please enter the customer name.";
    }
    if (empty($customerNumber)) {
        $errors[] = "Please enter the customer number.";
    }
=======
    // Validate inpuzts
    if (!empty($customerName) && !empty($customerNumber)) {
        try {
            // Create a PDO connection to the database
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> 8c6a493ca60c9a5ac4596293c57644e2c982d0f9

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
            echo "Customer data inserted successfully.";
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