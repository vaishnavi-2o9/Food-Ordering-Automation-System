<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customers";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($data['payer']['payer_id'])) {
    $transaction_id = $data['id'];
    $payer_id = $data['payer']['payer_id'];
    $payer_email = $data['payer']['email_address'];
    $amount = $data['purchase_units'][0]['amount']['value'];
    $currency = $data['purchase_units'][0]['amount']['currency_code'];
    $payment_status = $data['status'];

    $stmt = $conn->prepare("INSERT INTO payments (transaction_id, payer_id, payer_email, amount, currency, payment_status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $transaction_id, $payer_id, $payer_email, $amount, $currency, $payment_status);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>
