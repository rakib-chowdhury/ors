<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2><?php echo $somitee_info[0]['somitee_name']; ?></h2>
                        <hr>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#somitee_info" aria-controls="somitee_info"
                                                                      role="tab"
                                                                      data-toggle="tab">সমিতির সাধারণ তথ্য</a></li>
                            <li role="presentation"><a href="#somitee_mem_info"
                                                       aria-controls="somitee_mem_info"
                                                       role="tab" data-toggle="tab">সমিতির সদস্য</a></li>
                            <li role="presentation"><a href="#somitee_mem_des_info"
                                                       aria-controls="somitee_mem_des_info"
                                                       role="tab" data-toggle="tab">ব্যবস্থাপনা কমিটি </a></li>
                            <li role="presentation"><a href="#comment" aria-controls="comment"
                                                       role="tab" data-toggle="tab">মন্তব্য </a></li>
                            <li role="presentation"><a href="#document" aria-controls="document"
                                                       role="tab" data-toggle="tab">ডকুমেন্ট </a></li>
                            <?php if ($n == 1 || $appeal == 1) { ?>
                                <li role="presentation"><a href="#dco_comment" aria-controls="dco_comment"
                                                           role="tab" data-toggle="tab">মন্তব্য করুন</a></li>

                            <?php } ?>
<li role="presentation"><a href="#certificate" aria-controls="certificate" role="tab" data-toggle="tab">certificate</a></li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active " id="somitee_info">
                                <br>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td>সমিতির নামঃ</td>
                                        <td><b><i><?php echo $somitee_info['0']['somitee_name']; ?></i></td>
                                    </tr>
                                    <tr>
                                        <td>সমিতির ধরণ</td>
                                        <td><b><i><?php echo $somitee_info['0']['somitee_type_name']; ?></i></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>সমিতির প্রকার</td>
                                        <td><b><i><?php echo $somitee_info[0]['somitee_cat_name']; ?></i></b></td>
                                    </tr>
                                     <tr>
                                <td>শ্রেণী</td>
                                <td> শ্রেণী: <?php

                                    echo $somitee_info['0']['somitee_type_name'];
                                    ?>
                                    <br />
                                    প্রকৃতি:
                                    <?php
                                    foreach($somitee_category as $row){
                                        echo $row['somitee_cat_name'].' , ';
                                    }
                                    ?>
                                    <br />
                                    প্রকার :
                                    <?php
                                    foreach($somitee_sub_category as $row){
                                        echo $row['somitee_sub_cat_name'].', ';
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <td>কার্যালয়ের ঠিকানা</td>
                                <td>
                                    বিভাগ :  <?=$somitee_info[0]['bn_div_name'];?><br />
                                    জেলা : <?=$somitee_info[0]['bn_dist_name'];?><br />
                                    উপজেলা  : <?=$somitee_info[0]['bn_upz_name'];?><br />
                                    বিস্তারিত   : <?=$somitee_info[0]['somitee_address'];?>

                                </td>
                            </tr>
                            <tr>
                                <td>সদস্য নির্বাচনী এলাকা</td>
                                <td>
                                    বিভাগ :  <?=$somitee_info_sodosso[0]['bn_div_name'];?><br />
                                    জেলা : <?=$somitee_info_sodosso[0]['bn_dist_name'];?><br />
                                    উপজেলা  : <?=$somitee_info_sodosso[0]['bn_upz_name'];?><br />
                                    বিস্তারিত   : <?=$somitee_info_sodosso[0]['somitee_address'];?>

                                </td>
                            </tr>
                            <tr>
                                <td>সমবায় এর কর্ম এলাকা</td>
                                <td>
                                    বিভাগ :  <?=$somitee_info[0]['k_div_name'];?><br />
                                    জেলা : <?=$somitee_info[0]['k_dist_name'];?><br />
                                    উপজেলা  : <?=$somitee_info[0]['k_upz_name'];?><br />
                                    বিস্তারিত   : <?=$somitee_info[0]['somitee_address'];?>

                                </td>
                            </tr>
                                    <tr>
                                        <td>সমিতির শেয়ারঃ</td>
                                        <td><b><i><?php echo $somitee_info[0]['somitee_share']; ?></i></b></td>
                                    </tr>
                                    <tr>
                                        <td>সমিতির শেয়ার মূল্যঃ</td>
                                        <td><b><i><?php echo $somitee_info[0]['somitee_per_share_price']; ?></i></td>
                                    </tr>
                                    <tr>
                                        <td>সমিতির উদ্দেশ্য</td>
                                        <td><b><i><?php echo $somitee_info[0]['somitee_purpose']; ?></i></b></td>
                                    </tr>
                                    <tr>
                                        <td>সমিতির রেজিস্ট্রেশন তারিখ</td>
                                        <td><b><i><?php echo $somitee_info[0]['somitee_reg_date']; ?></i></b></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="somitee_mem_info" style="margin-top: 30px">
                                <div class="table-responsive">
                                    <table id="org-emp-list-table" class="table table-striped table-bordered"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="text-align:center;">ক্রমিক</th>
                                            <th style="text-align:center;">আবেদনকারীর ছবি</th>
                                            <th style="text-align:center;">আবেদনকারীর নাম</th>
                                            <th style="text-align:center;">পিতার নাম</th>
                                            <th style="text-align:center;">মাতার নাম</th>
                                            <th style="text-align:center;">বর্তমান ঠিকানা</th>
                                            <th style="text-align:center;">স্থায়ী ঠিকানা</th>
                                            <th style="text-align:center;">বয়স</th>
                                            <th style="text-align:center;">পেশা</th>
                                        </tr>
                                        </thead>
                                        <tbody><?php $i = 1;
                                        foreach ($somitee_member_info as $row) { ?>
                                            <tr>
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
                                                <td>
                                                    <p style="text-align:center;"><img style="height:80px;width:80px"
                                                                                       src="<?php echo base_url(); ?>/uploads/profile_pic/<?= $row['somitee_member_profile_img'] ?>">
                                                    </p>
                                                </td>
                                                <td>
                                                    <p><?= $row['somitee_member_name'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $row['father_name'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $row['mother_name'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $row['present_address'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $row['permanent_address'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $row['somitee_member_dob'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $row['somitee_member_occupation'] ?></p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /col -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="somitee_mem_des_info"
                                 style="margin-top: 30px">
                                <div class="table-responsive">
                                    <table id="org-emp-des-list-table" class="table table-striped table-bordered"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="text-align:center;">ক্রমিক</th>
                                            <th style="text-align:center;">সদস্যের নাম</th>
                                            <th style="text-align:center;">উপাধি</th>
                                        </tr>
                                        </thead>
                                        <tbody><?php $i = 1;
                                        foreach ($somitee_member_des as $row) { ?>
                                            <tr>
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
                                                <td>
                                                    <p><?= $row['somitee_member_name'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $row['designation_name'] ?></p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /col -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="comment" style="margin-top: 30px">
                                <div class="table-responsive">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapse1">Division</a>
                                                </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse ">
                                                <div class="panel-body">
                                                    <table id="org-emp-des-list-table"
                                                           class="table table-striped table-bordered"
                                                           cellspacing="0">
                                                        <?php foreach ($division_info as $row) { ?>
                                                            <tr>
                                                                <td>তারিখ</td>
                                                                <td>
                                                                    <p><?php echo $row['divisional_admin_inquiry_date']; ?></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>স্টেটাস</td>
                                                                <td>
                                                                    <p><?php
                                                                        if ($row['divisional_admin_inquiry_verify'] == 1) {
                                                                            echo "অনুমোদন";
                                                                        } elseif ($row['divisional_admin_inquiry_verify'] == 2) {
                                                                            echo "সংশোধন";
                                                                        } elseif ($row['divisional_admin_inquiry_verify'] == 3) {
                                                                            echo "বাতিল ";
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>মন্তব্য</td>
                                                                <td>
                                                                    <p><?php echo $row['divisional_admin_comment']; ?></p>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapse2">UCO</a>
                                                </h4>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <table id="org-emp-des-list-table"
                                                           class="table table-striped table-bordered"
                                                           cellspacing="0">
                                                        <?php foreach ($uco_details as $row) { ?>
                                                            <tr>
                                                                <td>যাচাই এর তারিখ</td>
                                                                <td><?php echo $uco_details[0]['uco_inquiry_date']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>.... তারিখ</td>
                                                                <td><?php echo $somitee_info[0]['uco_inquiry_date']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>মন্তব্য</td>
                                                                <td colspan="3"><?php echo $uco_details[0]['uco_comment']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($n == 0) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">DCO</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse3" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <table class="table">
                                                            <?php foreach ($dco_info as $row) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php if ($row['dco_inquiry_verify'] == 1) {
                                                                            echo "অনুমোদনের তারিখ";
                                                                        } elseif ($row['dco_inquiry_verify'] == 2 || $row['dco_inquiry_verify'] == 3) {
                                                                            echo 'বাতিলের তারিখ';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $row['dco_inquiry_date']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>আবেদনের তারিখ</td>
                                                                    <td><?php echo $somitee_info[0]['dco_inquiry_date']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>মন্তব্য</td>
                                                                    <td colspan="3"><?php echo $row['dco_comment']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div><!-- /col -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="document" style="margin-top: 30px">
                                <div class="table-responsive">
                                    <table id="org-emp-des-list-table" class="table table-striped table-bordered"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="text-align:center;">ক্রমিক</th>
                                            <th style="text-align:center;">ডকুমেন্ট এর নাম</th>
                                            <th style="text-align:center;" colspan="2">পদক্ষেপ</th>
                                        </tr>
                                        </thead>
                                        <?php if (sizeof($document) == 0) {
                                        } else { ?>
                                            <tbody>
                                            <?php $i = 1;
                                            $documents = json_decode($document[0]['somitee_uploaded_file_name']);
                                            foreach ($documents as $row) { ?>
                                                <tr>
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
                                                    <td><?php echo $row->file_name; ?></td>
                                                    <td><?php echo $row->file_path; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>uploads/files/<?php echo $row->file_path; ?>"
                                                           download="file_1">Download</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div><!-- /col -->
                            </div>
                            <?php if ($n == 1 || $appeal == 1) { ?>
                                <div role="tabpanel" class="tab-pane" id="dco_comment" style="margin-top: 30px">
                                    <form action="index.php/dco/dco_verify" method="post">
                                        <textarea name="dco_comment" id="summernote"></textarea>
                                        verification
                                        <div>
                                            <input type="radio" name="dco_verify" value="1"> অনুমোদন বাতিল
                                            <?php if ($appeal == 1) { ?>
                                                <input type="radio" name="dco_verify" value="3">বাতিল
                                            <?php } else { ?>
                                                <input type="radio" name="dco_verify" value="2">বাতিল
                                            <?php } ?>

                                            <input type="hidden" name="somitee_id"
                                                   value="<?= $somitee_info[0]['somitee_id'] ?>">
                                        </div>

                                        <button class=" col-md-2 col-md-offset-4 btn btn-success gnt-btn save-btn">সেভ
                                            ডকুমেন্ট
                                        </button>
                                    </form>
                                </div>
                            <?php } ?>
							
							
				<div role="tabpanel" class="tab-pane" id="certificate">
                                <div class="col-xs-12 certificate">
                                    <div class="header">
                                        <p class="text-center"><img src="<?=base_url();?>assets/img/gov_logo.png" alt=""></p>
                                        <p class="text-center">জেলা সমবায় কার্যালয়</p>
                                        <p class="text-center">ঢাকা</p>
                                        <p class="text-center certificate-heading">
                                            <img src="assets/img/certificate_heading.png" alt="">
                                        </p>

                                        <div class="col-xs-5 num-border">
                                            নিবন্ধন নংঃ <span>0</span><span>0</span><span>2</span><span>5</span><span>4</span>
                                        </div>
                                        <div class="col-xs-4 num-border pull-right">
                                            তারিখঃ
                                            <span>১</span><span>৯</span>
                                            <span>০</span><span>৯</span>

                                            <span>২</span><span>০</span><span>১</span><span>৬</span>
                                        </div>
                                    </div> <br><br>
                                    <div class="col-xs-12 body">
                                        <p class="">সমিতির নাম ও ঠিকানা</p>
                                        <p class="org-name-add text-center">আলোর পথে শ্রমজীবি সম্বায় সমিতি লিঃ</p>
                                        <p class="org-name-add"></p>

                                        <p>বাড়ী নংঃ ৩৯৪/২, ডাকঘর-সেনপাড়া পর্বতা, মিরপুর, থানা-কাফ্রুল, জেলা-ঢাকা</p>

                                        <p>এই মর্মে প্রত্যয়ন করা যাইতেছে যে, সমবায় সমিতি আইন, ২০০১ (সংশোধীত আইন/২০০২ ও ২০১৩) এর বিধান অনুযায়ী উপরে বর্ণিত শিরোনামের সমবায় সমিতি ও উহার উপ-আইনসমূহ যাথারীতি আমার কার্যালয়ে নিবন্ধিত হইয়াছে।</p>
                                        <p>সমিতির সভ্য নির্বাচনী এলাকা ও কর্মএলাকা নিম্নরূপ হইবেঃ </p>
                                        <p class="org-name-add"></p>
                                        <p class="text-center">মিরপুর ও কাফরুল থানায় বসবাসরত শ্রমজীবিদের মদ্ধ্যে সীমাবদ্ধ</p>
                                        <p class="org-name-add"></p>
                                        <p class="text-center">ও কর্ম এলাকা মিরপুর ও কাফরুন থানার মদ্ধ্যে সীমাবদ্ধ।</p>

                                        <p>অদ্য <strong>২০১৬</strong> ক্রীষ্টাব্দের <strong>জুলাই</strong> মাসের <strong>ঊনিশ</strong> তারিখে আমার সাক্ষর ও সীল প্রদত্ত হইল</p>
                                    </div>
                                    <div class="col-md-4 col-md-offset-8 footer">
                                        <div class="pull-right">
                                            <p class="text-center">
                                                <img src="<?=base_url();?>assets/img/sign.png" alt=""><br>
                                            </p>
                                            <p class="text-center">জেলা সমবায় অফিসার</p>
                                            <p class="text-center">ঢাকা</p>
                                        </div>
                                    </div>
                                </div>
                               

                               
                            </div> <!-- /tabpanel -->
							
                        </div>
                    </div>
                </div> <!-- /col -->
            </div> <!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<?php //include("layouts/footer.php"); ?>
