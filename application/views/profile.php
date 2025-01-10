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
                <h2>My Profile</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">My Profile
                    </li>
                </ol>
            </div>
        </section>
        <section class="inner-section profile-part">
            <div class="container">
                <?php if ($msg = $this->session->flashdata('msg')) :
                    $msg_class = $this->session->flashdata('msg_class') ?>
                    <div class='row'>
                        <div class='col-lg-12' style="margin-bottom: 5px;">
                            <div class='alert  <?= $msg_class; ?>' style="padding:12px"><?= $msg; ?></div>
                        </div>
                    </div>
                <?php $this->session->unset_userdata('msg');
                endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="orderlist-filter">
                            <h5>Welcome <span><?= $profile['fullname'] ?></span></h5>
                            <div class="filter-short justify-content-end"><label class="form-label"></label>
                                <a href="<?= base_url('my-orders') ?>" style="color:green">My Orders<i class="icofont-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>Update Profile</h4>
                                    <a href="<?= base_url('logout') ?>" class="logout" style="background: #ffd5d5 !important;">
                                        Logout
                                    </a>

                                </div>
                                <div class="account-content">
                                    <form method="post">
                                        <div class="row">

                                            <div class="col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label">name</label><input class="form-control" type="text" name="fullname" value="<?= $this->profile['fullname'] ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label><input class="form-control" name="emailid" type="email" value="<?= $this->profile['emailid'] ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile</label>
                                                    <p class="form-control d-flex align-items-center" style="cursor: not-allowed;" />
                                                    <?= $this->profile['contact'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-button">
                                                    <button type="submit" class="my-button" style="width: 100%;">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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