<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>

<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-12 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts_uco_dco/secondary-nav'); ?>
                        <!--<div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="margin-top:30px;">
                        <div style="margin-bottom: 10px;">
                            <ol class="breadcrumb">
                                <li><a href="<?= base_url('uco') ?>">হোম</a></li>
                                <li>
                                    <?php
                                    if ($s_type == 'new') {
                                        echo '<a href="' . base_url('uco/get_somitee/new') . '">নতুন সমবায় তালিকা</a>';
                                    } elseif ($s_type == 'all') {
                                        echo '<a href="' . base_url('uco/get_somitee/all') . '">সকল সমবায় তালিকা</a>';
                                    } else if ($s_type == 'selected') {
                                        echo '<a href="' . base_url('uco/get_somitee/selected') . '">সফল সমবায় তালিকা</a>';
                                    }
                                    ?>
                                </li>
                                <li class="active">সমবায়ের বিস্তারিত তথ্য</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <?php if ($comment_err == 1) { ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                        <div id="track_div" class="col-md-6 col-md-offset-3">
                            <div class="alert alert-danger" role="alert">
                                অনুগ্রহ করে মন্তব্য করুন
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                        <ul class="list-inline">
                            <li>
                                <h3>সমবায়ের নাম : <?php echo $somitee_info[0]['somitee_name']; ?></h3>
                            </li>
                            <li class="pull-right text-center">
                                <div id="dwnloadDiv" style="width: 200px; background-color: #337ab7;"
                                     onmouseover="chngBckgrndIn(this.id)" onmouseleave="chngBckgrndOut(this.id)">
                                    <b>
                                        <a id="linkTag" style="text-decoration:none; color: whitesmoke"
                                           href="<?php echo site_url('uco/uco_download_user_info/' . $somitee_info[0]['somitee_id']); ?>">আপনার
                                            সমবায় সম্পর্কিত তথ্য এখানে <span style="color:red;">ডাউনলোড <i
                                                        class="fa fa-file-pdf-o" aria-hidden="true"></i></span> করুন</a></b>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                        <div class="panel panel-success" style="border-color: #6096c7">
                            <div class="panel-heading"
                                 style="background-color: #43749e; border-color: #43749e; color: whitesmoke;">
                                <h4 class="heading-title">সমবায় সম্পর্কিত সাধারণ তথ্য</h4>
                            </div>
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="25%">নাম</td>
                                    <td><?php echo $somitee_info['0']['somitee_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>শ্রেণী</td>
                                    <td>শ্রেণী:
                                        <?php
                                        echo $somitee_info['0']['somitee_type_name'];
                                        ?>
                                        <br>
                                        প্রকৃতি:
                                        <?= $somitee_info[0]['somitee_cat_name'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>কার্যালয়ের ঠিকানা</td>
                                    <td>
                                        বিভাগ: <?= $somitee_info[0]['bn_div_name']; ?>
                                        <br>
                                        জেলা: <?= $somitee_info[0]['bn_dist_name']; ?>
                                        <br>
                                        উপজেলা:<?= $somitee_info[0]['bn_upz_name']; ?>
                                        <br>
                                        বিস্তারিত :<?= $somitee_info[0]['somitee_address']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>সদস্য নির্বাচনী এলাকা</td>
                                    <td>
                                        বিভাগ: <?= $somitee_info_sodosso[0]['bn_div_name']; ?>
                                        <br>
                                        জেলা: <?= $somitee_info_sodosso[0]['bn_dist_name']; ?>
                                        <br>
                                        উপজেলা:<?= $somitee_info_sodosso[0]['bn_upz_name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর কর্ম এলাকা</td>
                                    <td>
                                        বিভাগ: <?= $somitee_info[0]['k_div_name']; ?>
                                        <br>
                                        জেলা: <?= $somitee_info[0]['k_dist_name']; ?>
                                        <br>
                                        উপজেলা:<?= $somitee_info[0]['k_upz_name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>প্রতিটি শেয়ার মূল্য</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price']);
                                        echo $output . ' টাকা'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>মোট শেয়ার সংখ্যা</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_share']);
                                        echo $output . ' টি'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>অনুমোদিত মূলধন</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['somitee_share']);
                                        echo $output . ' টাকা'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>বিক্রিত শেয়ার সংখ্যা</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['sell_share_num']);
                                        echo $output . ' টি'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>পরিশোধিত শেয়ার মূলধন</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num']));
                                        echo $output . ' টাকা'; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর ব্যাংক তথ্য</td>
                                    <td><?= $somitee_info[0]['somitee_acc_no'] ?></td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর সদস্য সংখ্যা (ছেলে)</td>
                                    <td><?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['member_number_male'])) ?>
                                        <?= $output ?> জন
                                    </td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর সদস্য সংখ্যা (মেয়ে)</td>
                                    <td><?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['member_number_female'])) ?>
                                        <?= $output ?> জন
                                    </td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর রেজিস্ট্রেশন তারিখ</td>
                                    <td>
                                        <?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]); ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                        <div class="panel panel-success" style="border-color: #6096c7">
                            <div class="panel-heading"
                                 style="background-color: #43749e; border-color: #43749e; color: whitesmoke;">
                                <h4 class="heading-title">
                                    সমবায় এর ব্যবস্থাপনা কমিটির তথ্য
                                </h4>
                            </div>

                            <table class="table table-stripped table-bordered "
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th width="8%" class="text-center">ক্রমিক</th>
                                    <th width="" class="text-center">সদস্য নাম</th>
                                    <th class="text-center">মোবাইল নং</th>
                                </tr>
                                </thead>
                                <tbody><?php $i = 1;
                                foreach ($somitee_mngmnt_info as $row) { ?>
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
                                        <p><?= $row['name'] ?></p>
                                    </td>
                                    <td>
                                        <p><?= str_replace(range(0,9),$bn_digits,$row['phone']) ?></p>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if ($somitee_info[0]['uco_id'] != 0) { ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                        <div class="panel panel-success" style="border-color: #6096c7">
                            <div class="panel-heading"
                                 style="background-color: #43749e; border-color: #43749e; color: whitesmoke;">
                                <h4 class="heading-title">প্রয়োজনীয় কাগজপত্র জমা</h4>
                            </div>

                            <table class="table table-stripped table-bordered table-hover">
                                <?php if (sizeof($uco_info != 0)) {
                                $fileInfo = json_decode($uco_info[0]['files_status']); ?>
                                <div>
                                    <table style="border: 1px solid #ddd;"
                                           class="table table-stripped table-bordered table-hover">
                                        <tr>
                                            <th>ক্রমিক</th>
                                            <th>প্রয়োজনীয় কাগজপত্র</th>
                                            <th>হ্যা</th>
                                            <th>না</th>
                                        </tr>
                                        <tr>
                                            <td style="width: 5%;">১</td>
                                            <td>নির্ধারিত আবেদনপত্র</td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[0] == 1) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[0] == 0) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[0] == 0) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[0] == 1) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>২</td>
                                            <td> ৩০০.০০ টাকার নিবন্ধন ফি (কোড নং-১-৩৮৩১-০০০০-১৮৩৬) এবং উক্ত ফি
                                                এর উপর ১৫% ভ্যাট হিসেবে ৪৫.০০ টাকা (কোড নং-১-১১৩-০০০০-০৩১১) এ
                                                চালানমূলে বাংলাদেশ
                                                ব্যাংক অথবা সোনালী ব্যাংকের নির্ধারিত শাখায় জমা দিয়ে চালানের মূল
                                                কপি।
                                            </td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[1] == 1) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[1] == 0) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[1] == 0) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[1] == 1) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>

                                        </tr>
                                        <tr>
                                            <td>৩</td>
                                            <td> আবেদনকারী সদস্যের স্বাক্ষরযুক্ত তিন প্রস্ত উপ-আইন।
                                            </td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[2] == 1) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[2] == 0) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[2] == 0) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[2] == 1) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>

                                        </tr>
                                        <tr>
                                            <td>৪</td>
                                            <td>সমবায় সমিতি নিবন্ধনে আগ্রহী ব্যক্তিবর্গের সমন্বয়ে অনুষ্ঠিত সাংগঠনিক
                                                সভার
                                                রেজুলেশন।
                                            </td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[3] == 1) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[3] == 0) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[3] == 0) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[3] == 1) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>

                                        </tr>
                                        <tr>

                                            <td>৫</td>
                                            <td> আবেদনকারী সদস্যের জাতীয় পরিচয়পত্র/জন্মনিবন্ধন সনদ।
                                            </td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[4] == 1) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[4] == 0) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[4] == 0) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[4] == 1) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>

                                        </tr>
                                        <tr>
                                            <td>৬</td>
                                            <td>প্রস্তাবিত ব্যবস্থাপনা কমিটির সদস্যদের ছবিসহ নামের তালিকা ।
                                            </td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[5] == 1) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[5] == 0) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>
                                            <td style="width: 15%;">
                                                <?php
                                                if ($fileInfo[5] == 0) {
                                                echo '<span style="color: green" class="glyphicon glyphicon-ok"></span>';
                                                } elseif ($fileInfo[5] == 1) {
                                                echo '<span style="color: red;" class="glyphicon glyphicon-remove">';
                                                } else {
                                                echo 'default';
                                                } ?></td>

                                        </tr>
                                    </table>
                                </div>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                        <div class="panel panel-success" style="border-color: #6096c7">
                            <div class="panel-heading"
                                 style="background-color: #43749e; border-color: #43749e; color: whitesmoke;">
                                <h4 class="heading-title">উপজেলা সমবায় কর্মকর্তার মন্তব্য</h4>
                            </div>
                            <table class="table table-stripped table-bordered ">
                                <tr>
                                    <th>মন্তব্য</th>
                                    <th>ফাইল</th>
                                    <th>তারিখ</th>
                                </tr>
                                <?php foreach ($uco_info as $row) { ?>
                                <tr>
                                    <!--                                            <td>উপজেলা সমবায় অফিসার</td>-->
                                    <td>
                                        <?php if ($row['uco_comment'] != null) {
                                        echo $row['uco_comment'];
                                        } else {
                                        echo 'উপজেলা সমবায় অফিসার কোনো মন্তব্য করেন নি ';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($row['uco_comment_upload'] != null) {
                                        $fileInfo = json_decode($row['uco_comment_upload']);
                                        foreach ($fileInfo as $f) {
                                        $n = explode('__', $f);
                                        echo "<a href='" . base_url() . "" . $f . "'>" . $n[1] . "</a><br>";
                                        }
                                        ?>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['uco_inquiry_date'])[0]); ?></td>
                                </tr>
                                <?php } ?>

                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="">
                        <div class="panel panel-success" style="border-color: #6096c7">
                            <div class="panel-heading"
                                 style="background-color: #43749e; border-color: #43749e; color: whitesmoke;">
                                <h4 class="heading-title text-center">সকল কার্যক্রম</h4>
                            </div>

                            <table class='table table-striped table-hover table-bordered'>
                                <tr>
                                    <th>কার্যক্রম</th>
                                    <th>কর্মকর্তা কর্মচারীর নাম</th>
                                    <th style="width: 10%">তারিখ</th>
                                </tr>
                                <tr>
                                    <td>সমবায় রি-রেজিস্ট্রেশন</td>
                                    <td>
                                        <a style="cursor:pointer" data-toggle="modal"
                                           data-target="#adminShowModal"> <?= $somitee_added_info[0]['admin_name'] ?></a>
                                    </td>
                                    <td><?= str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if ($somitee_info[0]['somitee_status'] == 2 && $somitee_info[0]['division_id'] != 0 && $somitee_info[0]['uco_id'] == 0 && $somitee_info[0]['dco_id'] == 0) { ?>
                <form action="<?php echo site_url('uco/uco_comment_post2'); ?>"
                      method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" style="">
                            <div class="panel panel-success" style="overflow:hidden;padding-bottom:10px; border-color: #6096c7">
                                <div class="panel-heading" style="background-color: #43749e; border-color: #43749e; color: whitesmoke;">
                                    <div class="heading-title">
                                        <h3 style='text-align:center;'>প্রয়োজনীয় কাগজপত্র </h3>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>ক্রমিক</th>
                                        <th>প্রয়োজনীয় কাগজপত্র</th>
                                        <th>হ্যা</th>
                                        <th>না</th>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%;">১</td>
                                        <td>নির্ধারিত আবেদনপত্র</td>
                                        <td style="width: 15%;"><input type='radio' required name='paper1'
                                                                       value='1'></td>
                                        <td style="width: 15%;"><input type='radio' required name='paper1'
                                                                       value='0'></td>
                                    </tr>
                                    <tr>
                                        <td>২</td>
                                        <td> ৩০০.০০ টাকার নিবন্ধন ফি (কোড নং-১-৩৮৩১-০০০০-১৮৩৬) এবং উক্ত ফি
                                            এর উপর ১৫% ভ্যাট হিসেবে ৪৫.০০ টাকা (কোড নং-১-১১৩-০০০০-০৩১১) এ
                                            চালানমূলে বাংলাদেশ
                                            ব্যাংক অথবা সোনালী ব্যাংকের নির্ধারিত শাখায় জমা দিয়ে চালানের মূল
                                            কপি।
                                        </td>
                                        <td><input type='radio' required name='paper2' value='1'></td>
                                        <td><input type='radio' required name='paper2' value='0'></td>

                                    </tr>
                                    <tr>
                                        <td>৩</td>
                                        <td> আবেদনকারী সদস্যের স্বাক্ষরযুক্ত তিন প্রস্ত উপ-আইন।
                                        </td>
                                        <td><input type='radio' required name='paper3' value='1'></td>
                                        <td><input type='radio' required name='paper3' value='0'></td>

                                    </tr>
                                    <tr>
                                        <td>৪</td>
                                        <td>সমবায় সমিতি নিবন্ধনে আগ্রহী ব্যক্তিবর্গের সমন্বয়ে অনুষ্ঠিত
                                            সাংগঠনিক সভার
                                            রেজুলেশন।
                                        </td>
                                        <td><input type='radio' required name='paper4' value='1'></td>
                                        <td><input type='radio' required name='paper4' value='0'></td>

                                    </tr>
                                    <tr>

                                        <td>৫</td>
                                        <td> আবেদনকারী সদস্যের জাতীয় পরিচয়পত্র/জন্মনিবন্ধন সনদ।
                                        </td>
                                        <td><input type='radio' required name='paper5' value='1'></td>
                                        <td><input type='radio' required name='paper5' value='0'></td>

                                    </tr>
                                    <tr>
                                        <td>৬</td>
                                        <td>প্রস্তাবিত ব্যবস্থাপনা কমিটির সদস্যদের ছবিসহ নামের তালিকা ।
                                        </td>
                                        <td><input type='radio' required name='paper6' value='1'></td>
                                        <td><input type='radio' required name='paper6' value='0'></td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" style="">
                            <div class="panel panel-success" style="border-color: #6096c7; margin-bottom: 5px;">
                                <div class="panel-heading" style="background-color: #43749e; border-color: #43749e; color: whitesmoke;">
                                    <h3 class="heading-title">মন্তব্য করুন</h3>
                                </div>
                                <div class="panel-body">
                                    <input type='hidden' name='somitee_id'
                                           value='<?php echo $somitee_info[0]['somitee_id']; ?>'>
                                    <input type='hidden' name='track'
                                           value='<?php echo $somitee_info[0]['somitee_track_id']; ?>'>
                                    <div class="form-group">
                                        <textarea class="summernote" name='cmmnt'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">ফাইল যোগ করুন</label>
                                        <div class="col-md-8" id="bkup_doc_rw">
                                            <input type='hidden' name='file_name' id='file_name' value=''>
                                            <input type="file" class="" name="file[]">
                                        </div>
                                    </div>
                                    <a href="#" id="addNew" class="btn btn-success">+ Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" style="">
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit"
                                            class="btn btn-success gnt-btn btn-block"><span
                                                class="glyphicon glyphicon-floppy-saved"></span>&nbsp;
                                        &nbsp;সাবমিট
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--<div class="row">
        <footer id="admin-footer" style="background-color: rgba(238, 238, 238, 0.65);">
            <p style="padding-top: 10px;" class="text-center">Copyright &copy; 2016. All right resereved</p>
        </footer>
    </div>-->
</div>
</div>

<div class="modal fade" id="adminShowModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title" id="admin_title"> কর্মকর্তা/কর্মচারীর তথ্য</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">নাম</label>
                        <div class="col-md-8">
                            <p id="admin_name"><?= $somitee_added_info[0]['admin_name'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">জাতীয় পরিচয়পত্র নম্বর</label>
                        <div class="col-md-8">
                            <p id="admin_nid"><?= str_replace(range(0, 9), $bn_digits, $somitee_added_info[0]['admin_nid']) ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">ফোন নম্বর</label>
                        <div class="col-md-8">
                            <p id="admin_phn"><?= str_replace(range(0, 9), $bn_digits, $somitee_added_info[0]['admin_phone']) ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অফিস</label>
                        <div class="col-md-8">
                            <p id="admin_offc">
                                <?php if ($somitee_added_info[0]['admin_designation_id'] == 2) {
                                    echo 'ডক অ্যাডমিন';
                                } elseif ($somitee_added_info[0]['admin_designation_id'] == 6) {
                                    echo 'জেলা সমবায় কর্মকর্তা, ' . $somitee_added_info[0]['bn_dist_name'] . ', ' . $somitee_added_info[0]['bn_div_name'];
                                } elseif ($somitee_added_info[0]['admin_designation_id'] == 7) {
                                    echo 'উপজেলা সমবায় কর্মকর্তা, ' . $somitee_added_info[0]['bn_upz_name'] . ', ' . $somitee_added_info[0]['bn_dist_name'] . ', ' . $somitee_added_info[0]['bn_div_name'];
                                } ?>
                            </p>
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">বাতিল</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts_uco_dco/footer'); ?>

<script>
    function chngBckgrndIn(id) {
        var x = document.getElementById(id);
        x.style.backgroundColor = 'white';
        var x = document.getElementById('linkTag');
        x.style.color = 'black';
    }
    function chngBckgrndOut(id) {
        var x = document.getElementById(id);
        x.style.backgroundColor = '#337ab7';
        var x = document.getElementById('linkTag');
        x.style.color = 'whitesmoke';
    }
</script>