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
                	<br>       
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
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">নোটিশ সম্পর্কিত বিস্তারিত তথ্য</a></li> 
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="panel panel-default col-md-10 col-md-offset-1">
                                <div class="panel-body">
                                <form action="index.php/doc/update_notice_detail" method="post">
                                    <h3>
                                        <span>নোটিশ হেডলাইনঃ </span>
                                        <input type="text" name="notice_title" value="<?=$notice_info->notice_title?>">
                                    </h3>
                                    <h3><span>বিস্তারিত  তথ্যঃ</span></h3>
                                   <div role="tabpanel" class="tab-pane" onfocus="myclick()" id="wysiwyg-edit">
                                        <textarea name="notice_detail" id="summernote" class="summernote"><?=$notice_info->notice_detail?></textarea>
                                    </div> <!-- /tabpanel -->
                                        <input type="hidden" name="edit_id" value="<?=$notice_info->notice_id;?>">
                                    <button class=" col-md-2 col-md-offset-4 btn btn-success gnt-btn save-btn">সেভ ডকুমেন্ট</button>
                                </form>
                                </div> <!-- /tabpanel -->
                            </div><!-- /tabpanel -->
                        </div>
                        


                    </div> <!-- /tabcontent -->
                </div> <!-- /col -->
            </div> <!-- /row --> 
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
