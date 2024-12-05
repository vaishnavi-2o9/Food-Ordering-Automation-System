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

//for checkbox
function toggleQuantity() {
    const checkbox = document.getElementById('productCheckbox');
    const quantitySection = document.getElementById('quantitySection');
    if (checkbox.checked) {
        quantitySection.style.display = 'block'; // Show quantity section
    } else {
        quantitySection.style.display = 'none'; // Hide quantity section
        document.getElementById('quantity').innerText = '0'; // Reset quantity
    }
}

function changeQuantity(amount) {
    const quantitySpan = document.getElementById('quantity');
    let currentQuantity = parseInt(quantitySpan.innerText);
    currentQuantity += amount;

    // Ensure quantity doesn't go below 0
    if (currentQuantity < 0) {
        currentQuantity = 0;
    }

    quantitySpan.innerText = currentQuantity; // Update displayed quantity
}


//for done button
function finishOrder() {
    window.open("cart.html","_blank"); // Change the URL to the page you want to open
}