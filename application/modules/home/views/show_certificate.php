<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');

//background-image: url(http://192.185.4.83/~coop/registration/assets/img/Untitled-2.png);background-size:100% 100%;

?>
<style>

    input[type=text]:focus {
        background-color: lightblue;

    }

    [data-tip] {
        position: relative;

    }

    [data-tip]:before {
        content: '';
        /* hides the tooltip when not hovered */
        display: none;
        content: '';
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid #1a1a1a;
        position: absolute;
        top: 30px;
        left: 35px;
        z-index: 8;
        font-size: 0;
        line-height: 0;
        width: 0;
        height: 0;
    }

    input[type=text]:focus {

    }

    [data-tip]:after {
        display: none;
        content: attr(data-tip);
        position: absolute;
        top: 35px;
        left: 0px;
        padding: 5px 8px;
        background: #1a1a1a;
        color: #fff;
        z-index: 9;
        font-size: 0.75em;
        height: 25px;
        line-height: 18px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        white-space: nowrap;
        word-wrap: normal;
    }

    [data-tip]:hover:before,
    [data-tip]:hover:after {
        display: block;
    }
</style>
<div class="container-fluid display-table">
    <div class="row display-table-row">

        <div class="col-md-12 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts_uco_dco/secondary-nav'); ?>
                <div class="col-md-6 col-md-offset-3">

                </div><!-- /col6 -->

                <br><br>
                <form onsubmit="return chk()" id="my_form" name="my_form"
                      action="<?= base_url(); ?>home/update_certificate/<?= $select_all_info_by_certificate[0]['certificate_sequel']; ?>"
                      method="post" enctype="multipart/form-data">
                    <div class='form-group'>
                        <div class='col-md-2 col-md-offset-5'>
                            <h3 style='text-align:center;'>সার্টিফিকেট </h3></div>
                    </div>
                    <div class="col-xs-12 certificate" style="border:5px solid black;">
                        <div class="header">
                            <p class="text-center"><img style="width:400px;height:70px;"
                                                        src="<?php echo base_url(); ?>assets/img/gov_logo.png"
                                                        alt=""></p>
                            <p style="margin:0px;padding:0px;font-size:20px" class="text-center">জেলা সমবায়
                                কার্যালয়</p>
                            <p style="margin:0px;padding-top:-10px;font-size:20px"
                               class="text-center"><?php echo $sequence = $select_all_info_by_certificate[0]['bn_dist_name']; ?></p>
                            <p class="text-center certificate-heading">
                                <img style="width:30%;" src="assets/img/certificate_heading.png" alt="">
                            </p>

                            <div id="image"><img src="<?php echo base_url(); ?>assets/img/govlogo.png" style="width:50%;
    height:420px;
    background-repeat:no-repeat;
    background-position:center;
    margin-left:345px;   
background-size: cover;
position: absolute;opacity: 0.1;filter:alpha(opacity=50);
"></div>

                            <div class="col-xs-5">
                                <p style="font-size:20px">নিবন্ধন নং: <?php
                                    $sequence = $select_all_info_by_certificate[0]['certificate_sequel'];
                                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                    $sequence = str_replace(range(0, 9), $bn_digits, $sequence);
                                    echo $sequence; ?></p>
                            </div>
                            <div class="text-right">
                                <p style="font-size:20px"> তারিখঃ
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
                        <div class="col-xs-12 body" style="position: relative;font-size:20px">
                            <p style=" position: relative;" class="">সমবায় এর নাম ও ঠিকানা</p>
                            <p style=" padding:-5px;position: relative;font-size: 27px"
                               class="text-center"><?php echo $select_all_info_by_certificate[0]['somitee_name']; ?></p>
                            <hr style="margin-top: 0px;margin-bottom: 0px;border: 0;border-top: 1px solid #eee;position: relative;">

                            <p style="text-align:center;position: relative;"><?php echo $select_all_info_by_certificate[0]['somitee_address']; ?>
                                , থানা-<?php echo $select_all_info_by_certificate[0]['bn_upz_name']; ?>,
                                জেলা-<?php echo $select_all_info_by_certificate[0]['bn_dist_name']; ?></p>
                            <hr style="margin-top: 0px;
border: 0;
border-top: 1px solid #eee;">


                            <p style="line-height:20px;position: relative;">এই মর্মে প্রত্যয়ন করা যাইতেছে যে, সমবায়
                                সমিতি আইন, ২০০১ (সংশোধীত আইন/২০০২ ও ২০১৩) এর বিধান অনুযায়ী উপরে বর্ণিত শিরোনামের
                                সমবায় সমিতি ও উহার উপ-আইনসমূহ যথারীতি আমার কার্যালয়ে নিবন্ধিত হইয়াছে।</p>
                            <p>সমবায় এর সভ্য নির্বাচনী এলাকা ও কর্মএলাকা নিম্নরূপ হইবেঃ </p>


                            <p style="position: relative;" class="text-center"
                               data-tip="সমবায় এর সভ্য নির্বাচনী এলাকা পছন্দমত এডিট করুন।"><input autofocus required
                                                                                                  name="somitee_area1"
                                                                                                  style="border: 1px solid red; width: 100%;text-align: center"
                                                                                                  type="text"
                                                                                                  value="<?php echo $select_somitte_kormo_info[0]['bn_dist_name']; ?> জেলার <?php echo $select_somitte_kormo_info[0]['bn_upz_name']; ?> থানায় বসবাসরত শ্রমজীবিদের মধ্যে সীমাবদ্ধ">
                            </p>
                            <hr style="margin-top: 0px;margin-bottom: 0px;border: 0;border-top: 1px solid #eee;">
                            <p style="position: relative;" class="text-center"
                               data-tip="সমবায় এর কর্মএলাকা পছন্দমত এডিট করুন।"><input required name="somitee_area2"
                                                                                       style="border: 1px solid red;width: 100%;text-align: center"
                                                                                       type="text"
                                                                                       value="ও কর্ম এলাকা <?php echo $select_somitte_kormo_info[0]['bn_dist_name']; ?> জেলার <?php echo $select_somitte_kormo_info[0]['bn_upz_name']; ?> থানার মধ্যে সীমাবদ্ধ।">
                            </p>

                            <hr style="margin-top: 0px;margin-bottom: 0px;border: 0;border-top: 1px solid #eee;">
                            <p style=" position: relative;">অদ্য <?php
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
                                echo $date; ?> তারিখে আমার সাক্ষর ও সীল প্রদত্ত হইল।</p>
                        </div>
                        <div class="col-md-4 footer">
                            <div class="pull-left">
                                <img src="<?php echo base_url(); ?>tes.png">
                            </div>
                        </div>

                        <div class="col-md-4 footer">
                            <div class="pull-right">
                                <!--					<img src="--><?php //echo base_url();?><!--tes.png">-->
                                <input type="checkbox" id="check" name="checkbox" value="check"/>
                                <label style="color: red;" for="check">উপরোক্ত প্রদত্ত কর্ম এলাকা ও সভ্য নির্বাচনী
                                    এলাকা সঠিক। </label>
                                <button id="myBtn"
                                        onclick="if(!this.form.checkbox.checked){alert('অনুমোদনের পূর্বে সমবায় এর সভ্য নির্বাচনী এলাকা ও কর্মএলাকা পছন্দমত এডিট করুন এবং ঠিক চিহ্ন দিন।');return false}"
                                        type="submit" class="btn btn-success btn-lg" style="margin: 0px auto;
text-align: center;display: inherit;">অনুমোদন করুন।
                                </button>
                            </div>
                        </div>

                        <div class="col-md-4 footer">
                            <div class="pull-right" style="font-size:20px">
                                <p>
                                    <?php
                                    if ($dco_admin_info[0]['sign'] != null && file_exists('uploads/sign/' . $dco_admin_info[0]['sign'])) { ?>
                                        <img style="width:150px;height:20px;"
                                             src="<?= base_url(); ?>uploads/sign/<?= $dco_admin_info[0]['sign']; ?>">
                                    <?php } else { ?>
                                        <input type="file" name="sign" id="sign" required>
                                        <!--                                            <img style="width:150px;height:20px;"-->
                                        <!--                                                 src="--><?//= base_url(); ?><!--uploads/sign/no-sign.png">-->
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
                                <p style="text-align: right;"><?php echo $sequence = $select_all_info_by_certificate[0]['bn_dist_name']; ?></p>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>


</div>
</div> <!-- /col10 -->
<div class="row">
    <footer id="admin-footer" style="position:relative">
        <p class="text-center">Copyright &copy; 2016. All right resereved</p>
    </footer>
</div><!-- /row -->


<?php $this->load->view('layouts_uco_dco/footer'); ?>
<script>
        function chk() {
            var flag;
            var img_ext = document.getElementById('sign').value;
            //alert(img_ext);
            var ext = img_ext.split('.');
            var img_size = document.getElementById('sign').size;
            //alert(ext[1]);
            if(ext[1] == 'jpg' || ext[1] == 'png')
            {
                flag = true;
            }
            if(img_size < 40200)
            {
                flag=true;
            }
            else
            {
                alert('Image Must Be JPG or PNG Format and Size Must Be Lower Than 40KB');
                flag = false;
            }
            return flag;
        }
        var img_extn = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];
       // console.log('sdghfjsdf');
        var _URL = window.URL || window.webkitURL;
        $('#sign').change(function (e) {
            console.log('change');
            var file, img;
            img = e.target.files[0].height;
            console.log(img);
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function () {
                    imgWidth = this.width;
                    imgHeight = this.height;
                    if (imgWidth != 150 && imgHeight != 40) {
                        alert('Image Size Must be 150 x 40');
                        document.getElementById('myBtn').disabled = true;
                    }
                    else {
                        document.getElementById('myBtn').disabled = false;
                    }

                };
                img.onerror = function () {
                    alert("not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }

        });

        //var _URL = window.URL || window.webkitURL;
</script>
