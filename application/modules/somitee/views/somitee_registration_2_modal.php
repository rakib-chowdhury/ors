<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<?php $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'); ?>
<div id="load_img" style="position: absolute;z-index: 1000;top: 50%;left: 40%;display: none"><img
            src="<?=base_url();?>public_assets/upload2.gif" alt=""></div>
<style>
    .fixed_width {
        width;
        32% !important;
        overflow: hidden;
        white-space: nowrap;
    }

    .fixed_width_tr {
        width;
        100% !important;
    }

</style>
<div class="row" id="page_content_opacity">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">প্রস্তাবিত সমবায় নিবন্ধনের প্রাথমিক আবেদন</h1>
        <form method="post" onsubmit="return close_modal()"
              action="<?php echo site_url('somitee/somitee_registration_post'); ?>"
              class="form-horizontal panel reg-form-2">
            <input type="hidden" name="s_reg2" value="1">


            <?php //echo $share_price;?>
            <?php //echo $share_qty;?>
            <?php //echo $sell_share_num;?>


            <fieldset>

                <legend>সমবায় এর সদস্য সংখ্যা</legend>
                <div class="form-group">
                    <label for="org_mem_qty" class="col-md-2 control-label">সদস্য সংখ্যা</label>
                    <div class="col-md-2">
                        <input onkeyup="addFields();upload_tmp_file()" placeholder="পুরুষ সদস্য সংখ্যা"
                               <?php if($all_tmp_data[0]['member_number_male']!=0){?> value="<?=str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['member_number_male']);?>"
                               <?php }?> type="text" name="member_number_male" id="member0" class="form-control"
                               required>
                        <span style="color: peru;">পুরুষ সদস্য সংখ্যা</span>
                        <!--                        <span class="help-block">সর্বমোট সদস্য সংখ্যা কমপক্ষে ২০ জন হতে হবে।</span>-->
                    </div>
                    <label for="org_mem_qty" class="col-md-1 control-label">+</label>
                    <div class="col-md-2">
                        <input onkeyup="addFields();upload_tmp_file()" type="text" placeholder="মহিলা সদস্য সংখ্যা"
                               <?php if($all_tmp_data[0]['member_number_female']!=0){?> value="<?=str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['member_number_female']);?>"
                               <?php } ?> name="member_number_female" id="member1" class="form-control" required>

                        <!--                        <span class="help-block">সর্বমোট সদস্য সংখ্যা কমপক্ষে ২০ জন হতে হবে।</span>-->
                        <span style="color: peru;">মহিলা সদস্য সংখ্যা</span>
                    </div>
                    <label for="org_mem_qty" class="col-md-1 control-label">=</label>
                    <div class="col-md-3">
                        <!-- <input type="hidden" name="mem_update[]" value="1"> -->

                        <?php if(isset($all_tmp_data[0]['member_number_female'])) {
                        $i = 0;
                        $i = $all_tmp_data[0]['member_number_female'] + $all_tmp_data[0]['member_number_male'];
                        //                             $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                        $output = str_replace(range(0, 9), $bn_digits, $i);
                        }
                        ?>
                        <input readonly onfocus="addFields()" type="text" placeholder="সর্বমোট সদস্য সংখ্যা"
                               <?php if(isset($all_tmp_data[0]['member_number_female']) || isset($all_tmp_data[0]['member_number_male'])){?> value="<?=$output;?>"
                               <?php }?> id="member2" class="form-control" required>
                        <!--                    <span class="help-block">আবশ্যক। কমপক্ষে ২০ জন হতে হবে।</span>-->
                        <input type="hidden" id="member2_final"
                               <?php if(isset($all_tmp_data[0]['member_number_female']) || isset($all_tmp_data[0]['member_number_male'])){?> value="<?=($all_tmp_data[0]['member_number_female']+$all_tmp_data[0]['member_number_male']);?>"
                               <?php }?> name="member">
                        <span id="member_number_err" style="display: none;color: red;font-size: 14px">সর্বমোট সদস্য সংখ্যা কমপক্ষে ২০ জন হতে হবে।</span>
                    </div>

                </div>
                <br><br>
                <span id="error_info" style="color: red;margin-left: 25%"></span>

                <table id='asd' onkeyup="" class="table table-bordered">
                    <tr>
                        <th style="text-align: center;">ক্রমিক নং</th>
                        <th style="text-align: center;">সদস্যদের নাম</th>
                        <th style="text-align: center;">সদস্যদের জাতীয় পরিচয়পত্র নম্বর <span class="help-block">এন আই ডি ১৩ সংখ্যার হলে শুরুতে ৪ সংখ্যার জন্মসাল যোগ করুন</span>
                        </th>
                    </tr>
                </table>
            </fieldset>
            <br>

            <fieldset>
                <span id="error_info2" style="color: red;margin-left: 25%"></span>
                <legend>সমবায় গঠনের উদ্দেশ্য</legend>
                <div style="text-align:center; margin-top:7px;">
                    <span class="label label-danger" style="text-align:center; color:whitesmoke">সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন</span>
                </div>
                <div class="form-group">
                    <div class="col-md-12">                       
                        <textarea onblur="myclick();upload_tmp_file()" onfocus="upload_tmp_file()"
                                  onkeyup="upload_tmp_file()" name="purpose" id="purpose" rows="5" class="form-control"
                                  placeholder="সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন"
                                  required>
                            <?php if(isset($all_tmp_data[0]['somitee_purpose']) && $all_tmp_data[0]['somitee_purpose']!=null && $all_tmp_data[0]['somitee_purpose']!=""){?> <?=$all_tmp_data[0]['somitee_purpose'];?><?php } else{ echo '';}?>
                        </textarea>
                        <p id="wordCount" class="pull-right"> ০/২৫০ শব্দ</p>
                        <!--<span class="help-block">সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন</span>-->
                        <span id="errMSG" style="color:red;"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id='lst_chk' required> উপরের প্রদত্ত সকল তথ্য সঠিক
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <a href="<?php echo site_url('somitee/somitee_registration'); ?>"
                           class="btn btn-default btn-raised pull-right btn-block">পূর্বের পৃষ্ঠা সংশোধন করুন</a>
                    </div>
                    <div class="col-md-4" id="Sbtn">
                        <a onclick="table_nid()" class="btn btn-primary btn-raised pull-left btn-lg btn-block"
                           data-toggle="modal"
                           data-target="#myModal">আবেদনটি দেখুন</a>

                    </div>
                </div>
            </fieldset>


    </div>
</div><!-- /row -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width: 55%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #40C6A0;padding-top: 11px;color: #ffffff;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" style="text-align: center">তথ্য সংক্ষেপ</h3>
            </div>
            <div class="modal-body">
                <h3 style="text-align:center;text-decoration:underline;"><b>সমবায় এর প্রাথমিক তথ্য</b></h3>
                <table class="table table-striped table-hover"
                       style="width: 80%;margin: 0 auto;border: 1px solid #ccc;">
                    <tbody>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">সমবায় এর নাম</td>
                        <td><?php if(isset($all_tmp_data[0]['somitee_name'])){?> <?=$all_tmp_data[0]['somitee_name'];?><?php }?></td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">সমবায় এর শ্রেণী</td>
                        <td>স্তর:
                            <?php
                            if(isset($all_tmp_data[0]['somitee_type_id'])){
                            echo $all_tmp_data[0]['somitee_type_name'];
                            }
                            ?>
                            <br>
                            শ্রেণী:
                            <?php
                            if(isset($all_tmp_data[0]['somitee_type_id']))
                            {
                                foreach ($somitee_cat as $row_cat){
                                    if ($all_tmp_data[0]['somitee_cat_id'] == $row_cat['somitee_cat_id']){
                                        echo $row_cat['somitee_cat_name'];
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">কার্যালয়ের ঠিকানা</td>
                        <td>
                            বিভাগ:
                            <?php foreach ($division as $row) {
                            if (isset($all_tmp_data[0]['somitee_div_id'])) {
                            if ($all_tmp_data[0]['somitee_div_id'] == $row['div_id']) {
                            echo $row['bn_div_name'];
                            }
                            }
                            } ?>

                            <br>
                            জেলা:
                            <?php foreach ($district as $row) {
                            if (isset($all_tmp_data[0]['somitee_dist_id'])) {
                            if ($all_tmp_data[0]['somitee_dist_id'] == $row['dist_id']) {
                            echo $row['bn_dist_name'];
                            }
                            }
                            } ?>
                            <br>
                            উপজেলা:
                            <?php foreach ($upz as $row) {
                            if (isset($all_tmp_data[0]['somitee_upz_id'])) {
                            if ($all_tmp_data[0]['somitee_upz_id'] == $row['upz_id']) {
                            echo $row['bn_upz_name'];
                            }
                            }
                            } ?>


                            <br>
                            ইউনিয়ন/ওয়ার্ড:
                            <?php if(isset($all_tmp_data[0]['somitee_ward'])){ echo $all_tmp_data[0]['somitee_ward'];} ?>


                            <br>
                            বিস্তারিত:
                            <?php if(isset($all_tmp_data[0]['others'])){ echo $all_tmp_data[0]['others'];} ?>


                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">সদস্য নির্বাচনী এলাকা</td>

                        <td>
                            বিভাগ:
                            <?php foreach ($somitee_sodosso_division as $row) {

                            if (isset($all_tmp_data[0]['sodosso_division'])) {
                            if ($all_tmp_data[0]['sodosso_division'] == $row['div_id']) {
                            echo $row['bn_div_name'];
                            }
                            }
                            } ?>
                            <br>
                            জেলা:
                            <?php foreach ($somitee_sodosso_district as $row) {
                            if (isset($all_tmp_data[0]['sodosso_district'])) {
                            if ($all_tmp_data[0]['sodosso_district'] == $row['dist_id']) {
                            echo $row['bn_dist_name'];
                            }
                            }
                            } ?>
                            <br>
                            উপজেলা:
                            <?php foreach ($somitee_sodosso_upz as $row) {
                            if (isset($all_tmp_data[0]['sodosso_upz'])) {
                            if ($all_tmp_data[0]['sodosso_upz'] == $row['upz_id']) {
                            echo $row['bn_upz_name'];
                            }
                            }
                            } ?>

                            <br>
                            বিস্তারিত:
                            <?php  if (isset($all_tmp_data[0]['elected_ward_name'])) { echo $all_tmp_data[0]['elected_ward_name'];} ?>

                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">সমবায় এর কর্ম এলাকা</td>
                        <td>
                            বিভাগ:
                            <?php foreach ($sodosso_kormo_division as $row) {

                            if (isset($all_tmp_data[0]['somitee_kormo_div_id'])) {
                            if ($all_tmp_data[0]['somitee_kormo_div_id'] == $row['div_id']) {
                            echo $row['bn_div_name'];
                            }
                            }
                            } ?>
                            <br>
                            জেলা:
                            <?php foreach ($sodosso_kormo_district as $row) {

                            if (isset($all_tmp_data[0]['somitee_kormo_dist_id'])) {
                            if ($all_tmp_data[0]['somitee_kormo_dist_id'] == $row['dist_id']) {
                            echo $row['bn_dist_name'];
                            }
                            }


                            } ?>
                            <br>
                            উপজেলা:
                            <?php foreach ($sodosso_kormo_upz as $row) {

                            if (isset($all_tmp_data[0]['somitee_kormo_upz_id'])) {
                            if ($all_tmp_data[0]['somitee_kormo_upz_id'] == $row['upz_id']) {
                            echo $row['bn_upz_name'];
                            }
                            }
                            } ?>

                            <br>
                            বিস্তারিত:
                            <?php  if (isset($all_tmp_data[0]['kormo_elected_ward_name'])) { echo  $all_tmp_data[0]['kormo_elected_ward_name'];} ?>

                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">প্রতিটি শেয়ার মূল্য</td>
                        <td>
                            <?php if (isset($all_tmp_data[0]['somitee_per_share_price'])) {
                            $output = str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['somitee_per_share_price']);
                            echo $output . ' টাকা';

                            } ?>
                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">প্রস্তাবিত মোট শেয়ার সংখ্যা</td>
                        <td>
                            <?php if (isset($all_tmp_data[0]['somitee_share'])) {
                            $output = str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['somitee_share']);
                            echo $output . ' টি';

                            } ?>
                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">প্রস্তাবিত অনুমোদিত মূলধন</td>
                        <td>
                            <?php
                            $per_share_price = $all_tmp_data[0]['somitee_per_share_price'];
                            $share_number = $all_tmp_data[0]['somitee_share'];


                            $per_share_price = str_replace($bn_digits, $en_digits, $per_share_price);
                            $share_number = str_replace($bn_digits, $en_digits, $share_number);

                            $total = $per_share_price * $share_number;
                            $output = str_replace(range(0, 9), $bn_digits, $total);
                            echo $output . ' টাকা'; ?>
                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">বিক্রিত শেয়ার সংখ্যা</td>

                        <td>
                            <?php if (isset($all_tmp_data[0]['sell_share_num'])) {
                            $output = str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['sell_share_num']);
                            echo $output . ' টি';

                            } ?>
                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">পরিশোধিত মূলধন</td>
                        <td>
                            <?php
                            $per_share_price = $all_tmp_data[0]['somitee_per_share_price'];
                            $share_number = $all_tmp_data[0]['sell_share_num'];


                            $per_share_price = str_replace($bn_digits, $en_digits, $per_share_price);
                            $share_number = str_replace($bn_digits, $en_digits, $share_number);

                            $total = $per_share_price * $share_number;
                            $output = str_replace(range(0, 9), $bn_digits, $total);
                            echo $output . ' টাকা'; ?>

                        </td>
                    </tr>
                    <tr class="fixed_width_tr">
                        <td class="fixed_width">সমবায় এর উদ্দেশ্য</td>
                        <td>

                            <span id="purpose_of_somobay"></span>

                        </td>
                    </tr>

                    </tbody>
                </table>
                <div style="width: 80%;margin: 0 auto;">
                    <br>
                    <h3 style="text-align:center;text-decoration:underline;"><b>সমবায় এর সদস্যদের
                            তথ্যাবলি</b></h3>
                    <table id="member_of_somobay" width="100%;" align="center" class="table-bordered">
                        <tr>
                            <th style="text-align: center;">ক্রমিক নং</th>
                            <th style="text-align: center;">সদস্যদের নাম</th>
                            <th style="text-align: center;">সদস্যদের জাতীয় পরিচয়পত্র নং</th>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="modal-footer" style="width:78%;margin:0 auto;">

                <a class="btn btn-danger btn-raised pull-left" data-dismiss="modal">বাতিল করুন </a>
                <input name="all_clear" type="submit" class="btn btn-success btn-raised pull-right"
                       value="সাবমিট করুন"/>
            </div>
        </div>

        </form>
    </div>
</div>

<?php $sp=5;?>;
<?php $this->load->view('public_layouts/footer'); ?>

<script>

    $(document).ready(function () {
        $('#asd').hide();
    });
    $(document).ready(function () {
                <?php if(isset($all_tmp_data[0]['member_number_female'])){?>
        var number_modify =
        <?=$all_tmp_data[0]['member_number_female']+$all_tmp_data[0]['member_number_male'];?>

        if (number_modify >= 20 && number_modify <= 500) {
            addField2(number_modify);
            $("#member_number_err").hide();
            $('#asd').show();
        }
        else {
            // document.getElementById("member2").value='';
            //member_number_err
            $("#member_number_err").show()
            $('#asd').hide();
        }
        <?php } ?>

    });

    function addFields() {
        // alert('sdf');
        var tmp_number0 = document.getElementById("member0").value;
        var tmp_number1 = document.getElementById("member1").value;


        var banToeng = {'০': 0, '১': 1, '২': 2, '৩': 3, '৪': 4, '৫': 5, '৬': 6, '৭': 7, '৮': 8, '৯': 9};
        String.prototype.getbngToeng = function () {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };

        var bng_number0 = '' + tmp_number0 + '';
        var bng_number1 = '' + tmp_number1 + '';
        // console.log(bng_number);
        var number0 = bng_number0.getbngToeng();
        var number1 = bng_number1.getbngToeng();
        var number = Number(number0) + Number(number1);

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

        String.prototype.getDigitBanglaFromEnglish = function () {
            var retStr = this;
            for (var x in finalEnlishToBanglaNumber) {
                retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
            }
            return retStr;
        };

        var english_number = '' + number + '';

        var bangla_converted_number = english_number.getDigitBanglaFromEnglish();


        document.getElementById("member2").value = bangla_converted_number;
        document.getElementById("member2_final").value = number;
        // document.getElementById("member2").va = number;

        if (number >= 20 && number <= 500) {
            addField2(number);
            $("#member_number_err").hide();
            $('#asd').show();
        } else {
            // document.getElementById("member2").value='';
            //member_number_err
            $("#member_number_err").show()
            $('#asd').hide();
        }
    }
    function close_modal() {
        var ok = true;
        document.getElementById("error_info").innerHTML = '';
        document.getElementById("error_info2").innerHTML = '';
        var my_var = 0;
        // $("<img src='http://searchingfordragons.files.wordpress.com/2012/04/calvinfaces1.jpg'>").appendTo("#target");

        var x = document.getElementsByName("member_name[]");

        var fCode = document.getElementsByName("member_name[]");
        var fCode2 = document.getElementsByName("member_nid[]");
        var purpose = document.getElementById("purpose").value;


        if (typeof fCode[0] === 'undefined' || typeof fCode2[0] === 'undefined') {
            document.getElementById("error_info").innerHTML = ' সঠিকভাবে সমবায় এর সদস্য সংখ্যা প্রদান করুন।';
            my_var = 1;

            $("html, body").animate({scrollTop: 0}, "slow");
            ok = false;
        }
        for (var i = 0; i < fCode.length; i++) {
            if (fCode[i].value == "" || fCode[i].value == null || fCode[i] === "undefined") {
                document.getElementById("error_info").innerHTML = 'সকল সদস্যের নাম ও জাতীয় পরিচয়পত্র সঠিকভাবে প্রদান করুন।';
                fCode[i].focus();
                my_var = 1;
                $('html, body').animate({
                    'scrollTop': $("#asd").position().top
                });
                ok = false;
            }


        }


        for (var i = 0; i < fCode2.length; i++) {
            if (fCode2[i].value == "" || fCode2[i].value == null || fCode2[i] === "undefined") {
                document.getElementById("error_info").innerHTML = 'সকল সদস্যের নাম ও জাতীয় পরিচয়পত্র সঠিকভাবে প্রদান করুন।';
                fCode2[i].focus();
                my_var = 1;
                $('html, body').animate({
                    'scrollTop': $("#asd").position().top
                });
                ok = false;
            }

        }


        if (purpose == '' || purpose == null) {
            document.getElementById("error_info2").innerHTML = 'আপনার সমবায় গঠনের উদ্দেশ্য উল্লেখ করুন।';
            $('html, body').animate({
                'scrollTop': $("#error_info2").position().top
            });
            my_var = 1;
            ok = false;

        }
        if (my_var == 1) {
            $('#myModal').modal('hide');
        }
        else {
            $('#myModal').modal('hide');
            $('html, body').animate({
                'scrollTop': $("#asd").position().top
            });
            document.getElementById("load_img").style.display = "block"
            document.getElementById("page_content_opacity").style.opacity = "0.1"
        }
        return ok;


    }


    function addField2(number) {


        $('#asd').find('tr:gt(0)').remove();
        var table_row = '';

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


        String.prototype.getDigitBanglaFromEnglish = function () {
            var retStr = this;
            for (var x in finalEnlishToBanglaNumber) {
                retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
            }
            return retStr;
        };
        var member_new = [];

        <?php foreach($all_tmp_data_member as $row)
        {?>
            member_new.push([{n_id: '<?= $row["somitee_member_nid"];?>'}, {name: '<?= $row["member_name"];?>'}]);
                <?php } ?>




        for (var a = 0; a < number; a++) {
            var english_number = '' + (a + 1) + '';

            var bangla_converted_number = english_number.getDigitBanglaFromEnglish();
            table_row += '<tr><td style="text-align: center;">' + bangla_converted_number + '</td><td style="text-align: center;"><input value="" style="width: 100%;" type="text" id="name_' + a + '" class="mem_name" name="member_name[]" required="true" ></td><td style="text-align: center;"><input type="text" id="id_' + a + '" class="mem_id" onblur="save_member(' + a + ')" name="member_nid[]" required="true" minlength="17" maxlength="17"></td></tr>';

        }

        $('#asd').append(table_row);
        <?php
        if(isset($all_tmp_data_member)){
        for($i=0;$i<count($all_tmp_data_member);$i++)
        {?>
        document.getElementById("name_<?=$i?>").value = "<?=$all_tmp_data_member[$i]['member_name'];?>";
        document.getElementById("id_<?=$i?>").value = "<?=$all_tmp_data_member[$i]['somitee_member_nid'];?>";

        <?php } }?>


    }

    //$('#name_0').val('sdf');

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

    counter = function () {
        var value = $('#purpose').val();

        if (value.length == 0) {
            $('#wordCount').html('০/২৫০ শব্দ');
            return;
        }

        var regex = /\s+/gi;
        var wordCount = value.trim().replace(regex, ' ').split(' ').length;

        $('#wordCount').html((wordCount + '').getDigitBanglaFromEnglish() + '/২৫০ শব্দ');

        if (wordCount > 250) {
            document.getElementById('errMSG').innerText = 'সমবায় গঠনের উদ্দেশ্য ২৫০ শব্দের মধ্যে হতে হবে';
            var x = document.getElementById('Sbtn');
            x.style.display = 'none';
        } else {
            var x = document.getElementById('Sbtn');
            x.style.display = 'block';
            document.getElementById('errMSG').innerText = '';
        }
    };

    $(document).ready(function () {
        $('#purpose').change(counter);
        $('#purpose').keydown(counter);
        $('#purpose').keypress(counter);
        $('#purpose').keyup(counter);
        $('#purpose').blur(counter);
        $('#purpose').focus(counter);

    });

    function myclick() {
        var des = $('#purpose').val();

        $('#purpose_of_somobay').html(des);

    }

    function table_nid() {
        var des = $('#purpose').val();

        $('#purpose_of_somobay').html(des);
        $('#member_of_somobay').find('tr:gt(0)').remove();
        var table_row = '';

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

        String.prototype.getDigitBanglaFromEnglish = function () {
            var retStr = this;
            for (var x in finalEnlishToBanglaNumber) {
                retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
            }
            return retStr;
        };
        number = $('#member2_final').val();
        for (var a = 0; a < number; a++) {
            var english_number = '' + (a + 1) + '';
            var bangla_converted_number = english_number.getDigitBanglaFromEnglish();
            table_row += '<tr><td style="text-align: center;">' + bangla_converted_number + '</td><td style="text-align: center;">' + $("#name_" + a).val() + '</td><td style="text-align: center;">' + $("#id_" + a).val() + '</td></td></tr>';


        }

        $('#member_of_somobay').append(table_row);


    }


    function upload_tmp_file() {

        var member_number_male_name = member0.value;
        var member_number_female_name = member1.value;


        var banToeng = {'০': 0, '১': 1, '২': 2, '৩': 3, '৪': 4, '৫': 5, '৬': 6, '৭': 7, '৮': 8, '৯': 9};
        String.prototype.getbngToeng = function () {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };

        var bng_male = '' + member_number_male_name + '';
        var bng_female = '' + member_number_female_name + '';
        // console.log(bng_number);
        var member_number_male_name = bng_male.getbngToeng();
        var member_number_female_name = bng_female.getbngToeng();


        var purpose = $('textarea#purpose').val();
        purpose = purpose.replace(/\s+/g, '');
        if (purpose == null || purpose == '') {
            document.getElementById("purpose").value = purpose;
        }
        purpose = $('textarea#purpose').val();
        $.ajax({
            url: "<?php echo site_url('somitee/update_somitee_member_num_info');?>",
            type: "post",
            data: {
                member_number_male_name: member_number_male_name,
                member_number_female_name: member_number_female_name,
                purpose: purpose,
            },
            success: function (msg) {
                // alert(msg);
                //location.reload();
            }
        });

    }

    function save_member(id) {
        //alert('sdffds');
        var check_id = id;
        var m_name = [];
        var m_id = [];

        $('.mem_name').each(function () {
            m_name.push($(this).val());
        });
        $('.mem_id').each(function () {
            m_id.push($(this).val());
        });

//        console.log(m_name);
//        console.log(m_id);

        $.ajax({
            url: "<?php echo site_url('somitee/save_member');?>",
            type: "post",
            data: {
                member_name: m_name,
                member_id: m_id,
                check_id: check_id
            },
            success: function (msg) {
                console.log(msg);
                //location.reload();
            }
        });

    }


</script>