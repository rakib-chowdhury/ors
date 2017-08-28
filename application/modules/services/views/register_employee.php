<?php //include ("layouts/header.php");      ?>
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
                    <h2>কর্মচারী/ কর্মকর্তা নিবন্ধন</h2>
                    <hr>
                </div><!-- /col -->
                <div class="col-md-6 col-md-offset-3">
                    <form class="form-horizontal" action="<?php echo site_url('doc/employee_registration_form'); ?>" method="post">
                        <div class="form-group">
                            <label for="workplace" class="col-sm-2 control-label">কর্মস্থল</label>
                            <div class="col-sm-10">
                                <select name="selection_id" id="job_id" class="form-control">                                    
                                    <option value="">কর্মস্থল পছন্দ করুন</option>
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
                                    <option  value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary gnt-btn pull-right">
                                    <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;
                                    <span>Continue</span>
                                </button>
                            </div>
                        </div>
                    </form>
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
<?php $this->load->view("layouts/footer");  ?>

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


