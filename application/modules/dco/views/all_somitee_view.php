<?php //include ("layouts/header.php"); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">

        <div class="col-md-12 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts_uco_dco/secondary-nav');?>
                <div class="col-md-6 col-md-offset-3">

                </div><!-- /col6 -->

                <div class="col-md-10 col-md-offset-1" style="margin-top:50px;">
                    <div style="margin-bottom: 10px;">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url('dco')?>">হোম</a></li>
                            <li class="active"><?php
                                if ($type == 'new') {
                                    echo 'নতুন সমবায় তালিকা';
                                }elseif($type == 'all'){
                                    echo 'সকল সমবায় তালিকা';
                                }else if($type == 'selected'){
                                    echo 'সফল সমবায় তালিকা';
                                }else if($type == 'appeal'){
                                    echo 'আপীল সমবায় তালিকা';
                                }else if($type == 'reject'){
                                    echo 'বাতিল সমবায় তালিকা';
                                }
                                ?></li>
                        </ol>
                    </div>
                    <div class="panel panel-success" style="border-color: #337ab7;">
                        <div class="panel-heading" style="background-color: #337ab7; color: whitesmoke; border-color: #337ab7;">
                            <h4 class="heading-title"><?php echo $title;?></h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered data-table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style='width:5%;'>ক্রমিক নং</th>
                                    <th style="text-align: center;">উপজেলা কর্মকর্তা অনুমোদন তারিখ</th>
                                    <th style="text-align: center;">সমবায়ের নাম</th>
                                    <th style="text-align:center;">স্টেটাস</th>
                                    <th style="text-align: center;">সমবায়ের ট্র্যাকিং আইডি</th>
                                    <th style="text-align: center;">সংগঠকের আবেদন তারিখ</th>
                                    <?php if($type == 'new'){?>
                                    <th style="text-align: center;">সময়</th>
                                    <?php } ?>
                                    <?php if($type == 'selected'){ ?>

                                    <th style="text-align: center;">সার্টিফিকেট</th>

                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody><?php $i = 1;
                                foreach ($all_info as $row) { ?>
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
                                    <td><?php if($row['is_re_register'] == 1){ echo'-';}else{ echo str_replace(range(0,9),$bn_digits,$row['dco_inquiry_date']); }?></td>
<!--                                    <td>--><?//= str_replace(range(0,9),$bn_digits,$row['dco_inquiry_date']);?><!--</td>-->
                                    <td>
                                        <p><a style="cursor:pointer;"
                                              href="<?php echo site_url('dco/see_somitee_detail/' . $row['somitee_id'] . '/' . $type);?>"><?= $row['somitee_name'] ?></a>
                                        </p>
                                    </td>
                                    <td style="text-align:center;"><?php $st = $row['somitee_status'];
                                        if($row['is_re_register'] == 1)
                                        {
                                            echo "রি-রেজিস্ট্রেশন";
                                        }
                                        else
                                        {
                                            if ($st == 1) {
                                                echo "সফল ";
                                            } elseif ($st == 2 || $st == 0) {
                                                echo "চলমান";
                                            } elseif ($st == 4) {
                                                echo "সফল";
                                            } elseif ($st == 3 || $st == 5 || $st == 6) {
                                                echo "বাতিল";
                                            }
                                        }

                                        ?></td>
                                    <td>
                                        <p><?= $row['somitee_track_id'] ?></p>
                                    </td>
                                    <td><?php if($row['is_re_register'] == 1){ echo'-';}else{ echo str_replace(range(0,9),$bn_digits,explode(' ',$row['somitee_reg_date'])[0]); }?></td>
<!--                                    <td>--><?//= str_replace(range(0,9),$bn_digits,explode(' ',$row['somitee_reg_date'])[0]);?><!--</td>-->
                                   <?php if($type == 'new'){?>
                                    <td>
                                        <?php
                                        $date1 = date_create($row['dco_inquiry_date']);
                                        $date2 = date_create(date('Y-m-d'));
                                        $diff = date_diff($date1, $date2);                                        
                                        if($diff->days<=7){
                                                    echo str_replace(range(0, 9), $bn_digits, $diff->days).' দিন';
                                                }else{
                                                    echo '<span style="color:red">'.str_replace(range(0, 9), $bn_digits, $diff->days).' দিন</span>';
                                                }
                                        ?>
                                    </td>
                                    <?php } ?>
                                    <?php if($type == 'selected'){?>

                                    <td><a style="cursor:pointer;"
                                           href="<?php echo site_url('dco/certificate_generate');?>/<?php echo $row['somitee_id'];?>">ডাউনলোড</a>
                                    </td>

                                    <?php }?>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /panel -->
                </div>
            </div>

            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div> <!-- /col10 -->
    </div>
</div>

<?php //include("layouts/footer.php"); ?>
