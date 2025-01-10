<?php include('includes/head.php'); ?>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">
        <?php include('includes/menu.php'); ?>
        <div class="ls section_padding_top_75 section_padding_bottom_75 columns_padding_25">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                    <tr>
                                        <td class="product-info"> </td>
                                        <td class="product-info">Product</td>
                                        <td class="product-price-td">Price</td>
                                        <td class="product-quantity">Quantity</td>
                                        <td class="product-subtotal">Subtotal</td>
                                        <td class="product-remove">&nbsp;</td>
                                    </tr>
                                </thead>

                                <tbody id="cart_items_preview">

                                   
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-buttons">
                            <a class="theme_button" href="<?= base_url() ?>">Countinue Shopping</a>
                            <!-- <input type="submit" class="theme_button color1" name="update_cart" value="Update Cart"> -->
                            <a class="theme_button" href="<?= base_url('checkout') ?>" class="theme_button color2">Proceed to Checkout</a>
                        </div>

                        <div class="cart-collaterals">
                            <div class="cart_totals">
                                <h4>Cart Totals</h4>
                                <table class="table">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <td>Cart Subtotal</td>
                                            <td><span class="currencies">Rs. </span><span class="amount totalamount"> </span> </td>
                                        </tr>
                                        <tr class="shipping">
                                            <td>Shipping and Handling</td>
                                            <td>
                                                Free Shipping
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td class="grey">Order Total</td>
                                            <td><strong class="grey"><span class="currencies">Rs. </span><span class="amount totalamount"> </span>
                                                </strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>

</div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->

<?php include('includes/script.php'); ?>

</body>


</html>