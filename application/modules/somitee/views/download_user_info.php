<?php
//echo '<pre>';
//$res1=json_decode($document[0]['somitee_uploaded_file_name']);
//print_r($res1);
//die();
?>

        <!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী
        বাংলাদেশ সরকার</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public_assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public_assets/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public_assets/css/ripples.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public_assets/css/datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public_assets/css/main.css">
    <!--<noscript><meta http-equiv="refresh" content="0; url=index.php/javascript" /></noscript>-->

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
    <![endif]-->
</head>
<body style="background-image: none">
<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="table-responsive">

            <div class="">

                <!-- Home. Welcome message here
                ==================================================== -->
                <div role="" class="" id="">
                    <div align="right">
                        <h3 style="text-align:center;">সংগঠক-এর তথ্যাবলি</h3>
                    </div>
                    <table width="80%;" align="center" class="table-bordered">
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সংগঠক-এর নাম</td>
                            <td style="padding:5px;font-size:12px"><?php echo $leader_info['0']['user_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size1:4px; width:40%">সংগঠক-এর ভোটার আই ডি</td>
                            <td style="padding:5px;font-size:12px"><?php echo str_replace(range(0,9),$bn_digits,$leader_info['0']['user_nid']); ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সংগঠক-এর ইমেইল</td>
                            <td style="padding:5px;font-size:12px"><?php echo $leader_info['0']['user_email']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সংগঠক-এর ফোন</td>
                            <td style="padding:5px;font-size:12px"><?php echo str_replace(range(0,9),$bn_digits,$leader_info['0']['user_phone']); ?></td>
                        </tr>
                    </table>
                </div>
                <br>
                <div role="" class="" id="">
                    <div align="right">
                        <h3 style="text-align:center;">সমবায় সম্পর্কিত সাধারন তথ্যাবলি</h3>
                    </div>
                    <table width="80%;" align="center" class="table-bordered">

                        <tbody>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সমবায় এর নাম</td>
                            <td style="padding:5px;font-size:12px;"><?php echo $somitee_info['0']['somitee_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সমবায় এর শ্রেণী</td>
                            <td style="padding:5px;font-size:12px;">স্তর: <?php
                                echo $somitee_info['0']['somitee_type_name'];
                                ?>
                                <br/>
                                শ্রেণী:
                                <?php
                                foreach ($somitee_category as $row) {
                                    echo $row['somitee_cat_name'] . '';
                                }
                                ?>                               

                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">কার্যালয়ের ঠিকানা</td>
                            <td style="padding:5px;font-size:12px;">
                                বিভাগ : <?= $somitee_info[0]['bn_div_name']; ?><br/>
                                জেলা : <?= $somitee_info[0]['bn_dist_name']; ?><br/>
                                উপজেলা : <?= $somitee_info[0]['bn_upz_name']; ?><br/>
                                বিস্তারিত : <?= $somitee_info[0]['somitee_address']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সদস্য নির্বাচনী এলাকা</td>
                            <td style="padding:5px;font-size:12px;">
                                বিভাগ : <?= $somitee_info_sodosso[0]['bn_div_name']; ?><br/>
                                জেলা : <?= $somitee_info_sodosso[0]['bn_dist_name']; ?><br/>
                                উপজেলা : <?= $somitee_info_sodosso[0]['bn_upz_name']; ?><br/>
                                বিস্তারিত : <?= $somitee_info_sodosso[0]['somitee_address']; ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সমবায়ের কর্ম এলাকা</td>
                            <td style="padding:5px;font-size:12px;">
                                বিভাগ : <?= $somitee_info[0]['k_div_name']; ?><br/>
                                জেলা : <?= $somitee_info[0]['k_dist_name']; ?><br/>
                                উপজেলা : <?= $somitee_info[0]['k_upz_name']; ?><br/>
                                বিস্তারিত : <?= $somitee_info[0]['somitee_address']; ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">প্রতিটি শেয়ার মূল্য</td>
                            <td style="padding:5px;font-size:12px;"><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price']);
                                echo $output . ' টাকা'; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">প্রস্তাবিত মোট শেয়ার সংখ্যা</td>
                            <td style="padding:5px;font-size:12px;"><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_share']);
                                echo $output . ' টি'; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">প্রস্তাবিত অনুমোদিত মূলধন</td>
                            <td style="padding:5px;font-size:12px"><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['somitee_share']);
                                echo $output . ' টাকা'; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">বিক্রিত শেয়ার সংখ্যা</td>
                            <td style="padding:5px;font-size:12px"><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['sell_share_num']);
                                echo $output . ' টি'; ?></td>
                        </tr>
                        <tr>
                            <td sstyle="padding:5px;font-size:14px; width:40%">পরিশোধিত মূলধন</td>
                            <td style="padding:5px;font-size:12px"><?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num']));
                                echo $output . ' টাকা'; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সমবায়ের উদ্দেশ্য</td>
                            <td style="padding:5px;font-size:12px"><?php echo $somitee_info[0]['somitee_purpose']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;font-size:14px; width:40%">সমবায়ের রেজিস্ট্রেশন তারিখ</td>
                            <td style="padding:5px;font-size:12px"><?php $output = str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]);
                                echo $output; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <pagebreak>
                    <div role="" class="" id="">
                        <div align="right">
                            <h3 style="text-align:center;">সমবায় সম্পর্কিত সকল সদস্যদের তথ্যাবলি</h3>
                        </div>
                        <table width="80%;" align="center" class="table-bordered">
                            <thead>
                            <tr>
                                <td style="width:15%; font-size:14px; padding:5px;">ক্রমিক নং</td>
                                <td style="width:35%; font-size:14px; padding:5px;">সদস্য নাম</td>
                                <td style="width:35%; font-size:14px; padding:5px;">ভোটার আইডি নাম্বার
                                </th>
                            </tr>
                            </thead>

                            <tbody><?php $i = 1;
                            foreach ($somitee_member_info as $row) { ?>
                            <tr>
                                <td style="font-size:12px; padding:5px;">
                                    <p>
                                        <?php
                                        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                        $output = str_replace(range(0, 9), $bn_digits, $i);
                                        $i++;
                                        echo $output;
                                        ?>
                                    </p>
                                </td>
                                <td style="font-size:12px; padding:5px;">
                                    <p><?= $row['member_name'] ?></p>
                                </td>
                                <td style="font-size:12px; padding:5px;">
                                    <p><?= str_replace(range(0,9),$bn_digits,$row['somitee_member_nid']) ?></p>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </pagebreak >
            </div>

        </div>
    </div>
</div>

</body>
