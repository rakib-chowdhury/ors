<div class="container-fluid display-table">
    <div class="row display-table-row">
        
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="panel panel-hover table-responsive">
                        <!--<h2><?php echo $somitee_info[0]['somitee_name']; ?></h2>
                        <hr>-->
                        <h3 style="text-align:center;">সমবায় সম্পর্কিত সাধারন তথ্যাবলি</h3>
                        <!-- Nav tabs -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active " id="somitee_info">
                                <br>
                                <table class="table table-striped table-hover table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>নাম</td>
                                        <td><?php echo $somitee_info['0']['somitee_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>শ্রেণী</td>
                                        <td><?php 
                                                      foreach($somitee_sub_category as $row){
                                                         echo $row['somitee_sub_cat_name'].', ';
                                                      }
                                                      foreach($somitee_category as $row){
                                                         echo $row['somitee_cat_name'].' , ';
                                                      }


                                                      echo $somitee_info['0']['somitee_type_name']; 
                                                    ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>কার্যালয়ের ঠিকানা</td>
                                        <td>
                                            <?php echo $somitee_info[0]['somitee_address'] . ' , ' . $somitee_info[0]['bn_upz_name'] . ' , ' . $somitee_info[0]['bn_dist_name'] . ' , ' . $somitee_info[0]['bn_div_name']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>সদস্য নির্বাচনী এলাকা</td>
                                        <td>
                                           <?php echo $somitee_info_sodosso[0]['bn_upz_name'] . ' , ' . $somitee_info_sodosso[0]['bn_dist_name'] . ' , ' . $somitee_info_sodosso[0]['bn_div_name']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>সমবায়ের কর্ম এলাকা</td>
                                        <td>
                                            <?php echo $somitee_info[0]['k_upz_name'] . ' , ' . $somitee_info[0]['k_dist_name'] . ' , ' . $somitee_info[0]['k_div_name']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>প্রতিটি শেয়ার মূল্য</td>
                                        <td><?php echo $somitee_info[0]['somitee_per_share_price'].' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>প্রস্তাবিত মোট শেয়ার সংখ্যা</td>
                                        <td><?php echo $somitee_info[0]['somitee_share'].' টি'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>প্রস্তাবিত অনুমোদিত মূলধন</td>
                                        <td><?php echo ( $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['somitee_share'] ).' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>বিক্রিত  শেয়ার সংখ্যা</td>
                                        <td><?php echo $somitee_info[0]['sell_share_num'].' টি'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>পরিশোধিত মূলধন</td>
                                        <td><?php echo ( $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num'] ).' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>সমবায়ের উদ্দেশ্য</td>
                                        <td><?php echo $somitee_info[0]['somitee_purpose']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>সমবায়ের রেজিস্ট্রেশন তারিখ</td>
                                        <td><?php echo $somitee_info[0]['somitee_reg_date']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <h3 style="text-align:center;">সমবায় সম্পর্কিত সকল সদস্যদের তথ্যাবলি</h3>
                                    <table width="40%;" align="center" class="table-bordered">
                                        <thead>
                                            <tr>
                                                <td>সমবায় সদস্য ক্রমিক নং</td>
                                                <td>সমবায় সদস্যের ভোটার আইডি নাম্বার</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody><?php $i = 1;
                                        foreach ($somitee_member_info as $row) { ?>
                                            <tr style="text-align:center;">
                                                <td>
                                                    <p>
                                                        <?php
                                                        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                                        $output = str_replace(range(0, 9), $bn_digits, $i);
                                                        $i++;
                                                        echo $output;
                                                        ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p><?= $row['somitee_member_nid'] ?></p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div> <!-- /col -->
            </div> <!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>
<script>
 $(document).ready(function(){
 $('#dropdown').hide();
$('#only_btn').hide();
});

    function accept_btn()
    {
         $('#dropdown').hide();
         $('#only_btn').show();
        //document.getElementById("only_btn").style.display = "block";
        //document.getElementById("dropdown").style.display = "none";
    }

     function reject()
    {
        $('#dropdown').show();
        $('#only_btn').show();
        //document.getElementById("dropdown").style.display = "block";
        //document.getElementById("only_btn").style.display = "none";
    }
</script>