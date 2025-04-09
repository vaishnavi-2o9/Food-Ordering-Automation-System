<?php
include 'submit.php';
include 'name.php'; 
$apikey = "rzp_test_PZ3NaNPYN467Z2";

?>
<button id="rzp-button" style="
    background-color: #db7b0e;
    color: white;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
">
    Pay Now
</button>

<form action="success.html" method="POST">
    <script
       src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $apikey ; ?>"
        data-amount="<?php echo $totalPrize*100;?>" 
        data-currency="INR"
        data-order_id="<?php echo 'OID'.rand(10,100).'END';?>"
        data-name="Food Factory"
        data-description="Craving Something Deicious ?"
        data-image="https://images.app.goo.gl/FVf6vw36mwNkfDnG6"
        data-prefill.name="<?php echo $_POST['customer_name'];?>"
        data-prefill.contact="<?php echo $_POST['customer_number'];?>"
        data-theme.color="#db7b0e">
    </script>
    <input type="hidden" custom="Hidden Element" name="hidden"/>
    </form>