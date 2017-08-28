<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
$months = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts/secondary-nav'); ?>
                <div class="col-md-6">
                    <div class="welcome new-application">
                        <div class="welcome-msg">
                            <h3 class="text-center">বিভাগ ভিত্তিক <span class="mark">নতুন</span> আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/1/new'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 1) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/4/new'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 4) {
                                        ?>
                                        <span class="badge1">
                                                    <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/8/new'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 8) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/3/new'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 3) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/5/new'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 5) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/2/new'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 2) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/6/new'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 6) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/7/new'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($new_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 7) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /.welcome -->

                    <!-- ALL Application
                    ==================================================== -->
                    <div class="welcome all-application">
                        <div class="welcome-msg">
                            <h3 class="text-center">বিভাগ ভিত্তিক <span class="mark">সকল</span> আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/1/all'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 1) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/4/all'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 4) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/8/all'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 8) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/3/all'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 3) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/5/all'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 5) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/2/all'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 2) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/6/all'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 6) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/7/all'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($all_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 7) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /.welcome -->


                    <div class="welcome reject-application">
                        <div class="welcome-msg">
                            <h3 class="text-center">বিভাগ ভিত্তিক <span class="mark">বাতিল</span> আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/1/reject'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 1) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/4/reject'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 4) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/8/reject'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 8) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/3/reject'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 3) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/5/reject'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 5) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/2/reject'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 2) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/6/reject'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 6) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/7/reject'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($reject_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 7) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /.welcome -->

                    <div class="welcome succeed-application">
                        <div class="welcome-msg">
                            <h3 class="text-center">বিভাগ ভিত্তিক <span class="mark">সফল</span> আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/1/1'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 1) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/4/1'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 4) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/8/1'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 8) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/3/1'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 3) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/5/1'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 5) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/2/1'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 2) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/6/1'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 6) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/7/1'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($selected_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 7) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /.welcome -->

                    <!-- Complain
                    ==================================================== -->
                    <div class="welcome complain-application">
                        <div class="welcome-msg">
                            <h3 class="text-center">বিভাগ ভিত্তিক <span class="mark">অভিযোগ</span> সমূহ</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/1/complain'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 1) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/4/complain'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 4) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/8/complain'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 8) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/3/complain'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 3) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/5/complain'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 5) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/2/complain'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 2) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/6/complain'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 6) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/7/complain'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($complain_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 7) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /.welcome -->

                    <!-- Apeal
                    ==================================================== -->
                    <div class="welcome apeal-application">
                        <div class="welcome-msg">
                            <h3 class="text-center">বিভাগ ভিত্তিক <span class="mark">আপিল</span> সমূহ</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/1/appeal'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 1) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/4/appeal'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 4) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/8/appeal'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 8) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/3/appeal'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 3) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/5/appeal'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 5) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/2/appeal'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 2) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/6/appeal'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 6) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('doc/all_somitee_list/7/appeal'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($appeal_somitee_counter as $row) {
                                        if ($row['somitee_div_id'] == 7) {
                                        ?>
                                        <span class="badge1">
                                                        <?php $output = str_replace(range(0, 9), $bn_digits, $row['t_num']);
                                            echo $output; ?>
                                                    </span>
                                        <?php
                                        }
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- /.welcome -->

                </div>

                <div class="col-md-6">
                    <div id="container" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                </div>

            </div>


            <div class="slide-out-div">
                <a href="" class="handle"></a>
                <h3>নোটিফিকেশন</h3>
                <ul class="list-unstyled content">
                    <?php if (count($somitee_info) > 0) { ?>
                    <?php foreach ($somitee_info  as $row) { ?>
                    <li>
                        <a href="<?php echo site_url('doc/somitee_list_detail/' . $row['somitee_id'] . '/new'); ?>"><?= $row['somitee_name'] ?></a>
                    </li>
                    <?php }
                    } else { ?>
                    <li>
                        <h3 style="text-align:center;">কোন তথ্য নেই ।</h3>
                    </li>
                    <?php } ?>
                </ul>
            </div>


            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div> <!-- /col10 -->
    </div><!-- /row -->
</div> <!-- /container-fluid -->

<?php $this->load->view('layouts/footer'); ?>

<script>
    var d = "<?php echo date('Y-m-d');?>";
    console.log(d);
    var m = d.split('-');
    var year1 = '';
    var year2 = '';
    if (m[1] <= 5) {
        year2 = m[0];
        year1 = parseInt(m[0]) - 1;
    } else {
        year1 = m[0];
        year2 = parseInt(m[0]) + 1;
    }
    var barNew = [];
    var barSelect = [];
    var barReject = [];

    <?php foreach($chartNew as $key=>$val){ ?>
            barNew[<?= $key?>] = [<?= $val["t"];?>];
    <?php } ?>
    <?php foreach($chartSelect as $key=>$val){ ?>
            barSelect[<?= $key?>] = [<?= $val["t"];?>];
    <?php } ?>
    <?php foreach($chartReject as $key=>$val){ ?>
            barReject[<?= $key?>] = [<?= $val["t"];?>];
    <?php } ?>
           


    var mnth = ['জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে'];
    $(function () {
        Highcharts.chart('container', {

            chart: {
                type: 'column'
            },

            title: {
                text: '<span style="font-weight: bold !important; font-size: larger">অনলাইন সমবায় নিবন্ধন<br><span style="font-size: small;">(জুন-' + (year1 + '').getDigitBanglaFromEnglish() + ' থেকে মে-' + (year2 + '').getDigitBanglaFromEnglish() + ' পর্যন্ত)</span></span>'
            },

            xAxis: {
                categories: mnth
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'অনলাইন সমবায় নিবন্ধনের সংখ্যা'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + (this.y + '').getDigitBanglaFromEnglish() + '<br/>' +
                            'সর্বমোট: ' + (this.point.stackTotal + '').getDigitBanglaFromEnglish();
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'নতুন',
                data: barNew,
                stack: 'male'
            }, {
                name: 'সফল',
                data: barSelect,
                stack: 'male'
            }, {
                name: 'বাতিল',
                data: barReject,
                stack: 'male'
            }]
        });
    });
</script>
