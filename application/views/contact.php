<?php
include('includes/head.php');
?>
<div id="canvas">
    <div id="box_wrapper">
        <?php include('includes/menu.php'); ?>
        <section class="single-banner inner-section">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Product Details
                    </li>
                </ol>
            </div>
        </section>
        <section class="inner-section contact-part">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card"><i class="icofont-location-pin"></i>
                            <h4>head office</h4>
                            <p><?= $contactdetails[0]['address'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card active"><i class="icofont-phone"></i>
                            <h4>phone number</h4>
                            <p><a href="tel:<?= $contactdetails[0]['f_contact'] ?>"><?= $contactdetails[0]['f_contact'] ?></a><a href="tel:<?= $contactdetails[0]['s_contact'] ?>"><?= $contactdetails[0]['s_contact'] ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card"><i class="icofont-email"></i>
                            <h4>Support mail</h4>
                            <p><a href="mailto:<?= $contactdetails[0]['f_email'] ?>"><?= $contactdetails[0]['f_email'] ?></a><a href="mailto:<?= $contactdetails[0]['s_email'] ?>"><?= $contactdetails[0]['s_email'] ?></a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="contact-form">
                            <h4>Drop Your Thoughts</h4>
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>
                            <div class="form-group">
                                <div class="form-input-group"><input class="form-control" type="text" name="name" placeholder="Your Name" required><i class="icofont-user-alt-3"></i></div>
                            </div>
                            <div class="form-double row">
                                <div class="form-group col-md-6">
                                    <div class="form-input-group"><input class="form-control" name="email" type="tel" placeholder="Your Contact" required><i class="icofont-phone"></i></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-input-group"><input class="form-control" name="phone" type="email" placeholder="Your Email" required><i class="icofont-email"></i></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group"><textarea class="form-control" name="message" placeholder="Your Message" required></textarea><i class="icofont-paragraph"></i></div>
                            </div><button type="submit" class="form-btn-group"><i class="fas fa-envelope"></i><span>send
                                    message</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include('includes/footer.php'); ?>
</div>
</div>
<?php include('includes/script.php'); ?>
</body>
</html>