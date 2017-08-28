<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <style>
        table td{
          //font-size:12px;
        }
        .report_head td {         
          text-align: center;        
        }

        .table_head {
          border: 1px solid black;
          margin-bottom:5px;
          width:100%;
          text-align: center
        }
         .tbl_td {
            text-align: center;
            font-size: 22px;
        }

        .table1{
             border-collapse: collapse;
             width: 100%; 
             margin: 0px; 
             padding: 0px; 
             text-align: center
        }
        .table1 td{
              border: .5px solid black;
        }
        .h_td {
            text-align: center;
            font-size: 16px; 
            color:black;
        }

        .f_td {
            padding:0px;
            margin-bottom:0px;
            text-align: center;
            font-size: 30px;
        }

        .s_td {
            padding:0px;
            padding-top:-10px;
            margin-bottom:0px;
            text-align: center;
            font-size: 26px;
        }
        .ss_td {
            padding:0px;
            padding-top:-8px;
            margin-bottom:0px;
            text-align: center;
        }

        .tt_td {
            text-align: center;
            font-size: 24px;
        }

        .t_td {
            padding-top:-5px;
            text-align: center;
            font-size: 22px;
        }

        .p_tag {
            padding-top:-5px;
            font-size: 18px;
        }
        .val_td{
            color:#292929;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী
        বাংলাদেশ সরকার</title>
</head>

<body>

<table  align="center" class="report_head" >
    <tr >
        <td class="f_td">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</td>
    </tr>
    <tr>
        <td class="s_td">সমবায় অধিদপ্তর</td>
    </tr>
    <tr>
        <td class="ss_td">www.coop.gov.bd</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td class="tt_td">সমবায় সমিতি অনলাইন নিবন্ধন ব্যবস্থাপনা</td>
    </tr>
    <tr>
        <td class="t_td">নিবন্ধন প্রতিবেদন <?php echo $msg;?></td>
    </tr>
    <tr>
        <td class="p_tag"><?php echo $msg1;?></td>
    </tr>

</table>

<br>
<table class="table_head" align="center">
    <tr>
        <td class="tbl_td">বিভাগীয় প্রতিবেদন</td>
    </tr>
</table>
<table align="center" class="table1" >
    <tr>
        <td class="h_td">বিভাগের নাম</td>
        <td class="h_td">নিবন্ধন প্রদান</td>
        <td class="h_td">চলমান আবেদন</td>
        <td class="h_td">বাতিল আবেদন</td>
        <td class="h_td" >আপিল আবেদন</td>
        <td class="h_td" >মোট আবেদন</td>
        <td class="h_td" >পুরুষ সদস্য সংখ্যা</td>
        <td class="h_td" >নারী সদস্য সংখ্যা</td>
        <td class="h_td" >মোট সদস্য সংখ্যা</td>
        <td class="h_td" >পরিশোধিত মূলধন</td>
    </tr>
    <?php $slct_smt=0; $rjct_smt=0; $appl_smt=0; $crr_smt=0; $ttl_smt=0; $male=0; $female=0; $ttl=0; $rev=0;
    foreach ($report_info_all as $key => $r) { ?>
        <tr>
            <td class="h_td"><?= $r['div_info']['selected']['bn_div_name']; ?></td>
            <td class="val_td">
                <?php 
                $res = $r['div_info']['selected']['somitee'];
                $slct_smt +=$res;
                if ($res == 0) {
                    echo '-';
                } else {
                    echo str_replace(range(0, 9), $bn_digits, $res);
                }
                ?>
            </td>
            <td class="val_td">
                <?php
                $res = $r['div_info']['ongoing']['somitee'];
                $crr_smt +=$res;
                if ($res == 0) {
                    echo '-';
                } else {
                    echo str_replace(range(0, 9), $bn_digits, $res);
                }
                ?>
            </td>
            <td class="val_td">
                <?php
                $res = $r['div_info']['reject']['somitee'];
                $rjct_smt +=$res;
                if ($res == 0) {
                    echo '-';
                } else {
                    echo str_replace(range(0, 9), $bn_digits, $res);
                }
                ?>
            </td>
            <td class="val_td">
                <?php
                $res = $r['div_info']['appeal']['somitee'];
                $appl_smt +=$res;
                if ($res == 0) {
                    echo '-';
                } else {
                    echo str_replace(range(0, 9), $bn_digits, $res);
                }
                ?>
            </td>
            <td class="val_td">
                <?php
                $res = $r['div_info']['all']['somitee'];
                $ttl_smt +=$res;
                if ($res == 0) {
                    echo '-';
                } else {
                    echo str_replace(range(0, 9), $bn_digits, $res);
                }
                ?>
            </td>
            <td class="val_td"><?php
                $res =$r['div_info']['selected']['m'];
                $male+=$res;
                if($res==0){
                    echo '-';
                }else{
                    echo str_replace(range(0,9),$bn_digits,$res);
                }
                ?>
            </td>
            <td class="val_td">
                <?php
                $res= $r['div_info']['selected']['f'];
                $female+=$res;
                if($res==0){
                    echo '-';
                }else{
                    echo str_replace(range(0,9),$bn_digits,$res);
                }
                ?>
            </td>
            <td class="val_td">
                <?php
                 $res=$r['div_info']['selected']['s'];
                $ttl+=$res;
                if($res==0){
                    echo '-';
                }else{
                    echo str_replace(range(0,9),$bn_digits,$res);
                }
                ?>
            </td>
            <td class="val_td">
                <?php
                $res= $r['div_info']['selected']['b'];
                $rev+=$res;
                if($res==0){
                    echo '-';
                }else{
                    echo str_replace(range(0,9),$bn_digits,$res);
                }
                ?>
            </td>

        </tr>
    <?php } ?>
          <tr>
            <td class="h_td"><?= 'মোট'; ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$slct_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$crr_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$rjct_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$appl_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$ttl_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$male); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$female); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$ttl); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$rev); ?></td>

        </tr>
    
</table>

<br>
<table class="table_head" align="center" style="text-align: center">
    <tr>
        <td class="tbl_td">জেলা প্রতিবেদন</td>
    </tr>
    <tr>
        <td>(শুধু মাত্র যে জেলাগুলোতে অনলাইন নিবন্ধন হয়েছে)</td>
    </tr>
</table>
<table align="center" class="table1" >
    <tr>
        <td class="h_td">জেলার নাম</td>
        <td class="h_td">নিবন্ধন প্রদান</td>
        <td class="h_td">চলমান আবেদন</td>
        <td class="h_td">বাতিল আবেদন</td>
        <td class="h_td">আপিল আবেদন</td>
        <td class="h_td">মোট আবেদন</td>
        <td class="h_td">পুরুষ সদস্য সংখ্যা</td>
        <td class="h_td">নারী সদস্য সংখ্যা</td>
        <td class="h_td">মোট সদস্য সংখ্যা</td>
        <td class="h_td">পরিশোধিত মূলধন</td>
    </tr>
    <?php $slct_smt=0; $rjct_smt=0; $appl_smt=0; $crr_smt=0; $ttl_smt=0; $male=0; $female=0; $ttl=0; $rev=0;
    foreach ($report_info_all as $key => $r) {
        foreach ($r['dist_info'] as $dist) { ?>
            <tr>
                <td><?= $dist['selected']['bn_dist_name']; ?></td>
                <td class="val_td">
                    <?php
                    $res = $dist['selected']['somitee'];
                    $slct_smt +=$res;
                    if ($res == 0) {
                        echo '-';
                    } else {
                        echo str_replace(range(0, 9), $bn_digits, $res);
                    }
                    ?>
                </td>
                <td class="val_td">
                    <?php
                    $res = $dist['ongoing']['somitee'];
                    $crr_smt +=$res;
                    if ($res == 0) {
                        echo '-';
                    } else {
                        echo str_replace(range(0, 9), $bn_digits, $res);
                    }
                    ?>
                </td>
                <td class="val_td">
                    <?php
                    $res = $dist['reject']['somitee'];
                    $rjct_smt +=$res;
                    if ($res == 0) {
                        echo '-';
                    } else {
                        echo str_replace(range(0, 9), $bn_digits, $res);
                    }
                    ?>
                </td>
                <td class="val_td">
                    <?php
                    $res = $dist['appeal']['somitee'];
                    $appl_smt +=$res;
                    if ($res == 0) {
                        echo '-';
                    } else {
                        echo str_replace(range(0, 9), $bn_digits, $res);
                    }
                    ?>
                </td>
                <td class="val_td">
                    <?php
                    $res = $dist['all']['somitee'];
                    $ttl_smt +=$res;
                    if ($res == 0) {
                        echo '-';
                    } else {
                        echo str_replace(range(0, 9), $bn_digits, $res);
                    }
                    ?>
                </td>
                <td class="val_td"><?php
                    $res =$dist['selected']['m'];
                    $male +=$res;
                    if($res==0){
                        echo '-';
                    }else{
                        echo str_replace(range(0,9),$bn_digits,$res);
                    }
                    ?>
                </td>
                <td class="val_td">
                    <?php
                    $res= $dist['selected']['f'];
                    $female +=$res;
                    if($res==0){
                        echo '-';
                    }else{
                        echo str_replace(range(0,9),$bn_digits,$res);
                    }
                    ?>
                </td>
                <td class="val_td">
                    <?php
                    $res=$dist['selected']['s'];
                    $ttl +=$res;
                    if($res==0){
                        echo '-';
                    }else{
                        echo str_replace(range(0,9),$bn_digits,$res);
                    }
                    ?>
                </td>
                <td class="val_td">
                    <?php
                    $res= $dist['selected']['b'];
                    $rev +=$res;
                    if($res==0){
                        echo '-';
                    }else{
                        echo str_replace(range(0,9),$bn_digits,$res);
                    }
                    ?>
                </td>

            </tr>
        <?php } ?>
    <?php } ?>

          <tr>
            <td class="h_td"><?= 'মোট'; ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$slct_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$crr_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$rjct_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$appl_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$ttl_smt); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$male); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$female); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$ttl); ?></td>
            <td class="val_td"><?= str_replace(range(0,9),$bn_digits,$rev); ?></td>

        </tr>
</table>
<!--
<br>
<table class="table_head" align="center">
    <tr>
        <td class="tbl_td">লেখচিত্র</td>
    </tr>
</table>
<table class="table_head" align="center">
    <tr>
        <td>
        </td>
    </tr>
</table>
-->
</body>