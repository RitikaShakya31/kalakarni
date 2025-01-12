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
                                <h2>Join Now!</h2>
                                <p>Setup A New Account In A Minute</p>
                                <?php
                                if ($this->session->has_userdata('msg')) {
                                    echo $this->session->userdata('msg');
                                    $this->session->unset_userdata('msg');
                                }
                                ?>
                            </div>
                            <div class="user-form-group">
                                <div class="user-form-social text-center dm-none">
                                    <img src="<?= base_url() ?>assets/img/register-img.png" alt="Image" width="320px">
                                </div>
                                <div class="user-form-divider">
                                    <!-- <p>or</p> -->
                                </div>
                                <form class="user-form" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fullname" placeholder="Enter name" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="emailid" placeholder="Enter email" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contact" placeholder="Enter Phone" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" minlength="4" placeholder="Enter password" required />
                                    </div>
                                    <div class="form-button">
                                        <button type="submit">register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="user-form-remind">
                            <p>Already Have An Account?<a href="<?= base_url('login') ?>">login here</a></p>
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