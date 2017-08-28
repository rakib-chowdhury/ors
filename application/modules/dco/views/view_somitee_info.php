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
                    <h2>সমিতি সম্পর্কিত তথ্য</h2>
                    <hr>
                </div><!-- /col -->
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Comment</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <from class="form-horizontal" action="<?php echo site_url('dco/dco_comment_post'); ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>

                                    <input type="hidden" name="dco_id" value="">
                                    <input type="hidden" name="somitee_id" value="">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Comment</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control" id="dco_comment" name="dco_comment" ></textarea>
                                            </div>                            
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Comment</label>
                                            <div class="col-sm-8">
                                                <input type="radio" name="is_verify" value="1">YES
                                                <input type="radio" name="is_verify" value="0">NO
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-default" >Save</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>                                
                                </div>
                            </from>
                        </div>
                    </div>
                    <table id="about-org" class="table table-striped table-bordered" cellspacing="0">
                        <tr>
                            <td>Somitee Id</td>
                            <td><?php echo $somitee_info[0]['somitee_id']; ?></td>
                        </tr>
                        <tr>
                            <td>Somitee Name</td>
                            <td><?php echo $somitee_info[0]['somitee_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Somitee Type</td>
                            <td><?php echo $somitee_info[0]['somitee_type_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Somitee Cat</td>
                            <td><?php echo $somitee_info[0]['somitee_cat_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Somitee Track Id</td>
                            <td>0ff1d0d0d0</td>
                        </tr>
                        <tr>
                            <td>Somitee Member Number</td>
                            <td><?php echo $somitee_info[0]['member_number']; ?></td>
                        </tr>
                        <tr>
                            <td>member number</td>
                            <td><?php echo $somitee_info[0]['member_number']; ?></td>
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
