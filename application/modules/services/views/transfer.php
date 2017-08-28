<?php //include ("layouts/header.php");               ?>
<base href="<?php echo base_url(); ?>">
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
                    <h2>বদলি ব্যবস্থাপনা</h2>
                    <hr>
                </div><!-- /col -->
                <div class="col-md-12">
                    <table id="transfer-mange-table" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th>কর্মচারী/ কর্মকর্তার নাম	</th>
                                <th>nid</th>
                                <th>পদের নাম</th>
                                <th>বর্তমান কর্মসংস্থান</th>
                                <th>Blocked</th>
                                <th></th>
<!--                                <th>অ্যাকশন</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employee_info as $row) { ?>
                                <tr>
                                    <td>
                                        <a href="#"><?php echo $row['admin_name']; ?></a>
                                    </td>
                                    <td><?php echo $row['admin_nid']; ?></td>
                                    <td>
                                        <?php echo $row['designation_name']; ?>                                        
                                    </td>
                                    <td>
                                        <?php echo "Division:  " . $row['bn_div_name'] . "\nDistrict:  " . $row['bn_dist_name'] . "\nupz:  " . $row['bn_upz_name']; ?>

                                    </td>
                                    <td>
                                        <?php if ($row['is_block'] == 0) {
                                            echo "NO";
                                        } else {
                                            echo "YES";
                                        } ?>
                                    </td>
                                    <td>
                                        <a>
                                            <span class="glyphicon glyphicon-pencil"  data-toggle="modal"  data-target="#myModal" ></span>
                                        </a>
                                    </td>
                                </tr>
<?php } ?>
                        </tbody>
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
<?php //$this->load->view('layouts/footer');  ?>

<?php //foreach ($employee_info as $row) {  ?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
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
                                        <option value="2">বিভাগীয় অফিস </option>
                                        <option value="3">জেলা অফিস </option>
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
                                            <option value="<?php echo $row['div_id']; ?>"><?php echo $row['bn_div_name']; ?></option>
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
                                        <option  value="">---</option>
                                    </select>
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
<?php //}  ?>

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

</script>
<!--
<script>
    $('#job_id').change(function () {
        selection = $(this).val();
        switch (selection) {
            case '2':
                $('#division-input').show();
                $('#district-input').hide();
                $('#sub-district-input').hide();
                break;
            case '3':
                $('#division-input').show();
                $('#district-input').show();
                $('#sub-district-input').hide();
                break;
            case '4':
                $('#division-input').show();
                $('#district-input').show();
                $('#sub-district-input').show();
                break;
            default:
                $('#division-input').hide();
                $('#district-input').hide();
                $('#sub-district-input').hide();
                break;
        }
    });
</script>-->