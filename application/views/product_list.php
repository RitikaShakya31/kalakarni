<?php $this->load->view('includes/head'); ?>
<?php include('includes/menu.php'); ?>
<section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
    <div class="container">
        <h2>Product List</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product List</li>
        </ol>
    </div>
</section>
<section class="inner-section shop-part">
    <div class="container">
        <div class="row content-reverse">
            <div class="col-lg-3">
                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Search</h6>
                    <form>
                        <div class="mb-3">
                            <input class="shop-widget-search" type="text" placeholder="Search...">
                        </div>
                        <button class="shop-widget-btn">
                            <i class="fas fa-search"></i><span>search</span>
                        </button>
                    </form>
                </div>
                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Price</h6>
                    <form>
                        <div class="shop-widget-group">
                            <select name="" id="slider_price_min" class="pricefilter shop-widget-search">
                                <?php
                                for ($i = 0; $i <= 50000; $i += 500) {
                                ?>
                                    <option value="<?= $i; ?>" <?= ((isset($minimum) ? (($minimum == $i) ? 'selected' : '') : '')) ?>><?= $i; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select name="" id="slider_price_max" class="pricefilter shop-widget-search">
                                <?php

                                for ($i = 1000000; $i >= 100; $i -= 500) {
                                ?>
                                    <option value="<?= $i; ?>" <?= ((isset($maximum) ? (($maximum == $i) ? 'selected' : '') : ((50000 == $i) ? 'selected' : ''))) ?>><?= $i; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button class="shop-widget-btn"><i class="fas fa-search"></i><span>search</span></button>
                    </form>
                </div>
                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by</h6>
                    <form>
                        <ul class="shop-widget-list">
                            <?php
                            if (!empty($category)) {
                                $cateLabel = 1;
                                foreach ($category as $row) {
                            ?>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input class="common_selector category" type="checkbox" id="tag<?= $cateLabel ?>" value="<?= $row['category_id']; ?>" <?= (($cat != '') ? (($cat['category_id'] == $row['category_id']) ? 'checked' : '') : '') ?> /><label for="tag<?= $cateLabel ?>"><?= $row['cat_name']; ?></label>
                                        </div>
                                    </li>
                            <?php
                                    $cateLabel++;
                                }
                                unset($cateLabel, $row);
                            }
                            ?>
                        </ul>

                    </form>
                </div>
                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Fabric</h6>
                    <form>
                        <ul class="shop-widget-list shop-widget">
                            <?php
                            if (!empty($fabric)) {
                                $fabricLabel = 1;
                                foreach ($fabric as $row) {
                            ?>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input class="common_selector fabric" type="checkbox" id="brand<?= $fabricLabel ?>" value="<?= $row['id']; ?>" /><label for="brand<?= $fabricLabel ?>"><?= $row['fabric']; ?></label>
                                        </div>
                                    </li>
                            <?php
                                    $fabricLabel++;
                                }
                                unset($fabricLabel, $row);
                            }
                            ?>
                        </ul>
                    </form>
                </div>
                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Length</h6>
                    <form>
                        <ul class="shop-widget-list shop-widget">
                            <?php
                            if (!empty($length)) {
                                $lengthLabel = 1;
                                foreach ($length as $row) {
                            ?>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input class="common_selector length" type="checkbox" id="length<?= $lengthLabel ?>" value="<?= $row['id']; ?>" /><label for="length<?= $lengthLabel ?>"><?= $row['length']; ?></label>
                                        </div>
                                    </li>
                            <?php
                                    $lengthLabel++;
                                }
                                unset($lengthLabel, $row);
                            }
                            ?>
                        </ul>
                    </form>
                </div>
                <div class="shop-widget">
                    <h6 class="shop-widget-title">Filter by Pattern</h6>
                    <form>
                        <ul class="shop-widget-list shop-widget">
                            <?php
                            if (!empty($pattern)) {
                                $patternLabel = 1;
                                foreach ($pattern as $row) {
                            ?>
                                    <li>
                                        <div class="shop-widget-content">
                                            <input class="common_selector pattern" type="checkbox" id="pattern<?= $patternLabel ?>" value="<?= $row['id']; ?>" /><label for="pattern<?= $patternLabel ?>"><?= $row['pattern']; ?></label>
                                        </div>
                                    </li>
                            <?php
                                    $patternLabel++;
                                }
                                unset($patternLabel, $row);
                            }
                            ?>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-filter">

                            <div class="filter-short"><label class="filter-label">Short by :</label>
                                <select class="form-select filter-select" id="ec-price_hm">
                                    <option value="">Select Range</option>
                                    <option value="0">Price, low to high</option>
                                    <option value="1">Price, high to low</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row" id="filter_data">
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/script'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        filter_data();

        function filter_data() {
            var action = 'fetch_data';
            var minimum_price = $('#slider_price_min').val();
            var maximum_price = $('#slider_price_max').val();
            var search = $('#search').val();
            var category = get_filter('category');
            var fabric = get_filter('fabric');
            var length = get_filter('length');
            var pattern = get_filter('pattern');
            $.ajax({
                url: "<?= base_url('Web/filterData') ?>",
                method: "POST",
                // dataType: "JSON",
                data: {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    category: category,
                    fabric: fabric,
                    length: length,
                    search: search,
                    pattern: pattern
                },
                beforeSend: function() {
                    $("#filter_data").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                },
                success: function(data) {
                    $('#filter_data').html(data);
                }
            })
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }
        $('.common_selector').click(function() {
            $('#search').val('');
            filter_data();
        });
        $('.common_selector').keyup(function() {
            $('#search').val('');
            filter_data();
        });
        $('.pricefilter').change(function() {
            $('#search').val('');
            filter_data();
        });
        $(document).on('click', '#clearall', function(event) {
            event.preventDefault();
            $('.common_selector').prop('checked', false);
            $('#slider_price_min').val(0);
            $('#slider_price_max').val(50000);
            filter_data();
        });
    });
</script>

</body>

</html>