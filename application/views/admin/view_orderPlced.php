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
            <div class="content-wrapper">

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <a href="<?= base_url('admin_Dashboard/orderPlaced_status/0') ?>" class="p-1 m-1 btn btn-secondary">New Order <span class="p-1 m-0 badge badge-info"><?= $count_new ?></span></a>
                                <a href="<?= base_url('admin_Dashboard/orderPlaced_status/1') ?>" class="p-1 m-1 btn btn-secondary">Order Ready <span class="p-1 m-0 badge badge-info"><?= $count_order ?></span></a>
                                <a href="<?= base_url('admin_Dashboard/orderPlaced_status/5') ?>" class="p-1 m-1 btn btn-secondary">Shipment <span class="p-1 m-0 badge badge-info"><?= $count_shipment ?></span></a>
                                <a href="<?= base_url('admin_Dashboard/orderPlaced_status/6') ?>" class="p-1 m-1 btn btn-secondary">On The Way <span class="p-1 m-0 badge badge-info"><?= $count_way ?></span></a>
                                <a href="<?= base_url('admin_Dashboard/orderPlaced_status/3') ?>" class="p-1 m-1 btn btn-secondary">delivered <span class="p-1 m-0 badge badge-info"><?= $count_delivered ?></span></a>
                                <!--<a href="<?= base_url('admin_Dashboard/orderPlaced_status/8') ?>" class="p-1 m-1 btn btn-secondary">Returned request <span class="p-1 m-0 badge badge-info"><?= $count_retreq ?></span></a>-->
                                <!--<a href="<?= base_url('admin_Dashboard/orderPlaced_status/4') ?>" class="p-1 m-1 btn btn-secondary">Returned <span class="p-1 m-0 badge badge-info"><?= $count_return ?></span></a>-->
                                <a href="<?= base_url('admin_Dashboard/orderPlaced_status/2') ?>" class="p-1 m-1 btn btn-secondary">Cancelled request <span class="p-1 m-0 badge badge-info"><?= $count_canreq ?></span></a>
                                <!--<a href="<?= base_url('admin_Dashboard/orderPlaced_status/7') ?>" class="p-1 m-1 btn btn-secondary">cancelled <span class="p-1 m-0 badge badge-info"><?= $count_can ?></span></a>-->

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">

                                <ul class="actions top-right">
                                    <li>
                                        <a href="javascript:void(0)" data-q-action="card-expand"><i class="icon dripicons-expand-2"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table" style="width:100%; overflow-x:scroll; ">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <!--<th>Order Id</th>-->
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Contact </th>
                                            <th>Grand total</th>
                                            <th>View details</th>

                                            <th>Order Status</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    if (!empty($checkout)) {
                                        foreach ($checkout as $row) {
                                            $getUserType = getRowById('tbl_user_registration', 'reg_id', $row['user_id'])[0];
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <!--<td><?php echo $row['orderId']; ?></td>-->
                                                    <td style="word-wrap: break-word;"> <?php echo  wordwrap(convertDatedmyhis($row['create_date']), 10, '<br>'); ?></td>
                                                    <td><?php echo $getUserType['type'] == 1 ? 'Guest' : 'User' ; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['number']; ?></td>
                                                    <!-- <td><?php echo wordwrap($row['address'], 20, '<br>'); ?></td> -->
                                                    <td> Rs. <?php echo $row['grand_total']; ?><br><span class="text-secondary">
                                                            ( <?php echo (($row['payment_type'] == '1') ? 'Online Payment <br> Payment Id -' . $row['razorpay_payment_id']   : 'COD'); ?> )

                                                        </span></td>
                                                    <td><a href="<?php echo base_url() . 'admin_Dashboard/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-info  ">
                                                            <i class="fas fa-eye"></i></a> </td>
                                                    <td>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Update status
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="<?= base_url('admin_Dashboard/statusupdate') ?>" method="POST">
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                                                            <select name="status" class="form-control">
                                                                                <option value="0">New</option>
                                                                                <option value="1">Order Ready</option>
                                                                                <option value="5">Shipment Initaited</option>
                                                                                <!-- <option value="6">On The Way</option> -->
                                                                                <option value="3">Order delivered</option>
                                                                                <!--<option value="4">Order Returned</option>-->
                                                                                <option value="4">Confirm Cancel Order</option>
                                                                                <!--<option value="9">Order Return Initiated</option>-->
                                                                            </select>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <?php if ($row['status'] != 2) {  ?>

                                                            <button type="button" class="btn btn-<?= (($row['status'] == 0) ? 'info' : (($row['status'] == 1) ? 'warning' : (($row['status'] == 3) ? 'success' : (($row['status'] == '4') ? 'warning' : (($row['status'] == '5') ? 'info' : (($row['status'] == '6') ? 'primary' : (($row['status'] == '7') ? 'danger' : (($row['status'] == '8') ? 'warning' : (($row['status'] == '9') ? 'dark' : ''))))))))) ?>" data-toggle="modal" data-target="#exampleModal<?= $row['id'] ?>">

                                                                <?php echo (($row['status'] == '0') ? 'New order' : (($row['status'] == '1') ? 'On process'  : (($row['status'] == '3') ? 'Order delivered' : (($row['status'] == '4') ? 'Order Returned' : (($row['status'] == '5') ? 'Shipment' : (($row['status'] == '6') ? 'On the way' : (($row['status'] == '7') ? 'Order Cancelled' : (($row['status'] == '8') ? 'Request for return' : (($row['status'] == '9') ? 'Order return initiated' : ''))))))))); ?>

                                                            </button>

                                                        <?php
                                                        } else { ?>

                                                            <button type="button" class="btn btn-danger">
                                                                Order Cancelled
                                                            </button>

                                                        <?php }  ?>
                                                    </td>

                                                </tr>
                                            </tbody>
                                    <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                </table>


                            </div>
                        </div>
                    </div>
        </section>
        <!-- container-scroller -->
        <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>