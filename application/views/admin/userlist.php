<table  class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Date</th>
                                                <th>fullname</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>View orders</th>
                                                <!--<th>Actions</th>-->
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($registeredUser)) {
                                            foreach ($registeredUser as $row) {
                                                $orderCount = getNumRows('checkout', array('user_id' => $row['reg_id']));
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo convertDatedmy($row['create_date']); ?></td>
                                                        <td><?php echo $row['fullname']; ?></td>
                                                        <td><?php echo $row['emailid']; ?></td>
                                                        <td><?php echo $row['contact']; ?></td>
                                                        <!-- <td><?php echo $row['password']; ?></td> -->
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/orderPlaced/' . $row['reg_id']; ?>" class="btn btn-info"><i class="fas fa-shopping-cart"></i> (<?= $orderCount ?>)</a>
                                                        </td>
                                                        <!--<td>-->
                                                        <!--    <a href="<?php echo base_url() . 'admin_Dashboard/blockuser/' . $row['reg_id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>-->
                                                        <!--</td>-->

                                                    </tr>
                                                </tbody>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </table>