<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<style>
    .myinput_text {
        border: none;
        background: none;
        width: 40%;
        display: inline-block;
        resize: none;
    }

    .myselect_text {
        width: 40%;
        display: inline-block;
        -webkit-appearance: none;
        -moz-appearance: none;
        border: medium none;

    }

    .fixed_width {
        width: 12%;
        font-weight: 400;
    }
</style>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-12 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts_uco_dco/secondary-nav'); ?>

                <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
                    <div style="margin-bottom: 10px;">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url('dco') ?>">হোম</a></li>
                            <?php if($s_type == 'search'){
                            }else{?>
                            <li>
                                <?php
                                if ($s_type == 'new') {
                                    echo '<a href="' . base_url('dco/new_somitee_list') . '">নতুন সমবায় তালিকা</a>';
                                } elseif ($s_type == 'all') {
                                    echo '<a href="' . base_url('dco/all_somitee_list') . '">সকল সমবায় তালিকা</a>';
                                } else if ($s_type == 'selected') {
                                    echo '<a href="' . base_url('dco/success_somitee_list') . '">সফল সমবায় তালিকা</a>';
                                } else if ($s_type == 'reject') {
                                    echo '<a href="' . base_url('dco/reject_somitee_list') . '">বাতিল সমবায় তালিকা</a>';
                                } else if ($s_type == 'appeal') {
                                    echo '<a href="' . base_url('dco/appeal_somitee_list') . '">আপীল সমবায় তালিকা</a>';
                                }
                                ?>
                            </li>
                            <?php } ?>
                            <li class="active">সমবায়ের বিস্তারিত তথ্য</li>
                        </ol>
                    </div>

                    <?php if ($comment_err == 1) { ?>
                    <div id="track_div" class="col-md-6 col-md-offset-3">
                        <div class="alert alert-danger" role="alert">
                            অনুগ্রহ করে ফাইল আপলোড অথবা মন্তব্য করুন
                        </div>
                    </div>
                    <?php } ?>


                    <ul class="list-inline">
                        <li><h3>সমবায় এর নামঃ <?php echo $somitee_info['0']['somitee_name']; ?></h3></li>
                        <li class="pull-right text-center">
                            <div id="dwnloadDiv" style="width: 200px; background-color: #337ab7;"
                                 onmouseover="chngBckgrndIn(this.id)" onmouseleave="chngBckgrndOut(this.id)">
                                <b>
                                    <a id="linkTag" style="text-decoration:none; color: whitesmoke"
                                       href="<?php echo site_url('dco/dco_download_user_info/' . $somitee_info[0]['somitee_id']); ?>">আপনার
                                        সমবায় সম্পর্কিত তথ্য এখানে <span style="color:red;">ডাউনলোড <i
                                                    class="fa fa-file-pdf-o" aria-hidden="true"></i></span> করুন</a></b>
                            </div>
                        </li>
                    </ul>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="heading-title">সংগঠকের তথ্য </h4>
                        </div>
                        <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered">
                            <tr>
                                <td width="40%">নাম</td>
                                <td><?php echo $leader_info[0]['user_name']; ?></td>
                            </tr>
                            <tr>
                                <td>ভোটার আই ডি</td>
                                <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['user_nid']); ?></td>
                            </tr>
                            <tr>
                                <td>ইমেইল</td>
                                <td><?php echo $leader_info[0]['user_email']; ?></td>
                            </tr>
                            <tr>
                                <td>ফোন</td>
                                <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['user_phone']); ?></td>
                            </tr>
                        </table>
                    </div><!-- /panel -->
                </div>


                <div class="col-md-8 col-md-offset-2">
                    <form action="<?=base_url();?>dco/update_somitee_info_by_dco" method="post">
                        <div class="panel panel-success">
                            <div class="panel-heading" style="overflow: hidden">
                                <h4 class="heading-title col-md-10">সমবায় সম্পর্কিত সাধারণ তথ্য</h4>

<!--                                <a style="cursor: pointer" onclick="pressEdit()"-->
<!--                                   class="col-md-1 btn btn-warning btn-xs">Edit</a>-->
<!--                                <button type="submit" onsubmit="return checkEdit()"-->
<!--                                        class="col-md-1 btn btn-success btn-xs">Update-->
<!--                                </button>-->
                            </div>
                            <table style="border: 1px solid #ddd;"
                                   class="table table-stripped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="40%">নাম</td>
                                    <td>
                                               <?php echo $somitee_info['0']['somitee_name']; ?>
                                    </td>
                                </tr>
                                <input type="hidden" name="somitee_id" value="<?=$somitee_info[0]['somitee_id'];?>">
                                <tr>
                                    <td>শ্রেণী</td>
                                    <td><label class="fixed_width">শ্রেণী:</label>
                                        <select name="org-type" onchange="upload_tmp_file()" id="somitee_type"
                                                class="form-control myselect_text myinput_text" required="required">
                                            <option value="0">নির্বাচন করুন</option>
                                            <option value="1" <?php  if ($somitee_info['0']['somitee_type_id'] == 1) {
                                                echo "selected";
                                            }?>>
                                                প্রাথমিক সমবায় সমিতি
                                            </option>
                                            <option value="2" <?php  if ($somitee_info['0']['somitee_type_id'] == 2) {
                                                echo "selected";
                                            }?>>
                                                কেন্দ্রীয় সমবায় সমিতি
                                            </option>
                                            <option value="3" <?php  if ($somitee_info['0']['somitee_type_id'] == 3) {
                                                echo "selected";
                                            }?>>
                                                জাতীয় সমবায় সমিতি
                                            </option>
                                        </select>
                                        <br/>
                                        <label class="fixed_width">প্রকৃতি:</label>

                                        <select name="org-type-in" id="somitee_cat"
                                                class="form-control myselect_text myinput_text" required>

                                            <option value="0">সমবায় এর প্রকৃতি নির্বাচন করুন</option>
                                            <?php foreach ($somitee_category as $row) { if($somitee_info['0']['somitee_cat_id'] == $row['somitee_cat_id']){ ?>
                                            <option selected
                                                    value="<?php echo $row['somitee_cat_id']; ?>"><?php echo $row['somitee_cat_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['somitee_cat_id']; ?>"><?php echo $row['somitee_cat_name']; ?></option>
                                            <?php } } ?>
                                        </select>

                                        <br/>
                                        <label class="fixed_width"> প্রকার :</label>
                                        <select name="org-type-inner-most" id="somitee_cat_sub"
                                                class="form-control myselect_text myinput_text" required>
                                            <option value="0">সমবায় এর প্রকার নির্বাচন করুন</option>
                                            <?php foreach ($somitee_sub_category as $row1) { if($somitee_info['0']['somitee_sub_cat_id'] == $row1['somitee_sub_cat_id']){ ?>
                                            <option value="<?php echo $row1['somitee_sub_cat_id'];?>"
                                                    selected><?php echo $row1['somitee_sub_cat_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row1['somitee_sub_cat_id'];?>"><?php echo $row1['somitee_sub_cat_name']; ?></option>
                                            <?php } } ?>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>কার্যালয়ের ঠিকানা</td>
                                    <td>
                                        <label class="fixed_width"> বিভাগ :</label>
                                        <select onchange="select_district()" name="division" id="division"
                                                class="form-control myselect_text myinput_text" required>
                                            <option value="">বিভাগ</option>
                                            <?php foreach ($division as $row) { if($somitee_info['0']['somitee_div_id'] == $row['div_id']){ ?>
                                            <option value="<?php echo $row['div_id'];?>"
                                                    selected><?php echo $row['bn_div_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['div_id'];?>"><?php echo $row['bn_div_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> জেলা :</label>

                                        <select onchange="select_upz()" name="district" id="district"
                                                class="form-control myselect_text myinput_text" required>
                                            <option value="">বিভাগ</option>
                                            <?php foreach ($district as $row) { if($somitee_info['0']['somitee_dist_id'] == $row['dist_id']){ ?>
                                            <option value="<?php echo $row['dist_id'];?>"
                                                    selected><?php echo $row['bn_dist_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['dist_id'];?>"><?php echo $row['bn_dist_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> উপজেলা :</label>
                                        <select name="upz" id="upz" class="form-control myselect_text myinput_text"
                                                required>
                                            <option value="">বিভাগ</option>
                                            <?php foreach ($upz as $row) { if($somitee_info['0']['somitee_upz_id'] == $row['upz_id']){ ?>
                                            <option value="<?php echo $row['upz_id'];?>"
                                                    selected><?php echo $row['bn_upz_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['upz_id'];?>"><?php echo $row['bn_upz_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> বিস্তারিত :</label>
                                        <input class="myinput_text" name="somitee_address" type="text"
                                               value="<?php echo $somitee_info['0']['somitee_address']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>সদস্য নির্বাচনী এলাকা</td>
                                    <td>
                                        <label class="fixed_width"> বিভাগ :</label>
                                        <select onchange="select_sodosso_district()" name="sodosso_division"
                                                id="sodosso_division" class="form-control myselect_text myinput_text"
                                                required>
                                            <option>বিভাগ</option>
                                            <?php foreach ($somitee_sodosso_division as $row) { if($somitee_info['0']['sodosso_division'] == $row['div_id']){ ?>
                                            <option value="<?php echo $row['div_id']; ?>"
                                                    selected><?php echo $row['bn_div_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> জেলা :</label>
                                        <select onchange="select_sodosso_upz()" name="sodosso_district"
                                                id="sodosso_district" class="form-control myselect_text myinput_text"
                                                required>
                                            <option value="">জেলা</option>
                                            <?php foreach ($somitee_sodosso_district as $row) { if($somitee_info['0']['sodosso_district'] == $row['dist_id']){ ?>
                                            <option value="<?php echo $row['dist_id'];?>"
                                                    selected><?php echo $row['bn_dist_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['dist_id'];?>"><?php echo $row['bn_dist_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> উপজেলা :</label>
                                        <select name="sodosso_upz" id="sodosso_upz"
                                                class="form-control myselect_text myinput_text" required>
                                            <option value="">উপজেলা</option>
                                            <?php foreach ($somitee_sodosso_upz as $row) { if($somitee_info['0']['sodosso_upz'] == $row['upz_id']){ ?>
                                            <option value="<?php echo $row['upz_id'];?>"
                                                    selected><?php echo $row['bn_upz_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['upz_id'];?>"><?php echo $row['bn_upz_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> বিস্তারিত :</label>
                                        <input class="myinput_text" name="sodosso_details" type="text"
                                               value="<?php echo $somitee_info['0']['sodosso_details']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর কর্ম এলাকা</td>
                                    <td>
                                        <label class="fixed_width"> বিভাগ :</label>
                                        <select onchange="select_sodosso_district()" name="somitee_kormo_div_id"
                                                id="somitee_kormo_div_id"
                                                class="form-control myselect_text myinput_text" required>
                                            <option>বিভাগ</option>
                                            <?php foreach ($sodosso_kormo_division as $row) { if($somitee_info['0']['somitee_kormo_div_id'] == $row['div_id']){ ?>
                                            <option value="<?php echo $row['div_id']; ?>"
                                                    selected><?php echo $row['bn_div_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width">জেলা :</label>

                                        <select onchange="select_sodosso_upz()" name="somitee_kormo_dist_id"
                                                id="somitee_kormo_dist_id"
                                                class="form-control myselect_text myinput_text" required>
                                            <option value="">জেলা</option>
                                            <?php foreach ($sodosso_kormo_district as $row) { if($somitee_info['0']['somitee_kormo_dist_id'] == $row['dist_id']){ ?>
                                            <option value="<?php echo $row['dist_id'];?>"
                                                    selected><?php echo $row['bn_dist_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['dist_id'];?>"><?php echo $row['bn_dist_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> উপজেলা :</label>
                                        <select name="somitee_kormo_upz_id" id="somitee_kormo_upz_id"
                                                class="form-control myselect_text myinput_text" required>
                                            <option value="">উপজেলা</option>
                                            <?php foreach ($sodosso_kormo_upz as $row) { if($somitee_info['0']['somitee_kormo_upz_id'] == $row['upz_id']){ ?>
                                            <option value="<?php echo $row['upz_id'];?>"
                                                    selected><?php echo $row['bn_upz_name']; ?></option>
                                            <?php } else{ ?>
                                            <option value="<?php echo $row['upz_id'];?>"><?php echo $row['bn_upz_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <br/>
                                        <label class="fixed_width"> বিস্তারিত :</label>
                                        <input class="myinput_text" name="somitee_kormo_details" type="text"
                                               value="<?php echo $somitee_info['0']['somitee_kormo_details']; ?>">

                                    </td>
                                </tr>
                                <tr>
                                    <td>প্রতিটি শেয়ার মূল্য</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price']);?>
                                        <input type='hidden' name='share_price_eng' id='share_price_eng'
                                               value="<?=$somitee_info[0]['somitee_per_share_price'];?>">
                                               <?=$output;?> টাকা
                                    </td>
                                </tr>
                                <tr>
                                    <td>মোট শেয়ার সংখ্যা</td>
                                    <td>
                                        <b><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_share']); ?></b>
                                        <input type='hidden' name='share_qty_eng' id='share_qty_eng'
                                               value="<?=$somitee_info[0]['somitee_share'];?>">
                                               <?=$output;?> টি
                                    </td>
                                </tr>
                                <tr>
                                    <td>অনুমোদিত মূলধন</td>
                                    <td>

                                               <?=$output;?> টাকা
                                    </td>

                                </tr>
                                <tr>
                                    <td>বিক্রিত শেয়ার সংখ্যা</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['sell_share_num']); ?>
                                        <input type='hidden' name='sell_share_eng' id='sell_share_eng'
                                               value="<?=$somitee_info[0]['sell_share_num'];?>">

                                               <?=$output;?> টি
                                    </td>
                                </tr>
                                <tr>
                                    <td>পরিশোধিত মূলধন</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num'])); ?>

                                               <?=$output;?> টাকা
                                    </td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর ব্যাংক একাউন্ট নং</td>
                                    <td><?= $somitee_info[0]['somitee_acc_no'] ?></td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর সদস্য সংখ্যা (ছেলে)</td>
                                    <td><?php $output = str_replace(range(0,9), $bn_digits, ($somitee_info[0]['member_number_male']) ) ?>
                                        <?= $output ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>সমবায় এর সদস্য সংখ্যা (মেয়ে)</td>
                                    <td>
                                        <?php $output = str_replace(range(0,9), $bn_digits, ($somitee_info[0]['member_number_female']) ) ?>
                                        <?= $output ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>সমবায় এর রেজিস্ট্রেশন তারিখ</td>
                                    <td>
                                        <?php $output = str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]);
                                        echo $output; ?></td>
                                </tr>
                                </tbody>
                            </table>

                        </div><!-- /panel -->
                    </form>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form action="<?=base_url();?>dco/somitee_member_update_dco" method="post">
                        <div class="panel panel-success">
                            <div class="panel-heading" style="overflow: hidden">
                                <h4 class="heading-title col-md-10">সমবায় এর সদস্যদের তথ্য</h4>

                                <!--<button type="submit" onsubmit="return checkEdit()"
                                        class="col-md-1 btn btn-success btn-xs pull-right">Update
                                </button>-->
                            </div>

                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered "
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">ক্রমিক</th>
                                    <th class="text-center" width="35%">সদস্য নাম</th>
                                    <th class="text-center">সমবায় সদস্যের ভোটার আইডি নাম্বার</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" name="somitee_id" value="<?=$somitee_info[0]['somitee_id'];?>">
                                <input type="hidden" name="user_reg_id" value="<?=$somitee_info[0]['user_reg_id'];?>">
                                <?php $i = 1;
                                foreach ($somitee_member_info as $row) { ?>
                                <tr style="text-align:center;">
                                    <td>
                                        <p>
                                            <?php
                                            $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                            $output = str_replace(range(0, 9), $bn_digits, $i);
                                            $i++;
                                            echo $output;
                                            ?>
                                        </p>
                                    </td>
                                    <input type="hidden" name="somitee_member_id[]"
                                           value="<?=$row['somitee_member_id'];?>">
                                    <td>
                                            <?= $row['member_name'] ?>
                                    </td>
                                    <td>


                                                <?= str_replace(range(0, 9), $bn_digits, $row['somitee_member_nid']) ?>

                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div><!-- /panel -->
                    </form>
                </div>

                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="heading-title">প্রয়োজনীয় কাগজপত্র জমা</h4>
                        </div>

                        <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered table-hover">
                            <?php if (sizeof($uco_info != 0)) {
                            $fileInfo = json_decode($uco_info[0]['files_status']); ?>
                            <div>
                                <table style="border: 1px solid #ddd;"
                                       class="table table-stripped table-bordered table-hover">
                                    <tr>
                                        <th>ক্রমিক</th>
                                        <th>প্রয়োজনীয় কাগজপত্র</th>
                                        <th>প্রাপ্তি</th>

                                    </tr>
                                    <tr>
                                        <td style="width: 5%;">১</td>
                                        <td>নির্ধারিত আবেদনপত্র</td>
                                        <td style="width: 15%;">
                                            <?php
                                            if ($fileInfo[0] == 1) {
                                                echo '<span style="color:green" class="glyphicon glyphicon-ok"></span>';
                                            } elseif ($fileInfo[0] == 0) {
                                                echo '<span style="color:red" class="glyphicon glyphicon-remove">';
                                            } else {
                                                echo 'default';
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>২</td>
                                        <td> ৩০০.০০ টাকার নিবন্ধন ফি (কোড নং-১-৩৮৩১-০০০০-১৮৩৬) এবং উক্ত ফি
                                            এর উপর ১৫% ভ্যাট হিসেবে ৪৫.০০ টাকা (কোড নং-১-১১৩-০০০০-০৩১১) এ
                                            চালানমূলে বাংলাদেশ
                                            ব্যাংক অথবা সোনালী ব্যাংকের নির্ধারিত শাখায় জমা দিয়ে চালানের মূল
                                            কপি।
                                        </td>
                                        <td style="width: 15%;">
                                            <?php
                                            if ($fileInfo[1] == 1) {
                                                echo '<span style="color:green" class="glyphicon glyphicon-ok"></span>';
                                            } elseif ($fileInfo[1] == 0) {
                                                echo '<span style="color:red" class="glyphicon glyphicon-remove">';
                                            } else {
                                                echo 'default';
                                            } ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>৩</td>
                                        <td> আবেদনকারী সদস্যের স্বাক্ষরযুক্ত তিন প্রস্ত উপ-আইন।
                                        </td>
                                        <td style="width: 15%;">
                                            <?php
                                            if ($fileInfo[2] == 1) {
                                                echo '<span style="color:green" class="glyphicon glyphicon-ok"></span>';
                                            } elseif ($fileInfo[2] == 0) {
                                                echo '<span style="color:red" class="glyphicon glyphicon-remove">';
                                            } else {
                                                echo 'default';
                                            } ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>৪</td>
                                        <td>সমবায় সমিতি নিবন্ধনে আগ্রহী ব্যক্তিবর্গের সমন্বয়ে অনুষ্ঠিত সাংগঠনিক
                                            সভার
                                            রেজুলেশন।
                                        </td>
                                        <td style="width: 15%;">
                                            <?php
                                            if ($fileInfo[3] == 1) {
                                                echo '<span style="color:green" class="glyphicon glyphicon-ok"></span>';
                                            } elseif ($fileInfo[3] == 0) {
                                                echo '<span style="color:red" class="glyphicon glyphicon-remove">';
                                            } else {
                                                echo 'default';
                                            } ?>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td>৫</td>
                                        <td> আবেদনকারী সদস্যের জাতীয় পরিচয়পত্র/জন্মনিবন্ধন সনদ।
                                        </td>
                                        <td style="width: 15%;">
                                            <?php
                                            if ($fileInfo[4] == 1) {
                                                echo '<span style="color:green" class="glyphicon glyphicon-ok"></span>';
                                            } elseif ($fileInfo[4] == 0) {
                                                echo '<span style="color:red" class="glyphicon glyphicon-remove">';
                                            } else {
                                                echo 'default';
                                            } ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>৬</td>
                                        <td>ব্যবস্থাপনা কমিটির সদস্যদের ছবিসহ নামের তালিকা ।
                                        </td>
                                        <td style="width: 15%;">
                                            <?php
                                            if ($fileInfo[5] == 1) {
                                                echo '<span style="color:green" class="glyphicon glyphicon-ok"></span>';
                                            } elseif ($fileInfo[5] == 0) {
                                                echo '<span style="color:red" class="glyphicon glyphicon-remove">';
                                            } else {
                                                echo 'default';
                                            } ?>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <?php } ?>
                        </table>
                    </div><!-- /panel -->


                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="heading-title">উপজেলা সমবায় কর্মকর্তার মন্তব্য</h4>
                            </div>

                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered ">
                                <tr>
                                    <th>মন্তব্য</th>
                                    <th>ফাইল</th>
                                    <th>তারিখ</th>
                                </tr>
                                <?php foreach ($uco_info as $row) { ?>
                                <tr>
                                    <td>
                                        <?php if ($row['uco_comment'] != null) {
                                            echo $row['uco_comment'];
                                        } else {
                                            echo 'উপজেলা সমবায় অফিসার কোনো মন্তব্য করেন নি ';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($row['uco_comment_upload'] != null) {
                                            $fileInfo = json_decode($row['uco_comment_upload']);
                                            foreach ($fileInfo as $f) {
                                                $n = explode('__', $f);
                                                echo "<a href='" . base_url() . "" . $f . "'>" . $n[1] . "</a><br>";
                                            }
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo str_replace(range(0,9),$bn_digits,explode(' ',$row['uco_inquiry_date'])[0]); ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /panel -->
                    </div>
                    <?php if($somitee_info[0]['dco_id']!=0){ ?>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="heading-title">জেলা সমবায় কর্মকর্তার মন্তব্য</h4>
                            </div>
                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered ">
                                <tr>
                                    <th>মন্তব্য</th>
                                    <th>ফাইল</th>
                                    <th>তারিখ</th>
                                </tr>
                                <?php foreach ($dco_info as $row) {  ?>
                                <tr>
                                    <td>
                                        <?php if ($row['dco_comment'] != null) {
                                            echo $row['dco_comment'];
                                        } else {
                                            echo 'জেলা সমবায় অফিসার কোনো মন্তব্য করেন নি ';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($row['dco_comment_upload'] != null) {
                                            $fileInfo = json_decode($row['dco_comment_upload']);
                                            foreach ($fileInfo as $f) {
                                                $n = explode('__', $f);
                                                echo "<a href='" . base_url() . "" . $f . "'>" . $n[1] . "</a><br>";
                                            }
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo str_replace(range(0,9),$bn_digits,explode(' ',$row['dco_inquiry_date'])[0]); ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /panel -->
                    </div>
                    <?php } ?>

                    <?php if($somitee_info[0]['appeal_id'] != 0 && $somitee_info[0]['somitee_status'] != 6){ ?>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="heading-title">আপীল</h4>
                            </div>
                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered ">
                                <?php $asd = json_decode($appeal_info[0]['appeal_content']); ?>
                                <tr>
                                    <td>আপীল তারিখ</td>
                                    <td><?php echo str_replace(range(0,9),$bn_digits,explode(' ',$appeal_info[0]['appeal_date'])[0]); ?></td>
                                </tr>
                                <tr>
                                    <td>আপীল এর বিষয়</td>
                                    <td><?php echo $asd[0]->sub; ?></td>
                                </tr>
                                <tr>
                                    <td>আপীল এর বিবরণ</td>
                                    <td><?php echo $asd[0]->content; ?></td>
                                </tr>
                                <tr>
                                    <td>আপীল এর রিপ্লাই তারিখ</td>
                                    <td><?php
                                        if ($appeal_info[0]['appeal_reply'] == null) {
                                            echo "এখন পর্যন্ত রিপ্লাই করা হয় নাই ";
                                        } else {
                                            echo str_replace(range(0,9),$bn_digits,explode(' ',$appeal_info[0]['appeal_reply_date'])[0]);
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>আপীল এর রিপ্লাই</td>
                                    <td><?php
                                        if ($appeal_info[0]['appeal_reply'] == null) {
                                            echo "এখন পর্যন্ত রিপ্লাই করা হয় নাই ";
                                        } else {
                                            echo $appeal_info[0]['appeal_reply'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /panel -->
                    </div>
                    <?php }?>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-success" >
                                <div class="panel-heading"
                                >
                                    <h4 class="heading-title text-center">সকল কার্যক্রম</h4>
                                </div>

                                <table class='table table-striped table-hover table-bordered'>
                                    <tr>
                                        <th>কার্যক্রম</th>
                                        <th>মন্তব্য</th>
                                        <th style="width: 10%">তারিখ</th>
                                    </tr>
                                    <tr>
                                        <td>সংগঠক নিবন্ধন</td>
                                        <td></td>
                                        <td><?= str_replace(range(0, 9), $bn_digits, explode(' ', $leader_info[0]['user_reg_date'])[0]) ?></td>
                                    </tr>
                                    <tr>
                                        <td>সমবায় রেজিস্ট্রেশন</td>
                                        <td></td>
                                        <td><?= str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]) ?></td>
                                    </tr>
                                    <?php foreach ($division_info as $row) { ?>
                                    <tr>
                                        <td>ডক এডমিন
                                            <?php
                                            if ($row['divisional_admin_inquiry_verify'] == 1) {
                                                echo 'অনুমোদন';
                                            } else if ($row['divisional_admin_inquiry_verify'] == 0) {
                                                echo 'বাতিল';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['divisional_admin_comment'] == null || $row['divisional_admin_comment'] == '') {
                                                echo 'ডক এডমিন কোনো মন্তব্য করেন নি';
                                            } else {
                                                echo $row['divisional_admin_comment'];
                                            } ?>
                                        </td>
                                        <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['divisional_admin_inquiry_date'])[0]); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach ($uco_info as $row) { ?>
                                    <tr>
                                        <td><a style="cursor:pointer"
                                               onclick="get_admin_info('<?= $row['uco_id']; ?>','uco','উপজেলা সমবায় কর্মকর্তা')">উপজেলা
                                                সমবায় কর্মকর্তা</a> অনুমোদন</td>
                                        <td>
                                            <?php if (($row['uco_comment'] == null || $row['uco_comment'] == '') && ($row['uco_comment_upload'] == null || $row['uco_comment_upload'] == '')) {
                                                echo 'উপজেলা সমবায় কর্মকর্তা কোনো মন্তব্য করেন নি ';
                                            } else {
                                                echo $row['uco_comment'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['uco_inquiry_date'])[0]); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach ($dco_info as $row) { ?>
                                    <tr>
                                        <td>জেলা সমবায় কর্মকর্তা
                                            <?php
                                            if ($row['dco_inquiry_verify'] == 1) {
                                                echo 'অনুমোদন';
                                            } else if ($row['dco_inquiry_verify'] == 0) {
                                                echo 'বাতিল';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if (($row['dco_comment'] == null || $row['dco_comment'] == '') && ($row['dco_comment_upload'] == null || $row['dco_comment_upload'] == '')) {
                                                echo 'জেলা সমবায় কর্মকর্তা কোনো মন্তব্য করেন নি ';
                                            } else {
                                                echo $row['dco_comment'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $row['dco_inquiry_date'])[0]); ?></td>
                                    </tr>
                                    <?php } ?>
                                     <?php if($somitee_info[0]['appeal_id']!=0) { ?>
                                    <tr>
                                        <td>আপীল</td>
                                        <td>
                                        </td>
                                        <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $appeal_info[0]['appeal_date'])[0]); ?></td>
                                    </tr>
                                    <?php if($appeal_info[0]['appeal_reply_date'] !='0000-00-00' || $appeal_info[0]['appeal_reply_date'] !=null){ ?>
                                        <tr>
                                            <td>আপীল<?php
                                                if ($appeal_info[0]['appeal_verify'] == 1) {
                                                    echo 'অনুমোদন';
                                                } else if ($appeal_info[0]['appeal_verify'] == 0) {
                                                    echo 'বাতিল';
                                                }
                                                ?></td>
                                            <td>
                                            </td>
                                            <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $appeal_info[0]['appeal_reply_date'])[0]); ?></td>
                                        </tr>
                                   <?php }?>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php if ( ($somitee_info[0]['somitee_status'] == 2 && $somitee_info[0]['uco_id'] != 0 && $somitee_info[0]['dco_id'] == 0) || ($somitee_info[0]['somitee_status'] == 4) ) { ?>
                    <div class="col-md-10 col-md-offset-1">


                        <div class="panel panel-success" style="overflow:hidden;padding-bottom:10px;">
                            <form action="<?php echo site_url('dco/dco_comment_post'); ?>" method="post"
                                  enctype="multipart/form-data">
                                <input type='hidden' name='somitee_id'
                                       value='<?php echo $this->uri->segment(3); ?>'>
                                <input type='hidden' name='s_type'
                                       value='<?php echo $this->uri->segment(4); ?>'>
                                <div id="chk_btn_1" class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="col-md-6">
                                            <button type="button" name='bttn' id="reject_1" value="reject"
                                                    class="btn btn-danger gnt-btn btn-block">
                                                <span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;
                                                &nbsp; বাতিল
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name='bttn' value="approve"
                                                    class="btn btn-success gnt-btn btn-block">
                                                <span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;
                                                &nbsp;অনুমোদন
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="cmmnt-div" class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="heading-title">মন্তব্য করুন</h3>
                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <textarea class="summernote" name='cmmnt'></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">ফাইল যোগ করুন</label>
                                            <div class="col-md-8" id="bkup_doc_rw">
                                                <input type='hidden' name='file_name' id='file_name' value=''>
                                                <input type="file" class="" name="file[]">
                                            </div>
                                        </div>
                                        <a href="#" id="addNew" class="btn btn-success">+ Add New</a>
                                    </div> <!-- panel-body -->

                                </div>
                                <div id="chk_btn_2" class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="col-md-6">
                                            <button type="button" name='bttn' id="reject_2" value="reject"
                                                    class="btn btn-danger gnt-btn btn-block">বাতিল
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name='bttn' value="reject"
                                                    class="btn btn-success gnt-btn btn-block">সাবমিট
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div> <!-- /col-6 --><?php }; ?>
                </div>

                <div class="row">
                    <footer id="admin-footer">
                        <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                    </footer>
                </div><!-- /row -->
            </div> <!-- /col12 -->
        </div>
    </div>
    <div class="modal fade" id="adminShowModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 style="text-align: center;" class="modal-title" id="admin_title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="complain_date" class="col-md-4 control-label">নাম</label>
                            <div class="col-md-8">
                                <p id="admin_name"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complain_date" class="col-md-4 control-label">জাতীয় পরিচয়পত্র নম্বর</label>
                            <div class="col-md-8">
                                <p id="admin_nid"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complain_date" class="col-md-4 control-label">ফোন নম্বর</label>
                            <div class="col-md-8">
                                <p id="admin_phn"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complain_date" class="col-md-4 control-label">অফিস</label>
                            <div class="col-md-8">
                                <p id="admin_offc"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">বাতিল</button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts_uco_dco/footer'); ?>
    <script>
        $('#cmmnt-div').hide();
        $('#chk_btn_2').hide();
        $('#reject_1').click(function () {
            $('#chk_btn_1').hide();
            $('#cmmnt-div').show();
            $('#chk_btn_2').show();
        });
        $('#reject_2').click(function () {
            $('#chk_btn_2').hide();
            $('#cmmnt-div').hide();
            $('#chk_btn_1').show();
        });

    </script>
    <script>
        $(document).ready(function () {
            cal_budget();
            cal_budget2();


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

        function select_district() {
            var div = $('#division').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('dco/get_dist');?>',
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
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('dco/get_upz2');?>',
                data: {
                    dist_id: dist
                }, success: function (data) {
                    console.log(data);
                    data1 = $.parseJSON(data);

                    $('#upz').find("option:gt(0)").remove();
                    if (data1['res'].length == 0) {
                        var x = document.getElementById('upzzz');
                        x.style.color = "red";
                        x.innerHTML = "অনলাইন সমবায় নিবন্ধন বন্ধ আছে।<br>আবশ্যক";
                    } else {
                        $.each(data1['res'], function (index, value) {
                            var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                            $('#upz').append(option_val);
                        });
                        var x = document.getElementById('upzzz');
                        x.style.color = "black";
                        x.innerHTML = "আবশ্যক";
                    }
                }
            });
        }

        function select_sodosso_district() {
            var div = $('#sodosso_division').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('dco/get_dist');?>',
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
                url: '<?php echo site_url('dco/get_upz');?>',
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

        function select_kormo_district() {
            var div = $('#kormo_division').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('dco/get_dist');?>',
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
                url: '<?php echo site_url('dco/get_upz');?>',
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

        $('#somitee_cat').change(function () {
            var s_cat = $('#somitee_cat').val();
            //alert(s_cat);
            $.ajax({
                url: '<?php echo site_url('dco/get_sub_cat'); ?>',
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

    </script>

    <script>

        function pressEdit() {
            $('.myinput_text').attr('style', 'border: 1px solid #ccc');
            // $('.myselect_text').attr('style','border: 1px solid #ccc');

            $('.myselect_text').removeClass('myselect_text');
            // $('.myselect_text').attr('style','-moz-appearance: normal');
        }

    </script>
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
        function get_admin_info(id, tbl, title) {
            console.log(id);
            console.log(tbl);
            console.log(title);

            $.ajax({
                type: 'post',
                url: '<?= site_url('dco/get_all_admin_info');?>',
                data: {
                    iid: id,
                    tble: tbl
                }, success: function (data) {
                    console.log(data);
                    document.getElementById('admin_title').innerText = title;

                    var data1 = $.parseJSON(data);

                    $.each(data1['res'], function (i, v) {
                        document.getElementById('admin_name').innerText = v['admin_name'];
                        document.getElementById('admin_nid').innerText = v['admin_nid'].getDigitBanglaFromEnglish();
                        document.getElementById('admin_phn').innerText = v['admin_phone'].getDigitBanglaFromEnglish();

                        var addd = document.getElementById('admin_offc');
                        var address = '';
                        if (v['bn_upz_name'] == null || v['bn_upz_name'] == '') {
                        } else {
                            address += v['bn_upz_name'] + ', ';
                        }

                        if (v['bn_dist_name'] == null || v['bn_dist_name'] == '') {
                        } else {
                            address += v['bn_dist_name'] + ', ';
                        }

                        if (v['bn_div_name'] == null || v['bn_div_name'] == '') {
                        } else {
                            address += v['bn_div_name'];
                        }
                        addd.innerHTML = address;

                    });


                    $('#adminShowModal').modal('show');
                }
            });
        }

        function chngBckgrndIn(id) {
            var x = document.getElementById(id);
            x.style.backgroundColor = 'white';
            var x = document.getElementById('linkTag');
            x.style.color = 'black';
        }
        function chngBckgrndOut(id) {
            var x = document.getElementById(id);
            x.style.backgroundColor = '#337ab7';
            var x = document.getElementById('linkTag');
            x.style.color = 'whitesmoke';
        }
    </script>