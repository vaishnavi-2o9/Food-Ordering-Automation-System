<?php
// Configuration
$successPage = 'success.html';
$errorPage = 'error.html';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the transaction ID from the form
    $transactionID = $_POST['transaction-id'];

    // Basic validation
    if (strlen($transactionID) > 8) {
        // Verify the transaction ID (replace with your own verification logic)
        // For demonstration purposes, we'll assume the transaction ID is valid
        $isValid = true;

        if ($isValid) {
            // Redirect to the success page
            header('Location: ' . $successPage);
            exit;
        } else {
            // Redirect to the error page
            header('Location: ' . $errorPage);
            exit;
        }
    } else {
        // Redirect to the error page
        header('Location: ' . $errorPage);
        exit;
    }
} else {
    // Redirect to the error page if the form hasn't been submitted
    header('Location: ' . $errorPage);
    exit;
}
?>