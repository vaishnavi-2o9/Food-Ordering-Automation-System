<!DOCTYPE html>
<html>
<head>
    <title>Pay with PayPal</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AXpQ31MGnIMzRjIKYMuPxvx9D8UUyy4IyW4OndLRx5Z6Bhj8dUJwJlPYbm7cvr2AmIrj2Lu2p1yPqCzy&currency=USD"></script>
</head>
<body>
    <h2>Pay with PayPal</h2>
    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00' // Replace with dynamic amount
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    fetch('payment_process.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(details)
                    }).then(response => response.json())
                      .then(data => {
                          if (data.status === 'success') {
                              alert('Payment Successful!');
                          } else {
                              alert('Payment Failed!');
                          }
                      });
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
