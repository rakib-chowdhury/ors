<?php //include 'layouts/registered_user_header.php';     ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">সমিতি প্রাথমিক আবেদন</h1>
        <form method="post" action="<?php echo site_url('somitee/somitee_registration_post'); ?>" class="form-horizontal reg-form-1 panel">
            <input type="hidden" name="s_reg2" value="1">
            <fieldset>
                <legend>৩. সমিতির তথ্য</legend>
                <hr>
                <div class="form-group">
                    <label for="share_price" class="col-md-4 control-label">শেয়ার মূল্য</label>
                    <div class="col-md-8">
                        <input type="text" name="share_price" id="share_price" class="form-control" value="" pattern= "[0-9]+" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="share_qty" class="col-md-4 control-label">শেয়ার সংখ্যা</label>
                    <div class="col-md-8">
                        <input type="text" name="share_qty" id="share_qty" class="form-control" value="" pattern= "[0-9]+" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>৪. সদস্য নির্বাচনী এলাকা</legend>
                <hr>

                <div class="form-group">
                    <label for="elected_division" class="col-md-4 control-label">বিভাগ</label>
                    <div class="col-md-8">
                        <select name="elected_division" id="elected_division" class="form-control" required>
                            <option>--</option>
                            <?php foreach ($division as $row) { ?>
                                <option value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="elected_district" class="col-md-4 control-label">জেলা</label>
                    <div class="col-md-8">
                        <select name="elected_district" id="elected_district" class="form-control" required>
                            <option value="">--</option>  
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="elected_subdistrict" class="col-md-4 control-label">উপজেলা/মেট্রো থানা</label>
                    <div class="col-md-8">
                        <select name="elected_subdistrict" id="elected_subdistrict" class="form-control" required>
                            <option value="">--</option>  
                        </select>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
<!--                <div class="form-group">
                    <label for="elected_ward" class="col-md-4 control-label">ইউনিয়ন/ওয়ার্ড</label>
                    <div class="col-md-8">
                        <input type="text" name="elected_ward" class="form-control" placeholder="ইউনিয়ন/ওয়ার্ড" required>
                        <span class="help-block">আবশ্যক</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="elected_others" class="col-md-4 control-label">অন্যান্য</label>
                    <div class="col-md-8">
                        <textarea name="elected_others" id="elected_others" rows="2" class="form-control"></textarea>
                        <span class="help-block">অপশনাল</span>
                    </div>
                </div>-->


            </fieldset>
            <fieldset>
                <legend>৫. সমিতি গঠনের উদ্দেশ্য</legend>
                <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea name="purpose" id="purpose"  rows="5" class="form-control" placeholder="সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন"></textarea>

                        <span class="help-block">সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> উপরের প্রদত্ত সকল তথ্য সঠিক
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6">
                        <a href="<?php echo site_url('somitee/somitee_registration'); ?>" class="btn btn-default btn-raised pull-right">&larr; পূর্বের পৃষ্ঠা সংশোধন করুন</a> 
                    </div>
                    <div class="col-md-6">
                        <button name="btn_val" value="save" class="btn btn-primary btn-raised pull-left" type="submit">সাবমিট করুন</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>

<script>

    $('#elected_division').change(function () {
        var div = $('#elected_division').val();
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
            url: '<?php echo site_url('doc/get_upz'); ?>',
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