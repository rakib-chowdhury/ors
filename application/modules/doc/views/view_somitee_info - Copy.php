<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php $this->load->view('layouts/sidebar-nav');?>

        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2>সমিতি সম্পর্কিত তথ্য</h2>
                    <hr>
                </div><!-- /col -->
                <div class="col-md-12">
                    <table id="about-org" class="table table-striped table-bordered" cellspacing="0">
                        <tr>
                            <td>Somitee Id</td>
                            <td><?php echo $somitee_info[0]['somitee_id'];?></td>
                        </tr>
                        <tr>
                            <td>Somitee Type</td>
                            <td><?php echo $somitee_info[0]['somitee_type_id'];?></td>
                        </tr>
                        <tr>
                            <td>Somitee Cat</td>
                            <td><?php echo $somitee_info[0]['somitee_cat_id'];?></td>
                        </tr>
                        <tr>
                            <td>Somitee Track Id</td>
                            <td>0ff1d0d0d0</td>
                        </tr>
                        <tr>
                            <td>Somitee Member Number</td>
                            <td><?php echo $somitee_info[0]['member_number'];?></td>
                        </tr>
                        <tr>
                            <td>member number</td>
                            <td><?php echo $somitee_info[0]['member_number'];?></td>
                        </tr>
                    </table>
                </div><!-- /col -->
            </div> <!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<?php // include("layouts/footer.php"); ?>
