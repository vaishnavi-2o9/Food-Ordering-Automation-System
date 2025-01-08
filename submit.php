<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $customer_number = $_POST['customer_number'];

    // Validate and sanitize the input (optional but recommended)
    $customer_name = htmlspecialchars(trim($customer_name));
    $customer_number = htmlspecialchars(trim($customer_number));

    // Display the submitted data
    echo "<h1>Order Submitted Successfully!</h1>";
    echo "<p><strong>Customer Name:</strong> $customer_name</p>";
    echo "<p><strong>Customer Number:</strong> $customer_number</p>";

    // You can also save the data to a database or perform other actions here
} else {
    // If the form is not submitted, redirect back to the form
    header("Location: name.html");
    exit();
}
?>