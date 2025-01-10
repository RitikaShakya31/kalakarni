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
                    <h1>Product Category Add</h1>
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

                            <form action="<?php echo base_url('admin_Dashboard/addsubcategory') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="">
                                            <div class="form-group">
                                                <label class="">Main Category </label>
                                                <select class="form-control" name="cat_id">
                                                    <option>Select Category</option>
                                                    <?php
                                                    foreach ($category as $cat) {
                                                    ?>
                                                        <option value="<?= $cat['category_id'] ?>"><?= $cat['cat_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label class="">Sub Category Name</label>
                                                <input class="form-control" required="" type="text" name="subcat_name" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="">Sub Category Image</label>
                                                <div class="pos-relative">
                                                    <input class="form-control pd-r-80" required="" type="file" name="image">
                                                </div>
                                            </div>

                                            <button name="submit" class="btn  btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    </section>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>