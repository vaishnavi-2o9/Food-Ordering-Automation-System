// Back button functionality
document.getElementById("backButton").onclick = function () {
  window.history.back();
};

// Burger quantity functionality
function changeQuantity(itemId, change) {
  const quantityElement = document.getElementById(`${itemId}-quantity`);
  let currentQuantity = parseInt(quantityElement.textContent, 10);
  let newQuantity = currentQuantity + change;

  // Ensure the quantity does not go below 1
  if (newQuantity < 1) {
    newQuantity = 1;
  }

  // Update the DOM with the new quantity
  quantityElement.textContent = newQuantity;
}

// Checkbox quantity functionality
document.querySelectorAll('.dipCheckbox').forEach((checkbox) => {
  checkbox.addEventListener('change', function () {
    const quantityId = this.getAttribute('data-quantity-id');
    const quantityDiv = document.getElementById(quantityId);

    // Show or hide the quantity bar based on checkbox state
    if (this.checked) {
      quantityDiv.style.display = 'block';
    } else {
      quantityDiv.style.display = 'none';
    }
  });
});

// Increment function
function increment(quantitySpanId) {
  const quantitySpan = document.getElementById(quantitySpanId);
  let currentQuantity = parseInt(quantitySpan.innerText);
  quantitySpan.innerText = currentQuantity + 1;
}

// Decrement function
function decrement(quantitySpanId) {
  const quantitySpan = document.getElementById(quantitySpanId);
  let currentQuantity = parseInt(quantitySpan.innerText);

  // Ensure quantity doesn't go below 1
  if (currentQuantity > 1) {
    quantitySpan.innerText = currentQuantity - 1;
  }
}

// Cart management
let cart = JSON.parse(localStorage.getItem('cart')) || {
  burgers: {},
  dips: {},
  drinks: {},
  prizes: {}
};

function addToCart(itemType, itemName, quantity) {
  if (!cart[itemType][itemName]) {
    cart[itemType][itemName] = 0;
  }
  cart[itemType][itemName] += quantity;
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Finish order functionality
function finishOrder() {
  // Collect burgers
  const burgerQuantities = document.querySelectorAll('[id$="-quantity"]');
  burgerQuantities.forEach(quantityElement => {
    const itemId = quantityElement.id.replace('-quantity', '');
    const quantity = parseInt(quantityElement.textContent, 10);
    if (quantity > 0) {
      addToCart('burgers', itemId, quantity);
    }
  });

  // Collect dips
  const dipCheckboxes = document.querySelectorAll('.dipCheckbox');
  dipCheckboxes.forEach(checkbox => {
    if (checkbox.checked) {
      const dipId = checkbox.getAttribute('data-quantity-id');
      const dipQuantity = parseInt(document.getElementById(dipId).innerText, 10);
      addToCart('dips', checkbox.nextSibling.textContent.trim(), dipQuantity);
    }
  });

  // Collect prizes
  const prizeCheckboxes = document.querySelectorAll('.prizeCheckbox');
  prizeCheckboxes.forEach(checkbox => {
    if (checkbox.checked) {
      const prizeId = checkbox.getAttribute('data-quantity-id');
      const prizeQuantity = parseInt(document.getElementById(prizeId + 'Value').innerText);
      addToCart('prizes', checkbox.nextSibling.textContent.trim(), prizeQuantity);
    }
  });

  // Open cart.html in a new window
  window.open('cart.html', '_blank');
}