const decreaseButton = document.querySelector('.decrease-button');
const increaseButton = document.querySelector('.increase-button');
const quantityDisplay = document.querySelector('.quantity-display');

let currentQuantity = parseInt(quantityDisplay.textContent);

decreaseButton.addEventListener('click', () => {
    if (currentQuantity > 1) {
        currentQuantity--;
        quantityDisplay.textContent = currentQuantity;
    }
});

increaseButton.addEventListener('click', () => {
    currentQuantity++;
    quantityDisplay.textContent = currentQuantity;
});