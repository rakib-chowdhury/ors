<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-12 display-table-cell" id="main-content">
            <?php $this->load->view('layouts_uco_dco/secondary-nav'); ?>
            <div class="row">
                <?php if ($track == 1 && $pro == 0) { ?>
                    <div class="col-md-3 col-xs-12">
                        <div class="panel tracking well">
                            <table class="table table-stripped">
                                <tr>
                                    <td style="text-align: center" colspan="2">
                                        <img style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;"
                                             src="<?= base_url() . 'uploads/no_img.png' ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>নাম</td>
                                    <td><?php echo $admin_info[0]['admin_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>এন আই ডি</td>
                                    <td><?php echo str_replace(range(0, 9), $bn_digits, $admin_info[0]['admin_nid']); ?></td>
                                </tr>
                                <tr>
                                    <td>ফোন</td>
                                    <td><?php echo str_replace(range(0, 9), $bn_digits, $admin_info[0]['admin_phone']); ?></td>
                                </tr>
                                <tr>
                                    <td>জন্ম তারিখ</td>
                                    <td><?php echo str_replace(range(0, 9), $bn_digits, $admin_info[0]['admin_dob']); ?></td>
                                </tr>
                                <tr>
                                    <td>ইমেইল</td>
                                    <td><?php echo $admin_info[0]['admin_email']; ?></td>
                                </tr>
                                <tr>
                                    <td>অফিস</td>
                                    <td><?php echo "আপীল সমবায় অফিসার "; ?>
                                        <br>
                                        ঢাকা
                                    </td>
                                </tr>
                            </table>

                            <ul class="list-unstyled list-inline">
                                <li><a data-toggle="modal" data-target="#myModal_pass" href="#" class="btn btn-success"
                                       style="margin-top: 12px;">পাসওয়ার্ড পরিবর্তন</a></li>
                            </ul>

                        </div>
                    </div>

                    <div id="track_div" class="col-md-6 ">
                        <div class="panel tracking well" style="min-height: 100px !important">
                            <h4 class="label-success">সমবায় ট্রাকিং</h4>


                            <form action="index.php/appeal/check_tracking_id" method="post" style="margin-bottom: 0">

                                <p style="text-align:center;"><b>ট্রাকিং নম্বর দিয়ে সার্চ করুন</b></p>
                                <div class="form-group" style="position: relative;">
                                    <input type="text" name="tracking_number" class="form-control"
                                           style="padding-right: 130px; height: 46px"
                                           placeholder="আপনার ট্রাকিং আইডি লিখুন">
                                    <button type="submit" class="btn btn-raised btn-danger btn-lg"
                                            style="position: absolute; top: 0; right: 0; padding: 9px 25px; border-top-left-radius: 0; border-bottom-left-radius: 0">
                                        অনুসন্ধান
                                    </button>
                                </div>
                                <?php
                                $exc = $this->session->userdata('message_err');
                                if (!empty($exc)) {
                                    ?>
                                    <strong style="color:red"><?= $exc ?></strong>
                                    <?php $this->session->unset_userdata('message_err'); ?>
                                <?php } ?>
                                <?php
                                $exc = $this->session->userdata('message_sc');

                                if (!empty($exc)) {
                                    ?>
                                    <strong style="color:green"><?= $exc ?></strong>
                                    <?php $this->session->unset_userdata('message_sc'); ?>
                                <?php } ?>

                                <?php echo $this->session->userdata('admin_type'); ?>
                                <br>


                            </form>
                        </div>


                        <div class="panel tracking well" style="min-height: 200px; !important;">
                            <h4 class="label-success" style="background-color: #337ab7">নতুন আবেদন</h4>
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <td style="text-align: center; width: 4%;">#</td>
                                    <td style="text-align: center; ">আপিলের তারিখ</td>
                                    <td style="text-align: center">সমবায়ের নাম</td>
                                    <td style="text-align: center; ">ট্র্যাকিং আইডি</td>
                                    <td style="text-align: center; ">সংগঠকের আবেদন তারিখ</td>
                                    <td>সময়</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($all_new_somitee as $row) { ?>
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
                                        <td><?= str_replace(range(0,9),$bn_digits,$row['appeal_apply_date']);?></td>
                                        <td>
                                            <p><?=$row['somitee_name'] ?> </p>
                                        </td>
                                        <td>
                                            <p><?= $row['somitee_track_id'] ?></p>
                                        </td>
                                        <td><?= str_replace(range(0,9),$bn_digits,explode(' ',$row['somitee_reg_date'])[0]);?></td>
                                        <td>
                                            <?php
                                            $date1 = date_create($row['appeal_apply_date']);
                                            $date2 = date_create(date('Y-m-d'));
                                            $diff = date_diff($date1, $date2);
                                            if($diff->days<=7){
                                                echo str_replace(range(0, 9), $bn_digits, $diff->days).' দিন';
                                            }else{
                                                echo '<span style="color:red">'.str_replace(range(0, 9), $bn_digits, $diff->days).' দিন</span>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if (sizeof($new_somitee_info) == 0) {

                                } else { ?>
                                    <tr>
                                        <td colspan="6" style="text-align: right;"><a
                                                href="<?php echo site_url('appeal/get_somitee/new'); ?>">বিস্তারিত</a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div><!-- /col6 -->

                    <div class="col-md-3" style="padding-right: 30px;padding-top: 25px;">
                        <ul class="list-unstyled list-inline row">
                            <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="margin-bottom: 25px; padding-left: 15px">
                                <a href="index.php/appeal/get_somitee/all"
                                   class="gnt-actn-btn btn-warning col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <i style="font-size: 50px; padding: 20px;"
                                       class="glyphicon glyphicon-file"></i>
                                    <span>সকল আবেদন</span>
                                    <?php
                                    if($all_somitee_info[0]['t']==0){
                                    }else{
                                        echo '<span class="badge1">'.str_replace(range(0,9),$bn_digits,$all_somitee_info[0]['t']).'</span>';
                                    }
                                    ?>
                                </a>
                            </li>

                            <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="margin-bottom: 25px; padding-left: 15px">
                                <a href="index.php/appeal/get_somitee/new"
                                   class="gnt-actn-btn btn-success col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <i style="font-size: 50px; padding: 20px;"
                                       class="glyphicon glyphicon-file"></i>
                                    <span>নতুন আবেদন</span>
                                    <?php
                                    if($new_somitee_info[0]['t']==0){
                                    }else{
                                        echo '<span class="badge1">'.str_replace(range(0,9),$bn_digits,$new_somitee_info[0]['t']).'</span>';
                                    }
                                    ?>
                                </a>
                            </li>

                            <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="margin-bottom: 25px; padding-left: 15px">
                                <a href="index.php/appeal/get_somitee/selected"
                                   class="gnt-actn-btn btn-info col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <i style="font-size: 50px; padding: 20px;"
                                       class="glyphicon glyphicon-file"></i>
                                    <span>সফল আবেদন</span>
                                    <?php
                                    if($selected_somitee_info[0]['t']==0){
                                    }else{
                                        echo '<span class="badge1">'.str_replace(range(0,9),$bn_digits,$selected_somitee_info[0]['t']).'</span>';
                                    }
                                    ?>
                                </a>
                            </li>


                            <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="margin-bottom: 25px; padding-left: 15px">
                                <a href="index.php/appeal/get_somitee/reject"
                                   class="gnt-actn-btn btn-danger col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <i style="font-size: 50px; padding: 20px;"
                                       class="glyphicon glyphicon-file"></i>
                                    <span>বাতিল আবেদন</span>
                                    <?php
                                    if($reject_somitee_info[0]['t']==0){
                                    }else{
                                        echo '<span class="badge1">'.str_replace(range(0,9),$bn_digits,$reject_somitee_info[0]['t']).'</span>';
                                    }
                                    ?>
                                </a>
                            </li>

                        </ul>
                    </div>
                    
                <?php } ?>
            </div>

            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div> <!-- /col10 -->
    </div>
</div>

<?php $this->load->view('layouts_uco_dco/footer'); ?>
