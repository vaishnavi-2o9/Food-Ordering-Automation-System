function displayItems() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const itemListContainer = document.getElementById('item-list');
    const totalPriceContainer = document.getElementById('total-price');

    // Clear previous items
    itemListContainer.innerHTML = '';
    let totalPrice = 0;

    // Check if the cart is empty
    if (cart.length === 0) {
        itemListContainer.innerHTML = '<p>Your cart is empty.</p>';
        totalPriceContainer.innerHTML = '';
        return;
    }

    // Display each item in the cart
    cart.forEach(item => {
        const itemElement = document.createElement('div');
        const itemTotalPrice = item.price * item.quantity; // Calculate total price for this item
        itemElement.textContent = `${item.name} - $${item.price.toFixed(2)} x ${item.quantity} = $${itemTotalPrice.toFixed(2)}`;
        itemListContainer.appendChild(itemElement);
        totalPrice += itemTotalPrice; // Add to total price
    });

    // Display total price
    totalPriceContainer.innerHTML = `<h3>Total Price: $${totalPrice.toFixed(2)}</h3>`;
}

// Call the function to display items when the page loads
window.onload = displayItems;