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
                    <h2>Sms Api Information</h2>
                    <hr>
                </div>
                <?php if (sizeof($sms_api_info) == 0) { ?>
                    <div class="form-group" >
                        <center>
                            <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#myModal_add">Add Sms Api Link</button>
                        </center>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <table id="about-org" class="table table-striped table-bordered" cellspacing="0">
                            <tr>
                                <th colspan="2">Sms Api Link</td>
                                <th>Current Sms</th>
                                <th>Buy Sms</th>
                            </tr>
                            <tr>
                                <td><?php echo $sms_api_info[0]['mobile_api_link']; ?></td>
                                <td>
                                    <a>
                                        <span class="glyphicon glyphicon-pencil"  data-toggle="modal"  data-target="#myModal" ></span>
                                    </a>
                                </td>
                                <td><?php echo $sms_api_info[0]['total_sms_number'] - $sms_api_info[0]['send_sms_number']; ?></td>
                                <td>
                                    <a>
                                        <span class="glyphicon glyphicon-pencil"  data-toggle="modal"  data-target="#myModal_buy" ></span>
                                    </a>
                                </td>
                            </tr>

                        </table>
                    </div>
                <?php } ?>
            </div> 
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<?php // include("layouts/footer.php"); ?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sms Api change</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">

                        <form class="form-horizontal" action="<?php echo site_url('doc/sms_api_change'); ?>" method="post">
                            <input type="hidden" name="sms_link_id" value="<?php echo $sms_api_info[0]['mobile_api_id']; ?>">
                            <div class="form-group">
                                <label for="sms_api_link" class="col-sm-3 control-label">Sms Api Link</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="name" name="sms_api_link" placeholder="sms_api_link" required>
                                </div>
                                <div class="col-sm-5">
                                    <span class="help-block" id="name-help">*আবশ্যক</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sms" class="col-sm-3 control-label">Sms Number</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="name" name="sms_number" placeholder="sms number" required>
                                </div>
                                <div class="col-sm-5">
                                    <span class="help-block" id="name-help">*আবশ্যক</span>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="designation-help">*আবশ্যক</span>
                            </div>                                    

                            <div >
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_add" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sms Api</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">

                        <form class="form-horizontal" action="<?php echo site_url('doc/sms_api_add'); ?>" method="post">
                            <div class="form-group">
                                <label for="sms_api_link" class="col-sm-3 control-label">Sms Api Link</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="name" name="sms_api_link" placeholder="sms_api_link" required>
                                </div>
                                <div class="col-sm-5">
                                    <span class="help-block" id="name-help">*আবশ্যক</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sms" class="col-sm-3 control-label">Sms Number</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="name" name="sms_number" placeholder="sms number" required>
                                </div>
                                <div class="col-sm-5">
                                    <span class="help-block" id="name-help">*আবশ্যক</span>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="designation-help">*আবশ্যক</span>
                            </div>                                    

                            <div >
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_buy" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sms Api</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" action="<?php echo site_url('doc/sms_buy'); ?>" method="post">
                            <input type="hidden" name="sms_link_id" value="<?php echo $sms_api_info[0]['mobile_api_id']; ?>">
                            <input type="hidden" name="pre_sms_num" value="<?php echo $sms_api_info[0]['total_sms_number']; ?>">
                            <div class="form-group">
                                <label for="sms" class="col-sm-3 control-label">Sms Number</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="name" name="sms_number" placeholder="sms number" required>
                                </div>
                                <div class="col-sm-5">
                                    <span class="help-block" id="name-help">*আবশ্যক</span>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="designation-help">*আবশ্যক</span>
                            </div>                                    

                            <div >
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>