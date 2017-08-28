<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<style type="text/css">
    .fixed_width {
        width;
        32% !important;
        overflow: hidden;
        white-space: nowrap;
    }


</style>
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <?php if (sizeof($somitee_info) == 0) { ?>
        <div class="well" style="background-color: #BBDEFB; margin-bottom: 4px">
            <h3 class="text-center" style="margin:0; padding: 0">সমবায় কার্যালয় নির্বাচন</h3>
        </div>
        <?php } ?>
        <div class="table-responsive panel panel-hover">
            <?php if (sizeof($somitee_info) == 0) { ?>

            <div class="col-md-12 chk-div1">
                <h3 class="text-center sms-wait" style="margin-bottom: 28px;margin-top:28px">সমবায় এর প্রাথমিক আবেদন
                    জমা
                    করার জন্য <b>সমবায় কার্যালয় নির্বাচন করুন</b> ।
                </h3>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="border: 1px solid #ddd; margin-bottom: 36px">
                        <div class="form-group" style="margin-bottom: 48px;">
                            <label style="text-align:right" for="block_upz" class="control-label col-md-5">সমবায়
                                কার্যালয়
                                নির্বাচন
                                করুন </label>
                            <div class="col-md-7">
                                <select onclick="select_district()" name="division" id="division" class="form-control"
                                        required>
                                    <option>বিভাগ নির্বাচন করুন</option>
                                    <?php foreach ($division as $row) { ?>
                                    <option
                                            value="<?php echo $row['div_id']; ?>"<?php if ($this->session->userdata('session_page') == '1') {
                                        if ($this->session->userdata('somitee_div_id') == $row['div_id']) {
                                            echo "selected";
                                        }
                                    } ?>><?php echo $row['bn_div_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div> <!-- /form group -->
                        <div class="form-group" style="margin-bottom: 48px;">
                            <div class="col-md-7 col-md-offset-5">
                                <select onclick="select_upz()" name="district" id="district" class="form-control"
                                        required>

                                    <option value="">জেলা নির্বাচন করুন</option>
                                    <?php foreach ($district as $row) { ?>
                                    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div> <!-- /form group -->
                        <div class="form-group" style="margin-bottom: 48px;">
                            <div class="col-md-7 col-md-offset-5">
                                <select onchange="check_block()" name="chck_upz" id="chk_upz" class="form-control">
                                    <option value="">উপজেলা নির্বাচন করুন</option>

                                </select>
                            </div>
                        </div> <!-- /form group -->
                    </div>

                    <div class="col-md-4 col-md-offset-4 chck-div" style="margin-bottom: 28px;">
                        <a data-toggle="modal" data-target="#termNcnd" class="btn btn-success btn-raised btn-lg btn-block" style="font-size: 18px;">
                            সমবায় নিবন্ধন
                        </a>
                    </div>
                </div><!-- row -->
            </div>
            <br><br>
            <h3 id="err-msg" class="text-center sms-wait"
                style="margin-bottom: 28px;margin-top:28px; color:red;">
            </h3>
            
            <div class="col-md-12 div_bkash">
                <div class="text-center"><div class="label label-info" style="font-size:23px">বিকাশ পেমেন্ট</div></div>
                <h3 class="text-center sms-wait" style="margin-bottom: 28px;margin-top:28px">বিকাশ পেমেন্ট এর জন্য ০১৬১৩০৮৩৩৭৫ নম্বরে নির্ধারিত টাকা বিকাশ করুন এবং transaction ID সংগ্রহ করুন এবং নিচে transaction ID টি প্রদান করুন।
                <hr>
                কোনো তথ্য জানার জন্য অনুগ্রহ করে ০১৬১৩০৮৩৩৭৫ নম্বরে যোগাযোগ করুন । অথবা <a target="_blank" href="<?= site_url('somitee/how_to_bkash')?>"> কিভাবে বিকাশ করবো? </a> দেখুন। 
                </h3>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="border: 1px solid #ddd; margin-bottom: 36px">
                        <div class="form-group" style="margin-bottom: 48px;">
                            <label style="text-align:right" for="block_upz" class="control-label col-md-5">Transaction ID</label>
                            <div class="col-md-7">
                                <input type="text" name="trn_id" id="trn_id" class="form-control">
                                <span style="color:red" id="bkash_err"></span>
                            </div>
                        </div> <!-- /form group -->                        
                    </div>

                    <div class="col-md-4 col-md-offset-4 div_bkash" style="margin-bottom: 28px;">
                        <a id="smt_page" onclick="check_bkash()" class="btn btn-success btn-raised btn-lg btn-block" style="font-size: 18px;">
                            সাবমিট
                        </a>
                    </div>
                </div><!-- row -->
            </div>
            
        </div>


        <?php } else {
        if ($somitee_info[0]['somitee_status'] == 5 && $somitee_info[0]['uco_id'] == 0 && $somitee_info[0]['dco_id'] == 0) { ?>
        <h3 style="color:red;" class="text-center sms-wait">সমবায় এর প্রাথমিক আবেদনটি বাতিল করা হয়েছে ।</h3>
        <ul class="col-md-10 col-md-offset-1 list-group">
            <li class="list-group-item text-center">মন্তব্য</li>
            <li class="list-group-item text-center"
                style="font-weight: bold; color: #ff0000"><?php echo $division_info[0]['divisional_admin_comment'] ?></li>
        </ul>

        <div class="col-md-12 chk-div1"><br>
            <h3 class="text-center sms-wait" style="margin-bottom: 28px;margin-top:28px">পুনরায় সমবায় এর
                নিবন্ধন করার জন্য <b>সমবায় কার্যালয় নির্বাচন করুন</b> ।
            </h3>
            <div class="form-group">
                <label style="text-align:right" for="block_upz" class="control-label col-md-3">সমবায় কার্যালয়
                    নির্বাচন
                    করুন </label>
                <div class="col-md-3">
                    <select onclick="select_district()" name="division" id="division" class="form-control"
                            required>
                        <option>বিভাগ নির্বাচন করুন</option>
                        <?php foreach ($division as $row) { ?>
                        <option
                                value="<?php echo $row['div_id']; ?>"<?php if ($this->session->userdata('session_page') == '1') {
                            if ($this->session->userdata('somitee_div_id') == $row['div_id']) {
                                echo "selected";
                            }
                        } ?>><?php echo $row['bn_div_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <span class="help-block">আবশ্যক</span>
                </div>
                <div class="col-md-3">
                    <select onclick="select_upz()" name="district" id="district" class="form-control" required>

                        <option value="">জেলা নির্বাচন করুন</option>
                        <?php foreach ($district as $row) { ?>
                            <?php } ?>
                    </select>
                    <span class="help-block">আবশ্যক</span>
                </div>
                <div class="col-md-3">
                    <select onchange="check_block()" name="chck_upz" id="chk_upz" class="form-control">
                        <option value="">উপজেলা নির্বাচন করুন</option>

                    </select>
                </div>
            </div>

            <br>
            <h3 id="err-msg" class="text-center sms-wait"
                style="margin-bottom: 28px;margin-top:28px; color:red;">
            </h3>
        </div>
        <br/><br/><br/><br/>
        <div class="chck-div">
            <h3 class="text-center sms-wait" style="margin-bottom: 28px;margin-top:28px">পুনরায় সমবায় এর
                নিবন্ধন করার জন্য <b>"সমবায় নিবন্ধন"</b> বাটন এ ক্লিক করুন।
            </h3>

            <div class="col-md-4 col-md-offset-4" style="margin-bottom: 28px;">
                <a href="<?php echo site_url('somitee/somitee_registration/in'); ?>"
                   class="btn btn-success btn-raised btn-lg btn-block" style="font-size: 18px;">
                    পুনরায় সমবায় নিবন্ধন
                </a>
            </div>
        </div>
        <?php } elseif ($somitee_info[0]['somitee_status'] == 3 && $somitee_info[0]['uco_id'] != 0 && $somitee_info[0]['dco_id'] != 0 && $somitee_info[0]['appeal_id'] == 0) { ?>
        <h3 style="color:red;" class="text-center sms-wait">সমবায় এর নিবন্ধন আবেদনটি বাতিল করা হয়েছে ।</h3>
        <ul class="col-md-10 col-md-offset-1 list-group">
            <li class="list-group-item text-center">মন্তব্য</li>
            <li class="list-group-item text-center"
                style="font-weight: bold; color: #ff0000"><?php echo $dco_info[0]['dco_comment']; ?></li>
        </ul>
        <a
                class="col-md-4 col-md-offset-4">
            <center>
                <button class="btn btn-success btn-raised btn-block btn-lg" data-toggle="modal"
                        data-target="#appeal_modal"
                        style="padding: 13px 0; font-size: 20px;">আপীল করুন
                </button>
            </center>
        </a>
        <?php } elseif ($somitee_info[0]['somitee_status'] == 5 && $somitee_info[0]['uco_id'] != 0 && $somitee_info[0]['dco_id'] != 0) { ?>

        <h3 style="color:red;" class="text-center sms-wait">সমবায় এর নিবন্ধন আপীল বাতিল করা হয়েছে ।</h3>
        <ul class="col-md-10 col-md-offset-1 list-group">
            <li class="list-group-item text-center">মন্তব্য</li>
            <li class="list-group-item text-center"
                style="font-weight: bold; color: #ff0000"><?php echo $dco_info[1]['dco_comment']; ?></li>
        </ul>
        <br/><br/><br/><br/>
        <div class="col-md-12 chk-div1">
            <h3 class="text-center sms-wait" style="margin-bottom: 28px;margin-top:28px">পুনরায় সমবায় এর
                নিবন্ধন করার জন্য <b>সমবায় কার্যালয় নির্বাচন করুন</b> ।
            </h3>
            <div class="form-group">
                <label style="text-align:right" for="block_upz" class="control-label col-md-3">সমবায় কার্যালয়
                    নির্বাচন
                    করুন </label>
                <div class="col-md-3">
                    <select onclick="select_district()" name="division" id="division" class="form-control"
                            required>
                        <option>বিভাগ নির্বাচন করুন</option>
                        <?php foreach ($division as $row) { ?>
                        <option
                                value="<?php echo $row['div_id']; ?>"<?php if ($this->session->userdata('session_page') == '1') {
                            if ($this->session->userdata('somitee_div_id') == $row['div_id']) {
                                echo "selected";
                            }
                        } ?>><?php echo $row['bn_div_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <span class="help-block">আবশ্যক</span>
                </div>
                <div class="col-md-3">
                    <select onclick="select_upz()" name="district" id="district" class="form-control" required>

                        <option value="">জেলা নির্বাচন করুন</option>
                        <?php foreach ($district as $row) { ?>
                            <?php } ?>
                    </select>
                    <span class="help-block">আবশ্যক</span>
                </div>
                <div class="col-md-3">
                    <select onchange="check_block()" name="chck_upz" id="chk_upz" class="form-control">
                        <option value="">উপজেলা নির্বাচন করুন</option>

                    </select>
                </div>
            </div>
            <br>
            <h3 id="err-msg" class="text-center sms-wait"
                style="margin-bottom: 28px;margin-top:28px; color:red;">
            </h3>
        </div>

        <div class="chck-div">
            <h3 class="text-center sms-wait" style="margin-bottom: 28px;margin-top:28px">পুনরায় সমবায় এর
                নিবন্ধন করার জন্য <b>"সমবায় নিবন্ধন"</b> বাটন এ ক্লিক করুন।
            </h3>

            <div class="col-md-4 col-md-offset-4" style="margin-bottom: 28px;">
                <a href="<?php echo site_url('somitee/somitee_registration/in'); ?>"
                   class="btn btn-success btn-raised btn-lg btn-block" style="font-size: 18px;">
                    পুনরায় সমবায় নিবন্ধন
                </a>
            </div>
        </div>
        <?php } elseif ($somitee_info[0]['somitee_status'] == 6) { ?>
                <!--<h3 class="text-center sms-wait">সমবায় এর প্রাথমিক আবেদনটি বাতিল করা হয়েছে ।</h3>-->
        <h3 style="color:red;" class="text-center sms-wait">সমবায় এর নিবন্ধন আপীল বাতিল করা হয়েছে ।</h3>
        <ul class="col-md-10 col-md-offset-1 list-group">
            <li class="list-group-item text-center">মন্তব্য</li>
            <li class="list-group-item text-center"
                style="font-weight: bold; color: #ff0000"><?php echo $dco_info[0]['dco_comment']; ?></li>
        </ul>
        <a href="<?php echo site_url('somitee/somitee_registration/in'); ?>"
           class="col-md-4 col-md-offset-4">
            <center>
                <button class="btn btn-success btn-raised btn-block btn-lg"
                        style="padding: 13px 0; font-size: 20px;">পুনরায় সমবায় নিবন্ধন
                </button>
            </center>
        </a>
        <?php } elseif ($somitee_info[0]['somitee_status'] == 1) { ?>
        <h3 class="text-center sms-wait">সমবায় এর প্রাথমিক আবেদন সফল হয়েছে। আপনার নিবন্ধন সার্টিফিকেট যোগাড়
            করুন।</h3>
        <a href="<?php echo site_url('somitee/certificate_generate'); ?>/<?php echo $somitee_info['0']['somitee_id']; ?>">
            <center>
                <button class="btn btn-success btn-raised" style="font-size: 20px;">সার্টিফিকেট</button>
            </center>
        </a>
        <?php } elseif ($somitee_info[0]['somitee_status'] == 0 && $somitee_info[0]['division_id'] == 0) { ?>
        <h3 class="text-center sms-wait col-md-9" style="font-weight:bold;color:red;">ধন্যবাদ পরবর্তী করণীয় সম্পর্কে
            জানার জন্য অপেক্ষা করুন ।</h3>
        <p class="pull-right text-center" style="width: 200px; background-color:#22a297" id="p_chngBckgrnd" onmouseover="chngBckgrndIn()" onmouseleave="chngBckgrndOut()">
            <b>
                <a style="text-decoration:none; color:white" onmouseover="chngBckgrndIn()" id="a_chngBckgrnd" onmouseleave="chngBckgrndOut()"
                   href="<?php echo site_url('somitee/download_user_info'); ?>">আপনার সমবায়
                    সম্পর্কিত তথ্য এখানে <span id="span_chngBckgrnd" style="color:#0044cc;">ডাউনলোড
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
            </span> করুন
                </a>
            </b>
        </p>
        <?php } elseif ($somitee_info[0]['somitee_status'] == 2 && $somitee_info[0]['division_id'] != 0 && $somitee_info[0]['uco_id'] == 0) { ?>
        <h3 class="text-center sms-wait">সমবায় এর প্রাথমিক আবেদন সফল হয়েছে। নিম্নোক্ত কাগজপত্র
            নিয়ে <?php echo $somitee_info[0]['bn_upz_name']; ?>
            উপজেলা সমবায় অফিসার এর সাথে যোগাযোগ করুন।</h3>
        <p>
        <ul>

            <li>নির্ধারিত আবেদনপত্র</li>
            <li>৩০০.০০ টাকার নিবন্ধন ফি (কোড নং-১-৩৮৩১-০০০০-১৮৩৬) এবং উক্ত ফি এর উপর ১৫% ভ্যাট হিসেবে ৪৫.০০
                টাকা (কোড নং-১-১১৩-০০০০-০৩১১) এ চালানমূলে বাংলাদেশ ব্যাংক অথবা সোনালী ব্যাংকের নির্ধারিত
                শাখায় জমা দিয়ে চালানের মূল কপি।
            </li>
            <li>আবেদনকারী সদস্যের স্বাক্ষরযুক্ত তিন প্রস্ত উপ-আইন।</li>
            <li>সমবায় সমিতি নিবন্ধনে আগ্রহী ব্যক্তিবর্গের সমন্বয়ে অনুষ্ঠিত সাংগঠনিক সভার রেজুলেশন।</li>
            <li>আবেদনকারী সদস্যের জাতীয় পরিচয়পত্র/জন্মনিবন্ধন সনদ।</li>
            <li>প্রস্তাবিত ব্যবস্থাপনা কমিটির সদস্যদের ছবিসহ নামের তালিকা ।</li>


        </ul>
        </p>
        <?php } else if ($somitee_info[0]['somitee_status'] == 2 && $somitee_info[0]['uco_id'] != 0) { ?>
        <h3 class="text-center sms-wait">আবেদনটি <?php echo $somitee_info[0]['bn_dist_name']; ?> জেলা সমবায়
            কর্মকর্তা কর্তৃক পর্যবেক্ষিত হচ্ছে। অনুগ্রহপূর্বক অপেক্ষা করুন।</h3>
        <?php } else if ($somitee_info[0]['somitee_status'] == 3 && $somitee_info[0]['appeal_id'] != 0) { ?>
        <h3 class="text-center sms-wait"><?php //echo $somitee_info[0]['bn_dist_name']; ?> ধন্যবাদ। আবেদনটি
            আপীল বিভাগীয়
            কর্মকর্তা কর্তৃক পর্যবেক্ষিত হচ্ছে। অনুগ্রহপূর্বক অপেক্ষা করুন।</h3>
        <?php } else if ($somitee_info[0]['somitee_status'] == 4 && $somitee_info[0]['appeal_id'] != 0) { ?>
        <h3 class="text-center sms-wait">আপীল আবেদনটি <?php echo $somitee_info[0]['bn_dist_name']; ?> জেলা
            সমবায়
            কর্মকর্তা কর্তৃক পর্যবেক্ষিত হচ্ছে। অনুগ্রহপূর্বক অপেক্ষা করুন।</h3>
        <?php } ?>

        <?php if ($somitee_info[0]['somitee_track_id'] != null && $somitee_info[0]['somitee_status'] != 1) { ?>
        <div class="col-md-4 col-md-offset-4">
            <a class="btn btn-success btn-raised btn-block btn-lg" data-toggle="modal"
               data-target="#myModal"
               style="padding: 13px 0; font-size: 20px;">অভিযোগ করুন</a>
        </div>
        <?php } ?>
        <div class="tab-content">

            <!-- Home. Welcome message here
            ==================================================== -->
            <div role="tabpanel" class="tab-pane active " id="org-info">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel">
                            <div class="panel-body">
                                <table class="table table-striped table-hover">
                                    <h3 style="text-align:center;text-decoration:underline;"><b>সমবায় সম্পর্কিত
                                            সাধারণ
                                            তথ্যাবলি</b></h3>
                                    <tbody>
                                    <tr>
                                        <td class="fixed_width">নাম</td>
                                        <td><?php echo $somitee_info['0']['somitee_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">সমবায় এর শ্রেণী</td>
                                        <td>স্তর:
                                            <?php

                                            echo $somitee_info['0']['somitee_type_name'];
                                            ?>
                                            <br>
                                            শ্রেণী:
                                            <?php
                                            if ($somitee_info[0]['somitee_cat_id'] == 0) {
                                                echo ' প্রযোজ্য নহে';
                                            } else {
                                                foreach ($somitee_category as $row) {
                                                    echo $row['somitee_cat_name'] . ' , ';
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">কার্যালয়ের ঠিকানা</td>
                                        <td>বিভাগ: <?= $somitee_info[0]['bn_div_name']; ?>
                                            <br>
                                            জেলা: <?= $somitee_info[0]['bn_dist_name']; ?>
                                            <br>
                                            উপজেলা:<?= $somitee_info[0]['bn_upz_name']; ?>
                                            <br>
                                            বিস্তারিত :<?= $somitee_info[0]['somitee_address']; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">সদস্য নির্বাচনী এলাকা</td>
                                        <td>বিভাগ: <?= $somitee_info_sodosso[0]['bn_div_name']; ?>
                                            <br>
                                            জেলা: <?= $somitee_info_sodosso[0]['bn_dist_name']; ?>
                                            <br>
                                            উপজেলা:<?= $somitee_info_sodosso[0]['bn_upz_name']; ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="fixed_width">সমবায় এর কর্ম এলাকা</td>
                                        <td>বিভাগ: <?= $somitee_info[0]['k_div_name']; ?>
                                            <br>
                                            জেলা: <?= $somitee_info[0]['k_dist_name']; ?>
                                            <br>
                                            উপজেলা:<?= $somitee_info[0]['k_upz_name']; ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="fixed_width">প্রতিটি শেয়ার মূল্য</td>
                                        <td>
                                            <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price']);
                                            echo $output . ' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">প্রস্তাবিত মোট শেয়ার সংখ্যা</td>
                                        <td>
                                            <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_share']);
                                            echo $output . ' টি'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">প্রস্তাবিত অনুমোদিত মূলধন</td>
                                        <td>
                                            <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['somitee_share']);
                                            echo $output . ' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">বিক্রিত শেয়ার সংখ্যা</td>
                                        <td>
                                            <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['sell_share_num']);
                                            echo $output . ' টি'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">পরিশোধিত শেয়ার মূলধন</td>
                                        <td>
                                            <?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num']));
                                            echo $output . ' টাকা'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">সমবায় এর উদ্দেশ্য</td>
                                        <td><?php echo $somitee_info[0]['somitee_purpose']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fixed_width">সমবায় এর রেজিস্ট্রেশন তারিখ</td>
                                        <td>
                                            <?php $output = str_replace(range(0, 9), $bn_digits, explode(' ',$somitee_info[0]['somitee_reg_date'])[0]);
                                            echo $output; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-body">
                                <br>
                                <h3 style="text-align:center;text-decoration:underline;"><b>সমবায় এর সদস্যদের
                                        তথ্যাবলি</b>
                                </h3>
                                <table align="center" class="table table-stripped table-bordered"
                                       style="border: 1px solid #cccccc;">
                                    <thead>
                                    <tr>
                                        <th style="width: 18%;">ক্রমিক নং</th>
                                        <th style="width: 35%;">সদস্য নাম</th>
                                        <th style="width: 35%;">সমবায় সদস্যের ভোটার আইডি নাম্বার</th>
                                    </tr>
                                    </thead>

                                    <tbody><?php $i = 1;
                                    foreach ($somitee_member_info as $row) { ?>
                                    <tr>
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
                                            <p><?= str_replace(range(0,9),$bn_digits,$row['somitee_member_nid']) ?></p>
                                        </td>

                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php if ($somitee_info[0]['complain_id'] != 0) { ?>
                        <div class="panel panel-success">
                            <div class="panel-body">
                                <br>
                                <h3 style="text-align:center;text-decoration:underline;">অভিযোগসমূহ</h3>
                                <table align="center" class="table table-stripped table-bordered">
                                    <table style="border: 1px solid #ddd;"
                                           class="table table-stripped table-bordered ">
                                        <tr>
                                            <th>ক্রমিক</th>
                                            <th>অভিযোগ তারিখ</th>
                                            <th>অভিযোগ বিষয়</th>
                                            <th>অভিযোগ রিপ্লাই তারিখ</th>
                                            <th>বিস্তারিত</th>
                                        </tr>
                                        <?php $i = 1;
                                        foreach ($complain_info as $r) {
                                        $asd = json_decode($r['complain_content']); ?>
                                        <tr>
                                            <td><?php echo str_replace(range(0, 9), $bn_digits, $i++); ?></td>
                                            <td><?php echo str_replace(range(0,9),$bn_digits,explode(' ',$r['complain_date'])[0]); ?></td>
                                            <td><?php echo $asd[0]->sub; ?></td>
                                            <td><?php if ($r['complain_reply'] == null) {
                                                    echo "এখন পর্যন্ত রিপ্লাই করা হয় নাই";
                                                } else {
                                                    echo str_replace(range(0,9),$bn_digits,explode(' ',$r['complain_reply_date'])[0]);
                                                } ?>
                                            </td>
                                            <td><a id="complain_modal_show" style="cursor: pointer"
                                                   onclick="complain_show(<?php echo $r['complain_id'] ?>)">বিস্তারিত</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- /tabpanel -->


        </div>
        <br><br>
        <div class="panel">
            সমবায় এর বর্তমান অবস্থা : <span class="label label-info">
                        <?php
                if ($somitee_info[0]['somitee_status'] == 0 && $somitee_info[0]['division_id'] == 0) {
                    echo "সমবায় এর প্রাথমিক আবেদন নিবন্ধন পর্যায় ";
                } elseif ($somitee_info[0]['somitee_status'] == 0 && $somitee_info[0]['division_id'] <> 0) {
                    echo "সমবায় এর নাম নিবন্ধন পর্যায় ";
                } elseif ($somitee_info[0]['somitee_status'] == 3 || $somitee_info[0]['somitee_status'] == 5) {
                    echo "সমবায় এর নিবন্ধন বাতিল ";
                } elseif ($somitee_info[0]['somitee_status'] == 1) {
                    echo "সমবায় এর নিবন্ধন সফল ";
                } elseif ($somitee_info[0]['somitee_status'] == 2 && $somitee_info[0]['somitee_track_id'] != '' && $somitee_info[0]['uco_id'] == 0 && $somitee_info[0]['dco_id'] == 0) {
                    echo "উপজেলা সমবায় অফিসার কর্তৃক পর্যবেক্ষণ ";
                } elseif ($somitee_info[0]['somitee_status'] == 2 && $somitee_info[0]['somitee_track_id'] != '' && $somitee_info[0]['uco_id'] <> 0 && $somitee_info[0]['dco_id'] == 0) {
                    echo "জেলা সমবায় অফিসার কর্তৃক পর্যবেক্ষণ ";
                } else {
                    echo $somitee_info[0]['somitee_status'];
                }

                ?></span>
        </div>
        <?php } ?>
    </div>
</div>
</div>

<?php $this->load->view('public_layouts/footer'); ?>

        <!-- Modal -->
<div id="serviceOff" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header" style="background-color:red; color: white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="modal-title" style="text-align: center; padding-bottom: 15px; font-size: 22px;">সতর্কীকরণ</p>
            </div>
            <div class="modal-body">
                <p style="color: red" id="modalMsg"></p>
            </div>
            <div class="modal-footer">
                <button style="color: white" class="btn btn-danger btn-raised" data-dismiss="modal">বন্ধ করুন</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="appeal_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">আপীল করুন</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">

                        <form class="form-horizontal" action="<?php echo site_url('somitee/somitee_add_appeal'); ?>"
                              method="post">
                            <input type="hidden" name="somitee_id"
                                   value="<?php echo $somitee_info[0]['somitee_id']; ?>">
                            <input type="hidden" name="user_reg_id"
                                   value="<?php echo $this->session->userdata('user_reg_id'); ?>">
                            <div class="form-group">
                                <label for="complain_sub" class="col-sm-3 control-label">বিষয়</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="appeal_sub"
                                           placeholder="আপীল এর বিষয় " required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="complain_content" class="col-sm-3 control-label">বিবরণ</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="name" name="appeal_content" rows="2"
                                              placeholder="আপীল এর বিবরণ" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-5">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success btn-raised">সাবমিট</button>
                                <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বব্ধ করুন
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">অভিযোগ করুন</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">

                        <form class="form-horizontal" action="<?php echo site_url('somitee/add_complain'); ?>"
                              method="post">
                            <input type="hidden" name="somitee_id"
                                   value="<?php echo $somitee_info[0]['somitee_id']; ?>">
                            <input type="hidden" name="user_reg_id"
                                   value="<?php echo $this->session->userdata('user_reg_id'); ?>">
                            <div class="form-group">
                                <label for="complain_sub" class="col-sm-3 control-label">বিষয়</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="complain_sub"
                                           placeholder="অভিযোগ এর বিষয় " required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="complain_content" class="col-sm-3 control-label">বিবরণ</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="name" name="complain_content" rows="2"
                                              placeholder="অভিযোগ এর বিবরণ" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <!--                                <span class="help-block" id="designation-help">*আবশ্যক</span>-->
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success btn-raised">সাবমিট</button>
                                <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বব্ধ করুন
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="complain_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">অভিযোগ</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অভিযোগ তারিখ</label>
                        <div class="col-md-8">
                            <p id="cmpln_date"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অভিযোগ বিষয়</label>
                        <div class="col-md-8">
                            <p id="cmpln_sub"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অভিযোগ বিবরণ </label>
                        <div class="col-md-8">
                            <p id="cmpln_content"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অভিযোগ রিপ্লাই তারিখ</label>
                        <div class="col-md-8">
                            <p id="cmpln_reply_date"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অভিযোগ রিপ্লাই বিবরণ</label>
                        <div class="col-md-8">
                            <p id="cmpln_reply"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-raised" data-dismiss="modal">বব্ধ করুন</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="termNcnd" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" tabindex="-1"
     role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="margin-top:0px; background-color: #00b09f; color: whitesmoke; padding-bottom:9px;">
                <h4 class="modal-title" style="text-align: center; font-weight: 500;">নিবন্ধন প্রাপ্তির যোগ্যতা ও শর্তাবলী</h4>
            </div>
            <div class="modal-body" style="padding-top:0px;">
                <div class="row">
                    <div class="form-group col-md-12" style="margin-top:5px; height: 300px; overflow-y: scroll">
                        <p>
                        <ul style='list-style-type: none;'>
                            <li>(১) সমবায় সংগঠনের উদ্দেশ্যে একটি প্রারম্ভিক সাংগঠনিক সভা অনুষ্ঠান করা হয়েছে;  </li>
                            <li>(২) সমবায়ের সাংগঠনিক ও আর্থিক কার্যক্রম পরিচালনার জন্য উপ-আইন প্রণয়ন করা হয়েছে;  </li>
                            <li>(৩) অনুমোদনের জন্য প্রস্তাবিত সমবায়ের ব্যবস্থাপনা কমিটি গঠন করা হয়েছে;  </li>
                            <li>(৪) প্রস্তাবিত সমবায়ের নামের অংশ হিসেবে “সমবায়” বা (Co-operative) এবং নামের শেষে “লিমিটেড” (Limited)  শব্দসমূহ ব্যবহার করা হয়েছে;  </li>
                            <li>(৫) একই নামে বা সংক্ষিপ্ত নামে রাষ্ট্রের অন্য কোন আইনে প্রস্তাবিত সংগঠন নিবন্ধন প্রাপ্ত নয় এবং নিবন্ধনের জন্য আবেদন করা হয় নাই; </li>
                            <li>(৬) প্রস্তাবিত সমবায়ের নাম এমন নয় যা অপর একটি একটি সমবায় বা কোম্পানি বা ব্যাংক বা আর্থিক প্রতিষ্ঠান বা সংস্থা নামের সাথে এমন সাদৃশ্য আছে যে উক্ত সাদৃশ্যের ফলে জনমনে বিভ্রান্তি সৃষ্টি হতে পারে; </li>
                        </ul>
                        </p>
                        <p onmouseover="enableBTN()">
                        <ul  style='list-style-type: none;' onmouseover="enableBTN()">
                            <li>(৭) প্রস্তাবিত সমবায়ের নাম এমন নয় যা সরকার, সরকারী গেজেটে প্রজ্ঞাপনের দ্বারা অনভিপ্রেত বলে ঘোষণা করেছে; </li>
                            <li>(৮) প্রস্তাবিত সমবায়ের নাম তার উদ্দেশ্য ও কর্মপরিকল্পনার সাথে সামঞ্জস্যপূর্ণ; </li>
                            <li>(৯) প্রস্তাবিত সমবায়ের নির্দিষ্ট কার্যালয় আছে এবং ঠিকানা পরিবর্তন যথাযথ নিয়মে কর্তৃপক্ষকে অবহিত করা হবে;  </li>
                            <li>(১০) সমবায়ের সকল লেনদেন নির্ধারিত ব্যাংক হিসাবের মাধ্যমে সম্পাদন করা হবে;     </li>
                            <li>(১১) প্রস্তাবিত সমবায় অনুমোদিত সদস্য নির্বাচনী এলাকা বহির্ভূত কোন ব্যক্তিকে সমবায়ের সদস্য হিসেবে গ্রহণ করবে না;  </li>
                            <li>(১২) সমবায় কর্তৃপক্ষের চাহিদা অনুযায়ী তথ্য সরবরাহ এবং কর্তৃপক্ষ কর্তৃক পরিদর্শন, তদন্ত ও নিরীক্ষা কাজে আবশ্যিকভাবে সহায়তা করিবে; </li>
                            <li>(১৩) সনদপ্রাপ্ত সমবায়কে সমবায় সমিতি আইন, ২০০১ (সংশোধিত ২০১৩), বিধি এবং কর্তৃপক্ষ কর্তৃক জারীকৃত সকল নির্দেশনা যথাযথ ভাবে প্রতিপালন করিতে হইবে।</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button disabled id="disagreeBTN" class="btn btn-danger btn-raised" data-dismiss="modal">অসম্মতি</button>
                <!--<a href="<?php echo site_url('somitee/somitee_registration/in'); ?>">
                    <button disabled id="agreeBTN" type="submit" class="btn btn-success btn-rounded" style="color: whitesmoke">সম্মতি</button>
                </a>-->
                <a  onclick="getBkash()">
                    <button disabled id="agreeBTN" type="submit" class="btn btn-success btn-rounded" style="color: whitesmoke">সম্মতি</button>
                </a>
            </div>
        </div>

    </div>
</div>
<script>

    var finalEnlishToBanglaNumber = {
        '0': '০',
        '1': '১',
        '2': '২',
        '3': '৩',
        '4': '৪',
        '5': '৫',
        '6': '৬',
        '7': '৭',
        '8': '৮',
        '9': '৯'
    };
    var finalBanglaToEnlishNumber = {
        '০': '0',
        '১': '1',
        '২': '2',
        '৩': '3',
        '৪': '4',
        '৫': '5',
        '৬': '6',
        '৭': '7',
        '৮': '8',
        '৯': '9'
    };

    String.prototype.getDigitBanglaFromEnglish = function () {
        var retStr = this;
        for (var x in finalEnlishToBanglaNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
        }
        return retStr;
    };
    String.prototype.getDigitEnglishFromBangla = function () {
        var retStr = this;
        for (var x in finalBanglaToEnlishNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalBanglaToEnlishNumber[x]);
        }
        return retStr;
    };

    function chngBckgrndIn(){
        document.getElementById('p_chngBckgrnd').style.background='white';
        document.getElementById('a_chngBckgrnd').style.color='black';
        document.getElementById('span_chngBckgrnd').style.color='red';
    }

    function chngBckgrndOut(){
        document.getElementById('p_chngBckgrnd').style.background='#22a297';
        document.getElementById('a_chngBckgrnd').style.color='white';
        document.getElementById('span_chngBckgrnd').style.color='#0044cc';
    }
    $(document).ready(function () {
        $('.chck-div').hide();
        $('.div_bkash').hide();
        //$('#err-msg').hide();

    });
    
    function getBkash(){
        $('.chk-div1').hide();        
        $('.div_bkash').show();
        $('#termNcnd').modal('hide');
    }
    function check_bkash(){
       var t=$('#trn_id').val();
       $.ajax({
        type: 'POST',
            url: '<?php echo site_url('somitee/chk_bksh');?>',
            data: {
                t_id: t
            }, success: function (data) {
                console.log(data);
                if (data==0) {
                   console.log('jk');
                   $('#bkash_err').text('অনুগ্রহ করে সঠিক transaction ID দিন');
                } else if(data==1) {
                     $('#smt_page').attr('href','<?php echo site_url('somitee/somitee_registration/in'); ?>');
                }
            }
       });
    }

    function enableBTN(){
        console.log('hiiiiii');
        document.getElementById("disagreeBTN").disabled = false;
        document.getElementById("agreeBTN").disabled = false;
        //$('#disagreeBTN').attrRemove('disabled');
        //$('#agreeBTN').attrRemove('disabled');
    }

    function complain_show(complain_id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_complain_info');?>',
            data: {
                complain_id: complain_id
            }, success: function (data) {
                // console.log(data);
                data1 = $.parseJSON(data);

                if (data1['res'] == 1) {
                    document.getElementById('cmpln_date').innerText = data1['complain_infos'][0]['complain_date'].split(' ')[0].getDigitBanglaFromEnglish();
                    var asd = $.parseJSON(data1['complain_infos'][0]['complain_content']);
                    document.getElementById('cmpln_sub').innerText = asd[0]['sub'];
                    document.getElementById('cmpln_content').innerText = asd[0]['content'];
                    if (data1['complain_infos'][0]['complain_reply'] == null) {
                        document.getElementById('cmpln_reply_date').innerText = 'এখন পর্যন্ত রিপ্লাই করা হয় নাই';
                        document.getElementById('cmpln_reply').innerText = 'এখন পর্যন্ত রিপ্লাই করা হয় নাই';
                    } else {
                        document.getElementById('cmpln_reply_date').innerHTML = data1['complain_infos'][0]['complain_reply_date'].split(' ')[0].getDigitBanglaFromEnglish();
                        document.getElementById('cmpln_reply').innerHTML = data1['complain_infos'][0]['complain_reply'];
                    }
                    $('#complain_modal').modal('show');
                    //$('#complain_modal_show').attr("data-toggle", "modal");
                    //$('#complain_modal_show').attr("data-target", "#complain_modal");
                } else {
                    alert('no complain');
                }
            }
        });


    }

    function check_block() {
        var tmp = $('#chk_upz').val();
        if (tmp == '') {

        } else {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('somitee/check_blocked_upz');?>',
                data: {
                    upz_id: tmp
                }, success: function (data) {
                    // console.log(data);

                    data1 = $.parseJSON(data);
                    console.log(data1['res'][0]['is_block']);


                    if (data1['res'][0]['is_block'] == '1') {
                        $('.chk-div1').show();
                        //document.getElementById('err-msg').innerText = "দুঃখিত " + data1['res'][0]['bn_upz_name'] + " উপজেলা এর জন্য  অনলাইন সমবায় নিবন্ধন সেবা টি বন্ধ আছে ।";
                        document.getElementById('modalMsg').innerText="দুঃখিত " + data1['res'][0]['bn_upz_name'] + " উপজেলা এর জন্য  অনলাইন সমবায় নিবন্ধন সেবা টি বন্ধ আছে ।";
                        $('#serviceOff').modal('show');
                        $('.chck-div').hide();
                        console.log('block');
                    } else if (data1['res'][0]['is_block'] == '0') {
                        document.getElementById('err-msg').innerText = "";
                        $('.chk-div1').show();
                        $('.chck-div').show();
                    } else {
                        console.log(data);
                    }

                }
            });
        }
    }


    function select_district() {
        var div = $('#division').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_dist');?>',
            data: {
                div_id: div
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#district').find("option:gt(0)").remove();
                $('#upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    $('#district').append(option_val);
                });
            }
        });
    }
    function select_upz() {
        var dist = $('#district').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_upz');?>',
            data: {
                dist_id: dist
            }, success: function (data) {
                //console.log(data);
                data1 = $.parseJSON(data);

                $('#chk_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    $('#chk_upz').append(option_val);
                });
            }
        });
    }


</script>