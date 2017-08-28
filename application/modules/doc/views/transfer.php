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
                                <th>কর্মচারী/ কর্মকর্তার নাম</th>
                                <th>ভোটার আই ডি</th>
                                <th>পদবী</th>
                                <th>ফোন</th>
                                <th>স্টেটাস</th>
                                <th>অ্যাকশন</th>
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
                                         <?php $des = $row['admin_designation_id'];
                                        if ($des == 4) {
                                            echo ' আপীল বিভাগীয় কর্মকর্তা ';
                                        } elseif ($des == 5) {
                                            echo ' অভিযোগ বিভাগীয় কর্মকর্তা ';
                                        } elseif ($des == 6) {
                                            echo 'জেলা বিভাগীয় কর্মকর্তা ';
                                        } elseif ($des == 7) {
                                            echo 'উপজেলা বিভাগীয় কর্মকর্তা ';
                                        } else {
                                            echo $des;
                                        } ?>                                        
                                    </td>
                                    <td><?php echo $row['admin_phone']; ?></td>
                                    <td>
                                        <?php
                                        $rr= $row['is_block'];
                                        if($rr==1){
                                            echo 'অনুনোমোদিত';
                                        }else{
                                            echo 'অনুমোদিত';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        
                                         <a style="cursor:pointer" onclick='offc_chng(<?= $row["admin_reg_id"];?>,<?= $row['admin_designation_id'];?>)'>
                                            <span class="glyphicon glyphicon-pencil"   ></span>
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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">কর্মস্থল পরিবর্তন</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">

                        <form action="index.php/doc/change_designation" method="post">
                            <input type="hidden" name="emp_reg_id" id="admin_reg_id"> 


                            <div class="form-group">
                                <label for="workplace" class="col-sm-2 control-label">পদের নাম</label>
                                <div class="col-sm-10">
                                    <select name="selection_id" id="job_id" class="form-control">
                                        <!--                                            <option value="">কর্মস্থল পছন্দ করুন</option>-->
                                        <option>--</option>
                                        <option value="2">বিভাগীয় অফিস </option>
                                        <option value="3">জেলা অফিস </option>
                                        <option value="4">উপজেলা অফিস</option>
                                        <option value="5">আপীল অফিস</option>
                                        <option value="6">অভিযোগ অফিস</option>
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
                                <button type="submit" class="btn btn-primary">আপডেট</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">বাতিল</button>
                            </div>
                        </form>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="msg_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">কর্মস্থল পরিবর্তন</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                       <p id="msg_div" ></p>                                                   
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">বাতিল</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>
<script>
    function offc_chng(admin,des){
       /* if(des==4){
            document.getElementById('admin_reg_id').innerText=admin;
            $('#msg_modal').modal('show');
           
        }else if(des==5){
            document.getElementById('admin_reg_id').value=admin;
            $('#msg_modal').modal('show');

        }else if(des== 6 || des == 7){
            document.getElementById('admin_reg_id').value=admin;
            $('#myModal').modal('show');
        }*/
        document.getElementById('admin_reg_id').value=admin;
            $('#myModal').modal('show');
    }

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