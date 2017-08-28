<?php //include ("layouts/header.php");   ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php //include("layouts/sidebar-nav.php"); ?>
        <?php $this->load->view('layouts/sidebar-nav'); ?>

        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-xs-12">
                    <h2>কর্মচারী/ কর্মকর্তা নিবন্ধন</h2>
                </div>
                <div class="col-xs-12">
                    <form class="form-horizontal" id="admin-reg-form" action="<?php echo site_url('doc/employee_registration_form_post'); ?>" method="post">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">কর্মকর্তা/কর্মচারীর নাম :</label>
                            <div class="col-sm-5">
                                <input type="text" minlength="3" class="form-control" id="name" name="name" placeholder="কর্মকর্তা/কর্মচারীর নাম" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="name-help">*আবশ্যক</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">ই-মেইল</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="email-help">*আবশ্যক। উদাহরনঃ someone@domain.com</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">পাসওার্ড</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="4" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="password-help">*আবশ্যক। কমপক্ষে ৪ সংখ্যার হতে হবে</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birth-date" class="col-sm-2 control-label">জন্ম তারিখ</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="birth-date" id="birth-date" placeholder="জন্ম তারিখ" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="birth-date-help">*আবশ্যক</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">ফোন নম্বর</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="ফোন নম্বর" minlength="11" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="phone-help">*আবশ্যক</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nid" class="col-sm-2 control-label">জাতীয় পরিচয় পত্র নং :</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="nid" id="nid" placeholder="জাতীয় পরিচয় পত্র নং" minlength="17" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="nid-help">*আবশ্যক</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="designation" class="col-sm-2 control-label">পদের নাম</label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control" name="designation" id="designation" value="<?php echo $designation_id; ?>">
                                <input type="text" class="form-control" name="designation_name" id="designation_name" value="<?php echo $designation_name; ?>" readonly>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="designation-help">*আবশ্যক</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 col-sm-offset-2">
                                <button class="btn btn-primary gnt-btn btn-block">
                                    <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;
                                    <span>Continue</span>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="selector_id" value="<?php echo $selector_id; ?>"/>
                        <input type="hidden" name="division_id" value="<?php echo $division_id; ?>"/>
                        <input type="hidden" name="district_id" value="<?php echo $district_id; ?>"/>
                        <input type="hidden" name="upz_id" value="<?php echo $upz_id; ?>"/>
                    </form>
                </div>
            </div><!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<?php //include("layouts/footer.php"); ?>
