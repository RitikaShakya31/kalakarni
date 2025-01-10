<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div class="header-top-welcome">
                    <p>Exclusive Designer Collections of Western/Indian Dresses</p>
                </div>
            </div>
            <div class="col-md-5 col-lg-3">

            </div>
            <div class="col-md-7 col-lg-4">
                <ul class="header-top-list">
                    <li><a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a></li>
                    <li><a href="<?= base_url('term-and-condition') ?>">Terms and condition</a></li>
                    <li><a href="<?= base_url('faq') ?>">FAQ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-media-group">
                <button class="header-user">
                    <i class="fas fa-bars"></i></button><a href="<?= base_url() ?>"><img
                        src="<?= base_url() ?>assets/img/logo.PNG" alt="logo" /></a><button class="header-src"><i
                        class="fas fa-search"></i></button>
            </div>
            <a href="<?= base_url() ?>" class="header-logo"><img src="<?= base_url() ?>assets/img/logo.PNG"
                    alt="logo" /></a>
            <form class="header-form">
                <input type="text" placeholder="Search anything..." /><button>
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="header-widget-group">
                <a href="<?= base_url() . ((sessionId('login_user_id')) ? 'my-orders' : 'login') ?>"
                    class="header-widget" title="<?= ((sessionId('login_user_id')) ? 'My-profile' : 'Login') ?>"><i
                        class="fas fa-user"></i></a><button class="header-widget header-cart" title="Cartlist">
                    <i class="fas fa-shopping-basket"></i><sup class="totalitem">
                        <?= $this->cart->total_items(); ?>
                    </sup><span>total price<small class="totalamount">₹
                            <?php echo $this->cart->format_number($this->cart->total()); ?>
                        </small></span>
                </button>
            </div>
        </div>
    </div>
</header>
<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-content">
                    <ul class="navbar-list">
                        <?php
                        if (!empty($category)) {
                            foreach ($category as $row) {
                                ?>
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link" href="<?= base_url('type/' . $row['category_id']) ?>">
                                        <?= $row['cat_name']; ?>
                                    </a>
                                </li>
                                <?php
                            }
                            unset($row);
                        }
                        ?>
                        <li class="navbar-item dropdown">
                            <a class="navbar-link" href="<?= base_url('contact') ?>">Contact</a>
                        </li>
                    </ul>
                    <div class="navbar-info-group">
                        <a href="tel:9131009487" class="navbar-info">
                            <i class="icofont-ui-touch-phone"></i>
                            <p><small>call us</small><span>+91 9131009487</span></p>
                        </a>
                        <a href="mailto:info@kalakarnii.in" class="navbar-info">
                            <i class="icofont-ui-email"></i>
                            <p><small>email us</small><span>info@kalakarnii.in</span></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside class="nav-sidebar">
    <div class="nav-header">
        <a href="#"><img src="<?= base_url() ?>assets/img/logo.PNG" alt="logo" /></a><button class="nav-close"><i
                class="icofont-close"></i></button>
    </div>
    <div class="nav-content">
        <ul class="nav-list">
            <?php
            if (!empty($category)) {
                foreach ($category as $row) {
                    ?>
                    <li>
                        <a class="nav-link" href="<?= base_url('type/' . $row['category_id']) ?>">
                            <?= $row['cat_name']; ?>
                        </a>
                    </li>
                    <?php
                }
                unset($row);
            }
            ?>
        </ul>
        <div class="nav-info-group">
            <a href="tel:9131009487" class="nav-info">
                <i class="icofont-ui-touch-phone"></i>
                <p><small>call us</small><span>+91 9131009487</span></p>
            </a>
            <a href="mailto:info@kalakarnii.in" class="nav-info">
                <i class="icofont-ui-email"></i>
                <p><small>email us</small><span>info@kalakarnii.in</span></p>
            </a>
        </div>
        <div class="nav-footer">
            <p>All Rights Reserved by <a href="<?= base_url() ?>">Kalakarnii</a></p>
        </div>
    </div>
</aside>

<aside class="cart-sidebar">
    <div class="cart-header">
        <div class="cart-total"><i class="fas fa-shopping-basket"></i> total item &nbsp;<span class="totalitem"> (
                <?= $this->cart->total_items(); ?>)
            </span></div>
        <button class="cart-close"><i class="icofont-close"></i></button>
    </div>
    <div id="cart"></div>
   
        <div class="cart-footer" id="guestCheckoutBtnWrapper">
            
        </div>

</aside>

<div class="mobile-menu">
    <a href="<?= base_url() ?>" title="Home Page"><i class="fas fa-home"></i><span>Home</span></a>
    <a href="<?= base_url('product') ?>" class="cate-btn" title="Category List"><i class="fas fa-list"></i><span>All
            Products</span></a>
    <button class="cart-btn" title="Cartlist"><i class="fas fa-shopping-basket"></i><span>cartlist</span><sup
            class="totalitem">
            <?= $this->cart->total_items(); ?>+
        </sup></button>
    <?php
    if ($this->session->has_userdata('login_user_id')) {
        ?>
        <a href="<?= base_url('orders'); ?>"><i class="fas fa-shopping-bag"></i><span>Orders</span></a>
        <a href="<?= base_url('profile') ?>"><i class="fas fa-user"></i><span>My Account</span></a>
        <?php
    } else {
        ?>
        <a href="<?= base_url('login') ?>"><i class="fas fa-sign-out-alt"></i><span>Sign In</span></a>
        <a href="<?= base_url('register') ?>"> <i class="fas fa-user"></i><span>Register </span></a>
        <?php
    }
    ?>
</div>