<?php //include 'layouts/registered_user_header.php';      ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center reg-title">সমিতি সংশোধন সংবলিত তথ্য</h1>
        <form method="post" action="<?php echo site_url('somitee/update_somitee_information');?>" class="form-horizontal reg-form-1 panel" id="reg-form-1">
            <input type="hidden" name="s_reg1" value="1">
            <fieldset>

                                        <!-- FIEID ONE -->
            <fieldset>
                <legend>১. সমিতির ঠিকানা</legend>
                <hr>
                <div class="form-group" id="division-input">
                    <label for="division" class="col-md-4 control-label">বিভাগ</label>
                    <div class="col-md-8">
                        <select name="somitee_div_id" id="division" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($division as $row) { if($row['div_id']==$somitee_all_info[0]['somitee_div_id']){ ?>
                                <option selected value="<?php echo $row['div_id']; ?>"> <?=$row['bn_div_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['div_id']; ?>"> <?=$row['bn_div_name']?></option>
                           <?php } }  ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>


                     <?php
                     //echo $somitee_all_info[0]['somitee_dist_id'];
                     ?>                       <!-- FIEID TWO -->

                <div class="form-group" id="district-input">
                    <label for="district" class="col-md-4 control-label">জেলা</label>
                    <div class="col-md-8">
                        <select name="somitee_dist_id" id="district" class="form-control" required>
                            <option value="">--</option>
                            <?php foreach ($district as $row) { if($row['dist_id']==$somitee_all_info[0]['somitee_dist_id']){ ?>

                                <option selected value="<?php echo $row['dist_id']; ?>"> <?=$row['bn_dist_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['dist_id']; ?>"> <?=$row['bn_dist_name']?></option>
                           <?php } }  ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>


                                            <!-- FIEID THREE -->

                <div class="form-group" id="sub-district-input">
                    <label for="upz" class="col-md-4 control-label">উপজেলা/মেট্রো থানা</label>
                    <div class="col-md-8">
                        <select name="somitee_upz_id" id="upz" id="sub-district" class="form-control" required>
                            <option value="">--</option>
                            <?php foreach ($upz as $row) { if($row['upz_id']==$somitee_all_info[0]['somitee_upz_id']){ ?>

                                <option selected value="<?php echo $row['upz_id']; ?>"> <?=$row['bn_upz_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['upz_id']; ?>"> <?=$row['bn_upz_name']?></option>
                           <?php } }  ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>


                                            <!-- FIEID FOUR -->

                            <?php $str = $somitee_all_info[0]['somitee_address'];
                                  $arr = explode(" ", $str)

                            ?>

                <div class="form-group">
                    <label for="ward" class="col-md-4 control-label">ইউনিয়ন/ওয়ার্ড</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="ward" id="ward" placeholder="ইউনিয়ন/ওয়ার্ড" required value="<?=$arr[0]?>">
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>



                                            <!-- FIEID FIVE -->

                <div class="form-group">
                    <label for="others" class="col-md-4 control-label">অন্যান্য</label>
                    <div class="col-md-8">

                        <textarea name="others" id="others" rows="2" class="form-control">
                        <?php for($i=1;$i<count($arr);$i++){
                            if($arr[$i]!=''){echo htmlentities($arr[$i]).' ';}
                            }?></textarea>
                        <span class="help-block">অপশনাল</span>
                    </div>
                </div>
            </fieldset>






            <fieldset>
                                            <!-- FIEID SIX -->

                <legend>২. সমিতির নাম</legend>
                <hr>
                <div class="form-group">
                    <label for="momiti_name" class="col-md-4 control-label">সমিতির নাম</label>
                    <div class="col-md-8">
                        <input onblur="check_somitee_name()" type="text" name="somitee_name" id="momiti_name" class="form-control" value="<?=$somitee_all_info[0]['somitee_name']?>" required>
                        <span class="help-block">সমিতির নামে "সমবায়" এবং "লিঃ" শব্দ থাকতে হবে <br>
                            সমিতির নামে কমার্স/ব্যাংক ইত্যাদি শব্দ থাকবে না</span>
                    </div>
                </div>



                                            <!-- FIEID SEVEN -->

                <div class="form-group">
                    <label for="org-type" class="col-md-4 control-label">সমিতির শ্রেণী</label>
                    <div class="col-md-8">
                        <select name="somitee_type_id" id="somitee_type" class="form-control" required>
                            <option>নির্বাচন করুন</option>
                            <?php foreach ($somitee_type as $row) { if($row['somitee_type_id']==$somitee_all_info[0]['somitee_type_id']){ ?>
                                <option selected value="<?php echo $row['somitee_type_id']; ?>"> <?=$row['somitee_type_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['somitee_type_id']; ?>"> <?=$row['somitee_type_name']?></option>
                            <?php } }  ?>
                        </select>
                    </div>
                </div>

                                            <!-- FIEID SEVEN (SUB ONE) -->

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <select name="somitee_cat_id" id="somitee_cat" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($somitee_cat as $row) { if($row['somitee_cat_id']==$somitee_all_info[0]['somitee_cat_id']){ ?>
                                <option selected value="<?php echo $row['somitee_cat_id']; ?>"> <?=$row['somitee_cat_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['somitee_cat_id']; ?>"> <?=$row['somitee_cat_name']?></option>
                           <?php } }  ?>
                        </select>
                    </div>
                </div>

                                            <!-- FIEID SEVEN (SUB TWO) -->

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <select name="somitee_sub_cat_id" id="somitee_cat_sub" class="form-control" required>
                            <option value="">--</option>
                            <?php foreach ($somitee_sub_cat as $row) { if($row['somitee_sub_cat_id']==$somitee_all_info[0]['somitee_sub_cat_id']){ ?>
                                <option selected value="<?php echo $row['somitee_sub_cat_id']; ?>"> <?=$row['somitee_sub_cat_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['somitee_sub_cat_id']; ?>"> <?=$row['somitee_sub_cat_name']?></option>
                           <?php } }  ?>
                        </select>
                    </div>
                </div>
                                        <!-- FIEID EIGHT -->
            <fieldset>
                <legend>৩. সমিতির তথ্য</legend>
                <hr>
                <div class="form-group">
                    <label for="share_price" class="col-md-4 control-label">শেয়ার মূল্য</label>
                    <div class="col-md-8">
                        <input type="text" name="somitee_per_share_price" id="share_price" class="form-control"  pattern= "[0-9]+" required value="<?=$somitee_all_info[0]['somitee_per_share_price']?>">
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>



                                        <!-- FIEID NINE -->
                <div class="form-group">
                    <label for="share_qty" class="col-md-4 control-label">শেয়ার সংখ্যা</label>
                    <div class="col-md-8">
                        <input type="text" name="somitee_share" id="share_qty" class="form-control" value="<?=$somitee_all_info[0]['somitee_share']?>" pattern= "[0-9]+" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
            </fieldset>



                                        <!-- FIEID TEN -->
            <fieldset>
                <legend>৪. সদস্য নির্বাচনী এলাকা</legend>
                <hr>

                <div class="form-group">
                    <label for="elected_division" class="col-md-4 control-label">বিভাগ</label>
                    <div class="col-md-8">
                        <select name="somitee_kormo_div_id" id="elected_division" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($division as $row) { if($row['div_id']==$somitee_all_info[0]['somitee_kormo_div_id']){ ?>
                                <option selected value="<?php echo $row['div_id']; ?>"> <?=$row['bn_div_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['div_id']; ?>"> <?=$row['bn_div_name']?></option>
                           <?php } }  ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>


                                        <!-- FIEID ELEVEN -->
                <div class="form-group">
                    <label for="elected_district" class="col-md-4 control-label">জেলা</label>
                    <div class="col-md-8">
                        <select name="somitee_kormo_dist_id" id="elected_district" class="form-control" required>
                            <option value="">--</option>
                            <?php foreach ($district as $row) { if($row['dist_id']==$somitee_all_info[0]['somitee_kormo_dist_id']){ ?>
                                <option selected value="<?php echo $row['dist_id']; ?>"> <?=$row['bn_dist_name']?></option>
                            <?php } else { ?>
                                <option  value="<?php echo $row['dist_id']; ?>"> <?=$row['bn_dist_name']?></option>
                           <?php } }  ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
            </fieldset>



                                       <!-- FIEID TWELVE -->
            <fieldset>
                <legend>৫. সমিতি গঠনের উদ্দেশ্য</legend>
                <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="somitee_purpose" id="purpose"  rows="5" class="form-control" placeholder="সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন"><?=$somitee_all_info[0]['somitee_purpose']?></textarea>

                        <span class="help-block">সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন</span>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-offset-4 col-md-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> উপরের প্রদত্ত সকল তথ্য সঠিক
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_id" value="<?=$somitee_all_info[0]['somitee_id']?>">



                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button class="btn btn-primary btn-raised" type="submit">সংশোধন শেষে সেভ করুন</button>
                    </div>
                </div>
            </fieldset>


        </form>
    </div>
</div><!-- /row -->


<?php $this->load->view('public_layouts/footer'); ?>


<script>
    $(document).ready(function () {
        $('#somitee_cat').hide();
        $('#somitee_cat_sub').hide();
        $('#somitee_type').change(function () {
            selection = $(this).val();
            switch (selection) {
                case '1':
                    $('#somitee_cat').show();
                    $('#somitee_cat_sub').show();
                    break;
                default:
                    $('#somitee_cat').hide();
                    $('#somitee_cat_sub').hide();
                    break;
            }
        });

    });

    $('#division').change(function () {
        var div = $('#division').val();
        //alert(div);
        $.ajax({
            url: '<?php echo site_url('somitee/get_dist'); ?>',
            type: 'POST',
            data: {
                div_id: div
            },
            success: function (data) {
                //console.log(data);
                var data1 = $.parseJSON(data);

                $('#district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    //console.log(option_val);
                    $('#district').append(option_val);
                });
            }
        });
    });

    $('#district').change(function () {
        var dist = $('#district').val();
        //alert(div);
        $.ajax({
            url: '<?php echo site_url('somitee/get_upz'); ?>',
            type: 'POST',
            data: {
                dist_id: dist
            },
            success: function (data) {
                //console.log(data);
                var data1 = $.parseJSON(data);

                $('#sub-district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    //console.log(option_val);
                    $('#upz').append(option_val);
                });
            }
        });
    });

    $('#somitee_cat').change(function () {
        var s_cat = $('#somitee_cat').val();
        //alert(s_cat);
        $.ajax({
            url: '<?php echo site_url('somitee/get_sub_cat'); ?>',
            type: 'POST',
            data: {
                cat_id: s_cat
            },
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);

                $('#somitee_cat_sub').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['somitee_sub_cat_id'] + '">' + value['somitee_sub_cat_name'] + '</option>';
                    console.log(option_val);
                    $('#somitee_cat_sub').append(option_val);
                });
            }
        });
    });

    function check_somitee_name() {
        var tmp_name = $('#momiti_name').val();
        //alert(tmp_email);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/check_somitee_name'); ?>',
            data: {
                name: tmp_name
            },
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    document.getElementById('momiti_name').value = '';
                    //document.getElementById('check_email_msg').innerHTML = 'this email exists';
                    console.log('This name already exists..');
                }

            }
        });
    }

</script>


<script>

    $('#elected_division').change(function () {
        var div = $('#elected_division').val();
        //alert(div);
        $.ajax({
            url: '<?php echo site_url('somitee/get_dist'); ?>',
            type: 'POST',
            data: {
                div_id: div
            },
            success: function (data) {
                //console.log(data);
                var data1 = $.parseJSON(data);

                $('#elected_district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    //console.log(option_val);
                    $('#elected_district').append(option_val);
                });
            }
        });
    });

    $('#elected_district').change(function () {
        var dist = $('#elected_district').val();
        //alert(div);
        $.ajax({
            url: '<?php echo site_url('somitee/get_upz'); ?>',
            type: 'POST',
            data: {
                dist_id: dist
            },
            success: function (data) {
                //console.log(data);
                var data1 = $.parseJSON(data);

                $('#elected_subdistrict').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    //console.log(option_val);
                    $('#elected_subdistrict').append(option_val);
                });
            }
        });
    });
</script>