const cart = JSON.parse(localStorage.getItem('cart'));
const cartItemsDiv = document.getElementById('cartItems');

if (cart) {
    // Display burgers
    if (Object.keys(cart.burgers).length > 0) {
        cartItemsDiv.innerHTML += `<h3>Burgers</h3>`;
        for (const [burger, quantity] of Object.entries(cart.burgers)) {
            cartItemsDiv.innerHTML += `<p>${burger}: ${quantity}</p>`;
        }
    }

    // Display dips
    if (Object.keys(cart.dips).length > 0) {
        cartItemsDiv.innerHTML += `<h3>Dips</h3>`;
        for (const [dip, quantity] of Object.entries(cart.dips)) {
            cartItemsDiv.innerHTML += `<p>${dip}: ${quantity}</p>`;
        }
    }

    // Display drinks
    if (Object.keys(cart.drinks).length > 0) {
        cartItemsDiv.innerHTML += `<h3>Drinks</h3>`;
        for (const [drink, quantity] of Object.entries(cart.drinks)) {
            cartItemsDiv.innerHTML += `<p>${drink}: ${quantity}</p>`;
        }
    }
} else {
    cartItemsDiv.innerHTML = `<p>Your cart is empty.</p>`;
}