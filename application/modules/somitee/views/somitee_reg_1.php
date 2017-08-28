<?php //include 'layouts/registered_user_header.php';      ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">সমিতি প্রাথমিক আবেদন</h1>
        <form method="post" action="<?php echo site_url('somitee/somitee_registration_2');?>" class="form-horizontal reg-form-1 panel" id="reg-form-1">
            <input type="hidden" name="s_reg1" value="1">
            <fieldset>
                <legend>১. সমিতির ঠিকানা</legend>
                <hr>
                <div class="form-group">
                    <label for="division" class="col-md-4 control-label">বিভাগ</label>
                    <div class="col-md-8">
                        <select name="division" id="division" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($division as $row) { ?>
                                <option value="<?php echo $row['div_id']; ?>" <?php if($this->session->userdata('session_page')=='1'){ if($this->session->userdata('somitee_div_id')==$row['div_id']){echo "selected";}}?>><?php echo $row['bn_div_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="district" class="col-md-4 control-label">জেলা</label>
                    <div class="col-md-8">
                        <select name="district" id="district" class="form-control" required>

                            <option value="">--</option>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="upz" class="col-md-4 control-label">উপজেলা/মেট্রো থানা</label>
                    <div class="col-md-8">
                        <select name="upz" id="upz" class="form-control" required>
                            <option value="">--</option>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ward" class="col-md-4 control-label">ইউনিয়ন/ওয়ার্ড</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="ward" id="ward" placeholder="ইউনিয়ন/ওয়ার্ড" required <?php if($this->session->userdata('session_page')=='1'){ echo 'value="'.$this->session->userdata('').'"';}?>>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="others" class="col-md-4 control-label">অন্যান্য</label>
                    <div class="col-md-8">
                        <textarea name="others" id="others" rows="2" class="form-control"></textarea>
                        <span class="help-block">অপশনাল</span>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>২. সমিতির নাম</legend>
                <hr>

                <div class="form-group">
                    <label for="momiti_name" class="col-md-4 control-label">সমিতির নাম</label>
                    <div class="col-md-8">
                        <input onblur="check_somitee_name()" type="text" name="momiti_name" id="momiti_name" class="form-control" value="" required>
                        <span class="help-block">সমিতির নামে "সমবায়" এবং "লিঃ" শব্দ থাকতে হবে <br>
                            সমিতির নামে কমার্স/ব্যাংক ইত্যাদি শব্দ থাকবে না</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="org-type" class="col-md-4 control-label">সমিতির শ্রেণী</label>
                    <div class="col-md-8">
                        <select name="org-type" id="somitee_type" class="form-control" required>
                            <option value="0">নির্বাচন করুন</option>
                            <option value="1">প্রাথমিক সমবায় সমিতি</option>
                            <option value="2">কেন্দ্রীয় সমবায় সমিতি</option>
                            <option value="3">জাতীয় সমবায় সমিতি</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <select name="org-type-in" id="somitee_cat" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($somitee_cat as $row) { ?>
                                <option value="<?php echo $row['somitee_cat_id']; ?>" <?php if($this->session->userdata('session_page')=='1'){ if($this->session->userdata('somitee_cat_id')==$row['somitee_cat_id']){echo "selected";}}?>><?php echo $row['somitee_cat_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <select name="org-type-inner-most" id="somitee_cat_sub" class="form-control" required>
                            <option value="">--</option>
                        </select>
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

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button class="btn btn-primary btn-raised" type="submit">সেভ করুন এবং পরবর্তী পাতায় যান <span>&rarr;</span></button>
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
            url: '<?php echo site_url('doc/get_dist'); ?>',
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
            url: '<?php echo site_url('doc/get_upz'); ?>',
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