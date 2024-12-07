//for back button
document.getElementById("backButton").onclick = function() {
    window.history.back();
};

//for burger quantity
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


