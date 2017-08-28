<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.css">
    <style>
        body {
            padding-top: 30px;
            font-family: 'Kalpurush', Arial, sans-serif;
        }

        .certificate .org-name-add {
            position: relative;
        }

        .certificate .org-name-add::after {
            content: '';
            width: 100%;
            display: block;
            height: 16px;
            border-top: 1px dotted #333;
            position: absolute;
            top: 0;
            right: 0;
        }

        .certificate {
            margin-bottom: 32px;
        }

        .certificate p {
            font-size: 18px;
        }

        .certificate .body {
            line-height: 36px;
        }

        .certificate-heading {
            margin-bottom: 32px;
        }

        .certificate .num-border span {
            border: 1px solid #ddd;
            padding-left: 10px;
            padding-right: 10px;
        }

        #image {
            width: 100%;
            height: 350px;
            background-image: url('../../../assets/img/logo.png');
            background-repeat: no-repeat;
            background-position: center;
            /*    border:2px solid;
                border-color:#CD853F;*/
            background-size: 100px 100px;
            position: absolute;
            opacity: 0.16;
            filter: alpha(opacity=50);
            left: 300px;
        }
    </style>
</head>
<body>


<div class="container-fluid" style="border:5px solid black;">

    <div class="col-xs-12 certificate">
        <div class="header">
            <p class="text-center">
                <img style="width:400px;height:80px;margin-top: 5px;"
                     src="<?php echo base_url(); ?>assets/img/gov_logo.png" alt=""></p>
            <p style="margin:0px;padding:0px" class="text-center">জেলা সমবায় কার্যালয়</p>
            <p style="margin:0px;padding-top:-10px"
               class="text-center"><?php echo $sequence = $select_all_info_by_certificate[0]['bn_dist_name']; ?></p>
            <p class="text-center certificate-heading">
                <img style="width:30%;" src="assets/img/certificate_heading.png" alt="">
            </p>

            <div id="image"><img src="<?php echo base_url(); ?>assets/img/govlogo.png" style="width:60%;
    height:400px;
    background-repeat:no-repeat;
    background-position:center;
    margin-left:20%;
background-size: cover;
position: absolute;opacity: 0.1;filter:alpha(opacity=50);
"></div>

            <div class="col-xs-5">
                <p style="font-size: 22px; margin-top:-370px;padding:0px;font-weight: 700;">নিবন্ধন নং: <?php
                    $sequence = $select_all_info_by_certificate[0]['certificate_sequel'];
                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                    $sequence = str_replace(range(0, 9), $bn_digits, $sequence);
                    echo $sequence; ?></p>
            </div>
            <div class="text-right">
                <p style="font-size: 22px;margin-top:-370px;padding:0px;position: relative;"> তারিখঃ
                    <?php
                    $string = $select_all_info_by_certificate[0]['created_at'];
                    $timestamp = strtotime($string);
                    $date = date("d", $timestamp);
                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                    $date = str_replace(range(0, 9), $bn_digits, $date);
                    echo $date; ?>/<?php
                    $string = $select_all_info_by_certificate[0]['created_at'];
                    $timestamp = strtotime($string);
                    $date = date("m", $timestamp);
                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                    $date = str_replace(range(0, 9), $bn_digits, $date);
                    echo $date; ?>/<?php
                    $string = $select_all_info_by_certificate[0]['created_at'];
                    $timestamp = strtotime($string);
                    $date = date("Y", $timestamp);
                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                    $date = str_replace(range(0, 9), $bn_digits, $date);
                    echo $date; ?></p>
            </div>
        </div>
        <div class="col-xs-12 body" style="position: relative;">
            <p style="margin: 0px; padding:0px;position: relative;font-size: 22px;" class="">সমবায় এর নাম ও ঠিকানা :</p>
            <p style="margin: 0px; padding:-5px;position: relative;font-size:30px"
               class="text-center"><?php echo $select_all_info_by_certificate[0]['somitee_name']; ?></p>
            <hr style="margin-top: 0px;margin-bottom: 0px;border: 0;border-top: 1px solid #eee;position: relative;">

            <p style="text-align:center;margin:0px;padding:-5px;position: relative;font-size:22px;"><?php echo $select_all_info_by_certificate[0]['somitee_address']; ?>
                , থানা-<?php echo $select_all_info_by_certificate[0]['bn_upz_name']; ?>,
                জেলা-<?php echo $select_all_info_by_certificate[0]['bn_dist_name']; ?>।</p>
            <hr style="margin-top: 0px;
margin-bottom: 5px;
border: 0;
border-top: 1px solid #eee;">


            <p style="margin: 0px; padding-bottom:-5px;line-height:25px;position: relative;font-size:22px;">এই মর্মে
                প্রত্যয়ন করা যাইতেছে যে, সমবায় সমিতি আইন, ২০০১ (সংশোধীত আইন/২০০২ ও ২০১৩) এর বিধান অনুযায়ী উপরে বর্ণিত
                শিরোনামের সমবায় সমিতি ও উহার উপ-আইনসমূহ যথারীতি আমার কার্যালয়ে নিবন্ধিত হইয়াছে।</p>
            <p style="margin: 0px; padding:0px;font-size: 22px;">সমবায় এর সভ্য নির্বাচনী এলাকা ও কর্মএলাকা নিম্নরূপ
                হইবেঃ </p>


            <p style="margin: 0px; padding:-5px;position: relative;font-size:22px;"
               class="text-center"><?php echo $select_all_info_by_certificate[0]['somitee_area1']; ?></p>
            <hr style="margin-top: 0px;
margin-bottom: 0px;
border: 0;
border-top: 1px solid #eee;">
            <p style="margin: 0px; padding:-5px;position: relative;font-size:22px;"
               class="text-center"><?php echo $select_all_info_by_certificate[0]['somitee_area2']; ?></p>

            <hr style="margin-top: 0px;
margin-bottom: 0px;
border: 0;
border-top: 1px solid #eee;">
            <p style="margin: 0px; padding:0px;position: relative;font-size:22px;">অদ্য <?php
                $string = $select_all_info_by_certificate[0]['created_at'];
                $timestamp = strtotime($string);
                $date = date("Y", $timestamp);
                $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                $date = str_replace(range(0, 9), $bn_digits, $date);
                echo $date; ?> খ্রিস্টাব্দের <?php
                $string = $select_all_info_by_certificate[0]['created_at'];
                $timestamp = strtotime($string);
                $date = date("m", $timestamp);
                $months = array(1 => 'জানুয়ারী', 2 => 'ফেব্রুয়ারী', 3 => 'মার্চ', 4 => 'এপ্রিল', 5 => 'মে', 6 => 'জুন', 7 => 'জুলাই', 8 => 'অগাস্ট', 9 => 'সেপ্টেম্বর', 10 => 'অক্টোবর', 11 => 'নভেম্বর', 12 => 'ডিসেম্বর');
                echo $months[(int)$date];
                ?> মাসের <?php
                $string = $select_all_info_by_certificate[0]['created_at'];
                $timestamp = strtotime($string);
                $date = date("d", $timestamp);
                $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                $date = str_replace(range(0, 9), $bn_digits, $date);
                echo $date; ?> তারিখে আমার সাক্ষর ও সীল প্রদত্ত হইল |</p>
        </div>

        <div class="col-md-4 footer">
            <div class="pull-left">
                <img src="<?php echo base_url(); ?>tes.png">
            </div>
        </div>

        <div class="col-md-8 footer">
            <div class="pull-right">
                <p style="margin-top:-70px;margin-bottom:0px;" class="text-right">
<!--                    <img style="width:150px;height:20px;" src="--><?php //echo base_url(); ?><!--uploads/sign/--><?php //echo $dco_admin_info[0]['sign']; ?><!--">-->
                    <?php
                    if ($dco_admin_info[0]['sign']!=null && file_exists('uploads/sign/' . $dco_admin_info[0]['sign'])) { ?>
                        <img style="width:150px;height:20px;"
                             src="<?= base_url(); ?>uploads/sign/<?= $dco_admin_info[0]['sign']; ?>">
                    <?php } else { ?>
                        <img style="width:150px;height:20px;"
                             src="<?= base_url(); ?>uploads/sign/no-sign.png">
                    <?php }
                    ?>
                </p>
                <p style="margin-top:0px;margin-bottom:0px;"
                   class="text-right"><?php if ($dco_admin_info[0]['admin_designation_id'] == 2) {
                        echo 'ডক অ্যাডমিন';
                    } elseif ($dco_admin_info[0]['admin_designation_id'] == 6) {
                        echo 'জেলা সমবায় অফিসার';
                    } elseif ($dco_admin_info[0]['admin_designation_id'] == 7) {
                        echo 'উপজেলা সমবায় কর্মকর্তা';
                    } ?></p>
                <!--		            <p style="margin-top:0px;margin-bottom:0px;" class="text-right">-->
                <?php //if($dco_admin_info[0]['admin_designation_id']==2){ echo 'ডক অ্যাডমিন'; }elseif($dco_admin_info[0]['admin_designation_id']==6){ echo 'জেলা সমবায় অফিসার'; }elseif($dco_admin_info[0]['admin_designation_id']==7){ echo 'উপজেলা সমবায় কর্মকর্তা'; }?><!--</p>-->
                <p style="margin:0px;padding:0px;"
                   class="text-right"><?php echo $sequence = $select_all_info_by_certificate[0]['bn_dist_name']; ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>