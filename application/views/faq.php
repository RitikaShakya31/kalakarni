<?php include('includes/head.php'); ?>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">

        <?php include('includes/menu.php'); ?>
        <div class="ls ls page-about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="panel-group" id="accordion1">
                            <?php
                            if (!empty($faq)) {
                                $i = 0;
                                foreach ($faq as $row) {
                            ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse<?= $i ?>" class="collapsed">
                                                    <i class="rt-icon2-bubble highlight"></i>
                                                    <?= $row['f_title']; ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?= $row['f_description']; ?>
                                            </div>
                                        </div>
                                    </div>



                            <?php
                                    $i++;
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