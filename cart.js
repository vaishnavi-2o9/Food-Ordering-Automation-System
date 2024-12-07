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

