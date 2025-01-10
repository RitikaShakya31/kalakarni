 <?php
        if (count($this->cart->contents()) > 0) {
    if (!$this->session->has_userdata('login_user_id')) {
        ?>
            <a href="<?= base_url('guest-checkout/0') ?>" class="product-add">Checkout as Guest</a>
        <?php
        }
    }
    ?>