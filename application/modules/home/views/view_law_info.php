<?php //include 'layouts/header.php';  ?>
<?php ?>
<!-- Main Content
==================================================== -->

<?php $exc = $this->session->userdata('message_sc');
if (empty($exc)) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="instruction-section-title" style="text-align: center;">আইন ও বিধি </h2>
                    </div><!-- row -->
                </div>
                <div class="row instruction">
                        
                     <div class="col-md-3 download-form">
			<div class="panel panel-hover">
				<div class="download-thumbnail">
					<img style="height:100%;margin:0 auto" src="<?=base_url();?>public_assets/img/doc.png" alt="" class="img-responsive">
				</div>
				<div class="">
					<h3 style="padding-top: 8px">সমবায় সমিতি আইন</h3>
					<a href="<?=base_url();?>form_download/cooperative_societies_act.pdf">
						ডাউনলোড করুন<span class="glyphicon glyphicon-download-alt" style="margin-left: 8px"></span>
					</a>
				</div>
			</div>
		     </div>
  

                     <div class="col-md-3 download-form">
			<div class="panel panel-hover">
				<div class="download-thumbnail">
					<img style="height:100%;margin:0 auto" src="<?=base_url();?>public_assets/img/doc.png" alt="" class="img-responsive">
				</div>
				<div class="">
					<h3 style="padding-top: 8px">সমবায় সমিতি বিধিমালা</h3>
					<a href="<?=base_url();?>form_download/coop_rules_2004.pdf">
						ডাউনলোড করুন<span class="glyphicon glyphicon-download-alt" style="margin-left: 8px"></span>
					</a>
				</div>
			</div>
		     </div>
  
                     <div class="col-md-3 download-form">
			<div class="panel panel-hover">
				<div class="download-thumbnail">
					<img style="height:100%;margin:0 auto" src="<?=base_url();?>public_assets/img/doc.png" alt="" class="img-responsive">
				</div>
				<div class="">
					<h3 style="padding-top: 8px">জাতীয় সমবায় নীতি</h3>
					<a href="<?=base_url();?>form_download/cooperative_policy2012.pdf">
						ডাউনলোড করুন<span class="glyphicon glyphicon-download-alt" style="margin-left: 8px"></span>
					</a>
				</div>
			</div>
		     </div>
  

                     <div class="col-md-3 download-form">
			<div class="panel panel-hover">
				<div class="download-thumbnail">
					<img style="height:100%;margin:0 auto" src="<?=base_url();?>public_assets/img/doc.png" alt="" class="img-responsive">
				</div>
				<div class="">
					<h3 style="padding-top: 8px">উপ-আইন</h3>
					<a href="<?=base_url();?>form_download/modelbylaw.pdf">
						ডাউনলোড করুন<span class="glyphicon glyphicon-download-alt" style="margin-left: 8px"></span>
					</a>
				</div>
			</div>
		     </div>
  




                </div><!-- /row -->
            </div>
        </div>
    </div><!-- /row -->

    <?php $this->session->unset_userdata('message_sc'); ?>

<?php } ?>

<?php
//include 'layouts/footer.php'; ?>