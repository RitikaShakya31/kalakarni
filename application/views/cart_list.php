<ul class="cart-list">

    <?php foreach ($this->cart->contents() as $items) :
    ?>
        <li class="cart-item">
            <div class="cart-media"><a href="<?= base_url('product-details/' . $items['id'] . '/' . url_title($items['name'])) ?>">
                    <img src="<?= setImage($items['image'], 'uploads/products/') ?>" alt="<?php echo $items['name']; ?>">
                </a></div>
            <div class="cart-info-group">
                <div class="cart-info">
                    <h6><a href="<?= base_url('product-details/' . $items['id'] . '/' . url_title($items['name'])) ?>"><?php echo $items['name']; ?></a> &nbsp;<button class="cart-delete removeCarthm remove" data-id="<?= $items['rowid'] ?>"><i class="far fa-trash-alt"></i></button></h6>
                    <p>Quantity - <?php echo $items['qty']; ?> X <?php echo $this->cart->format_number($items['price']); ?></-< /p>
                </div>
                <div class="cart-action-group">
                    <!-- <div class="product-action"><button class="action-minus qty-minus" data-rowid="<?= $items['id']; ?>" title="Quantity Minus"><i class="icofont-minus"></i></button>
						<input class="action-input" title="Quantity Number" type="text" id="qtysidecart<?= $items['id'] ?>" name="quantity" value="1">
						<button class="action-plus qty-plus" data-rowid="<?= $items['id']; ?>" title="Quantity Plus"><i class="icofont-plus"></i></button>
					</div> -->
                    <h6>₹<?php echo $this->cart->format_number($items['price'] * $items['qty']); ?></h6>
                </div>
            </div>
        </li>

    <?php endforeach; ?>
</ul>


<div class="cart-footer">
    <!-- <button class="coupon-btn">Do you have a coupon code?</button>
	<form class="coupon-form"><input type="text" placeholder="Enter your coupon code"><button type="submit"><span>apply</span></button></form> -->
    <a style="background: var(--heading);" class="cart-checkout-btn" href="<?= base_url('checkout') ?>"><span class="checkout-label">Proceed to Checkout</span><span class="checkout-price">₹ <?php echo $this->cart->format_number($this->cart->total()); ?></span></a>
</div>

<?php
if (count($this->cart->contents()) > 0) { ?>
    <div class="cartbar">
        <button class="cart-btn" title="Cartlist"><i class="fas fa-shopping-basket"></i><span>cartlist</span><sup class="totalitem"><?= $this->cart->total_items(); ?>+</sup></button>
    </div>
<?php } ?>

<script>
    $(".cart-btn").on("click", function() {
        $("body").css("overflow", "hidden");
        $(".cart-sidebar").addClass("active");
    });
    $(".cart-close").on("click", (function() {
        $("body").css("overflow", "inherit"), $(".cart-sidebar").removeClass("active"), $(".backdrop").fadeOut()
    }));
</script>