<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <?php $this->load->view('admin/template/header'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <?php $this->load->view('admin/template/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="page-header">
                        <a href="<?= base_url('admin'); ?>/view_products"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a>
                        <h3 class="page-title">Add Products</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>/view_products">View Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <?php foreach ($products as $row) {
                                    ?>
                                        <form action="<?php echo base_url() . 'admin/view_products/addproducts' ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="">
                                                      
                                                            <div class="form-group">
                                                                <label class="">Product Category Name</label>
                                                                <input class="form-control" required="" type="text" name="category_id" value="<?= $row['product_category']; ?>" readonly>
                                                            </div>

                                                            <!-- <div class="form-group">
                                                                <label class="">Product Subcategory Name</label>
                                                                <input class="form-control" required="" type="text" name="subcategory_id" value="<?= $row['product_subcategory']; ?>" readonly>
                                                            </div> -->
                                                       
                                                        <div class="form-group">
                                                            <label class="">Product Name</label>
                                                            <input class="form-control" required="" type="text" name="pro_name" value="<?= $row['pro_name']; ?>" readonly>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="">Product Price</label>
                                                            <input class="form-control" required="" type="text" name="price" value="<?= $row['price']; ?> INR" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">Product Description</label>
                                                            <textarea cols="80" id="editor1" name="description" rows="10" readonly><?= $row['description']; ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class=""> Image 1</label>
                                                            <div class="pos-relative">
                                                                <img src="<?= base_url(); ?>/assets/admin/img/products/<?= $row['img1']; ?>" width="130px">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class=""> Image 2</label>
                                                            <div class="pos-relative">
                                                                <img src="<?= base_url(); ?>/assets/admin/img/products/<?= $row['img2']; ?>" width="130px">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class=""> Image 3</label>
                                                            <div class="pos-relative">
                                                                <img src="<?= base_url(); ?>/assets/admin/img/products/<?= $row['img3']; ?>" width="130px">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </form>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial:partials/_footer.html -->
                        <?php $this->load->view('admin/template/footer'); ?>
                        <!-- partial -->
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>