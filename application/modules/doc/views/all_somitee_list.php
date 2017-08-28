<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2><?php echo $title;?></h2>
                        <hr>
                        <table id="" class="table data-table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align:center;">ক্রমিক</th>
                                <th style="text-align:center;">তারিখ</th>
                                <th style="text-align:center;">সমবায়ের নাম</th>
                                <th style="text-align:center;">স্টেটাস</th>
                                <?php if($s_type != 'new'){ ?>
                                <th style="text-align:center;">ট্র্যাকিং নম্বর</th>
                                <?php if(sizeof($somitee_info) == 0){

                                }else{?>
                                <?php if($somitee_info[0]['somitee_status'] == 1){ ?>
                                <th style="text-align:center;">সার্টিফিকেট</th>
                                <?php }
                                } ?>

                                <?php }?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($somitee_info as $row) { ?>
                            <tr>
                                <td style="text-align:center;">
                                    <?php
                                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                    $output = str_replace(range(0, 9), $bn_digits, $i);
                                    $i++;
                                    echo $output;
                                    ?>
                                </td>
                                <td style="text-align:center;"><?php $output = str_replace(range(0, 9), $bn_digits, explode(' ', $row['somitee_reg_date'])[0]); echo $output; ?></td>
                                <td>
                                    <a href="index.php/doc/somitee_list_detail/<?php echo $row['somitee_id'] . '/' . $s_type; ?>"><?php echo $row['somitee_name']; ?></a>
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
                                <?php if($s_type != 'new'){ ?>
                                <td style="text-align:center;">
                                    <?php echo $row['somitee_track_id'];
                                    ?>
                                </td>
                                <?php if($somitee_info[0]['somitee_status'] == 1){ ?>
                                <td style="text-align:center;"><a target="_blank"
                                            href="<?php echo site_url('doc/certificate_generate');?>/<?php echo $row['somitee_id'];?>"
                                            style="cursor:pointer;">ডাউনলোড</a></td>
                                <?php } ?>
                                <?php }?>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>