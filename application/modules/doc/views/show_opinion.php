<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="margin-top:50px;">
                    <div class="panel panel-success" style="max-height: 600px; overflow-y: auto">
                        <div class="panel-heading">
                            <h3 class="heading-title text-center">মতামত</h3>
                        </div>

                        <table class="table table-striped table-bordered table-hover" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ক্রমিক</th>
                                <th>মতামতের<br>তারিখ</th>
                                <th>মতামতকারীর<br>নাম</th>
                                <th>মতামতকারীর<br>ফোন</th>
                                <th>মতামতকারীর<br>ইমেইল</th>
                                <th>মতামতের<br>বিষয়</th>
                                <th>মতামতের<br>বিবরণ</th>
                            </tr>
                            </thead>
                            <tbody >
                            <?php foreach ($opinion as $i=>$r){ ?>
                            <tr>
                                <td><?php echo str_replace(range(0, 9), $bn_digits, ($i + 1));?></td>
                                <td><?php echo str_replace(range(0, 9), $bn_digits, explode(' ', $r['created_date'])[0]);?></td>
                                <td><?php echo $r['name'];?></td>
                                <td><?php echo str_replace(range(0, 9), $bn_digits, $r['mobile_no']);?></td>
                                <td><?php echo $r['email'];?></td>
                                <td><?php echo $r['opinion_title'];?></td>
                                <td><?php echo $r['opinion_description'];?></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div><!-- /panel -->
                </div>
            </div><!--/row -->

            <div class="row" style="margin-top: 48px;">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div><!-- /col10 -->
    </div><!-- /row -->
</div><!-- /container -->

<?php $this->load->view('layouts/footer'); ?>
