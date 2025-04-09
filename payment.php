<?php


$apikey = "rzp_test_PZ3NaNPYN467Z2";

?>




<form action="success.html" method="POST">
    <script
       src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $apikey ; ?>"

        data-amount="<?php echo $_POST['price']*100;?>" 

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

    <input type="hidden" custom="Hidden Element" name="hidden"/>
    </form>

