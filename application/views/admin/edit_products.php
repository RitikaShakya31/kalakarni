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
                        <button onclick="history.back()" class="btn btn-dark"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i></button>
                    </li>
                </ul>
            </div>
        </header>
        <section class="page-content container-fluid">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($productInfo as $row) {
                                // print_r($row);
                                ?>

                                <form action="<?php echo base_url() . 'admin_Dashboard/editproductdetails' ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <input class="form-control" type="hidden" name="product_id"
                                            value="<?= $row['product_id']; ?>">
                                        <div class="form-group col-md-4">
                                            <label class="">Product Category Name</label>
                                            <select class="form-control" name="category_id" id="category_id">
                                                <option>Select Product Category</option>
                                                <?php foreach ($category as $rows) {
                                                    ?>
                                                    <option value="<?= $rows['category_id']; ?>"
                                                        <?= (($rows['category_id'] == $row['category_id']) ? 'selected' : '') ?>>
                                                        <?= $rows['cat_name']; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="">Product SubCategory Name</label>
                                            <select class="form-control" name="sub_category_id" id="sub_category_id">
                                                <option disabled>Select Product Sub Category</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="">Product Name</label>
                                            <input class="form-control" type="text" name="pro_name"
                                                value="<?= $row['pro_name']; ?>">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="">Product Price</label>
                                            <input class="form-control" type="text" name="price"
                                                value="<?= $row['price']; ?>">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="">Product Old Price (will be displayed , when product is on
                                                sale)</label>
                                            <input class="form-control" type="text" name="old_price"
                                                value="<?= $row['old_price']; ?>">
                                        </div>
                                        <div class="form-group col-md-4 col-md-4 produ" style="display:none">
                                            <label class="">Length</label>
                                            <select class="form-control" name="length" id="length">
                                                <option>Select Length</option>
                                                <?php foreach ($length as $data) {
                                                    ?>
                                                    <option value="<?= $data['id']; ?>" <?= (($data['id'] == $row['length']) ? 'selected' : '') ?>><?= $data['length']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-md-4 produ" style="display:none">
                                            <label class="">Fabric</label>
                                            <select class="form-control" name="fabric" id="fabric">
                                                <option>Select fabric</option>
                                                <?php foreach ($fabric as $data) {
                                                    ?>
                                                    <option value="<?= $data['id']; ?>" <?= (($data['id'] == $row['fabric']) ? 'selected' : '') ?>><?= $data['fabric']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-md-4 produ" style="display:none">
                                            <label class="">Pattern</label>
                                            <select class="form-control" name="pattern" id="pattern">
                                                <option>Select pattern</option>
                                                <?php foreach ($pattern as $data) {
                                                    ?>
                                                    <option value="<?= $data['id']; ?>" <?= (($data['id'] == $row['pattern']) ? 'selected' : '') ?>><?= $data['pattern']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="">Product Description</label>
                                            <textarea cols="80" id="editor1" name="description"
                                                rows="10"><?= $row['description']; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="">Product Images</label>
                                            <div class="row">
                                                <?php
                                                foreach ($productimg as $img) {
                                                    ?>
                                                    <div class="col-md-3 col-lg-3 col-xl-3 p-1">
                                                        <img src="<?= base_url('uploads/products/') . $img['pi_name'] ?>"
                                                            style="width: 100%;" class="shadow" />
                                                        <a href="<?php echo base_url() . 'admin_Dashboard/deleteproductimg/' . $img['pi_id'] . '/' . $img['product_id']; ?>"
                                                            class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>

                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-light">Update</button>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
        </section>

    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $('#category_id').change(function () {
            var category_id = $('#category_id').val();
            if (category_id == '39') {
                $(".produ").hide();
            } else {
                $(".produ").show();
            }
            $.ajax({
                method: "POST",
                url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
                data: {
                    category_id: category_id
                },
                success: function (response) {
                    $('#sub_category_id').html(response);
                }
            });
        });
        <?php
        if ($row['category_id'] == '39') {
            ?>
            $(".produ").hide();
            <?php
        } else {
            ?>
            $(".produ").show();
            <?php
        }
        ?>
    </script>
</body>

</html>