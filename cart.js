// const productImages = document.querySelectorAll('.product-image');
// const viewCartButton = document.getElementsByClassName('view-cart-button');
// const cart = document.getElementById('cart');

// const cartItems = [];
// let totalItems = 0;

// productImages.forEach(image => {
//     image.addEventListener('click', () => {
//         const productId = image.alt;

//         if (!productId) {
//             console.error('Product ID not found!');
//             return;
//         }

//         const productIndex = cartItems.findIndex(item => item.id === productId);

//         if (productIndex !== -1) {
//             cartItems[productIndex].quantity++;
//         } else {
//             cartItems.push({ id: productId, quantity: 1 });
//         }

//         totalItems++;
//         updateCart();

//         viewCartButton.textContent = `view-cart-button (${totalItems} items)`;
//     });
// });

// viewCartButton.addEventListener('click', () => {
//     cart.innerHTML = '';

//     cartItems.forEach(item => {
//         const cartItem = document.createElement('div');
//         cartItem.textContent = `${item.id}: ${item.quantity}`;
//         cart.appendChild(cartItem);
//     });

    
// });

// function updateCart() {
//     console.log(cartItems);
//     // Optionally, update a cart badge or total price here
// }

let cart = {};

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
            let cartItems = '';
            for (let item in cart) {
                cartItems += `${item}: ${cart[item]}\n`;
            }
            alert('Products in cart:\n' + cartItems);
        }

