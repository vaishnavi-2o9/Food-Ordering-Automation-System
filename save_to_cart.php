<?php
session_start();

// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    throw new Exception("Connection failed: " . $conn->connect_error);
}

// Check the table structure
function checkTableStructure($conn, $tableName) {
    $sql = "DESCRIBE $tableName";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $columns = array();
        while ($row = $result->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
        return $columns;
    } else {
        throw new Exception("No columns found in table $tableName");
    }
}

// Save cart items to the database
function saveCartItems($conn, $cartItems) {
    if (!is_array($cartItems)) {
        throw new Exception("Cart items must be an array");
    }

    $columns = checkTableStructure($conn, "cart");
    if (!in_array("item_name", $columns) || !in_array("item_prize", $columns) || !in_array("item_quantity", $columns)) {
        throw new Exception("Table structure is incorrect");
    }

    foreach ($cartItems as $key => $item) {
        // Remove the '₹' symbol from the price
        $itemPrice = str_replace('₹', '', $item['price']);
        $sql = "INSERT INTO cart (item_name, item_prize, item_quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $item['name'], $itemPrice, $item['quantity']);
        if ($stmt->execute()) {
            echo "Cart item saved successfully";
        } else {
            echo "Error saving cart item: " . $conn->error;
        }
        $stmt->close();
    }
}

try {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        saveCartItems($conn, $_SESSION['cart']);
    } else {
        echo "Cart is empty";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();

header('Location: name.php');
exit();
?>