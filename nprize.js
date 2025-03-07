//for back button
document.getElementById("backButton").onclick = function() {
    window.history.back();
};

//for noodles quantity
function changeQuantity(itemId, change) {
const quantityElement = document.getElementById(`${itemId}-quantity`);

// Get the current quantity as a number
let currentQuantity = parseInt(quantityElement.textContent, 10);

// Update the quantity
let newQuantity = currentQuantity + change;

// Ensure the quantity does not go below 1
if (newQuantity < 1) {
  newQuantity = 1;
}

// Update the DOM with the new quantity
quantityElement.textContent = newQuantity;
}


//for checkbox quantity
// Function to toggle the visibility of quantity bars
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
