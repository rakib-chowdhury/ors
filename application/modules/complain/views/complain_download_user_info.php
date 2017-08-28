<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী
        বাংলাদেশ সরকার</title>
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
<style>
    .tbl {
        text-align: center;
        width: 100%;
    // border: solid black;
    }

    .tbl2 {        
        width: 100%;
        border: thin;
    }

    .tbl2 td {
        //font-size:14px;
        text-align: left;
        padding-left: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>
<body style="background-image: none">
<?php  $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">সংগঠক-এর তথ্যাবলি</h3></td>
    </tr>
</table>
<table class="tbl2" border="1">
    <tr>
        <td style="width:30%">নাম</td>
        <td><?php echo $leader_info[0]['user_name'];?></td>
    </tr>
    <tr>
        <td>ভোটার আই ডি</td>
        <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['user_nid']);?></td>
    </tr>
    <tr>
        <td>ইমেইল</td>
        <td><?php echo $leader_info[0]['user_email'];?></td>
    </tr>
    <tr>
        <td>ফোন</td>
        <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['user_phone']);?></td>
    </tr>
</table>
<br>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">সমবায় সম্পর্কিত সাধারন তথ্যাবলি</h3></td>
    </tr>
</table>
<table class="tbl2" border="1">  
    <tr>
        <td style="width:30%">নাম</td>
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
                    echo $row['somitee_cat_name'];
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
        <td>সমবায়ের কর্ম এলাকা</td>
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
        <td><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price']); echo $output . ' টাকা'; ?></td>
    </tr>
    <tr>
        <td>প্রস্তাবিত মোট শেয়ার সংখ্যা</td>
        <td><?php  $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_share']); echo $output . ' টি'; ?></td>
    </tr>
    <tr>
        <td>প্রস্তাবিত অনুমোদিত মূলধন</td>
        <td><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['somitee_share']);
            echo $output . ' টাকা'; ?></td>
    </tr>
    <tr>
        <td>বিক্রিত শেয়ার সংখ্যা</td>
        <td><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['sell_share_num']); echo $output . ' টি'; ?></td>
    </tr>
    <tr>
        <td>পরিশোধিত মূলধন</td>
        <td><?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num']));
            echo $output . ' টাকা'; ?></td>
    </tr>
    <tr>
        <td>সমবায়ের উদ্দেশ্য</td>
        <td><?php echo $somitee_info[0]['somitee_purpose']; ?></td>
    </tr>
    <tr>
        <td>সমবায়ের রেজিস্ট্রেশন তারিখ</td>
        <td><?php $output = str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]);
            echo $output; ?></td>
    </tr>    
</table>
<pagebreak></pagebreak>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">সমবায়-এর সদস্যদের তথ্য</h3></td>
    </tr>
</table>
<table class="tbl2" border="1">    
    <tr>
        <td style="width: 8%">ক্রমিক নং</td>
        <td>সদস্য নাম</td>
        <td>সমবায় সদস্যের ভোটার আইডি নাম্বার</td>
    </tr>
    <?php $i = 1;
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
            <p><?= str_replace(range(0,9),$bn_digits,$row['somitee_member_nid']) ?></p>
        </td>
    </tr>
    <?php } ?>    
</table>
<?php if ($somitee_info[0]['uco_id'] != 0) { ?>
<?php if (sizeof($uco_info != 0)) {
$fileInfo = json_decode($uco_info[0]['files_status']); ?>
<pagebreak></pagebreak>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">প্রয়োজনীয় কাগজপত্র জমা</h3></td>
    </tr>
</table>
<table class="tbl2" border="1">
    <tr>
        <td width="8%">ক্রমিক</td>
        <td>প্রয়োজনীয় কাগজপত্র</td>
        <td>প্রাপ্তি</td>
    </tr>
    <tr>
        <td>১</td>
        <td>নির্ধারিত আবেদনপত্র</td>
        <td style="width: 15%;">
            <?php
            if ($fileInfo[0] == 1) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/yes.jpg") . '">';
            } elseif ($fileInfo[0] == 0) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/no.jpg") . '">';
            } else {
                echo 'default';
            } ?>
        </td>
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
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/yes.jpg") . '">';
            } elseif ($fileInfo[1] == 0) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/no.jpg") . '">';
            } else {
                echo 'default';
            } ?>
        </td>
    </tr>
    <tr>
        <td>৩</td>
        <td> আবেদনকারী সদস্যের স্বাক্ষরযুক্ত তিন প্রস্ত উপ-আইন।
        </td>
        <td style="width: 15%;">
            <?php
            if ($fileInfo[2] == 1) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/yes.jpg") . '">';
            } elseif ($fileInfo[2] == 0) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/no.jpg") . '">';
            } else {
                echo 'default';
            } ?>
        </td>
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
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/yes.jpg") . '">';
            } elseif ($fileInfo[3] == 0) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/no.jpg") . '">';
            } else {
                echo 'default';
            } ?>
        </td>
    </tr>
    <tr>
        <td>৫</td>
        <td> আবেদনকারী সদস্যের জাতীয় পরিচয়পত্র/জন্মনিবন্ধন সনদ।
        </td>
        <td style="width: 15%;">
            <?php
            if ($fileInfo[4] == 1) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/yes.jpg") . '">';
            } elseif ($fileInfo[4] == 0) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/no.jpg") . '">';
            } else {
                echo 'default';
            } ?>
        </td>
    </tr>
    <tr>
        <td>৬</td>
        <td>প্রস্তাবিত ব্যবস্থাপনা কমিটির সদস্যদের ছবিসহ নামের তালিকা ।
        </td>
        <td style="width: 15%;">
            <?php
            if ($fileInfo[5] == 1) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/yes.jpg") . '">';
            } elseif ($fileInfo[5] == 0) {
                echo '<img style="width:15px; height:15px;" src="' . base_url("uploads/no.jpg") . '">';
            } else {
                echo 'default';
            } ?>
        </td>
    </tr>
</table>
<?php } ?>
<br>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">উপজেলা সমবায় কর্মকর্তার মন্তব্য</h3></td>
    </tr>
</table>
<table class="tbl2" border="1">
    <tr>
        <td>মন্তব্য</td>
        <td style="width: 15%">ফাইল</td>
        <td style="width: 15%">তারিখ</td>
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
<?php } ?>

<?php if($somitee_info[0]['dco_id']!=0){ ?>
 <br>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">জেলা সমবায় কর্মকর্তার মন্তব্য</h3></td>
    </tr>
</table>
<table class="tbl2" border="1">
    <tr>
        <td>মন্তব্য</td>
        <td style="width: 15%">ফাইল</td>
        <td style="width: 15%">তারিখ</td>
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
<?php } ?>
<br>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">সকল কার্যক্রম</h3></td>
    </tr>
</table>
<table class='tbl2' border="1">
    <tr>
        <td>কার্যক্রম</td>
        <td>মন্তব্য</td>
        <td style="width: 15%">তারিখ</td>
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
        <td>উপজেলা সমবায় কর্মকর্তা অনুমোদন            
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
        <td>জেলা সমবায় কর্মকর্তা  <?php
            if ($row['dco_inquiry_verify'] == 1) {
                echo 'অনুমোদন';
            } else if ($row['dco_inquiry_verify'] == 0) {
                echo 'বাতিল';
            }
            ?></td>
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
</table>
</body>
</html>

<?php $this->load->view('layouts/footer'); ?>