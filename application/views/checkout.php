<?php
include('includes/head.php');

$length = getSingleRowById('length', array('id' => $product[0]['length']));
$fabric = getSingleRowById('fabric', array('id' =>  $product[0]['fabric']));
$pattern = getSingleRowById('pattern', array('id' =>  $product[0]['pattern']));
?>
<div id="canvas">
    <div id="box_wrapper">
        <?php include('includes/menu.php'); ?>
        <section class="single-banner inner-section">
            <div class="container">
                <h2><?= $product[0]['pro_name']; ?></h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Checkout
                    </li>
                </ol>
            </div>
        </section>
        <section class="inner-section checkout-part">
            <div class="container">
                <form method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>Billing Address</h4>
                                </div>
                                <input class="form-check-input" type="hidden" name="totalamount" id="totalamount" value="<?php echo $this->cart->total(); ?>">
                                <input class="form-check-input" type="hidden" name="grand_total" id="grand_total" value="<?php echo $this->cart->total(); ?>">
                                <input class="form-check-input" type="hidden" name="user_id" value="<?= $this->session->userdata('login_user_id') ?>">
                                <div class="ec-check-bill-form">

                                    <div class="form-outline my-3">
                                        <label>Full name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name:" value="<?= $login[0]['fullname'] ?>" required>
                                    </div>

                                    <div class="form-outline my-3 ">
                                        <label>Contact No.</label>
                                        <input type="text" class="form-control" name="number" placeholder="Phone No:" value="<?= $login[0]['contact'] ?>" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    </div>
                                    <div class="form-outline my-3 ">
                                        <label>Email Id</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $login[0]['emailid'] ?>" required>
                                    </div>
                                    <div class="form-outline my-3">
                                        <label>Full Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address*" value="<?= $login[0]['address'] ?>" required>
                                    </div>
                                    <div class="form-outline my-3">
                                        <label>Apartment, Suite, Unit etc. (optional)</label>
                                        <input type="text" class="form-control" name="address2" placeholder="Apartment, Suite, Unit etc.*" value="<?= $login[0]['address2'] ?>">
                                    </div>
                                    <div class="form-outline my-3">
                                        <label>Town / City</label>
                                        <input type="text" class="form-control" name="city" placeholder="City/Town" value="<?= $login[0]['address2'] ?>" required>
                                    </div>
                                    <div class="form-outline my-3">
                                        <label>Postcode</label>
                                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="City/Town" value="<?= $login[0]['address2'] ?>" required>
                                    </div>
                                    <div class="form-outline my-3">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" placeholder="State" value="<?= $login[0]['state'] ?>">
                                    </div>
                                    <div class="form-outline my-3">
                                        <label>Country</label>
                                        <select name="country" class="form-control" id="country">
                                            <option value="INDIA">India</option>
                                            <option value="OTHERS">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-outline my-3 ">
                                        <label>Order Notes</label>
                                        <textarea name="notes" class="form-control h-auto py-2   " id="notes" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                    <div class="form-outline my-3 ">
                                        <label>Choose Payment Method</label>
                                        <div class="row gap-3 my-3">
                                            <input type="radio" class="paymentRadio " name="payment_type" id="payment_type_online" value="1" checked>
                                            <label for="payment_type_online" class="col-md-4 radio newOt p-2 text-center rounded">Online Transfer
                                            </label>
                                            <input type="radio" class="paymentRadio" name="payment_type" id="payment_type_cod" value="0">
                                            <label for="payment_type_cod" class="col-md-4 radio p-2 text-center rounded">Cash on delivery
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>Amount Details</h4>
                                </div>
                                <div id="cartlist" class="bottom-border"></div>
                                <div class="account-content">
                                    <div class="faq-parent d-none">
                                        <div class="faq-child">
                                            <div class="faq-que"><button type="button">Check coupon</button></div>
                                            <div class="faq-ans">
                                                <div class="wallet-card-group">

                                                    <?php


                                                    if (!empty($promocode)) {
                                                        foreach ($promocode as $promo) {
                                                            if ($promo['minimum_order'] <= $this->cart->total()) {
                                                    ?>
                                                                <div class="wallet-card cborder">
                                                                    <input class="coupon-code" id="coupon<?= $promo['promocode_id'] ?>" value="<?= $promo['promocode'] ?>" readonly>
                                                                    <span class="copy-button" data-id="<?= $promo['promocode_id'] ?>" onclick="myFunction('coupon<?= $promo['promocode_id'] ?>')">Copy</span>
                                                                    <h6 class="pl-2">You Get Flat - <?= $promo['amount'] ?> Off </h6>
                                                                </div>
                                                    <?php

                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="chekout-coupon d-none">
                                        <button type="button" class="coupon-btn">Do you have a coupon code?</button>
                                        <div class="coupon-form">

                                            <!-- <input type="text" id="promocode" name="promocode" placeholder="Enter your coupon code">
                                            <input class="form-control form-control-md mr-1 mb-2" type="hidden" placeholder="Enter Your Coupon Code" name="promocode_amount" id="promocode_amt" value="">
                                            <button type="button" id="promo"><span>apply</span></button> -->
                                            <!-- <h6 id="promomsg" class="text-green"></h6> -->

                                        </div>
                                    </div>
                                    <ul class="invoice-details py-3 my-3 border-top">

                                        <li>
                                            <h6>Sub Total</h6>
                                            <p><span class="totalamount"></span></p>
                                        </li>
                                        <li>
                                            <h6>Delivery Charges</h6>
                                            <p> <?php
                                                if ($delivery['min_amount'] >= $this->cart->total()) { ?>
                                                    ₹ <?= $delivery['amount']; ?>
                                                    <input type="hidden" value="<?= $delivery['amount']; ?>" id="shipping_charges">
                                                <?php   } else { ?>
                                                    Free
                                                    <input type="hidden" value="0" id="shipping_charges">
                                                <?php } ?>
                                            </p>
                                        </li>
                                        
                                        <li>
                                            <h6>Total</h6>
                                            <p><span id="cartgrandprice"> ₹ <?php echo $this->cart->format_number($this->cart->total()); ?> /- </span></p>
                                        </li>
                                    </ul>

                                    <div class="checkout-check"><input type="checkbox" id="checkout-check" checked required><label for="checkout-check">By making this purchase you agree to our <a href="#">Terms and
                                                Conditions</a>.</label></div>
                                    <!-- <input type="hidden" name="payment_mode" value="1"> -->
                                    <div class="checkout-proced"><button type="submit" class="btn btn-inline">Place Order</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <?php include('includes/footer.php'); ?>
</div>
</div>
<?php include('includes/script.php'); ?>
</body>

</html>