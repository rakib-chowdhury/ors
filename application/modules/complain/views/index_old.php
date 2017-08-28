<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">

        <!-- Main Content
        ============================================== -->
        <div class="col-md-12 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts_uco_dco/secondary-nav'); ?>
                <?php if ($track == 1 && $pro == 0) { ?>
                    <div id="track_div" class="col-md-6 col-md-offset-3">
                        <div class="panel tracking"><?php //print_r($this->session->userdata);?>
                            <h4 class="label-success">সমবায় ট্রাকিং</h4>

                            <form action="<?php echo site_url('complain/find_track_id'); ?>" method="post">
                                <p>ট্রাকিং নম্বর দিয়ে সার্চ করুন</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" name='track_id' id='track_id'
                                           placeholder="আপনার ট্রাকিং আইডি লিখুন">
                                </div>
                                <div class="form-group">
                                    <button type="submit" id='uco_search' class="btn btn-raised btn-danger btn-lg">
                                        অনুসন্ধান
                                    </button>
                                </div>
                                <?php if ($this->session->userdata('trck_err') != null || $this->session->userdata('trck_err') != '') {
                                    echo '<p style="color: red; text-align: center;">' . $this->session->userdata('trck_err') . '</p>';
                                } ?>
                            </form>
                        </div>
                    </div><!-- /col6 -->
                <?php } ?>
                <?php if ($track == 0 && $pro == 1) { ?>
                    <div id="profile_div" class="col-md-10 col-md-offset-1" style="margin-top:50px;">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="heading-title">প্রোফাইল </h4>
                            </div>
                            <table style="border: 1px solid #ddd;" class="table table-stripped table-bordered">
                                <tr>
                                    <td style="width: 345px;">নাম</td>
                                    <td><?php echo $admin_info[0]['admin_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>ভোটার আই ডি</td>
                                    <td><?php echo $admin_info[0]['admin_nid']; ?></td>
                                </tr>
                                <tr>
                                    <td>ইমেইল</td>
                                    <td><?php echo $admin_info[0]['admin_email']; ?></td>
                                </tr>
                                <tr>
                                    <td>ফোন</td>
                                    <td><?php echo $admin_info[0]['admin_phone']; ?></td>
                                </tr>
                                <tr>
                                    <td> পদবী</td>
                                    <td><?php echo "অভিযোগ সমবায় অফিসার "; ?></td>
                                </tr>
                            </table>
                        </div><!-- /panel -->
                    </div>
                <?php } ?>
                <div class="row">
                    <footer id="admin-footer">
                        <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                    </footer>
                </div><!-- /row -->
            </div> <!-- /col10 -->
        </div><!-- /row -->
    </div> <!-- /container-fluid -->
    <?php $this->load->view('layouts_uco_dco/footer'); ?>





