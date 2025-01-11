<?php include('includes/head.php'); ?>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">
        <?php include('includes/menu.php'); ?>
        <div class="ls  ">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-about__title-wrapper" style="margin-bottom: 40px;">
                        </div>
                        <div class="row">
                            <?php
                            if (!empty($products)) {
                                foreach ($products as $row) {
                                    product($row, '3');
                                }
                            }
                            else{
                                echo '<h4 style="text-align:center; margin-bottom:35px" class="mb-5">Sorry . There is no product available</h4>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
    </div><!-- eof #box_wrapper -->
    <?php include('includes/script.php'); ?>
    </body>
    </html>