<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">সমিতি নিবন্ধন ( সম্পূর্ণ )</h1>
        <center><span>মেম্বার রেজিস্টার(<?php echo $mem_no + 1; ?>/<?php echo $s_info[0]['member_number']; ?>)</span></center>

        <form method="post" action="<?php echo site_url('somitee/somitee_member_registration_2'); ?>"
              class="form-horizontal reg-form-step-2-form-2 panel panel-hover">
            <input type="hidden" name="member_add" value="1">
            <input type="hidden" name="somitee_id" value="<?php echo $s_info[0]['somitee_id']; ?>">

            <fieldset>
                <legend>সদস্যের তথ্য</legend>
                <hr>
                <div class="form-group">
                    <label for="mem_name" class="col-md-4 control-label">সদস্যের নাম</label>
                    <div class="col-md-8">
                        <input type="text" name="mem_name" id="mem_name" class="form-control" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mem_nid" class="col-md-4 control-label">জাতীয় পরিচয় পত্র নং</label>
                    <div class="col-md-8">
                        <input onblur="check_nid()" type="text" name="mem_nid" id="mem_nid" class="form-control"
                               minlength="17"
                               maxlength="17" pattern="[0-9]+" required>

                        <span id="nid_err_msg"></span>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mem_birth_date" class="col-md-4 control-label">জন্ম তারিখ</label>
                    <div class="col-md-8">
                        <input onchange="check_age()" type="text" name="mem_birth_date" id="mem_birth_date"
                               class="form-control" required>
                        <!--                        <input type="text" name="mem_birth_date" id="mem_birth_date" class="form-control" required>-->
                        <span id="dob_err_msg"></span>
                        <span class="help-block">আবশ্যক  </span>
                    </div>
                </div>
                <!--                <div class="form-group">-->
                <!--                    <label for="mem_age" class="col-md-4 control-label">আবেদনের তারিখে বয়স</label>-->
                <!--                    <div class="col-md-8">-->
                <!--                        <input type="text" name="mem_age" id="mem_age" class="form-control" required>-->
                <!--                        <span class="help-block">আবশ্যক</span>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="form-group">
                    <label for="mem_occupation" class="col-md-4 control-label">পেশা</label>
                    <div class="col-md-8">
                        <input type="text" name="mem_occupation" id="mem_occupation" class="form-control" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mem_father_name" class="col-md-4 control-label">পিতার নাম</label>
                    <div class="col-md-8">
                        <input type="text" name="mem_father_name" id="mem_father_name" class="form-control" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mem_mother_name" class="col-md-4 control-label">মাতার নাম</label>
                    <div class="col-md-8">
                        <input type="text" name="mem_mother_name" id="mem_mother_name" class="form-control" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mem_phone_no" class="col-md-4 control-label">মোবাইল নম্বর</label>
                    <div class="col-md-2">
                        <select name="country-code" id="" class="form-control">
                            <option value="+88">+88</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="mem_phone_no" class="form-control" id="mem_phone_no"
                               placeholder="ফোন নম্বর" minlength="11" maxlength="11" pattern="[0]+[1]+[0-9]+" required>
                        <span class="help-block">১১ ডিজিট এর ফোন নম্বর</span>
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <legend>বর্তমান ঠিকানা</legend>
                <span style="color: red;" id="address_err_msg_1"></span>
                <div class="form-group">
                    <label for="division" class="col-md-4 control-label">বিভাগ</label>
                    <div class="col-md-8">
                        <select name="curr_division" id="curr_division" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($division as $row) { ?>
                                <option
                                    value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="curr_district" class="col-md-4 control-label">জেলা</label>
                    <div class="col-md-8">
                        <select name="curr_district" id="curr_district" class="form-control" required>
                            <option>--</option>

                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="curr_subdistrict" class="col-md-4 control-label">উপজেলা/মেট্রো থানা</label>
                    <div class="col-md-8">
                        <select name="curr_subdistrict" id="curr_subdistrict" class="form-control" required>
                            <option>--</option>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="curr_ward" class="col-md-4 control-label">ইউনিয়ন/ওয়ার্ড</label>
                    <div class="col-md-8">
                        <input type="text" name="curr_ward" id="curr_ward" class="form-control"
                               placeholder="ইউনিয়ন/ওয়ার্ড" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="curr_details" class="col-md-4 control-label">বিস্তারিত ঠিকানা</label>
                    <div class="col-md-8">
                        <textarea name="curr_details" id="curr_details" rows="2" class="form-control"></textarea>
                        <span class="help-block">অপশনাল</span>
                    </div>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <legend>স্থায়ী ঠিকানা</legend>
                <span style="color: red;" id="address_err_msg"></span>
                <div class="form-group">
                    <label for="division" class="col-md-4 control-label">বিভাগ</label>
                    <div class="col-md-8">
                        <select name="per_division" id="per_division" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($division as $row) { ?>
                                <option
                                    value="<?php echo $row['div_id']; ?>" <?php
                                if ($this->session->userdata('session_page') == '1') {
                                    if ($this->session->userdata('somitee_div_id') == $row['div_id']) {
                                        echo "selected";
                                    }
                                }
                                ?>><?php echo $row['bn_div_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="per_district" class="col-md-4 control-label">জেলা</label>
                    <div class="col-md-8">
                        <select name="per_district" id="per_district" class="form-control" required>
                            <option value="">--</option>

                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="per_subdistrict" class="col-md-4 control-label">উপজেলা/মেট্রো থানা</label>
                    <div class="col-md-8">
                        <select name="per_subdistrict" id="per_subdistrict" class="form-control" required>
                            <option value="">--</option>

                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="per_ward" class="col-md-4 control-label">ইউনিয়ন/ওয়ার্ড</label>
                    <div class="col-md-8">
                        <input onclick="check_address()" type="text" id="per_ward" name="per_ward" class="form-control"
                               placeholder="ইউনিয়ন/ওয়ার্ড" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="others" class="col-md-4 control-label">বিস্তারিত ঠিকানা</label>
                    <div class="col-md-8">
                        <textarea name="others" id="others" rows="2" class="form-control"></textarea>
                        <span class="help-block">অপশনাল</span>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>ছবি</legend>
                <div class="form-group">
                    <label for="imgInp" class="col-md-4 control-label">ছবি</label>
                    <div class="col-md-8">
                        <input type="text" readonly="" class="form-control" placeholder="ছবি নির্বাচন করতে ক্লিক করুন">
                        <!--                        <input type="file" id="imgInp" accept="image/gif, image/jpeg, image/png"-->
                        <!--                               onchange="readURL(this);" required>-->
                        <input type="file" id="imgInp" accept="image/gif, image/jpeg, image/png">
                        <input type="hidden" name="pro_pic_path" id="pro_pic_path">
                        <img id="mem-pp" src="<?php echo base_url(); ?>public_assets/img/default-pp.jpg"
                             alt="আপনার ইমেজ নির্বাচন করুন"
                             style="width: 150px; height: auto;"/>

                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>শেয়ার</legend>
                <div class="form-group">
                    <label for="mem_share" class="col-xs-4 control-label">শেয়ার সংখ্যা</label>
                    <div class="col-xs-7">
                        <input onkeyup="check_share()" onchange="check_share()" type="text" class="form-control"
                               id="mem_share" name="mem_share"
                               placeholder="শেয়ার সংখ্যা" pattern="[0-9]+" required>
                    </div>
                    <div class="col-xs-1">টি</div>
                    <span class="help-block" id="share_err_msg"></span>
                </div>

                <div class="form-group">
                    <label for="mem_money" class="col-md-4 control-label">টাকা</label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" id="mem_money" name="mem_money"
                               pattern="[0-9]+"
                               required>
                        <!--                        <span class="help-block">টাকার পরিমান লিখুন</span>-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="mem_part" class="col-md-4 control-label">মালিকানার অংশ</label>
                    <div class="col-md-8">
                        <input type="text" readonly class="form-control" id="mem_part" name="mem_part" required>
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="all_checked" id="all_checked" required> I have read the above
                        information and the relevant guidance notes.
                    </label>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-success btn-raised">কন্টিনিউ &rarr;</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>

<script>
    $(document).ready(function () {
        // alert('hbh');
        //check_age();
//        $('#mem_birth_date').blur(function () {
//            check_age();
//        });
    });

    $('#curr_division').change(function () {
        var div = $('#curr_division').val();
        console.log(div);
        $.ajax({
            url: '<?php echo site_url('somitee/get_dist'); ?>',
            type: 'POST',
            data: {
                div_id: div
            },
            success: function (data) {
                // console.log(data);
                var data1 = $.parseJSON(data);

                $('#curr_district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    //console.log(option_val);
                    $('#curr_district').append(option_val);
                });
            }
        });
    });

    $('#per_division').change(function () {
        var div = $('#per_division').val();
        console.log(div);
        $.ajax({
            url: '<?php echo site_url('somitee/get_dist'); ?>',
            type: 'POST',
            data: {
                div_id: div
            },
            success: function (data) {
                //  console.log(data);
                var data1 = $.parseJSON(data);

                $('#per_district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    //console.log(option_val);
                    $('#per_district').append(option_val);
                });
            }
        });
    });

    $('#curr_district').change(function () {
        var dist = $('#curr_district').val();
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
                    $('#curr_subdistrict').append(option_val);
                });
            }
        });
    });

    $('#per_district').change(function () {
        var dist = $('#per_district').val();
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

                $('#per-district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    //console.log(option_val);
                    $('#per_subdistrict').append(option_val);
                });
            }
        });
    });

    $('#imgInp').on('change', function () {
        var file_data = $('#imgInp').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        //alert(form_data);
        $.ajax({
            url: '<?php echo site_url('somitee/upload/p'); ?>',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);
                if (data1['msg'] == 1) {
                    // $('#up_msg').show();
                    var p = data1['path'].split('/');
                    // var p_ath = p[p.length - 1];
                    $('#mem-pp').attr('src', '<?php echo base_url();?>uploads/profile_pic/' + p[p.length - 1]);
                    document.getElementById('pro_pic_path').value = p[p.length - 1];
                } else if (data1['msg'] == 0) {
                    alert('folder does not exist');
                } else {
                    alert(data1['msg']);
                }
            }
        });
    });

    function check_nid() {
        var tmp_nid = $('#mem_nid').val();
        var s_id =<?php echo $s_info[0]['somitee_id'];?>;
        console.log('sid' + s_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/check_nid'); ?>',
            data: {
                nid: tmp_nid,
                somitee_id: s_id
            },
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    document.getElementById('mem_nid').value = '';
                    document.getElementById('nid_err_msg').innerHTML = 'This NID already exists..'
                    console.log('This NID already exists..');
                }

            }
        });
    }

    function check_address() {
        var c_div = $('#curr_division').val();
        var c_dist = $('#curr_district').val();
        var c_upz = $('#curr_subdistrict').val();
        var p_div = $('#per_division').val();
        var p_dist = $('#per_district').val();
        var p_upz = $('#per_subdistrict').val();

        var k_div =<?php echo $s_info[0]['somitee_kormo_div_id'];?>;
        var k_dist =<?php echo $s_info[0]['somitee_kormo_dist_id'];?>;
        var k_upz =<?php echo $s_info[0]['somitee_kormo_upz_id'];?>;

        console.log(c_div);
        console.log(c_dist);
        console.log(c_upz);
        console.log(p_div);
        console.log(p_dist);
        console.log(p_upz);
        console.log(k_div);
        console.log(k_dist);
        console.log(k_upz);


        if (k_div == c_div && k_dist == c_dist && k_upz == c_upz) {
            console.log('present');
            document.getElementById('address_err_msg').innerHTML = '';
            document.getElementById('address_err_msg_1').innerHTML = '';

        } else if (k_div == p_div && k_dist == p_dist && k_upz == p_upz) {
            console.log('permanent');

        } else {
            $("select option").prop("selected", false);
            document.getElementById('address_err_msg').innerHTML = 'বর্তমান ও স্থায়ী  ঠিকানার যে  কোনো  একটি কর্ম নির্বাচিনী এলাকা  হতে হবে ';
            document.getElementById('address_err_msg_1').innerHTML = 'বর্তমান ও স্থায়ী  ঠিকানার যে  কোনো  একটি কর্ম নির্বাচিনী এলাকা  হতে হবে ';
            console.log('not match');
        }
    }
    function check_share() {
        var tmp_share = $('#mem_share').val();
        var total_share =<?php echo $s_info[0]['somitee_share'];?>;
        var per_share_price =<?php echo $s_info[0]['somitee_per_share_price'];?>;
        var total_member =<?php echo $s_info[0]['member_number'];?>;
        console.log(total_member);
        console.log(total_share);
        console.log(per_share_price);

        var mem_money = (per_share_price * tmp_share);

        var percent = ( ( tmp_share * 100 ) / total_share);//((tmp_share * 100 ) / total_share);

        if (percent <= 20) {
            document.getElementById('mem_money').value = mem_money;
            document.getElementById('mem_part').value = percent;

        } else {
            document.getElementById('share_err_msg').innerHTML = ' এক জন মেম্বার ২০% এর  বেশি  শেয়ার  নিতে পারবে না ';
            document.getElementById('mem_share').value = '';
            document.getElementById('mem_money').value = '';
            document.getElementById('mem_part').value = '';
        }

        //check_address();

    }
    function check_age() {
        var tmp = $('#mem_birth_date').val().split('/');

        var age = getAge(tmp);
        console.log(age);

        if (age <= 17) {
            document.getElementById('mem_birth_date').value = '';
            //document.getElementById('dob_err_msg').value='mudt jfgi';
            document.getElementById('dob_err_msg').innerHTML = 'বয়স ১৮ বছর এর  ওপরে হতে হবে ';
        } else {
            document.getElementById('dob_err_msg').innerHTML = '';
            console.log(age);
        }

    }
    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
</script>
