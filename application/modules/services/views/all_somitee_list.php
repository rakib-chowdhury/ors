<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2><?php echo $title;?></h2>
                        <hr>
                        <table id="org-list-table" class="table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th>ক্রমিক</th>
                                <th>তারিখ</th>
                                <th style="text-align:center;">সমবায়ের নাম</th>
                                <th>ট্র্যাকিং নম্বর</th>
                                <th style="text-align:center;">অ্যাকশন</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($somitee_info as $row) { ?>
                                <tr>
                                    <td>
                                        <?php
                                        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                        $output = str_replace(range(0, 9), $bn_digits, $i);
                                        $i++;
                                        echo $output;
                                        ?>
                                    </td>
                                    <td><?php echo $row['somitee_reg_date'] ?></td>
                                    <td>
                                        <a href="index.php/services/somitee_list_detail/<?php echo $row['somitee_id'] . '/'.$s_type; ?>"><?php echo $row['somitee_name']; ?></a>
                                    </td>
                                    <td>
                                         <?php echo $row['somitee_track_id']; ?>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModal<?=$row['somitee_id']?>" class="btn btn-info btn-xs" href="">বাতিল করুন</a>

                                        <!-- Modal -->
                                        <div id="myModal<?=$row['somitee_id']?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <form action="<?= base_url() ?>services/delete_somitee_info">
                                                    <input type="hidden" name="somitee_id" value="<?=$row['somitee_id'] ?>">
                                                    <input type="hidden" name="user_id" value="<?=$row['user_reg_id'] ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p style="color: red; text-align: center; font-size: 25px" >আপনি কি বাতিল করতে ইচ্ছুক?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">হ্যাঁ</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">না</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#dataTable').dataTable({
    "bDestroy": true
    });
</script>