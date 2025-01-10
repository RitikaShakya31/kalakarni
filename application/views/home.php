<?php include('includes/head.php'); ?>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">
        <?php include('includes/menu.php'); ?>
        <section class="home-classic-slider slider-arrow">
            <?php
            if (!empty($banner)) {
                foreach ($banner as $row) {
            ?>
                    <div class="banner-part" style="background: url(<?= base_url('uploads/banner/') ?><?= $row['b_img']; ?>) no-repeat center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-lg-6">
                                    <div class="banner-content" style="visibility: hidden;">
                                        <h1>we are delivered organic fresh fruits.</h1>
                                        <p>
                                            Lorem ipsum dolor consectetur adipisicing elit modi
                                            consequatur eaque expedita porro necessitatibus eveniet
                                            voluptatum quis pariatur Laboriosam molestiae architecto
                                            excepturi
                                        </p>
                                        <div class="banner-btn">
                                            <a class="btn btn-inline" href="shop-4column.html"><i class="fas fa-shopping-basket"></i><span>shop now</span></a><a class="btn btn-outline" href="offer.html"><i class="icofont-sale-discount"></i><span>get offer</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </section>
        <section class="section brand-part">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading">
                            <h2>shop by type</h2>
                        </div>
                    </div>
                </div>
                <div class="brand-slider slider-arrow">
                    <?php
                    if (!empty($category)) {
                        foreach ($category as $row) {
                    ?>
                            <div class="brand-wrap">
                                <div class="brand-media">
                                    <img src="<?= base_url('uploads/category/') ?><?= $row['image']; ?>" alt="brand" />
                                    <div class="brand-overlay">
                                        <a href="<?= base_url('type/' . $row['category_id']) ?>"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="brand-meta">
                                    <h4><?= $row['cat_name']; ?></h4>
                                    <p>(45 items)</p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="section feature-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>New Featured dress</h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                    <?php
                    if (!empty($products)) {
                        foreach ($products as $row) {
                            $data = getSingleRowById('tbl_products_image', array('product_id' => $row['product_id']));
                            $pattern = getSingleRowById('tbl_pattern', array('id' => $row['pattern']));
                            $length = getSingleRowById('tbl_length', array('id' => $row['length']));
                            $fabric = getSingleRowById('tbl_fabric', array('id' => $row['fabric']));
                    ?>
                            <div class="col">
                                <div class="feature-card">
                                    <div class="feature-media">
                                        <div class="feature-label">
                                            <label class="label-text feat"><?= (($row['category_id'] != '39') ? (($pattern != '') ? $pattern['pattern'] : '') : 'Jewels') ?></label>
                                        </div>
                                        <button class="feature-wish wish">
                                            <i class="fas fa-heart"></i></button><a class="feature-image" href="<?= base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) ?>"><img src="<?= base_url('uploads/products/') . '' . $data['pi_name'] ?>" alt="product" /></a>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-name">
                                            <a href="<?= base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) ?>"><?= $row['pro_name'] ?></a>
                                        </h6>
                                        <div class="feature-rating">
                                            <i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="product-video.html">(3 Reviews)</a>
                                        </div>
                                        <h6 class="feature-price">
                                            <del>₹<?= $row['old_price'] ?></del><span>₹<?= $row['price'] ?></span>
                                        </h6>
                                        <p class="feature-desc">
                                            <?= substr(strip_tags($row['description']), 0, 90) ?>...
                                        </p>
                                        <button class="product-add addtocart" title="Add to Cart" data-id="<?= $row['product_id'] ?>">
                                            <i class="fas fa-shopping-basket"></i><span>add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>


                </div>

            </div>
        </section>
        <section class="inner-section about-team bg-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>Our Achievement</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="team-slider slider-arrow">
                            <?php
                            if (!empty($budget)) {
                                foreach ($budget as $row) {
                            ?>
                                    <li>
                                        <figure class="team-media">
                                            <img src="<?= base_url('uploads/budget/') ?><?= $row['image']; ?>" alt="team" />
                                        </figure>
                                    </li>
                                    <li>
                                        <figure class="team-media">
                                            <img src="<?= base_url('uploads/budget/') ?><?= $row['image']; ?>" alt="team" />
                                        </figure>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="inner-section contact-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>Dresses @Offer</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card"><img src="<?= base_url() ?>assets/images/branch/01.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>dhaka</h3>
                                <p>kawran bazar, 1100 east tejgaon, dhaka.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card"><img src="<?= base_url() ?>assets/images/branch/02.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>Narayanganj</h3>
                                <p>west jalkuri, 1420 shiddirganj, narayanganj.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card"><img src="<?= base_url() ?>assets/images/branch/03.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>chandpur</h3>
                                <p>east lautuli, 2344 faridganj, chandpur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card"><img src="<?= base_url() ?>assets/images/branch/04.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>noakhli</h3>
                                <p>begumganj, 3737 shonaimuri, noakhli.</p>
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