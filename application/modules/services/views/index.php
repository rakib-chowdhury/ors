<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');

?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php $this->load->view('layouts/sidebar-nav'); ?>

        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts/secondary-nav'); ?>
                <h2 class="text-center hidden-sm hidden-xs">ড্যাশবোর্ড ব্যবস্থাপনায় আপনাকে স্বাগতম</h2>
                <div class="col-md-7">
                    <table class="table table-bordered profile">
                        <tr>
                            <th>নাম</th>
                            <td>মিজানুর রহমান</td>
                        </tr>
                        <tr>
                            <th>এন, আই, ডি</th>
                            <td>23423423423432</td>
                        </tr>
                        <tr>
                            <th>পদবী</th>
                            <td>DOC Admin</td>
                        </tr>
                    </table>

                    <div class="welcome new-application">
                        <div class="welcome-msg">
                            <h3 class="text-center">বিভাগীয় সমবায়ের নতুন আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('services/all_somitee_list/1/new'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/4/new'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/8/new'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/3/new'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/5/new'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/2/new'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/6/new'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/7/new'); ?>"
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
                            <h3 class="text-center">বিভাগীয় সমবায়ের সকল আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('services/all_somitee_list/1/all'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/4/all'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/8/all'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/3/all'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/5/all'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/2/all'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/6/all'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/7/all'); ?>"
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
                            <h3 class="text-center">বিভাগীয় সমবায়ের বাতিল আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('services/all_somitee_list/1/reject'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/4/reject'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/8/reject'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/3/reject'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/5/reject'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/2/reject'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/6/reject'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/7/reject'); ?>"
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
                            <h3 class="text-center">বিভাগীয় সমবায়ের সফল আবেদন</h3>
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="<?php echo site_url('services/all_somitee_list/1/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/4/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/8/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/3/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/5/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/2/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/6/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/7/1'); ?>"
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
                                    <a href="<?php echo site_url('services/all_somitee_list/1/complain'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/4/complain'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/8/complain'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/3/complain'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/5/complain'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/2/complain'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/6/complain'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/7/complain'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($complain_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/1/appeal'); ?>"
                                       class="gnt-actn-btn btn-success">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ঢাকা</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/4/appeal'); ?>"
                                       class="gnt-actn-btn btn-warning">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রাজশাহী</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/8/appeal'); ?>"
                                       class="gnt-actn-btn btn-danger">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>ময়মনসিংহ</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/3/appeal'); ?>"
                                       class="gnt-actn-btn btn-primary">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>চট্টগ্রাম</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/5/appeal'); ?>"
                                       class="gnt-actn-btn btn-purple">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>বরিশাল</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/2/appeal'); ?>"
                                       class="gnt-actn-btn btn-brown">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>খুলনা</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/6/appeal'); ?>"
                                       class="gnt-actn-btn btn-orange">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>সিলেট</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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
                                    <a href="<?php echo site_url('services/all_somitee_list/7/appeal'); ?>"
                                       class="gnt-actn-btn btn-pink">
                                        <i class="glyphicon glyphicon-globe"></i>
                                        <span>রংপুর</span>
                                        <?php foreach ($appeal_somitee_counters as $row) {
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

                <div class="col-md-4">
                    <table class="table table-bordered sms-counter">
                        <tr>
                            <th colspan="2" class="text-center">এস, এম, এস</th>
                        </tr>
                        <tr>
                            <th>মজুদ আছে</th>
                            <td> <?php $res = $sms_info[0]['total_sms_number'] - $sms_info[0]['send_sms_number'];
                                $output = str_replace(range(0, 9), $bn_digits, $res);
                                echo $output; ?></td>
                        </tr>
                        <tr>
                            <th>পাঠানো হয়েছে</th>
                            <td><?php $output = str_replace(range(0, 9), $bn_digits, $sms_info[0]['send_sms_number']);
                                echo $output; ?> </td>
                        </tr>
                    </table>

                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                    <script type="text/javascript">
                        window.onload = function () {
                            var chart = new CanvasJS.Chart("chartContainer",
                                {
                                    theme: "theme2",
                                    title: {
                                        text: ""
                                    },
                                    data: [
                                        {
                                            type: "pie",
                                            showInLegend: true,
                                            toolTipContent: "{y} - #percent %",
                                            yValueFormatString: "#0.#,,. Million",
                                            legendText: "{indexLabel}",
                                            dataPoints: [
                                                {y: 4181563, indexLabel: "ঢাকা"},
                                                {y: 2175498, indexLabel: "রাজশাহী"},
                                                {y: 3125844, indexLabel: "কুমিল্লা"},
                                                {y: 1176121, indexLabel: "চট্টগ্রাম"},
                                                {y: 1727161, indexLabel: "বরিশাল"},
                                                {y: 4303364, indexLabel: "খুলনা"},
                                                {y: 1717786, indexLabel: "সিলেট"},
                                                {y: 1717786, indexLabel: "রংপুর"}
                                            ]
                                        }
                                    ]
                                });
                            chart.render();
                        }
                    </script>
                </div>

            </div>


            <div class="slide-out-div">
                <a href="" class="handle"></a>
                <h3>নোটিফিকেশন</h3>
                <ul class="list-unstyled content">
                    <?php if (count($somitee_info) > 0) { ?>
                        <?php foreach ($somitee_info as $row) { ?>
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
