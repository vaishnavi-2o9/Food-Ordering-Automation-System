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
                <th> Quantity</th>
                <th>Remove</th>
              </tr>";
        $total = 0; // Initialize total price

        // Loop through each item in the cart
        foreach ($_SESSION['cart'] as $key => $item) {
<<<<<<< HEAD
            echo "<tr>
                    <td>{$item['name']}</td>
                    <td>\${$item['price']}</td>
=======
            // Remove the '₹' symbol from the price
            //$price = str_replace('₹', '', $item['price']);
            if (!isset($_SESSION['cart'][$key]['quantity'])) {
                $_SESSION['cart'][$key]['quantity'] = 1;
            }
        
            $quantity = $_SESSION['cart'][$key]['quantity'];
            $price = floatval(str_replace('₹', '', $item['price'])); 
            echo "<tr>
                    <td>{$item['name']}</td>
                    <td>₹" . number_format($price, 2) . "</td>
                    

                    <td>
                        <form action='update_quantity.php' method='post'>
                            <input type='hidden' name='key' value='{$key}'>
                            <button type='submit' name='action' value='decrease'>-</button>
                            <span>{$quantity}</span>
                            <button type='submit' name='action' value='increase'>+</button>
                        </form>
                    </td>
>>>>>>> 78b85ffdcfafb0af0f7548a55015570065c8c44b
                    <td>
                        <form action='remove_item.php' method='post'>
                            <input type='hidden' name='key' value='{$key}'>
                            <button type='submit'>&times;</button>
                        </form>
                    </td>
                  </tr>";
<<<<<<< HEAD
            $total += $item['price']; // Add item price to the total
        }

        echo "<tr>
                <td colspan='1'>Total:</td>
                <td>\${$total}</td>
              </tr>";
        echo "</table>";
=======
            //$total += (int) $price; // Add item price to the total
            $total += $price * $quantity;
        }

        // Remove the '₹' symbol from the total price
                
        echo "<tr>
        <td colspan='1'><strong>Total:</strong></td>
        <td><strong>₹{$total}</strong></td>
      </tr>";
echo "</table>";
>>>>>>> 78b85ffdcfafb0af0f7548a55015570065c8c44b
    
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