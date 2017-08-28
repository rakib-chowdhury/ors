<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="margin-top:5px;">
                    <ul class="list-inline">
                        <li><h3>সমবায় এর নামঃ <?php echo $somitee_info['0']['somitee_name']; ?></h3></li>
                        <li class="pull-right text-center">
                            <div id="dwnloadDiv" style="width: 200px; background-color: #337ab7;"
                                 onmouseover="chngBckgrndIn(this.id)" onmouseleave="chngBckgrndOut(this.id)">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="background-color: rgba(130, 138, 20, 0.59)">
                            <h3 class="heading-title text-center">সংগঠকের তথ্য </h3>
                        </div>

                        <table class="table table-striped table-bordered table-hover" cellspacing="0">
                            <tr>
                                <td width="25%">নাম</td>
                                <td><?php echo $leader_info[0]['user_name']; ?></td>
                            </tr>
                            <tr>
                                <td>ভোটার আই ডি</td>
                                <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['user_nid']); ?></td>
                            </tr>
                            <tr>
                                <td>ইমেইল</td>
                                <td><?php echo $leader_info[0]['user_email']; ?></td>
                            </tr>
                            <tr>
                                <td>ফোন</td>
                                <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['user_phone']); ?></td>
                            </tr>
                        </table>
                    </div><!-- /panel -->
                </div>

                <!-- Nav tabs -->
                <div class="col-md-10 col-md-offset-1">
                    <br>
                    <div class="panel panel-success">
                        <div class="panel-heading" style="background-color: rgba(150, 150, 20, 0.59)">
                            <h3 class="heading-title text-center">সমবায় সম্পর্কিত সাধারণ তথ্য</h3>
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td width="25%">নাম</td>
                                <td><?php echo $somitee_info['0']['somitee_name']; ?></td>
                            </tr>
                            <tr>
                                <td>শ্রেণী</td>
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
                                <td>সমবায় এর উদ্দেশ্য</td>
                                <td><?php echo $somitee_info[0]['somitee_purpose']; ?></td>
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
                    <div class="panel panel-success">
                        <div class="panel-heading" style="background-color: rgba(165, 165, 20, 0.59)">
                            <h3 class="heading-title text-center">সমবায় এর সকল সদস্যদের তথ্য</h3>
                        </div>
                        <table width="" align="center" class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="6%">ক্রমিক নং</th>
                                <th>সমবায় সদস্যের নাম</th>
                                <th>সমবায় সদস্যের ভোটার আইডি নাম্বার</th>
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
                                        <p><?= str_replace(range(0, 9), $bn_digits, $row['somitee_member_nid']) ?></p>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /col -->
                <div class="col-md-10 col-md-offset-1">
                    <?php if ($somitee_info[0]['uco_id'] != 0) {
                        $fileInfo = json_decode($uco_info[0]['files_status']);
                        ?>
                        <div class="panel panel-success">
                            <div class="panel-heading" style="background-color: rgba(180, 180, 20, 0.59)">
                                <h3 class="heading-title text-center">প্রয়োজনীয় কাগজপত্র জমা</h3>
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
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[0] == 1) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[0] == 0) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[0] == 0) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[0] == 1) {
                                            echo '<span class="glyphicon glyphicon-remove">';
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
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[1] == 0) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[1] == 0) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[1] == 1) {
                                            echo '<span class="glyphicon glyphicon-remove">';
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
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[2] == 0) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[2] == 0) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[2] == 1) {
                                            echo '<span class="glyphicon glyphicon-remove">';
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
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[3] == 0) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[3] == 0) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[3] == 1) {
                                            echo '<span class="glyphicon glyphicon-remove">';
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
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[4] == 0) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[4] == 0) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[4] == 1) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>

                                </tr>
                                <tr>
                                    <td>৬</td>
                                    <td>ব্যবস্থাপনা কমিটির সদস্যদের ছবিসহ নামের তালিকা ।
                                    </td>
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[5] == 1) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[5] == 0) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>
                                    <td style="width: 15%;">
                                        <?php
                                        if ($fileInfo[5] == 0) {
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        } elseif ($fileInfo[5] == 1) {
                                            echo '<span class="glyphicon glyphicon-remove">';
                                        } else {
                                            echo 'default';
                                        } ?></td>

                                </tr>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if ($somitee_info[0]['uco_id'] != 0) { ?>
                        <!--<div class="col-md-12">-->
                        <div class="panel panel-success">
                            <div class="panel-heading" style="background-color: rgba(165, 165, 20, 0.59)">
                                <h4 class="heading-title">উপজেলা সমবায় কর্মকর্তার মন্তব্য</h4>
                            </div>

                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered ">
                                <tr>
                                    <th>মন্তব্য</th>
                                    <th>ফাইল</th>
                                    <th>তারিখ</th>
                                </tr>
                                <?php foreach ($uco_info as $row) { ?>
                                    <tr>
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
                        </div><!-- /panel -->
                        <!--</div>-->
                    <?php } ?>
                    <?php if ($somitee_info[0]['dco_id'] != 0) { ?>
                        <!--<div class="col-md-12">-->
                        <div class="panel panel-success">
                            <div class="panel-heading" style="background-color: rgba(165, 165, 20, 0.59)">
                                <h4 class="heading-title">জেলা সমবায় কর্মকর্তার মন্তব্য</h4>
                            </div>
                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered ">
                                <tr>
                                    <th>মন্তব্য</th>
                                    <th>ফাইল</th>
                                    <th>তারিখ</th>
                                </tr>
                                <?php foreach ($dco_info as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php if ($row['dco_comment'] != null) {
                                                echo $row['dco_comment'];
                                            } else {
                                                echo 'জেলা সমবায় অফিসার কোনো মন্তব্য করেন নি ';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($row['dco_comment_upload'] != null) {
                                                $fileInfo = json_decode($row['dco_comment_upload']);
                                                foreach ($fileInfo as $f) {
                                                    $n = explode('__', $f);
                                                    echo "<a href='" . base_url() . "" . $f . "'>" . $n[1] . "</a><br>";
                                                }
                                                ?>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['dco_inquiry_date'])[0]); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /panel -->
                        <!--</div>-->
                    <?php } ?>

                    <?php if ($somitee_info[0]['appeal_id'] != 0) { ?>
                        <!--                        <div class="col-md-10 col-md-offset-1">-->
                        <div class="panel panel-success">
                            <div class="panel-heading" style="background-color: rgba(230, 200, 20, 0.59)">
                                <h4 class="heading-title">আপীল</h4>
                            </div>
                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered ">
                                <?php $asd = json_decode($appeal_info[0]['appeal_content']); ?>
                                <tr>
                                    <td>আপীল তারিখ</td>
                                    <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $appeal_info[0]['appeal_date'])[0]); ?></td>
                                </tr>
                                <tr>
                                    <td>আপীল এর বিষয়</td>
                                    <td><?php echo $asd[0]->sub; ?></td>
                                </tr>
                                <tr>
                                    <td>আপীল এর বিবরণ</td>
                                    <td><?php echo $asd[0]->content; ?></td>
                                </tr>
                                <tr>
                                    <td>আপীল এর রিপ্লাই তারিখ</td>
                                    <td><?php
                                        if ($appeal_info[0]['appeal_reply'] == null) {
                                            echo "এখন পর্যন্ত রিপ্লাই করা হয় নাই ";
                                        } else {
                                            echo str_replace(range(0, 9), $bn_digits, $appeal_info[0]['appeal_reply_date']);
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>আপীল এর রিপ্লাই</td>
                                    <td><?php
                                        if ($appeal_info[0]['appeal_reply'] == null) {
                                            echo "এখন পর্যন্ত রিপ্লাই করা হয় নাই ";
                                        } else {
                                            echo $appeal_info[0]['appeal_reply'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /panel -->
                        <!--                        </div>-->
                    <?php } ?>

                    <?php if ($somitee_info[0]['complain_id'] != 0) { ?>
                        <!--                        <div class="col-md-10 col-md-offset-1">-->
                        <div class="panel panel-success">
                            <div class="panel-heading" style="background-color: rgba(230, 200, 20, 0.59)">
                                <h4 class="heading-title">অভিযোগ</h4>
                            </div>
                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered ">
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
                                        <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $r['complain_date'])[0]); ?></td>
                                        <td><?php echo $asd[0]->sub; ?></td>
                                        <td><?php if ($r['complain_reply'] == null) {
                                                echo "এখন পর্যন্ত রিপ্লাই করা হয় নাই";
                                            } else {
                                                echo str_replace(range(0, 9), $bn_digits, explode(' ', $r['complain_reply_date'])[0]);
                                            } ?>
                                        </td>
                                        <td><a id="complain_modal_show" style="cursor: pointer"
                                               onclick="complain_show(<?php echo $r['complain_id'] ?>)">বিস্তারিত</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /panel -->
                        <!--                        </div>-->
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading" style="background-color: rgba(230, 200, 20, 0.59)">
                                    <h3 class="heading-title text-center">সকল কার্যক্রম</h3>
                                </div>

                                <table class='table table-striped table-hover table-bordered'>
                                    <tr>
                                        <th>কার্যক্রম</th>
                                        <th>মন্তব্য</th>
                                        <th style="width: 10%">তারিখ</th>
                                    </tr>
                                    <tr>
                                        <td>সংগঠক নিবন্ধন</td>
                                        <td></td>
                                        <td><?= str_replace(range(0, 9), $bn_digits, explode(' ', $leader_info[0]['user_reg_date'])[0]) ?></td>
                                    </tr>
                                    <tr>
                                        <td>সমবায় রেজিস্ট্রেশন</td>
                                        <td></td>
                                        <td><?= str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]) ?></td>
                                    </tr>
                                    <?php foreach ($division_info as $row) { ?>
                                        <tr>
                                            <td>ডক এডমিন
                                                <?php
                                                if ($row['divisional_admin_inquiry_verify'] == 1) {
                                                    echo 'অনুমোদন';
                                                } else if ($row['divisional_admin_inquiry_verify'] == 0) {
                                                    echo 'বাতিল';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['divisional_admin_comment'] == null || $row['divisional_admin_comment'] == '') {
                                                    echo 'ডক এডমিন কোনো মন্তব্য করেন নি';
                                                } else {
                                                    echo $row['divisional_admin_comment'];
                                                } ?>
                                            </td>
                                            <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['divisional_admin_inquiry_date'])[0]); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php foreach ($uco_info as $row) { ?>
                                        <tr>
                                            <td>
                                                <a style="cursor:pointer"
                                                   onclick="get_admin_info('<?= $row['uco_id']; ?>','uco','উপজেলা সমবায় কর্মকর্তা')">উপজেলা
                                                    সমবায় কর্মকর্তা</a> অনুমোদন
                                            </td>
                                            <td>
                                                <?php if (($row['uco_comment'] == null || $row['uco_comment'] == '') && ($row['uco_comment_upload'] == null || $row['uco_comment_upload'] == '')) {
                                                    echo 'উপজেলা সমবায় কর্মকর্তা কোনো মন্তব্য করেন নি ';
                                                } else {
                                                    echo $row['uco_comment'];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['uco_inquiry_date'])[0]); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php foreach ($dco_info as $row) { ?>
                                        <tr>
                                            <td>
                                                <a style="cursor:pointer"
                                                   onclick="get_admin_info('<?= $row['dco_id']; ?>','dco','জেলা সমবায় কর্মকর্তা')">জেলা
                                                    সমবায় কর্মকর্তা</a>
                                                <?php
                                                if ($row['dco_inquiry_verify'] == 1) {
                                                    echo 'অনুমোদন';
                                                } else if ($row['dco_inquiry_verify'] == 0) {
                                                    echo 'বাতিল';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if (($row['dco_comment'] == null || $row['dco_comment'] == '') && ($row['dco_comment_upload'] == null || $row['dco_comment_upload'] == '')) {
                                                    echo 'জেলা সমবায় কর্মকর্তা কোনো মন্তব্য করেন নি ';
                                                } else {
                                                    echo $row['dco_comment'];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['dco_inquiry_date'])[0]); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($somitee_info[0]['appeal_id'] != 0) { ?>
                                        <tr>
                                            <td>আপীল</td>
                                            <td>
                                            </td>
                                            <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $appeal_info[0]['appeal_date'])[0]); ?></td>
                                        </tr>
                                        <?php if ($appeal_info[0]['appeal_reply_date'] != '0000-00-00' || $appeal_info[0]['appeal_reply_date'] != null) { ?>
                                            <tr>
                                                <td>আপীল<?php
                                                    if ($appeal_info[0]['appeal_verify'] == 1) {
                                                        echo 'অনুমোদন';
                                                    } else if ($appeal_info[0]['appeal_verify'] == 0) {
                                                        echo 'বাতিল';
                                                    }
                                                    ?></td>
                                                <td>
                                                </td>
                                                <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $appeal_info[0]['appeal_reply_date'])[0]); ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /col -->
            </div><!--/row -->

            <div class="row" style="margin-top: 48px;">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div><!-- /col10 -->
    </div><!-- /row -->
</div><!-- /container -->


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
                <button class="btn btn-danger" data-dismiss="modal">বব্ধ করুন</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adminShowModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title" id="admin_title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">নাম</label>
                        <div class="col-md-8">
                            <p id="admin_name"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">জাতীয় পরিচয়পত্র নম্বর</label>
                        <div class="col-md-8">
                            <p id="admin_nid"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">ফোন নম্বর</label>
                        <div class="col-md-8">
                            <p id="admin_phn"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অফিস</label>
                        <div class="col-md-8">
                            <p id="admin_offc"></p>
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


<?php $this->load->view('layouts/footer'); ?>
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

    function get_admin_info(id, tbl, title) {
        console.log(id);
        console.log(tbl);
        console.log(title);

        $.ajax({
            type: 'post',
            url: '<?= site_url('doc/get_all_admin_info');?>',
            data: {
                iid: id,
                tble: tbl
            }, success: function (data) {
                console.log(data);
                document.getElementById('admin_title').innerText = title;

                var data1 = $.parseJSON(data);

                $.each(data1['res'], function (i, v) {
                    document.getElementById('admin_name').innerText = v['admin_name'];
                    document.getElementById('admin_nid').innerText = v['admin_nid'].getDigitBanglaFromEnglish();
                    document.getElementById('admin_phn').innerText = v['admin_phone'].getDigitBanglaFromEnglish();

                    var addd = document.getElementById('admin_offc');
                    var address = '';
                    if (v['bn_upz_name'] == null || v['bn_upz_name'] == '') {
                    } else {
                        address += v['bn_upz_name'] + ', ';
                    }

                    if (v['bn_dist_name'] == null || v['bn_dist_name'] == '') {
                    } else {
                        address += v['bn_dist_name'] + ', ';
                    }

                    if (v['bn_div_name'] == null || v['bn_div_name'] == '') {
                    } else {
                        address += v['bn_div_name'];
                    }
                    addd.innerHTML = address;

                });


                $('#adminShowModal').modal('show');
            }
        });
    }

    function complain_show(complain_id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('doc/get_complain_info');?>',
            data: {
                complain_id: complain_id
            }, success: function (data) {
                console.log(data);
                data1 = $.parseJSON(data);
                //document.getElementById('').innerText = asd[0]['sub'];
                if (data1['res'] == 1) {
                    document.getElementById('cmpln_date').innerText = data1['complain_infos'][0]['complain_date'].split(' ')[0].getDigitBanglaFromEnglish();
                    var asd = $.parseJSON(data1['complain_infos'][0]['complain_content']);
                    document.getElementById('cmpln_sub').innerText = asd[0]['sub'];
                    document.getElementById('cmpln_content').innerText = asd[0]['content'];
                    if (data1['complain_infos'][0]['complain_reply'] == null) {
                        document.getElementById('cmpln_reply_date').innerText = 'এখন পর্যন্ত রিপ্লাই করা হয় নাই';
                        document.getElementById('cmpln_reply').innerText = 'এখন পর্যন্ত রিপ্লাই করা হয় নাই';
                    } else {
                        document.getElementById('cmpln_reply_date').innerText = data1['complain_infos'][0]['complain_reply_date'].split(' ')[0].getDigitBanglaFromEnglish();
                        document.getElementById('cmpln_reply').innerText = data1['complain_infos'][0]['complain_reply'];
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
</script>
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