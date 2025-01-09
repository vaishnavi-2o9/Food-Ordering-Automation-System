<?php
// Database connection details
$host = "localhost"; // Database host
$dbname = "customer"; // Database name
$username = "root"; // Database username
$password = ""; // Database password

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customerName = htmlspecialchars($_POST['customer_name']);
    $customerNumber = htmlspecialchars($_POST['customer_number']);

    // Validate inpuzts
    if (!empty($customerName) && !empty($customerNumber)) {
        try {
            // Create a PDO connection to the database
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL query to insert data into the `users` table
            $sql = "INSERT INTO users (customer_name, customer_number) VALUES (:customer_name, :customer_number)";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':customer_name', $customerName);
            $stmt->bindParam(':customer_number', $customerNumber);

            // Execute the query
            $stmt->execute();

            // Display success message
            echo "<h2>Form Submitted Successfully!</h2>";
            echo "<p><strong>Customer Name:</strong> $customerName</p>";
            echo "<p><strong>Customer Number:</strong> $customerNumber</p>";
        } catch (PDOException $e) {
            // Display error message if database connection or query fails
            echo "<h2>Error: " . $e->getMessage() . "</h2>";
        } finally {
            // Close the database connection
            $conn = null;
        }
    } else {
        // Display error message if fields are empty
        echo "<h2>Error: Please fill out all fields.</h2>";
    }
} else {
    // Display error if the form is not submitted
    echo "<h2>Error: Form not submitted.</h2>";
}
?>