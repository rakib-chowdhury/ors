<?php //include 'layouts/header.php';  ?>
<?php ?>
<!-- Main Content
==================================================== -->

<?php $exc = $this->session->userdata('message_sc');
if (empty($exc)) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel instruction">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h2 class="instruction-section-title" style="text-align: center;">আপনার জিজ্ঞাসা </h2>
                    </div><!-- row -->
                </div>
                <div class="row instruction">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h3>প্রাথমিক প্রশ্ন ১</h3>
                                <p>প্রাথমিক সমবায় সমিতি ( কমপক্ষে ২০ জন সদস্য নিয়ে গঠিত ) নিবন্ধনের জন্য জেলা সমবায় অফিসারের নিকট নির্দিষ্ট আবেদন ফর্মে আবেদন করতে হবে </p>
                            </li>
                            <li class="list-group-item">
                                <h3>প্রাথমিক প্রশ্ন ২ </h3>
                                <p>কেন্দ্রীয় সমবায় সমিতি ( কমপক্ষে ২০ জন সদস্য নিয়ে গঠিত ) নিবন্ধনের জন্য উপজেলা সমবায় অফিসারের মাধ্যমে জেলা সমবায় অফিসারের নিকট প্রেরণ করলে নির্দিষ্ট আবেদন ফর্মে আবেদন করতে হবে </p>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div><!-- /row -->
            </div>
        </div>
    </div><!-- /row -->

    <?php $this->session->unset_userdata('message_sc'); ?>

<?php } ?>

<?php
//include 'layouts/footer.php'; ?>