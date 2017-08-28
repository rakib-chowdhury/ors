<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<base href="<?php echo base_url() ?>">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2>সমবায় এলাকা এর নিবন্ধন অবস্থা</h2>
                    <hr>
                </div><!-- /col -->
                <div class="col-md-12">
                    <div class="table-responsive employee-list">
                        <table class="data-table table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                 <th>ক্রমিক</th>
                                <th>উপজেলা</th>
                                <th>অবস্থা </th>                                
                                <th>অ্যাকশন </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($upz as $r){  ?>
                                <tr>
                                    <td><?php echo str_replace(range(0,9),$bn_digits, $i++);?></td>
                                    <td><?php echo $r['bn_upz_name'];?></td>
                                    <?php 
                                            $rr= $r['is_block'];
                                              if($rr == 1){?>
                                                            <td><span class="label label-danger arrowed-in arrowed-in-right">অনুনোমোদিত</span></td>
                                                            <?php }else{?>
                                                            <td><span class="label label-success arrowed-in arrowed-in-right">অনুমোদিত</span></td>
                                                            <?php }?>
                                       
                                    
                                    <td>
                                        <a href="<?php echo site_url('doc/chng_upz_status/'.$r['upz_id']);?>">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </a>
                                    </td>
                                    
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer'); ?>