<?php include('includes/head.php'); ?>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">

        <?php include('includes/menu.php'); ?>
        <section class="coming-part">
            <div class="container">
                <div class="row align-items-center justify-content-center ">
                    <div class="col-lg-7">
                        <div class="coming-content text-center">
                            <?php echo $message; ?>

                            <div class="coming-social">
                                <a href="<?= base_url('product') ?>" class="btn btn-priamry" style="margin-bottom:12px">Continue Shopping</a>
                                <a href="<?= base_url('my-orders') ?>" class="btn btn-success" style="margin-bottom:12px">View Orders </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>


    <?php include('includes/footer.php'); ?>

</div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->

<?php include('includes/script.php'); ?>

</body>


</html>