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
                    <li class="breadcrumb-item active">Product Details
                    </li>
                </ol>
            </div>
        </section>
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="details-gallery">
                            <div class="details-label-group">
                                <?= (($product[0]['featured'] == '1') ? '<label class="details-label off">Featured</label>' : ''); ?>

                            </div>
                            <ul class="details-preview">
                                <?php

                                if ($products_image) {
                                    foreach ($products_image as $img) {
                                ?>
                                        <li><img src="<?= base_url(); ?>uploads/products/<?= $img['pi_name']; ?>" alt="<?= $product[0]['pro_name']; ?>" /></li>
                                <?php
                                    }
                                    unset($img);
                                }
                                ?>
                            </ul>
                            <ul class="details-thumb">
                                <?php

                                if ($products_image) {
                                    foreach ($products_image as $img) {
                                ?>
                                        <li><img src="<?= base_url(); ?>uploads/products/<?= $img['pi_name']; ?>" alt="product" /></li>
                                <?php
                                    }
                                    unset($img);
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="details-content">
                            <h3 class="details-name">
                                <a href="#"><?= $product[0]['pro_name']; ?></a>
                            </h3>
                            <div class="details-meta">
                                <?php
                                if ($length  == '') {
                                } else {
                                ?>
                                    <!-- <p>Lenght:<span><?= $length[0]['length'] ?></span></p> -->
                                <?php
                                }
                                ?>
                                <?php
                                if ($fabric == '') {
                                } else {
                                ?>
                                    <!-- <p>Fabric:<a href="#"><?= $fabricp['fabric'] ?></a></p> -->
                                <?php
                                }
                                ?>
                                <?php
                                if ($pattern == '') {
                                } else {
                                ?>
                                    <p>Pattern:<a href="#"><?= $pattern['pattern'] ?></a></p>
                                <?php
                                }
                                ?>
                            </div>
                            <h3 class="details-price">
                                <del>₹<?= $product[0]['old_price']; ?></del><span>₹<?= $product[0]['price']; ?><small></small></span>
                            </h3>
                            <p class="details-desc">
                                <?= $product[0]['description']; ?>
                            </p>
                            <div class="details-add-group">
                                <button class="product-add addtocart" data-id="<?= $product[0]['product_id'] ?>" title="Add to Cart">
                                    <i class="fas fa-shopping-basket"></i><span>add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2>related this items</h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
                    <?php
                    $similar = getDataWithLimitInOrder('products', 'category_id', $product[0]['category_id'], '3');
                    if (!empty($similar)) {
                        foreach ($similar as $row) {
                            $data = getSingleRowById('tbl_products_image', array('product_id' => $row['product_id']));
                    ?>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-media">
                                        <div class="product-label">
                                            <label class="label-text off">Featured</label>
                                        </div><a class="product-image" href=""><img src="<?= base_url('uploads/products/') ?><?= $data['pi_name']; ?>" alt="product"></a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-name">
                                            <a href="<?= base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) ?>" class="d-inline"><?= $row['pro_name']; ?></a>
                                        </h6>
                                        <h6 class="product-price"><span>Rs. <?= $row['price']; ?></span>
                                        </h6>
                                        <a href="<?= base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) ?>" class="product-add" title="Add to Cart">
                                            <i class="fas fa-shopping-basket"></i><span>Buy Now</span>
                                        </a>
                                        <div class="product-action">
                                            <button class="action-minus" title="Quantity Minus">
                                                <i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="Quantity Plus">
                                                <i class="icofont-plus"></i>
                                            </button>
                                        </div>
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
    </div>


    <?php include('includes/footer.php'); ?>

</div>
</div>

<?php include('includes/script.php'); ?>

</body>


</html>