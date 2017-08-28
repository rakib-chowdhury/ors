<?php //include ("layouts/header.php");  ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php //include("layouts/division-sidebar-nav.php"); ?>
        <?php $this->load->view('layouts/sidebar-nav'); ?>

        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2>সমিতির তালিকা</h2>
                        <hr>

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#new_somitee_list"
                                                                      aria-controls="new_somitee_list"
                                                                      role="tab"
                                                                      data-toggle="tab">নতুন সমিতি</a></li>
                            <li role="presentation" class=""><a href="#verified_somitee_list"
                                                                aria-controls="verified_somitee_list"
                                                                role="tab"
                                                                data-toggle="tab">যাচাইকৃত সমিতি </a></li>

                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="new_somitee_list">
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered data-table"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ক্রমিক</th>
                                            <th>তারিখ</th>
                                            <th style="text-align:center;">সমিতির নাম</th>
                                            <th>সমিতির ধরণ</th>
                                            <th>ট্র্যাকিং নম্বর</th>
                                            <th>অবশিষ্ট সময়</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;
                                        foreach ($somitee_info_tab1 as $row) { ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                                    $output = str_replace(range(0, 9), $bn_digits, $i);
                                                    $i++;
                                                    echo $output;
                                                    ?>
                                                </td>
                                                <td><?php echo $row['uco_inquiry_date'] ?></td>
                                                <td>
                                                    <a href="index.php/uco/somitee_list_detail/<?= $row['somitee_id'].'/s' ?>"><?php echo $row['somitee_name']; ?></a>
                                                </td>
                                                <td><?php echo $row['somitee_type_name']; ?>
                                                </td>
                                                <td><?php echo $row['somitee_track_id']; ?></td>
                                                <td><?php
                                                    $dAte = date('Y-m-d');
                                                    $date_to = date_create($dAte);
                                                    $date_from = date_create($row['uco_inquiry_date']);
                                                    $res_day = date_diff($date_from, $date_to);

                                                    if ($res_day->d <= 10) {
                                                        echo $res_day->d . ' দিন';
                                                    } else {
                                                        echo ' সময় শেষ ';
                                                    }

                                                    ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /col -->
                            </div>
                            <div role="tabpanel" class="tab-pane " id="verified_somitee_list">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped table-bordered data-table"
                                               cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>ক্রমিক</th>
                                                <th>যাচাই এর তারিখ</th>
                                                <th style="text-align:center;">সমিতির নাম</th>
                                                <th>সমিতির ধরণ</th>
                                                <th>ট্র্যাকিং নম্বর</th>
                                                <th>........তারিখ </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1;
                                            foreach ($somitee_info_tab2 as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                                                        $output = str_replace(range(0, 9), $bn_digits, $i);
                                                        $i++;
                                                        echo $output;
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['verified_date'] ?></td>
                                                    <td>
                                                        <a href="index.php/uco/somitee_list_detail/<?= $row['somitee_id'].'/all' ?>"><?php echo $row['somitee_name']; ?></a>
                                                    </td>
                                                    <td><?php echo $row['somitee_type_name']; ?>
                                                    </td>
                                                    <td><?php echo $row['somitee_track_id']; ?></td>
                                                    <td><?php echo $row['inquiry_date'] ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /col -->


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
