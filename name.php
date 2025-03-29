<?php


session_start(); // Start the session


?>

<!DOCTYPE html>
<html>
    
<head>
    <title>customer info</title>
    <link rel="stylesheet" href="name.css">
    <link href="https://fonts.googleapis.com/css2?family=Barriecito&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Food Factory</h1>
    <form id="order-form" action="submit.php" method="POST">
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br><br>
        
        <label for="customer_number">Customer Number:</label>
        <input type="text" id="customer_number" name="customer_number" required><br><br>
        <div class="input_field">
            <input type="submit" id="newpage" value="submit" class="btn" name="submit">
        </div>
       
   
      

    <div class="keyboard" id="keyboard">
                
        <div class="row one">
           <button>'</button>
           <button>1</button>
           <button>2</button>
           <button>3</button>
           <button>4</button>
           <button>5</button>
           <button>6</button>
           <button>7</button>
           <button>8</button>
           <button>9</button>
           <button>0</button>
           <button>-</button>
           <button>=</button>
           <button class="back">Backspace</button>
        </div>
        <div class="row two">
            <button class="tab">Tab</button>
            <button>Q</button>
            <button>W</button>
            <button>E</button>
            <button>R</button>
            <button>T</button>
            <button>Y</button>
            <button>U</button>
            <button>I</button>
            <button>O</button>
            <button>P</button>
            <button>[</button>
            <button>]</button>
            <button class="slace">\</button>
        </div>
        <div class="row three">
            <button class="cap">caps</button>
            <button>A</button>
            <button>S</button>
            <button>D</button>
            <button>F</button>
            <button>G</button>
            <button>H</button>
            <button>J</button>
            <button>K</button>
            <button>L</button>
            <button>;</button>
            <button>'</button>
            <button class="ent-btn">ENTER</button>
        </div>
        <div class="row four">
            <button class="shift">Shift</button>
            <button>Z</button>
            <button>X</button>
            <button>C</button>
            <button>V</button>
            <button>B</button>
            <button>N</button>
            <button>M</button>
            <button><</button>
            <button>></button>
            <button>?</button>
            <button class="shift">Shift</button>
             </div>
             <div class="row five">
                <button class="other">ctrl</button>
            <button class="other">win</button>
            <button class="other">alt</button>
            <button class="space">space</button>
            <button class="other">Alt</button>
            <button class="other">win</button>
            <button class="other">ctrl</button>
             </div>
            
            </div>
    </div>
    

    <?php
// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Your Cart is Empty</h2>";
} else {
   
    echo "<div class='cart-container'>";
    echo "<h2> Your Cart</h2>";
    echo "<div class='cart-header'>";
    
    echo "<span>Food</span>";
    echo "<span>Quantity</span>";
    echo "<span>Price</span>";
    echo "</div>";

    // Loop through each item in the cart
    $total = 0; // Initialize total price
    foreach ($_SESSION['cart'] as $key => $item) {
        echo "<div class='cart-item'>";
        echo "<span>{$item['name']}</span>";
        echo "<span>{$item['quantity']}</span>";
        // Remove the '₹' symbol from the price
        $price = str_replace('₹', '', $item['price']);
        echo "<span>₹{$price}</span>";
        echo "</div>";
        $total += intval($price) * $item['quantity']; // Add item price to the total
    }

    echo "<div class='cart-total'>";
    echo "<span>Total:</span>";
    echo "<span>₹{$total}</span>";
    echo "</div>";
    echo "</div>";
}
?>
</form>
<script src="name.js"></script>
</body>  
</html>