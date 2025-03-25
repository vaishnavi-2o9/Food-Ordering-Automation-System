<?php
session_start(); // Start the session

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            font-size: 20px;
        }
        th {
            background-color: #999999;
            font-size: 24px;
        }
        .clear-cart-button {
            font-size: 24px;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background-color: #db7b0e;
            color: #fff;
            cursor: pointer;
        }
        .clear-cart-button:hover {
            background-color: #db7b0e;
        }
        .back-button {
            font-size: 40px;
            padding: 20px 40px;
            border: none;
            border-radius: 10px;
            background-color: #db7b0e;
            color: #fff;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #db7b0e;
        }
        h1 {
            font-size: 36px;
        }
    </style>
</head>
<body>
<?php
    // Check if the cart is empty
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<h1>Your Cart is Empty</h1>";
    } else {
        echo "<h1>Your Cart</h1>";
        echo "<table>";
        echo "<tr>
                <th>Food</th>
                <th>Price</th>
                <th>Remove</th>
              </tr>";
        $total = 0; // Initialize total price

        // Loop through each item in the cart
        foreach ($_SESSION['cart'] as $key => $item) {
            // Remove the '₹' symbol from the price
            $price = str_replace('₹', '', $item['price']);
            echo "<tr>
                    <td>{$item['name']}</td>
                    <td>{$item['price']}</td>
                    <td>
                        <form action='remove_item.php' method='post'>
                            <input type='hidden' name='key' value='{$key}'>
                            <button type='submit'>&times;</button>
                        </form>
                    </td>
                  </tr>";
            $total += (int) $price; // Add item price to the total
        }

        // Remove the '₹' symbol from the total price
        $total = '₹' . $total;
        echo "<tr>
                <td colspan='1'>Total:</td>
                <td>{$total}</td>
              </tr>";
        echo "</table>";
    
    }
              echo '<form action="menu.html" method="post">
                  <button type="submit">Back to Menu</button>
              </form>';
             
              echo '<form action="save_to_cart.php" method="post">
              <button type="submit">save to cart</button>
          </form>';
    ?>
</body>
</html>