<?php
include('includes/head.php');
$length = getSingleRowById('length', array('id' => $product[0]['length']));
$fabric = getSingleRowById('fabric', array('id' =>  $product[0]['fabric']));
$pattern = getSingleRowById('pattern', array('id' =>  $product[0]['pattern']));
?>
<div id="canvas">
    <div id="box_wrapper">
        <?php include('includes/menu.php'); ?>
        <section class="inner-section single-banner">
            <div class="container">
                <h2>My Orders</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </div>
        </section>
        <section class="inner-section orderlist-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="orderlist-filter">
                            <h5>Welcome <span><?= sessionId('login_user_name') ?></span></h5>
                            <div class="filter-short justify-content-end"><label class="form-label"></label>
                                <a href="<?= base_url('my-profile') ?>" style="color:green">My Profile<i class="icofont-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo "<h4 class='heading text-dark'>My Orders</h4>";
                            $i = 0;
                            if (!empty($orderDetails)) {
                                foreach ($orderDetails as $row) {
                                    if ($row['status'] != 2) {
                                        $i = $i + 1;
                                        $getnum = getNumRows('tbl_checkout_product', array('checkoutid' => $row['id']));
                            ?>

                                        <div class="orderlist">
                                            <div class="orderlist-head">
                                                <h5>order #<?= $i ?></h5>
                                                <h5>order
                                                    <?= ($row['status'] == '0' ? 'New' : ($row['status'] == '1' ? 'Accepted' : ($row['status'] == '5' ? 'Shipment Initaited' : ($row['status'] == '3' ? 'Complete' : '<span class="text-danger">Cancel</span>')))) ?>
                                                </h5>
                                            </div>
                                            <div class="orderlist-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="order-track">
                                                            <ul class="order-track-list">
                                                                <li class="order-track-item placed active"><i class="icofont-check"></i><span>order
                                                                        Placed</span></li>
                                                                <li class="order-track-item accept  <?php if (($row['status'] == '1') ||  ($row['status'] == '3') || ($row['status'] == '4')) {
                                                                                                        echo 'active';
                                                                                                    } else {
                                                                                                    } ?>">
                                                                    <?php if (($row['status'] == '1') ||  ($row['status'] == '3') || ($row['status'] == '4')) {
                                                                        echo '<i class="icofont-check"></i>';
                                                                    } else {
                                                                        echo '<i class="icofont-close"></i>';
                                                                    } ?>
                                                                    <span>order
                                                                        Accepted</span>
                                                                </li>

                                                                <li class="order-track-item dispatch  <?php if (($row['status'] == '5') ||  ($row['status'] == '3')) {
                                                                                                            echo 'active';
                                                                                                        } else {
                                                                                                        } ?>">
                                                                    <?php if (($row['status'] == '5') ||  ($row['status'] == '3')) {
                                                                        echo '<i class="icofont-check"></i>';
                                                                    } else {
                                                                        echo '<i class="icofont-close"></i>';
                                                                    } ?> <span>order Dispatch</span></li>

                                                                <li class="order-track-item   <?= ($row['status'] == '3' ? 'active' :  '') ?>"> <?= ($row['status'] == '3' ? '<i class="icofont-check"></i>' :  '<i class="icofont-close"></i>') ?><span>Order Delivered</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <ul class="orderlist-details">
                                                            <li>
                                                                <h6>order id</h6>
                                                                <p>#<?= substr($row['create_date'], 0, 4)  ?><?= $row['id']  ?></p>
                                                            </li>
                                                            <li>
                                                                <h6>Total Item</h6>
                                                                <p><?= $getnum ?> Items</p>
                                                            </li>
                                                            <li>
                                                                <h6>Order Time</h6>
                                                                <p><?= convertDate($row['create_date']) ?></p>
                                                            </li>
                                                            <li>
                                                                <h6>Total Amount</h6>
                                                                <p>₹ <?= $row['grand_total']  ?> /-</p>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="orderlist-deliver">
                                                            <h6>Delivery location</h6>
                                                            <p><?= $row['address'] ?></p>
                                                            <hr>
                                                            <h6>Pin Code
                                                                : <?= $row['pincode'] ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="table-scroll">
                                                            <table class="table-list">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">SNo.</th>
                                                                        <th scope="col">Product</th>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Price*QTY</th>
                                                                        <th scope="col">Total Amt.</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $j = 0;
                                                                    $checkoutProduct = getRowById('tbl_checkout_product', 'checkoutid', $row['id']);
                                                                    if (!empty($checkoutProduct)) {
                                                                        foreach ($checkoutProduct as $productRow) {


                                                                            $j = $j + 1;
                                                                    ?>
                                                                            <tr>
                                                                                <td class="table-serial">
                                                                                    <h6><?= $j ?></h6>
                                                                                </td>
                                                                                <td class="table-image">
                                                                                    <img src="<?= setImage($productRow['product_img'], 'uploads/products/') ?>" alt="<?= $productRow['product_name'] ?>">
                                                                                </td>
                                                                                <td class="table-name">
                                                                                    <h6><?= $productRow['product_name'] ?></h6>
                                                                                </td>
                                                                                <td class="table-price">
                                                                                    <h6>₹ <?= $productRow['product_price'] ?>*<?= $productRow['product_quantity'] ?></h6>
                                                                                </td>
                                                                                <td class="table-quantity">
                                                                                    <h6>₹ <?= $productRow['total_pro_amt'] ?> /-</h6>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php }
                                    unset($row);
                                }
                            } else {
                                echo '<h3>No Order History Found</h3>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $i = 0;
                            if (!empty($cancelOrderDetails)) {

                                echo "<h4 class='heading'>Cancelled orders</h4>";
                                foreach ($cancelOrderDetails as $row) {
                                    $i = $i + 1;
                                    $getnum = getNumRows('tbl_checkout_product', array('checkoutid' => $row['id']));
                            ?>
                                    <div class="orderlist">
                                        <div class="or  derlist-head">
                                            <h5>order#<?= $i ?></h5>

                                            <h5>order
                                                <?= ($row['status'] == '0' ? 'Placed' : ($row['status'] == '1' ? 'Accepted' : ($row['status'] == '3' ? 'Dispatch' : ($row['status'] == '4' ? 'Complete' : '<span class="text-danger">Cancel</span>')))) ?>
                                            </h5>
                                        </div>
                                        <div class="orderlist-body">
                                            <div class="row">

                                                <div class="col-lg-8">
                                                    <ul class="orderlist-details">
                                                        <li>
                                                            <h6>order id</h6>
                                                            <p>#<?= substr($row['create_date'], 0, 4)  ?><?= $row['id']  ?></p>
                                                        </li>
                                                        <li>
                                                            <h6>Total Item</h6>
                                                            <p><?= $getnum ?> Items</p>
                                                        </li>
                                                        <li>
                                                            <h6>Order Time</h6>
                                                            <p><?= convertDate($row['create_date']) ?></p>
                                                        </li>
                                                        <li>
                                                            <h6>Total Amount</h6>
                                                            <p>₹ <?= $row['grand_total']  ?> /-</p>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="orderlist-deliver">
                                                        <h6>Delivery location</h6>
                                                        <p><?= $row['address'] ?></p>
                                                        <hr>
                                                        <h6>Pin Code
                                                            : <?= $row['pincode'] ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="table-scroll">
                                                        <table class="table-list">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">SNo.</th>
                                                                    <th scope="col">Product</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Price*QTY</th>
                                                                    <th scope="col">Total Amt.</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $j = 0;
                                                                $checkoutProduct = getRowById('tbl_checkout_product', 'checkoutid', $row['id']);
                                                                if (!empty($checkoutProduct)) {
                                                                    foreach ($checkoutProduct as $productRow) {


                                                                        $j = $j + 1;
                                                                ?>
                                                                        <tr>
                                                                            <td class="table-serial">
                                                                                <h6><?= $j ?></h6>
                                                                            </td>
                                                                            <td class="table-image">
                                                                                <img src="<?= setImage($productRow['product_img'], 'uploads/products/') ?>" alt="<?= $productRow['product_name'] ?>">
                                                                            </td>
                                                                            <td class="table-name">
                                                                                <h6><?= $productRow['product_name'] ?></h6>
                                                                            </td>
                                                                            <td class="table-price">
                                                                                <h6>₹ <?= $productRow['product_price'] ?>*<?= $productRow['product_quantity'] ?></h6>
                                                                            </td>
                                                                            <td class="table-quantity">
                                                                                <h6>₹ <?= $productRow['total_pro_amt'] ?> /-</h6>
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } else {
                                // echo '<h3>No Order History Found</h3>';
                            }
                            ?>
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