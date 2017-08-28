<?php //include ("layouts/header.php"); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php //include("layouts/sidebar-nav.php"); ?>
        <?php $this->load->view('layouts/sidebar-nav');?>
        
        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                	<h2>Notice sample</h2>
                	<hr>




       
            <?php
                    $exc = $this->session->userdata('message');
                 if(!empty($exc )):?>  
                <div class="col-lg-12" align="center">
                  <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?=$exc ?></strong> 
                  </div>
                </div>
                       <?php $this->session->unset_userdata('message'); ?>
            <?php endif;?>
                </div><!-- /col -->


                </div><!-- /col -->
                
                <!-- TAB -->
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">নোটিশ দিন</a></li>
                        <li role="presentation"><a href="#org-emp-list" aria-controls="org-emp-list" role="tab" data-toggle="tab">সকল নোটিশ</a></li>
                        
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="panel panel-default col-md-10 col-md-offset-1">
                                <div class="panel-body">
                                <form action="index.php/doc/insert_notice" method="post">
                                    <h3>
                                        <span>নোটিশ হেডলাইনঃ </span>
                                        <input type="text" name="notice_title">
                                    </h3>
                                    <h3><span>বিস্তারিত  তথ্যঃ</span></h3>
                                   <div role="tabpanel" class="tab-pane" onfocus="myclick()" id="wysiwyg-edit">
                                        <textarea name="notice_detail" id="summernote" class="summernote"></textarea>
                                    </div> <!-- /tabpanel -->

                                    <button class=" col-md-2 col-md-offset-4 btn btn-success gnt-btn save-btn">সেভ ডকুমেন্ট</button>
                                </form>
                                </div> <!-- /tabpanel -->
                            </div><!-- /tabpanel -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="org-emp-list">
                            <div class="table-responsive">
                                <table id="org-emp-list-table" class="table table-striped table-bordered" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">ক্রমিক</th>
                                            <th style="text-align:center;">হেডলাইন</th>
                                            <th style="text-align:center;">বিস্তারিত তথ্য</th>
                                            <th style="text-align:center;">নোটিশ অবস্থা</th>
                                            <th style="text-align:center;">পদক্ষেপ নিন</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $i=1; foreach($all_notice_info as $row) {?>
                                        <tr>
                                            <td>
                                                <p>
                                                    <?php
                                                    $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                                    $output = str_replace(range(0, 9),$bn_digits, $i); 
                                                    $i++;
                                                    echo $output;
                                                    ?>
                                                </p>
                                            </td>
                                            <td>
                                                <p><?=$row->notice_title?></p>
                                            </td>
                                            <td>
                                                <p><?=word_limiter($row->notice_detail, 10);?></p>
                                            </td>
                                            <td>
                                                <p><?php if($row->notice_status=='1'){echo '<span class="label label-success">' . ' প্রকাশিত' . '</span>';}else{echo '<span class="label label-warning">' . ' অপ্রকাশিত' . '</span>';}?></p>
                                            </td>
                                            <td style="width:15%;">

                                                <?php if($row->notice_status==1){echo '<a  href="index.php/doc/update_notice_status/'.$row->notice_id.'" type="button" class="btn btn-warning btn-xs">বন্ধ রাখুন</a>';} else{echo '<a href="index.php/doc/update_notice_status/'.$row->notice_id.'" type="button" class="btn btn-success btn-xs">প্রকাশ করুন</a>';}?>
                                                <a href="index.php/doc/view_notice_detail/<?=$row->notice_id;?>"><button type="button">বিস্তারিত</button></a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div><!-- /col -->
                        </div> <!-- /tabpanel -->


                    </div> <!-- /tabcontent -->
                </div> <!-- /col -->
            </div> <!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
            function myclick()
            {
                var des =$('#summernote').html();
                $('#desvalue').val(des);
            }
        </script>

<?php //include("layouts/footer.php"); ?>
