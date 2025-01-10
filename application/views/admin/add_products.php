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
                    <h1><?= $title ?></h1>
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
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo base_url() . 'admin_Dashboard/addproducts' ?>" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="row">

                                            <div class="form-group col-md-4">
                                                <label class="">Product Category Name</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option>Select Product Category</option>
                                                    <?php foreach ($category as $row) {
                                                    ?>
                                                        <option value="<?= $row['category_id']; ?>"><?= $row['cat_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="">Product Name</label>
                                                <input class="form-control" required="" type="text" name="pro_name">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="">Product Price</label>
                                                <input class="form-control" type="text" name="price">
                                            </div>
                                            <div class="form-group col-md-4 col-md-4">
                                                <label class="">Product Old Price </label>
                                                <input class="form-control" type="text" name="old_price">
                                            </div>
                                            <div class="form-group col-md-4 col-md-4 produ" style="display:none">
                                                <label class="">Length</label>
                                                <select class="form-control" name="length" id="length">
                                                    <option>Select Length</option>
                                                    <?php foreach ($length as $row) {
                                                    ?>
                                                        <option value="<?= $row['id']; ?>"><?= $row['length']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-md-4 produ" style="display:none">
                                                <label class="">Fabric</label>
                                                <select class="form-control" name="fabric" id="fabric">
                                                    <option>Select fabric</option>
                                                    <?php foreach ($fabric as $row) {
                                                    ?>
                                                        <option value="<?= $row['id']; ?>"><?= $row['fabric']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 col-md-4 produ" style="display:none">
                                                <label class="">Pattern</label>
                                                <select class="form-control" name="pattern" id="pattern">
                                                    <option>Select pattern</option>
                                                    <?php foreach ($pattern as $row) {
                                                    ?>
                                                        <option value="<?= $row['id']; ?>"><?= $row['pattern']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-8">
                                                <label class="">Add Product Images </label>
                                                <div class="pos-relative">
                                                    <input class="form-control pd-r-80" required="" type="file" name="img[]" multiple>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="">Product Description</label>
                                                <textarea cols="80" id="editor1" name="description" rows="10"></textarea>
                                            </div>

                                            <div class="form-group col-md-12">

                                                <button type="submit" class="btn  btn-light ">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $('#category_id').change(function() {
            var category_id = $('#category_id').val();
            console.log(category_id);
            if(category_id == '39'){
                $(".produ").hide();
            }else{
                 $(".produ").show();
            }
            // $.ajax({
            //     method: "POST",
            //     url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
            //     data: {
            //         category_id: category_id
            //     },
            //     success: function(response) {
            //         $('#sub_category_id').html(response);
            //     }
            // });
        });
    </script>
</body>

</html>