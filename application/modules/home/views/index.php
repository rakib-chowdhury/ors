<?php //include 'layouts/header.php'; ?>
<?php ?>
        <!-- Main Content
	==================================================== -->
<div class="row">

    <!-- Slider area
    ==================================================== -->
    <div class="col-md-8">
        <div id="main-image-slider" class="panel carousel slide carousel-fade" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo base_url();?>public_assets/img/slide1.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?php echo base_url();?>public_assets/img/slide2.jpg" alt="">
                </div>
            </div>
        </div> <!-- /main-image-slider -->
    </div> <!-- /col8 -->

    <div class="col-md-4">
        <div class="panel tracking" style="padding: 0 15px 0px 15px;">
            <h4 class="label-warning">ফাইল ট্রাকিং</h4>
            <p class="track-help">আপনার আবেদন পত্র এই মুহূর্তে কোন অবস্থায় আছে জানতে রেজিট্রেশনের সময় প্রদানকৃত ট্রাকিং
                নম্বর দিয়ে সার্চ করুন</p>
            <?php
            $exc = $this->session->userdata('message_err');
            if(!empty($exc)){?>
            <strong style="color:red"><?=$exc ?></strong>
            <?php $this->session->unset_userdata('message_err'); ?>
            <?php } ?>
            <?php
            $exc = $this->session->userdata('message_sc');
            if(!empty($exc)){?>
            <strong style="color:green"><?=$exc ?></strong>

            <?php } ?>

            <form action="index.php/home/check_tracking_id" method="post">
                <input type="text" class="form-control" name="tracking_number" placeholder="আপনার ট্রাকিং আইডি লিখুন">
                <button type="submit" class="btn btn-raised btn-success">অনুসন্ধান</button>
            </form>


        </div>
    </div><!-- /col4 -->
</div> <!-- /row -->


<?php  $exc = $this->session->userdata('message_sc');
if(empty($exc)){ ?>
<div class="row">
    <div class="col-md-12">


        <div class="panel instruction">
            <div class="row">
                <a href="<?=base_url();?>login_admin">
                    <div class="col-md-3">
                        <div class="panel tracking" style="padding: 0 15px 0px 15px;min-height: 175px;">
                            <h4 style="background: #009688;text-align: center;" class="label-warning">এডমিন লগইন</h4>
                            <div class="img_div" style="width: 70%;margin: 0 auto">
                                <img style="width: 100%" src="<?= base_url()?>public_assets/img/admin_final.png" alt="">
                            </div>
                        </div>
                    </div><!-- /col4 -->
                </a>

                <a href="<?=base_url();?>home/somitee_re_registration">
                    <div class="col-md-3">
                        <div class="panel tracking" style="padding: 0 15px 0px 15px;min-height: 175px;">
                            <h4 style="background: #009688;text-align: center;" class="label-warning">রি-রেজিস্ট্রেশন </h4>
                            <div class="img_div" style="width: 70%;margin: 0 auto">
                                <img style="width: 100%" src="<?= base_url()?>public_assets/img/somobay_final.png"
                                     alt="">
                            </div>
                        </div>
                    </div><!-- /col4 -->
                </a>


                <a href="<?=base_url();?>">
                    <div class="col-md-3">
                        <div class="panel tracking" style="padding: 0 15px 0px 15px;min-height: 175px;">
                            <h4 style="background: #009688;text-align: center;" class="label-warning">প্রতিবেদন</h4>
                            <div class="img_div" style="width: 70%;margin: 0 auto">
                                <img style="width: 100%" src="<?= base_url()?>public_assets/img/report_final.png"
                                     alt="">
                            </div>
                        </div>
                    </div><!-- /col4 -->
                </a>


                <a href="<?=base_url();?>">
                    <div class="col-md-3">
                        <div class="panel tracking" style="padding: 0 15px 0px 15px;min-height: 175px;">
                            <h4 style="background: #009688;text-align: center;" class="label-warning">ইউজার
                                ম্যানুয়াল </h4>
                            <div class="img_div" style="width: 70%;margin: 0 auto">
                                <a href="<?=base_url();?>form_download/ORS_Manual_User.pdf">
                                    <img style="width: 100%" src="<?= base_url()?>public_assets/img/manual_final.png"
                                         alt="">
                                </a>
                            </div>
                        </div>
                    </div><!-- /col4 -->
                </a>

            </div>

            <?php /* ?>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h2 class="instruction-section-title">সমবায় সম্পর্কিত নোটিশ</h2>
					</div><!-- row -->
				</div>
				<!-- <div class="row instruction">
					<?php foreach($all_notice_info as $row):?>
					<div class="col-md-2 col-md-offset-1 hidden-xs hidden-sm">
						<span class="gnt-ins-icon">
							<img style="margin-top: 30px;" src="<?php echo base_url();?>public_assets/img/icon.png" alt="icon">
						</span>						
					</div>
					<div class="col-md-8">
						<h3><?=$row->notice_title?></h3>
						<p><?=$row->notice_detail?></p>
						<hr>
					</div>
                    <?php endforeach;?>

				</div><!-- /row -->
				<?php */ ?>

            <h2 class="instruction-section-title" style="text-align: center">সমবায় অধিদপ্তর</h2>
            <p style="text-align: justify">সমবায় অধিদপ্তর জনগনের আর্থসামাজিক উন্নয়ন ও দারিদ্র্ হ্রাস করনে সরকারী উদ্যোগ
                বাস্তবায়নের অন্যতম প্রধান সংস্থা। সমবায় অধিদপ্তর স্থানীয় সরকার, পল্লী উন্নয়ন ও সমবায় মন্ত্রণালয়ের
                অধীনস্ত অধিদপ্তর। সমবায় অধিদপ্তরের প্রধান নিবন্ধক ও মহাপরিচালক নামে অভিহিত। উপজেলা, জেলা, বিভাগ ও সদর
                দপ্তর এ ৪ পর্যায়ে এ অধিদপ্তরের কার্যালয় বিস্তৃত। এছাড়া একটি জাতীয় প্রশিক্ষন একাডেমী ও ১০টি আঞ্চলিক সমবায়
                প্রশিক্ষন ইনস্টিটিউট রয়েছে। সমবায় সমিতির নিবন্ধনসহ বিধিগত বিভিন্ন সেবা, আইনগত পরামর্শ এবং উন্নয়ন ও
                সম্প্রসারনমূলক কর্মকান্ডের মাধ্যমে সমবায় আন্দোলনকে সহায়তা করা ও জনগণের আর্থসামাজিক উন্নয়ন নিশ্চিত করা
                সমবায় অধিদপ্তরের মূল কার্যক্রম।
            </p>
           <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <h3 style="margin-top: 30px">এক নজরে সমবায় সমিতি</h3>

            <table class="table table-bordered table-stripped table-hover" style="border: 1px solid #ddd">
                <tr>
                    <td width="50%">জাতীয়</td>
                    <td>২২</td>
                </tr>
                <tr>
                    <td>কেন্দ্রীয়</td>
                    <td>১,১৬০</td>
                </tr>
                <tr>
                    <td>প্রাথমিক</td>
                    <td>১,৮৯,১৮১</td>
                </tr>
                <tr>
                    <td>ব্যক্তি সদস্য</td>
                    <td>১,০৩,৩৩,৩১০</td>
                </tr>
            </table>

            <h3 style="margin-top: 30px">নিজস্ব মূলধন</h3>
            <table class="table table-bordered table-stripped table-hover" style="border: 1px solid #ddd">
                <tr>
                    <td width="50%">শেয়ার</td>
                    <td>৩২৩১.০৮ কোটি</td>
                </tr>
                <tr>
                    <td>সঞ্চয়</td>
                    <td>৫৮২৭.৩০ কোটি</td>
                </tr>
                <tr>
                    <td>সংরক্ষিত তহবিল</td>
                    <td>৭৭০.৯৯ কোটি</td>
                </tr>
                <tr>
                    <td>কার্যকরী মূলধন</td>
                    <td>১১,৯০০.১৭ কোটি</td>
                </tr>
                <tr>
                    <td>বিনিয়োগ</td>
                    <td>১,৫৭০.৭৯ কোটি</td>
                </tr>
                <tr>
                    <td>কর্মসংস্থান</td>
                    <td>৫,০২,৩৩০ জন</td>
                </tr>
            </table>
        </div>
    </div>
</div><!-- /row -->

<?php $this->session->unset_userdata('message_sc'); ?>

<?php } ?>

<?php  $exc = $this->session->userdata('message_sc');
if(!empty($exc)){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel instruction">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="instruction-section-title">সমবায় সম্পর্কিত বিস্তারিত তথ্য।</h2>
                </div><!-- row -->
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#org-info" aria-controls="org-info" role="tab"
                                                          data-toggle="tab">সমবায়ের সাধারণ তথ্য</a></li>
                <li role="presentation"><a href="#registered-org-mem-info" aria-controls="registered-org-mem-info"
                                           role="tab" data-toggle="tab">সমবায়ের সদস্য</a></li>
            </ul>

            <div class="tab-content">

                <!-- Home. Welcome message here
                ==================================================== -->
                <div role="tabpanel" class="tab-pane active" id="org-info">

                    <table class="table table-striped table-hover table-bordered">
                        <tbody>
                        <tr>
                            <td>সমবায় সংগঠকের নামঃ</td>
                            <td><?=$result[0]['user_name'];?></td>
                        </tr>
                        <tr>
                            <td>সমবায় সংগঠকের ফোন নাম্বারঃ</td>
                            <td>
                                <p>
                                    <?php
                                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                    $output = str_replace(range(0, 9), $bn_digits, $result[0]['user_phone']);
                                    echo $output;
                                    ?>
                                </p>
                        </tr>
                        <tr>
                            <td>সমবায় সংগঠকের ভোটার আইডিঃ</td>
                            <td><?=$result[0]['user_nid'];?></td>
                        </tr>
                        <tr>
                            <td>সমবায়ের নামঃ</td>
                            <td><?=$result[0]['somitee_name'];?></td>
                        </tr>
                        <tr>
                            <td>সমবায়ের শ্রেনীঃ</td>
                            <td><?php if ($result[0]['somitee_sub_cat_name'] != NULL) {
                                    echo $result[0]['somitee_sub_cat_name'] . ',';
                                }?>   <?php if ($result[0]['somitee_cat_name'] != NULL) {
                                    echo $result[0]['somitee_cat_name'] . ',';
                                }?> <?=$result[0]['somitee_type_name'];?></td>
                        </tr>
                        <tr>
                            <td>সমবায়ের ঠিকানাঃ</td>
                            <td><?=$result[0]['somitee_address'];?>, <?=$result[0]['bn_upz_name'];?>
                                , <?=$result[0]['bn_dist_name'];?>, <?=$result[0]['bn_div_name'];?></td>
                        </tr>
                        <tr>
                            <td>সমবায়ের কর্ম এলাকাঃ</td>
                            <td><?=$result[0]['somitee_address'];?>, <?=$somitee_kormo_info[0]['bn_upz_name'];?>
                                , <?=$somitee_kormo_info[0]['bn_dist_name'];?>
                                , <?=$somitee_kormo_info[0]['bn_div_name'];?></td>
                        </tr>
                        <tr>
                            <td>সমবায়ের শেয়ারঃ</td>
                            <td>
                                <?php
                                $output = str_replace(range(0, 9), $bn_digits, $result[0]['somitee_share']);
                                echo $output;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>সমবায়ের শেয়ার মূল্যঃ</td>
                            <td>
                                <?php
                                $output = str_replace(range(0, 9), $bn_digits, $result[0]['somitee_per_share_price']);
                                echo $output;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>সমবায়ের শেয়ার মূলধনঃ</td>
                            <td>
                                <?php
                                $output = str_replace(range(0, 9), $bn_digits, $result[0]['sell_share_num']);
                                echo $output;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>সমবায়ের উদ্দেশ্যঃ</td>
                            <td><?=$result[0]['somitee_purpose'];?></td>
                        </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <div class="panel">
                        সমবায়ের বর্তমান অবস্থা : <span class="label label-success">
                                          <?php
                            if ($result[0]['somitee_status'] == 0 && $result[0]['division_id'] == 0) {
                                echo "সমবায়ের  নাম নিবন্ধন পর্যায় ";
                            } elseif ($result[0]['somitee_status'] == 0 && $result[0]['division_id'] <> 0) {
                                echo " সমবায়ের নাম নিবন্ধন পর্যায় ( সংশোধন )";
                            } elseif ($result[0]['somitee_status'] == 5) {
                                echo "সমবায় নিবন্ধন বাতিল ";
                            } elseif ($result[0]['somitee_status'] == 1) {
                                echo "সমবায় নিবন্ধন সফল ";
                            } elseif ($result[0]['somitee_status'] == 2 && $result[0]['somitee_track_id'] == '' && $result[0]['uco_id'] == 0 && $result[0]['dco_id'] == 0) {
                                echo "সমবায়ের নাম  নিবন্ধন সফল ";
                            } elseif ($result[0]['somitee_status'] == 2 && $result[0]['somitee_track_id'] != '' && $result[0]['uco_id'] == 0 && $result[0]['dco_id'] == 0) {
                                echo "উপজেলা সমবায় অফিসার কর্তৃক পর্যবেক্ষণ ";
                            } elseif ($result[0]['somitee_status'] == 2 && $result[0]['somitee_track_id'] != '' && $result[0]['uco_id'] <> 0 && $result[0]['dco_id'] == 0) {
                                echo "জেলা সমবায় অফিসার কর্তৃক পর্যবেক্ষণ ";
                            } else {
                                echo $result[0]['somitee_status'];
                            }

                            ?></span>
                    </div>

                </div> <!-- /tabpanel -->

                <!-- Member Information here
                ==================================================== -->
                <div role="tabpanel" class="tab-pane" id="registered-org-mem-info" style="margin-top: 30px">
                    <div class="table-responsive">
                        <table id="org-emp-list-table" class="table table-striped table-bordered" cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align:center;">ক্রমিক</th>
                                <th style="text-align:center;">সমবায় সদস্যদের নাম</th>
                                <th style="text-align:center;">সমবায় সদস্যদের ভোটার আইডি</th>
                            </tr>
                            </thead>
                            <tbody><?php $i = 1;
                            foreach ($somitee_member_info as $row) { ?>
                            <tr>
                                <td>
                                    <p>
                                        <?php
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
                                    <p><?= $row['somitee_member_nid'] ?></p>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /col -->
                </div>
            </div>

        </div>
    </div>
</div><!-- /row -->
<?php $this->session->unset_userdata('message_sc'); ?>
<?php } ?>
<?php $this->load->view('public_layouts/footer'); ?>

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