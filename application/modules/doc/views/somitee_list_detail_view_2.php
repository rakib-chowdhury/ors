<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="margin-top:5px;">
                    <ul class="list-inline">
                        <li><h3>সমবায় এর নামঃ <?php echo $somitee_info['0']['somitee_name']; ?></h3></li>
                        <li class="pull-right text-center">
                            <div id="dwnloadDiv" style="width: 200px; background-color: #337ab7;"
                                 onmouseover="chngBckgrndIn(this.id)" onmouseleave="chngBckgrndOut(this.id)">
                                <b>
                                    <a id="linkTag" style="text-decoration:none; color: whitesmoke"
                                       href="<?php echo site_url('doc/dco_download_user_info/' . $somitee_info[0]['somitee_id']); ?>">আপনার
                                        সমবায় সম্পর্কিত তথ্য এখানে <span style="color:red;">ডাউনলোড <i
                                                class="fa fa-file-pdf-o" aria-hidden="true"></i></span> করুন</a></b>
                            </div>
                        </li>
                    </ul>
                </div>


                <!-- Nav tabs -->
                <div class="col-md-10 col-md-offset-1">
                    <br>
                    <div class="panel panel-success">
                        <div class="panel-heading" style="background-color: rgba(150, 150, 20, 0.59)">
                            <h3 class="heading-title text-center">সমবায় সম্পর্কিত সাধারণ তথ্য</h3>
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td width="25%">নাম</td>
                                <td><?php echo $somitee_info['0']['somitee_name']; ?></td>
                            </tr>
                            <tr>
                                <td>শ্রেণী</td>
                                <td>স্তর:
                                    <?php
                                    echo $somitee_info['0']['somitee_type_name'];
                                    ?>
                                    <br>
                                    শ্রেণী:
                                    <?php
                                    if ($somitee_info[0]['somitee_cat_id'] == 0) {
                                        echo ' প্রযোজ্য নহে';
                                    } else {
                                        foreach ($somitee_category as $row) {
                                            echo $row['somitee_cat_name'] . ' , ';
                                        }
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <td>কার্যালয়ের ঠিকানা</td>
                                <td>
                                    বিভাগ: <?= $somitee_info[0]['bn_div_name']; ?>
                                    <br>
                                    জেলা: <?= $somitee_info[0]['bn_dist_name']; ?>
                                    <br>
                                    উপজেলা:<?= $somitee_info[0]['bn_upz_name']; ?>
                                    <br>
                                    বিস্তারিত :<?= $somitee_info[0]['somitee_address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>সদস্য নির্বাচনী এলাকা</td>
                                <td>
                                    বিভাগ: <?= $somitee_info_sodosso[0]['bn_div_name']; ?>
                                    <br>
                                    জেলা: <?= $somitee_info_sodosso[0]['bn_dist_name']; ?>
                                    <br>
                                    উপজেলা:<?= $somitee_info_sodosso[0]['bn_upz_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর কর্ম এলাকা</td>
                                <td>
                                    বিভাগ: <?= $somitee_info[0]['k_div_name']; ?>
                                    <br>
                                    জেলা: <?= $somitee_info[0]['k_dist_name']; ?>
                                    <br>
                                    উপজেলা:<?= $somitee_info[0]['k_upz_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>প্রতিটি শেয়ার মূল্য</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price']);
                                    echo $output . ' টাকা'; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>মোট শেয়ার সংখ্যা</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_share']);
                                    echo $output . ' টি'; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>অনুমোদিত মূলধন</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['somitee_share']);
                                    echo $output . ' টাকা'; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>বিক্রিত শেয়ার সংখ্যা</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, $somitee_info[0]['sell_share_num']);
                                    echo $output . ' টি'; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>পরিশোধিত শেয়ার মূলধন</td>
                                <td>
                                    <?php $output = str_replace(range(0, 9), $bn_digits, ($somitee_info[0]['somitee_per_share_price'] * $somitee_info[0]['sell_share_num']));
                                    echo $output . ' টাকা'; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর ব্যাংক তথ্য</td>
                                <td><?php echo $somitee_info[0]['somitee_acc_no']; ?></td>
                            </tr>
                            <tr>
                                <td>সমবায় এর সদস্য সংখ্যা (ছেলে)</td>
                                <td><?= str_replace(range(0, 9), $bn_digits, $somitee_info[0]['member_number_male']); ?>
                                    জন
                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর সদস্য সংখ্যা (মেয়ে)</td>
                                <td><?= str_replace(range(0, 9), $bn_digits, $somitee_info[0]['member_number_female']); ?>
                                    জন
                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর রি-রেজিস্ট্রেশন তারিখ</td>
                                <td>
                                    <?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $somitee_info[0]['somitee_reg_date'])[0]); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading" style="background-color: rgba(165, 165, 20, 0.59)">
                            <h3 class="heading-title text-center">সমবায় এর ব্যবস্থাপনা কমিটির তথ্য</h3>
                        </div>
                        <table width="" align="center" class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="8%">ক্রমিক নং</th>
                                <th class="text-center">নাম</th>
                                <th class="text-center">মোবাইল নং</th>
                            </tr>
                            </thead>

                            <tbody><?php $i = 1;
                            foreach ($somitee_mngmnt_info as $row) { ?>
                                <tr style="text-align:center;">
                                    <td>
                                        <?php
                                        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                        $output = str_replace(range(0, 9), $bn_digits, $i);
                                        $i++;
                                        echo $output;
                                        ?>

                                    </td>
                                    <td>
                                        <?= $row['name'] ?>
                                    </td>
                                    <td>
                                        <?= str_replace(range(0, 9), $bn_digits, $row['phone']) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /col -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading" style="background-color: rgba(230, 200, 20, 0.59)">
                                    <h3 class="heading-title text-center">সকল কার্যক্রম</h3>
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
                    </div>
                </div><!-- /col -->
            </div><!--/row -->

            <div class="row" style="margin-top: 48px;">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div><!-- /col10 -->
    </div><!-- /row -->
</div><!-- /container -->
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
                                    echo 'জেলা সমবায় কর্মকর্তা, '.$somitee_added_info[0]['bn_dist_name'].', '.$somitee_added_info[0]['bn_div_name'];
                                } elseif ($somitee_added_info[0]['admin_designation_id'] == 7) {
                                    echo 'উপজেলা সমবায় কর্মকর্তা, '.$somitee_added_info[0]['bn_upz_name'].', '.$somitee_added_info[0]['bn_dist_name'].', '.$somitee_added_info[0]['bn_div_name'];
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

<?php $this->load->view('layouts/footer'); ?>
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
</script>
<script>
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