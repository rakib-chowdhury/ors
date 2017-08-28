<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');

?>

<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>

        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2>এস.এম.এস সম্পর্কিত তথ্য </h2>
                    <hr>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered sms-counter" style="width:60%;margin:0px auto;">
                        <tr>
                            <th colspan="2" class="text-center">এস, এম, এস</th>
                        </tr>
                        <tr>
                            <th>মজুদ আছে</th>
                            <td>
                                <?php
                                $res = $sms_info[0]['total_sms_number'] - $sms_info[0]['send_sms_number'];
                                $output = str_replace(range(0, 9), $bn_digits, $res);
                                echo $output;
                                ?> টি
                            </td>
                        </tr>
                        <tr>
                            <th>পাঠানো হয়েছে
                                <table width="80%">
                                    <?php
                                    foreach ($sms_info2 as $sss) { ?>
                                    <tr>
                                        <td style="width: 50%; text-align: right">
                                            <?php
                                            if ($sss['sms_type'] == 1) {
                                                echo 'সংগঠক রেজিস্ট্রেশন';
                                            }elseif ($sss['sms_type'] == 2) {
                                                echo 'সমবায় রেজিস্ট্রেশন';
                                            }elseif ($sss['sms_type'] == 3) {
                                                echo 'অ্যাডমিন অনুমোদন';
                                            }elseif ($sss['sms_type'] == 4) {
                                                echo 'অ্যাডমিন বাতিল';
                                            }elseif ($sss['sms_type'] == 5) {
                                                echo 'জেলা কর্মকর্তা কর্তৃক অনুমোদন';
                                            }elseif ($sss['sms_type'] == 6) {
                                                echo 'জেলা কর্মকর্তা কর্তৃক বাতিল';
                                            }elseif ($sss['sms_type'] == 7) {
                                                echo 'উপজেলা কর্মকর্তা অনুমোদন';
                                            }elseif ($sss['sms_type'] == 8) {
                                                echo 'পাসওয়ার্ড পুনরুদ্ধার';
                                            }
                                            ?>
                                        </td>
                                        <?php if ($sss['sms_type'] == 2) { ?>
                                        <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,($sss['tt']*3))?> টি</td>
                                        <?php }elseif ($sss['sms_type'] == 3 || $sss['sms_type'] == 4) { ?>
                                        <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,(($sss['tt']*3)))?> টি</td>                                        
                                        <?php }elseif ($sss['sms_type'] == 7 || $sss['sms_type'] == 6 || $sss['sms_type'] == 5) { ?>
                                        <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,(($sss['tt']*3)))?> টি</td>
                                        <?php }else{?>
                                        <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,$sss['tt'])?> টি</td>
                                        <?php } ?>
                                    </tr>
                                    <?php }  ?>

                                </table>
                            </th>
                            <td>
                                <?php
                                $output = str_replace(range(0, 9), $bn_digits, $sms_info[0]['send_sms_number']);
                                echo $output; ?> টি
                            </td>
                        </tr>
                    </table>
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

