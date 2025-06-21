<?php
session_start();

// Enable error reporting (for development only)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection credentials
$servername = "localhost";
$username = "root";
$password = ""; // Change this if your root has a password
$dbname = "customer";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection error
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Function to check if the 'cart' table has required columns
function checkTableStructure($conn, $tableName) {
    $sql = "DESCRIBE `$tableName`";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $columns = array();
        while ($row = $result->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
        return $columns;
    } else {
        throw new Exception("No columns found or table `$tableName` does not exist.");
    }
}

// Function to save cart items
function saveCartItems($conn, $cartItems) {
    if (!is_array($cartItems)) {
        throw new Exception("Cart items must be an array.");
    }

    $columns = checkTableStructure($conn, "cart");

    if (!in_array("item_name", $columns) || !in_array("item_prize", $columns) || !in_array("item_quantity", $columns)) {
        throw new Exception("Table `cart` structure is incorrect. Required columns are missing.");
    }

    foreach ($cartItems as $item) {
        // Remove any currency symbol and cast to integer
        $itemPrice = (int)str_replace(['₹', ','], '', $item['price']);
        $itemName = $item['name'];
        $itemQty = (int)$item['quantity'];

        $sql = "INSERT INTO cart (item_name, item_prize, item_quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }

        $stmt->bind_param("sii", $itemName, $itemPrice, $itemQty);

        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        $stmt->close();
    }
}

try {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        saveCartItems($conn, $_SESSION['cart']);
    } else {
        echo "Cart is empty.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn->close();

// Redirect to name.php
header("Location: name.php");
exit();
?>
