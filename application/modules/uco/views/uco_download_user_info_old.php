<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/bootstrap-material-design.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/ripples.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public_assets/css/main.css">
<!--<noscript><meta http-equiv="refresh" content="0; url=index.php/javascript" /></noscript>-->

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body >

<?php  $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="panel panel-hover table-responsive">
                       
                       <h3 style="text-align:center;">সংগঠক-এর তথ্যাবলি</h3>
                        <!-- Nav tabs -->
                        <div class="tab-content">
                            <div >
                                <br>
                                <table class="table table-bordered">
                                    <tr>
                                    <td>নাম</td>
                                    <td><?php echo $leader_info[0]['user_name'];?></td>                                        
                                </tr>
                                <tr>
                                    <td>ভোটার আই ডি</td>
                                    <td><?php echo $leader_info[0]['user_nid'];?></td>                                        
                                </tr>
                                <tr>
                                    <td>ইমেইল</td>
                                    <td><?php echo $leader_info[0]['user_email'];?></td>                                        
                                </tr>
                                <tr>
                                    <td>ফোন</td>
                                    <td><?php echo $leader_info[0]['user_phone'];?></td>                                        
                                </tr>
                                 </table>
                              </div>
                          </div>



                        <h3 style="text-align:center;">সমবায় সম্পর্কিত সাধারন তথ্যাবলি</h3>
                        <!-- Nav tabs -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active " id="somitee_info">
                                <br>
                                <table class="table table-bordered">
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
                                        <td><?php $output = str_replace(range(0, 9),$bn_digits, $somitee_info[0]['somitee_per_share_price']); echo $output.' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>প্রস্তাবিত মোট শেয়ার সংখ্যা</td>
                                        <td><?php  $output = str_replace(range(0, 9),$bn_digits, $somitee_info[0]['somitee_share']); echo $output.' টি'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>প্রস্তাবিত অনুমোদিত মূলধন</td>
                                        <td><?php $output = str_replace(range(0, 9),$bn_digits,$somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['somitee_share']); 
                                                      echo $output.' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>বিক্রিত  শেয়ার সংখ্যা</td>
                                        <td><?php $output = str_replace(range(0, 9),$bn_digits, $somitee_info[0]['sell_share_num']); echo $output.' টি'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>পরিশোধিত মূলধন</td>
                                        <td><?php $output = str_replace(range(0, 9),$bn_digits, ( $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num'] ));                   
                                                   echo $output.' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>সমবায়ের উদ্দেশ্য</td>
                                        <td><?php echo $somitee_info[0]['somitee_purpose']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>সমবায়ের রেজিস্ট্রেশন তারিখ</td>
                                        <td><?php $output = str_replace(range(0, 9),$bn_digits, $somitee_info[0]['somitee_reg_date']); 
                                                      echo $output; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <h3 style="text-align:center;">সমবায় সম্পর্কিত সকল সদস্যদের তথ্যাবলি</h3>
                                    <table width="60%;" align="center" class="table-bordered">
                                        <thead>
                                            <tr>
                                                <td>সমবায় সদস্য ক্রমিক নং</td>
                                                <td>সদস্য  নাম</td>
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
                                                    <p><?= $row['member_name'] ?></p>
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
</body>

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