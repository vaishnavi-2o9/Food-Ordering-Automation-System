<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaction_id = $_POST['transaction_id'];

    if (!empty($transaction_id)) {
        $sql = "INSERT INTO payments (transaction_id) VALUES ('$transaction_id')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Payment Recorded Successfully!'); window.location.href='payment.html';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<script>alert('Please enter a valid Transaction ID'); window.history.back();</script>";
    }
}

$conn->close();
?>
