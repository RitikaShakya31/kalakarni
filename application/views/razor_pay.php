<!DOCTYPE html>
<html>

<head>
    <title>Razorpay Payment Gateway</title>
    <style>
        #pay-btn {
            opacity:0;
        }
    </style>
</head>

<body onload="razorpaySubmit(this);">

    <?php
    $description        = $product;
    $txnid              = date("YmdHis");
    $key_id             = "rzp_live_NDXAFZsfjgQibr";
    $currency_code      = $currency_code;
    $total              = ($grandtotal * 100); // 100 = 1 indian rupees
    $amount             = $grandtotal * 100;
    $merchant_order_id  = "SMS-" . date("YmdHis");
    $card_holder_name   = $name;
    $email              = $email;
    $phone              = $number;
    $name               = $name;
    ?>

    <form name="razorpay-form" id="razorpay-form" action="<?php echo $callback_url; ?>" method="POST">
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
        <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>" />
        <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>" />
        <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $description; ?>" />
        <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>" />
        <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>" />
        <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>" />
        <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>" />
        <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>" />
    </form>

    <!--<input id="pay-btn" type="submit" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-primary " />-->

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            key: "<?php echo $key_id; ?>",
            amount: "<?php echo $total; ?>",
            name: "<?php echo $name; ?>",
            description: "Order # <?php echo $merchant_order_id; ?>",
            netbanking: true,
            currency: "<?php echo $currency_code; ?>", // INR
            prefill: {
                name: "<?php echo $card_holder_name; ?>",
                email: "<?php echo $email; ?>",
                contact: "<?php echo $phone; ?>"
            },
            notes: {
                soolegal_order_id: "<?php echo $merchant_order_id; ?>",
            },
            handler: function(transaction) {
                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                document.getElementById('razorpay-form').submit();
            },
            "modal": {
                "ondismiss": function() {
                    window.location='<?= base_url('payment_failed') ?>';
                }
            }
        };

        var razorpay_pay_btn, instance;

        function razorpaySubmit(el) {
            if (typeof Razorpay == 'undefined') {
                setTimeout(razorpaySubmit, 200);
                if (!razorpay_pay_btn && el) {
                    razorpay_pay_btn = el;
                    el.disabled = true;
                    el.value = 'Please wait...';
                }
            } else {
                if (!instance) {
                    instance = new Razorpay(options);
                    if (razorpay_pay_btn) {
                        razorpay_pay_btn.disabled = false;
                        razorpay_pay_btn.value = "Pay Now";
                    }
                }
                instance.open();
            }
        }
    </script>

</body>

</html>