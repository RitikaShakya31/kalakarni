<?php include('includes/head.php'); ?>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">

        <?php include('includes/menu.php'); ?>
        <div class="ls ls page-about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="content-block__01">
                            <?php
                            if (!empty($privacypolicy)) {
                                foreach ($privacypolicy as $row) {
                            ?>
                                    <?= $row['particulars']; ?>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <?php include('includes/footer.php'); ?>

</div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->

<?php include('includes/script.php'); ?>

</body>


</html>