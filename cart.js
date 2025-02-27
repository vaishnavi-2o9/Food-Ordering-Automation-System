function showCart() {
    // Get the cart contents div
    var cartContentsDiv = document.getElementById("cart-contents");

    // Toggle the display of the cart contents div
    if (cartContentsDiv.style.display === "none" || cartContentsDiv.style.display === "") {
        cartContentsDiv.style.display = "block";

        // Send an AJAX request to get the cart contents
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "viewcart.php", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Update the cart contents div with the received data
                cartContentsDiv.innerHTML = xhr.responseText;
            } else {
                console.error("Failed to load cart contents");
            }
        };
        xhr.send();
    } else {
        // Hide the cart contents div if it's already visible
        cartContentsDiv.style.display = "none";
    }
}

// Function to update the cart count dynamically
function updateCartCount(count) {
    var cartCountSpan = document.getElementById("cart-count");
    cartCountSpan.textContent = count;
}

const newPageUrl = "name.html";

document.getElementById("payNowButton").addEventListener("click",function(){
    window.open(newPageUrl,"_blank");
})