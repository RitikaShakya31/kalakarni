<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/template/header_link'); ?>

<body class="sidebar-fixed">
    <div id="app">
        <?php $this->load->view('admin/template/header'); ?>

        <?php $this->load->view('admin/template/sidebar'); ?>
        <!--START PAGE HEADER -->
        <header class="page-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h1>Add Promocode</h1>
                </div>

                <ul class="actions top-right">
                    <li>
                        <button onclick="history.back()" class="btn btn-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                    </li>
                </ul>

            </div>
        </header>

        <section class="page-content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="<?php echo base_url('admin_Dashboard/addpromocode') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="">
                                            <div class="form-group">
                                                <label class="">Promocode</label>
                                                <input class="form-control" required="" type="text" name="title">
                                            </div>

                                            <div class="form-group">
                                                <label class="">Amount Deduction</label>
                                                <input class="form-control" required="" type="text" name="deduction">
                                            </div>
                                            <div class="form-group">
                                                <label class="">Minimum Amount</label>
                                                <input class="form-control" required="" type="text" name="min_amt">
                                            </div>

                                            <div class="form-group">
                                                <label class="">Description</label>

                                                <textarea class="form-control " required="" name="description"></textarea>

                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>