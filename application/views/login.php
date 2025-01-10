<?php include('includes/head.php'); ?>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">

        <?php include('includes/menu.php'); ?>
        <section class="user-form-part">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">
                        <div class="user-form-card">
                            <div class="user-form-title">
                                <h2>Welcome Please Continue!</h2>
                                <!-- <p>Use your credentials to access</p> -->
                            </div>
                            <div class="user-form-group">
                                <div class="user-form-social text-center dm-none">
                                    <img src="<?= base_url() ?>assets/img/login-img.png" alt="Image" width="320px">
                                </div>
                                <div class="user-form-divider">
                                    <!-- <p>or</p> -->
                                </div>
                                <form class="user-form" method="post" action="">
                                    <div id="loginmsg"></div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="logincontact" placeholder="Enter your email" autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="loginpassword" placeholder="Enter your password" autocomplete="off" />
                                    </div>

                                    <div class="form-button">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" id="submitlogin">login</button>
                                        </div>

                                        <div class="resendOtpWrapper">
                                            <p id="resendmsg"></p>
                                            <p id="otpmessage"></p>
                                        </div>
                                        <hr>
                                        <a href="<?= base_url('guest-checkout/1') ?>" class="product-add">Checkout as Guest</a>

                                        <p>
                                            Don't have any account?<a href="<?= base_url('register') ?>">register here</a>
                                        </p>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('includes/footer.php'); ?>

    </div><!-- eof #box_wrapper -->


    <?php include('includes/script.php'); ?>

    </body>


    </html>