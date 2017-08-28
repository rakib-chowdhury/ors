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
<table align="center" style="text-align: center">
    <tr>
        <td><p style="font-size:20px">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</p></td>
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
        <td>শ্রেণী:
            <?php
            echo $somitee_info['0']['somitee_type_name'];
            ?>
            <br>
            প্রকৃতি:
            <?php
            if ($somitee_info[0]['somitee_cat_id'] == 0) {
                echo ' প্রযোজ্য নহে';
            } else {
                foreach ($somitee_category as $row) {
                    echo $row['somitee_cat_name'];
                }
            }
            ?>
            <br>
            প্রকার:
            <?php
            if ($somitee_info[0]['somitee_cat_id'] == 0) {
                echo ' প্রযোজ্য নহে';
            } else {
                foreach ($somitee_sub_category as $row) {
                    echo $row['somitee_sub_cat_name'];
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
        <td><h3 style="text-align:center;">সমবায় এর ব্যবস্থাপনা কমিটির তথ্য</h3></td>
    </tr>
</table>
<table class="tbl2" border="1">
    <tr>
        <td style="width: 8%">ক্রমিক নং</td>
        <td>সদস্য নাম</td>
        <td>মোবাইল নং</td>
    </tr>
    <?php $i = 1;
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
</table>
<br>
<table class="tbl">
    <tr>
        <td><h3 style="text-align:center;">সকল কার্যক্রম</h3></td>
    </tr>
</table>
<table class='tbl2' border="1">
    <tr>
        <td>কার্যক্রম</td>
        <td>কর্মকর্তা কর্মচারীর নাম</td>
        <td style="width: 15%">তারিখ</td>
    </tr>
    <tr>
        <td>সমবায় রেজিস্ট্রেশন</td>
        <td><?= $somitee_added_info[0]['admin_name'] ?></td>
        <td><?= str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]) ?></td>
    </tr>
</table>
</body>
</html>

<?php $this->load->view('layouts/footer'); ?>