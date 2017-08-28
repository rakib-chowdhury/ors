<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2><?php echo $title;?></h2>
                        <hr>
                        <table id="" class="data-table table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                              
                            <th>ক্রমিক</th>
                                <th style="text-align:center;">NID</th>
                                <th style="text-align:center;">সমবায়ের নাম</th>
                                <th>ট্র্যাকিং নম্বর</th>
                               <th>SMS Type</th>
                               <th>Resend</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($sms_list as $row) { ?>
                                <tr>
                                    
<td>
<?php  $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                        $output = str_replace(range(0, 9), $bn_digits, $i);
                                  
                                        echo $output; ?>
</td>
                                    <td><?php echo $row['n_id'] ?></td>
                                    <td>
                                       <?php echo $row['phone']; ?>
                                    </td>
                                    <td>
                                         <?php echo $row['auto_code']; ?>
                                    </td>
                                   <td>
                                         <?php if($row['sms_type']==1){echo 'Sign Up';}
if($row['sms_type']==2){echo 'Somobay Registration';}
if($row['sms_type']==3){echo 'Approve by DOC';}
if($row['sms_type']==4){echo 'Reject by DOC';}
if($row['sms_type']==5){echo 'Approve by DCO';}
if($row['sms_type']==6){echo 'Reject by DCO';}
if($row['sms_type']==8){echo 'Reclaim password';}
 ?>
                                    </td>
                                    <td>
                                       <?php if($row['is_resend']==0){echo '<label class="label label-warning">No</label>';} else {echo '<label class="label label-success">Yes</label>';} ?>
                                    </td>
                                    <td>
                                         <a class="btn btn-info btn-xs" href="index.php/services/sms_resend/<?=$row['sms_service_id'];?>">Re-Send</a>
                                    </td>
                                    
                                </tr>
                            <?php       $i++; } ?>
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