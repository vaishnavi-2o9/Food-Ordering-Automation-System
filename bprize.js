function changeQuantity(type, change) {
    const quantityElement = document.getElementById(`${type}-quantity`);
    let currentQuantity = parseInt(quantityElement.textContent);
    currentQuantity += change;

    // Ensure quantity does not go below 1
    if (currentQuantity < 1) {
        currentQuantity = 1;
    }

    quantityElement.textContent = currentQuantity;
}

function finishOrder() {
    const classicQuantity = document.getElementById('classic-quantity').textContent;
    const dips = Array.from(document.querySelectorAll('.dips-selection input:checked')).map(input => input.value);
    const drinks = Array.from(document.querySelectorAll('.drinks-selection input:checked')).map(input => input.value);

    // Create an order object
    const order = {
        burgers: classicQuantity,
        dips: dips,
        drinks: drinks
    };

    // Store the order in local storage
    localStorage.setItem('order', JSON.stringify(order));

    // Redirect to cart.html
    window.location.href = 'cart.html';
}
document.getElementById('backButton').onclick = function() {
    window.location.href = 'burger.html';
};