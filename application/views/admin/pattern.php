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
                    <h1><?= $title ?> </h1>
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
                <div class="col-md-12   mb-3 ">
                    <?php if ($msg = $this->session->flashdata('msg')) :
                        $msg_class = $this->session->flashdata('msg_class') ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                            </div>
                        </div>
                    <?php
                        $this->session->unset_userdata('msg');
                    endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="">pattern category</label>
                                        <input class="form-control" type="text" name="pattern" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button type="submit" class="btn  btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"> 
                    <ul class="actions top-right">
                        <li>
                            <a href="javascript:void(0)" data-q-action="card-expand"><i class="icon dripicons-expand-2"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bs4-table" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Category</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <?php
                            $i = 1;
                            if (!empty($pattern)) {
                                foreach ($pattern as $row) {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                             
                                            <td>
                                                <?= $row['pattern'] ?> 
                                            </td>

                                             

                                            <td>
                                                <a href="<?php echo base_url() . 'admin_Dashboard/deletepattern/' . $row['id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>
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
    </div>
    </section>


    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>