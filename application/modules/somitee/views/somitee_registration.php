<?php //include 'layouts/registered_user_header.php';      ?>
<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<?php $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'); ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well" style="background-color: #BBDEFB; margin-bottom: 4px">প্রস্তাবিত সমবায় এর
            প্রাথমিক আবেদন</h1>
        <form method="post" action="<?php echo site_url('somitee/somitee_registration_2'); ?>"
              class="form-horizontal reg-form-1 panel proposed-applicaion"
              id="reg-form-1">
            <input type="hidden" name="s_reg1" value="1">
            <fieldset>
                <legend>সমবায় এর প্রস্তাবিত নাম</legend>
                <!--                <hr>-->

                <div class="form-group">
                    <label for="momiti_name" class="col-md-4 control-label">সমবায় এর নাম</label>
                    <div class="col-md-8">
                        <input onblur="check_somitee_name()" type="text" name="momiti_name"
                               <?php if(isset($all_tmp_data[0]['somitee_name'])){?> value="<?=$all_tmp_data[0]['somitee_name'];?>"
                               <?php }?> id="momiti_name" class="form-control" placeholder="সমবায় এর নাম" required>
                        <span class="help-block">সমবায় এর নামে ("সমবায়" অথবা "কো-অপারেটিভ") এবং "লিমিটেড" শব্দ থাকতে হবে <br>
                            সমবায় এর নামে "কমার্স, ব্যাংক, ইনভেষ্টমেন্ট, কমার্শিয়াল ব্যাংক, লিজিং, ফাইন্যান্সিং" ইত্যাদি শব্দ থাকবে না</span>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>সমবায় এর কার্যালয়ের ঠিকানা</legend>
                <!--                <hr>-->
                <div class="form-group">
                    <label for="momiti_name" class="col-md-4 control-label">ঠিকানা</label>
                    <div class="col-md-2">
                        <select onclick="select_district()" id="division" name="division_name" class="form-control"
                                required>
                            <option style="color:gray" value="">বিভাগ</option>
                            <?php foreach ($division as $row) { ?>
                            <option
                                    value="<?php echo $row['div_id'];?>" <?php if (isset($all_tmp_data[0]['somitee_div_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_div_id'] == $row['div_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_div_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                        <span style="color:peru">বিভাগ</span>
                        <span class="help-block"></span>
                    </div>

                    <div class="col-md-3">
                        <select onclick="select_upz()" name="district_name" id="district" class="form-control" required>

                            <option value="">জেলা</option>
                            <?php foreach ($district as $row) { ?>
                            <option
                                    value="<?php echo $row['dist_id']; ?>" <?php if (isset($all_tmp_data[0]['somitee_div_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_dist_id'] == $row['dist_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_dist_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                        <span style="color:peru">জেলা</span>
                        <span class="help-block"></span>
                    </div>

                    <div class="col-md-3">
                        <select name="upz_name" id="upz" class="form-control" required>
                            <option value="">উপজেলা/থানা</option>
                            <?php foreach ($upz as $row) { ?>
                            <option
                                    value="<?php echo $row['upz_id']; ?>" <?php if (isset($all_tmp_data[0]['somitee_upz_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_upz_id'] == $row['upz_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_upz_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                        <span style="color:peru">উপজেলা/থানা</span>
                        <span id='upzzz' class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ward" class="col-md-4 control-label">ইউনিয়ন/ওয়ার্ড</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="ward_name" id="ward" placeholder="ইউনিয়ন/ওয়ার্ড"
                               <?php if(isset($all_tmp_data[0]['somitee_ward'])){?> value="<?=$all_tmp_data[0]['somitee_ward'];?>"
                               <?php }?>
                               required value="<?php if ($this->session->userdata('session_page') == '1') {
                            echo '' . $this->session->userdata('somitee_ward') . '';
                        }?>">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="others" class="col-md-4 control-label">বিস্তারিত ঠিকানা</label>
                    <div class="col-md-8">
                        <textarea name="others_name" id="others" rows="1"
                                  class="form-control"><?php if (isset($all_tmp_data[0]['others'])) { ?> <?= $all_tmp_data[0]['others']; ?> <?php }?></textarea>
                        <span class="help-block">অপশনাল</span>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>সমবায় এর শ্রেণী</legend>
                <div class="form-group">
                    <label for="org-type" class="col-md-4 control-label">সমবায় এর স্তর</label>
                    <div class="col-md-8">
                        <select name="somitee_type_name" id="somitee_type" class="form-control" required="required">
                            <option value="0">সমবায় এর স্তর নির্বাচন করুন</option>
                            <option value="1" <?php if (isset($all_tmp_data[0]['somitee_type_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_type_id'] == 1) {
                                echo " selected";
                            } ?> <?php }?>>প্রাথমিক সমবায় সমিতি
                            </option>
                            <option value="2" <?php if (isset($all_tmp_data[0]['somitee_type_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_type_id'] == 2) {
                                echo " selected";
                            } ?> <?php }?>>কেন্দ্রীয় সমবায় সমিতি
                            </option>
                            <!--<option value="3" <?php if (isset($all_tmp_data[0]['somitee_type_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_type_id'] == 3) {
                                echo " selected";
                            } ?> <?php }?>>জাতীয় সমবায় সমিতি
                            </option>-->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="org-type" class="col-md-4 control-label">সমবায় এর শ্রেণী</label>
                    <div class="col-md-8 ">
                        <select name="somitee_cat_name" id="somitee_cat" class="form-control" required>
                            <option value="0">সমবায় এর শ্রেণী নির্বাচন করুন</option>
                            <?php foreach ($somitee_cat as $row) { ?>
                            <option
                                    value="<?php echo $row['somitee_cat_id']; ?>" <?php if (isset($all_tmp_data[0]['somitee_cat_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_cat_id'] == $row['somitee_cat_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['somitee_cat_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="somitee_cat_sub_name" id="somitee_cat_sub" value="0">
                <!--<div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <select name="somitee_cat_sub_name" id="somitee_cat_sub" class="form-control" required>
                            <option value="0">সমবায় এর প্রকার নির্বাচন করুন</option>
                            <?php foreach ($somitee_sub_cat as $row) { ?>
                        <option
                                value="<?php echo $row['somitee_sub_cat_id']; ?>" <?php if (isset($all_tmp_data[0]['somitee_sub_cat_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_sub_cat_id'] == $row['somitee_sub_cat_id']) {
                    echo " selected";
                } ?> <?php }?>><?php echo $row['somitee_sub_cat_name']; ?>
                        </option>
                        <?php } ?>
                        </select>
                    </div>
                </div>-->
            </fieldset>
            <hr>
            <fieldset>
                <legend>সমবায় এর প্রাথমিক তথ্য</legend>
                <div class="form-group">
                    <label for="share_price" class="col-md-4 control-label">প্রতিটি শেয়ার মূল্য</label>
                    <div class="col-md-7">
                        <input type='hidden' name='share_price_eng_name' id='share_price_eng'>


                        <input type="text" name="share_price" id="share_price" class="form-control"
                               <?php if(isset($all_tmp_data[0]['somitee_per_share_price'])){?> value="<?=str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['somitee_per_share_price']);?>"
                               <?php }?>
                               required>
                        <span class="help-block"></span>
                    </div>
                    <div style="padding-top: 2%;">টাকা</div>
                </div>
                <div class="form-group">
                    <label for="share_qty" class="col-md-4 control-label">প্রস্তাবিত মোট শেয়ার সংখ্যা</label>
                    <div class="col-md-7">
                        <input type='hidden' name='share_qty_eng' id='share_qty_eng'>
                        <input type="text" name="share_qty" id="share_qty" class="form-control"
                               <?php if(isset($all_tmp_data[0]['somitee_share'])){?> value="<?=str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['somitee_share']);?>"
                               <?php }?>
                               required>
                        <span class="help-block"></span>
                    </div>
                    <div style="padding-top: 2%;">টি</div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-4 control-label">প্রস্তাবিত অনুমোদিত শেয়ার মূলধন</label>
                    <div class="col-md-7">
                        <input readonly type="text" name="s_budget" id="s_budget" class="form-control" value="">
                    </div>
                    <div style="padding-top: 2%;">টাকা</div>
                </div>
                <div class="form-group">
                    <label for="sell_share_num" class="col-md-4 control-label">বিক্রিত শেয়ার সংখ্যা</label>
                    <div class="col-md-7">
                        <input type='hidden' name='sell_share_eng' id='sell_share_eng'>
                        <input type="text" name="sell_share_num" id="sell_share_num" class="form-control"
                               <?php if(isset($all_tmp_data[0]['sell_share_num'])){?> value="<?=str_replace(range(0, 9), $bn_digits, $all_tmp_data[0]['sell_share_num']);?>"
                               <?php }?>
                               required>
                        <span class="help-block"></span>
                    </div>
                    <div style="padding-top: 2%;">টি</div>
                </div>
                <div class="form-group">
                    <label for="s_sell_budget" class="col-md-4 control-label">পরিশোধিত শেয়ার মূলধন </label>
                    <div class="col-md-7">
                        <input readonly type="text" name="s_sell_budget" id="s_sell_budget" class="form-control"
                               value="">
                        <span class="help-block"></span>
                    </div>
                    <div style="padding-top: 2%;">টাকা</div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-4 control-label">সদস্য নির্বাচনী এলাকা</label>
                    <div class="col-md-2">
                        <select onclick="select_sodosso_district()" name="sodosso_division" id="sodosso_division"
                                class="form-control" required>
                            <option>বিভাগ</option>
                            <?php foreach ($somitee_sodosso_division as $row) { ?>
                            <option
                                    value="<?php echo $row['div_id']; ?>" <?php if (isset($all_tmp_data[0]['sodosso_division'])) { ?> <?php if ($all_tmp_data[0]['sodosso_division'] == $row['div_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_div_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>

                    <div class="col-md-2">
                        <select onclick="select_sodosso_upz()" name="sodosso_district" id="sodosso_district"
                                class="form-control" required>
                            <option value="">জেলা</option>
                            <?php foreach ($somitee_sodosso_district as $row) { ?>
                            <option
                                    value="<?php echo $row['dist_id']; ?>" <?php if (isset($all_tmp_data[0]['sodosso_district'])) { ?> <?php if ($all_tmp_data[0]['sodosso_district'] == $row['dist_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_dist_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>

                    <div class="col-md-3">
                        <select name="sodosso_upz" id="sodosso_upz" class="form-control" required>
                            <option value="">উপজেলা/থানা</option>
                            <?php foreach ($somitee_sodosso_upz as $row) { ?>
                            <option
                                    value="<?php echo $row['upz_id']; ?>"<?php if (isset($all_tmp_data[0]['sodosso_upz'])) { ?> <?php if ($all_tmp_data[0]['sodosso_upz'] == $row['upz_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_upz_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="elected_ward" class="col-md-4 control-label">বিস্তারিত</label>
                    <div class="col-md-7">
                        <input type="text" name="elected_ward" id="elected_ward" class="form-control"
                               placeholder="বিস্তারিত"
                               <?php if(isset($all_tmp_data[0]['elected_ward_name'])){?> value="<?=$all_tmp_data[0]['elected_ward_name'];?>"
                               <?php }?>
                               required>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-4 control-label">সমবায়ের কর্ম এলাকা</label>
                    <div class="col-md-2">
                        <select onclick="select_kormo_district()" name="kormo_division" id="kormo_division"
                                class="form-control" required>
                            <option>বিভাগ</option>
                            <?php foreach ($sodosso_kormo_division as $row) { ?>
                            <option
                                    value="<?php echo $row['div_id']; ?>" <?php if (isset($all_tmp_data[0]['somitee_kormo_div_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_kormo_div_id'] == $row['div_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_div_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>

                    <div class="col-md-2">
                        <select onclick="select_kormo_upz()" name="kormo_district" id="kormo_district"
                                class="form-control" required>
                            <option value="">জেলা</option>
                            <?php foreach ($sodosso_kormo_district as $row) { ?>
                            <option
                                    value="<?php echo $row['dist_id']; ?>" <?php if (isset($all_tmp_data[0]['somitee_kormo_dist_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_kormo_dist_id'] == $row['dist_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_dist_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>

                    <div class="col-md-3">
                        <select name="kormo_upz" id="kormo_upz" class="form-control" required>
                            <option value="">উপজেলা/থানা</option>
                            <?php foreach ($sodosso_kormo_upz as $row) { ?>
                            <option
                                    value="<?php echo $row['upz_id']; ?>" <?php if (isset($all_tmp_data[0]['somitee_kormo_upz_id'])) { ?> <?php if ($all_tmp_data[0]['somitee_kormo_upz_id'] == $row['upz_id']) {
                                echo " selected";
                            } ?> <?php }?>><?php echo $row['bn_upz_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="elected_ward" class="col-md-4 control-label">বিস্তারিত</label>
                    <div class="col-md-7">
                        <input type="text" name="kormo_elected_ward" id="sodosso_elected_ward" class="form-control"
                               placeholder="বিস্তারিত"
                               <?php if(isset($all_tmp_data[0]['kormo_elected_ward_name'])){?> value="<?=$all_tmp_data[0]['kormo_elected_ward_name'];?>"
                               <?php }?>
                               required>
                        <span class="help-block"></span>
                    </div>
                </div>

                <!--  <div class="form-group">
                      <div class="col-md-offset-4 col-md-8">
                          <div class="checkbox">
                              <label>
                                 <input type="radio" name="radio_button" required="required"> উপরের প্রদত্ত সকল তথ্য সঠিক
                              </label>
                          </div>
                      </div>
                  </div>-->
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label for="lst_chk">
                                <input type="checkbox" name="lst_chk" id='lst_chk' required> উপরের প্রদত্ত সকল তথ্য সঠিক
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button class="btn btn-primary btn-raised" type="submit">পরবর্তী পাতায় যান <span></span>
                        </button>
                    </div>
                </div>
            </fieldset>


        </form>
    </div>
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>

<script>
    function select_district() {
        var div = $('#division').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_dist');?>',
            data: {
                div_id: div
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#district').find("option:gt(0)").remove();
                $('#upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    $('#district').append(option_val);
                });
            }
        });
    }
    function select_upz() {
        var dist = $('#district').val();
        console.log(dist);
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_upz2');?>',
            data: {
                dist_id: dist
            }, success: function (data) {
                console.log(data);
                data1 = $.parseJSON(data);

                $('#upz').find("option:gt(0)").remove();
                if (data1['res'].length == 0) {
                    var x = document.getElementById('upzzz');
                    x.style.color = "red";
                    x.innerHTML = "অনলাইন সমবায় নিবন্ধন বন্ধ আছে।<br>";
                } else {
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                        $('#upz').append(option_val);
                    });
                    var x = document.getElementById('upzzz');
                    x.style.color = "black";
                    x.innerHTML = "";
                }
            }
        });
    }

    function select_sodosso_district() {
        var div = $('#sodosso_division').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_dist');?>',
            data: {
                div_id: div
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#sodosso_district').find("option:gt(0)").remove();
                $('#sodosso_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    $('#sodosso_district').append(option_val);
                });
            }
        });
    }
    function select_sodosso_upz() {
        var dist = $('#sodosso_district').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_upz');?>',
            data: {
                dist_id: dist
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#sodosso_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    $('#sodosso_upz').append(option_val);
                });
            }
        });
    }
    function check_login_modal() {
        var nid = $('#nid').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/check_login_modal');?>',
            data: {nid=nid, password=password},
        success: function(data) {
            console.log(data);
        },
        });
    }

    function select_kormo_district() {
        var div = $('#kormo_division').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_dist');?>',
            data: {
                div_id: div
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#kormo_district').find("option:gt(0)").remove();
                $('#kormo_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    $('#kormo_district').append(option_val);
                });
            }
        });
    }
    function select_kormo_upz() {
        var dist = $('#kormo_district').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_upz');?>',
            data: {
                dist_id: dist
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#kormo_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    $('#kormo_upz').append(option_val);
                });
            }
        });
    }
    $(document).ready(function () {
        cal_budget();
        cal_budget2();
        <?php if(isset($all_tmp_data[0]['somitee_type_id'])){
            if($all_tmp_data[0]['somitee_type_id']==1 || $all_tmp_data[0]['somitee_type_id']==2){?>
                $('#somitee_cat').show();
        <?php } } ?>




        $('#share_price').on('keyup keypress blur change', function (event) {
            cal_budget();
            cal_budget2()
        });
        $('#share_qty').on('keyup keypress blur change', function (event) {
            cal_budget();
        });
        $('#sell_share_num').on('keyup keypress blur change', function (event) {
            cal_budget2();
        });



        function cal_budget() {
            var per_share_price = document.getElementById('share_price').value;
            var share_qnt = document.getElementById('share_qty').value;

            var banToeng = {'০': 0, '১': 1, '২': 2, '৩': 3, '৪': 4, '৫': 5, '৬': 6, '৭': 7, '৮': 8, '৯': 9};
            String.prototype.getbngToeng = function () {
                var retStr = this;
                for (var x in banToeng) {
                    retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
                }
                return retStr;
            };

            var bng_number = '' + per_share_price + '';
            var perSharePrice = bng_number.getbngToeng();

            var bng_number2 = '' + share_qnt + '';
            var shareQnt = bng_number2.getbngToeng();

            if (perSharePrice != '' && shareQnt != '') {
                var s_budget = perSharePrice * shareQnt;

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

                var english_number = '' + s_budget + '';

                var bangla_converted_number = english_number.getDigitBanglaFromEnglish();
                document.getElementById('s_budget').value = bangla_converted_number;

                document.getElementById('share_price_eng').value = perSharePrice;
                document.getElementById('share_qty_eng').value = shareQnt;

            }
        }
        function cal_budget2() {
            var per_share_price = document.getElementById('share_price').value;
            var share_qnt = document.getElementById('sell_share_num').value;


            var banToeng = {'০': 0, '১': 1, '২': 2, '৩': 3, '৪': 4, '৫': 5, '৬': 6, '৭': 7, '৮': 8, '৯': 9};
            String.prototype.getbngToeng = function () {
                var retStr = this;
                for (var x in banToeng) {
                    retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
                }
                return retStr;
            };

            var bng_number = '' + per_share_price + '';
            var perSharePrice = bng_number.getbngToeng();

            var bng_number2 = '' + share_qnt + '';
            var shareQnt = bng_number2.getbngToeng();


            if (perSharePrice != '' && shareQnt != '') {
                var s_budget = perSharePrice * shareQnt;

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

                var english_number = '' + s_budget + '';

                var bangla_converted_number = english_number.getDigitBanglaFromEnglish();
                document.getElementById('s_sell_budget').value = bangla_converted_number;

                document.getElementById('share_price_eng').value = perSharePrice;
                document.getElementById('sell_share_eng').value = shareQnt;

            }
        }        
    });


</script>