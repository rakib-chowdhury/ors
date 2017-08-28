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
                            <?php if ($s_type == 'search') {
                            } else { ?>
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
                </div>


                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="overflow: hidden">
                            <h4 class="heading-title col-md-10">সমবায় সম্পর্কিত সাধারণ তথ্য</h4>
                        </div>
                        <table style="border: 1px solid #ddd;"
                               class="table table-stripped table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td width="40%">নাম</td>
                                <td><?php echo $somitee_info['0']['somitee_name']; ?></td>
                            </tr>
                            <input type="hidden" name="somitee_id" value="<?= $somitee_info[0]['somitee_id']; ?>">
                            <tr>
                                <td>শ্রেণী</td>
                                <td><label class="fixed_width">শ্রেণী:</label>
                                    <?= $somitee_info['0']['somitee_type_name'] ?>
                                    <br/>
                                    <?php if ($somitee_info['0']['somitee_type_id'] == 1) { ?>
                                        <label class="fixed_width">প্রকৃতি:</label>
                                        <?= $somitee_info[0]['somitee_cat_name'] ?>
                                        <br/>
                                        <label class="fixed_width"> প্রকার :</label>
                                        <?= $somitee_info[0]['somitee_sub_cat_name'] ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>কার্যালয়ের ঠিকানা</td>
                                <td>
                                    <label class="fixed_width"> বিভাগ :</label>
                                    <?= $somitee_info[0]['bn_div_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> জেলা :</label>
                                    <?= $somitee_info[0]['bn_dist_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> উপজেলা :</label>
                                    <?= $somitee_info[0]['bn_upz_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> বিস্তারিত :</label>
                                    <?php echo $somitee_info['0']['somitee_address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>সদস্য নির্বাচনী এলাকা</td>
                                <td>
                                    <label class="fixed_width"> বিভাগ :</label>
                                    <?= $somitee_info[0]['ssd_div_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> জেলা :</label>
                                    <?= $somitee_info[0]['ssds_dist_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> উপজেলা :</label>
                                    <?= $somitee_info[0]['ssu_upz_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> বিস্তারিত :</label>
                                    <?php echo $somitee_info['0']['sodosso_details']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর কর্ম এলাকা</td>
                                <td>
                                    <label class="fixed_width"> বিভাগ :</label>
                                    <?= $somitee_info[0]['k_div_name'] ?>
                                    <br/>
                                    <label class="fixed_width">জেলা :</label>
                                    <?= $somitee_info[0]['k_dist_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> উপজেলা :</label>
                                    <?= $somitee_info[0]['k_upz_name'] ?>
                                    <br/>
                                    <label class="fixed_width"> বিস্তারিত :</label>
                                    <?php echo $somitee_info['0']['somitee_kormo_details']; ?>

                                </td>
                            </tr>
                            <tr>
                                <td>প্রতিটি শেয়ার মূল্য</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price']); ?>
                                    <input type='hidden' name='share_price_eng' id='share_price_eng'
                                           value="<?= $somitee_info[0]['somitee_per_share_price']; ?>">

                                    <?= $output; ?> টাকা
                                </td>
                            </tr>
                            <tr>
                                <td>মোট শেয়ার সংখ্যা</td>
                                <td>
                                    <b><?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_share']); ?></b>
                                    <input type='hidden' name='share_qty_eng' id='share_qty_eng'
                                           value="<?= $somitee_info[0]['somitee_share']; ?>">
                                    <?= $output; ?> টি
                                </td>
                            </tr>
                            <tr>
                                <td>অনুমোদিত মূলধন</td>
                                <td><?= $output; ?> টাকা</td>
                            </tr>
                            <tr>
                                <td>বিক্রিত শেয়ার সংখ্যা</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['sell_share_num']); ?>
                                    <input type='hidden' name='sell_share_eng' id='sell_share_eng'
                                           value="<?= $somitee_info[0]['sell_share_num']; ?>">
                                    <?= $output; ?> টি
                                </td>
                            </tr>
                            <tr>
                                <td>পরিশোধিত মূলধন</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num'])); ?>
                                    <?= $output; ?> টাকা
                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর ব্যাংক তথ্য</td>
                                <td><?= $somitee_info[0]['somitee_acc_no'] ?></td>
                            </tr>
                            <tr>
                                <td>সমবায় এর সদস্য সংখ্যা (ছেলে)</td>
                                <td><?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['member_number_male'])) ?>
                                    <?= $output ?> জন
                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর সদস্য সংখ্যা (মেয়ে)</td>
                                <td><?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['member_number_female'])) ?>
                                    <?= $output ?> জন
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
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form action="<?= base_url(); ?>dco/somitee_member_update_dco" method="post">
                        <div class="panel panel-success">
                            <div class="panel-heading" style="overflow: hidden">
                                <h4 class="heading-title col-md-10">সমবায় এর ব্যবস্থাপনা কমিটির তথ্য</h4>
                            </div>
                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered "
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">ক্রমিক</th>
                                    <th class="text-center" width="35%">নাম</th>
                                    <th class="text-center">মোবাইল নং</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($somitee_mngmnt_info as $row) { ?>
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
                                        <td><?= $row['name'] ?></td>
                                        <td><?= str_replace(range(0, 9), $bn_digits, $row['phone']) ?></td>
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
                            <h4 class="heading-title text-center">সকল কার্যক্রম</h4>
                        </div>

                        <table class='table table-striped table-hover table-bordered'>
                            <tr>
                                <th>কার্যক্রম</th>
                                <th>কর্মকর্তা কর্মচারীর নাম</th>
                                <th style="width: 10%">তারিখ</th>
                            </tr>
                            <tr>
                                <td>সমবায় রি-রেজিস্ট্রেশন</td>
                                <td>
                                    <a style="cursor:pointer" data-toggle="modal"
                                       data-target="#adminShowModal"> <?= $somitee_added_info[0]['admin_name'] ?></a>
                                </td>
                                <td><?= str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <footer id="admin-footer">
                        <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                    </footer>
                </div><!-- /row -->
            </div> <!-- /col12 -->
        </div>
    </div>
</div>
<div class="modal fade" id="adminShowModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title" id="admin_title"> কর্মকর্তা/কর্মচারীর তথ্য</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">নাম</label>
                        <div class="col-md-8">
                            <p id="admin_name"><?= $somitee_added_info[0]['admin_name'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">জাতীয় পরিচয়পত্র নম্বর</label>
                        <div class="col-md-8">
                            <p id="admin_nid"><?= str_replace(range(0, 9), $bn_digits, $somitee_added_info[0]['admin_nid']) ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">ফোন নম্বর</label>
                        <div class="col-md-8">
                            <p id="admin_phn"><?= str_replace(range(0, 9), $bn_digits, $somitee_added_info[0]['admin_phone']) ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complain_date" class="col-md-4 control-label">অফিস</label>
                        <div class="col-md-8">
                            <p id="admin_offc">
                                <?php if ($somitee_added_info[0]['admin_designation_id'] == 2) {
                                    echo 'ডক অ্যাডমিন';
                                } elseif ($somitee_added_info[0]['admin_designation_id'] == 6) {
                                    echo 'জেলা সমবায় কর্মকর্তা, ' . $somitee_added_info[0]['bn_dist_name'] . ', ' . $somitee_added_info[0]['bn_div_name'];
                                } elseif ($somitee_added_info[0]['admin_designation_id'] == 7) {
                                    echo 'উপজেলা সমবায় কর্মকর্তা, ' . $somitee_added_info[0]['bn_upz_name'] . ', ' . $somitee_added_info[0]['bn_dist_name'] . ', ' . $somitee_added_info[0]['bn_div_name'];
                                } ?>
                            </p>
                            <p>

                            </p>
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