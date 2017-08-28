<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');

?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php $this->load->view('layouts/sidebar-nav'); ?>

        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <br>
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="heading-title">প্রোফাইল</h3>
                        </div>

                        <table class="table table-striped table-bordered table-hover" cellspacing="0">
                            <tr>
                                <td rowspan='4' style='width:180px;'>
                                    <img style='height:150px; width:180px;' src='<?= base_url().'uploads/no_img.png'?>'>
                                </td>
                                <!--<td width="25%">নাম</td>-->
                                <td><?php echo $leader_info[0]['admin_name']; ?></td>
                            </tr>
                            <tr>
                                <!--<td>ভোটার আই ডি</td>-->
                                <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['admin_nid']); ?></td>
                            </tr>
                            <tr>
                                <!--<td>ইমেইল</td>-->
                                <td><?php echo $leader_info[0]['admin_email']; ?></td>
                            </tr>
                            <tr>
                                <!--<td>ফোন</td>-->
                                <td><?php echo str_replace(range(0, 9), $bn_digits, $leader_info[0]['admin_phone']); ?></td>
                            </tr>
                        </table>
                    </div><!-- /panel -->
                </div>
<!--
                <h2 style="text-align: center;">আপনার প্রোফাইল</h2>
               
                <div class="col-md-12">
                    <table class="table table-bordered profile" style="width: 80%;margin: 0px auto;">
                        <tr>
                            <th>নাম</th>
                            <td>মিজানুর রহমান</td>
                        </tr>
                        <tr>
                            <th>এন, আই, ডি</th>
                            <td>23423423423432</td>
                        </tr>
                        <tr>
                            <th>পদবী</th>
                            <td>DOC Admin</td>
                        </tr>
                    </table>

                   </div>
-->
            <!--
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>--><!-- /row -->
        </div> <!-- /col10 -->
    </div><!-- /row -->
</div> <!-- /container-fluid -->
