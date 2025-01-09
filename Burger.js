
    function addToCartAndRedirect(dishName, dishPrice) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the PHP script to handle the request
        var url = "add_to_cart.php";

        // Prepare the data to be sent
        var params = "dish=" + encodeURIComponent(dishName) + "&price=" + encodeURIComponent(dishPrice);

        // Configure the request
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Define what happens on successful data submission
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Redirect to prize.html after adding the burger to the cart
                window.location.href = "bprize.html";
            }
        };

        // Send the request
        xhr.send(params);
    }
