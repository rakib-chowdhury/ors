<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">

        <!-- Main Content
        ============================================== -->
        <div class="col-md-12 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts_uco_dco/secondary-nav');?>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="panel tracking well" style="min-height: 429px !important;">
                        <table class="table table-stripped">
                            <tr>
                                <td style="text-align: center" colspan="2">
                                    <?php
                                         if($admin_info[0]['admin_image']==null){ ?>
                                           <img style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;" src="<?= base_url() . 'uploads/no_img.png' ?>">
                                         <?php }else{ ?>
                                           <img style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;" src="<?= base_url() . 'uploads/admin/'.$admin_info[0]['admin_image'] ?>">
                                         <?php }
                                    ?>                                    
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
                                <td><?php echo "উপজেলা সমবায় অফিসার "; ?>
                                    <br>
                                    <?php echo $admin_info[0]['bn_upz_name'] . ' , ' . $admin_info[0]['bn_dist_name'] . ' , ' . $admin_info[0]['bn_div_name']; ?>
                                </td>
                            </tr>
                        </table>

                        <ul class="list-unstyled list-inline">
                            <li><a data-toggle="modal" data-target="#myModal_pass" href="#" class="btn btn-success">পাসওয়ার্ড
                                    পরিবর্তন</a></li>
                            <!--<li><a class="btn btn-success">প্রোফাইল পরিবর্তন</a></li>-->
                        </ul>

                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <?php if ($track == 1) { ?>
                    <div id="track_div" class="col-md-12" ; style="margin-bottom: 0px; padding-right: 0px;">
                        <div class="panel tracking well"
                             style="min-height: 200px !important; margin-bottom: 2px !important;"><?php //print_r($this->session->userdata);?>
                            <h4 class="label-success" style="background-color: #337ab7">সমবায় ট্রাকিং</h4>

                            <form action="<?php echo site_url('uco/find_track_id'); ?>" method="post"
                                  style="margin-bottom: 5px;">
                                <p>ট্রাকিং নম্বর দিয়ে সার্চ করুন</p>
                                <div class="form-group" style="position: relative;">
                                    <input type="text" class="form-control" style="padding-right: 130px; height: 46px"
                                           name='track_id' id='track_id' required
                                           placeholder="আপনার ট্রাকিং আইডি লিখুন">

                                    <button type="submit" id='uco_search' class="btn btn-raised btn-danger btn-lg"
                                            style="position: absolute; top: 0; right: 0; padding: 9px 25px; border-top-left-radius: 0; border-bottom-left-radius: 0">
                                        অনুসন্ধান
                                    </button>
                                </div>

                                <?php if ($this->session->userdata('trck_err') != null || $this->session->userdata('trck_err') != '') {
                                    echo '<p style="color: red; text-align: center;">' . $this->session->userdata('trck_err') . '</p>';
                                } ?>
                            </form>
                        </div>
                    </div><!-- /col6 -->
                    <?php } ?>
                    <div id="track_div" class="col-md-12" style="padding-right: 0px;">
                        <div class="panel tracking well"
                             style="min-height: 200px; !important;"><?php //print_r($this->session->userdata);?>
                            <h4 class="label-success" style="background-color: #337ab7">নতুন আবেদন</h4>
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <td style="text-align: center; width: 4%;">#</td>
                                    <td style="text-align: center; width: 15%;">অ্যাডমিন অনুমোদন তারিখ</td>
                                    <td style="text-align: center; width: 18%;">সংগঠকের আবেদন তারিখ</td>                                    
                                    <td style="text-align: center">সমবায়ের নাম</td>
                                    <td style="text-align: center; width: 15%;">ট্র্যাকিং আইডি</td>
                                    <td style="text-align: center; width: 8%;">সময়</td>
                                </tr>
                                </thead>

                                <?php
                                foreach ($new_somitee_info as $key => $n) {
                                if ($key <= 4) { ?>
                                <tr>
                                    <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,($key + 1)) ?></td>
                                    <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,$n['uco_inquiry_date']) ?></td>
                                    <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,explode(' ',$n['somitee_reg_date'])[0]) ?></td>
                                    <td><?= $n['somitee_name'] ?></td>
                                    <td style="text-align: center"><?= $n['somitee_track_id'] ?></td>
                                    <td><?php
                                        $date1 = date_create($n['uco_inquiry_date']);
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
                                <?php }
                                }
                                if (sizeof($new_somitee_info) == 0) {

                                } else { ?>
                                <tr>
                                    <td colspan="6" style="text-align: right;"><a
                                                href="<?php echo site_url('uco/get_somitee/new'); ?>">বিস্তারিত</a></td>
                                </tr>
                                <?php }
                                ?>
                            </table>
                        </div>
                    </div><!-- /col6 -->
                </div> <!-- /col10 -->
                <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 pull-right" style="padding-right: 0px;">
                    <br>
                    <div class="panel" style="padding-right: 0px;">
                        <div class="col-md-12" style="padding-right: 0px;">
                            <div class="welcome new-application" style="padding-right: 0px;">
                                <div class="welcome-msg" style="padding-right: 0px;">
                                    <ul class="list-unstyled list-inline col-md-12 col-sm-12 col-lg-12 col-xs-12"
                                        style="">
                                        <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <a href="<?php echo site_url('uco/get_somitee/new'); ?>"
                                               class="gnt-actn-btn btn-warning col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <i style="font-size: 50px; padding: 20px;"
                                                   class="glyphicon glyphicon-file"></i>
                                                <span>নতুন</span>
                                                <?php
                                                if (sizeof($new_somitee_info) == 0) {

                                                } else { ?>
                                                <span class="badge1">
                                                 <?php echo str_replace(range(0, 9), $bn_digits, sizeof($new_somitee_info)); ?>
                                                </span>
                                                <?php } ?>
                                            </a>
                                        </li>

                                        <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <a href="<?php echo site_url('uco/get_somitee/selected'); ?>"
                                               class="gnt-actn-btn btn-success col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <i style="font-size: 50px; padding: 20px;"
                                                   class="glyphicon glyphicon-file"></i>
                                                <span>সফল</span>
                                                <?php
                                                if (sizeof($selected_somitee_info) == 0) {

                                                } else { ?>
                                                <span class="badge1">
                                                 <?php echo str_replace(range(0, 9), $bn_digits, sizeof($selected_somitee_info)); ?>
                                                </span>
                                                <?php } ?>
                                            </a>
                                        </li>
                                    </ul>

                                    <ul class="list-unstyled list-inline col-md-12 col-sm-12 col-lg-12 col-xs-12"
                                        style="">
                                        <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <a href="<?php echo site_url('uco/get_somitee/all'); ?>"
                                               class="gnt-actn-btn btn btn-info col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <i style="font-size: 50px; padding: 20px;"
                                                   class="glyphicon glyphicon-file"></i>
                                                <span>সকল</span>
                                                <?php
                                                if (sizeof($all_somitee_info) == 0) {

                                                } else { ?>
                                                <span class="badge1">
                                                 <?php echo str_replace(range(0, 9), $bn_digits, sizeof($all_somitee_info)); ?>
                                                </span>
                                                <?php } ?>
                                            </a>
                                        </li>
                                        <li class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <a href="<?php echo site_url('uco/feedback'); ?>"
                                               class="gnt-actn-btn btn-danger col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <i style="font-size: 50px; padding: 20px;"
                                                   class="glyphicon glyphicon-file"></i>
                                                <span>ফিডব্যাক</span>
                                                <?php
                                                if ($feedbackInfo[0]['t'] == 0) {

                                                } else { ?>
                                                <span class="badge1">
                                                 <?php echo str_replace(range(0, 9), $bn_digits, $feedbackInfo[0]['t']); ?>
                                                </span>
                                                <?php } ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled list-inline col-md-12 col-sm-12 col-lg-12 col-xs-12"
                                        style="">
                                        <li class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                            <a href="<?php echo site_url('home/somitee_re_registration'); ?>"
                                               class="gnt-actn-btn btn btn-info col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                <span>রি-রেজিস্ট্রেশন</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> <!-- /.welcome -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
        <div class="row">
            <footer id="admin-footer">
                <p class="text-center">Copyright &copy; 2016. All right resereved</p>
            </footer>
        </div><!-- /row -->
    </div> <!-- /container-fluid -->
<?php $this->load->view('layouts_uco_dco/footer'); ?>