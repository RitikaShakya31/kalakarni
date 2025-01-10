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
                        <h3 class="page-title"> <?= $title ?> </h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="row p-1">
                                    <div class="col-md-4">
                                        <select name="filter_status" id="filter_status" class="form-control">
                                            <option value="0">New</option>
                                            <option value="1">On-working</option>

                                            <option value="2">Cancelled and refunded</option>
                                            <option value="3">Completed</option>
                                            <!--<option value="">On-working</option>-->
                                        </select>
                                    </div>
                                    <!--<div class="col-md-2">-->

                                    <!--   <select name="filter_payment" class="form-control">-->
                                    <!--                                             <option value="0">Payment done</option>-->
                                    <!--                                             <option value="1">Payment notdone</option>-->


                                    <!--                                         </select>-->
                                    <!--</div>-->

                                    <div class="col-md-2">
                                        <input type="button" id="find" class="btn btn-danger" value="View Order list" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div id="data"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php $this->load->view('admin/template/footer'); ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $('#find').click(function() {
            getdata();
        });
        getdata();

        function getdata() {
            // $('#data1').html('LOADING......');
            var filter_status = $('#filter_status').val();
            // var filter_payment = $('#filter_payment').val();

            $.ajax({
                url: "<?= base_url('Admin_Dashboard/fetchorder') ?>",
                method: "POST",
                data: {
                    filter_status: filter_status
                    // filter_payment: filter_payment
                },
                success: function(data) {
                    console.log(data);
                    $('#data').html(data);
                    // $('#data1').html('');
                }
            });

        }
    </script>
</body>

</html>