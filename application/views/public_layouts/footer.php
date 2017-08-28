</div> <!-- /container -->
<div class="container footer">
    <!-- Footer
    ==================================================== -->
    <footer>
        <div class="row">

            <div class="col-sm-4">
                <ul class="list-unstyled">
                    <li><span class="glyphicon glyphicon-envelope"></span>&nbsp;ইমেইলঃ <a
                            href="mailto:coop.reg@gmail.com">reg.samabay@gmail.com</a></li>
                    <li><span class="glyphicon glyphicon-earphone"></span>&nbsp;হটলাইনঃ +৮৮-০১৭০৮৮৬৮১০০</li>
                </ul>
            </div>

            <div class="col-sm-5">
                <ul class="list-unstyled update">
                    <?php $i = 0;
                    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
                    $site_visitor = str_replace(range(0, 9), $bn_digits, $site_visitor);
                    $total_somitee = str_replace(range(0, 9), $bn_digits, $total_somitee);
                    $i++;

                    ?>
                    </p>
                    <li>সাইটটি শেষ হাল-নাগাদ করা হয়েছে: <span><?= str_replace(range(0,9),$bn_digits,$lstUp[0]['last_update'])?></span></li>
                    <li>নিবন্ধিত সমবায়ের সংখ্যা: <span><?= $total_somitee; ?></span></li>
                    <li>সাইটে ভিজিটরঃ <span><?= $site_visitor; ?></span></li>
                    <!--<li><a href="<?= site_url() . 'login_admin'; ?>">লগইন</a></li>-->
                </ul>
            </div>

            <div class="col-sm-3 tech-help">
                <p class="pull-right">
                    <span>কারিগরি সহায়তায়</span> <br>
                    <img src="<?php echo base_url(); ?>public_assets/img/gnt.png" alt="">
                </p>
            </div>
            <div class="col-sm-12">
                <hr>
                <p class="text-center">&copy; ২০১৬ সমবায় অধিদপ্তর, গণপ্রজাতন্ত্রী বাংলাদেশ সরকার। সর্বসত্ত্ব
                    সংরক্ষিত।</p>
            </div>
        </div> <!-- /row -->
    </footer>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public_assets/myCustom/js/highcharts.js"></script><!--2016-12-27-->
<script>window.jQuery || document.write('<script src="<?php echo base_url();?>public_assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>public_assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public_assets/js/vendor/material.min.js"></script>
<script src="<?php echo base_url(); ?>public_assets/js/vendor/ripples.min.js"></script>
<script src="<?php echo base_url(); ?>public_assets/js/vendor/datepicker.js"></script>
<script src="<?php echo base_url(); ?>public_assets/js/vendor/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public_assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public_assets/js/vendor/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public_assets/js/main.js"></script>


</body>
</html>
