<?php //include ("layouts/header.php");     ?>
<base href="<?php echo base_url() ?>">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php //include("layouts/sidebar-nav.php"); ?>
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2>কর্মচারী/ কর্মকর্তার তালিকা</h2>
                    <hr>
                </div><!-- /col -->
                <div class="col-md-12">
                    <div class="table-responsive employee-list">
                        <table id="emp-list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>নাম</th>
                                <th>পদবী</th>
                                <th>ভোটার আই ডি</th>
                                <th>ফোন</th>
                                <th>ইমেইল</th>
                                <th>স্টেটাস</th>
                                <th>অ্যাকশন</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($employee_info as $row) { ?>
                                <tr>
                                    <td><?php echo $row['admin_name']; ?></td>
                                    <td>
                                        <?php $des = $row['admin_designation_id'];
                                        if ($des == 4) {
                                            echo ' আপীল সমবায় কর্মকর্তা ';
                                        } elseif ($des == 5) {
                                            echo ' অভিযোগ সমবায় কর্মকর্তা ';
                                        } elseif ($des == 6) {
                                            echo 'জেলা সমবায় কর্মকর্তা ';
                                        } elseif ($des == 7) {
                                            echo 'উপজেলা সমবায় কর্মকর্তা ';
                                        } else {
                                            echo $des;
                                        } ?>
                                    </td>
                                    <td><?php echo $row['admin_nid']; ?></td>
                                    <td><?php echo $row['admin_phone']; ?></td>
                                    <td><?php echo $row['admin_email']; ?></td>
                                    <td>
                                        <?php
                                        $rr= $row['admin_block'];
                                        if($rr==1){
                                            echo 'অনুনোমোদিত';
                                        }else{
                                            echo 'অনুমোদিত';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('doc/chngLoginStatus/'.$row['admin_reg_id']);?>">
                                            <span class="glyphicon glyphicon-refresh"></span>
                                        </a>
                                        <a onclick="edit_admin(<?= $row['admin_reg_id'];?>)" style="cursor: pointer">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
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
<div class="modal fade" id="edit_admin_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">অ্যাডমিন প্রোফাইল সংশোধন</h4>
            </div>
            <form id="edit_admin_form" action="<?php echo site_url('doc/edit_admin'); ?>" method="post">
                <input type="hidden" name="admin_id" id="a_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="admin_name" class="col-md-3 control-label" style="text-align: right">কর্মকর্তা/কর্মচারীর নাম</label>
                            <div class="col-md-9">
                                <input  type="text" name="admin_name"
                                        id="admin_name" placeholder="কর্মকর্তা/কর্মচারীর নাম"
                                        class="form-control"
                                        required>
                                <span style="color: red;" id="crs_err1"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="admin_nid" class="col-md-3 control-label" style="text-align: right">জাতীয় পরিচয় পত্র নং</label>
                            <div class="col-md-9">
                                <input  type="text" name="admin_nid"
                                        id="admin_nid" placeholder="জাতীয় পরিচয় পত্র নং"
                                        class="form-control" readonly
                                        required>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="des" class="col-md-3 control-label" style="text-align: right">পদের নাম</label>
                            <div class="col-md-9">
                                <input type="hidden" name="admin_des" id="admin_des">
                                <input  type="text" name="des"
                                        id="des" placeholder=""
                                        class="form-control" readonly
                                        required>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="phone" class="col-md-3 control-label" style="text-align: right">ফোন নম্বর</label>
                            <div class="col-md-9">
                                <input  type="text" name="phone"
                                        id="phone" placeholder="ফোন নম্বর"
                                        class="form-control"
                                        required>
                                <span style="color: red;" id="crs_err1"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="start_date" class="col-md-3 control-label" style="text-align: right">জন্ম তারিখ</label>
                            <div class="col-md-9">
                                <input  type="text"
                                        class="form-control" name="start_date" id="birth-date"
                                        placeholder="" required>
                                <span style="color: red;" id="start_date1_err"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="email" class="col-md-3 control-label" style="text-align: right">ইমেইল</label>
                            <div class="col-md-9">
                                <input  type="text" name="email"
                                        id="email" placeholder=""
                                        class="form-control"
                                        required>
                                <span style="color: red;" id="crs_err1"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="edit_admin_btn" onclick="edit_admin_bttn()" type="submit"
                            class="btn btn-success btn-raised">সাবমিট
                    </button>
                    <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">ক্লোস</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php //include("layouts/footer.php"); ?>

<?php foreach ($employee_info as $row) { ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal_<?php echo $row['admin_reg_id']; ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Designation change</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">

                            <form action="index.php/doc/change_designation" method="post">
                                <input type="hidden" name="emp_reg_id" value="<?php echo $row['admin_reg_id']; ?>"/>


                                <div class="form-group">
                                    <label for="workplace" class="col-sm-2 control-label">পদের নাম</label>
                                    <div class="col-sm-10">
                                        <select name="selection_id" id="job_id" class="form-control">
                                            <!--                                            <option value="">কর্মস্থল পছন্দ করুন</option>-->
                                            <option>--</option>
                                            <option value="2">বিভাগীয় অফিস</option>
                                            <option value="3">জেলা অফিস</option>
                                            <option value="4">উপজেলা অফিস</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" hidden="hidden" id="division-input">
                                    <label for="division" class="col-sm-2 control-label">বিভাগ</label>
                                    <div class="col-sm-10">
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="">---</option>
                                            <?php foreach ($division as $row) { ?>
                                                <option
                                                    value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" hidden="hidden" id="district-input">
                                    <label for="district" class="col-sm-2 control-label">জেলা</label>
                                    <div class="col-sm-10">
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="">---</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" hidden="hidden" id="sub-district-input">
                                    <label for="sub-district" class="col-sm-2 control-label">উপজেলা</label>
                                    <div class="col-sm-10">
                                        <select name="upz_id" id="sub-district" class="form-control">
                                            <option value="">---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <span class="help-block" id="designation-help">*আবশ্যক</span>
                                </div>

                                <div>
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
<?php } ?>

<?php $this->load->view('layouts/footer'); ?>
<script>
    $('#division').change(function () {
        var div = $('#division').val();
        //alert(div);
        $.ajax({
            url: '<?php echo site_url('doc/get_dist'); ?>',
            type: 'POST',
            data: {
                div_id: div
            },
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);

                $('#district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['dist_id'] + '">' + value['bn_dist_name'] + '</option>';
                    //console.log(option_val);
                    $('#district').append(option_val);
                });
            }
        });
    });

    $('#district').change(function () {
        var dist = $('#district').val();
        //alert(div);
        $.ajax({
            url: '<?php echo site_url('doc/get_upz'); ?>',
            type: 'POST',
            data: {
                dist_id: dist
            },
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);

                $('#sub-district').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val = '<option value="' + value['upz_id'] + '">' + value['bn_upz_name'] + '</option>';
                    //console.log(option_val);
                    $('#sub-district').append(option_val);
                });
            }
        });
    });

    function edit_admin(admin_id) {
        console.log(admin_id);

        $.ajax({
            type:'post',
            url:'<?= site_url("doc/get_admin_info");?>',
            data:{
                id:admin_id
            },success:function(data){
                console.log(data);

                data1=$.parseJSON(data);

                $.each(data1['res'],function(index,value){
                    console.log('fdj');
                    document.getElementById('a_id').value=admin_id;
                    document.getElementById('admin_name').value=value['admin_name'];
                    document.getElementById('admin_nid').value=value['admin_nid'];
                    document.getElementById('phone').value=value['admin_phone'];
                    document.getElementById('email').value=value['admin_email'];
                    dobt=value['reg_date'].split(' ');
                    dob=dobt[0].split('-');
                    document.getElementById('birth-date').value=dob[2]+'/'+dob[1]+'/'+dob[0];

                    var des=value['admin_designation_id'];
                    var msg='';
                    if (des == 4) {
                        msg= ' আপীল সমবায় কর্মকর্তা ';
                    } else if (des == 5) {
                        msg= ' অভিযোগ সমবায় কর্মকর্তা ';
                    } else if (des == 6) {
                        msg= 'জেলা সমবায় কর্মকর্তা ';
                    } else if (des == 7) {
                        msg= 'উপজেলা সমবায় কর্মকর্তা ';
                    } else {
                        msg= des;
                    }
                    document.getElementById('admin_des').value=des;
                    document.getElementById('des').value=msg;
                });

                $('#edit_admin_modal').modal('show');
            }
        });



    }

    function edit_admin_bttn() {

    }
</script>