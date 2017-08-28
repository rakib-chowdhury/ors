<?php // include ('layouts/header.php'); ?>
    <style>
        .panel {
            margin-bottom: 0px;
        }
.download-thumbnail {
    width: 70%;
    margin: 0px auto;
}
    </style>
<div class="container-fluid display-table">
	<div class="row display-table-row">
		<div class="col-md-12 display-table-cell" id="main-content">
			<div class="col-md-5">
				<h2 class="text-center">লগইন করুন</h2>
<div class="col-md-12">
                    <?php
                    $exc = $this->session->userdata('error');
                    if (!empty($exc)):?>
                        <div class="col-lg-12" align="center">
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><?= $exc ?></strong>
                            </div>
                        </div>
                        <?php $this->session->unset_userdata('error'); ?>
                    <?php endif; ?>
                </div>


                <div class="col-md-12">
                    <?php
                    $exc = $this->session->userdata('logout_message');
                    if (!empty($exc)):?>
                        <div class="col-lg-12" align="center">
                            <div class="alert alert-dismissable alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><?= $exc ?></strong>
                            </div>
                        </div>
                        <?php $this->session->unset_userdata('logout_message'); ?>
                    <?php endif; ?>
                </div>
				<form class="login-form form-horizontal"  action="<?php echo site_url('login_admin/check_login');?>" method="post">
                    <div class="form-group">
                        <!--<label for="login-nid" class="col-sm-3 control-label">জাতীয় পরিচয় পত্রের নং</label>-->
                         <label for="login-nid" class="col-sm-3 control-label">NID</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="login-nid" name="login_nid" minlength="17" maxlength="17" required>
                        </div>
                        <div class="col-sm-3">
                            <span class="help-block" id="login-nid-help">*আবশ্যক</span>
                        </div>
                    </div>
                    <div class="form-group">
<!--                        <label for="login-pass" class="col-sm-3 control-label">পাসওয়ার্ড</label>-->
                        <label for="login-pass" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="login-pass" name="login_pass" minlength="4"  required>
                        </div>
                        <div class="col-sm-3">
                            <span class="help-block" id="login-pass-help">*আবশ্যক</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" name="login" class="btn btn-primary gnt-btn pull-right btn-block">
                                <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;
                                <span>লগ-ইন</span>
                            </button>
                        </div>
                    </div>
                </form>


                <div class="col-md-12">

                    <div class="col-md-4 download-form">
                        <div class="panel panel-hover">
                            <div class="download-thumbnail">
                                <img style="height:100px;margin:0 auto" src="<?=base_url();?>public_assets/img/pdf.ico" alt="" class="img-responsive">
                            </div>
                            <div class="">
                                <h3 style="padding-top: 8px">DOC-Manual</h3>
                                <a href="<?=base_url();?>form_download/doc_manual.pdf">
                                    ডাউনলোড করুন<span class="glyphicon glyphicon-download-alt" style="margin-left: 8px"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 download-form">
                        <div class="panel panel-hover">
                            <div class="download-thumbnail">
                                <img style="height:100px;margin:0 auto" src="<?=base_url();?>public_assets/img/pdf.ico" alt="" class="img-responsive">
                            </div>
                            <div class="">
                                <h3 style="padding-top: 8px">DCO-Manual</h3>
                                <a href="<?=base_url();?>form_download/ORS_Manual_DCO.pdf">
                                    ডাউনলোড করুন<span class="glyphicon glyphicon-download-alt" style="margin-left: 8px"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 download-form">
                        <div class="panel panel-hover">
                            <div class="download-thumbnail">
                                <img style="height:100px;margin:0 auto" src="<?=base_url();?>public_assets/img/pdf.ico" alt="" class="img-responsive">
                            </div>
                            <div class="">
                                <h3 style="padding-top: 8px">UCO-Manual</h3>
                                <a href="<?=base_url();?>form_download/ORS_Manual_UCO.pdf">
                                    ডাউনলোড করুন<span class="glyphicon glyphicon-download-alt" style="margin-left: 8px"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="col-md-7">
				<div class="panel">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<h2 class="instruction-section-title">সমবায় সম্পর্কিত নোটিশ</h2>
						</div><!-- row -->
					</div>
					<div class="row instruction">
                        <?php foreach($all_notice_info as $row):?>
					<div class="col-md-2 col-md-offset-1 hidden-xs hidden-sm">
						<span class="gnt-ins-icon">
							<img src="<?php echo base_url();?>public_assets/img/icon.png" alt="icon">
						</span>						
					</div>
					<div class="col-md-8">
						<h3><?=$row->notice_title?></h3>
						<p><?=$row->notice_detail?></p>
						<hr>
					</div>
                                        <?php endforeach;?>
				</div><!-- /row -->
				</div>
			</div>
		</div><!-- /col -->
	</div><!-- /outer row -->
</div>
<?php //include ('layouts/footer.php'); ?>