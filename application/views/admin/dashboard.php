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
          <h1>Dashboard</h1>
        </div>

      </div>
    </header>

    <section class="page-content container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="row m-0 col-border-xl">
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-primary float-left m-r-20">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </div>
                  <h5 class="card-title m-b-5 counter" data-count="<?= $category ?>">
                    <?= $category ?>
                  </h5>
                  <h6 class="text-muted m-t-10">Product Category</h6>


                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-accent float-left m-r-20">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </div>
                  <h5 class="card-title m-b-5 counter" data-count="<?= $products ?>">
                    <?= $products ?>
                  </h5>
                  <h6 class="text-muted m-t-10">Product </h6>

                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-info float-left m-r-20">
                  <i class="fas fa-shipping-fast"></i>
                  </div>
                  <h5 class="card-title m-b-5 counter" data-count="<?= $new ?>">
                    <?= $new ?>
                  </h5>
                  <h6 class="text-muted m-t-10">New Order</h6>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-success float-left m-r-20">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                  <h5 class="card-title m-b-5  counter" data-count="<?= $user_registration ?>">
                    <?= $user_registration ?>
                  </h5>
                  <h6 class="text-muted m-t-10">Registered Users</h6>

                </div>
              </div>
            </div>
            <div class="row m-0 col-border-xl">
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-info float-left m-r-20">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                  </div>
                  <h5 class="card-title m-b-5 counter" data-count="<?= $contact_query ?>">
                    <?= $contact_query ?>
                  </h5>
                  <h6 class="text-muted m-t-10">Contact Query</h6>


                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-success float-left m-r-20">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </div>
                  <h5 class="card-title m-b-5 counter" data-count="<?= $completed ?>">
                    <?= $completed ?>
                  </h5>
                  <h6 class="text-muted m-t-10">Completed order </h6>

                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-primary float-left m-r-20">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                  </div>
                  <h5 class="card-title m-b-5 counter" data-count="<?= $working ?>">
                    <?= $working ?>
                  </h5>
                  <h6 class="text-muted m-t-10">On-working order</h6>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="card-body">
                  <div class="icon-rounded icon-rounded-accent float-left m-r-20">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </div>
                  <h5 class="card-title m-b-5  counter" data-count="<?= $cancelled ?>">
                    <?= $user_registration ?>
                  </h5>
                  <h6 class="text-muted m-t-10">Cancelled Order </h6>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="card">
            <div class="card-header">
              Todays Order
              <ul class="actions top-right">
                <li>
                  <a href="javascript:void(0)" data-q-action="card-expand"><i class="icon dripicons-expand-2"></i></a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="recent-transaction-table" class="table table-striped table-bordered" style="width: 100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Order date</th>

                      <th>Contact details </th>

                      <th>Payment <br> Details</th>
                      <th>Grand total</th>
                      <th>View details</th>
                      <th>Order Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    if (!empty($checkout)) {
                      foreach ($checkout as $row) {
                    ?>

                        <tr>
                          <td><?php echo $i; ?></td>
                          <td style="word-wrap: break-word;"><?php echo convertDatedmy($row['create_date']); ?></td>
                          <td><?php echo $row['name']; ?><br>Cont. - <?php echo $row['number']; ?><br>Add. - <?php echo $row['address']; ?></td>

                          <td><?php echo (($row['payment_type'] == '1') ? 'Online Payment' : 'COD'); ?></td>
                          <td><?php echo $row['grand_total']; ?></td>
                          <td><a href="<?php echo base_url() . 'admin_Dashboard/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-danger edit"><i class="fas fa-eye"></i></a></td>
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
                                        <option value="1">On-working</option>
                                        <option value="2">Cancelled</option>
                                        <option value="3">Completed</option>
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
                            <button type="button" data-toggle="modal" data-target="#exampleModal<?= $row['id'] ?>" class="btn btn-<?= (($row['status'] == 0) ? 'info' : (($row['status'] == 1) ? 'warning' : (($row['status'] == 2) ? 'danger' : (($row['status'] == 3) ? 'success' : 'secondary')))) ?>"> <?= (($row['status'] == 0) ? 'New order' : (($row['status'] == 1) ? 'On the way' : (($row['status'] == 2) ? 'Cancelled' : (($row['status'] == 3) ? '   Delivered' : '')))) ?>
                            </button>

                          </td>


                        </tr>

                    <?php
                        $i++;
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!--END PAGE CONTENT -->
  </div>

  </div>
  </div>
  <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>