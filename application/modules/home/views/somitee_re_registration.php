<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<?php $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'); ?>
<style>
    .newTable th {
        text-align: center;
    }

    .newTable-label {
        width: 30%;
        text-align: left;
    }

    .newTable-val {
        text-align: right;
    }
</style>
<div class="row">
    <!--loading div-->
    <div id="progress"
         style=" padding-top: 20%; padding-left: 45%;display: none; position: fixed; margin: 0px auto; top: 0;left: 0;z-index: 1000000;background-color: rgba(0,0,0,0.6);width: 100% !important;height: 100% !important;">
        <img style="width: 100px" src="<?php echo base_url(); ?>assets/loader1.gif"/>
    </div>
    <!--first page-->
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well" style="background-color: #BBDEFB; margin-bottom: 4px">সমবায়
            রি-রেজিস্ট্রেশন</h1>

        <form method="post" action="<?php echo site_url('home/somitee_re_registration_1'); ?>"
              class="form-horizontal reg-form-1 panel proposed-applicaion"
              id="re-reg-form-1">
            <input type="hidden" id="added_by" name="added_by">
            <div id="frst_page" style="display: block">
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
                                    <option data-mydata="<?= $row['bn_div_name'] ?>"
                                            value="<?= $row['div_id'] ?>"><?= $row['bn_div_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="division_err"></span>
                            <span style="color:peru"><br>বিভাগ<br></span>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-md-3">
                            <select onclick="select_upz()" name="district_name" id="district" class="form-control"
                                    required>

                                <option value="">জেলা</option>
                                <?php foreach ($district as $row) { ?>
                                    <option data-mydata="<?= $row['bn_dist_name'] ?>"
                                            value="<?php echo $row['dist_id']; ?>"><?php echo $row['bn_dist_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="district_err"></span>
                            <span style="color:peru"><br>জেলা<br></span>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-md-3">
                            <select name="upz_name" onchange="check_dco()" id="upz" class="form-control" required>
                                <option value="">উপজেলা/থানা</option>
                                <?php foreach ($upz as $row) { ?>
                                    <option data-mydata="<?= $row['bn_upz_name'] ?>"
                                            value="<?php echo $row['upz_id']; ?>"><?php echo $row['bn_upz_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="upz_err"></span>
                            <span style="color:peru"><br>উপজেলা/থানা<br></span>
                            <span id='upzzz' class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ward" class="col-md-4 control-label">ইউনিয়ন/ওয়ার্ড</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ward_name" id="ward"
                                   placeholder="ইউনিয়ন/ওয়ার্ড"
                                   required value="<?php if ($this->session->userdata('session_page') == '1') {
                                echo '' . $this->session->userdata('somitee_ward') . '';
                            } ?>">
                            <span style="color: red" id="ward_err"></span>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="others" class="col-md-4 control-label">বিস্তারিত ঠিকানা</label>
                        <div class="col-md-8">
                        <textarea name="others_name" id="others" rows="1"
                                  class="form-control"></textarea>
                            <span class="help-block">অপশনাল</span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>সমবায় এর নাম</legend>
                    <div class="form-group">
                        <label for="momiti_name" class="col-md-4 control-label">সমবায় এর নাম</label>
                        <div class="col-md-8">
                            <input type="text" name="somiti_name" id="somiti_name" class="form-control"
                                   placeholder="সমবায় এর নাম" required>
                            <span style="color: red" id="somiti_name_err"></span>
                        </div>
                    </div>
                </fieldset>
                <!--somitee class-->
                <fieldset>
                    <legend>সমবায় এর শ্রেণী</legend>
                    <div class="form-group">
                        <label for="org-type" class="col-md-4 control-label">সমবায় এর শ্রেণী</label>
                        <div class="col-md-8">
                            <select name="somitee_type_name" id="somitee_type" class="form-control" required="required">
                                <option value="">নির্বাচন করুন</option>
                                <option data-mydata="প্রাথমিক সমবায় সমিতি" value="1">প্রাথমিক সমবায় সমিতি</option>
                                <option data-mydata="কেন্দ্রীয় সমবায় সমিতি" value="2">কেন্দ্রীয় সমবায় সমিতি</option>
                                <option data-mydata="জাতীয় সমবায় সমিতি" value="3">জাতীয় সমবায় সমিতি</option>
                            </select>
                            <span style="color: red" id="somitee_type_err"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <select name="somitee_cat_name" id="somitee_cat" class="form-control" required>
                                <option value="0">সমবায় এর প্রকৃতি নির্বাচন করুন</option>
                                <?php foreach ($somitee_cat as $row) { ?>
                                    <option data-mydata="<?= $row['somitee_cat_name'] ?>"
                                            value="<?php echo $row['somitee_cat_id']; ?>"><?php echo $row['somitee_cat_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="somitee_cat_err"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <select name="somitee_cat_sub_name" id="somitee_cat_sub" class="form-control" required>
                                <option value="0">সমবায় এর প্রকার নির্বাচন করুন</option>
                                <?php foreach ($somitee_sub_cat as $row) { ?>
                                    <option data-mydata="<?= $row['somitee_sub_cat_name'] ?>"
                                            value="<?php echo $row['somitee_sub_cat_id']; ?>"><?php echo $row['somitee_sub_cat_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="somitee_cat_sub_err"></span>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>সমবায় এর প্রাথমিক তথ্য</legend>
                    <div class="form-group">
                        <label for="share_price" class="col-md-4 control-label">প্রতিটি শেয়ার মূল্য</label>
                        <div class="col-md-7">
                            <input type="text" name="share_price" id="share_price" class="form-control"
                                   required>
                            <span style="color: red" id="share_price_err"></span>
                            <span class="help-block"></span>
                        </div>
                        <div style="padding-top: 2%;">টাকা</div>
                    </div>
                    <div class="form-group">
                        <label for="share_qty" class="col-md-4 control-label">মোট শেয়ার সংখ্যা</label>
                        <div class="col-md-7">
                            <input type="text" name="share_qty" id="share_qty" class="form-control"
                                   required>
                            <span style="color: red" id="share_qty_err"></span>
                            <span class="help-block"></span>
                        </div>
                        <div style="padding-top: 2%;">টি</div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">অনুমোদিত শেয়ার মূলধন</label>
                        <div class="col-md-7">
                            <input readonly type="text" name="s_budget" id="s_budget" class="form-control" value="">
                        </div>
                        <div style="padding-top: 2%;">টাকা</div>
                    </div>
                    <div class="form-group">
                        <label for="sell_share_num" class="col-md-4 control-label">বিক্রিত শেয়ার সংখ্যা</label>
                        <div class="col-md-7">
                            <input type="text" name="sell_share_num" id="sell_share_num" class="form-control"
                                   required>
                            <span style="color: red" id="sell_share_num_err"></span>
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
                                <option value="">বিভাগ</option>
                                <?php foreach ($somitee_sodosso_division as $row) { ?>
                                    <option data-mydata="<?= $row['bn_div_name'] ?>"
                                            value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="sodosso_division_err"></span>
                            <span class="help-block"></span>
                        </div>
                        <div class="col-md-2">
                            <select onclick="select_sodosso_upz()" name="sodosso_district" id="sodosso_district"
                                    class="form-control" required>
                                <option value="">জেলা</option>
                                <?php foreach ($somitee_sodosso_district as $row) { ?>
                                    <option data-mydata="<?= $row['bn_dist_name'] ?>"
                                            value="<?php echo $row['dist_id']; ?>"><?php echo $row['bn_dist_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="sodosso_district_err"></span>
                            <span class="help-block"></span>
                        </div>
                        <div class="col-md-3">
                            <select name="sodosso_upz" id="sodosso_upz" class="form-control" required>
                                <option value="">উপজেলা/থানা</option>
                                <?php foreach ($somitee_sodosso_upz as $row) { ?>
                                    <option data-mydata="<?= $row['bn_upz_name'] ?>"
                                            value="<?php echo $row['upz_id']; ?>"><?php echo $row['bn_upz_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="sodosso_upz_err"></span>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="elected_ward" class="col-md-4 control-label">বিস্তারিত</label>
                        <div class="col-md-7">
                            <input type="text" name="elected_ward" id="elected_ward" class="form-control"
                                   placeholder="বিস্তারিত" required>
                            <span style="color: red" id="elected_ward_err"></span>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">সমবায়ের কর্ম এলাকা</label>
                        <div class="col-md-2">
                            <select onclick="select_kormo_district()" name="kormo_division" id="kormo_division"
                                    class="form-control" required>
                                <option value="">বিভাগ</option>
                                <?php foreach ($sodosso_kormo_division as $row) { ?>
                                    <option data-mydata="<?= $row['bn_div_name'] ?>"
                                            value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="kormo_division_err"></span>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-md-2">
                            <select onclick="select_kormo_upz()" name="kormo_district" id="kormo_district"
                                    class="form-control" required>
                                <option value="">জেলা</option>
                                <?php foreach ($sodosso_kormo_district as $row) { ?>
                                    <option data-mydata="<?= $row['bn_dist_name'] ?>"
                                            value="<?php echo $row['dist_id']; ?>"><?php echo $row['bn_dist_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="kormo_district_err"></span>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-md-3">
                            <select name="kormo_upz" id="kormo_upz" class="form-control" required>
                                <option value="">উপজেলা/থানা</option>
                                <?php foreach ($sodosso_kormo_upz as $row) { ?>
                                    <option data-mydata="<?php echo $row['bn_upz_name']; ?>"
                                            value="<?php echo $row['upz_id']; ?>"><?php echo $row['bn_upz_name']; ?></option>
                                <?php } ?>
                            </select>
                            <span style="color: red" id="kormo_upz_err"></span>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="elected_ward" class="col-md-4 control-label">বিস্তারিত</label>
                        <div class="col-md-7">
                            <input type="text" name="kormo_elected_ward" id="sodosso_elected_ward" class="form-control"
                                   placeholder="বিস্তারিত" required>
                            <span style="color: red" id="sodosso_elected_ward_err"></span>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="account_no" class="col-md-4 control-label">সমবায়ের ব্যাংক তথ্য</label>
                        <div class="col-md-7">
                            <input type="text" name="account_no" id="account_no" class="form-control"
                                   placeholder="ব্যাংক তথ্য" required>
                            <span style="color: red" id="account_no_err"></span>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="male_mem_no" class="col-md-4 control-label">পুরুষ সদস্য সংখ্যা</label>
                        <div class="col-md-7">
                            <input type="text" name="male_mem_no" id="male_mem_no" class="form-control"
                                   placeholder="পুরুষ সদস্য সংখ্যা" required>
                            <span style="color: red" id="male_mem_no_err"></span>
                            <span class="help-block"></span>
                        </div>
                        <div style="padding-top: 2%;">জন</div>
                    </div>
                    <div class="form-group">
                        <label for="female_mem_no" class="col-md-4 control-label">মহিলা সদস্য সংখ্যা</label>
                        <div class="col-md-7">
                            <input type="text" name="female_mem_no" id="female_mem_no" class="form-control"
                                   placeholder="মহিলা সদস্য সংখ্যা" required>
                            <span style="color: red" id="female_mem_no_err"></span>
                            <span class="help-block"></span>
                        </div>
                        <div style="padding-top: 2%;">জন</div>
                    </div>


                    <div style="display: none" class="form-group" id="frmERR">
                        <div class="col-md-8 col-md-offset-2 text-center label-danger" style="color: whitesmoke">
                            অনুগ্রহ করে সঠিক তথ্য প্রদান করুন
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button onclick="chkData()" class="btn btn-primary btn-raised" type="button">পরবর্তী পাতায়
                                যান<span></span>
                            </button>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div id="scnd_page" style="display: none">
                <fieldset>
                    <legend>ব্যবস্থাপনা কমিটির তথ্য</legend>
                    <br>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-0">
                            <div class="table-responsive">
                                <table class="table table-bordered newTable">
                                    <tr>
                                        <th style="width: 5%">ক্রমিক</th>
                                        <th style="">নাম</th>
                                        <th style="width: 35%">মোবাইল নং</th>
                                    </tr>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        ?>
                                        <tr>
                                            <td style="width: 5%"><?= str_replace(range(0, 9), $bn_digits, $i) ?></td>
                                            <td>
                                                <div class="form-group col-md-12">
                                                    <input type="text" id="ofcr_name_<?= $i ?>"
                                                           name="ofcr_name_<?= $i ?>" class="form-control"
                                                           placeholder="নাম" <?php if ($i <= 6) {
                                                        echo 'required';
                                                    } ?>>
                                                    <span style="color: red" id="ofcr_name_<?= $i ?>_err"></span>
                                                </div>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="form-group col-md-12">
                                                    <input type="text" id="ofcr_phn_<?= $i ?>" name="ofcr_phn_<?= $i ?>"
                                                           class="form-control"
                                                           placeholder="মোবাইল নং" <?php if ($i <= 6) {
                                                        echo 'required';
                                                    } ?>>
                                                    <span style="color: red" id="ofcr_phn_<?= $i ?>_err"></span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 col-md-offset-0 text-center">
                            <button type="button" onclick="get_frst_page()" class="btn btn-default btn-raised"
                                    style="">পূর্ববর্তী পাতায় যান
                            </button>
                            <button type="button" onclick="data_confirm()" class="btn btn-success btn-raised"
                                    style="color: whitesmoke;">সাবমিট
                            </button>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</div>

<!--Confiremation Modal-->
<div data-keyboard="false" data-backdrop="static" id="cnfrmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!--        modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid black; background-color: #BBDEFB">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="padding-bottom: 10px;" class="text-center modal-title">সমবায় রি-রেজিস্ট্রেশন</h4>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="table-responsive">
                        <h4 class="text-center">সমবায়ের সাধারণ তথ্য</h4>
                        <table class="table table-bordered col-md-12 newTable" id="cnfrm_tbl">
                        </table>
                        <h4 class="text-center">ব্যবস্থাপনা কমিটির তথ্য</h4>
                        <table class="table table-bordered col-md-12 text-center" id="cnfrm_tbl1">
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="cnfrm_click()" type="button" style="color: whitesmoke" class="btn btn-success">সাবমিট
                </button>
                <button type="button" style="color: whitesmoke" class="btn btn-deep-red" data-dismiss="modal">বাতিল
                </button>
            </div>
        </div>

    </div>
</div>
<div data-keyboard="false" data-backdrop="static" id="detailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid black; background-color: #BBDEFB">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="padding-bottom: 10px;" class="text-center modal-title">সমবায় রি-রেজিস্ট্রেশন এর জন্য অনুগ্রহ
                    করে লগইন করুন</h4>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="form-horizontal" id="user-login-form">
                        <fieldset>

                            <?php
                            if ($this->session->userdata('error') != "" || $this->session->userdata('error') != NULL) {
                                ?>
                                <div style="background-color:rgba(255, 0, 0, 0.71);">
                                    <p style="text-align: center; color: white;">
                                        <?php echo $this->session->userdata('error'); ?>
                                    </p>
                                </div>
                                <?php
                                $this->session->unset_userdata('error');
                            }
                            ?>

                            <div class="form-group">
                                <label for="nid" class="col-md-4 control-label">জাতীয় পরিচয়পত্র নং</label>
                                <div class="col-md-7">
                                    <input type="text" name="nid" class="form-control" id="nid"
                                           placeholder="১৭ ডিজিট এর জাতীয় পরিচয়পত্র  নং" minlength="11" maxlength="17"
                                           pattern="[0]+[1]+[0-9]+" required>
                                    <span class="help-block">অনুগ্ৰহপূর্বক বাংলায় লিখুন</span>
                                </div>
                            </div><!-- /form-group -->

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">পাসওয়ার্ড</label>
                                <div class="col-md-7">
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="মোবাইল এ প্রেরিত আপনার ৭ ডিজিটের পাসওয়ার্ড" required>
                                    <span class="help-block">আপনার ৭ ডিজিটের পাসওয়ার্ড</span>
                                </div>
                            </div><!-- /form-group -->


                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-4">
                                    <button type="button" onclick="chklogin()" class="btn btn-success btn-raised">লগইন
                                    </button>
                                </div>
                            </div><!-- /form-group -->
                        </fieldset>
                    </div>
                </div>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button onclick="cnfrm_click()" type="button" style="color: whitesmoke" class="btn btn-success">সাবমিট-->
            <!--                </button>-->
            <!--                <button type="button" style="color: whitesmoke" class="btn btn-deep-red" data-dismiss="modal">বাতিল-->
            <!--                </button>-->
            <!--            </div>-->
        </div>

    </div>
</div>

<?php $this->load->view('public_layouts/footer'); ?>

<script>
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

    function select_district() {
        var div = $('#division').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/get_dist');?>',
            data: {
                div_id: div
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#district').find("option:gt(0)").remove();
                $('#upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option data-mydata="' + value['bn_dist_name'] + '" value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    $('#district').append(option_val);
                });
            }
        });
    }
    function chklogin() {
        var nid = $('#nid').val();
        var password = $('#password').val();
        $.ajax({
            url: '<?php echo site_url('home/check_login_modal');?>',
            type: 'POST',
            data: {
                'nid': nid,
                'password': password
            }, success: function (data) {
                console.log(data);
                if (data == 0) {
                    alert('o');
                } else {
                    //alert('not 0');
                    $('#added_by').val(data);
                    $('#re-reg-form-1').submit();
                }

            }
        });
    }
    function select_upz() {
        var dist = $('#district').val();
        console.log(dist);
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/get_upz');?>',
            data: {
                dist_id: dist
            }, success: function (data) {
                console.log(data);
                data1 = $.parseJSON(data);

                $('#upz').find("option:gt(0)").remove();
                if (data1['res'].length == 0) {
                    var x = document.getElementById('upzzz');
                    x.style.color = "red";
//                    x.innerHTML = "অনলাইন সমবায় নিবন্ধন বন্ধ আছে।<br>";
                } else {
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option data-mydata="' + value['bn_upz_name'] + '" value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                        $('#upz').append(option_val);
                    });
                    var x = document.getElementById('upzzz');
                    x.style.color = "black";
                    x.innerHTML = "";
                }
            }
        });
    }
    $('#upz').change(function () {
        var dist = $('#district').val();
        //alert(s_cat);
        $.ajax({
            url: '<?php echo site_url('home/check_dco'); ?>',
            type: 'POST',
            data: {
                dist_id: dist
            },
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);

                //$('#somitee_cat_sub').find("option:gt(0)").remove();
                if (data1['res'].length == 0) {
                    var x = document.getElementById('district_err');
                    x.style.color = "red";
                    x.innerHTML = "উক্ত জেলায় কোনো ডিসিও নেই<br>";
                } else {
                    var x = document.getElementById('district_err');
                    x.style.color = "black";
                    x.innerHTML = "";
                }
            }
        });
    });

//    function check_dco() {
//        var dist = $('#district').val();
//        console.log(dist);
//        $.ajax({
//            type: 'POST',
//            url: '<?php //echo site_url('home/check_dco');?>//',
//            data: {
//                dist_id: dist
//            }, success: function (data) {
//                console.log(data);
//                data1 = $.parseJSON(data);
//
//                //$('#upz').find("option:gt(0)").remove();
//                if (data1['res'].length == 0) {
//                    var x = document.getElementById('upzzz');
//                    x.style.color = "red";
//                    x.innerHTML = "উক্ত জেলায় কোনো ডিসিও নেই<br>";
//                } else {
//                    var x = document.getElementById('upzzz');
//                    x.style.color = "black";
//                    x.innerHTML = "";
//                }
//            }
//        });
//    }

    function select_sodosso_district() {
        var div = $('#sodosso_division').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/get_dist');?>',
            data: {
                div_id: div
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#sodosso_district').find("option:gt(0)").remove();
                $('#sodosso_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option data-mydata="' + value['bn_dist_name'] + '" value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    $('#sodosso_district').append(option_val);
                });
            }
        });
    }
    function select_sodosso_upz() {
        var dist = $('#sodosso_district').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/get_upz');?>',
            data: {
                dist_id: dist
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#sodosso_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option data-mydata="' + value['bn_upz_name'] + '" value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    $('#sodosso_upz').append(option_val);
                });
            }
        });
    }

    function select_kormo_district() {
        var div = $('#kormo_division').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/get_dist');?>',
            data: {
                div_id: div
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#kormo_district').find("option:gt(0)").remove();
                $('#kormo_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option data-mydata="' + value['bn_dist_name'] + '" value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    $('#kormo_district').append(option_val);
                });
            }
        });
    }
    function select_kormo_upz() {
        var dist = $('#kormo_district').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('home/get_upz');?>',
            data: {
                dist_id: dist
            }, success: function (data) {
                data1 = $.parseJSON(data);

                $('#kormo_upz').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option data-mydata="' + value['bn_upz_name'] + '" value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    $('#kormo_upz').append(option_val);
                });
            }
        });
    }

    function cal_budget() {
        var per_share_price = document.getElementById('share_price').value;
        var share_qnt = document.getElementById('share_qty').value;

        if (per_share_price == '' || per_share_price == null || per_share_price.replace(/\s+/g, '') == '') {
            per_share_price = 0;
        } else {
            per_share_price = (per_share_price + '').getDigitEnglishFromBangla();
        }

        if (share_qnt == '' || share_qnt == null || share_qnt.replace(/\s+/g, '') == '') {
            share_qnt = 0;
        } else {
            share_qnt = (share_qnt + '').getDigitEnglishFromBangla();
        }

        if (per_share_price != '' && share_qnt != '') {
            var s_budget = per_share_price * share_qnt;
            document.getElementById('s_budget').value = (s_budget + '').getDigitBanglaFromEnglish();
        }
    }
    function cal_budget2() {
        var per_share_price = document.getElementById('share_price').value;
        var share_qnt = document.getElementById('sell_share_num').value;

        per_share_price = (per_share_price + '').getDigitEnglishFromBangla();
        share_qnt = (share_qnt + '').getDigitEnglishFromBangla();

        if (per_share_price != '' && share_qnt != '') {
            var s_budget = per_share_price * share_qnt;
            document.getElementById('s_sell_budget').value = (s_budget + '').getDigitBanglaFromEnglish();
        }
    }

    $('#somitee_cat').change(function () {
        var s_cat = $('#somitee_cat').val();
        //alert(s_cat);
        $.ajax({
            url: '<?php echo site_url('home/get_sub_cat'); ?>',
            type: 'POST',
            data: {
                cat_id: s_cat
            },
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);

                $('#somitee_cat_sub').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option data-mydata="' + value['somitee_sub_cat_name'] + '" value="' + value['somitee_sub_cat_id'] + '">' + value['somitee_sub_cat_name'] + '</option>';
                    //console.log(option_val);
                    $('#somitee_cat_sub').append(option_val);
                });
            }
        });
    });

    $(document).ready(function () {
        cal_budget();
        cal_budget2();

        $('#somitee_type').change(function () {
            selection = $(this).val();
            switch (selection) {
                case '1':
                    $('#somitee_cat').show();
                    $('#somitee_cat_err').show();
                    $('#somitee_cat_sub').show();
                    $('#somitee_cat_sub_err').show();
                    break;
                default:
                    $('#somitee_cat').hide();
                    $('#somitee_cat_err').hide();
                    $('#somitee_cat_sub').hide();
                    $('#somitee_cat_sub_err').hide();
                    break;
            }
        });

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

    });

    function get_frst_page() {
        $('#frst_page').show();
        $('#scnd_page').hide();
    }

    function data_confirm() {
        $('#progress').show();

        setTimeout(function () {
            $('#progress').hide()
        }, 500);

        var flag = true;

        for (var i = 1; i <= 6; i++) {
            var ofc_name = $('#ofcr_name_' + i).val();
            var ofc_phn = $('#ofcr_phn_' + i).val();

            if (ofc_name == '' || ofc_name == null || ofc_name.replace(/\s+/g, '') == '') {
                flag = false;
                $('#ofcr_name_' + i + '_err').text('আবশ্যক');
            } else {
                $('#ofcr_name_' + i + '_err').text('');
            }

            if (isNaN(ofc_phn.getDigitEnglishFromBangla()) || ofc_phn == '' || ofc_phn == null || ofc_phn.replace(/\s+/g, '') == '') {
                flag = false;
                $('#ofcr_phn_' + i + '_err').text('আবশ্যক');
            } else {
                $('#ofcr_phn_' + i + '_err').text('');
            }
        }

        if (flag) {
            var trow = '<tr>'
                + '<td class="newTable-label">সমবায় এর নাম</td>'
                + '<td>' + $('#somiti_name').val() + '</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">সমবায় এর কার্যালয়ের ঠিকানা</td>'
                + '<td>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">বিভাগ</div>'
                + '<div class="col-md-7 text-left" >: ' + $('#division').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">জেলা</div>'
                + '<div class="col-md-7 text-left">: ' + $('#district').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">উপজেলা/থানা</div>'
                + '<div class="col-md-7 text-left">: ' + $('#upz').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">ইউনিয়ন/ওয়ার্ড</div>'
                + '<div class="col-md-7 text-left">: ' + $('#ward').val() + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">বিস্তারিত</div>'
                + '<div class="col-md-7 text-left">: ' + $('#others').val() + '</div>'
                + '</div>'
                + '</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">সমবায় এর শ্রেণী</td>'
                + '<td>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">শ্রেণী</div>'
                + '<div class="col-md-7 text-left" >: ' + $('#somitee_type').find(':selected').data('mydata') + '</div>'
                + '</div>';

            var cls = $('#somitee_type').val();
            if (cls == 1) {
                trow += '<div class="row col-md-12">'
                    + '<div class="col-md-4">প্রকৃতি</div>'
                    + '<div class="col-md-7 text-left" >: ' + $('#somitee_cat').find(':selected').data('mydata') + '</div>'
                    + '</div>'
                    + '<div class="row col-md-12">'
                    + '<div class="col-md-4">প্রকার</div>'
                    + '<div class="col-md-7 text-left" >: ' + $('#somitee_cat_sub').find(':selected').data('mydata') + '</div>'
                    + '</div>';
            }
            trow += '</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">প্রতিটি শেয়ার মূল্য</td>'
                + '<td>' + $('#share_price').val().getDigitBanglaFromEnglish() + ' টাকা</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">প্রস্তাবিত মোট শেয়ার সংখ্যা</td>'
                + '<td>' + $('#share_qty').val().getDigitBanglaFromEnglish() + ' টি</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">প্রস্তাবিত অনুমোদিত শেয়ার মূলধন</td>'
                + '<td>' + $('#s_budget').val().getDigitBanglaFromEnglish() + ' টাকা</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">বিক্রিত শেয়ার সংখ্যা</td>'
                + '<td>' + $('#sell_share_num').val().getDigitBanglaFromEnglish() + ' টি</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">পরিশোধিত শেয়ার মূলধন</td>'
                + '<td>' + $('#s_sell_budget').val().getDigitBanglaFromEnglish() + ' টাকা</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">সদস্য নির্বাচনী এলাকা</td>'
                + '<td>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">বিভাগ</div>'
                + '<div class="col-md-7 text-left" >: ' + $('#sodosso_division').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">জেলা</div>'
                + '<div class="col-md-7 text-left">: ' + $('#sodosso_district').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">উপজেলা/থানা</div>'
                + '<div class="col-md-7 text-left">: ' + $('#sodosso_upz').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">বিস্তারিত</div>'
                + '<div class="col-md-7 text-left">: ' + $('#elected_ward').val() + '</div>'
                + '</div>'
                + '</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">সমবায়ের কর্ম এলাকা</td>'
                + '<td>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">বিভাগ</div>'
                + '<div class="col-md-7 text-left" >: ' + $('#kormo_division').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">জেলা</div>'
                + '<div class="col-md-7 text-left">: ' + $('#kormo_district').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">উপজেলা/থানা</div>'
                + '<div class="col-md-7 text-left">: ' + $('#kormo_upz').find(':selected').data('mydata') + '</div>'
                + '</div>'
                + '<div class="row col-md-12">'
                + '<div class="col-md-4">বিস্তারিত</div>'
                + '<div class="col-md-7 text-left">: ' + $('#sodosso_elected_ward').val() + '</div>'
                + '</div>'
                + '</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">সমবায়ের ব্যাংক তথ্য</td>'
                + '<td>' + $('#account_no').val() + '</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">পুরুষ সদস্য সংখ্যা</td>'
                + '<td>' + $('#male_mem_no').val().getDigitBanglaFromEnglish() + ' জন</td>'
                + '</tr>'
                + '<tr>'
                + '<td class="newTable-label">মহিলা সদস্য সংখ্যা</td>'
                + '<td>' + $('#female_mem_no').val().getDigitBanglaFromEnglish() + ' জন</td>'
                + '</tr>';

            $('#cnfrm_tbl').html(trow);

            var trow1 = '<tr>'
                + '<th style="text-align: center">ক্রমিক</th>'
                + '<th style="text-align: center">নাম</th>'
                + '<th style="text-align: center">মোবাইল নং</th>'
                + '</tr>';

            for (var i = 1; i <= 12; i++) {
                var ofc_name = $('#ofcr_name_' + i).val();
                var ofc_phn = $('#ofcr_phn_' + i).val();

                if (ofc_name != '') {
                    trow1 += '<tr>'
                        + '<td>' + (i + '').getDigitBanglaFromEnglish() + '</td>'
                        + '<td>' + ofc_name + '</td>'
                        + '<td>' + ofc_phn + '</td>'
                        + '</tr>';
                }
            }

            $('#cnfrm_tbl1').html(trow1);

//            var isRegId = '<?//=$this->session->userdata('reg_id')?>//';
//            var isType = '<?//=$this->session->userdata('type')?>//';
//            var isNid = '<?//=$this->session->userdata('nid')?>//';
            $('#cnfrmModal').modal('show');

        }
    }

    function cnfrm_click() {
        $('#progress').show();
        $('#cnfrmModal').modal('hide');
        setTimeout(function () {
            $('#progress').hide()
        }, 500);
        var isRegId = '<?=$this->session->userdata('reg_id')?>';
        var isType = '<?=$this->session->userdata('type')?>';
        var isNid = '<?=$this->session->userdata('nid')?>';
        if (isRegId == '' || isRegId == null || isType == '' || isType == null || isNid == '' || isNid == null) {
            $('#detailsModal').modal('show');
        } else {
            //alert('submit');
            $('#added_by').val(isRegId);
            $('#re-reg-form-1').submit();
        }
    }

    function last_click() {
        $('#progress').show();

        $('#infoModal').modal('hide');

        setTimeout(function () {
            $('#progress').hide()
        }, 1000);

        //setTimeout(showpanel, 500);

        $('#frst_page').hide();
        $('#scnd_page').show();

        //$('#re-reg-form-1').submit();
    }

    function chkData() {
        var flag = true;
        var sh_qty = $('#share_qty').val();
        var s_share_num = $('#sell_share_num').val();
//        if(s_share_num > sh_qty)
//        {
//            flag = false;
//            $('#sell_share_num_err').text('বিক্রীত শেয়ার সংখ্যা মোট শেয়ার সংখ্যার থেকে কম অথবা সমান হতে হবে');
//        }
//        else {
//            $('#sell_share_num_err').text('');
//        }
        var t_div = $('#division').val();
        if (t_div == 0) {
            flag = false;
            $('#division_err').text('আবশ্যক');
        } else {
            $('#division_err').text('');
        }

        var t_dist = $('#district').val();
        if (t_dist == 0) {
            flag = false;
            $('#district_err').text('আবশ্যক');
        } else {
            $('#district_err').text('');
        }

        var t_upz = $('#upz').val();
        if (t_upz == 0) {
            flag = false;
            $('#upz_err').text('আবশ্যক');
        } else {
            $('#upz_err').text('');
        }

        var t_ward = $('#ward').val();
        if (t_ward == 0 || t_ward == '' || t_ward == null || t_ward.replace(/\s+/g, '') == '') {
            flag = false;
            $('#ward_err').text('আবশ্যক');
        } else {
            $('#ward_err').text('');
        }

        var t_class = $('#somitee_type').val();
        if (t_class == 0 || t_class == '') {
            flag = false;
            $('#somitee_type_err').text('শ্রেণী নির্বাচন করুন');
        } else {
            $('#somitee_type_err').text('');
            if (t_class == 1) {
                var t_cat = $('#somitee_cat').val();
                if (t_cat == 0 || t_cat == '') {
                    flag = false;
                    $('#somitee_cat_err').text('প্রকৃতি নির্বাচন করুন');
                } else {

                }

                var t_cat_sub = $('#somitee_cat_sub').val();
                if (t_cat_sub == 0 || t_cat_sub == '') {
                    flag = false;
                    $('#somitee_cat_sub_err').text('প্রকার নির্বাচন করুন');
                } else {

                }
            } else {
                $('#somitee_cat_err').text('');
                $('#somitee_cat_sub_err').text('');
            }
        }

        var t_share_price = $('#share_price').val();
        if (isNaN(t_share_price.getDigitEnglishFromBangla()) || t_share_price.replace(/\s+/g, '') == '') {
            flag = false;
            $('#share_price_err').text('আবশ্যক');
        } else {
            $('#share_price_err').text('');
        }

        var t_share_qty = $('#share_qty').val();
        if (isNaN(t_share_qty.getDigitEnglishFromBangla()) || t_share_qty.replace(/\s+/g, '') == '') {
            flag = false;
            $('#share_qty_err').text('আবশ্যক');
        } else {
            $('#share_qty_err').text('');
        }

        var t_sell_share_num = $('#sell_share_num').val();
        if (isNaN(t_sell_share_num.getDigitEnglishFromBangla()) || t_sell_share_num.replace(/\s+/g, '') == '') {
            flag = false;
            $('#sell_share_num_err').text('আবশ্যক');
        }else if(parseInt(t_sell_share_num)>parseInt(t_share_qty)){
            flag = false;
            $('#sell_share_num_err').text('বিক্রীত শেয়ার সংখ্যা মোট শেয়ার সংখ্যার থেকে কম অথবা সমান হতে হবে');
        }
        else {
            $('#sell_share_num_err').text('');
        }

        console.log('sell='+t_sell_share_num);
        console.log('yyl='+t_share_qty);


        var t_sodosso_division = $('#sodosso_division').val();
        if (t_sodosso_division == 0) {
            flag = false;
            $('#sodosso_division_err').text('আবশ্যক');
        } else {
            $('#sodosso_division_err').text('');
        }
        var t_sodosso_district = $('#sodosso_district').val();
        if (t_sodosso_district == 0) {
            flag = false;
            $('#sodosso_district_err').text('আবশ্যক');
        } else {
            $('#sodosso_district_err').text('');
        }

        var t_sodosso_upz = $('#sodosso_upz').val();
        if (t_sodosso_upz == 0) {
            flag = false;
            $('#sodosso_upz_err').text('আবশ্যক');
        } else {
            $('#sodosso_upz_err').text('');
        }

        var t_elected_ward = $('#elected_ward').val();
        if (t_elected_ward == null || t_elected_ward.replace(/\s+/g, '') == '') {
            flag = false;
            $('#elected_ward_err').text('আবশ্যক');
        } else {
            $('#elected_ward_err').text('');
        }

        var t_kormo_division = $('#kormo_division').val();
        if (t_kormo_division == 0) {
            flag = false;
            $('#kormo_division_err').text('আবশ্যক');
        } else {
            $('#kormo_division_err').text('');
        }
        var t_kormo_district = $('#kormo_district').val();
        if (t_kormo_district == 0) {
            flag = false;
            $('#kormo_district_err').text('আবশ্যক');
        } else {
            $('#kormo_district_err').text('');
        }

        var t_kormo_upz = $('#kormo_upz').val();
        if (t_kormo_upz == 0) {
            flag = false;
            $('#kormo_upz_err').text('আবশ্যক');
        } else {
            $('#kormo_upz_err').text('');
        }

        var t_sodosso_elected_ward = $('#sodosso_elected_ward').val();
        if (t_sodosso_elected_ward == null || t_sodosso_elected_ward.replace(/\s+/g, '') == '') {
            flag = false;
            $('#sodosso_elected_ward_err').text('আবশ্যক');
        } else {
            $('#sodosso_elected_ward_err').text('');
        }

        var t_account_no = $('#account_no').val();
        if (t_account_no == null || t_account_no.replace(/\s+/g, '') == '') {
            flag = false;
            $('#account_no_err').text('আবশ্যক');
        } else {
            $('#account_no_err').text('');
        }

        var dist_id = $('#district').val();
        var t_name = $('#somiti_name').val();
        if (t_name == null || t_name.replace(/\s+/g, '') == '') {
            flag = false;
            $('#somiti_name_err').text('আবশ্যক');
        } else {
            $.ajax({
                url: '<?php echo site_url('home/chk_somitee_name');?>',
                type: 'post',
                data: {
                    name: t_name,
                    dist: dist_id
                }, success: function (data) {
                    //alert(data);
                    if (data == 0) {//0=no somitee
                        $('#somiti_name_err').text('');
                    } else {//!0=has somitee
                        flag = false;
                        $('#somiti_name_err').text('উপরোক্ত নামে ইতিমধ্যে সমবায় রেজিস্ট্রেশন করা রয়েছে। অনুগ্রহ করে সঠিক তথ্য প্রদান করুন।');
                    }
                }
            });
        }

        $('#progress').show();
        setTimeout(function () {
            $('#progress').hide()
        }, 300);
        if (flag) {
            $('#frmERR').hide();
            $('#frst_page').hide();
            $('#scnd_page').show();
            //$('#infoModal').modal('show');
        } else {
            $('#frmERR').show();
            $('#frst_page').show();
            $('#scnd_page').hide();
        }

    }
</script>