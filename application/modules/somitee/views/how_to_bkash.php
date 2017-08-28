<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<style type="text/css">
    .fixed_width {
        width;
        32% !important;
        overflow: hidden;
        white-space: nowrap;
    }


</style>
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="well" style="background-color: #BBDEFB; margin-bottom: 4px">
            <h3 class="text-center" style="margin:0; padding: 0">কিভাবে বিকাশ করবো</h3>
        </div>
        <div class="table-responsive well panel panel-body">
            <div class="col-md-12">
                <img src="<?= base_url() ?>uploads/bkash.png" alt="">
                <h3 class="text-center sms-wait" style="margin-bottom: 28px;margin-top:28px">
                    How to recharge from any personal bKash number?
                </h3>
                <img src="<?= base_url() ?>uploads/how-to-pay.png"/>
                <h4 style="color:#ff0066;"> After successful payment collect Transaction ID and use that ID at <a
                        href="<?=site_url('somitee')?>">bKash Payment</a></h4>
                <div style="border:solid 1px #2f6e92; width:802px;">
                    <object class="bordered" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                            codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
                            height="360" width="640">
                        <param name="quality" value="high">
                        <param name="wmode" value="transparent">
                        <param name="movie"
                               value="https://www.bkash.com/sites/default/files/english video/8. How to make Payment-English.swf">
                        <embed class="bordered" pluginspage="https://www.macromedia.com/go/getflashplayer"
                               quality="high"
                               src="https://www.bkash.com/sites/default/files/english%20video/8.%20How%20to%20make%20Payment-English.swf"
                               type="application/x-shockwave-flash" wmode="transparent" height="500" width="800">
                    </object>
                </div>


            </div>
        </div>
    </div>
</div>

<?php $this->load->view('public_layouts/footer'); ?>

