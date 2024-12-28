let cart = {}
function addToCart(productName) {
    if (cart[productName]) {
        cart[productName]++;
    } else {
        cart[productName] = 1;
    }
    updateCartCount();
}

function updateCartCount() {
    let count = Object.keys(cart).length;
    document.getElementById('cart-count').innerText = count;
}

function showCart() {
    // Save cart data to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Redirect to a new page to display the cart details
    window.location.href = 'cart-details.html';
}


window.onload = function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    if (Object.keys(cart).length === 0) {
        // If cart is empty
        document.getElementById('empty-cart').style.display = 'block';
    } else {
        // Display cart items
        let cartItemsList = document.getElementById('cart-items');
        for (let product in cart) {
            let listItem = document.createElement('li');
            listItem.innerText = `${product}: ${cart[product]}`;
            cartItemsList.appendChild(listItem);
        }
    }
};